<?php

namespace App\Livewire\Front;

use App\Models\Berita;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class BeritaDetail extends Component
{
    #[Layout('components.layouts.front')]
    #[Title('Detail Berita')]
    public $title = 'Detail Berita';
    public $id;
    public function mount($id)
    {
        $this->id = $id;
    }
    public function render()
    {
        $data = Berita::where('id',$this->id)->first();
        return view('livewire.front.berita-detail',compact('data'));
    }
}
