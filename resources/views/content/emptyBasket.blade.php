@extends('layouts.app')

@section('title')
    Корзина|Сибирский Мухомор 
@endsection

@section ('breadcrumb')
	<li class="active">Корзина</li>
@endsection

@section('content')
    @if(session()->has('success'))
        <div class="emptyCart">
            <div class="row justify-content-center">
                <div class="col-md-7 col-sm-8 col-10">
                    <p>Ваш заказ принят в обработку!<br>
                    Мы перезвоним Вам в ближайшее время!</p>
                    <a href="{{ route('index') }}" class="btn btn-success btn-block shadow-none">Продолжить покупки</a>
                </div>
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