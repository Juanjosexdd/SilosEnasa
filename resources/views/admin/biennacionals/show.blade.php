@extends('adminlte::page')

@section('title', 'ENASA | INFORMACION PERSONAL')

@section('content')
<x-card-header>
    <h3 class="text-white">Datos de {{ $biennacional->nombre }} </h3>
</x-card-header>
    <div class="container">
        <div class="card elevation-5 col-md-12 col-sm-12 pt-3" style="border-radius: 0.95rem">

            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <a href=" {{ route('admin.biennacionals.edit', $biennacional) }} "
                            class="float-right btn bg-navy btn-sm px-3 py-2 elevation-4 ml-2"><i class="fas fa-edit"></i>
                            Editar </a>
                        <a href=" {{ route('admin.biennacionals.index') }} "
                            class="float-right btn bg-navy btn-sm px-3 py-2 elevation-4 "><i class="fas fa-reply"></i>
                            Volver </a>

                        <p class="h3 text-blue">Ficha de {{ $biennacional->nombre }}</p>

                    </div>
                </div>
                <hr>
                <div class="row  text-center justify-content-around invoice-info">
                    <div class="col-sm-2 invoice-col">
                        <strong class="font-14 text-blue">Codigo</strong><br>
                        <p class="text-muted">{{ $biennacional->codigo}}</p>
                    </div>
                    
                    <div class="col-sm-2 invoice-col">
                        <strong class="font-14 text-blue">Nombre</strong><br>
                        <div class="name-avatar d-flex align-items-center">
                            <div class="txt">
                                <div class="text-muted">{{ $biennacional->nombre }}</div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-sm-2 invoice-col">
                        <strong class="font-14 text-blue">Costo</strong><br>
                        <span class="text-muted">{{ $biennacional->costo }}</span>
                    </div>
                    <div class="col-sm-2 invoice-col">
                        <strong class="font-14 text-blue">Vida Util</strong><br>
                        <span class="text-muted">{{ $biennacional->vidautil }} (Meses)</span>
                    </div>
                    <div class="col-md-2">
                        <strong class="font-14 text-blue">Depreciacion Mensual</strong>
                        {{  $biennacional->costo,2 / $biennacional->vidautil,2 }}
                    </div>
                    <div class="col-sm-2 invoice-col">
                        <strong class="font-14 text-blue">Estatus</strong><br>
                        @if ($biennacional->estatus == 1)
                            <span class="badge badge-success">Activo</span>
                        @else
                            <span class="badge badge-danger">Inactivo</span>
                        @endif
                    </div>
                </div>

                <br>
                <div class="row  justify-content-around text-center">
                    <div class="col-sm-3 invoice-col">
                        <strong class="font-14 text-blue">Fecha de adquisicion</strong><br>
                        <span class="text-muted">{{ $biennacional->fecha_adquisicion }}</span>
                    </div>
                    <div class="col-sm-3 invoice-col">
                        <strong class="font-14 text-blue">Fecha de adquisicion</strong><br>
                        <span class="text-muted">{{ $biennacional->fecha_desincorporacion}}</span>
                    </div>
                    <div class="col-sm-3 invoice-col">
                        <strong class="font-14 text-blue">Creado</strong>
                        <br>
                        <span class="text-muted">{{ $biennacional->created_at->toFormattedDateString() }}</span>

                    </div>
                    <div class="col-sm-3 invoice-col">
                        <strong class="font-14 text-blue">Actualizado</strong><br>
                        <span class="text-muted">{{ $biennacional->updated_at->toFormattedDateString() }}</span>
                    </div>
                </div>
                <br>
                <div class="row justify-content-around text-center">
                    <div class="col-sm-3 invoice-col">
                        <strong class="font-14 text-blue">Descripción</strong>
                        <br>
                        <span class="text-muted">{{ $biennacional->descripcion }}</span>
                    </div>
                    <div class="col-sm-3 invoice-col">
                        <strong class="font-14 text-blue">Observación</strong><br>
                        @if ($biennacional->observacion == null)
                            <span class="text-muted font-italic">*** Falta Información ***</span>
                        @else 
                        <span class="text-muted">{{ $biennacional->observacion }}</span>
                        @endif
                    </div>
                </div>
                 
            </div>
        </div>
    </div>
@stop

@section('footer')
    <x-footer></x-footer>
@stop