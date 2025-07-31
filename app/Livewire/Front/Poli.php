<?php

namespace App\Livewire\Front;

use App\Models\Poli as ModelsPoli;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class Poli extends Component
{
    #[Layout('components.layouts.front')]
    #[Title('Poli')]
    public $title = 'Poli';

    public function mount()
    {
        $this->title;
    }
    public function render()
    {
        $data = ModelsPoli::get();
        return view('livewire.front.poli',compact('data'));
    }
}
