@extends('adminlte::page')

@section('title', 'ENASA | CREAR NUEVO TRABAJADOR')

@section('content')
    @include('sweetalert::alert')

    <x-card-header>
        <h3 class="text-white">Registrar nuevo empleado</h3>
    </x-card-header>
    
    <x-card-body>
        {!! Form::open(['route' => 'admin.empleados.store']) !!}
        @include('admin.empleados.partials.form')
        {!! Form::submit('Guardar', ['class' => 'btn bg-navy btn-block']) !!}
        {!! Form::close() !!}
    </x-card-body>
@stop

@section('footer')
    <x-footer></x-footer>
@stop

@section('css')
    <link rel="stylesheet" href="{{asset('vendor/select2/css/bootstrap-select.min.css')}}">
@stop

@section('js')
<script src="{{asset('vendor/select2/js/bootstrap-select.min.js')}}"></script> 
@stop
