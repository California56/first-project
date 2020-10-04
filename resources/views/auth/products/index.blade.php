@extends('auth.layouts.master')

@section('title', 'Админ - Товары')

@section('content')
    <div class="container container--admin">
        <div class="col-md-12">
            <h2 class="admin-title">Товары</h2>
            <table class="table table-hover border">
                <thead class="thead-light">
                    <tr>
                        <th>#</th>
                        <th>Название</th>
                        <th>Категория</th>
                        <th>Действия</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($products as $product)
                        <tr>
                            <td style="width: 60px;"><b>{{ $product->id}}</b></td>
                            <td style="width: 30%;">{{ $product->name }}</td>
                            <td style="width: 32%;" >{{ $product->category->category }}</td>
                            <td>
                                <div class="btn-group" role="group">
                                    <form action="{{ route('products.destroy', $product) }}" method="POST">
                                        <a type="button" class="btn btn-info shadow-none" href="{{ route('products.show', $product) }}">Открыть</a>
                                        <a type="button" class="btn btn-warning shadow-none" href="{{ route('products.edit', $product) }}">Редактировать</a>

                                        @csrf
                                        @method('DELETE')
                                        <input type="submit" class="btn btn-danger shadow-none"  value="Удалить">
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="category-pagination">
                {{ $products->links() }}
            </div>

            <a class="btn btn-success shadow-none" type="button" href="{{ route('products.create') }}">Добавить товар</a>
        </div>
    </div>
@endsection