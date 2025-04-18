@extends('layouts.app')

@section('title', 'Categorias')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/views/category/category.css') }}">
@endpush

@section('content')
    <div class="categoriesContainer">
        <div class="categories-title">
            <h1>Categorias</h1>
        </div>

        <x-partials.category-filter 
            :search="$search"
        />

        <x-partials.category-table 
            :categoriesRelatedToBudgetsCount="$categoriesRelatedToBudgetsCount"
            :categories="$categories" 
        />

    </div>
@endsection