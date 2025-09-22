<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item">
            <a href="/dashboard" wire:navigate class="nav-link" wire:current="active">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>Dashboard</p>
            </a>
        </li>

        <li class="nav-item {{ request()->segment(1) == 'setting' ? 'menu-open' : '' }}">
            <a href="#" class="nav-link {{ request()->segment(1) == 'setting' ? 'active' : '' }}">
                <i class="nav-icon fas fa-cogs"></i>
                <p>
                    Setting
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a  wire:navigate href="/setting/identitas" class="nav-link" wire:current="active">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Identitas</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a  wire:navigate href="/setting/favicon" class="nav-link" wire:current="active">
                        <i class="far fa-circle nav-icon"></i>
                        <p>favicon</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a  wire:navigate href="/setting/logo_login" class="nav-link" wire:current="active">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Background Login</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a  wire:navigate href="/setting/logo_home" class="nav-link" wire:current="active">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Logo Home</p>
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-item {{ request()->segment(1) == 'user' ? 'menu-open' : '' }}">
            <a href="#" class="nav-link {{ request()->segment(1) == 'user' ? 'active' : '' }}">
                <i class="nav-icon fas fa-users"></i>
                <p>
                    Management User
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a  wire:navigate href="/user/role" class="nav-link" wire:current="active">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Role</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a  wire:navigate href="/user/user" class="nav-link" wire:current="active">
                        <i class="far fa-circle nav-icon"></i>
                        <p>User</p>
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-item {{ request()->segment(1) == 'klinik' ? 'menu-open' : '' }}">
            <a href="#" class="nav-link {{ request()->segment(1) == 'klinik' ? 'active' : '' }}">
                <i class="nav-icon fas fa-heartbeat"></i>
                <p>
                    Klinik
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a  wire:navigate href="/klinik/poli" class="nav-link" wire:current="active">
                        <i class="nav-icon fas fa fa-hotel"></i>
                        <p>Poli</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a  wire:navigate href="/klinik/dokter" class="nav-link" wire:current="active">
                        <i class="nav-icon fas fa fa-child"></i>
                        <p>Dokter</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a  wire:navigate href="/klinik/jadwalpraktek" class="nav-link" wire:current="active">
                        <i class="nav-icon fas fa fa-calendar"></i>
                        <p>Jadwal Praktek</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a  wire:navigate href="/klinik/layanan" class="nav-link" wire:current="active">
                        <i class="nav-icon fas fa fa-heartbeat"></i>
                        <p>Layanan</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a  wire:navigate href="/klinik/statusbooking" class="nav-link" wire:current="active">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Status Booking</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a  wire:navigate href="/klinik/booking" class="nav-link" wire:current="active">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Booking</p>
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-item {{ request()->segment(1) == 'berita' ? 'menu-open' : '' }}">
            <a href="#" class="nav-link {{ request()->segment(1) == 'berita' ? 'active' : '' }}">
                <i class="nav-icon fas fa fa-newspaper"></i>
                <p>
                    Berita
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a  wire:navigate href="/berita/sosialmedia" class="nav-link" wire:current="active">
                        <i class="nav-icon fa fa-share-alt"></i>
                        <p>Sosial Media</p>
                    </a>
                </li>
            </ul>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a  wire:navigate href="/berita/kategori" class="nav-link" wire:current="active">
                        <i class="nav-icon fa fa-tag"></i>
                        <p>Kategori</p>
                    </a>
                </li>
            </ul>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a  wire:navigate href="/berita/list" class="nav-link" wire:current="active">
                        <i class="nav-icon fas fa fa-list"></i>
                        <p>List</p>
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-item">
            <a href="/logout" class="nav-link">
                <i class="nav-icon fas fa-sign-out-alt"></i>
                <p>Logout</p>
            </a>
        </li>
    </ul>
</nav>
