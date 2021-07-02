@extends('adminlte::page')

@section('title', 'ENASA | INFORMACION PERSONAL')

@section('content')

    <div class="container ">
        <div class="card elevation-4 col-md-12 col-sm-12" style="border-radius: 0.95rem">
            <div class="card-body">
                <h3 class="text-blue">Datos de {{ $empleado->nombres }} {{ $empleado->apellidos }}</h3>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="card elevation-5 col-md-12 col-sm-12 pt-3" style="border-radius: 0.95rem">

            <div class="card-body">
                <div class="ror">
                    <div class="col-md-12">
                        <a href=" {{ route('admin.empleados.edit', $empleado) }} "
                            class="float-right btn bg-navy btn-sm px-3 py-2 elevation-4 ml-2"><i class="fas fa-edit"></i>
                            Editar </a>
                        <a href=" {{ route('admin.empleados.index') }} "
                            class="float-right btn bg-navy btn-sm px-3 py-2 elevation-4 "><i class="fas fa-reply"></i>
                            Volver </a>

                        <p class="h3 text-blue">Información Personal</p>

                    </div>
                </div>
                <hr>
                <div class="row invoice-info">
                    <div class="col-sm-3 invoice-col">
                        <strong class="font-14 text-blue">Cedula</strong><br>
                        <p class="text-muted">{{ $empleado->tipodocumento->abreviado }}-{{ $empleado->cedula }}</p>
                    </div>
                    <div class="col-sm-3 invoice-col">
                        <strong class="font-14 text-blue">Nombre completo</strong><br>
                        <div class="name-avatar d-flex align-items-center">
                            <div class="txt">
                                <div class="text-muted">{{ $empleado->nombres }} - {{ $empleado->apellidos }}</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3 invoice-col">
                        <strong class="font-14 text-blue">Correo electrónico</strong>
                        <br>
                        <span class="text-muted">{{ $empleado->email }}</span>
                    </div>
                    <div class="col-sm-3 invoice-col">
                        <strong class="font-14 text-blue">Estatus</strong><br>
                        @if ($empleado->estatus == 1)
                            <span class="badge badge-success">Activo</span>
                        @else
                            <span class="badge badge-danger">Inactivo</span>
                        @endif
                    </div>
                </div>
                <br>
                <div class="row invoice-info">
                    <div class="col-sm-3 invoice-col">
                        <strong class="font-14 text-blue">Dirección</strong><br>
                        @if ($empleado->direccion == null)
                            <span class="text-muted font-italic">*** Falta Información ***</span>
                        @endif
                        <span class="text-muted">{{ $empleado->direccion }}</span>
                    </div>
                    
                    <div class="col-sm-3 invoice-col">
                        <strong class="font-14 text-blue">Nro. Celular</strong><br>
                        <span class="text-muted">{{ $empleado->celular }}</span>
                    </div>
                    
                    <div class="col-sm-3 invoice-col">
                        <strong class="font-14 text-blue">Telefono</strong><br>
                        @if ($empleado->telefono == null)
                        <span class="text-muted font-italic">*** Falta Información ***</span>
                        @endif
                        <span class="text-muted">{{ $empleado->telefono }}</span>
                    </div>
                    <div class="col-sm-3 invoice-col">
                        <strong class="font-14 text-blue">Observación </strong>
                        <br>
                        @if ($empleado->observacion == null)
                            <span class="text-muted font-italic">*** Falta Información ***</span>
                        @else 
                        <span class="text-muted">{{ $empleado->observacion }}</span>
                        @endif
                    </div>
                </div>
                <br>
                <div class="row invoice-info">
                    <div class="col-sm-3 invoice-col">
                        <strong class="font-14 text-blue">Fecha de registro</strong>
                        <br>
                        <span class="text-muted">{{ $empleado->created_at }}</span>

                    </div>
                    <div class="col-sm-3 invoice-col">
                        <strong class="font-14 text-blue">Última actualización</strong><br>
                        <span class="text-muted">{{ $empleado->updated_at }}</span>
                    </div>
                </div>
                <br>
                <p class="h3 text-blue">Información Institucional</p>
                <hr>
                <div class="row">
                    <div class="col-sm-3 invoice-col">
                        <strong class="font-14 text-blue">Departamento</strong><br>
                        <span class="text-muted">{{ $empleado->departamento->nombre }}</span>

                    </div>
                    <div class="col-sm-3 invoice-col">
                        <strong class="font-14 text-blue">Cargo</strong><br>
                        <span class="text-muted">{{ $empleado->cargo->nombre }}</span>

                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
@section('footer')
    <h5 class="text-center"><a href="https://github.com/Juanjosexdd/silosenasa" target="_blank">
            ENASA - UPTP "JJ MONTILLA"</a></h5>
@stop
