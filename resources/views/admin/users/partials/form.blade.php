<p class="h3 text-blue">Información Personal</p>
<hr>
<div class="row">
    <div class="col-md-4">
        <div class="form-group">
            {!! Form::label('name', 'Nombres & ', ['class' => 'text-blue']) !!} {!! Form::label('slug', 'slug :', ['class' => 'text-blue']) !!} <span class="text-danger">*</span>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="far fa-address-card text-blue"></i></span>
                </div>
                {{ Form::text('name', null, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => 'Nombre']) }}
                {!! $errors->first('name', ' <div class="invalid-feedback text-center"><strong>:message</strong></div>') !!}
                {{ Form::hidden('slug', null, ['class' => 'form-control', 'placeholder' => 'Nombre']) }}

            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            {!! Form::label('last_name', 'Apellidos : ', ['class' => 'text-blue']) !!} <span class="text-danger">*</span>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="far fa-address-card text-blue"></i></span>
                </div>
                {!! Form::text('last_name', null, ['class' => 'form-control' . ($errors->has('last_name') ? ' is-invalid' : ''), 'placeholder' => 'Apellidos']) !!}
                {!! $errors->first('last_name', ' <div class="invalid-feedback text-center"><strong>:message</strong></div>') !!}

            </div>
        </div>
    </div>
    <div class="col-md-1">
        {!! Form::label('tipodocumento_id', 'N : ', ['class' => 'text-blue']) !!} <span class="text-danger">*</span>
        {!! Form::select('tipodocumento_id', $tipodocumentos, null, ['class' => 'form-control select2' . ($errors->has('tipodocumento_id') ? ' is-invalid' : '')]) !!}
        {!! $errors->first('tipodocumento_id', ' <div class="invalid-feedback text-center"><strong>:message</strong></div>') !!}

    </div>
    <div class="col-md-3">
        <div class="form-group">
            {!! Form::label('cedula', 'Cedula : ', ['class' => 'text-blue']) !!} <span class="text-danger">*</span>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="far fa-address-card text-blue"></i></span>
                </div>
                {!! Form::text('cedula', null, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => 'Cedula']) !!}
                {!! $errors->first('cedula', ' <div class="invalid-feedback text-center"><strong>:message</strong></div>') !!}
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-4">
        <div class="form-group">
            {!! Form::label('phone', 'Celular : ', ['class' => 'text-blue']) !!} <span class="text-danger">*</span>
            <div class="input-group" bis_skin_checked="1">
                <div class="input-group-prepend" bis_skin_checked="1">
                    <span class="input-group-text"><i class="fas fa-phone text-blue"></i></span>
                </div>
                {!! Form::number('phone', null, ['class' => 'form-control' . ($errors->has('phone') ? ' is-invalid' : ''), 'placeholder' => 'Celular']) !!}
                {!! $errors->first('phone', ' <div class="invalid-feedback text-center"><strong>:message</strong></div>') !!}
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            {!! Form::label('phone2', 'Telefono : ', ['class' => 'text-blue']) !!}
            <div class="input-group" bis_skin_checked="1">
                <div class="input-group-prepend" bis_skin_checked="1">
                    <span class="input-group-text"><i class="fas fa-home text-blue"></i></span>
                </div>
                {!! Form::number('phone2', null, ['class' => 'form-control', 'placeholder' => 'Telefono']) !!}
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
    <div class="col-md-12">
        <div class="form-group" bis_skin_checked="1">
            {!! Form::label('address', 'Dirección : ', ['class' => 'text-blue']) !!}
            {!! Form::textarea('address', null, ['class' => 'form-control', 'rows' => '2']) !!}
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-4">
        <div class="form-group">
            {!! Form::label('username', 'Nombre de usuario : ', ['class' => 'text-blue']) !!} <span class="text-danger">*</span>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="far fa-address-card text-blue"></i></span>
                </div>
                {{ Form::text('username', null, ['class' => 'form-control' . ($errors->has('username') ? ' is-invalid' : ''), 'placeholder' => 'Usuario']) }}
                {!! $errors->first('username', ' <div class="invalid-feedback text-center"><strong>:message</strong></div>') !!}
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            {!! Form::label('password', 'Contraseña : ', ['class' => 'text-blue']) !!}<span class="text-danger">*</span>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="far fa-address-card text-blue"></i></span>
                </div>
                {!! Form::password('password', ['class' => 'form-control' . ($errors->has('password') ? ' is-invalid' : ''), 'placeholder' => 'Contraseña']) !!}
                {!! $errors->first('password', ' <div class="invalid-feedback text-center"><strong>:message</strong></div>') !!}

            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            {!! Form::label('password_confirmation', 'Contraseña : ', ['class' => 'text-blue']) !!}<span class="text-danger">*</span>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="far fa-address-card text-blue"></i></span>
                </div>
                {!! Form::password('password_confirmation', ['class' => 'form-control' . ($errors->has('password') ? ' is-invalid' : ''), 'placeholder' => 'Contraseña']) !!}
                {!! $errors->first('password', ' <div class="invalid-feedback text-center"><strong>:message</strong></div>') !!}

            </div>
        </div>
    </div>
