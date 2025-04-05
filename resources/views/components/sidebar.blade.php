@push('styles')
    <link rel="stylesheet" href="{{ asset('css/components/sidebar.css') }}">
@endpush

<aside>
    <div class="sidebar-header">
        <img class="sidebar-header__logo" src="{{ asset('images/logo-small.png') }}" alt="Logo">
    </div>
    <ul class="sidebar-list">
        <li class="sidebar-item {{ Route::is('dashboard', 'budget.*') ? 'active' : '' }}">
            <a class="sidebar-item__link" href="{{ route('dashboard') }}">
                <i class="fi fi-rs-dashboard-panel"></i>
                <span class="sidebar-item__text">Dashboard</span>
            </a>
        </li>

        <li class="sidebar-item {{ Route::is('category.index', 'category.*') ? 'active' : '' }}">
            <a class="sidebar-item__link" href="{{ route('category.index') }}">
                <i class="fi fi-rs-category"></i>
                <span class="sidebar-item__text">Categorias</span>
            </a>
        </li>

        <li class="sidebar-item {{ Route::is('recurrence.*') ? 'active' : '' }}">
            <a class="sidebar-item__link" href="{{ route('recurrence.index') }}">
                <i class="fi fi-rs-category"></i>
                <span class="sidebar-item__text">Recorrências</span>
            </a>
        </li>
    </ul>
</aside>