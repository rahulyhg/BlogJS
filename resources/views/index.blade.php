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
            color: #f75940;
        }
        .panel {
            box-shadow: 0 10px 20px rgba(0,0,0,0.19), 0 6px 6px rgba(0,0,0,0.23);
            padding: 25px;
            border-radius: 2px;
        }
        .card {
            box-shadow: 0 10px 20px rgba(0,0,0,0.19), 0 6px 6px rgba(0,0,0,0.23);
            background-color: transparent !important;
        }
        .card > a {
            color: #424242;
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
        .shadow {
            background-color: #0009;
            padding: 10px;
        }
    </style>
    <div class="container mt-4">
        <div class="row">
            <div class="col-12">
                <div class="ad-top mb-3">
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
                @if(isset($jumbotron))
                    <a href="{{ url('/post/'.$jumbotron->id_post.'/'.str_replace(" ", "-", $jumbotron->titulo)) }}">
                        <div class="card card-main bg-dark text-white mb-3">
                            <img class="card-img" src="{{ asset('img/posts/'.$jumbotron->id_post.'.jpg') }}" alt="{{ $jumbotron->descripcion_foto }}">
                            <div class="card-img-overlay h-100 d-flex flex-column justify-content-end">
                                <div class="shadow">
                                    <h2 class="card-title fm-7">{{ $jumbotron->titulo }}</h2>
                                    <p class="card-text">
                                        {{ $jumbotron->breve_descripcion }}
                                    </p>
                                    <p class="card-text fm-7">Publicado el: {{ formatoFechaMesCompleto($jumbotron->created_at, "-") }}</p>
                                </div>
                            </div>
                        </div>
                    </a>
                @endif
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-sm-12 col-md-12 col-lg-8 col-xl-8">
                @foreach($nuevas as $key => $nueva)
                    @if($key == 2)
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
                    @if($key == 1)
                        <div class="card mb-3">
                            <a href="{{ url('/post/'.$nueva->id_post.'/'.str_replace(" ", "-", $nueva->titulo)) }}">
                                <img class="card-img-top" src="{{ asset('img/posts/'.$nueva->id_post.'.jpg') }}" alt="{{ $nueva->descripcion_foto }}">
                                <div class="card-body">
                                    <p><span class="categoria">{{ $nueva->categoria }}</span></p>
                                    <h4 class="fm-7">{{ $nueva->titulo }}</h4>
                                    <p>
                                        <span>Por:</span>
                                        <span class="author fm-7">{{ $nueva->name }}</span>
                                        <strong>|</strong>
                                        {{ formatoFechaMesCompleto($nueva->created_at, "-") }}
                                    </p>
                                    <p class="card-text text-justify">{{ $nueva->breve_descripcion }}</p>
                                </div>
                            </a>
                        </div>
                    @endif
                @endforeach
            </div>
            <div class="col-12 col-sm-12 col-md-12 col-lg-4 col-xl-4">
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
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h4 class="fm-7">Suscribete al Newsletter</h4>
                    </div>
                    <div class="panel-body">
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
                            <button type="submit" class="btn btn-primary btn-block mt-3 fm-7">
                                Enviar
                                <i class="fas fa-check-circle"></i>
                            </button>
                        </form>
                    </div>
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
    </div>
@endsection
@section('scripts')
    <script>
        $(window).resize(function(){
            if ($(window).width() <= 550) {
                $(".card-main").hide();
                $(".ad-top").hide();
            } else {
                $(".card-main").show();
                $(".ad-top").show();
            }
        });
    </script>
@endsection