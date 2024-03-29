@extends('layouts.app')

@section('title')
    Контакты | Сибирский Мухомор
@endsection

@section ('breadcrumb')
	<li class="active">Контакты</li>
@endsection

@section('content')
    <div class="alert alert-custom alert-secondary info-block">
        <h4>Контакты</h4>
        <div class="dropdown-divider"></div>
        <h5>О нас.</h5>
        <br>
        <p>
            Компания занимается сбором и реализацией Мухомора Красного сушеного (Amanita Muscaria).
            Сбор мухомора производится в Сибири — это тайга Тюменской и Ханты-Мансийской области, работают несколько заготовительных бригад порайонно.
            Работаем в этой сфере профессионально уже более 12 лет.
            Реализация мухомора сушеного шляпки на прямую потребителям, без посредников, в основном крупным оптом и мелким оптом. 
            Растительное сырье высшего качества. 
        </p>
        <h5>Наши контакты.</h5>
        <br>
        <p>Вы можете связаться с нами по следующим контактам:</p>
        <p>
            <b>Телефон</b> - <a class="link_attention" href="tel:+79088769117" > 8-908-876-91-17</a><br>
            <b>WhatsApp</b> - <a class="link_attention" href="https://wa.me/79088769117" > 8-908-876-91-17</a><br>
            <b>E-mail</b> - <a class="link_attention" href="mailto:voshod8574@mail.ru">voshod8574@mail.ru</a><br>
            <b>Telegram</b> - <a class="link_attention" href="https://t.me/voshod8574">voshod8574</a><br>
        </p>
        <p>
            Если Вы заинтересовались нашей продукцией, нашими предложениями, звоните или пишите в любое время и любым удобным для Вас способом, будем рады сотрудничать.
            Работаем давно, честно и совестливо по всем нашим пунктам.
        </p>
        <p>Россия, Тюменская обл., г.Тюмень</p>
        <!-- <br>
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
        @endif -->
    </div>	
@endsection