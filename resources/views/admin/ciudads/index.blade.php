@extends('adminlte::page')

@section('title', 'ENASA | MUNICIPIOS')

@section('content')

    @include('sweetalert::alert')
    <x-card-header>
        <h3 class="text-white">Lista de municipios</h3>
    </x-card-header>
    
    <div class="container">
        @livewire('show-ciudad')
    </div>
@stop

@section('footer')
    <x-footer></x-footer>
@stop

@section('css')
    <link rel="stylesheet" href="{{ asset('css/sweetalert2.min.css') }}">

@stop

@section('js')
    <script src="{{ asset('vendor/sweetalert2.js') }}  "></script>
    <script src=" {{ asset('vendor/sweetalert-eliminar.js') }} "></script>
    <script src=" {{ asset('vendor/sweetalert-estatus.js') }} "></script>
    <script src=" {{ asset('vendor/sweetalert-estatus2.js') }} "></script>
@stop
