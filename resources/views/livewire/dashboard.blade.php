<div>
    <div class="card card-primary card-outline">
        <div class="card-header">
            <h5 class="m-0">Halaman Admin</h5>
        </div>
        <div class="card-body">
            <h6 class="card-title">Hi <b>{{ Auth::user()->name }} [{{ Auth::user()->role->nama }}]</b> selamat datang
                di Sistem Informasi {{ config('app.name') }}</h6>
        </div>
    </div>
    <div class="row">
        <x-chart warna="info" jumlah="{{ $jmlPasien }}" judul="Pasien" icon="ion-person-add" route="user"/>
        <x-chart warna="info" jumlah="{{ $jmlPoli }}" judul="Poli" icon="ion-bag" route="klinik.poli"/>
        <x-chart warna="info" jumlah="{{ $jmlDokter }}" judul="Dokter" icon="ion-network" route="klinik.dokter"/>
        <x-chart warna="warning" jumlah="{{ $jmlJadwal }}" judul="Jadwal" icon="ion-calendar" route="klinik.jadwalpraktek"/>
        <x-chart warna="warning" jumlah="{{ $jmlLayanan }}" judul="Layanan" icon="ion-heart" route="klinik.layanan"/>
        <x-chart warna="success" jumlah="{{ $jmlBooking }}" judul="Booking" icon="ion-compose" route="klinik.booking"/>
        <x-chart warna="success" jumlah="{{ $jmlBerita }}" judul="Berita" icon="ion-clipboard" route="berita.list"/>
    </div>
</div>
