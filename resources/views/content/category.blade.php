@extends('layouts.app')

@section('title')
	@if($category->id == 6)
		Купить Мухоморы в Тюмени | Сибирский Мухомор
	@else
		Купить Мухоморы Оптом | Сибирский Мухомор
	@endif
@endsection

@section('meta-description')
	@if($category->id == 6)
		<meta name="description" content="Купить мухоморы. Купить сушеные шляпки Мухомора из Сибири. Мощный сибирский гриб! В нашем интернет-магазине можно купить мухоморы сушеные. Низкие цены. Отправка в день заказа. Всегда в наличии. Оформляйте заказ на сайте">
	@else
		<meta name="description" content="Купить мухоморы оптом. Крупный и мелкий ОПТ. Самая низкая цена за килограмм в России! У нас можно купить мухоморы оптом. Отправка транспортной компанией в день заказа. Всегда в наличии! Звоните +7(908)876-91-17">
	@endif
	
@endsection

@section ('breadcrumb')
	<li class="active"><a href="{{ route('category', $category) }}">{{$category->category}}</a></li>
@endsection

@section('content')
	@if(session()->has('basketAdd-success'))
		<div class="alert alert-secondary alert-custom text-center">
			<div class="font-middle">{{ session()->get('basketAdd-success') }} добавлен в корзину! Перейти к <a href="{{ route('basket') }}">оформлению заказа</a></div>
		</div>
	@endif

	<div class="alert alert-custom alert-secondary" role="alert">
		<h4 class="alert-heading">{{$category->category}} </h4>
		<div class="dropdown-divider"></div>
		{{$category->description}}
	</div>

	<div class="content__shop">
		<div class="row">
			@foreach($products as $product)
				@include('inc.card')
			@endforeach 
		</div>
	</div> 

	@if(count($products) == 0)
		<div class="emptyCart">
            <div class="row justify-content-center">
                <div class="col-md-6 col-sm-8 col-10">
                    <p>Здесь скоро появятся новые товары!</p>
                    <a href="{{ route('index') }}" class="btn btn-success btn-block shadow-none">Вернуться на главную</a>
                </div>
            </div>
        </div>
	@endif

	<div class="category-pagination">
		{{ $products->links() }}
	</div>

@endsection