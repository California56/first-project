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

        <p>В корзину можно «положить» любое количество товаров, а также редактировать заказ, меняя количество товаров, а также добавляя/удаляя другие товары. Когда весь товар уже выбран, можно приступать к оформлению заказа.
        </p>

        <p>После оформления заказа мы перезвоним Вам для подтверждения заказа и согласования вида доставки.
        </p>
        <p>Принимаем заказы круглосуточно без выходных.</p>

        <h5>Заказ по телефону.</h5>
        <br>
        <p>Если Вы по каким-то причинам не хотите оформлять заказ в интернет-магазине, то Вы всегда можете заказать товар, позвонив по телефону или написав в WhatsApp по номеру <a href="https://wa.me/79088769117" >8-908-876-91-17</a>.
        </p>
    </div>	
@endsection