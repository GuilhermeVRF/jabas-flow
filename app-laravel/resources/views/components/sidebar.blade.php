@push('styles')
    <link rel="stylesheet" href="{{ asset('css/components/sidebar.css') }}">
@endpush

<aside>
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
                <i class="fi fi-rs-loop-square"></i>
                <span class="sidebar-item__text">Recorrências</span>
            </a>
        </li>

        <li class="sidebar-item {{ Route::is('graph.*') ? 'active' : '' }}">
            <a class="sidebar-item__link" href="{{ route('graph.index') }}">
                <i class="fi fi-rs-chart-pie-simple-circle-dollar"></i>
                <span class="sidebar-item__text">Gráficos</span>
            </a>
        </li>

        <li class="sidebar-item {{ Route::is('user.settings.index') ? 'active' : '' }}">
            <a class="sidebar-item__link" href="{{ route('user.settings.index') }}">
                <i class="fi fi-rs-settings"></i>
                <span class="sidebar-item__text">Configurações</span>
            </a>
        </li>
    </ul>
</aside>