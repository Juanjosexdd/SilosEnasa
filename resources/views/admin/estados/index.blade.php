@extends('adminlte::page')

@section('title', 'ENASA | LISTA DE ESTADOS')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/sweetalert2.min.css') }}">
@stop

@section('content')
    @include('sweetalert::alert')
    <x-card-header>
        <h3 class="text-white">Lista de estados</h3>
    </x-card-header>

    <div class="container">
        @livewire('show-estado')
    </div>
@stop

@section('footer')
<h5 class="text-center"><a href="https://github.com/Juanjosexdd/proyecto2021"  target="_blank">
    ENASA - UPTP "JJ MONTILLA"</a></h5>
@stop

@section('js')
    <script src=" {{ asset('vendor/sweetalert2.js') }}  "></script>
    <script src=" {{ asset('vendor/sweetalert-eliminar.js') }} "></script>
    <script src=" {{ asset('vendor/sweetalert-estatus.js') }} "></script>
    <script src=" {{ asset('vendor/sweetalert-estatus2.js') }} "></script>
    <script src=" {{ asset('vendor/popper.min.js') }} "></script>

    <script>
        $(function() {
            $('[data-toggle="tooltip"]').tooltip()
        })

    </script>

@stop
