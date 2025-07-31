<?php

namespace App\Livewire;

use App\Models\Berita as ModelsBerita;
use App\Models\KategoriBerita;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Computed;
use Livewire\Attributes\On;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class Berita extends Component
{
    use WithPagination;
    use WithFileUploads;
    #[Title('Berita')]
    public $title = 'Berita';
    public $id, $kategori_berita_id, $judul, $isi, $gambar, $is_publish, $user_id;
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
    public function listKagetori()
    {
        return KategoriBerita::all();
    }
    public function render()
    {
        $data = ModelsBerita::where('judul', 'like', '%' . $this->search . '%')
        ->with('kategori_berita')
            ->paginate($this->paginate);
        return view('livewire.berita',compact('data'));
    }
    public function updatedSearch()
    {
        $this->resetPage();
    }
    public function blankForm()
    {
        $this->id = '';
        $this->judul = '';
        $this->kategori_berita_id = '';
        $this->gambar = '';
        $this->isi = '';
        $this->is_publish = '';
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
        $data = ModelsBerita::find($id);
        $this->id = $data->id;
        $this->judul = $data->judul;
        $this->kategori_berita_id = $data->kategori_berita_id;
        $this->gambar = $data->gambar;
        $this->isi = $data->isi;
        $this->is_publish =(bool) $data->is_publish;
    }
    public function save()
    {
        // dd($this->all());
        $this->validate([
            'judul' => 'required|min:5',
            'kategori_berita_id' => 'required',
            'isi' => 'required',
            'gambar' => 'required|image|max:2048',
        ]);
        $path = $this->gambar->store('berita', 'public');
        ModelsBerita::updateOrCreate(['id' => $this->id], [
            'judul' => $this->judul,
            'kategori_berita_id' => $this->kategori_berita_id,
            'isi' => $this->isi,
            'gambar' => $path,
            'is_publish' =>(bool) $this->is_publish,
            'user_id' => Auth::user()->id,
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
        ModelsBerita::find($id)->delete();
        $this->dispatch('swal', [
            'title' => 'Success!',
            'text' => 'Data berhasil dihapus',
            'icon' => 'success',
        ]);
    }
}
