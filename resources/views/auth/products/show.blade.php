@extends('auth.layouts.master')

@section('title', 'Админ - ' . $product->name)

@section('content')
    <div class="container container--admin">
        <div class="col-md-12">
            <h2 class="admin-title">{{ $product->name }}</h2>
            <table class="table table-bordered">
                <thead  class="thead-light">
                    <tr>
                        <th>Поле</th>
                        <th>Значение</th>
                    </tr>
                </thead>  
                <tbody>
                    <tr>
                        <td><b>ID</b></td>
                        <td>{{ $product->id}}</td>
                    </tr>
                    <tr>
                        <td><b>Название</b></td>
                        <td>{{ $product->name }}</td>
                    </tr>
                    <tr>
                        <td><b>Категория</b></td>
                        <td>{{ $product->category->category }}</td>
                    </tr>
                    <tr>
                        <td><b>Описание</b></td>
                        <td>{{ $product->description }}</td>
                    </tr>
                    <tr>
                        <td><b>Картинка</b></td>
                        <td><img src="{{ Storage::url($product->image) }}" height="240px"></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection