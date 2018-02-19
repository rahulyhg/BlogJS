@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 mt-3">
                @include('layouts.admin.list-group', [ 'item' => $list_group_item ])
            </div>
            <div class="col-12 col-sm-12 col-md-8 col-lg-8 col-xl-8 mt-3">
                <h2 class="fm-7 mb-3">Mi Configuración</h2>
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
                <form action="{{ url('/admin/configuracion') }}" method="POST">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="nombre" class="fm-7">Nombre Completo</label>
                        <input type="text" name="nombre" class="form-control{{ $errors->has('nombre') ? ' is-invalid' : '' }}" value="{{ (old('nombre')) ? old('nombre') : $info->name }}" autocomplete="off">
                        @if($errors->has('nombre'))
                            <div class="invalid-feedback">
                                <strong>{{ $errors->first('nombre') }}</strong>
                            </div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="info" class="fm-7">Información Personal</label>
                        <textarea name="info" class="form-control{{ $errors->has('info') ? ' is-invalid' : '' }}">{{ (old('info')) ? old('info') : $info->info }}</textarea>
                        @if($errors->has('info'))
                            <div class="invalid-feedback">
                                <strong>{{ $errors->first('info') }}</strong>
                            </div>
                        @endif
                    </div>
                    <button class="btn btn-outline-dark">Actualizar Información</button>
                </form>
            </div>
        </div>
    </div>
@endsection