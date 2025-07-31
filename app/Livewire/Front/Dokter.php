<?php

namespace App\Livewire\Front;

use App\Models\Dokter as ModelsDokter;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class Dokter extends Component
{
    #[Layout('components.layouts.front')]
    #[Title('Dokter')]
    public $title = 'Dokter';

    public function mount()
    {
        $this->title;
    }
    public function render()
    {
        $data = ModelsDokter::all();
        return view('livewire.front.dokter',compact('data'));
    }
}
