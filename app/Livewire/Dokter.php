<?php

namespace App\Livewire;

use App\Models\Dokter as ModelsDokter;
use Livewire\Attributes\Computed;
use Livewire\Attributes\On;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class Dokter extends Component
{
    use WithPagination;
    use WithFileUploads;
    #[Title('Dokter')]
    public $title = 'Dokter';
    public $id, $nama, $jenis_kelamin,$keterangan,$foto;
    public $postAdd = false;
    public $isStatus;
    public $paginate = 10;
    public $search;

    #[Computed()]
    public function listJenisKelamin()
    {
        return [
            'L' => 'Laki-laki',
            'P' => 'Perempuan',
        ];
    }
    public function mount()
    {
        $this->title;
        $this->isStatus = 'create';
    }
    public function render()
    {
        $data = ModelsDokter::where('nama', 'like', '%' . $this->search . '%')
            ->paginate($this->paginate);
        return view('livewire.dokter',compact('data'));
    }
    public function updatedSearch()
    {
        $this->resetPage();
    }
    public function blankForm()
    {
        $this->id = '';
        $this->nama = '';
        $this->jenis_kelamin ='';
        $this->keterangan ='';
        $this->foto ='';
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
        $data = ModelsDokter::find($id);
        $this->id = $data->id;
        $this->nama = $data->nama;
        $this->jenis_kelamin = $data->jenis_kelamin;
        $this->keterangan = $data->keterangan;
        $this->foto = $data->foto;

    }
    public function save()
    {
        // dd($this->all());
        $this->validate([
            'nama' => 'required|min:3',
            'jenis_kelamin' => 'required',
            'foto' => 'required|image|max:2048',
        ]);
        $path = $this->foto->store('foto', 'public');
        ModelsDokter::updateOrCreate(['id' => $this->id], [
            'nama' => $this->nama,
            'jenis_kelamin' => $this->jenis_kelamin,
            'keterangan' => $this->keterangan,
            'foto' => $path,
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
        ModelsDokter::find($id)->delete();
        $this->dispatch('swal', [
            'title' => 'Success!',
            'text' => 'Data berhasil dihapus',
            'icon' => 'success',
        ]);
    }
}
