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

        <li class="sidebar-item {{ Route::is('budget.create') ? 'active' : '' }}">
            <a class="sidebar-item__link" href="{{ route('budget.create') }}">
                <i class="fi fi-rs-checklist-task-budget"></i>
                <span class="sidebar-item__text">Adicionar Orçamento</span>
            </a>
        </li>

        <li class="sidebar-item {{ Route::is('category.index') ? 'active' : '' }}">
            <a class="sidebar-item__link" href="{{ route('category.index') }}">
                <i class="fi fi-rs-category"></i>
                <span class="sidebar-item__text">Categorias</span>
            </a>
        </li>
    </ul>
</aside>