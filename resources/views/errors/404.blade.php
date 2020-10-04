@extends('layouts.app')

@section('title')
	Сибирский Мухомор - Ошибка 404
@endsection

@section ('breadcrumb')
	<li class="active">Ошибка 404</li>
@endsection

@section('content')
    <div class="emptyCart">
        <div class="row justify-content-center">
            <div class="col-md-6 col-sm-8 col-10">
                <p>Кажется такой страницы<br> не существует...</p>
                <a href="{{ route('index') }}" class="btn btn-success btn-block shadow-none">Вернуться к покупкам</a>
            </div>
        </div>
    </div>
@endsection