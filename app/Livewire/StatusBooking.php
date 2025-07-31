<?php

namespace App\Livewire;

use App\Models\StatusBooking as ModelsStatusBooking;
use Livewire\Attributes\On;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;

class StatusBooking extends Component
{
    use WithPagination;
    #[Title('Status Booking')]
    public $title = 'Status Booking';
    public $id, $nama;
    public $postAdd = false;
    public $isStatus;
    public $paginate = 10;
    public $search;

    public function mount()
    {
        $this->title;
        $this->isStatus = 'create';
    }
    public function render()
    {
        $data = ModelsStatusBooking::where('nama', 'like', '%' . $this->search . '%')
            ->paginate($this->paginate);
        return view('livewire.status-booking',compact('data'));
    }
    public function updatedSearch()
    {
        $this->resetPage();
    }
    public function blankForm()
    {
        $this->id = '';
        $this->nama = '';
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
        $data = ModelsStatusBooking::find($id);
        $this->id = $data->id;
        $this->nama = $data->nama;
    }
    public function save()
    {
        // dd($this->all());
        $this->validate([
            'nama' => 'required|min:3|unique:status_bookings,nama,' . $this->id
        ]);
        ModelsStatusBooking::updateOrCreate(['id' => $this->id], [
            'nama' => $this->nama,
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
        ModelsStatusBooking::find($id)->delete();
        $this->dispatch('swal', [
            'title' => 'Success!',
            'text' => 'Data berhasil dihapus',
            'icon' => 'success',
        ]);
    }
}
