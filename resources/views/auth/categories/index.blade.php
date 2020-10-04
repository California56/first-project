@extends('auth.layouts.master')

@section('title', 'Админ - Категории')	

@section('content')
	<div class="container container--admin">
		<div class="col-md-12">
			<h2 class="admin-title">Категории</h2>
			<table class="table table-hover border">
				<thead class="thead-light">
					<tr>
						<th>#</th>
						<th>Название</th>
						<th>Описание</th>
						<th>Действия</th>
					</tr>
				</thead>
				<tbody>
					@foreach($categories as $category)
						<tr>
							<td style="width: 5%;"><b>{{ $category->id }}</b></td>
							<td style="width: 25%;">{{ $category->category }}</td>
                            <td style="width: 30%;">
                                <div class=" text-truncate" style="max-width: 300px;">
                                    {{ $category->description }}
                                </div>
                            </td>
							<td  style="width: 30%;">
                                <div class="btn-group" role="group">
									<form action="{{ route('categories.destroy', $category) }}" method="POST">
										<a type="button" class="btn btn-info shadow-none" href="{{ route('categories.show', $category) }}">Открыть</a>
										<a type="button" class="btn btn-warning shadow-none" href="{{ route('categories.edit', $category) }}">Редактировать</a>
										
										@method('DELETE')
										@csrf
										<input type="submit" class="btn btn-danger shadow-none" value="Удалить">
									</form>
                                </div>
							</td>
						</tr>
					@endforeach
				</tbody> 
            </table>
            <a class="btn btn-success shadow-none" href="{{ route('categories.create') }}">Добавить категорию</a>
		</div>
	</div>
@endsection
