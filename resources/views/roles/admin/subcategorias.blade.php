@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 mt-3">
                @include('layouts.admin.list-group', [ 'item' => $list_group_item ])
            </div>
            <div class="col-12 col-sm-12 col-md-8 col-lg-8 col-xl-8 mt-3">
                <h2 class="fm-7 mb-3">Subcategorias</h2>
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
                @if(count($subcategorias) > 0)
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <tr>
                                <th>Subcategoria</th>
                                <th></th>
                                <th></th>
                            </tr>
                            @foreach($subcategorias as $subcategoria)
                                <tr>
                                    <td>{{ $subcategoria->subcategoria }}</td>
                                    <td>
                                        <button class="btn btn-primary" data-toggle="modal" data-target="#editarSubcategoria" onclick="editarSubcategoria({{ $subcategoria->id_subcategoria }}, {{ $subcategoria->id_categoria }}, '{{ $subcategoria->subcategoria }}')">
                                            <i class="fas fa-pencil-alt"></i>
                                        </button>
                                    </td>
                                    <td>
                                        <form action="{{ url('/admin/eliminar-subcategorias') }}" method="POST" onSubmit="return confirm('Esta accion no se puede revertir, ¿Quieres eliminar la subcategoria actual?');">
                                            {{ csrf_field() }}
                                            <input type="hidden" name="id" value="{{ $subcategoria->id_subcategoria }}">
                                            <button type="submit" class="btn btn-danger">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                    <button class="btn btn-outline-primary mt-2" data-toggle="modal" data-target="#agregarSubcategoria">
                        Agregar Subcategoria
                    </button>
                @else
                    <h2 class="text-center fm-7">
                        Al parecer aun no has agregado subcategorias.
                        <br>
                        <button class="btn btn-outline-primary mt-3" data-toggle="modal" data-target="#agregarSubcategoria">
                            Agregar Subcategoria
                        </button>
                    </h2>
                @endif
            </div>
        </div>
    </div>
    <div class="modal fade" id="agregarSubcategoria" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title fm-7">Agregar Subcategoria</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    @if(count($categorias) > 0)
                        <form action="{{ url('/admin/subcategorias') }}" method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="categoria">Categoria</label>
                                <select class="form-control" name="categoria">
                                    @foreach($categorias as $categoria)
                                        <option value="{{ $categoria->id_categoria }}">{{ $categoria->categoria }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="titulo">Subcategoria</label>
                                <input type="text" name="subcategoria" class="form-control{{ $errors->has('subcategoria') ? ' is-invalid' : '' }}" value="{{ old('subcategoria') }}" autocomplete="off">
                                @if($errors->has('subcategoria'))
                                    <div class="invalid-feedback">
                                        <strong>{{ $errors->first('subcategoria') }}</strong>
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
                            <button type="submit" class="btn btn-primary btn-block">Agregar Subcategoria</button>
                        </form>
                    @else
                        <h4 class="fm-7 text-center">
                            Es necesario agregar categorias para poder agregar subcategorias.
                            <br>
                            <a href="{{ url('/admin/categorias') }}" class="btn btn-outline-primary mt-3">Agregar Categorias</a>
                        </h4>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="editarSubcategoria" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title fm-7">Editar Subcategoria</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    @if(count($categorias) > 0)
                        <form action="{{ url('/admin/editar-subcategorias') }}" method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <input type="hidden" class="id_subcategoria" name="id">
                            <div class="form-group">
                                <label for="categoria">Categoria</label>
                                <select class="form-control categoria" name="categoria">
                                    @foreach($categorias as $categoria)
                                        <option value="{{ $categoria->id_categoria }}">{{ $categoria->categoria }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="titulo">Subcategoria</label>
                                <input type="text" name="subcategoria" class="form-control{{ $errors->has('subcategoria') ? ' is-invalid' : '' }} subcategoria" value="{{ old('subcategoria') }}" autocomplete="off">
                                @if($errors->has('subcategoria'))
                                    <div class="invalid-feedback">
                                        <strong>{{ $errors->first('subcategoria') }}</strong>
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
                            <button type="submit" class="btn btn-primary btn-block">Agregar Subcategoria</button>
                        </form>
                    @else
                        <h4 class="fm-7 text-center">
                            Es necesario agregar categorias para poder agregar subcategorias.
                            <br>
                            <a href="{{ url('/admin/categorias') }}" class="btn btn-outline-primary mt-3">Agregar Categorias</a>
                        </h4>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        function editarSubcategoria(id_subcategoria, id_categoria, subcategoria) {
            $(".id_subcategoria").val(id_subcategoria);
            $(".categoria option[value='"+id_categoria+"']").attr("selected", true);
            $(".subcategoria").val(subcategoria);
            $('.img_previa_editar').attr('src', 'http://localhost:8000/img/subcategorias/'+id_subcategoria+'.jpg');
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