@extends('adminlte::page')

@section('title', 'ENASA | EDITAR ROL')

@section('content')
    @include('sweetalert::alert')
    <x-card-header>
        <h3 class="text-white">Editar Rol {{ $role->name }}</h3>
    </x-card-header>

    <x-card-body>
        {!! Form::model($role, ['route' => ['admin.roles.update', $role], 'method' => 'PUT']) !!}

        @include('admin.roles.partials.form')

        {!! Form::submit('Editar rol', ['class' => 'btn btn-block bg-navy btn-sm px-3 py-2 elevation-4']) !!}
        {!! Form::close() !!}
    </x-card-body>
@stop
@section('footer')
    <x-footer></x-footer>
@stop
