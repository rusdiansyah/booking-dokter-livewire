<?php

namespace App\Livewire\Front\Beranda;

use App\Models\JadwalPraktek as ModelsJadwalPraktek;
use Livewire\Component;

class Jadwalpraktek extends Component
{
    public function render()
    {
        $jadwal = ModelsJadwalPraktek::all();
        return view('livewire.front.beranda.jadwalpraktek',compact('jadwal'));
    }
}
