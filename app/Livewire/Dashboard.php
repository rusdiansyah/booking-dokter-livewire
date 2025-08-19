<?php

namespace App\Livewire;

use App\Models\Berita;
use App\Models\Booking;
use App\Models\Dokter;
use App\Models\JadwalPraktek;
use App\Models\Layanan;
use App\Models\Poli;
use App\Models\User;
use Livewire\Attributes\Title;
use Livewire\Component;


class Dashboard extends Component
{
    #[Title('Dashboard')]
    public $title='Dashboard';
    public $jmlPasien = 0;
    public $jmlPoli = 0;
    public $jmlDokter = 0;
    public $jmlJadwal = 0;
    public $jmlLayanan = 0;
    public $jmlBooking = 0;
    public $jmlBerita = 0;
    public function mount()
    {
        $this->title;
        $this->jmlPasien = User::where('role_id',2)->count();
        $this->jmlPoli = Poli::count();
        $this->jmlDokter = Dokter::count();
        $this->jmlJadwal = JadwalPraktek::count();
        $this->jmlLayanan = Layanan::count();
        $this->jmlBooking = Booking::count();
        $this->jmlBerita = Berita::count();
    }
    public function render()
    {
        return view('livewire.dashboard');
    }
}
