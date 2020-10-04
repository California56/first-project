<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>@yield('title')</title>
        <link rel="shortcut icon" href="{{ asset('images/favicon.png') }}">
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Crimson+Text:wght@600&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Kameron&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
        <link rel="stylesheet" href="/css/app.css">
        <script src="https://kit.fontawesome.com/4fa4b07d85.js" crossorigin="anonymous"></script>
    </head>
    <body class="d-flex flex-column min-vh-100">
        <div class="wrapper flex-grow-1">
            <div class="container">
                @include('inc.header')
                
                <div class="breadcrumbs">
                    <ul class="breadcrumb">
                        <li class="startPage"><a href="{{ route('index') }}">Главная</a></li>
                        @yield('breadcrumb')
                    </ul>
                </div>
                
                @yield('content')
            </div>
        </div>
        <div class="container">
            @include('inc.footer')   
        </div>
    </body>
</html>