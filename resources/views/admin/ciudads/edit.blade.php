@extends('adminlte::page')

@section('title', 'ENASA | EDITAR MUNICIPIO')


@section('content')
    @include('sweetalert::alert')
    <x-card-header>
        <h3 class="text-white">Editar el municipio {{ $ciudad->nombre }} </h3>
    </x-card-header>

    <x-card-body>
        @can('admin.ciudads.create')
            <a href="{{ route('admin.ciudads.create') }}" class="btn bg-navy float-right ml-1 px-3 pt-1 pb-1 elevation-4"><i
                    class="fas fa-plus mt-2 px-3"></i>
            </a>
        @endcan
        {!! Form::model($ciudad, ['route' => ['admin.ciudads.update', $ciudad], 'method' => 'PUT', 'autocomplete' => 'off']) !!}
        @include('admin.ciudads.partials.form')
        {!! Form::submit('Guardar Municipio', ['class' => 'btn bg-navy btn-block']) !!}
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
