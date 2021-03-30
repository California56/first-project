@extends('layouts.app')

@section('title')
	Оформление заказа | Сибирский Мухомор
@endsection

@section ('breadcrumb')
	<li class="active">Оформление заказа</li>
@endsection

@section('content')
	<!-- CONTENT -->
	<div class="alert alert-custom alert-secondary" role="alert">
		<h4 class="alert-heading">Оформление заказа</h4>
		<div class="dropdown-divider"></div>
		<p>Общая стоимость заказа: <b>{{ $order->getPriceWithShipping() }}</b> рублей.</p>
	</div>
	<div class="alert alert-custom alert-secondary" role="alert">
		<h4 class="alert-heading">Личные данные</h4>
		<div class="dropdown-divider"></div>
		<div class="container">
			<div class="row">
				<div class="col-md-12 col-md-offset-3">
					<div class="panel panel-primary">
						<div class="panel-body">
							<form action="{{ route('basket-confirm') }}" method="POST">
							<div class="form-group">
								<label class="required" for="userName">Ф.И.О</label>
								@error('userName')
									<div style="color:red;">{{ $message }}</div>
								@enderror
								<input type="text" name="userName" class="form-control shadow-none" placeholder="Иванов Иван Иванович" 
								@auth
									value="{{ old('userName',  Auth::user()->name) }}"
								@endauth
								@guest
									value="{{ old('userName')}}"
								@endguest >
							</div>
							<div class="form-group">
								<label class="required" for="userPhone">Телефон</label>
								@error('userPhone')
									<div style="color:red;">{{ $message }}</div>
								@enderror
								<input type="text" name="userPhone" class="form-control shadow-none" placeholder="+79088769117" 
								@auth
									value="{{ old('userPhone',  Auth::user()->phone) }}"
								@endauth
								@guest
									value="{{ old('userPhone')}}"
								@endguest >
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<h4 class="alert-heading">Адрес для отправки</h4>
		<div class="dropdown-divider"></div>
		<div class="container">
			<div class="row">
				<div class="col-md-12 col-md-offset-3">
					<div class="panel panel-primary">
						<div class="panel-body">
							<div class="form-group">         
								<label class="required" for="userRegion">Страна, Область</label>
								@error('userRegion')
									<div style="color:red;">{{ $message }}</div>
								@enderror
								
								<input type="text" name="userRegion" class="form-control shadow-none" placeholder="Россия, Тюменская область" 
								@auth
									value="{{ old('userRegion',  Auth::user()->region) }}"
								@endauth
								@guest
									value="{{ old('userRegion')}}"
								@endguest >
							</div>
							<div class="form-group">
								<label class="required" for="userCity">Город</label>
								@error('userCity')
									<div style="color:red;">{{ $message }}</div>
								@enderror
								<input type="text" id="userCity" class="form-control shadow-none" name="userCity" placeholder="Екатеринбург" 
								@auth
									value="{{ old('userCity',  Auth::user()->city) }}"
								@endauth
								@guest
									value="{{ old('userCity')}}"
								@endguest >
							</div>
							<div class="form-group">
								<label class="required" for="userAdress">Адрес</label>
								@error('userAdress')
									<div style="color:red;">{{ $message }}</div>
								@enderror
								<input type="text" id="userAdress" class="form-control shadow-none" name="userAdress" placeholder="ул.Пушкина 46"
								@auth
									value="{{ old('userAdress',  Auth::user()->adress) }}"
								@endauth
								@guest
									value="{{ old('userAdress')}}"
								@endguest >
							</div>

							<div class="form-group">
								<label class="required" for="userIndex">Индекс</label>
								@error('userIndex')
									<div style="color:red;">{{ $message }}</div>
								@enderror
								<input type="text" id="userIndex" class="form-control shadow-none" name="userIndex" placeholder="625000"
								@auth
									value="{{ old('userIndex',  Auth::user()->index) }}"
								@endauth
								@guest
									value="{{ old('userIndex')}}"
								@endguest >
							</div>
						</div>
									
						<div class="form-group text-center">
							<button type="submit" class="btn btn-success btn-lg shadow-none" id="submitbtn" name="submit">Оформить заказ</button>
						</div>
						@csrf 
							</form>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection