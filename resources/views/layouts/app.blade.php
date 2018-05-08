<!DOCTYPE html>
<html lang="es">
<head>
    <title>App Name - @yield('title')</title>

    <!-- CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" media="screen" title="no title" charset="utf-8">
    <link href="{{ asset('css/main.css') }}" rel="stylesheet" type="text/css" />


    <!-- FONTS/ICONS -->
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

</head>

<body>
    <!-- POPUP -->
    @section('popup_offers')
        <section id="popup_offers" >
            <div class="container">
                Ampliamos descuento por el DÍA DE LA MADRE · Hasta 50% dto
            </div>
        </section>
    @show

    <!-- NAV -->
    @section('sidebar')
        <nav id="sidebar">
            <div class="container">
                <a href="{{route('articulos.index')}}"><div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">headict</div></a>
                <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
                    <ul>
                        <li><a href="{{route('cart')}}"><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span></a></li>
                        <li>Menu 1</li>
                        <li>Menu 2</li>
                        <li>Menu 3</li>
                    </ul>
                </div>
            </div>
        </nav>
    @show

    <!-- MENU_CONTENT -->
    @section('slider_main')
        <div class="row">
            <section id="slider_main" class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            </section>
        </div>
    @show

    <!-- MENU_CONTENT -->
    @section('menu_content')
        <div class="row">
            <div class="container">
                <section id="menu_content" class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <ul>
                        <li>Menu 1</li>
                        <li>Menu 2</li>
                        <li>Menu 3</li>
                        <li>Menu 4</li>
                    </ul>
                </section>
            </div>
        </div>
    @show

    <!-- MAIN -->
    <main>
        <div class="container">
            @yield('content')
        </div>
    </main>
</body>
</html>