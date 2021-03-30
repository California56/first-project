@extends('layouts.app')

@section('title')
	Купить Мухоморы в Тюмени | Сибирский Мухомор
@endsection

@section('meta-description')
	<meta name="description" content="Купить мухоморы. Купить мухомор из Сибири. У нас можно купить мухоморы в Тюмени. Оптом и в розницу. Низкие цены. Всегда в наличии. Отправка в в день заказа. Оформите заказ у нас на сайте!">
@endsection

@section ('breadcrumb')
	<li class="active">Добро пожаловать!</li>
@endsection

@section('content')

	@if(session()->has('basketAdd-success'))
		<div class="alert alert-secondary alert-custom text-center">
			<div class="font-middle">{{ session()->get('basketAdd-success') }} добавлен в корзину! Перейти к <a href="{{ route('basket') }}">оформлению заказа</a></div>
		</div>
	@endif
	<div class="alert alert-custom alert-secondary" role="alert">
		<h4 class="alert-heading">Добро пожаловать!</h4>
        <div class="dropdown-divider"></div>
		<p>У нас Вы можете купить Мухоморы в Тюмени, а также мы отправляем заказы по всей России и не только!</p>
		<p>
			Мухомор собирается в тайге Сибири, в экологически чистой таёжной зоне Ханты-Мансийского округа. 
            Сбор производится населением Ханты в сухую погоду.
			Сушка производится в естественных условиях прямо в тайге в специальных деревянных схронах. 
			Мухомор очищается перед сушкой, а также перебирается после сушки.
			Хранение происходит в герметичном хранилище, в огромных балаклавах.<br>
            При хранении и перевозке — все ценнейшие целительные свойства остаются в грибе.
		</p>
		<p>Перейти к <a class="link_attention" href="{{route('category', 6)}}">полному каталогу</a>.</p>
		<p>
		</p>
	</div>

	<h4 class="alert-heading alert-heading--mobile">Красный | Пантерный</h4>
	<div class="dropdown-divider"></div>

	<div class="content__shop">
		<div class="row">
			@foreach($products1 as $product)
				@include('inc.card')
			@endforeach
			@foreach($products2 as $product)
				@include('inc.card')
			@endforeach
		</div>
	</div>  
@endsection