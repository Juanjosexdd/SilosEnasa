@extends('adminlte::page')

@section('title', 'ENASA | ALMACEN')

@section('content')
    <div class="container">
        <div class="card elevation-4 col-md-12 col-sm-12" style="border-radius: 0.95rem">
            <div class="card-body">
                <h3 class="text-blue">Lista de almacenes</h3>
            </div>
        </div>
    </div>

    @include('sweetalert::alert')

    <div class="container">
        @livewire('show-almacen')
    </div>
@stop

@section('footer')
    <h5 class="text-center"><a href="https://github.com/Juanjosexdd/silosenasa" target="_blank">
            ENASA - UPTP "JJ MONTILLA"</a></h5>
@stop
@section('css')
    <link rel="stylesheet" href="{{ asset('css/sweetalert2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap-4.min.css') }}">
    <link rel="stylesheet" href=" {{ asset('vendor/cards.css')}} "> 
@stop

@section('js')
    <script src="{{asset('vendor/sweetalert2.js')}}  "></script>
    <script src=" {{asset('vendor/sweetalert-eliminar.js')}} "></script>
    <script src=" {{asset('vendor/sweetalert-estatus.js')}} "></script>
    <script src=" {{asset('vendor/sweetalert-estatus2.js')}} "></script>
@stop