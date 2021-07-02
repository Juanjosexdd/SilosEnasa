@extends('adminlte::page')

@section('title', 'ENASA | EDITAR CARGO')


@section('content')
    @include('sweetalert::alert')

    <div class="card elevation-4 col-md-12 col-sm-12" style="border-radius: 0.95rem">
        <div class="card-body">
            <h3 class="text-blue">Editar cargo {{ $cargo->nombre }} </h3>
        </div>
    </div>

    <div class="card elevation-5 col-md-12 col-sm-12 pt-3" style="border-radius: 0.95rem" bis_skin_checked="1">

        <div class="card-body" style="overflow-y: auto">
            @can('admin.cargos.create')
                <a href="{{ route('admin.cargos.create') }}"
                    class="btn bg-navy float-right ml-1 px-3 pt-1 pb-1 elevation-4"><i class="fas fa-plus mt-2 px-3"></i>
                </a>
            @endcan
            {!! Form::model($cargo, ['route' => ['admin.cargos.update', $cargo], 'method' => 'PUT', 'autocomplete' => 'off']) !!}
            @include('admin.cargos.partials.form')
            {!! Form::submit('Guardar cargo', ['class' => 'btn bg-navy btn-block']) !!}
            {!! Form::close() !!}
        </div>
        <div class="card-footer" style="background: inherit; border-color: inherit;">

        </div>
    </div>
@stop

@section('footer')
    <h5 class="text-center"><a href="https://github.com/Juanjosexdd/silosenasa" target="_blank">
            ENASA - UPTP "JJ MONTILLA"</a></h5>
@stop

@section('css')
    <link rel="stylesheet" href="{{ asset('vendor/cards.css') }}">
@stop

@section('js')
    <script src="{{ asset('vendor/sweetalert2.js') }}  "></script>
    <script src=" {{ asset('vendor/sweetalert-eliminar.js') }} "></script>
    <script src=" {{ asset('vendor/sweetalert-estatus.js') }} "></script>
@stop
