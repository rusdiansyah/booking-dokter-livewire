<?php

namespace App\Livewire\Front;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class Beranda extends Component
{
    #[Layout('components.layouts.front')]
    #[Title('Beranda')]
    public $title = 'Beranda';

    public function mount()
    {
        $this->title;
    }
    public function render()
    {
        return view('livewire.front.beranda');
    }
}
