<?php

namespace App\Livewire\Front;

use App\Models\Layanan as ModelsLayanan;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class Layanan extends Component
{
    #[Layout('components.layouts.front')]
    #[Title('Layanan')]
    public $title = 'Layanan';

    public function mount()
    {
        $this->title;
    }
    public function render()
    {
        $data = ModelsLayanan::orderBy('id','desc')->get();
        return view('livewire.front.layanan',compact('data'));
    }
}
