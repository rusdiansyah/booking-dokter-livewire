<?php

namespace App\Livewire\Front\Beranda;

use App\Models\Poli as ModelsPoli;
use Livewire\Component;

class Poli extends Component
{
    public function render()
    {
        $poli = ModelsPoli::all();
        return view('livewire.front.beranda.poli',compact('poli'));
    }
}
