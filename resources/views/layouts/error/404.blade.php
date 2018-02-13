@extends('layouts.app')

@section('content')
    <style>
        .error-main {
            font-size: 60px;
        }
        .error {
            font-size: 30px;
        }
        .font-red {
            color : #E53935;
        }
    </style>
    <div class="container mt-5">
        <div class="row">
            <div class="col-12">
                <div class="text-center">
                    <h4 class="error-main fm-9 mb-3 font-red">ERROR 404</h4>
                    <h4 class="error fm-7 mb-5">Al parecer te has perdido, te redireccionaremos a un lugar seguro.</h4>
                    <a class="btn btn-primary btn-lg" href="{{ url('/') }}">Ir a un lugar seguro</a>
                </div>
            </div>
        </div>
    </div>
@endsection
