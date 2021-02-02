@extends('layouts.app')

@section('title')
	Корзина | Сибирский Мухомор
@endsection

@section ('breadcrumb')
	<li class="active">Корзина</li>
@endsection

@section('content')
	<div class="table-responsive-sm">
		<table class="table table-striped border table-cart">
			<thead>
				<tr>
					<th class=".d-none .d-md-block .d-lg-none" scope="col">Товар</th>
					<th scope="col">Описание</th>
					<th class=".d-none .d-md-block .d-lg-none" scope="col">Цена</th>
					<th scope="col">Количество</th>
					<th scope="col">Итого</th>
					<th  class=".d-none .d-md-block .d-lg-none" scope="col"><i class="fas fa-trash-alt"></th>
				</tr>
			</thead>
			<tbody>
				@foreach($order->products as $product)
					<tr>
						<td class=".d-none .d-md-block .d-lg-none" style="width: 15%"><img class="image image--cart" src="{{Storage::url($product->image)}}"></td>
						<td><a href="{{route('product', [$product->category,$product->id])}}">{{$product->name}}</a></td>
						<td class=".d-none .d-md-block .d-lg-none" >{{$product->price}} руб.</td>
						<td>
							<div class="btn-group form-inline">
								<form action="{{route('basket-add', $product)}}" method="POST">
									<div class="cart_quantity_button">
										<button type="submit" class=" btn btn-cart shadow-none" > + </button>
									</div>
									@csrf
								</form>
								{{$product->pivot->count}}
								<form action="{{route('basket-remove', $product)}}" method="POST">
									<div class="cart_quantity_button">
										<button type="submit" class="btn btn-cart shadow-none" > - </button>
									</div>
									@csrf
								</form>
							</div>
						</td>
						<td>{{$product->getPriceForCount()}} руб.</td>
						<td class=".d-none .d-md-block .d-lg-none">
							<form action="{{route('basket-delete', $product)}}" method="POST">	
								<button type="submit" class="btn-cart-delete" ><i class="fa fa-times"></i></button>
								@csrf
							</form>
						</td>
					</tr>
				@endforeach
			</tbody>
		</table><br>
		
		<table class="table table-striped border table-cart">
			<thead>
				<tr>
					<td colspan="5"><h5> Итого:</h5></td>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td colspan="3"><h5> Стоимость товаров:</h5></td>
					<td colspan="2"><span class="shop__digits">{{ $order->getFullPrice() }} руб.</span></td>
				</tr>
				<tr>
					<td colspan="3"><h5>Стоимость доставки:</h5></td>
					<td colspan="2"><span class="shop__digits">{{ $order->shipping }} руб.</span> </td>
				</tr>
				<tr>
					<td colspan="3"><h5>Всего:</h5></td>
					<td colspan="2"><span class="shop__digits">{{ $order->getPriceWithShipping() }} руб.</span></td>
				</tr>
			</tbody>
		</table>
	</div>
	<div class="row order-block">
		<div class=" col-lg-6 border d-none d-sm-none d-md-none d-lg-block order-block-left" >
			<div class="order-block-inside">
				<p class="text-center"><a href="{{ route('oplata-i-dostavka') }}" class="btn btn-success shadow-none">Подробнее о доставке</a></p>
				<p>Заказ будет отправлен Почтой России в тот же день. После этого мы свяжемся с Вами, чтобы уведомить об отправке и сообщить трек-номер.
				</p>	
			</div>	
		</div>
		<div class="col-sm-12 col-lg-6 border">
			<div class="order-block-inside">
				<p class="text-center"><a href="{{ route('basket-order')}}" class="btn btn-success shadow-none">Оформить заказ</a></p>
				<p>Вы можете оформить заказ на нашем сайте заполнив все необходимые контактные данные. 
				Регистрация на сайте не нужна для Оформления заказа.</p>
			</div>
		</div>
	</div>
@endsection