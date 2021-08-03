@extends('adminlte::page')

@section('title', 'ENASA | EDITAR DOCUMENTO')


@section('content')
    @include('sweetalert::alert')

    <x-card-header>
        <h3 class="text-white">Editar tipo documento {{ $tipodocumento->nombre }} </h3>
    </x-card-header>

    <x-card-body>
        @can('admin.tipodocumentos.create')
            <a href="{{ route('admin.tipodocumentos.create') }}"
                class="btn bg-navy float-right mt-1 ml-1 px-3 pt-1 pb-1 elevation-4"><i class="fas fa-plus mt-2 px-3"></i>
            </a>
        @endcan
        {!! Form::model($tipodocumento, ['route' => ['admin.tipodocumentos.update', $tipodocumento], 'method' => 'PUT', 'autocomplete' => 'off']) !!}
        @include('admin.tipodocumentos.partials.form')
        {!! Form::submit('Guardar tipo documento', ['class' => 'btn bg-navy btn-block']) !!}

        {!! Form::close() !!}
    </x-card-body>
@stop

@section('footer')
    <x-footer></x-footer>
@stop
