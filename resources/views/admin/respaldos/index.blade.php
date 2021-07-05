@extends('adminlte::page')

@section('title', 'ENASA | ALMACEN')

@section('content')


    @include('sweetalert::alert')

    <div class="container">
        <div class="card elevation-5 col-md-12 col-sm-12 pt-3" style="border-radius: 0.95rem" bis_skin_checked="1">
            <div class="card-body" style="overflow-y: auto">
        <livewire:laravel_backup_panel::app />
            </div>
        </div>
    </div>
@stop

@section('footer')
    <h5 class="text-center"><a href="https://github.com/Juanjosexdd/silosenasa" target="_blank">
            ENASA - UPTP "JJ MONTILLA"</a></h5>
@stop
@section('css')
        <!-- Styles -->
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
    <link href="{{ asset('vendor/laravel_backup_panel/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/laravel_backup_panel/app.css') }}" rel="stylesheet">
    {{-- @livewireStyles --}}
    
@stop

@section('js')
    <script src="{{asset('vendor/sweetalert2.js')}}  "></script>
    <script src=" {{asset('vendor/sweetalert-eliminar.js')}} "></script>
    <script src=" {{asset('vendor/sweetalert-estatus.js')}} "></script>
    <script src=" {{asset('vendor/sweetalert-estatus2.js')}} "></script>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
    {{-- @livewireScripts --}}
   
@stop