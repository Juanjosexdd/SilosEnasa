@extends('adminlte::page')

@section('title', 'ENASA | CREAR NUEVO TRABAJADOR')

@section('content')
    @include('sweetalert::alert')

    <div class="card elevation-4 col-md-12 col-sm-12" style="border-radius: 0.95rem">
        <div class="card-body">
            <h3 class="text-blue">Registrar nuevo empleado</h3>
        </div>
    </div>

    <div class="card elevation-5 col-md-12 col-sm-12 pt-3" style="border-radius: 0.95rem">
        <div class="card-body" style="overflow-y: auto">
            {!! Form::open(['route' => 'admin.empleados.store']) !!}

            @include('admin.empleados.partials.form')
            {!! Form::submit('Guardar', ['class' => 'btn btn-outline-primary btn-block']) !!}
            {!! Form::close() !!}

        </div>
        <div class="card-footer" style="background: inherit; border-color: inherit;">

        </div>
    </div>
    <!-- Copy until here -->

    </div>
@stop

@section('footer')
    <h5 class="text-center"><a href="https://github.com/Juanjosexdd/proyecto2021" target="_blank">
            ENASA - UPTP "JJ MONTILLA"</a></h5>
@stop

@section('css')
    <link rel="stylesheet" href="{{asset('vendor/select2/css/bootstrap-select.min.css')}}">
@stop

@section('js')
<script src="{{asset('vendor/select2/js/bootstrap-select.min.js')}}"></script> 
@stop
