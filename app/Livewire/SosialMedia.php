<?php

namespace App\Livewire;

use App\Models\SosialMedia as ModelsSosialMedia;
use Livewire\Attributes\On;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;

class SosialMedia extends Component
{
    use WithPagination;
    #[Title('Sosial Media')]
    public $title = 'Sosial Media';
    public $id, $nama, $icon, $url,$aktif;
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
        $data = ModelsSosialMedia::where('nama', 'like', '%' . $this->search . '%')
            ->paginate($this->paginate);
        return view('livewire.sosial-media',[
            'data' => $data
        ]);
    }
    public function updatedSearch()
    {
        $this->resetPage();
    }
    public function blankForm()
    {
        $this->id = '';
        $this->nama = '';
        $this->url = '';
        $this->icon = '';
        $this->aktif = (bool) false;
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
        $data = ModelsSosialMedia::find($id);
        $this->id = $data->id;
        $this->nama = $data->nama;
        $this->url = $data->url;
        $this->icon = $data->icon;
        $this->aktif = (bool) $data->aktif;
    }
    public function save()
    {
        // dd($this->all());
        $record = $this->validate([
            'nama' => 'required|min:3|unique:sosial_media,nama,' . $this->id,
            'icon' => 'required',
            'url' => 'required',
        ]);
        $record['aktif'] = (bool) $this->aktif;
        ModelsSosialMedia::updateOrCreate(['id' => $this->id], $record);
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
        ModelsSosialMedia::find($id)->delete();
        $this->dispatch('swal', [
            'title' => 'Success!',
            'text' => 'Data berhasil dihapus',
            'icon' => 'success',
        ]);
    }
}
