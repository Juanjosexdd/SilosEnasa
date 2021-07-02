@extends('adminlte::page')

@section('title', 'ENASA | EDITAR ROL')

@section('content')
    @include('sweetalert::alert')
    <div class="container">
        <div class="card elevation-4 col-md-12 col-sm-12" style="border-radius: 0.95rem">
            <div class="card-body">
                <h3 class="text-blue">Editar Rol</h3>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="card elevation-4 col-md-12 col-sm-12" style="border-radius: 0.95rem">
            <div class="card-body" style="overflow-y: auto">

                {!! Form::model($role, ['route' => ['admin.roles.update', $role], 'method' => 'PUT']) !!}

                @include('admin.roles.partials.form')

                {!! Form::submit('Editar rol', ['class' => 'btn btn-block bg-navy btn-sm px-3 py-2 elevation-4']) !!}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@stop

@section('footer')
    <h5 class="text-center"><a href="https://github.com/Juanjosexdd/silosenasa" target="_blank">
            ENASA - UPTP "JJ MONTILLA"</a></h5>
@stop
