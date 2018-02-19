@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 mt-3">
                @include('layouts.admin.list-group', [ 'item' => $list_group_item ])
            </div>
            <div class="col-12 col-sm-12 col-md-8 col-lg-8 col-xl-8 mt-3">
                <h2 class="fm-7 mb-3">Posts</h2>
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
                @if(count($posts) > 0)
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <tr>
                                <th></th>
                                <th>Titulo</th>
                                <th>Descripción</th>
                                <th></th>
                                <th></th>
                            </tr>
                            @foreach($posts as $post)
                                <tr>
                                    <td>
                                        <a class="btn btn-outline-dark" href="{{ url('/post/'.$post->id_post.'/'.str_replace(" ", "-", $post->titulo)) }}" target="_blank">
                                            <i class="fas fa-share"></i>
                                        </a>
                                    </td>
                                    <td>{{ $post->titulo }}</td>
                                    <td>{{ $post->breve_descripcion }}</td>
                                    <td>
                                        <button class="btn btn-primary" data-toggle="modal" data-target="#editarPost" v-on:click="editarPost({{ $post->id_post }}, {{ $post->id_subcategoria }}, '{{ $post->titulo }}', '{{ $post->descripcion_foto }}', '{{ $post->breve_descripcion }}', {{ $post->descripcion }}, '{{ $post->etiquetas }}')">
                                            <i class="fas fa-pencil-alt"></i>
                                        </button>
                                    </td>
                                    <td>
                                        <form action="{{ url('/admin/eliminar-posts') }}" method="POST" onSubmit="return confirm('Esta accion no se puede revertir, ¿Quieres eliminar el post actual?');">
                                            {{ csrf_field() }}
                                            <input type="hidden" name="id" value="{{ $post->id_post }}">
                                            <button type="submit" class="btn btn-danger">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                        {{ $posts->links('layouts.pagination') }}
                    </div>
                    <button class="btn btn-outline-primary mt-2 mb-2" data-toggle="modal" data-target="#publicarPost">Publicar Post</button>
                @else
                    <h2 class="text-center fm-7">
                        Al parecer aun no has publicado posts.
                        <br>
                        <button class="btn btn-outline-primary mt-3 mb-3" data-toggle="modal" data-target="#publicarPost">
                            Publicar Post
                        </button>
                    </h2>
                @endif
            </div>
        </div>
    </div>
    <div class="modal fade" id="publicarPost" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title fm-7">Publicar Post</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    @if(count($subcategorias) > 0)
                        <form action="{{ url('/admin/posts') }}" method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="subcategoria">Subcategoria</label>
                                <select class="form-control" name="subcategoria">
                                    @foreach($subcategorias as $subcategoria)
                                        <option value="{{ $subcategoria->id_subcategoria }}">{{ $subcategoria->subcategoria }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="titulo">Titulo</label>
                                <input type="text" name="titulo" class="form-control{{ $errors->has('titulo') ? ' is-invalid' : '' }}" value="{{ old('titulo') }}" autocomplete="off">
                                @if($errors->has('titulo'))
                                    <div class="invalid-feedback">
                                        <strong>{{ $errors->first('titulo') }}</strong>
                                    </div>
                                @endif
                            </div>
                            <div class="input-group mb-2">
                                <label class="custom-file w-100">
                                    <input type="file" class="custom-file-input" name="foto" v-on:change="cambiarImagen">
                                    <span class="custom-file-control"></span>
                                </label>
                            </div>
                            <img class="img-fluid img_previa mt-2 mb-2 w-100" src="#" alt="Es necesario subir una imagen.">
                            <div class="form-group mt-3">
                                <label for="desc_imagen">Descripción de la Imagen</label>
                                <input type="desc_imagen" name="desc_imagen" class="form-control{{ $errors->has('desc_imagen') ? ' is-invalid' : '' }}" value="{{ old('desc_imagen') }}" autocomplete="off">
                                @if($errors->has('desc_imagen'))
                                    <div class="invalid-feedback">
                                        <strong>{{ $errors->first('desc_imagen') }}</strong>
                                    </div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="breve_desc">Breve Descripción</label>
                                <textarea name="breve_desc" class="form-control{{ $errors->has('breve_desc') ? ' is-invalid' : '' }}">{{ old('breve_desc') }}</textarea>
                                @if($errors->has('breve_desc'))
                                    <div class="invalid-feedback">
                                        <strong>{{ $errors->first('breve_desc') }}</strong>
                                    </div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="editor1">Descripción</label>
                                <textarea name="editor1" id="editor1" class="ckeditor">{{ old('editor1') }}</textarea>
                                @if($errors->has('editor1'))
                                    <div class="invalid-feedback">
                                        <strong>{{ $errors->first('editor1') }}</strong>
                                    </div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="etiquetas">Etiquetas</label>
                                <textarea name="etiquetas" class="form-control{{ $errors->has('etiquetas') ? ' is-invalid' : '' }}">{{ old('etiquetas') }}</textarea>
                                @if($errors->has('etiquetas'))
                                    <div class="invalid-feedback">
                                        <strong>{{ $errors->first('etiquetas') }}</strong>
                                    </div>
                                @endif
                            </div>
                            <button type="submit" class="btn btn-primary">Registrar</button>
                        </form>
                    @else
                        <h4 class="fm-7 text-center">
                            Es necesario agregar subcategorias para poder publicar un post.
                            <br>
                            <a href="{{ url('/admin/subcategorias') }}" class="btn btn-outline-primary mt-3">Agregar Subcategoria</a>
                        </h4>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="editarPost" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title fm-7">Editar Post</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                        <form action="{{ url('/admin/editar-posts') }}" method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <input type="hidden" name="id" v-model="editarIdPost">
                            <div class="form-group">
                                <label for="subcategoria">Subcategoria</label>
                                <select class="form-control subcategoria_e" name="subcategoria">
                                    @foreach($subcategorias as $subcategoria)
                                        <option value="{{ $subcategoria->id_subcategoria }}">{{ $subcategoria->subcategoria }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="titulo">Titulo</label>
                                <input type="text" name="titulo" class="form-control{{ $errors->has('titulo') ? ' is-invalid' : '' }}" v-model="editarTitulo" autocomplete="off">
                                @if($errors->has('titulo'))
                                    <div class="invalid-feedback">
                                        <strong>{{ $errors->first('titulo') }}</strong>
                                    </div>
                                @endif
                            </div>
                            <div class="input-group mb-2">
                                <label class="custom-file w-100">
                                    <input type="file" class="custom-file-input" name="foto" v-on:change="imagenPostEditar">
                                    <span class="custom-file-control"></span>
                                </label>
                            </div>
                            <img class="img-fluid img_previa_editar mt-2 mb-2 w-100" src="#" alt="Es necesario subir una imagen.">
                            <div class="form-group mt-3">
                                <label for="desc_imagen">Descripción de la Imagen</label>
                                <input type="desc_imagen" name="desc_imagen" class="form-control{{ $errors->has('desc_imagen') ? ' is-invalid' : '' }}" v-model="editarDescripcionFoto" value="{{ old('desc_imagen') }}" autocomplete="off">
                                @if($errors->has('desc_imagen'))
                                    <div class="invalid-feedback">
                                        <strong>{{ $errors->first('desc_imagen') }}</strong>
                                    </div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="breve_desc">Breve Descripción</label>
                                <textarea name="breve_desc" class="form-control{{ $errors->has('breve_desc') ? ' is-invalid' : '' }}" v-model="editarBreveDescripcion">{{ old('breve_desc') }}</textarea>
                                @if($errors->has('breve_desc'))
                                    <div class="invalid-feedback">
                                        <strong>{{ $errors->first('breve_desc') }}</strong>
                                    </div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="editor2">Descripción</label>
                                <textarea name="editor2" id="editor2" class="ckeditor">{{ old('editor2') }}</textarea>
                                @if($errors->has('editor2'))
                                    <div class="invalid-feedback">
                                        <strong>{{ $errors->first('editor2') }}</strong>
                                    </div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="etiquetas">Etiquetas</label>
                                <textarea name="etiquetas" class="form-control{{ $errors->has('etiquetas') ? ' is-invalid' : '' }}" v-model="editarEtiquetas">{{ old('etiquetas') }}</textarea>
                                @if($errors->has('etiquetas'))
                                    <div class="invalid-feedback">
                                        <strong>{{ $errors->first('etiquetas') }}</strong>
                                    </div>
                                @endif
                            </div>
                            <button type="submit" class="btn btn-primary">Actualizar</button>
                        </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script type="text/javascript" src="{{ asset('ckeditor/ckeditor.js') }}"></script>
    <script type="text/javascript" src="{{ asset('custom/js/roles/admin/posts.js') }}"></script>
@endsection