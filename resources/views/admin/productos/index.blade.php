@extends('adminlte::page')

@section('title', 'ENASA | PRODUCTOS')

@section('content')
    @include('sweetalert::alert')

    <x-card-header>
        <h3 class="text-white">Lista de productos</h3>
    </x-card-header>

    <div class="container">
        @livewire('show-producto')
    </div>
@stop

@section('footer')
    <x-footer></x-footer>
@stop
@section('css')
    <link rel="stylesheet" href="{{ asset('css/sweetalert2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap-4.min.css') }}">
@stop

@section('js')
    <script src="{{asset('vendor/sweetalert2.js')}}  "></script>
    <script src=" {{asset('vendor/sweetalert-eliminar.js')}} "></script>
    <script src=" {{asset('vendor/sweetalert-estatus.js')}} "></script>
    <script src=" {{asset('vendor/sweetalert-estatus2.js')}} "></script>
@stop