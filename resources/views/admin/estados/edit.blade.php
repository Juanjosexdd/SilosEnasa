@extends('adminlte::page')

@section('title', 'ENASA | EDITAR ESTADO')


@section('content')
    @include('sweetalert::alert')
    <x-card-header>
        <h3 class="text-white">Editar estado {{ $estado->nombre }} </h3>
    </x-card-header>
    <x-card-body>

        @can('admin.estados.create')
            <a href="{{ route('admin.estados.create') }}" class="btn bg-navy float-right ml-1 px-3 pt-1 pb-1 elevation-4"><i
                    class="fas fa-plus mt-2 px-3"></i>
            </a>
        @endcan
        {!! Form::model($estado, ['route' => ['admin.estados.update', $estado], 'method' => 'PUT', 'autocomplete' => 'off']) !!}
        @include('admin.estados.partials.form')
        {!! Form::submit('Guardar estado', ['class' => 'btn bg-navy btn-block']) !!}
        {!! Form::close() !!}
    </x-card-body>
@stop

@section('footer')
    <x-footer></x-footer>
@stop

@section('css')
    <style>
        .card-custom {
            overflow: hidden;
            min-height: 50px;
            box-shadow: 0 0 15px rgba(10, 10, 10, 0.3);
        }

        .card-custom-img {
            height: 50px;
            min-height: 10px;
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center;
            border-color: inherit;
        }

        /* First border-left-width setting is a fallback */
        .card-custom-img::after {
            position: absolute;
            content: '';
            top: 31px;
            left: 0;
            width: 0;
            height: 0;
            border-style: solid;
            border-top-width: 40px;
            border-right-width: 0;
            border-bottom-width: 0;
            border-left-width: 545px;
            border-left-width: calc(575px - 5vw);
            border-top-color: transparent;
            border-right-color: transparent;
            border-bottom-color: transparent;
            border-left-color: inherit;
        }

        .card-custom-avatar img {
            border-radius: 50%;
            box-shadow: 0 0 15px rgba(10, 10, 10, 0.3);
            position: absolute;
            top: 10px;
            left: 1.25rem;
            width: 50px;
            height: 50px;
        }

    </style>
@stop

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <script>
        Livewire.on('alert', function($message) {
            Swal.fire(
                'Buen Trabajo!',
                $message,
                'success'
            )
        })
    </script>
@stop
