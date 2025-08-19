<div>
    <a class="nav-link" data-toggle="dropdown" href="#">
        <i class="far fa-bell"></i>
        <span class="badge badge-warning navbar-badge">{{ $data->count() }}</span>
    </a>
    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
        <div class="dropdown-divider"></div>
        @foreach ($data as $item)
            <a wire:navigate href="{{ route('klinik.booking') }}" class="dropdown-item">
                <i class="fas fa-envelope mr-2"></i> {{ $item->user->name }}
                <span class="float-right text-muted text-sm">3 mins</span>
            </a>
        @endforeach
        <a wire:navigate href="{{ route('klinik.booking') }}" class="dropdown-item dropdown-footer">See All
            Notifications</a>
    </div>
</div>
