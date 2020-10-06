<div class="header">
	<div class="header-contacts">
		<i class="fas fa-phone-square-alt"></i>
		<a href="https://wa.me/79088769117" class="classic-link"> 8-908-876-91-17</a>
		<i class="fas fa-at"></i>
		<a href="mailto:voshod8574@mail.ru" class="classic-link">voshod8574@mail.ru</a>
	</div>

	<div class="row">
		<div class="col-xs-12 col-md-9">
			<img class="logo-img" src="{{asset('images/logo.png')}}">
		</div>		
		<div class="col-xs-12 col-md-3 client-items d-none d-sm-none d-md-none d-lg-block">
			<div class="row">
				@guest
					<div class="col-4 offset-md-2  client-login ">
						<a href="{{ route('login') }}" class="text-secondary">
							<p class="text-center client-icon">
								<i class="fas fa-user"></i>
							</p>
							<p class="text-center">
								Вход
							</p>
						</a>
					</div>			
				@endguest
				@auth
					<div class="col-4 offset-md-2  client-login ">
						<a href="{{ route('cabinet') }}" class="text-secondary">
							<p class="text-center client-icon">
								<i class="fas fa-user"></i>
							</p>
							<p class="text-center">
								Личный кабинет
							</p>
						</a>
					</div>
				@endauth
				<div class="col-5 col-xs-3 client-cart">
					<a href="{{ route('basket') }}" class="text-secondary">
						<p class="text-center client-icon">
							<i class="fas fa-shopping-cart"></i>
						</p>
						<p class="text-center">
							@if(isset($cartQuantity) && $cartQuantity > 0)
								Корзина ({{$cartQuantity}})
							@else 
								Корзина
							@endif
						</p>
					</a>
				</div>
				<div class="col-1"></div>	
			</div>
		</div>
	</div>
		
	<nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #008E3A">
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>

		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="nav navbar-nav mr-auto nav-fill">
				<li class="nav-item dropdown">
					<a class="nav-link nav-link--menu dropdown-toggle shadow-none" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						Каталог товаров
					</a>
					<div class="dropdown-menu" aria-labelledby="navbarDropdown">
						@foreach($categoryList as $oneCategory)
							@if($loop->last)
							<a class="dropdown-item" href="{{route('category', $oneCategory->id)}}">{{$oneCategory->category}}</a>
							@else
							<a class="dropdown-item" href="{{route('category', $oneCategory->id)}}">{{$oneCategory->category}}</a>
							<div class="dropdown-divider"></div>
							@endif
						@endforeach
					</div>
				</li>
				<li class="nav-item">
					<a class="nav-link nav-link--menu" href="{{ route('kak-zakazat') }}">Как заказать</a>
				</li>
				<li class="nav-item">
					<a class="nav-link nav-link--menu" href="{{ route('oplata-i-dostavka') }}">Оплата и доставка</a>
				</li>
				<li class="nav-item">
					<a class="nav-link nav-link--menu" href="{{ route('contacts') }}">Контакты</a>
				</li>
				<li class="nav-item">
					<a class="nav-link nav-link--menu" href="{{ route('reviews') }}">Отзывы</a>
				</li>
				<li class="nav-item d-lg-none">
					@guest
						<a href="{{ route('login') }}" class="nav-link nav-link--menu">Вход</a>
					@endguest
					@auth
						<a href="{{ route('cabinet') }}" class="nav-link nav-link--menu">Личный кабинет</a>
					@endauth
				</li>
				<li class="nav-item d-lg-none">
					<a class="nav-link nav-link--menu" href="{{ route('basket') }}">Корзина</a>
				</li>
			</ul>
		</div>
	</nav>
</div>