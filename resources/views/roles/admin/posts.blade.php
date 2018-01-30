@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 mt-3">
                @include('layouts.admin.list-group', [ 'item' => $list_group_item ])
            </div>
            <div class="col-12 col-sm-12 col-md-8 col-lg-8 col-xl-8 mt-3">
                @if(count($posts) > 0)
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <tr>
                                <th>Titulo</th>
                                <th>Descripción</th>
                                <th></th>
                                <th></th>
                            </tr>
                            @foreach($posts as $post)
                                <tr>
                                    <td>{{ $post->titulo }}</td>
                                    <td>{{ $post->breve_descripcion }}</td>
                                    <td>
                                        <button class="btn btn-primary">
                                            <i class="fas fa-pencil-alt"></i>
                                        </button>
                                    </td>
                                    <td>
                                        <button class="btn btn-danger">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                @else
                    <h2 class="text-center fm-7">
                        Al parecer aun no has publicado posts.
                        <br>
                        <button class="btn btn-outline-primary mt-3" data-toggle="modal" data-target="#publicarPost">
                            Publicar Post
                        </button>
                    </h2>
                @endif
            </div>
        </div>
    </div>
    <div class="modal fade" id="publicarPost" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title fm-7">Publicar Post</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ url('/admin/posts') }}" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="tipo">Subcategoria</label>
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
                                <input type="file" class="custom-file-input imagen_post" name="foto">
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
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script type="text/javascript" src="{{ asset('ckeditor/ckeditor.js') }}"></script>
    <script type="text/javascript">

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

        function editarPost(id_post, id_tipo_post, titulo, descripcion_foto, breve_desc, descripcion, etiquetas) {
            $(".id_post").val(id_post);
            $(".tipo_post option[value='"+id_tipo_post+"']").attr("selected", true);
            $(".titulo_e").val(titulo);
            $(".descrip_foto").val(descripcion_foto);
            $(".breve_desc_e").val(breve_desc);
            CKEDITOR.instances['editor2'].setData(descripcion);
            $(".etiquetas_e").val(jQuery.parseJSON(etiquetas));
            $('.img_previa_editar').attr('src', route+'/img/posts/'+id_post+'.jpg');
        }

        $(".imagen_post").change(function(){
            vistaPrevia(this);
        });

        $(".imagen_post_editar").change(function(){
            vistaPreviaEditar(this);
        });

    </script>
@endsection