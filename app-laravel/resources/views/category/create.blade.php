@extends('layouts.app')

@section('title', 'Adicionar Categoria')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/views/category/upsert.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@simonwep/pickr/dist/themes/nano.min.css"/>    
@endpush

@section('content')
    <div class="upsertCategoryContainer">
        <form action="{{ route('category.store') }}" method="POST" class="upsertCategoryForm">
            <h1>Adicionar Categoria</h1>
            @csrf

            <div class="form-group">
                <label>Categorias pré-cadastradas</label>
                <div class="preRegisteredCategoriesContainer">
                    @foreach ($preRegisteredCategories as $name => $color)
                        @if(!in_array($name, $userCategoriesNames))
                            <div class="preRegisteredCategory">
                                <input type="radio" name="preRegisteredCategory" value="{{ $name }}" data-color="{{ $color }}">
                                <div class="preRegisteredCategoryColor" style="background-color: {{ $color }};"></div>
                                <span>{{ $name }}</span>  
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
            
            <div class="customCategoryContainer">
                <h2>Categoria</h2>
                <div class="form-group">
                    <label for="name">Nome</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Nome">
                </div>

                <div class="form-group">
                    <label for="color">Cor</label>
                    <x-partials.input-color color="#000000" :previewUserColors="$previewUserColors"/>
                </div>
            </div>

            <div class="button-group">
                <a href="{{ route('category.index') }}" class="btn secondaryBtn">Listar Categorias</a>
                <button type="submit" class="btn submitBtn">Salvar</button>
            </div>

        </form>
    </div>
@endsection

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/@simonwep/pickr/dist/pickr.min.js"></script>
    <script src="{{ asset('js/views/category/create.js') }}"></script>
@endpush

