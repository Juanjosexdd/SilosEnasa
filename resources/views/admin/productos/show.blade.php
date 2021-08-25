@extends('adminlte::page')

@section('title', 'ENASA | INFORMACION PERSONAL')

@section('content')
<x-card-header>
    <h3 class="text-white">Datos de {{ $producto->nombre }} </h3>
</x-card-header>
    <div class="container">
        <div class="card elevation-5 col-md-12 col-sm-12 pt-3" style="border-radius: 0.95rem">

            <div class="card-body">
                        <a href=" {{ route('admin.productos.edit', $producto) }} "
                            class="float-right btn bg-navy btn-sm px-3 py-2 elevation-4 ml-2"><i class="fas fa-edit"></i>
                            Editar </a>
                        <a href=" {{ route('admin.productos.index') }} "
                            class="float-right btn bg-navy btn-sm px-3 py-2 elevation-4 "><i class="fas fa-reply"></i>
                            Volver </a>
                <ul class="nav nav-tabs" id="custom-content-below-tab" role="tablist">
                    <li class="nav-item">
                      <a class="nav-link active" id="custom-content-below-home-tab" data-toggle="pill" href="#custom-content-below-home" role="tab" aria-controls="custom-content-below-home" aria-selected="true">Ficha de Material o herramienta</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" id="custom-content-below-profile-tab" data-toggle="pill" href="#custom-content-below-profile" role="tab" aria-controls="custom-content-below-profile" aria-selected="false">Kardex</a>
                    </li>
                </ul>
                <div class="tab-content" id="custom-content-below-tabContent">
                    <div class="tab-pane fade show active" id="custom-content-below-home" role="tabpanel" aria-labelledby="custom-content-below-home-tab">
                        <div class="row invoice-info">
                            <div class="col-sm-2 invoice-col">
                                <strong class="font-14 text-blue">Codigo</strong><br>
                                <p class="text-muted">{{ $producto->clacificacion->abreviado }}{{ $producto->id }}</p>
                            </div>
                            <div class="col-sm-3 invoice-col">
                                <strong class="font-14 text-blue">Nombre</strong><br>
                                <div class="name-avatar d-flex align-items-center">
                                    <div class="txt">
                                        <div class="text-muted">{{ $producto->nombre }}</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-2 invoice-col">
                                <strong class="font-14 text-blue">Ubicación</strong><br>
                                <span class="text-muted">{{ $producto->ubicacion }}</span>
                            </div>
                            <div class="col-sm-2 invoice-col">
                                <strong class="font-14 text-blue">marca</strong><br>
                                <span class="text-muted">{{ $producto->marca }}</span>
                            </div>
                            <div class="col-sm-3 invoice-col">
                                <strong class="font-14 text-blue">Estatus</strong><br>
                                @if ($producto->estatus == 1)
                                    <span class="badge badge-success">Activo</span>
                                @else
                                    <span class="badge badge-danger">Inactivo</span>
                                @endif
                            </div>
                        </div>

                        <br>
                        <div class="row invoice-info">
                            <div class="col-sm-2 invoice-col">
                                <strong class="font-14 text-blue">Unidad de medida</strong>
                                <br>
                                <span class="text-muted">{{ $producto->unidad_medida }}</span>
                            </div>
                            <div class="col-sm-3 invoice-col">
                                <strong class="font-14 text-blue">Descripción</strong><br>
                                @if ($producto->descripcion == null)
                                    <span class="text-muted font-italic">*** Falta Información ***</span>
                                @else 
                                <span class="text-muted">{{ $producto->descripcion }}</span>
                                @endif
                            </div>
                            <div class="col-sm-3 invoice-col">
                                <strong class="font-14 text-blue">Observación</strong><br>
                                @if ($producto->observacionp == null)
                                    <span class="text-muted font-italic">*** Falta Información ***</span>
                                @else 
                                <span class="text-muted">{{ $producto->observacionp }}</span>
                                @endif
                            </div>
                            <div class="col-sm-2 invoice-col">
                                <strong class="font-14 text-blue">Creado</strong>
                                <br>
                                <span class="text-muted">{{ $producto->created_at }}</span>

                            </div>
                            <div class="col-sm-2 invoice-col">
                                <strong class="font-14 text-blue">Actualizado</strong><br>
                                <span class="text-muted">{{ $producto->updated_at }}</span>
                            </div>
                        </div>
                        <br>
                        <div class="row invoice-info">
                            <div class="col-sm-2 invoice-col">
                                <strong class="font-14 text-blue">Stock</strong><br>
                                <span class="text-muted">{{ $producto->stock }}</span>
                            </div>
                            <div class="col-sm-2 invoice-col">
                                <strong class="font-14 text-blue">Minimo</strong><br>
                                <span class="text-muted">{{ $producto->minimo }}</span>
                            </div>
                            <div class="col-sm-2 invoice-col">
                                <strong class="font-14 text-blue">Maximo</strong><br>
                                <span class="text-muted">{{ $producto->maximo }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="custom-content-below-profile" role="tabpanel" aria-labelledby="custom-content-below-profile-tab">
                        Mauris tincidunt mi at erat gravida, eget tristique urna bibendum. Mauris pharetra purus ut ligula tempor, et vulputate metus facilisis. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Maecenas sollicitudin, nisi a luctus interdum, nisl ligula placerat mi, quis posuere purus ligula eu lectus. Donec nunc tellus, elementum sit amet ultricies at, posuere nec nunc. Nunc euismod pellentesque diam.
                     </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('footer')
    <x-footer></x-footer>
@stop