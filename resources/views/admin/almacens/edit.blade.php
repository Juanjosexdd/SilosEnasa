@extends('adminlte::page')

@section('title', 'ENASA | EDITAR ALMACEN')

@section('content')
    @include('sweetalert::alert')
    <x-card-header>
        <h3 class="text-white">Editar {{ $almacen->nombre }} </h3>
    </x-card-header>

    <x-card-body>
        {!! Form::model($almacen, ['route' => ['admin.almacens.update', $almacen], 'method' => 'PUT', 'autocomplete' => 'off']) !!}
        @include('admin.almacens.partials.form')
        <div class="col-sm-12">
            <div class="form-group">
                <label class="text-blue" for="password">Contraseña actual de
                    ({{ Auth::user()->name }} - {{ Auth::user()->last_name }})</label>
                <input id="current_password" type="password"
                    class="form-control @error('current_password') is-invalid @enderror" name="current_password"
                    value="{{ old('current_password') }}" autocomplete="current_password" autofocus
                    placeholder="Contraseña">
                @error('current_password')
                    <span class="invalid-feedback text-center" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        {!! Form::submit('Guardar almacen', ['class' => 'btn bg-navy btn-block']) !!}
        {!! Form::close() !!}
    </x-card-body>
@stop

@section('footer')
    <x-footer></x-footer>
@stop

@section('js')
    <script src="{{ asset('vendor/sweetalert2.js') }}  "></script>
    <script src=" {{ asset('vendor/sweetalert-eliminar.js') }} "></script>
    <script src=" {{ asset('vendor/sweetalert-estatus.js') }} "></script>
@stop
