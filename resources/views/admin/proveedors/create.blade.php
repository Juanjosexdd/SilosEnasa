@extends('adminlte::page')

@section('title', 'ENASA | CREAR NUEVO PROVEEDOR')

@section('content')
    @include('sweetalert::alert')

    <div class="container">
        <div class="card elevation-4 col-md-12 col-sm-12" style="border-radius: 0.95rem">
            <div class="card-body">
                <h3 class="text-blue">Crear un nuevo proveedor</h3>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="card elevation-5 col-md-12 col-sm-12 pt-3" style="border-radius: 0.95rem" bis_skin_checked="1">
            <div class="card-body" style="overflow-y: auto">
                <a href=" {{ route('admin.proveedors.index') }} "
                    class="float-right btn bg-navy btn-sm px-3 py-2 elevation-4"><i class="fas fa-reply"></i> Volver</a>
                <p class="h3 text-blue">Información proveedor</p>
                <hr>
                {!! Form::open(['route' => 'admin.proveedors.store']) !!}
                @include('admin.proveedors.partials.form')
                {!! Form::submit('Guardar proveedor', ['class' => 'btn bg-navy btn-block']) !!}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@stop

@section('footer')
    <h5 class="text-center"><a href="https://github.com/Juanjosexdd/silosenasa" target="_blank">
            ENASA - UPTP "JJ MONTILLA"</a></h5>
@stop
