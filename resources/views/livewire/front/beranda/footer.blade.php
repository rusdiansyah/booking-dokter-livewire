<footer id="footer" class="footer position-relative light-background">

    <div class="container footer-top">
        <div class="row gy-4">
            <div class="col-lg-4 col-md-6 footer-about">
                <a href="index.html" class="logo d-flex align-items-center">
                    <span class="sitename">{{ config('app.name') }}</span>
                </a>
                <div class="footer-contact pt-3">
                    @if ($setting)
                        <p>{{ $setting->alamat }}</p>
                    @endif

                </div>
                <div class="social-links d-flex mt-4">
                    @php
                        $sosialmedia = App\Models\SosialMedia::all();
                    @endphp
                    @foreach ($sosialmedia as $sm)
                    <a href="{{ $sm->url }}"><i class="{{ $sm->icon }}"></i></a>
                    @endforeach
                </div>
            </div>

            <div class="col-lg-2 col-md-3 footer-links">
                <h4>Menu</h4>
                <ul>
                    <li><a wire:navigate href="/beranda">Beranda</a></li>
                    <li><a wire:navigate href="/list_layanan">Layanan</a></li>
                    <li><a wire:navigate href="/list_dokter">Dokter</a></li>
                    <li><a wire:navigate href="/list_poli">Poli</a></li>
                    <li><a wire:navigate href="/list_berita">Berita</a></li>
                    <li><a wire:navigate href="/kontak">Kontak</a></li>
                </ul>
            </div>



        </div>
    </div>

    <div class="container copyright text-center mt-4">
        <p>© <span>Copyright</span> <strong class="px-1 sitename">{{ $setting->copyright ?? '' }}</strong> <span>All Rights
                Reserved</span></p>
        <div class="credits">
            Designed by {{ config('app.name') }}
        </div>
    </div>

</footer>
