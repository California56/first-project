@extends('layouts.app')

@section('title')
    Отзывы | Сибирский Мухомор
@endsection

@section ('breadcrumb')
	<li class="active">Отзывы</li>
@endsection

@section('content')
    <div class="alert alert-custom alert-secondary ">
        <h4>Отзывы</h4>
        <div class="dropdown-divider"></div>
        <div> Здесь Вы можете прочесть отзывы о нашей работе, а также поделиться впечатлениями о покупке в нашем интернет-магазине.</div>
    </div>

    @if(session()->has('review-success'))
		<div class="alert alert-secondary alert-custom text-center">
			<div class="font-middle">{{ session()->get('review-success') }}</div>
		</div>
	@endif

    @if(count($reviews) == 0)
		<div class="emptyCart">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <p>Отзывов пока нет...</p>
                    <a href="{{ route('index') }}" class="btn btn-success btn-block shadow-none">Вернуться на главную страницу</a>
                </div>
            </div>
        </div><br>
	@endif

    @foreach($reviews as $review)
        <table class="table table-striped border">
            <tbody>
                <tr>
                    <td style="width: 50%;" class="text-left"><b>{{$review->name}}</b></td>
                    <td class="text-right">{{$review->created_at->format('d.m.Y')}}</td>
                </tr>
                <tr>
                    <td colspan="2" class="text-left">{{$review->review}}</td>
                </tr>
            </tbody>
        </table>
    @endforeach

    <div class="category-pagination">
		{{ $reviews->links() }}
	</div>

    <div class="alert alert-custom alert-secondary info-block">
        <h4>Напишите отзыв</h4>
        <div class="dropdown-divider"></div>
        <form action="{{ route('send-review') }}" method="POST">
            @csrf
            <div class="form-group">      
                <label for="name" class="required">Ваше имя: </label>
                    @error('name')
                        <div style="color:red;">{{ $message }}</div>
                    @enderror
                <input type="text" class="form-control shadow-none" name="name" id="name" value="{{ old('name')}}">
            </div>
            
            <div class="form-group">
                <label for="review" class="required">Ваш отзыв: </label>
                @error('review')
                    <div style="color:red;">{{ $message }}</div>
                @enderror
                <textarea name="review" class="form-control shadow-none" id="review" style="width:100%;" rows="5">{{ old('review')}}</textarea>
            </div>

            <div class="text-center">
                <button class="btn btn-success shadow-none">Отправить</button>
            </div>
        </form> 
    </div>
@endsection