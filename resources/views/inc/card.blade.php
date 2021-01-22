<div class="col-xs-12 col-md-6 col-sm-12 col-lg-4  ">
	<div class="shop__block">
		<a href="{{ route('product', [$product->category,$product->id]) }}">
			<img class="shop__image" src="{{Storage::url($product->image)}}">
			<div class="shop__title">{{$product->name}}</div>
		</a>
		@if($product->category_id == 6)
			<div class="shop__weight"><b>Вес:</b><span class="shop__digits"> {{$product->weight}} </span>грамм.</div>
		@else 
			<div class="shop__weight"><b>Вес:</b><span class="shop__digits"> {{$product->weight}} </span>кг.</div>
		@endif
		<div class="shop__price"><b>Цена:</b><span class="shop__digits"> {{$product->price}} </span>рублей.</div>
		<form action="{{ route('basket-add', $product)}}" method="POST">
			<button type="submit" class="shop__addToCart">В корзину</button>
			@csrf
		</form>
	</div>
</div>