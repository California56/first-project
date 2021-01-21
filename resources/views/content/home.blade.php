@extends('layouts.app')

@section('title')
	Сибирский Мухомор - Главная
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
		<p>У нас Вы можете купить Мухоморы в Тюмени, а также мы можем отправляем заказы по всей России и не только!</p>
		<p>
			Мухомор собирается в тайге Сибири, в экологически чистой таёжной зоне Ханты-Мансийского округа. 
            Сбор производится населением Ханты в сухую погоду и срезается деревянным еловым ножом.
            Шляпки сушаться в естественных условиях, холодным знахарским способом прямо в тайге. 
            Мухомор перед сушкой не чистится и не моется, шляпки как большие так и маленькие, без отбора.
            Хранение мухоморов на длительный период производится в гермитичном хранилище, в огромных балаклавах без доступа кислорода.
            Абсолютно все целебные свойства гриба сохраняются при сушке и хранении.
		</p>
	</div>

	<h4 class="alert-heading">Мухомор Красный</h4>
	<div class="dropdown-divider"></div>

	<div class="content__shop">
		<div class="row">
			@foreach($products as $product)
				@include('inc.card')
			@endforeach
		</div>
	</div>  
@endsection