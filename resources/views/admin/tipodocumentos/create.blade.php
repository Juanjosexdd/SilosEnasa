@extends('adminlte::page')

@section('title', 'ENASA | CREAR NUEVO DOCUMENTO')


@section('content')
    <div class="container">
        <div class="card elevation-4 col-md-12 col-sm-12" style="border-radius: 0.95rem">
            <div class="card-body">
                <h3 class="text-blue">Crear un nuevo tipo de docimento</h3>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="card elevation-5 col-md-12 col-sm-12 pt-3" style="border-radius: 0.95rem" bis_skin_checked="1">
            <div class="card-body" style="overflow-y: auto">

                {!! Form::open(['route' => 'admin.tipodocumentos.store']) !!}
                @include('admin.tipodocumentos.partials.form')
                {!! Form::submit('Guardar tipo documento', ['class' => 'btn bg-navy btn-block']) !!}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@stop
@section('footer')
    <h5 class="text-center"><a href="https://github.com/Juanjosexdd/silosenasa" target="_blank">
            ENASA - UPTP "JJ MONTILLA"</a></h5>
@stop
