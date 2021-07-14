@extends('adminlte::page')

@section('title', 'ENASA | LISTA DE ESTADOS')

@section('css')
@stop

@section('content')
    @include('sweetalert::alert')

    <div class="container">
        <div class="card elevation-4 col-md-12 col-sm-12" style="border-radius: 0.95rem">
            <div class="card-body">
                <h3 class="text-blue">Informacion de la institución</h3>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="card elevation-4 col-md-12 col-sm-12" style="border-radius: 0.95rem">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-2">
                        <img src="{{$empresa->file}}" class="img-avatar" class="img-avatar" style="width: 80px; height: 80px">
                    </div>
                    <div class="col-md-8">
                        <h5 class="text-blue card-title" style="font-size: 20px;">{{$empresa->nombre}}</h5>
                        <br>
                        <h5 class="text-blue card-title">{{$empresa->direccion}}</h5>

                    </div>
                    <div class="col-md-2">

                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('footer')
<h5 class="text-center"><a href="https://github.com/Juanjosexdd/proyecto2021"  target="_blank">
    ENASA - UPTP "JJ MONTILLA"</a></h5>
@stop

@section('js')

    <script>
        $(function() {
            $('[data-toggle="tooltip"]').tooltip()
        })

    </script>

@stop
