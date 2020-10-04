@extends('layouts.app')

@section('title')
	Личный кабинет
@endsection

@section ('breadcrumb')
	<li class="active">Личный кабинет</li>
@endsection

@section('content')
    <div class="alert alert-custom alert-secondary product-description">
        <h4>История заказов</h4> 
        <div class="dropdown-divider"></div>

        @if(count($orders) == 0)
            <div class="cabinet-block">
                <div class="row justify-content-center">
                    <div class="col-md-12 text-center">
                        Здесь можно будет узнать статус заказа и его трек-номер.
                    </div>
                </div>
            </div>
        @else

        <div class="table-responsive-sm">
            <table class="table table-striped border table-cart">
                <thead>
                    <tr>
                        <th scope="col">Дата</th>
                        <th scope="col">Товар</th>
                        <th scope="col">Сумма</th>
                        <th scope="col">Статус</th>
                        <th scope="col">Трек-номер</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($orders as $order)
                        @if($order->status > 0)
                            <tr>
                                <td>{{$order->created_at->format('d.m.Y')}}</td>
                                <td>
                                    @foreach($order->products as $product)
                                        @if($loop->last)
                                            <a href="{{ route('product',[$product->category_id, $product->id]) }}">{{$product->name}}</a>
                                        @else
                                            <a href="{{ route('product',[$product->category_id, $product->id]) }}">{{$product->name}}</a><br>
                                        @endif
                                    @endforeach
                                </td>
                                <td>{{$order->getPriceWithShipping()}} руб.</td>
                                <td>{{ $order->orderStatus() }}</td>
                                <td>{{ $order->orderTrackNUmber() }}</td>
                            </tr>
                        @endif
                    @endforeach
                </tbody>
            </table>	
        </div>
        @endif
        <br>
        <div class="row justify-content-center">
            <div class="col-md-3">
                <a href="{{route('get-logout')}}" class="btn btn-success btn-block shadow-none">Выход</a>
            </div>
        </div>
    </div>
@endsection