@extends('layouts.app')

@section('title')
	Сибирский Мухомор - Оплата и доставка
@endsection

@section ('breadcrumb')
	<li class="active">Оплата и доставка</li>
@endsection

@section('content')
    <div class="alert alert-custom alert-secondary info-block">
        <h4>Оплата и доставка</h4>
        <div class="dropdown-divider"></div>
            <p> После оформления заказа мы свяжемся с Вами для уточнения заказа и данных получателя,
             после этого Вам нужно будет произвести оплату.
             Оплата принимается на карту Сбербанка <b>4276 1601 6025 1329</b>. В коментариях к платежу ничего указывать не надо.
             Сразу после того, как Вы произведете оплату мы уведомим Вас о её получении и о подготовке заказа к отправке.
            </p>
            <p>Стоимость доставки составляет <b>380 рублей</b>, 
            и обычно доставка осуществляется Почтой России, но мы также можем отправить Ваш заказ любой транспортной компанией на Ваш выбор. В этом случае плата за доставку осуществляется при получении.
            Отправка посылки осуществляется в день оплаты на указанный Вами при оформлении заказа адрес. После отправки мы сразу сообщим Вам трек-номер, по которому можно отследить посылку, а также он появится в Вашем личном кабинете если Вы были зарегистрированы.
            </p>
            <p> Перед отправкой заказ тщательно упаковывается, так что можете не переживать за сохранность заказа во время транспортировки.
            </p>

            <p>
                После оплаты оптовиком, отправляем партию мухомора в течение суток транспортной компанией или личным курьером, часто выделяем на большую партию свои автомашины-будки. 
                По желанию оптовика, после отправки партии мухомора сообщаем потребителю где его товар и когда ожидать, отвечаем за качество сушеного мухомора и за доставку потребителю.
            
            </p>
            <p> По всем вопросам обращайтесь по телефону <a href="https://wa.me/79088769117" > 8-908-876-91-17</a> или по эл.почте <a href="maito:voshod8574@mail.ru" >voshod8574@mail.ru</a>.
            </p>

            <!-- <img class="logo-img" src="{{asset('images/visa-and-mastercard-logo-26.png')}}"> -->
        </div>	
@endsection