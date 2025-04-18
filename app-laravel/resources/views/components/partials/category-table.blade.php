@push('styles')
    <link rel="stylesheet" href="{{ asset('css/components/partials/table.css') }}">
    <link rel="stylesheet" href="{{ asset('css/components/partials/categoryTable.css') }}">
@endpush

<div class="table-container">
    <div class="table-header">
        <div class="header-cell">Nome</div>
        <div class="header-cell">Cor</div>
        <div class="header-cell">Orçamentos relacionados</div>
        <div class="header-cell">Data de criação</div>
        <div class="header-cell">Ações</div>
    </div>
    <div class="table-body">
        @foreach ($categories as $category)
            <div class="table-row">
                <div class="cell cell-text" data-label="Nome">{{ $category->name }}</div>
                <div class="cell" data-label="Cor">
                    <div class="color-box" style="background-color: {{ $category->color }}"></div>
                </div>
                <div class="cell" data-label="Orçamentos">{{ $categoriesRelatedToBudgetsCount[$category->name] }}</div>
                <div class="cell" data-label="Data de criação">{{ $category->created_at->format('d/m/Y') }}</div>
                <div class="cell cell-actions">
                    <a class="cell-action" href="{{ route('category.edit', $category->id) }}" data-tooltip="Editar"><i class="fi fi-rs-edit"></i></a>
                    <a class="cell-action" href="{{ route('category.destroy', $category->id) }}" data-tooltip="Deletar"><i class="fi fi-rs-trash"></i></a>    
                </div>
            </div>
        @endforeach
</div>
{{ $categories->links('components.pagination') }}
