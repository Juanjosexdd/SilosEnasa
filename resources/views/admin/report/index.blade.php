@extends('adminlte::page')

@section('title', 'ENASA | REPORTES')

@section('content')
    @include('sweetalert::alert')

    <x-card-header>
        <h3 class="text-white">Reportes del sistema</h3>
    </x-card-header>
    <x-card-body>
        <ul class="nav nav-tabs" id="custom-content-above-tab" role="tablist">
            <li class="nav-item active">
                <a class="nav-link active" id="custom-content-above-home-tab" data-toggle="pill"
                    href="#custom-content-above-home" role="tab" aria-controls="custom-content-above-home"
                    aria-selected="true">Solicitudes</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="custom-content-above-profile-tab" data-toggle="pill"
                    href="#custom-content-above-profile" role="tab" aria-controls="custom-content-above-profile"
                    aria-selected="false">Ingresos</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="custom-content-above-messages-tab" data-toggle="pill"
                    href="#custom-content-above-messages" role="tab" aria-controls="custom-content-above-messages"
                    aria-selected="false">Egresos</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="custom-content-above-settings-tab" data-toggle="pill"
                    href="#custom-content-above-settings" role="tab" aria-controls="custom-content-above-settings"
                    aria-selected="false">Requisiciones</a>
            </li>
        </ul>

        <div class="tab-content" id="custom-content-above-tabContent">
            <div class="tab-pane fade show active" id="custom-content-above-home" role="tabpanel" aria-labelledby="custom-content-above-home-tab">
                <form class="" action="{{ route('admin.solicitudes.pdf') }}">
                    <label class="h4 offset-4">Selercciona el rango de fecha:</label>
                    <div class="row">
                        <br>
                        <div class="col-md-4 offset-2">
                            <div class="form-group">
                                <label>Desde: </label>
                                <input class="form-control mr-sm-2" name="desde" id="desde" type="date" placeholder="Search"
                                    aria-label="Search">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Hasta: </label>
                                <input class="form-control mr-sm-2" name="hasta" id="hasta" type="date" placeholder="Search"
                                    aria-label="Search">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-4 offset-2">
                            <label for="">Estatus :</label>
                            <select class="form-control select2" name="estatus" id="estatus">
                                <option value ="" selected="selected">Selecciona una opción!</option>
                                <option value="0">Anuladas</option>
                                <option value="1">Pendiente</option>
                                <option value="2">Aprobado</option>
                                <option value="3">Solicitado a compras </option>
                            </select>
                        </div>
                        <div class="col-md-4">
                        <label for="">Usuario :</label>
                                {!! Form::select('user_id', $users, null, ['class' => 'form-control selectpicker select2'. ($errors->has('user_id') ? ' is-invalid' : ''), 'placeholder' => '']) !!}
                                {!! $errors->first('user_id', ' <div class="invalid-feedback text-center"><strong>:message</strong></div>') !!}
                        </div>

                    </div>

                    <button target="_blank"
                        class="btn elevation-2 my-2 my-sm-0 bg-navy btn-md rounded btn-block col-md-8 offset-2"
                        title="Generar reporte" type="submit">BUSCAR </button>
                </form>
            </div>
            <div class="tab-pane fade" id="custom-content-above-profile" role="tabpanel"
                aria-labelledby="custom-content-above-profile-tab">
                <form class="" action="{{ route('admin.ingresos.pdf') }}">
                    <label class="h4 offset-4">Selercciona el rango de fecha:</label>
                    <div class="row">
                        <br>
                        <div class="col-md-4 offset-2">
                            <div class="form-group">
                                <label>Desde: </label>
                                <input class="form-control mr-sm-2" name="desde" id="desde" type="date" placeholder="Search"
                                    aria-label="Search">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Hasta: </label>
                                <input class="form-control mr-sm-2" name="hasta" id="hasta" type="date" placeholder="Search"
                                    aria-label="Search">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-4 offset-2">
                            <label for="">Estatus :</label>
                            <select class="form-control select2" name="estatus" id="estatus">
                                <option value ="" selected="selected">Selecciona una opción!</option>
                                <option value="0">Anuladas</option>
                                <option value="1">Procesado</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                        <label for="">Responsable :</label>
                                {!! Form::select('user_id', $users, null, ['class' => 'form-control selectpicker select2'. ($errors->has('user_id') ? ' is-invalid' : ''), 'placeholder' => '']) !!}
                                {!! $errors->first('user_id', ' <div class="invalid-feedback text-center"><strong>:message</strong></div>') !!}
                        </div>

                    </div>

                    <button target="_blank"
                        class="btn elevation-2 my-2 my-sm-0 bg-navy btn-md rounded btn-block col-md-8 offset-2"
                        title="Generar reporte" type="submit">BUSCAR </button>
                </form>
            </div>
            <div class="tab-pane fade" id="custom-content-above-messages" role="tabpanel"
                aria-labelledby="custom-content-above-messages-tab">
                Morbi turpis dolor, vulputate vitae felis non, tincidunt congue mauris. Phasellus volutpat augue id mi
                placerat mollis. Vivamus faucibus eu massa eget condimentum. Fusce nec hendrerit sem, ac tristique nulla.
                Integer vestibulum orci odio. Cras nec augue ipsum. Suspendisse ut velit condimentum, mattis urna a,
                malesuada nunc. Curabitur eleifend facilisis velit finibus tristique. Nam vulputate, eros non luctus
                efficitur, ipsum odio volutpat massa, sit amet sollicitudin est libero sed ipsum. Nulla lacinia, ex vitae
                gravida fermentum, lectus ipsum gravida arcu, id fermentum metus arcu vel metus. Curabitur eget sem eu risus
                tincidunt eleifend ac ornare magna.
            </div>
            <div class="tab-pane fade" id="custom-content-above-settings" role="tabpanel"
                aria-labelledby="custom-content-above-settings-tab">
                Pellentesque vestibulum commodo nibh nec blandit. Maecenas neque magna, iaculis tempus turpis ac, ornare
                sodales tellus. Mauris eget blandit dolor. Quisque tincidunt venenatis vulputate. Morbi euismod molestie
                tristique. Vestibulum consectetur dolor a vestibulum pharetra. Donec interdum placerat urna nec pharetra.
                Etiam eget dapibus orci, eget aliquet urna. Nunc at consequat diam. Nunc et felis ut nisl commodo dignissim.
                In hac habitasse platea dictumst. Praesent imperdiet accumsan ex sit amet facilisis.
            </div>
        </div>


    </x-card-body>

@stop

@section('footer')
    <x-footer></x-footer>
@stop



@section('js')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src=" {{ asset('vendor/select2/select2.full.min.js') }}"></script>

    <script>
        Livewire.on('alert', function($message) {
            Swal.fire(
                'Buen Trabajo!',
                $message,
                'success'
            )
        })

        $('.select2').select2({
            placeholder: 'Selecciona una opción'
        });
    </script>
@stop




@section('css')
<link rel="stylesheet" href="{{ asset('vendor/select2/select2.min.css') }}">
<link rel="stylesheet" href="{{ asset('vendor/select2/select2-bootstrap4.min.css') }}">
    <style>
        .card-custom {
            overflow: hidden;
            min-height: 300px;
            box-shadow: 0 0 15px rgba(10, 10, 10, 0.3);
        }

        .card-custom-img {
            height: 50px;
            min-height: 10px;
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center;
            border-color: inherit;
        }

        /* First border-left-width setting is a fallback */
        .card-custom-img::after {
            position: absolute;
            content: '';
            top: 161px;
            left: 0;
            width: 0;
            height: 0;
            border-style: solid;
            border-top-width: 40px;
            border-right-width: 0;
            border-bottom-width: 0;
            border-left-width: 545px;
            border-left-width: calc(575px - 5vw);
            border-top-color: transparent;
            border-right-color: transparent;
            border-bottom-color: transparent;
            border-left-color: inherit;
        }

        .card-custom-avatar img {
            border-radius: 50%;
            box-shadow: 0 0 15px rgba(10, 10, 10, 0.3);
            position: absolute;
            top: 10px;
            left: 1.25rem;
            width: 50px;
            height: 50px;
        }

    </style>
@stop
