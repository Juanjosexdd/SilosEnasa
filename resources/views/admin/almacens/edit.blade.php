@extends('adminlte::page')

@section('title', 'ENASA | EDITAR ALMACEN')

@section('content')
    @include('sweetalert::alert')
    <div class="container">
        <div class="card elevation-4 col-md-12 col-sm-12" style="border-radius: 0.95rem">
            <div class="card-body">
                <h3 class="text-blue">Editar {{ $almacen->nombre }} </h3>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="card elevation-5 col-md-12 col-sm-12 pt-3" style="border-radius: 0.95rem" bis_skin_checked="1">
            <div class="card-body" style="overflow-y: auto">
                {!! Form::model($almacen, ['route' => ['admin.almacens.update', $almacen], 'method' => 'PUT', 'autocomplete' => 'off']) !!}
                @include('admin.almacens.partials.form')
                <div class="col-sm-12">
                    <div class="form-group">
                        <label class="text-blue" for="password">Contraseña actual de 
                            ({{ Auth::user()->name }} - {{ Auth::user()->last_name }})</label>
                        <input id="current_password" type="password"
                            class="form-control @error('current_password') is-invalid @enderror"
                            name="current_password" value="{{ old('current_password') }}"
                            autocomplete="current_password" autofocus placeholder="Contraseña">
                        @error('current_password')
                            <span class="invalid-feedback text-center" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                {!! Form::submit('Guardar almacen', ['class' => 'btn bg-navy btn-block']) !!}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@stop

@section('footer')
    <h5 class="text-center"><a href="https://github.com/Juanjosexdd/silosenasa" target="_blank"> ENASA - UPTP "JJ MONTILLA"</a></h5>
@stop

@section('js')
    <script src="{{ asset('vendor/sweetalert2.js') }}  "></script>
    <script src=" {{ asset('vendor/sweetalert-eliminar.js') }} "></script>
    <script src=" {{ asset('vendor/sweetalert-estatus.js') }} "></script>
@stop
