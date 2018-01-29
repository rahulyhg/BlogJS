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
            background-color: #0D47A1;
            color: #FFF;
            padding: 10px;
            border-radius: 20px;
            font-size: 15px;
            margin-bottom: 5px;
        }
    </style>
    <div class="container mt-4">
        <div class="row">
            <div class="col-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Inicio</a></li>
                        <li class="breadcrumb-item"><a href="#">Categoria</a></li>
                        <li class="breadcrumb-item active">Nombre del Post</li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <h1 class="fm-7" style="font-size: 60px;">Nombre del Post</h1>
                <h4 class="mb-3">Breve descripción del post.</h4>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <img class="img-fluid w-100" src="https://www.movilzona.es/app/uploads/2017/02/Sony-Xperia-XZ-Premium-3.jpg" alt="">
            </div>
        </div>
        <div class="row mt-3 mb-3">
            <div class="col-12 col-sm-12 col-md-12 col-lg-8 col-xl-8">
                <hr>
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-12 col-lg-3 col-xl-3 p-0">
                        <img src="https://scontent.fpbc1-1.fna.fbcdn.net/v/t1.0-9/22281792_1589666104427860_8663766185210791155_n.jpg?oh=3762ed703347f3405cd7cf20ae89fa25&oe=5AD1D297" class="rounded-circle w-50 obj-center">
                    </div>
                    <div class="col-12 col-sm-12 col-md-12 col-lg-9 col-xl-9 p-0 align-self-center">
                        <p class="fm-7">Jordy Santamaria</p>
                        <p>
                            Ingeniero en Tecnologias de la Información y Comunicación, aficionado a las nuevas tecnologias, amante de los videojuegos al igual que de las peliculas.
                            Me encanta la Programación, aun más cuando se trata de aprender algo nuevo.
                        </p>
                        <p>
                            <span class="fm-7">Actualizada el: </span>
                            28-Ene-2018
                        </p>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-12">
                        <p class="text-justify">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam ultrices dolor eget nibh dignissim gravida. Donec sit amet facilisis sapien.
                            Cras rutrum, lectus ac fringilla molestie, leo dolor feugiat mi, et eleifend ipsum lacus at urna. Etiam non massa nec dolor placerat efficitur.
                            Pellentesque a lorem arcu. Sed vitae sem at nulla rutrum placerat. In at tortor a ex efficitur pulvinar.
                            Donec id eleifend justo, nec maximus ante. Mauris efficitur rhoncus eros, a condimentum nulla facilisis a.
                            Maecenas nec elit sed arcu blandit vulputate nec non nisl. Curabitur eu nunc porttitor ex pharetra pellentesque ut eu est.
                            Pellentesque et magna magna. Etiam vitae felis ante. Nulla in risus justo.
                        </p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <hr>
                        <h6 class="mb-3 fm-9">ETIQUETAS</h6>
                        <span class="badge">Etiqueta 1</span>
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
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h4 class="fm-7">Suscribete al Newsletter</h4>
                    </div>
                    <div class="panel-body">
                        <p>Suscribete y recibe mis ultimos post.</p>
                        <input type="email" class="form-control" placeholder="Ingresa tu correo electronico aquí.">
                        <button class="btn btn-outline-primary btn-block mt-3 fm-7">
                            Enviar
                            <i class="fas fa-check-circle"></i>
                        </button>
                    </div>
                </div>
                <ul class="list-group mt-4">
                    <li class="list-group-item">Categorias List-Group</li>
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
