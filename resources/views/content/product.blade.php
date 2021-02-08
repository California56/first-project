@extends('layouts.app')

@section('title')
    {{$product->name}} | Сибирский Мухомор
@endsection

@section('meta-description')
	<meta name="description" content="Купить {{$product->name}} в Тюмени. Всегда в наличии! Отправка в в день заказа. Оформите заказ у нас на сайте!">
@endsection

@section('breadcrumb')
    <li class="active li-max"><a href="{{ route('category', $category) }}">{{$category->category}}</a></li>
    <li class="li-max">|</li>
    <li class="breadcrumb-product">{{$product->name}}</li>
@endsection

@section('content')
    @if(session()->has('basketAdd-success'))
		<div class="alert alert-secondary alert-custom text-center">
			<div class="font-middle">{{ session()->get('basketAdd-success') }} добавлен в корзину! Перейти к <a href="{{ route('basket') }}">оформлению заказа</a></div>
		</div>
	@endif
    <div class="alert alert-custom alert-secondary" role="alert">
        <h4 class="alert-heading">{{$product->name}}</h4>
        <div class="dropdown-divider"></div>
        <div class="row justify-content-between product-row" >
            <div class=" col-lg-8 col-sm-12 product-photo">
                <img class="image" src="{{ Storage::url($product->image)}}">
            </div>

            <div class="alert alert-custom alert-secondary col-lg-4 col-sm-12 product-info">
                <h4>Информация</h4>
                <div class="product-stats">
                    <p><b>Наличие:</b> В наличии.</p>

                    @if($product->category_id == 6)
                        <p><b>Вес:</b> <span class="shop__digits shop__digits--product"> {{$product->weight}} </span> грамм.</p>
                    @else 
                        <p><b>Вес:</b> <span class="shop__digits shop__digits--product"> {{$product->weight}} </span> кг.</p>
                    @endif
        
                    <p><b>Цена:</b> <span class="shop__digits shop__digits--product"> {{$product->price}} </span> рублей.</p>
                </div>
                
                <form action="{{ route('basket-add', $product)}}" method="POST">
			        <button type="submit" class="shop__addToCart shop__addToCart--product">В корзину</button>
			        @csrf
		        </form>
            </div>
        </div>
    </div>

    <div class="alert alert-custom alert-secondary product-description">
        <h4>Описание</h4>
        <div class="dropdown-divider"></div>
        <p style="white-space:pre;">{{ $product->description }}</p>
    </div>	
@endsection