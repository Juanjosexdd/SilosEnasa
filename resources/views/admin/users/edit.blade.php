@extends('adminlte::page')

@section('title', 'ENASA | EDITAR USUARIO')

@section('content')
    @include('sweetalert::alert')
    <div class="container">
        <div class="card elevation-4 col-md-12 col-sm-12" style="border-radius: 0.95rem">
            <div class="card-body">
                <h3 class="text-blue">Editar datos de {{ $user->name }} {{ $user->last_name }}</h3>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="card elevation-4 col-md-12 col-sm-12" style="border-radius: 0.95rem">
            <div class="card-body" style="overflow-y: auto">
                <a href=" {{ route('admin.users.index') }} "
                    class="float-right btn bg-navy btn-sm px-3 py-2 elevation-4"><i class="fas fa-reply"></i>
                    Volver</a>
                {!! Form::model($user, ['route' => ['admin.users.update', $user], 'method' => 'PUT', 'autocomplete' => 'off']) !!}
                @include('admin.users.partials.form')
                {!! Form::submit('Guardar usuario', ['class' => 'btn bg-navy btn-block']) !!}

                {!! Form::close() !!}
            </div>
        </div>
    </div>
@stop

@section('footer')
    <h5 class="text-center"><a href="https://github.com/Juanjosexdd/silosenasa" target="_blank">
            ENASA - UPTP "JJ MONTILLA"</a></h5>
@stop

@section('js')
    {{-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script> --}}

    <script>
        Livewire.on('alert', function($message) {
            Swal.fire(
                'Buen Trabajo!',
                $message,
                'success'
            )
        })
    </script>
@stop
