@extends('layouts.app')

@section('title', "Editrar Categoria $category->id")

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/views/category/upsert.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@simonwep/pickr/dist/themes/nano.min.css"/>    
@endpush

@section('content')
    <div class="upsertCategoryContainer">
        <form action="{{ route('category.update', $category->id) }}" method="POST" class="upsertCategoryForm">
            <h1>Editar Categoria</h1>
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="name">Nome</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Nome" value="{{ $category->name }}">
            </div>

            <div class="form-group">
                <label for="color">Cor</label>
                <x-partials.input-color :color="$category->color" :previewUserColors="$previewUserColors"/>
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
@endpush

