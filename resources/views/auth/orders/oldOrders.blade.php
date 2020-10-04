@extends('auth.layouts.master')

@section('title', 'Админ - Отправленные заказы')

@section('content')
	<div class="container container--admin">
		<div class="col-md-12">
            <h2 class="admin-title">Отправленные заказы</h2>
            @if(count($orders) > 0 )
                <table class="table table-hover border">
                    <thead class="thead-light">
                        <tr>
                            <th>#</th>
                            <th>Имя</th>
                            <th>Телефон</th>
                            <th>Город</th>
                            <th>Когда оформлен</th>
                            <th>Сумма</th>
                            <th>Действия</th>
                        </tr>
                    </thead>
                    <tbody>			
                        @foreach($orders as $order)
                            <tr>
                                <td><b>{{ $loop->iteration }}</b></td>
                                <td>{{ $order->name }}</td>
                                <td>{{ $order->phone}}</td>
                                <td>{{ $order->city}}</td>
                                <td>{{ $order->created_at->format('H:i d/m/Y')}}</td>
                                <td>{{ $order->getPriceWithShipping() }} руб. руб.</td>
                                <td>
                                    <form action="{{ route('order.delete', $order) }}" method="POST">
                                        <a class="btn btn-info" href="{{ route('order-show', $order) }}">Открыть</a>
                                        <input type="submit" class="btn btn-danger" value="Удалить">
                                        @csrf
								    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody> 
                </table>
                <div class="category-pagination">
                    {{$orders->links()}}
                </div>
            @else 
                <div>Скоро здесь будет список заказов!</div>
            @endif
		</div>
	</div>
@endsection
