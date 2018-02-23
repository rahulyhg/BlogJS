@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 mt-3">
                @include('layouts.admin.list-group', [ 'item' => $list_group_item ])
            </div>
            <div class="col-12 col-sm-12 col-md-8 col-lg-8 col-xl-8 mt-3">
                <h2 class="fm-7 mb-3">Nuevo Post</h2>
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
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script type="text/javascript" src="{{ asset('ckeditor/ckeditor.js') }}"></script>
    <script>
        new Vue({
            el: '#app',
            methods: {
                cambiarImagen: function (event) {
                    var input = event.target;

                    if (input.files && input.files[0]) {

                        var reader = new FileReader();

                        reader.onload = function (e) {

                            $('.img_previa').attr('src', e.target.result);

                        }

                        reader.readAsDataURL(input.files[0]);

                    }
                }
            }
        });
    </script>
@endsection