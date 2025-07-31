<?php

namespace App\Livewire;

use App\Models\Role as ModelsRole;
use Livewire\Attributes\On;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;

class Role extends Component
{
    use WithPagination;
    #[Title('Role User')]
    public $title = 'Role User';
    public $id,$nama;
    public $postAdd = false;
    public $isStatus;
    public $paginate = 10;
    public $search;

    public function mount()
    {
        $this->title;
        $this->isStatus ='create';
    }
    public function render()
    {
        $data = ModelsRole::where('nama', 'like', '%' . $this->search . '%')
        ->paginate($this->paginate);
        return view('livewire.role',
    compact('data'));
    }

    public function search()
    {
        $this->resetPage();
    }

    public function addPost()
    {
        $this->postAdd = true;
        $this->isStatus = 'create';
    }
    public function close()
    {
        $this->postAdd = false;
    }

    public function edit($id)
    {
        $this->isStatus = 'edit';
        $data = ModelsRole::find($id);
        $this->id = $data->id;
        $this->nama = $data->nama;
    }


    public function save()
    {
        $this->validate([
            'nama' => 'required|min:3|unique:roles,nama,'.$this->id
        ]);
        ModelsRole::updateOrCreate(['id' => $this->id], [
            'nama' => $this->nama,
        ]);
        if ($this->isStatus == 'create') {
            $this->dispatch('swal',[
                'title' => 'Success!',
                'text' => 'Data berhasil disimpan',
                'icon' => 'success',
            ]);
        } else {
            $this->dispatch('swal',[
                'title' => 'Success!',
                'text' => 'Data berhasil diedit',
                'icon' => 'success',
            ]);
        }
        $this->dispatch('close-modal');
    }

    public function cofirmDelete($id)
    {
        $this->dispatch('confirm',id:$id);
    }
    #[On('delete')]
    public function delete($id)
    {
        ModelsRole::find($id)->delete();
        $this->dispatch('swal',[
            'title' => 'Success!',
            'text' => 'Data berhasil dihapus',
            'icon' => 'success',
        ]);
    }
}
