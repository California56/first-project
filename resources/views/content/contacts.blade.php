@extends('layouts.app')

@section('title')
	Сибирский Мухомор - Контакты
@endsection

@section ('breadcrumb')
	<li class="active">Контакты</li>
@endsection

@section('content')
    <div class="alert alert-custom alert-secondary info-block">
        <h4>Контакты</h4>
        <div class="dropdown-divider"></div>
        <p>Вы можете связаться с нами любым удобным для Вас способом по следующим контактам:</p>
        <p>
            <b>Телефон|WhatsApp|Viber|Telegram</b> - <a href="https://wa.me/79088769117" > 8-908-876-91-17</a><br>
            <b>E-mail</b> - <a href="mailto:voshod8574@mail.ru">voshod8574@mail.ru</a>
        </p>
        <br>
        <h4>Напишите нам</h4>
        <div class="dropdown-divider"></div>
        @if(session()->has('success'))
            <div class="row justify-content-center">
                <div class="col-md-6 text-center">
                    <br>
                    <p>Сообщение отправлено. Мы ответим Вам в ближайшее время!</p>
                    <a href="{{ route('index') }}" class="btn btn-success btn-block shadow-none">Вернуться на главную</a>
                </div>
            </div>
        @else
            <form action="{{ route('sendMessage') }}" method="POST">
                @csrf
                <div class="form-group">      
                    <label for="name" class="required">Ваше имя: </label>
                        @error('name')
                            <div style="color:red;">{{ $message }}</div>
                        @enderror
                    <input type="text" class="form-control shadow-none" name="name" id="name" value="{{ old('name')}}">
                </div>

                <div class="form-group">      
                    <label for="email" class="required">Ваш email: </label>
                        @error('email')
                            <div style="color:red;">{{ $message }}</div>
                        @enderror
                    <input type="text" class="form-control shadow-none" name="email" id="email" value="{{ old('email')}}">
                </div>
                
                <div class="form-group">
                    <label for="question" class="required">Сообщение: </label>
                    @error('question')
                        <div style="color:red;">{{ $message }}</div>
                    @enderror
                    <textarea name="question" class="form-control shadow-none" id="question" style="width:100%;" rows="5">{{ old('question')}}</textarea>
                </div>

                <div class="text-center">
                    <button class="btn btn-success shadow-none">Отправить</button>
                </div>
            </form>
        @endif
    </div>	
@endsection