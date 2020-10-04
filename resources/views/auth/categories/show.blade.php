@extends('auth.layouts.master')

@section('title', 'Категория ' . $category->category)

@section('content')
    <div class="container container--admin">
        <div class="col-md-12">
            <h2 class="admin-title">Категория: {{ $category->category }}</h2>
            <table class="table table-bordered">
                <thead class="thead-light">
                    <tr>
                        <th> Поле</th>
                        <th> Значение</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><b>ID</b></td>
                        <td>{{ $category->id }}</td>
                    </tr>
                    <tr>
                        <td><b>Название</b></td>
                        <td>{{ $category->category }}</td>
                    </tr>
                    <tr>
                        <td><b> Описание</b></td>
                        <td>{{ $category->description }}</td>
                    </tr>
                    <tr>
                        <td><b>Кол-во товаров</b></td>
                        <td>{{ $category->products->count() }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>  
@endsection