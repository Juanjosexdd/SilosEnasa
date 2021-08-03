@extends('adminlte::page')

@section('title', 'ENASA | RESPALDOS')

@section('content')


    @include('sweetalert::alert')

    <x-card-body>
        <livewire:laravel_backup_panel::app />
    </x-card-body>
@stop

@section('footer')
    <x-footer></x-footer>
@stop

@section('css')
        <!-- Styles -->
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/backup/toastify.min.css') }}">
    <link href="{{ asset('vendor/laravel_backup_panel/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/laravel_backup_panel/app.css') }}" rel="stylesheet">
    {{-- @livewireStyles --}}
    
@stop

@section('js')
    <script src="{{asset('vendor/sweetalert2.js')}}  "></script>
    <script src=" {{asset('vendor/sweetalert-eliminar.js')}} "></script>
    <script src=" {{asset('vendor/sweetalert-estatus.js')}} "></script>
    <script src=" {{asset('vendor/sweetalert-estatus2.js')}} "></script>

    <script src="{{ asset('vendor/backup/jquery-3.5.1.slim.min.js') }}" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="{{ asset('vendor/backup/bootstrap.bundle.min.js') }}" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <script type="text/javascript" src="{{ asset('vendor/backup/toastify-js.js') }}"></script>
    {{-- @livewireScripts --}}
    
@stop