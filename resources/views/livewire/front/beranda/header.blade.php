<div>
    <header id="header" class="header d-flex align-items-center fixed-top">
        <div
            class="header-container container-fluid container-xl position-relative d-flex align-items-center justify-content-between">

            <a href="/" class="logo d-flex align-items-center me-auto me-xl-0">
                <svg class="my-icon" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <g id="bgCarrier" stroke-width="0"></g>
                    <g id="tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                    <g id="iconCarrier">
                        <path d="M22 22L2 22" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
                        <path
                            d="M17 22V6C17 4.11438 17 3.17157 16.4142 2.58579C15.8284 2 14.8856 2 13 2H11C9.11438 2 8.17157 2 7.58579 2.58579C7 3.17157 7 4.11438 7 6V22"
                            stroke="currentColor" stroke-width="1.5"></path>
                        <path opacity="0.5"
                            d="M21 22V8.5C21 7.09554 21 6.39331 20.6629 5.88886C20.517 5.67048 20.3295 5.48298 20.1111 5.33706C19.6067 5 18.9045 5 17.5 5"
                            stroke="currentColor" stroke-width="1.5"></path>
                        <path opacity="0.5"
                            d="M3 22V8.5C3 7.09554 3 6.39331 3.33706 5.88886C3.48298 5.67048 3.67048 5.48298 3.88886 5.33706C4.39331 5 5.09554 5 6.5 5"
                            stroke="currentColor" stroke-width="1.5"></path>
                        <path d="M12 22V19" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
                        <path opacity="0.5" d="M10 12H14" stroke="currentColor" stroke-width="1.5"
                            stroke-linecap="round"></path>
                        <path opacity="0.5" d="M5.5 11H7" stroke="currentColor" stroke-width="1.5"
                            stroke-linecap="round"></path>
                        <path opacity="0.5" d="M5.5 14H7" stroke="currentColor" stroke-width="1.5"
                            stroke-linecap="round"></path>
                        <path opacity="0.5" d="M17 11H18.5" stroke="currentColor" stroke-width="1.5"
                            stroke-linecap="round"></path>
                        <path opacity="0.5" d="M17 14H18.5" stroke="currentColor" stroke-width="1.5"
                            stroke-linecap="round"></path>
                        <path opacity="0.5" d="M5.5 8H7" stroke="currentColor" stroke-width="1.5"
                            stroke-linecap="round"></path>
                        <path opacity="0.5" d="M17 8H18.5" stroke="currentColor" stroke-width="1.5"
                            stroke-linecap="round"></path>
                        <path opacity="0.5" d="M10 15H14" stroke="currentColor" stroke-width="1.5"
                            stroke-linecap="round"></path>
                        <path d="M12 9V5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                            stroke-linejoin="round"></path>
                        <path d="M14 7L10 7" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                            stroke-linejoin="round"></path>
                    </g>
                </svg>

                <h1 class="sitename">{{ config('app.name') }}</h1>
            </a>

            <nav id="navmenu" class="navmenu">
                <ul>
                    <li><a wire:navigate href="/beranda" wire:current="active">Beranda</a></li>
                    <li><a wire:navigate href="/list_dokter" wire:current="active">Dokter</a></li>
                    <li><a wire:navigate href="/list_layanan" wire:current="active">Layanan</a></li>
                    <li><a wire:navigate href="/list_poli" wire:current="active">Poli</a></li>
                    <li><a wire:navigate href="/list_berita" wire:current="active">Berita</a></li>
                    <li><a wire:navigate href="/kontak" wire:current="active">Kontak</a></li>
                </ul>
                <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
            </nav>

            <a class="btn-getstarted" href="/login">Login</a>

        </div>
    </header>
</div>
