@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 mt-3">
                @include('layouts.admin.list-group', [ 'item' => $list_group_item ])
            </div>
            <div class="col-12 col-sm-12 col-md-8 col-lg-8 col-xl-8 mt-3">
                <h2 class="fm-7 mb-3">Newsletter</h2>
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
                @if(count($newsletters) > 0)
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <tr>
                                <th>Correo</th>
                                <th>Fecha de Creación</th>
                            </tr>
                            @foreach($newsletters as $newsletter)
                                <tr>
                                    <td>{{ $newsletter->correo }}</td>
                                    <td>{{ $newsletter->created_at }}</td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                @else
                    <h2 class="text-center fm-7">
                        Nadie se ha registrado aún en el Newsletter.
                    </h2>
                @endif
            </div>
        </div>
    </div>
@endsection