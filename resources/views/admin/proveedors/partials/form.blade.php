<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('nombre', 'Nombre & ', ['class' => 'text-blue']) !!} {!! Form::label('slug', 'slug :', ['class' => 'text-blue']) !!} <span class="text-danger">*</span>
            <div class="input-group mb-3">
                {!! Form::text('nombre', null, ['class' => 'form-control' . ($errors->has('nombre') ? ' is-invalid' : ''), 'placeholder' => 'Nombre']) !!}
                {!! Form::hidden('slug', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el slug', 'readonly']) !!}
                {!! $errors->first('nombre', ' <div class="invalid-feedback text-center"><strong>:message</strong></div>') !!}
            </div>
        </div>
    </div>
    <div class="col-md-2">
        {!! Form::label('tipodocumento_id', 'Documento : ', ['class' => 'text-blue']) !!} <span class="text-danger">*</span>
        {!! Form::select('tipodocumento_id', $tipodocumentos, null, ['class' => 'form-control select2' . ($errors->has('tipodocumento_id') ? ' is-invalid' : ''), 'placeholder' => '']) !!}
        {!! $errors->first('tipodocumento_id', ' <div class="invalid-feedback text-center"><strong>:message</strong></div>') !!}

    </div>
    <div class="col-md-4">
        <div class="form-group">
            {!! Form::label('cedularif', 'Cedula / Rif : ', ['class' => 'text-blue']) !!} <span class="text-danger">*</span>
            <div class="input-group mb-3">
                {!! Form::number('cedularif', null, ['class' => 'cedula form-control' . ($errors->has('cedularif') ? ' is-invalid' : ''), 'placeholder' => 'Cedula / Rif']) !!}
                {!! $errors->first('cedularif', ' <div class="invalid-feedback text-center"><strong>:message</strong></div>') !!}
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('correo', 'Correo eléctronico : ', ['class' => 'text-blue']) !!} <span class="text-danger">*</span>
            <div class="input-group mb-3">
                {!! Form::email('correo', null, ['class' => 'form-control' . ($errors->has('correo') ? ' is-invalid' : ''), 'placeholder' => 'Correo electronico']) !!}
                {!! $errors->first('correo', ' <div class="invalid-feedback text-center"><strong>:message</strong></div>') !!}

            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('telefono', 'Telefono : ', ['class' => 'text-blue']) !!}
            <div class="input-group" bis_skin_checked="1">
                {!! Form::number('telefono', null, ['class' => 'form-control' . ($errors->has('telefono') ? ' is-invalid' : ''), 'placeholder' => 'Telefono']) !!}
                {!! $errors->first('telefono', ' <div class="invalid-feedback text-center"><strong>:message</strong></div>') !!}

            </div>
        </div>
    </div>
    <div class="col-md-4">

    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="form-group" bis_skin_checked="1">
            {!! Form::label('direccion', 'Dirección : ', ['class' => 'text-blue']) !!} <span class="text-danger">*</span>
            {!! Form::textarea('direccion', null, ['class' => 'form-control' . ($errors->has('direccion') ? ' is-invalid' : ''), 'rows' => '2']) !!}
            {!! $errors->first('direccion', ' <div class="invalid-feedback text-center"><strong>:message</strong></div>') !!}

        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('observacion', 'Observación : ', ['class' => 'text-blue']) !!}
            {!! Form::textarea('observacion', null, ['class' => 'form-control', 'rows' => '2']) !!}
        </div>
    </div>
</div>

<br>

@section('css')
    <link rel="stylesheet" href="{{ asset('vendor/select2/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/select2/select2-bootstrap4.min.css') }}">
@stop

@section('js')
    <script src="{{ asset('vendor/jQuery-Plugin-stringToSlug-1.3/jquery.stringToSlug.min.js') }}"></script>
    <script src="{{ asset('vendor/select2/select2.full.min.js') }}"></script>



    <script>
        $('.select2').select2({
            placeholder: 'Selecciona'
        });

        $(document).ready(function() {
            $("#nombre").stringToSlug({
                setEvents: 'keyup keydown blur',
                getPut: '#slug',
                space: '-'
            });
        });

        // Limita un mnumero especifico en el input de cedula rif
        var input = document.getElementById('cedularif');
        input.addEventListener('input', function() {
            if (this.value.length > 9)
                this.value = this.value.slice(0, 9);
        })

        var input = document.getElementById('telefono');
        input.addEventListener('input', function() {
            if (this.value.length > 12)
                this.value = this.value.slice(0, 13);
        })
    </script>
@stop
