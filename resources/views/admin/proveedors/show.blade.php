@extends('adminlte::page')

@section('title', 'ENASA | INFORMACION PERSONAL')

@section('content')
    <div class="container ">
        <div class="card elevation-4 col-md-12 col-sm-12" style="border-radius: 0.95rem">
            <div class="card-body">
                <h3 class="text-blue">Datos de {{ $proveedor->nombre }} </h3>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="card elevation-5 col-md-12 col-sm-12 pt-3" style="border-radius: 0.95rem">

            <div class="card-body">
                <div class="ror">
                    <div class="col-md-12">
                        <a href=" {{ route('admin.proveedors.edit', $proveedor) }} "
                            class="float-right btn bg-navy btn-sm px-3 py-2 elevation-4 ml-2"><i class="fas fa-edit"></i>
                            Editar </a>
                        <a href=" {{ route('admin.proveedors.index') }} "
                            class="float-right btn bg-navy btn-sm px-3 py-2 elevation-4 "><i class="fas fa-reply"></i>
                            Volver </a>

                        <p class="h3 text-blue">Información Personal</p>

                    </div>
                </div>
                <hr>
                <div class="row invoice-info">
                    <div class="col-sm-3 invoice-col">
                        <strong class="font-14 text-blue">Cedula / Rif</strong><br>
                        <p class="text-muted">{{ $proveedor->tipodocumento->abreviado }}-{{ $proveedor->cedularif }}</p>
                    </div>
                    <div class="col-sm-3 invoice-col">
                        <strong class="font-14 text-blue">Nombre</strong><br>
                        <div class="name-avatar d-flex align-items-center">
                            <div class="txt">
                                <div class="text-muted">{{ $proveedor->nombre }}</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3 invoice-col">
                        <strong class="font-14 text-blue">Correo electrónico</strong>
                        <br>
                        <span class="text-muted">{{ $proveedor->correo }}</span>
                    </div>
                    <div class="col-sm-3 invoice-col">
                        <strong class="font-14 text-blue">Estatus</strong><br>
                        @if ($proveedor->estatus == 1)
                            <span class="badge badge-success">Activo</span>
                        @else
                            <span class="badge badge-danger">Inactivo</span>
                        @endif
                    </div>
                </div>

                <br>
                <div class="row invoice-info">
                    <div class="col-sm-3 invoice-col">
                        <strong class="font-14 text-blue">Telefono</strong><br>
                        <span class="text-muted">{{ $proveedor->telefono }}</span>
                    </div>
                    <div class="col-sm-3 invoice-col">
                        <strong class="font-14 text-blue">Observación</strong><br>
                        @if ($proveedor->observacion == null)
                            <span class="text-muted font-italic">*** Falta Información ***</span>
                        @else 
                        <span class="text-muted">{{ $proveedor->observacion }}</span>
                        @endif
                    </div>
                    <div class="col-sm-3 invoice-col">
                        <strong class="font-14 text-blue">Creado</strong>
                        <br>
                        <span class="text-muted">{{ $proveedor->created_at }}</span>

                    </div>
                    <div class="col-sm-3 invoice-col">
                        <strong class="font-14 text-blue">Actualizado</strong><br>
                        <span class="text-muted">{{ $proveedor->updated_at }}</span>
                    </div>
                </div>
                <br>
            </div>
        </div>
    </div>
@stop
@section('footer')
    <h5 class="text-center"><a href="https://github.com/Juanjosexdd/silosenasa" target="_blank">
            ENASA - UPTP "JJ MONTILLA"</a></h5>
@stop
