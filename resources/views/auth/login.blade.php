@extends('layouts.app')

@section('title')
	Сибирский Мухомор - Вход
@endsection

@section('breadcrumb')
    <li class="active">Вход</li>
@endsection

@section('content')
    <div class="alert alert-custom alert-secondary" role="alert">
        <h4 class="alert-heading">Авторизация</h4>
        <div class="dropdown-divider"></div>
        <div class="row justify-content-between" >

            <div class="login col-lg-6 col-sm-12">
                <form action="{{ route('login') }}" method="POST">
                    <div class="form-group">
                    <label for="exampleInputEmail1">Email</label>
                    @error('email')
                        <div style="color:red;">Неверно введен логин или пароль!</div>
                    @enderror
                    <input type="email" name="email" class="form-control shadow-none" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ old('email') }}">
                    <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
                    </div>
                    <div class="form-group">
                    <label for="exampleInputPassword1">Пароль</label>
                    <input type="password" name="password" class="form-control shadow-none" id="exampleInputPassword1">
                    </div>
                    <!-- <div class="form-group form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Check me out</label>
                    </div> -->
                    <button type="submit" class="btn btn-success shadow-none">Войти</button>
                    @csrf
                </form>
            </div>
            <div class="col-lg-5 col-sm-12 alert alert--register">
                <p>Если Вы зарегистрированы на сайте, то можете войти со своим логином и паролем и Вам не придется при оформлении заказа вводить свои контактные данные и адрес доставки.</p>
                <p>Если же нет то вы можете зарегистрироваться.</p>
                <a href="{{ route('register') }}" class="btn btn-success btn-success--register shadow-none">Регистрация</a>
            </div>
        </div>
    </div>
@endsection