@extends('layouts.app')

@section('title')
	Сибирский Мухомор - Регистрация
@endsection

@section('breadcrumb')
	<li class="active">Регистрация</li>
@endsection

@section('content')
    <div class="alert alert-custom alert-secondary" role="alert">
		<h4 class="alert-heading">Личные данные</h4>
		<div class="dropdown-divider"></div>
		<div class="container">
			<div class="row">
				<div class="col-md-12 col-md-offset-3">
					<div class="panel panel-primary">
						<div class="panel-body">
							<form method="POST" action="{{ route('register') }}" aria-label="Register">
								<div class="form-group">
									<label class="required" for="name">Ф.И.О.</label>
									@error('name')
										<div style="color:red;">{{ $message }}</div>
									@enderror
									<input type="text" id="name" class="form-control shadow-none" name="name" value="{{ old('name')}}" placeholder="Иванов Иван Иванович">
								</div>
								<div class="form-group">
									<label class="required" for="email">Email</label>
									@error('email')
										<div style="color:red;">{{ $message }}</div>
									@enderror
									<input  id="email" class="form-control shadow-none" name="email" value="{{ old('email')}}" placeholder="ivan.ivanov@gmail.com">
								</div>
								<div class="form-group">
									<label class="required" for="password">Пароль</label>
									@error('password')
										<div style="color:red;">{{ $message }}</div>
									@enderror
									<input type="password" id="password" class="form-control shadow-none" name="password"  placeholder="Мин. количество символов - 5">
								</div>

								<div class="form-group">
									<label class="required" for="password_confirmation">Подтвердите пароль</label>
									@error('verifypass')
										<div style="color:red;">{{ $message }}</div>
									@enderror
									<input type="password" id="confirmpass" class="form-control shadow-none" name="password_confirmation" placeholder="Повторите пароль">
								</div>
								<div class="form-group">
									<label for="phone">Телефон</label>
									@error('phone')
										<div style="color:red;">{{ $message }}</div>
									@enderror
									<input type="text" id="phone" class="form-control shadow-none" name="phone" value="{{ old('phone')}}" placeholder="89088769117">
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
								<label for="region">Область</label>
								@error('region')
									<div style="color:red;">{{ $message }}</div>
								@enderror
								<select class="form-control shadow-none" name="region" id="region">
								<option value="" selected="selected">Выбрать</option>
								@foreach($regions as $region) 
									<option @if ( old('region') == $region ) selected @endif>{{ $region }}</option>
								@endforeach
								</select>
							</div>
							<div class="form-group">
								<label for="city">Город</label>
								@error('city')
									<div style="color:red;">{{ $message }}</div>
								@enderror
								<input type="text" id="city" class="form-control shadow-none" name="city" value="{{ old('city')}}" placeholder="Екатеринбург">
							</div>
							<div class="form-group">
								<label for="adress">Адрес</label>
								@error('adress')
									<div style="color:red;">{{ $message }}</div>
								@enderror
								<input type="text" id="adress" class="form-control shadow-none" name="adress" value="{{ old('adress')}}" placeholder="ул.Пушкина 46">
							</div>
							<div class="form-group">
								<label for="index">Индекс</label>
								@error('index')
									<div style="color:red;">{{ $message }}</div>
								@enderror
								<input type="text" id="index" class="form-control shadow-none" name="index" value="{{ old('index')}}" placeholder="625000">
							</div>
								
							<div class="form-group text-center">
								<button type="submit" class="btn btn-success btn-lg shadow-none" id="submitbtn" name="submit">Зарегистрироваться</button>
							</div>
							@csrf 
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection
