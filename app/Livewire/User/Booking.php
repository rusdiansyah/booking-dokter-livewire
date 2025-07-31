<?php

namespace App\Livewire\User;

use App\Models\Booking as ModelsBooking;
use App\Models\JadwalPraktek;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Computed;
use Livewire\Attributes\On;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;

class Booking extends Component
{
    use WithPagination;
    #[Title('Booking')]
    public $title;
    public $userId,$id, $jadwal_praktek_id, $tanggal, $jam, $keluhan;
    public $postAdd = false;
    public $isStatus;
    public $paginate = 10;
    public $search;

    public function mount()
    {
        $this->userId = Auth::user()->id;
        $this->title;
    }
    #[Computed()]
    public function listJadwal()
    {
        return JadwalPraktek::query()->get();
    }
    public function render()
    {
        $booking = ModelsBooking::where('user_id',$this->userId)
        ->orderBy('id','desc')
            ->paginate($this->paginate);
        return view('livewire.user.booking',compact('booking'));
    }
    public function blankForm()
    {
        $this->id = '';
        $this->jadwal_praktek_id = '';
        $this->tanggal = '';
        $this->jam = '';
        $this->keluhan = '';
    }
    public function addPost()
    {
        $this->postAdd = true;
        $this->isStatus = 'create';
        $this->blankForm();
    }
    public function close()
    {
        $this->postAdd = false;
    }
    public function edit($id)
    {
        $this->isStatus = 'edit';
        $data = ModelsBooking::find($id);
        $this->id = $data->id;
        $this->jadwal_praktek_id = $data->jadwal_praktek_id;
        $this->tanggal = $data->tanggal;
        $this->jam = $data->jam;
        $this->keluhan = $data->keluhan;
    }
    public function save()
    {
        // dd($this->all());
        $this->validate([
            'jadwal_praktek_id' => 'required',
            'tanggal' => 'required',
            'jam' => 'required',
            'keluhan' => 'required',
        ]);
        ModelsBooking::updateOrCreate(['id' => $this->id], [
            'jadwal_praktek_id' => $this->jadwal_praktek_id,
            'status_booking_id' => 1,
            'user_id' => Auth::user()->id,
            'tanggal' => $this->tanggal,
            'jam' => $this->jam,
            'keluhan' => $this->keluhan,
        ]);
        if ($this->isStatus == 'create') {
            $this->dispatch('swal', [
                'title' => 'Success!',
                'text' => 'Data berhasil disimpan',
                'icon' => 'success',
            ]);
        } else {
            $this->dispatch('swal', [
                'title' => 'Success!',
                'text' => 'Data berhasil diedit',
                'icon' => 'success',
            ]);
        }
        $this->dispatch('close-modal');
    }
    public function cofirmDelete($id)
    {
        $this->dispatch('confirm', id: $id);
    }
    #[On('delete')]
    public function delete($id)
    {
        ModelsBooking::find($id)->delete();
        $this->dispatch('swal', [
            'title' => 'Success!',
            'text' => 'Data berhasil dihapus',
            'icon' => 'success',
        ]);
    }
}
