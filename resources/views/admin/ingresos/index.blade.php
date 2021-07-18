@extends('adminlte::page')

@section('title', 'ENASA | INGRESOS')


@section('content')
@include('sweetalert::alert')

@include('sweetalert::alert')
    <div class="container">
        <div class="card elevation-4 col-md-12 col-sm-12" style="border-radius: 0.95rem">
            <div class="card-body">
                <h3 class="text-blue">Lista de Ingresos</h3>
            </div>
        </div>
    </div>

    <div class="container">
        @livewire('show-ingreso')
    </div>

</div>
@stop

@section('footer')
<h5 class="text-center"><a href="https://github.com/Juanjosexdd/silosenasa"  target="_blank">
    ENASA - UPTP "JJ MONTILLA"</a></h5>
@stop

@section('js')
    <script src=" {{ asset('vendor/sweetalert2.js') }}  "></script>
    <script src=" {{ asset('vendor/sweetalert-eliminar.js') }} "></script>
    <script src=" {{ asset('vendor/sweetalert-estatus.js') }} "></script>
    <script src=" {{ asset('vendor/sweetalert-estatus2.js') }} "></script>
    <script src=" {{ asset('vendor/sweetalert-anular.js') }} "></script>
    <script src=" {{ asset('vendor/popper.min.js') }} "></script>

    <script>
        $(function() {
            $('[data-toggle="tooltip"]').tooltip()
        })

    </script>

@stop


