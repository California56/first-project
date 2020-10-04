@extends('auth.layouts.master')

@isset($category)
    @section('title', 'Админ - Редактировать: ' . $product->name)
@else
    @section('title', 'Админ - Создать товар')
@endisset

@section('content')
    <div class="container container--admin">
        <div class="col-md-12">
            @isset($product)
                <h2 class="admin-title">Редактировать: {{ $product->name }}</h2>
            @else
                <h2 class="admin-title">Добавить товар</h2>
            @endisset

            <form method="POST" enctype="multipart/form-data"
                @isset($product)
                    action="{{ route('products.update', $product) }}"
                @else
                    action="{{ route('products.store') }}"
                @endisset
            >
                <div>
                    @isset($product)
                        @method('PUT')
                    @endisset
                    @csrf
            
                    <div class="form-group">
                        <label for="name">Название: </label>
                        @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <input type="text" class="form-control shadow-none" name="name" id="name" value="{{ old('name', isset($product) ? $product->name : null) }}">
                    </div>

                    <div class="form-group">
                        <label for="weight">Вес/Объём: </label>
                        @error('weight')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <input type="text" class="form-control shadow-none" name="weight" id="weight" value="{{ old('weight', isset($product) ? $product->weight : null) }}">
                    </div>

                    <div class="form-group">
                        <label for="price">Цена: </label>
                        @error('price')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <input type="text" class="form-control form_input shadow-none" name="price" id="price" value="{{ old('price', isset($product) ? $product->price : null) }}">
                    </div>

                    <div class="form-group">
                        <label for="category_id">Категория: </label>
                        <select name="category_id" id="category_id" class="form-control shadow-none">
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}"
                                        @isset($product)
                                        @if($product->category_id == $category->id)
                                        selected
                                    @endif
                                    @endisset
                                >{{ $category->category }}</option>
                            @endforeach
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label for="description">Описание: </label>
                        @error('description')
                            <div class="alert alert-danger">{{ $message }}</div>
                         @enderror
                        <textarea name="description" id="description" class="form-control shadow-none" cols="151" rows="5">{{ old('description', isset($product) ? $product->description : null) }}</textarea>
                    </div>
                   
                    <div class="form-group">
                        <label for="image" style="margin-right:30px">Картинка: </label>
                        <label class="btn btn-outline-info shadow-none">
                            Загрузить <input type="file" style="display: none;" name="image" id="image">
                        </label>
                    </div>
                    
                    <div class="text-center">
                        <button class="btn btn-primary btn-lg shadow-none">Сохранить</button>
                    </div>
                    
                </div>
            </form>
        </div>
    </div> 
@endsection