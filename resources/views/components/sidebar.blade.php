@push('styles')
    <link rel="stylesheet" href="{{ asset('css/components/sidebar.css') }}">
@endpush

<aside>
    <div class="sidebar-header">
        <img class="sidebar-header__logo" src="{{ asset('images/logo-small.png') }}" alt="Logo">
    </div>
    <ul class="sidebar-list">
        <li class="sidebar-item {{ Route::is('dashboard') ? 'active' : '' }}">
            <a class="sidebar-item__link" href="{{ route('dashboard') }}">
                <i class="fi fi-rs-dashboard-panel"></i>
                <span class="sidebar-item__text">Dashboard</span>
            </a>
        </li>
    </ul>
</aside>