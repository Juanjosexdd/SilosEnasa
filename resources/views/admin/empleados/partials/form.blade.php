<a href=" {{ route('admin.empleados.index') }} " class="float-right btn bg-navy btn-sm px-3 py-2 elevation-4"><i
        class="fas fa-reply"></i> Volver</a>
<p class="h3 text-blue">Información Personal</p>
<hr>
<div class="row">
    <div class="col-md-4">
        <div class="form-group">
            {!! Form::label('nombres', 'Nombres & ', ['class' => 'text-blue']) !!} {!! Form::label('slug', 'slug :', ['class' => 'text-blue']) !!} <span class="text-danger">*</span>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="far fa-address-card text-blue"></i></span>
                </div>
                {{ Form::text('nombres', null, ['class' => 'form-control' . ($errors->has('nombres') ? ' is-invalid' : ''), 'placeholder' => 'Nombre']) }}
                {!! $errors->first('nombres', ' <div class="invalid-feedback text-center"><strong>:message</strong></div>') !!}
                {!! Form::hidden('slug', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el slug', 'readonly']) !!}
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            {!! Form::label('apellidos', 'Apellidos : ', ['class' => 'text-blue']) !!} <span class="text-danger">*</span>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="far fa-address-card text-blue"></i></span>
                </div>
                {!! Form::text('apellidos', null, ['class' => 'form-control' . ($errors->has('apellidos') ? ' is-invalid' : ''), 'placeholder' => 'Apellidos']) !!}
                {!! $errors->first('apellidos', ' <div class="invalid-feedback text-center"><strong>:message</strong></div>') !!}

            </div>
        </div>
    </div>
    <div class="col-md-1">
        {!! Form::label('tipodocumento_id', 'N : ', ['class' => 'text-blue']) !!} <span class="text-danger">*</span>
        {!! Form::select('tipodocumento_id', $tipodocumentos, null, ['class' => 'form-control select2', 'placeholder' => '']) !!}
        @error('tipodocumento_id')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>
    <div class="col-md-3">
        <div class="form-group">
            {!! Form::label('cedula', 'Cedula : ', ['class' => 'text-blue']) !!} <span class="text-danger">*</span>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="far fa-address-card text-blue"></i></span>
                </div>
                {!! Form::text('cedula', null, ['class' => 'form-control' . ($errors->has('cedula') ? ' is-invalid' : ''), 'placeholder' => 'Cedula']) !!}
                {!! $errors->first('cedula', ' <div class="invalid-feedback text-center"><strong>:message</strong></div>') !!}

            </div>

        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-4">
        <div class="form-group">
            {!! Form::label('celular', 'Celular : ', ['class' => 'text-blue']) !!} <span class="text-danger">*</span>
            <div class="input-group" bis_skin_checked="1">
                <div class="input-group-prepend" bis_skin_checked="1">
                    <span class="input-group-text"><i class="fas fa-phone text-blue"></i></span>
                </div>
                {!! Form::text('celular', null, ['class' => 'form-control' . ($errors->has('celular') ? ' is-invalid' : ''), 'placeholder' => 'Celular']) !!}
                {!! $errors->first('celular', ' <div class="invalid-feedback text-center"><strong>:message</strong></div>') !!}
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            {!! Form::label('telefono', 'Telefono : ', ['class' => 'text-blue']) !!}
            <div class="input-group" bis_skin_checked="1">
                <div class="input-group-prepend" bis_skin_checked="1">
                    <span class="input-group-text"><i class="fas fa-home text-blue"></i></span>
                </div>
                {!! Form::number('telefono', null, ['class' => 'form-control', 'placeholder' => 'Telefono']) !!}
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            {!! Form::label('email', 'Correo eléctronico : ', ['class' => 'text-blue']) !!} <span class="text-danger">*</span>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-envelope text-blue"></i></span>
                </div>
                {!! Form::email('email', null, ['class' => 'form-control' . ($errors->has('email') ? ' is-invalid' : ''), 'placeholder' => 'Correo electronico']) !!}
                {!! $errors->first('email', ' <div class="invalid-feedback text-center"><strong>:message</strong></div>') !!}
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="form-group" bis_skin_checked="1">
            {!! Form::label('direccion', 'Dirección : ', ['class' => 'text-blue']) !!}
            {!! Form::textarea('direccion', null, ['class' => 'form-control' . ($errors->has('direccion') ? ' is-invalid' : ''), 'rows' => '2']) !!}
            {!! $errors->first('direccion', ' <div class="invalid-feedback text-center"><strong>:message</strong></div>') !!}
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group" bis_skin_checked="1">
            {!! Form::label('observacion', 'Observación : ', ['class' => 'text-blue']) !!}
            {!! Form::textarea('observacion', null, ['class' => 'form-control', 'rows' => '2']) !!}
        </div>
        @error('observacion')
            <small class="text-danger mt-0">{{ $message }}</small>
        @enderror
    </div>
</div>

<br>
<p class="h3 text-blue">Información Institucional</p>
<hr>
<div class="row">
    <div class="col-md-6">
        <div>
            {!! Form::label('departamento_id', 'Departamento : ', ['class' => 'text-blue']) !!} <span class="text-danger">*</span>
            {!! Form::select('departamento_id', $departamentos, null, ['class' => 'form-control select2'. ($errors->has('departamento_id') ? ' is-invalid' : ''),'placeholder' => '']) !!}
            {!! $errors->first('departamento_id', ' <div class="invalid-feedback text-center"><strong>:message</strong></div>') !!}

        </div>
    </div>
    <div class="col-md-6">
        <div>
            {!! Form::label('cargo_id', 'Cargo : ', ['class' => 'text-blue']) !!} <span class="text-danger">*</span>
            {!! Form::select('cargo_id', $cargos, null, ['class' => 'form-control select2' . ($errors->has('departamento_id') ? ' is-invalid' : '') ,'placeholder' => '']) !!}
            {!! $errors->first('cargo_id', ' <div class="invalid-feedback text-center"><strong>:message</strong></div>') !!}
            
        </div>
    </div>
</div>
<br>
@section('css')
    {{-- <link rel="stylesheet" href="{{asset('vendor/select2/css/bootstrap-select.min.css')}}"> --}}
    <link rel="stylesheet" href="{{ asset('vendor/select2/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/select2/select2-bootstrap4.min.css') }}">
@stop

@section('js')
    <script src="{{ asset('vendor/jQuery-Plugin-stringToSlug-1.3/jquery.stringToSlug.min.js') }}"></script>
    {{-- <script src="{{asset('vendor/select2/js/bootstrap-select.min.js')}}"></script> --}}
    <script src="{{ asset('vendor/select2/select2.full.min.js') }}"></script>


    <script>
       $('.select2').select2({
            placeholder: 'Selecciona una opcion'
        });
        $(document).ready(function() {
            $("#nombres").stringToSlug({
                setEvents: 'keyup keydown blur',
                getPut: '#slug',
                space: '-'
            });
        });

    </script>
@stop
