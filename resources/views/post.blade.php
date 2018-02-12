@extends('layouts.app')

@section('content')
    <style>
        .obj-center {
            display: block;
            margin-left: auto;
            margin-right: auto;
        }
        .btn-facebook {
            background-color: #0D47A1 !important;
            border-color: #0D47A1 !important;
        }
        .badge {
            background-color: #3dc7be;
            color: #FFF;
            padding: 10px;
            border-radius: 20px;
            font-size: 15px;
            margin-bottom: 5px;
        }
        .list-group {
            background-color: white;
            box-shadow: 0 10px 20px rgba(0,0,0,0.19), 0 6px 6px rgba(0,0,0,0.23);
        }
        .list-group-item {
            border: 0px !important;
        }
        .list-group > .list-group-item > a {
            color: #424242;
        }
    </style>
    <div class="container mt-4">
        <div class="row">
            <div class="col-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}">Inicio</a></li>
                        <li class="breadcrumb-item"><a href="{{ url('/categoria/'.$post->id_categoria.'/'.$post->categoria) }}">{{ $post->categoria }}</a></li>
                        <li class="breadcrumb-item active">{{ $post->titulo }}</li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <h1 class="fm-7" style="font-size: 50px;">{{ $post->titulo }}</h1>
                <h5 class="mb-3 text-justify">{{ $post->breve_descripcion }}</h5>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <img class="img-fluid w-100" src="{{ asset('img/posts/'.$post->id_post.'.jpg') }}" alt="">
            </div>
        </div>
        <div class="row mt-3 mb-3">
            <div class="col-12 col-sm-12 col-md-12 col-lg-8 col-xl-8">
                <div class="ad mt-3 mb-3">
                    <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
                    <!-- Anuncio -->
                    <ins class="adsbygoogle"
                         style="display:block"
                         data-ad-client="ca-pub-8558502802286245"
                         data-ad-slot="3272545119"
                         data-ad-format="auto"></ins>
                    <script>
                        (adsbygoogle = window.adsbygoogle || []).push({});
                    </script>
                </div>
                <hr>
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-12 col-lg-3 col-xl-3 p-0">
                        <img src="{{ asset('img/usuarios/1.jpg') }}" class="rounded-circle w-50 obj-center">
                    </div>
                    <div class="col-12 col-sm-12 col-md-12 col-lg-9 col-xl-9 p-0 align-self-center">
                        <p class="fm-9">{{ strtoupper($post->name) }}</p>
                        <p>
                            Ingeniero en Tecnologias de la Información y Comunicación, aficionado a las nuevas tecnologias, amante de los videojuegos al igual que de las peliculas.
                            Me encanta la Programación, aun más cuando se trata de aprender algo nuevo.
                        </p>
                        <p>
                            <span class="fm-7">Actualizada el: </span>
                            {{ formatoFechaMesCompleto($post->created_at, "-") }}
                        </p>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-12">
                        <p class="text-justify">
                            {!! json_decode($post->descripcion) !!}
                        </p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <hr>
                        <h6 class="mb-3 fm-9">ETIQUETAS</h6>
                        @foreach(json_decode($post->etiquetas) as $etiquetas)
                            @foreach(explode(",", $etiquetas) as $etiqueta)
                                <span class="badge">{{ $etiqueta }}</span>
                            @endforeach
                        @endforeach
                        <div class="ad mt-3 mb-3">
                            <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
                            <!-- Anuncio -->
                            <ins class="adsbygoogle"
                                 style="display:block"
                                 data-ad-client="ca-pub-8558502802286245"
                                 data-ad-slot="3272545119"
                                 data-ad-format="auto"></ins>
                            <script>
                                (adsbygoogle = window.adsbygoogle || []).push({});
                            </script>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-12 col-md-12 col-lg-4 col-xl-4">
                <a href="http://www.facebook.com/sharer.php?u={{ url()->current() }}" class="btn btn-primary btn-facebook w-100 p-3 mb-3" target="_blank">
                    <i class="fab fa-facebook"></i>
                    Compartir
                </a>
                <a href="http://twitter.com/home?status={{ url()->current() }}" class="btn btn-primary w-100 p-3 mb-3" target="_blank">
                    <i class="fab fa-twitter"></i>
                    Tweet
                </a>
                <a href="https://plus.google.com/share?url={{ url()->current() }}" class="btn btn-danger w-100 p-3 mb-3" target="_blank">
                    <i class="fab fa-google-plus-g"></i>
                    Compartir
                </a>
                <div class="ad mt-3 mb-3">
                    <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
                    <!-- Anuncio -->
                    <ins class="adsbygoogle"
                         style="display:block"
                         data-ad-client="ca-pub-8558502802286245"
                         data-ad-slot="3272545119"
                         data-ad-format="auto"></ins>
                    <script>
                        (adsbygoogle = window.adsbygoogle || []).push({});
                    </script>
                </div>
                <ul class="list-group mt-3 mb-3">
                    @foreach($categorias as $categoria)
                        <li class="list-group-item">
                            <a href="{{ url('/categoria/'.$categoria->id_categoria.'/'.$categoria->categoria) }}">
                                {{ $categoria->categoria }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="fb-comments" data-href="{{ url()->current() }}" data-width="100%" data-numposts="5"></div>
            </div>
        </div>
    </div>
@endsection
