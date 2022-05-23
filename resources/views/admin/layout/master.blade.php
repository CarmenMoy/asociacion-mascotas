<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="shortcut icon" href=https://st2.depositphotos.com/1192512/5197/v/950/depositphotos_51976097-stock-illustration-peeking-out-curious-cat-background.jpg>

		<title>Panel de Administración</title>
        <link rel="canonical" href="{{Request::url()}}">

        @include("admin.layout.partials.styles")
    </head>

    <body>
        @include("admin.layout.partials.header")
   
        <div class="wrapper" id="app">
            <div class="partial main-content" id="main-content">
                @yield('content')
            </div>
        </div>
 
        @include("admin.layout.partials.js")
    </body>
</html>