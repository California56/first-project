@extends('layouts.app')

@section('title')
    Корзина | Сибирский Мухомор 
@endsection

@section ('breadcrumb')
	<li class="active">Корзина</li>
@endsection

@section('content')
    @if(session()->has('success'))

        <div class="alert alert-custom alert-secondary product-description">
            <h4>Ваш заказ принят!</h4> 
            <div class="dropdown-divider"></div>

            <div class="cabinet-block">
                <div class="row justify-content-center">
                    <div class="col-md-12">
                        <p>Благодарим за оформление заказа!</p>
                        <p>Оплатить заказ можно на карту Сбербанка по номеру телефона <a class="link_attention" href="#" class="disabled"> 8-908-876-91-17</a></p>
                        <p>Мы позвоним Вам по номеру, указанному в оформлении заказа, в течение 30 минут, чтобы подтвердить заказ.</p>
                        <p>Заказ отправляется после оплаты, в ближайщее возможное время.</p>
                        <!-- <ul>
                            <li class="pb-1">Благодарим за оформление заказа!</li>
                            <li class="pb-1">Оплатить заказ можно на карту Сбербанка по номеру телефона <a class="link_attention" href="#" > 8-908-876-91-17</a></li>
                            <li class="pb-1">Мы позвоним Вам по номеру, указанному в оформлении заказа, в течение 30 минут, чтобы подтвердить заказ.</li>
                            <li class="pb-1">Заказ отправляется после оплаты, в ближайщее возможное время.</li>
                        </ul> -->
                    </div>
                </div>
            </div>

            <div class="row justify-content-center">
            <div class="col-md-3">
            <a href="{{ route('index') }}" class="btn btn-success btn-block shadow-none">Вернуться на главную</a>
            </div>
        </div>
    @else
        <div class="emptyCart">
            <div class="row justify-content-center">
                <div class="col-md-6 col-sm-8 col-10">
                    <p>Ваша корзина пуста!</p>
                    <a href="{{ route('index') }}" class="btn btn-success btn-block shadow-none">Перейти к покупкам</a>
                </div>
            </div>
        </div>
	@endif
@endsection