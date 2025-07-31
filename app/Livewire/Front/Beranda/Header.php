<?php

namespace App\Livewire\Front\Beranda;

use App\Models\Setting;
use Livewire\Component;

class Header extends Component
{
    public function render()
    {
        $setting = Setting::find(1);
        return view('livewire.front.beranda.header',compact('setting'));
    }
}
