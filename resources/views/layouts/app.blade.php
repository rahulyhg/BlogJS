<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Type" content="text/html; charset=gb18030">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Jordy Santamaria</title>

    <!-- Metas -->
    @if(isset($metas))
        <meta property="fb:app_id" content="817542738420507" />
        <meta property="og:type" content="article" />
        <meta property="og:title" content="{{ $metas['titulo'] }}" />
        <meta property="og:url" content="{{ $metas['ruta_actual'] }}" />
        <meta property="og:image" content="{{ $metas['imagen'] }}" />
        <meta property="og:description" content="{{ $metas['descripcion'] }}" />
        <meta property="og:updated_time" content="{{ $metas['fecha'] }}" />
        <meta name="twitter:site" content="@JordySantm94" />
        <meta name="twitter:card" content="summary_large_image" />
        <meta name="twitter:url" content="{{ $metas['ruta_actual'] }}" />
        <meta name="twitter:title" content="{{ $metas['titulo'] }}" />
        <meta name="twitter:description" content="{{ $metas['descripcion'] }}" />
        <meta name="twitter:image" content="{{ $metas['imagen'] }}" />
        <meta name="title" content="{{ $metas['titulo'] }}" />
        <meta name="keywords" content="{{ $metas['keywords'] }}" />
        <meta name="news_keywords" content="{{ $metas['keywords'] }}" />
        <meta name="description" content="{{ $metas['descripcion'] }}" />
        <meta name="lang" content="es" />
        <meta name="author" content="jordysantamaria.com" />
        <meta name="owner" content="Emmanuel Jordy Santamaria Cruz">
        <meta name="date" content="{{ $metas['fecha'] }}" />
        <meta property="article:published_time" content="{{ $metas['fecha'] }}" />
        <meta property="article:modified_time" content="{{ $metas['fecha'] }}" />
        <meta property="article:publisher" content="https://www.facebook.com" />
        <meta property="article:section" content="{{ $metas['categoria'] }}" />
        <!-- meta property="article:tag" content="Neymar" /--><!-- TAGS IN META'S -->
        <meta name="DC.date.issued" scheme="W3CDTF" content="{{ $metas['fecha'] }}" />
        <meta name="DC.date.created" scheme="W3CDTF" content="{{ $metas['fecha'] }}" />
        <meta name="DC.date" scheme="W3CDTF" content="{{ $metas['fecha'] }}" />
        <meta name="DC.creator" content="Jordy Santamaria" />
        <meta name="DC.publisher" content="{{ $metas['name'] }}" />
        <meta name="DC.language" scheme="RFC1766" content="es" />
        <meta name="DC.title" lang="es" content="{{ $metas['titulo'] }}" />
        <meta name="DC.description" lang="es" content="{{ $metas['descripcion'] }}" />
        <meta name="DC.subject" lang="es" content="{{ $metas['keywords'] }}" />

        <meta itemprop="name" content="{{ $metas['titulo'] }}" />
        <meta itemprop="description" content="{{ $metas['descripcion'] }}" />
        <meta itemprop="image" content="{{ $metas['imagen'] }}" />

        <!-- metadata estática -->

        <meta name="organization" content="Noticias, Peliculas, Gameplays y mucho más!" />
        <meta name="locality" content="Mexico, Puebla" />
        <meta name="revisit-after" content="1 days" />
        <meta name="robots" content="INDEX,FOLLOW" />

        <meta http-equiv="X-UA-Compatible" content="IE=Edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <meta name="format-detection" content="address=no,email=no,telephone:no" />
        <link rel="icon" type="image/x-icon" href="{{ asset('img/logo/ico.ico') }}" />
        <link rel="publisher" href="https://plus.google.com/u/0/+JordySantamaria1994">
    @endif
    <!-- Styles -->
    <link rel="shortcut icon" href="{{ asset('img/logo/ico.ico') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('fontawesome-5.0.2/css/fontawesome-all.css')  }}">
    <link rel="stylesheet" href="{{ asset('custom/css/general.css') }}">
    <link rel="stylesheet" href="{{ asset('custom/css/pagination.css') }}">
    @yield('styles')
    <style>
        .navbar {
            padding: 15px;
            background-color: #334252 !important;
        }
        .navbar-nav > a {
            color: #FFF !important;
        }
        .navbar-brand {
            color: #FFF !important;
        }
    </style>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-111173717-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-111173717-1');
    </script>
