<!DOCTYPE html>
<html lang="ru">
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- CSRF Token -->
<meta name="csrf-token" content="{{ csrf_token() }}">

<title>@yield('titlePage')</title>

<!-- Favicon  -->
<link rel="icon" href="/img/core-img/favicon.ico">

<!-- Core Style CSS -->
<link rel="stylesheet" href="/css/core-style.css">
<link rel="stylesheet" href="/style.css">
</head>
@include('adm.inc.header')
<div class="products-catagories-area clearfix" id="Vue">
    <div class="amado-pro-catagory clearfix">
        @include('adm.inc.errorsMessage')
        <div class="row">
            @yield('content')
        </div>
    </div>
</div>
@include('adm.inc.footer')
