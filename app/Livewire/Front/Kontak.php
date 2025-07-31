<?php

namespace App\Livewire\Front;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class Kontak extends Component
{
    #[Layout('components.layouts.front')]
    #[Title('Kontak')]
    public $title = 'Kontak';

    public function mount()
    {
        $this->title;
    }
    public function render()
    {
        return view('livewire.front.kontak');
    }
}
