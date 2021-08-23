@extends('adminlte::page')

@section('title', 'ENASA | USUARIOS')

@section('content')
    @include('sweetalert::alert')

    <x-card-header>
        <h3 class="text-white">Lista de logs</h3>
    </x-card-header>
    
    <div class="container">
        @livewire('show-login-sistema')
    </div>
@stop

@section('footer')
    <x-footer></x-footer>
@stop
