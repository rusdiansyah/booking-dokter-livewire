<?php

use App\Livewire\Berita;
use App\Livewire\Booking;
use App\Livewire\Dashboard;
use App\Livewire\Dokter;
use App\Livewire\Favicon;
use App\Livewire\Front\Beranda;
use App\Livewire\Front\Berita as FrontBerita;
use App\Livewire\Front\BeritaDetail;
use App\Livewire\Front\Dokter as FrontDokter;
use App\Livewire\Front\Kontak;
use App\Livewire\Front\Layanan as FrontLayanan;
use App\Livewire\Front\Poli as FrontPoli;
use App\Livewire\JadwalPraktek;
use App\Livewire\KategoriBerita;
use App\Livewire\Layanan;
use App\Livewire\Login;
use App\Livewire\LogoHome;
use App\Livewire\LogoLogin;
use App\Livewire\LupaPassword;
use App\Livewire\PhotoUser;
use App\Livewire\Poli;
use App\Livewire\Register;
use App\Livewire\Role;
use App\Livewire\Setting;
use App\Livewire\StatusBooking;
use App\Livewire\User;
use App\Livewire\User\Booking as UserBooking;
use App\Livewire\User\Dashboard as UserDashboard;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/',function(){
    return redirect('beranda');
});
Route::get('/beranda', Beranda::class)->name('beranda');
Route::get('/list_dokter', FrontDokter::class)->name('list_dokter');
Route::get('/list_layanan', FrontLayanan::class)->name('list_layanan');
Route::get('/list_poli', FrontPoli::class)->name('list_poli');
Route::get('/list_berita', FrontBerita::class)->name('list_berita');
Route::get('/beritaDetail/{id}', BeritaDetail::class)->name('beritaDetail');
Route::get('/kontak', Kontak::class)->name('kontak');


Route::get('/login', Login::class)->middleware('guest')->name('login');
Route::get('/register', Register::class)->middleware('guest')->name('register');
Route::get('/forgot-password', LupaPassword::class)->middleware('guest')->name('forgot-password');

Route::group(['middleware' => ['auth', 'checkrole:Admin']], function () {
    Route::get('dashboard', Dashboard::class)->name('dashboard');

    Route::get('setting/identitas', Setting::class)->name('identitas');
    Route::get('setting/favicon', Favicon::class)->name('favicon');
    Route::get('setting/logo_login', LogoLogin::class)->name('logo_login');
    Route::get('setting/logo_home', LogoHome::class)->name('logo_home');

    Route::get('user/role', Role::class)->name('role');
    Route::get('user/user', User::class)->name('user');

    Route::get('klinik/poli',Poli::class)->name('klinik.poli');
    Route::get('klinik/dokter',Dokter::class)->name('klinik.dokter');
    Route::get('klinik/jadwalpraktek',JadwalPraktek::class)->name('klinik.jadwalpraktek');
    Route::get('klinik/layanan',Layanan::class)->name('klinik.layanan');
    Route::get('klinik/statusbooking',StatusBooking::class)->name('klinik.statusbooking');
    Route::get('klinik/booking',Booking::class)->name('klinik.booking');

    Route::get('berita/kategori',KategoriBerita::class)->name('berita.kategori');
    Route::get('berita/list',Berita::class)->name('berita.list');
});

Route::group(['middleware' => ['auth', 'checkrole:User']], function () {
    Route::get('user/dashboard', UserDashboard::class)->name('user.dashboard');

    Route::get('user/booking', UserBooking::class)->name('user.booking');
});

Route::group(['middleware' => ['auth']], function () {
    Route::get('photouser', PhotoUser::class)->name('photouser');

    Route::get('/logout', function () {
        Auth::logout();
        return redirect('/');
    })->name('logout');
    // Route::get('errorPage', ErrorPage::class);
});
