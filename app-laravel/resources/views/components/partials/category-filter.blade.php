@push('styles')
    <link rel="stylesheet" href="{{ asset('css/components/partials/filter.css') }}">
@endpush

<div class="filter">
    <div class="filter-container">
        <form class="category-search" action="{{ route('category.index') }}" method="GET">
            <!-- Filtro por Intervalo de Datas -->
            <div class="form-group">
                <input type="text" id="search" name="search" class="form-control" placeholder="Pesquisar por Nome..." value="{{ $search }}">
            </div>    
            <button type="submit" class="btn-small submitBtn"><i class="fi fi-rs-search"></i></button>
        </form>
    </div>
    
    <a href="{{ route('category.create') }}" class="btn submitBtn">Adicionar Categoria</a>
</div>