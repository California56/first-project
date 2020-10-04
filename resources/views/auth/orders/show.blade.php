@extends('auth.layouts.master')

@section('title', 'Админ - Заказ:' . $order->id)

@section('content')
    <div class="container container--admin">
        <div class="col-md-12">
            <h2 class="admin-title">Заказ: №{{ $order->id }}</h2>
            @if(!is_null($order->user_id))
                <p>
                    Заказ оформлен с зарегистрированного пользователя, поэтому при отправке измените статус заказа и напишите трек-номер, 
                    чтобы покупатель мог увидеть его в своем личном кабинете.
                </p>
            @else
                <p>Заказ оформлен без регистрации.</p>
            @endif

            <table class="table table-bordered ">
                <thead class="thead-light">
                    <tr>
                        <th colspan="2">
                            <h4>Имя и адрес покупателя</h4>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @if(!is_null($order->user_id))
                        <tr>
                            <td ><b>Идентификатор:</b></td>
                            <td>{{ $order->user_id }}</td>
                        </tr>
                    @endif
                    <tr>
                        <td><b>Имя</b></td>
                        <td>{{ $order->name }}</td>
                    </tr>
                    <tr>
                        <td><b>Телефон</b> </td>
                        <td>{{ $order->phone }}</td>
                    </tr>
                    <tr>
                        <td><b> Область</b></td>
                        <td>{{ $order->region }}</td>
                    </tr>
                    <tr>
                        <td><b>Город</b></td>
                        <td>{{ $order->city }}</td>
                    </tr>
                    <tr>
                        <td><b>Адрес</b></td>
                        <td>{{ $order->adress }}</td>
                    </tr>
                    <tr>
                        <td><b>Индекс</b></td>
                        <td>{{ $order->index }}</td>
                    </tr>
                
                    @if($order->status == 2)
                        <tr>
                            <td ><b>Статус:</b></td>
                            <td>Отправлен</td>
                        </tr>
                        <tr>
                            <td ><b>Трек-номер</b></td>
                            <td>{{$order->track_number }}</td>
                        </tr>
                    @endif
                </tbody>
            </table>

            <table class="table table-bordered">
                <thead class="thead-light">
                    <tr>
                        <th colspan="6">
                            <h4>Детали заказа</h4>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr >
                        <th scope="col">Товар</th>
                        <th scope="col">Описание</th>
                        <th scope="col">Цена</th>
                        <th scope="col">Количество</th>
                        <th scope="col">Итого</th>
                    </tr>
                    @foreach($order->products as $product)
                        <tr>
                            <td style="width: 15%"><img class="image image--cart" src="{{Storage::url($product->image)}}"></td>
                            <td><a href="{{route('product', [$product->category,$product->id])}}">{{$product->name}}</a></td>
                            <td>{{$product->price}} руб.</td>
                            <td>{{$product->pivot->count}}</td>
                            <td>{{$product->getPriceForCount()}} руб.</td>
                        </tr>
                    @endforeach
                </tbody>
		    </table>
            <table class="table table-bordered">
                <thead class="thead-light">
                    <tr>
                        <th colspan="6">
                            <h4>Итого:</h4>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td colspan="3"><h5> Стоимость товаров:</h5></td>
                        <td colspan="2"><span class="shop__digits">{{ $order->getFullPrice() }} руб.</span></td>
                    </tr>
                    <tr>
                        <td colspan="3"><h5>Стоимость доставки:</h5></td>
                        <td colspan="2"><span class="shop__digits">{{ $order->shipping }} руб.</span> </td>
                    </tr>
                    <tr>
                        <td colspan="3"><h5>Всего:</h5></td>
                        <td colspan="2"><span class="shop__digits">{{ $order->getPriceWithShipping() }} руб.</span></td>
                    </tr>
                </tbody>
		    </table>

            @if($order->status == 1)
                <form action="{{ route('order-change', $order) }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="order_status"><h5>Статус заказа:</h5> </label>
                        <select name="order_status" id="order_status" class="form-control shadow-none">
                                <option value="1" selected>Обрабатывается</option>
                                <option value="2">Отправлен</option>
                        </select>
                    </div>

                    @if(!is_null($order->user_id))
                        <div class="form-group">
                            <label for="track-number">Трек-номер: </label>
                            <input type="text" class="form-control form_input shadow-none" name="track_number" id="track_number" value="">
                        </div>
                    @endif

                    <div class="text-center" >
                        <input type="submit" class="btn btn-primary btn-lg shadow-none" value="Сохранить">
                    </div>
                </form>
            @endif
        </div>
    </div>  
@endsection