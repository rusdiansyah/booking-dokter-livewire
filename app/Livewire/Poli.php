<?php

namespace App\Livewire;

use App\Models\Poli as ModelsPoli;
use Livewire\Attributes\On;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class Poli extends Component
{
    Use WithPagination;
    Use WithFileUploads;
    #[Title('Poli')]
    public $title = 'Poli';
    public $id, $nama, $is_active;
    public $gambar, $keterangan;
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
        $data = ModelsPoli::where('nama', 'like', '%' . $this->search . '%')
            ->paginate($this->paginate);
        return view('livewire.poli',compact('data'));
    }
    public function updatedSearch()
    {
        $this->resetPage();
    }
    public function blankForm()
    {
        $this->id = '';
        $this->nama = '';
        $this->gambar = '';
        $this->keterangan = '';
        $this->is_active = (bool) false;
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
        $data = ModelsPoli::find($id);
        $this->id = $data->id;
        $this->nama = $data->nama;
        $this->gambar = $data->gambar;
        $this->keterangan = $data->keterangan;
        $this->is_active =(bool) $data->is_active;
    }
    public function save()
    {
        // dd($this->all());
        $this->validate([
            'nama' => 'required|min:3|unique:polis,nama,' . $this->id,
            'gambar' => 'required|image|max:2048',
            'keterangan' => 'required',
        ]);
        $path = $this->gambar->store('poli', 'public');
        ModelsPoli::updateOrCreate(['id' => $this->id], [
            'nama' => $this->nama,
            'keterangan' => $this->keterangan,
            'gambar' => $path,
            'is_active' =>(bool) $this->is_active,
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
        ModelsPoli::find($id)->delete();
        $this->dispatch('swal', [
            'title' => 'Success!',
            'text' => 'Data berhasil dihapus',
            'icon' => 'success',
        ]);
    }
}
