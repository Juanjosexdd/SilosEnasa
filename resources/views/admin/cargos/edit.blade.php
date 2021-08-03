@extends('adminlte::page')

@section('title', 'ENASA | EDITAR CARGO')


@section('content')
    @include('sweetalert::alert')
    <x-card-header>
        <h3 class="text-white">Editar cargo {{ $cargo->nombre }} </h3>
    </x-card-header>
    <x-card-body>

        @can('admin.cargos.create')
            <a href="{{ route('admin.cargos.create') }}" class="btn bg-navy float-right ml-1 px-3 pt-1 pb-1 elevation-4"><i
                    class="fas fa-plus mt-2 px-3"></i>
            </a>
        @endcan
        {!! Form::model($cargo, ['route' => ['admin.cargos.update', $cargo], 'method' => 'PUT', 'autocomplete' => 'off']) !!}
        @include('admin.cargos.partials.form')
        {!! Form::submit('Guardar cargo', ['class' => 'btn bg-navy btn-block']) !!}
        {!! Form::close() !!}
    </x-card-body>
@stop

@section('footer')
    <x-footer></x-footer>
@stop

@section('css')
    <link rel="stylesheet" href="{{ asset('vendor/cards.css') }}">
@stop

@section('js')
    <script src="{{ asset('vendor/sweetalert2.js') }}  "></script>
    <script src=" {{ asset('vendor/sweetalert-eliminar.js') }} "></script>
    <script src=" {{ asset('vendor/sweetalert-estatus.js') }} "></script>
@stop