</div>
<br>
<p class="h3 text-blue">Información Institucional</p>
<hr>
<div class="row">
    <div class="col-md-6">
        <div wire:model('render')>
            {!! Form::label('departamento_id', 'Departamento :', ['class' => 'text-blue']) !!} <span class="text-danger">*</span>
            {!! Form::select('departamento_id', $departamentos, null, ['class' => 'form-control select2' . ($errors->has('cargo_id') ? ' is-invalid' : ''), 'placeholder' => '']) !!}
            {!! $errors->first('departamento_id', ' <div class="invalid-feedback text-center"><strong>:message</strong></div>') !!}
        </div>
    </div>
    <div class="col-md-6">
        <div>
            {!! Form::label('cargo_id', 'Cargo : ', ['class' => 'text-blue']) !!} <span class="text-danger">*</span>
            {!! Form::select('cargo_id', $cargos, null, ['class' => 'form-control select2' . ($errors->has('cargo_id') ? ' is-invalid' : ''), 'placeholder' => '']) !!}
            {!! $errors->first('cargo_id', ' <div class="invalid-feedback text-center"><strong>:message</strong></div>') !!}

        </div>
    </div>

</div>
<br>
<p class="h3 text-blue">Roles</p>
<hr>
<div class="row">
    <div class="col-md-12 d-flex">
        @foreach ($roles as $role)
            <div class="px-2 mb-4">
                <label class="text-blue">
                    {!! Form::checkbox('roles[]', $role->id, null, ['class' => 'mr-1 iradio_flat d-flex']) !!}
                    {{ $role->name }}
                </label>
            </div>
        @endforeach
    </div>
</div>

@section('css')
    {{-- <link rel="stylesheet" href="{{asset('vendor/select2/css/bootstrap-select.min.css')}}"> --}}
    <link rel="stylesheet" href="{{ asset('vendor/select2/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/select2/select2-bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/icheck/skins/flat/flat.css') }}">
@stop


@section('js')
    <script src=" {{ asset('vendor/jquery/jquery.min.js') }}  "></script>
    <script src=" {{ asset('vendor/icheck/icheck.js') }}  "></script>
    <script src=" {{ asset('vendor/adminlte/dist/js/demo.js') }}  "></script>
    <script src="{{ asset('vendor/jQuery-Plugin-stringToSlug-1.3/jquery.stringToSlug.min.js') }}"></script>
    <script src="{{ asset('vendor/select2/select2.full.min.js') }}"></script>
    <script src="{{ asset('vendor/jQuery-Plugin-stringToSlug-1.3/jquery.stringToSlug.min.js') }}"></script>

    <script>
        $(document).ready(function() {
            $('input').iCheck({
                checkboxClass: 'icheckbox_flat',
                radioClass: 'iradio_flat'
            });
        });
    </script>



    <script>
        $('.select2').select2({
            placeholder: 'Selecciona una opcion'
        });

        $(document).ready(function() {
            $("#name").stringToSlug({
                setEvents: 'keyup keydown blur',
                getPut: '#slug',
                space: '-'
            });
        });
    </script>
@stop
