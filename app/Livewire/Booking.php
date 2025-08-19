<?php

namespace App\Livewire;

use App\Models\Booking as ModelsBooking;
use App\Models\JadwalPraktek;
use App\Models\StatusBooking;
use App\Models\User;
use Livewire\Attributes\Computed;
use Livewire\Attributes\On;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;

class Booking extends Component
{
    use WithPagination;
    #[Title('Booking')]
    public $title = 'Booking';
    public $id, $jadwal_praktek_id, $status_booking_id, $user_id;
    public $tanggal,$jam,$keluhan;
    public $postAdd = false;
    public $isStatus;
    public $paginate = 10;
    public $search;

    public function mount()
    {
        $this->title;
        $this->isStatus = 'create';
    }

    #[Computed()]
    public function listJadwal()
    {
        return JadwalPraktek::query()->get();
    }

    #[Computed()]
    public function listStatus()
    {
        return StatusBooking::query()->get();
    }
    #[Computed()]
    public function listUser()
    {
        return User::query()->get();
    }
    public function render()
    {
        $data = ModelsBooking::query()
            ->when($this->search, function ($query) {
                $query->whereHas('user', function ($query) {
                    return $query->where('name', 'like', '%' . $this->search . '%');
                });
            })
            ->with('status_booking', 'jadwal_praktek', 'user')
            // ->get();
            ->orderBy('created_at','desc')
            ->paginate($this->paginate);
        // dd($data);
        return view('livewire.booking', compact('data'));
    }
    public function updatedSearch()
    {
        $this->resetPage();
    }
    public function blankForm()
    {
        $this->id = '';
        $this->jadwal_praktek_id = '';
        $this->status_booking_id = '';
        $this->user_id = '';
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
        $this->status_booking_id = $data->status_booking_id;
        $this->user_id = $data->user_id;
        $this->tanggal = $data->tanggal;
        $this->jam = $data->jam;
        $this->keluhan = $data->keluhan;
    }
    public function save()
    {
        // dd($this->all());
        $this->validate([
            'jadwal_praktek_id' => 'required',
            'status_booking_id' => 'required',
            'user_id' => 'required',
            'tanggal' => 'required',
            'jam' => 'required',
            'keluhan' => 'required',
        ]);
        ModelsBooking::updateOrCreate(['id' => $this->id], [
            'jadwal_praktek_id' => $this->jadwal_praktek_id,
            'status_booking_id' => $this->status_booking_id,
            'user_id' => $this->user_id,
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
