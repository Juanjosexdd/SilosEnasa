@extends('adminlte::page')

@section('title', 'ENASA | ALMACEN')

@section('content')
    <x-card-header>
        <h3 class="text-white">Lista de almacenes</h3>
    </x-card-header>

    @include('sweetalert::alert')

    <div class="container">
        @livewire('show-almacen')
    </div>
@stop

@section('footer')
    <x-footer></x-footer>
@stop
@section('css')
    <link rel="stylesheet" href="{{ asset('css/sweetalert2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap-4.min.css') }}">
    <link rel="stylesheet" href=" {{ asset('vendor/cards.css') }} ">
@stop

@section('js')
    <script src="{{ asset('vendor/sweetalert2.js') }}  "></script>
    <script src=" {{ asset('vendor/sweetalert-eliminar.js') }} "></script>
    <script src=" {{ asset('vendor/sweetalert-estatus.js') }} "></script>
    <script src=" {{ asset('vendor/sweetalert-estatus2.js') }} "></script>
@stop
