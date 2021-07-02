@extends('adminlte::page')

@section('title', 'ENASA | EDITAR DOCUMENTO')


@section('content')
    @include('sweetalert::alert')
    <div class="container">
        <div class="card elevation-4 col-md-12 col-sm-12" style="border-radius: 0.95rem">
            <div class="card-body">
                <h3 class="text-blue">Editar tipo documento {{ $tipodocumento->nombre }} </h3>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="card elevation-5 col-md-12 col-sm-12 pt-3" style="border-radius: 0.95rem" bis_skin_checked="1">
            <div class="card-body" style="overflow-y: auto">
                @can('admin.tipodocumentos.create')
                    <a href="{{ route('admin.tipodocumentos.create') }}"
                        class="btn bg-navy float-right mt-1 ml-1 px-3 pt-1 pb-1 elevation-4"><i
                            class="fas fa-plus mt-2 px-3"></i>
                    </a>
                @endcan
                {!! Form::model($tipodocumento, ['route' => ['admin.tipodocumentos.update', $tipodocumento], 'method' => 'PUT', 'autocomplete' => 'off']) !!}
                @include('admin.tipodocumentos.partials.form')
                {!! Form::submit('Guardar tipo documento', ['class' => 'btn bg-navy btn-block']) !!}

                {!! Form::close() !!}
            </div>
        </div>
    </div>
@stop

@section('footer')
    <h5 class="text-center"><a href="https://github.com/Juanjosexdd/silosenasa" target="_blank">
            ENASA - UPTP "JJ MONTILLA"</a></h5>
@stop

