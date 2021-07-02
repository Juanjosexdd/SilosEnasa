@extends('adminlte::page')

@section('title', 'ENASA | CREAR NUEVO MUNICIPIO')

@section('content')
    @include('sweetalert::alert')

    <div class="card elevation-4 col-md-12 col-sm-12" style="border-radius: 0.95rem">
        <div class="card-body">
            <h3 class="text-blue">Crear un nuevo municipio</h3>
        </div>
    </div>

    <div class="card elevation-5 col-md-12 col-sm-12 pt-3" style="border-radius: 0.95rem" bis_skin_checked="1">

        <div class="card-body" style="overflow-y: auto">
            {!! Form::open(['route' => 'admin.ciudads.store']) !!}

            @include('admin.ciudads.partials.form')
            {!! Form::submit('Guardar Municipio', ['class' => 'btn bg-navy btn-block']) !!}
            {!! Form::close() !!}
        </div>
    </div>
@stop

@section('footer')
    <h5 class="text-center"><a href="https://github.com/Juanjosexdd/silosenasa" target="_blank">
            ENASA - UPTP "JJ MONTILLA"</a></h5>
@stop

@section('css')
    <link rel="stylesheet" href="{{ asset('vendor/cards.css') }}">
@stop
