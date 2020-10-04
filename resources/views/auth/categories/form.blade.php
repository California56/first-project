@extends('auth.layouts.master')

@isset($category)
    @section('title', 'Админ - Редактировать: ' . $category->category)
@else
    @section('title', 'Админ - Создать категорию')
@endisset

@section('content')
    <div class="container container--admin">
        <div class="col-md-12">
            @isset($category)
                <h2 class="admin-title">Редактировать: {{ $category->category }}</h2>
            @else
                <h2 class="admin-title">Добавить Категорию</h2>
            @endisset

            <form method="POST"
                @isset($category)
                    action="{{ route('categories.update', $category) }}"
                @else
                    action="{{ route('categories.store') }}"
                @endisset
            >
                <div>
                    @isset($category)
                        @method('PUT')
                    @endisset
                    @csrf
                    
                    <div class="form-group">      
                        <label for="category" >Название: </label>
                        @error('category')
                            <div class="alert alert-danger">{{ $message }}</div>
                         @enderror
                        <input type="text" class="form-control shadow-none" name="category" id="category" value="{{ old('category', isset($category) ? $category->category : null) }}">
                    </div>
                   
                    <div class="form-group">
                        <label for="description" >Описание: </label>
                        @error('description')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <textarea name="description" id="description" class="form-control shadow-none" cols="151" rows="5">{{ old('description', isset($category) ? $category->description : null) }}</textarea>
                    </div>

                    <div class="text-center">
                        <button class="btn btn-primary btn-lg shadow-none">Сохранить</button>
                    </div>
                </div>
            </form>
        </div>
    </div> 
@endsection