</head>
<body>
<div id="fb-root"></div>
<script>(function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = 'https://connect.facebook.net/es_LA/sdk.js#xfbml=1&autoLogAppEvents=1&version=v2.11&appId=817542738420507';
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>
    <div id="app">
        <nav class="navbar navbar-expand-lg navbar-light">
            <a class="navbar-brand" href="{{ url('') }}">
                <img src="{{ asset('img/logo/LogoCuadrado.png') }}" width="50" height="50" alt="">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav mr-auto">
                    @foreach($categorias as $categoria)
                    <a class="nav-item nav-link fm-7" href="{{ url('/categoria/'.$categoria->id_categoria.'/'.$categoria->categoria) }}">{{ $categoria->categoria }}</a>
                    @endforeach
                </div>
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link icon-social icon-social-twitter" href="https://twitter.com/JordySantm94" target="_blank">
                            <i class="fab fa-twitter-square"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link icon-social icon-social-google" href="https://plus.google.com/+JordySantamaria1994?hl=es" target="_blank">
                            <i class="fab fa-google-plus"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link icon-social icon-social-instagram" href="https://www.instagram.com/jordysantamaria/" target="_blank">
                            <i class="fab fa-instagram"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
        @yield('content')
    </div>

    <!-- Footer -->
    <!--div class="container-fluid mt-3 p-5 custom-footer-alt">
        <div class="row-fluid">
            <h3 class="text-center fm-7">Jordy Santamaria</h3>
        </div>
        <div class="row pt-4">
            <div class="col-12 col-sm-12 col-md-12 col-lg-4 col-xl-4 text-center">
                <h5 class="fm-7">
                    <i class="far fa-newspaper"></i>
                    CATEGORIAS
                </h5>
                @foreach($categorias as $categoria)
                    <p>
                        <a class="fs-footer" href="{{ url('/categoria/'.$categoria->id_categoria.'/'.$categoria->categoria) }}">{{ $categoria->categoria }}</a>
                    </p>
                @endforeach
            </div>
            <div class="col-12 col-sm-12 col-md-12 col-lg-4 col-xl-4 text-center">
                <h5 class="fm-7">
                    <i class="far fa-newspaper"></i>
                    SERIES
                </h5>
                @foreach($subcategorias as $subcategoria)
                    <p>
                        <a class="fs-footer" href="{{ url('/serie/'.$subcategoria->id_subcategoria.'/'.$subcategoria->subcategoria) }}">{{ $subcategoria->subcategoria }}</a>
                    </p>
                @endforeach
            </div>
            <div class="col-12 col-sm-12 col-md-12 col-lg-4 col-xl-4 text-center">
                <h5 class="fm-7">
                    <i class="far fa-envelope-open"></i>
                    NEWSLETTER
                </h5>
                <form action="{{ url('/') }}" method="POST">
                    <p>Suscribete y recibe mis ultimos post.</p>
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if(count($errors))
                        <div class="alert alert-danger">
                            <strong>Oops!</strong>:
                            <br/>
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    {{ csrf_field() }}
                    <input type="email" name="correo" class="form-control" placeholder="Ingresa tu correo electronico aquí.">
                    <button type="submit" class="btn btn-myprimary btn-block mt-3 fm-7">
                        ¡QUIERO SUSCRIBIRME!
                    </button>
                </form>
            </div>
        </div>
    </div>
    <div-- class="container-fluid p-3 custom-footer">
        <div class="row pt-4">
            <div class="col-12 col-sm-12 col-md-12 col-lg-4 col-xl-4 text-center">
                <h5 class="fm-7">
                    <i class="fas fa-map-marker-alt"></i>
                    LOCALIZACIÓN
                </h5>
                <h5 class="fm-4">Puebla, Pue.</h5>
                <h5 class="fm-4">México</h5>
            </div>
            <div class="col-12 col-sm-12 col-md-12 col-lg-4 col-xl-4 text-center">
                <h5 class="fm-7">
                    <i class="fas fa-thumbs-up"></i>
                    SIGUEME EN MIS REDES SOCIALES
                </h5>
                <div class="btn-group">
                    <a class="nav-link icon-social footer-twitter" href="https://twitter.com/JordySantm94" target="_blank">
                        <i class="fab fa-twitter-square"></i>
                    </a>
                </div>
                <div class="btn-group">
                    <a class="nav-link icon-social footer-google" href="https://plus.google.com/+JordySantamaria1994?hl=es" target="_blank">
                        <i class="fab fa-google-plus"></i>
                    </a>
                </div>
                <div class="btn-group">
                    <a class="nav-link icon-social footer-instagram" href="https://www.instagram.com/jordysantamaria/" target="_blank">
                        <i class="fab fa-instagram"></i>
                    </a>
                </div>
            </div>
            <div class="col-12 col-sm-12 col-md-12 col-lg-4 col-xl-4 text-center">
                <h5 class="fm-7">
                    <i class="fas fa-envelope"></i>
                    CONTACTAME
                </h5>
                <h5 class="fm-4">
                    <a class="color-blanco" href="mailto:santmjoy@gmail.com">
                    santmjoy@gmail.com
                    </a>
                </h5>
            </div>
        </div>
        <div class="row-fluid pt-4">
            <h6 class="text-center fm-4">Copyright © Jordy Santamaria 2018</h6>
        </div>
    </div-->

    <!-- Scripts -->
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue"></script>
    @yield('scripts')
</body>
</html>
