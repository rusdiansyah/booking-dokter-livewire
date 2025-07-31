<?php

namespace App\Livewire;

use App\Models\Layanan as ModelsLayanan;
use App\Models\Poli;
use Livewire\Attributes\Computed;
use Livewire\Attributes\On;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class Layanan extends Component
{
    use WithPagination;
    use WithFileUploads;
    #[Title('Layanan')]
    public $title = 'Layanan';
    public $id, $poli_id, $nama, $gambar, $keterangan;
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
    public function listPoli()
    {
        return Poli::all();
    }
    public function render()
    {
        $data = ModelsLayanan::where('nama', 'like', '%' . $this->search . '%')
            ->paginate($this->paginate);
        return view('livewire.layanan',compact('data'));
    }
    public function updatedSearch()
    {
        $this->resetPage();
    }
    public function blankForm()
    {
        $this->id = '';
        $this->nama = '';
        $this->poli_id = '';
        $this->gambar = '';
        $this->keterangan = '';
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
        $data = ModelsLayanan::find($id);
        $this->id = $data->id;
        $this->nama = $data->nama;
        $this->poli_id = $data->poli_id;
        $this->gambar = $data->gambar;
        $this->keterangan = $data->keterangan;
    }
    public function save()
    {
        // dd($this->all());
        $this->validate([
            'nama' => 'required|min:3',
            'poli_id' => 'required',
            'gambar' => 'required|image|max:2048',
        ]);
        $path = $this->gambar->store('layanan', 'public');
        ModelsLayanan::updateOrCreate(['id' => $this->id], [
            'nama' => $this->nama,
            'poli_id' => $this->poli_id,
            'keterangan' => $this->keterangan,
            'gambar' => $path,
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
        ModelsLayanan::find($id)->delete();
        $this->dispatch('swal', [
            'title' => 'Success!',
            'text' => 'Data berhasil dihapus',
            'icon' => 'success',
        ]);
    }
}
