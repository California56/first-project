@extends('layouts.app')

@section('title')
	Как заказать | Сибирский Мухомор
@endsection

@section ('breadcrumb')
	<li class="active">Как заказать</li>
@endsection

@section('content')
    <div class="alert alert-custom alert-secondary info-block">
        <h4>Как заказать</h4>
        <div class="dropdown-divider"></div>
        <h5>Заказ на сайте через корзину.</h5>
        <br>
        <p> При этом способе заказа Вы самостоятельно формируете заказ и отправляете его нам на обработку.
        </p>

        <p><b>1)</b> <i>Добавление в корзину.</i> Выберите нужный Вам товар и добавьте его в корзину, в корзине можно установить количество товара и посмотреть итоговую стоимость заказа.
        </p>

        <p><b>2)</b> <i>Оформление заказа.</i> В оформлении заказа нужно будет ввести данные, необходимые для отправки заказа по Почте, а также Ваш номер телефона для того,
         чтобы мы могли уведомить Вас об отправке и сообщить трек-номер посылки.</p>

        <p><b>3)</b> <i>Связь.</i> После оформления заказа мы всегда перезваниваем, по указанному в оформлении заказа номеру, в течение 30 минут, чтобы подтвердить заказ и убедиться в правильности данных для отправки.</p>

        <p><b>4)</b> <i>Оплата.</i> Оплата происходит после оформления заказа по указанным, после офомления заказа, реквизитам на карту Сбербанка.</p>

        <p>Принимаем заказы круглосуточно без выходных.</p>

        <h5>Заказ по телефону.</h5>
        <br>
        <p>Если Вы по каким-то причинам не хотите оформлять заказ в интернет-магазине, то Вы всегда можете заказать товар, позвонив по телефону или написав нам в любом мессенджере на номер <a class="link_attention" href="https://wa.me/79088769117" >8-908-876-91-17</a>.
        </p>
    </div>	
@endsection