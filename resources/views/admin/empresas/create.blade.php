@extends('adminlte::page')

@section('title', 'ENASA | CREAR ESTADO')

@section('content')
    @include('sweetalert::alert')

    <div class="card elevation-4 col-md-12 col-sm-12" style="border-radius: 0.95rem">
        <div class="card-body">
            <h3 class="text-blue">Crear nuevo estado</h3>
        </div>
    </div>

    <div class="card elevation-5 col-md-12 col-sm-12 pt-3" style="border-radius: 0.95rem" bis_skin_checked="1">

        <div class="card-body" style="overflow-y: auto">
            {!! Form::open(['route' => 'admin.estados.store']) !!}

            @include('admin.estados.partials.form')
            {!! Form::submit('Guardar estado', ['class' => 'btn bg-navy btn-block']) !!}
            {!! Form::close() !!}
        </div>
        <div class="card-footer" style="background: inherit; border-color: inherit;">

        </div>
    </div>
@stop

@section('footer')
    <h5 class="text-center"><a href="https://github.com/Juanjosexdd/proyecto2021" target="_blank">
            ENASA - UPTP "JJ MONTILLA"</a></h5>
@stop

@section('js')

    <script>
        swal({
            "timer": 1800,
            "title": "Título",
            "text": "Notificación Básica",
            "showConfirmButton": false
        });

    </script>
@stop
@section('css')
    <link rel="stylesheet" href=" {{ asset('vendor/cards.css') }} ">
@stop
