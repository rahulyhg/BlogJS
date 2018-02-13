@extends('layouts.app')
@section('styles')
    <link rel="stylesheet" href="{{ asset('custom/css/categoria.css') }}">
@endsection
@section('content')
    <div class="container mt-4">
        <div class="row">
            <div class="col-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}">Inicio</a></li>
                        <li class="breadcrumb-item active">{{ $categoria->categoria }}</li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="jumbotron jumbotron-fluid" style="background: linear-gradient(rgba(0,0,0,.4), rgba(0,0,0,.4)), url({{ url('img/categorias/'.$categoria->id_categoria.'.jpg') }}); background-position: center; background-repeat: no-repeat; background-size: cover;">
                    <div class="container">
                        <center>
                            <h1 class="display-4 fm-7">{{ $categoria->categoria }}</h1>
                            <p class="lead">
                                <span class="fm-7">Creado el: </span>
                                {{ formatoFechaMesCompleto($categoria->created_at, "-") }}
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
                    {{ $posts->links('layouts.pagination') }}
                @else
                    <h2 class="fm-7">Al parecer no han publicado posts en esta categoria.</h2>
                @endif
            </div>
            <div class="col-12 col-sm-12 col-md-12 col-lg-4 col-xl-4">
                <h3 class="fm-7 text-center">Series</h3>
                <hr>
                @foreach($subcategorias as $serie)
                <a href="{{ url('/serie/'.$serie->id_subcategoria.'/'.str_replace(" ", "-", $serie->subcategoria)) }}">
                    <div class="card mb-3">
                        <img class="card-img-top" src="{{ url('img/subcategorias/'.$serie->id_subcategoria.'.jpg') }}" alt="{{ $serie->subcategoria }}">
                        <div class="card-body">
                            <h4 class="fm-7">{{ $serie->subcategoria }}</h4>
                        </div>
                    </div>
                </a>
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
@endsection
