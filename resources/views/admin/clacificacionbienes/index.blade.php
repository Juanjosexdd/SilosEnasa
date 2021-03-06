@extends('adminlte::page')

@section('title', 'ENASA | CLASIFICACIÓN')


@section('content')
    @include('sweetalert::alert')

    <x-card-header>
        <h3 class="text-white">Lista de clasificaciones</h3>
    </x-card-header>

    <div class="container">
        @livewire('show-clacificacionbienes')
    </div>
@stop

@section('footer')
    <x-footer></x-footer>
@stop


@section('js')
    <script src=" {{ asset('vendor/sweetalert2.js') }}  "></script>
    <script src=" {{ asset('vendor/sweetalert-eliminar.js') }} "></script>
    <script src=" {{ asset('vendor/sweetalert-estatus2.js') }} "></script>
    <script src=" {{ asset('vendor/popper.min.js') }} "></script>

    <script>
        $(function() {
            $('[data-toggle="tooltip"]').tooltip()
        })

    </script>

@stop
