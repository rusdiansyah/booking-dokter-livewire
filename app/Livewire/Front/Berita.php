<?php

namespace App\Livewire\Front;

use App\Models\Berita as ModelsBerita;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;

class Berita extends Component
{
    Use WithPagination;
    #[Layout('components.layouts.front')]
    #[Title('Berita')]
    public $title = 'Berita';
    public $paginate = 10;

    public function mount()
    {
        $this->title;
    }
    public function render()
    {
        $berita = ModelsBerita::where('is_publish',1)
        ->orderBy('created_at','desc')
        ->with('kategori_berita')
        ->paginate($this->paginate);
        return view('livewire.front.berita',compact('berita'));
    }
}
