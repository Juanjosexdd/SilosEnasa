@extends('adminlte::page')

@section('title', 'ENASA | EDITAR DEPARTAMENTO')

@section('content')
    @include('sweetalert::alert')

    <x-card-header>
        <h3 class="text-white">Editar departamento {{ $departamento->nombre }} </h3>
    </x-card-header>

    <x-card-body>

        @can('admin.cargos.create')
            <a href="{{ route('admin.cargos.create') }}" class="btn bg-navy float-right ml-1 px-3 pt-1 pb-1 elevation-4"><i
                    class="fas fa-plus mt-2 px-3"></i>
            </a>
        @endcan
        {!! Form::model($departamento, ['route' => ['admin.departamentos.update', $departamento], 'method' => 'PUT', 'autocomplete' => 'off']) !!}
        @include('admin.departamentos.partials.form')
        {!! Form::submit('Guardar departamento', ['class' => 'btn bg-navy btn-block']) !!}
        {!! Form::close() !!}
    </x-card-body>
@stop

@section('footer')
    <x-footer></x-footer>
@stop

@section('css')
    <link rel="stylesheet" href="{{ asset('vendor/cards.css') }}">
@stop
