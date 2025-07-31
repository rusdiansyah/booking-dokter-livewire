<?php

namespace App\Livewire\Front\Beranda;

use App\Models\Layanan as ModelsLayanan;
use Livewire\Component;

class Layanan extends Component
{
    public function render()
    {
        $layanan = ModelsLayanan::all();
        return view('livewire.front.beranda.layanan',compact('layanan'));
    }
}
