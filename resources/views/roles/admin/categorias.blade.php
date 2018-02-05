@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 mt-3">
                @include('layouts.admin.list-group', [ 'item' => $list_group_item ])
            </div>
            <div class="col-12 col-sm-12 col-md-8 col-lg-8 col-xl-8 mt-3">
                <h2 class="fm-7 mb-3">Categorias</h2>
                <hr>
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                @if(count($errors))
                    <div class="alert alert-danger">
                        <strong>Oops!</strong> Al parecer no se han cumplido los siguientes criterios:
                        <br/>
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                @if(count($categorias) > 0)
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <tr>
                                <th>Categoria</th>
                                <th></th>
                                <th></th>
                            </tr>
                            @foreach($categorias as $categoria)
                                <tr>
                                    <td>{{ $categoria->categoria }}</td>
                                    <td>
                                        <button class="btn btn-primary" data-toggle="modal" data-target="#editarCategoria" onclick="editarCategoria({{ $categoria->id_categoria }}, '{{ $categoria->categoria }}')">
                                            <i class="fas fa-pencil-alt"></i>
                                        </button>
                                    </td>
                                    <td>
                                        <form action="{{ url('/admin/eliminar-categorias') }}" method="POST" onSubmit="return confirm('Esta accion no se puede revertir, ¿Quieres eliminar la categoria actual?');">
                                            {{ csrf_field() }}
                                            <input type="hidden" name="id" value="{{ $categoria->id_categoria }}">
                                            <button type="submit" class="btn btn-danger">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                    <button class="btn btn-outline-primary mt-2" data-toggle="modal" data-target="#agregarCategoria">Agregar Categoria</button>
                @else
                    <h2 class="text-center fm-7">
                        Al parecer aun no has agregado categorias.
                        <br>
                        <button class="btn btn-outline-primary mt-3" data-toggle="modal" data-target="#agregarCategoria">
                            Agregar Categoria
                        </button>
                    </h2>
                @endif
            </div>
        </div>
    </div>
    <div class="modal fade" id="agregarCategoria" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title fm-7">Agregar Categoria</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ url('/admin/categorias') }}" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="categoria">Categoria</label>
                            <input type="text" name="categoria" class="form-control{{ $errors->has('categoria') ? ' is-invalid' : '' }}" value="{{ old('categoria') }}" autocomplete="off">
                            @if($errors->has('categoria'))
                                <div class="invalid-feedback">
                                    <strong>{{ $errors->first('categoria') }}</strong>
                                </div>
                            @endif
                        </div>
                        <div class="input-group mb-2">
                            <label class="custom-file w-100">
                                <input type="file" class="custom-file-input imagen_post" name="foto">
                                <span class="custom-file-control"></span>
                            </label>
                        </div>
                        <img class="img-fluid img_previa mt-2 mb-2 w-100" src="#" alt="Es necesario subir una imagen.">
                        <button type="submit" class="btn btn-primary btn-block">Agregar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="editarCategoria" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title fm-7">Editar Categoria</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ url('/admin/editar-categorias') }}" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <input type="hidden" name="id" class="id_categoria">
                        <div class="form-group">
                            <label for="categoria">Categoria</label>
                            <input type="text" name="categoria" class="form-control{{ $errors->has('categoria') ? ' is-invalid' : '' }} categoria" value="{{ old('categoria') }}" autocomplete="off">
                            @if($errors->has('categoria'))
                                <div class="invalid-feedback">
                                    <strong>{{ $errors->first('categoria') }}</strong>
                                </div>
                            @endif
                        </div>
                        <div class="input-group mb-2">
                            <label class="custom-file w-100">
                                <input type="file" class="custom-file-input imagen_post_editar" name="foto">
                                <span class="custom-file-control"></span>
                            </label>
                        </div>
                        <img class="img-fluid img_previa_editar mt-2 mb-2 w-100" src="#" alt="Es necesario subir una imagen.">
                        <button type="submit" class="btn btn-primary btn-block">Actualizar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        function editarCategoria(id, categoria) {
            $(".id_categoria").val(id);
            $(".categoria").val(categoria);
            $('.img_previa_editar').attr('src', 'http://localhost:8000/img/categorias/'+id+'.jpg');
        }

        function vistaPrevia(input) {

            if (input.files && input.files[0]) {

                var reader = new FileReader();

                reader.onload = function (e) {

                    $('.img_previa').attr('src', e.target.result);

                }

                reader.readAsDataURL(input.files[0]);

            }

        }

        function vistaPreviaEditar(input) {

            if (input.files && input.files[0]) {

                var reader = new FileReader();

                reader.onload = function (e) {

                    $('.img_previa_editar').attr('src', e.target.result);

                }

                reader.readAsDataURL(input.files[0]);

            }

        }

        $(".imagen_post").change(function(){
            vistaPrevia(this);
        });

        $(".imagen_post_editar").change(function(){
            vistaPreviaEditar(this);
        });
    </script>
@endsection