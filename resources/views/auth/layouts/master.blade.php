<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="utf-8">
		<title>@yield('title')</title>
		<link rel="shortcut icon" href="{{ asset('images/favicon.png') }}">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
		<link rel="stylesheet" href="/css/app.css">
		<script src="https://kit.fontawesome.com/4fa4b07d85.js" crossorigin="anonymous"></script>
	</head>
	<body class="d-flex flex-column min-vh-100">
		<nav class="navbar navbar-expand-lg navbar-light bg-light nav-admin">
			<div class="container">
				<div class="navbar-brand" href="#"><i class="fas fa-tools"></i> Панель администратора</div>
			 	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
			    	<span class="navbar-toggler-icon"></span>
			 	</button>
			 	<div class="collapse navbar-collapse flex-row-reverse" id="navbarNav ">
				    <ul class="navbar-nav ">
				      	<li class="nav-item ">
				       		<a class="nav-link nav-link--admin" href="{{ route('categories.index') }}">Категории</a>
				     	</li>
				      	<li class="nav-item">
				        	<a class="nav-link nav-link--admin" href="{{ route('products.index') }}">Товары</a>
				      	</li>
						<li class="nav-item dropdown">
							<a class="nav-link nav-link--admin dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								Заказы
							</a>
							<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
								<a class="dropdown-item dropdown-item--admin" href="{{ route('home') }}">Новые</a>
								<a class="dropdown-item dropdown-item--admin" href="{{ route('order-old') }}">Отправленные</a>
							</div>
						</li>
				    </ul>
		 		</div>
			</div>
		</nav>
		
		<div class="wrapper flex-grow-1">
			<!-- CONTENT -->
			@yield('content')
        	<!-- END CONTENT -->
		</div>

        
		<div class="container">
			<footer class="footer sticky-bottom">
				<div class="copyright">
					© 2017, Все права защищены. Интернет-магазин народной медицины "Сибирский мухомор".
				</div>
			</footer> 
        </div>
		
		<!-- JS, Popper.js, and jQuery -->
		<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
	</body>
</html>