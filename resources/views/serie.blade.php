@extends('layouts.app')

@section('content')
    <style>
        .categoria {
            background: #3dc7be;
            color: white;
            padding: 8px 16px 8px 16px;
            border-radius: 0px;
            font-size: 14px;
            font-weight: bold;
            text-transform: uppercase;
        }
        .author {
            color: #f75940 !important;
        }
        .card {
            box-shadow: 0 10px 20px rgba(0,0,0,0.19), 0 6px 6px rgba(0,0,0,0.23);
            background-color: transparent !important;
        }
        .card > a {
            color: #424242;
        }
        .author {
            color: #2ca02c;
        }
        .display-4, .lead {
            color: #FFF !important;
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
                        <li class="breadcrumb-item"><a href="{{ url('') }}">Inicio</a></li>
                        <li class="breadcrumb-item active">{{ $serie->subcategoria   }}</li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="jumbotron jumbotron-fluid" style="background: linear-gradient(rgba(0,0,0,.4), rgba(0,0,0,.4)), url({{ url('img/subcategorias/'.$serie->id_subcategoria.'.jpg') }}); background-position: center; background-repeat: no-repeat; background-size: cover;">
                    <div class="container">
                        <center>
                            <h1 class="display-4 fm-7">{{ $serie->subcategoria }}</h1>
                            <p class="lead">
                                <span class="fm-7">Creado el: </span>
                                {{ formatoFechaMesCompleto($serie->created_at, "-") }}
                            </p>
                        </center>
                    </div>
                </div>
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
        <div class="row mb-3">
            <div class="col-12 col-sm-12 col-md-12 col-lg-8 col-xl-8">
                @if(count($posts) > 0)
                    @foreach($posts as $key => $post)
                        @if($key == 1)
                            <div class="ad mt-3 mb-3">
                                <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
                                <ins class="adsbygoogle"
                                     style="display:block"
                                     data-ad-format="fluid"
                                     data-ad-layout-key="-8e+1p-dm+eg+gy"
                                     data-ad-client="ca-pub-8558502802286245"
                                     data-ad-slot="1010355614"></ins>
                                <script>
                                    (adsbygoogle = window.adsbygoogle || []).push({});
                                </script>
                            </div>
                        @endif
                        <div class="card mb-3">
                            <a href="{{ url('/post/'.$post->id_post.'/'.str_replace(" ", "-", $post->titulo)) }}">
                                <img class="card-img-top" src="{{ asset('img/posts/'.$post->id_post.'.jpg') }}" alt="{{ $post->descripcion_foto }}">
                                <div class="card-body">
                                    <p><span class="categoria">{{ $post->categoria }}</span></p>
                                    <h4 class="fm-7">{{ $post->titulo }}</h4>
                                    <p>
                                        <span>Por:</span>
                                        <span class="author fm-7">{{ $post->name }}</span>
                                        <strong>|</strong>
                                        {{ formatoFechaMesCompleto($post->created_at, "-") }}
                                    </p>
                                    <p class="card-text text-justify">{{ $post->breve_descripcion }}</p>
                                </div>
                            </a>
                        </div>
                    @endforeach
                @else
                    <h2 class="fm-7">Al parecer no han publicado posts en esta categoria.</h2>
                @endif
            </div>
            <div class="col-12 col-sm-12 col-md-12 col-lg-4 col-xl-4">
                <ul class="list-group mt-4">
                    @foreach($categorias as $categoria)
                    <li class="list-group-item">{{ $categoria->categoria }}</li>
                    @endforeach
                </ul>
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
        <div class="row">
            <div class="col-12">
                <div class="fb-comments" data-href="{{ url()->current() }}" data-width="100%" data-numposts="5"></div>
            </div>
        </div>
    </div>
@endsection
