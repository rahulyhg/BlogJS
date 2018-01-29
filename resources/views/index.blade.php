@extends('layouts.app')

@section('content')
    <style>
        .categoria {
            background: purple;
            color: white;
            padding: 6px 16px 6px 16px;
            border-radius: 0px;
            font-size: 14px;
            font-weight: bold;
            text-transform: uppercase;
        }
        .author {
            color: #2ca02c;
        }
    </style>
    <div class="container mt-4">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-12 col-lg-8 col-xl-8">
                <div class="card">
                    <img class="card-img-top" src="https://www.movilzona.es/app/uploads/2017/02/Sony-Xperia-XZ-Premium-3.jpg" alt="Descripcion de la Imagen">
                    <div class="card-body">
                        <p><span class="categoria">Categoria</span></p>
                        <h4 class="fm-7">Titulo de la Noticia</h4>
                        <p>
                            <span class="fm-7">Por:</span>
                            <span class="author">Jordy Santamaria</span>
                            <strong>|</strong>
                            28-Ene-2018
                        </p>
                        <p class="card-text text-justify">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-12 col-md-12 col-lg-4 col-xl-4">
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
    </div>
@endsection
