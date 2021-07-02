@extends('adminlte::page')

@section('title', 'ENASA | CREAR NUEVO ROL')

@section('content')
    @include('sweetalert::alert')
    <div class="container">
        <div class="card elevation-4 col-md-12 col-sm-12" style="border-radius: 0.95rem">
            <div class="card-body">
                <h3 class="text-blue">Registrar nuevo rol</h3>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="card elevation-4 col-md-12 col-sm-12" style="border-radius: 0.95rem">
            <div class="card-body" style="overflow-y: auto">                        
                        {!! Form::open(['route' => 'admin.roles.store']) !!}

                        @include('admin.roles.partials.form')
                        {!! Form::submit('CREAR ROL', ['class' => 'btn btn-block bg-navy btn-sm px-3 py-2 elevation-4']) !!}
                    {!! Form::close() !!}
            </div>
        </div>
    </div>
@stop

@section('footer')
    <h5 class="text-center"><a href="https://github.com/Juanjosexdd/silosenasa" target="_blank">
            ENASA - UPTP "JJ MONTILLA"</a></h5>
@stop

