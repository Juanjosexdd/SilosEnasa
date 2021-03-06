<div class="row">
    <div class="col-md-4">
        <div class="form-group">
            {!! Form::label('nombre', 'Nombre & ',['class' => 'text-blue ']) !!}       {!! Form::label('slug', 'slug :',['class' => 'text-blue']) !!} <span class="text-danger">*</span>
            <div class="input-group mb-3">
                {{ Form::text('nombre', null, ['class' => 'form-control' . ($errors->has('nombre') ? ' is-invalid' : ''), 'placeholder' => 'Nombre']) }}
                {!! $errors->first('nombre', ' <div class="invalid-feedback text-center"><strong>:message</strong></div>') !!}
                {!! Form::hidden('slug', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el slug' ,'readonly']) !!}
            </div>
        </div>
    </div>
    <div class="col-md-3">
                {!! Form::label('almacen_id', 'Almacen : ', ['class' => 'text-blue']) !!}
                <div class="input-group">
                {!! Form::select('almacen_id', $almacens, null, ['class' => 'form-control select2', 'placeholder' => '']) !!}
                </div>
            </div>
    <div class="col-md-3">
        <div class="form-group">
            {!! Form::label('clacificacion_id', 'Clacificacion : ', ['class' => 'text-blue']) !!} <span class="text-danger">*</span>
            {!! Form::select('clacificacion_id', $clacificaciones, null, ['class' => 'form-control select2 '. ($errors->has('clacificacion_id') ? ' is-invalid' : ''), 'placeholder' => '' ]) !!}
            {!! $errors->first('clacificacion_id', ' <div class="invalid-feedback text-center"><strong>:message</strong></div>') !!}

        </div>
    </div>
    <div class="col-md-2">
        <div class="form-group">
            {!! Form::label('unidad_medida', 'Unidad de medida : ',['class' => 'text-blue']) !!}
            <div class="input-group mb-3">
                {!! Form::text('unidad_medida', null, ['class' => 'form-control', 'placeholder' => 'Unidad de medida']) !!}
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-3">
        <div class="form-group">
            {!! Form::label('marca', 'Marca : ',['class' => 'text-blue']) !!} <span class="text-danger">*</span>
            <div class="input-group mb-3">
                {!! Form::text('marca', null, ['class' => 'form-control' . ($errors->has('marca') ? ' is-invalid' : ''), 'placeholder' => 'Marca']) !!}
                {!! $errors->first('marca', ' <div class="invalid-feedback text-center"><strong>:message</strong></div>') !!}
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            {!! Form::label('ubicacion', 'Ubicaci??n: ',['class' => 'text-blue']) !!}
            <div class="input-group mb-3">
                {!! Form::text('ubicacion', null, ['class' => 'form-control', 'placeholder' => 'Ubicaci??n']) !!}
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            {!! Form::label('minimo', 'Minimo : ',['class' => 'text-blue']) !!}
            <div class="input-group" bis_skin_checked="1">
                {!! Form::number('minimo', null, ['class' => 'form-control', 'placeholder' => 'Minimo']) !!}
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            {!! Form::label('maximo', 'Maximo : ',['class' => 'text-blue']) !!}
            <div class="input-group" bis_skin_checked="1">
                {!! Form::number('maximo', null, ['class' => 'form-control', 'placeholder' => 'Maximo']) !!}
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('descripcion', 'Descripci??n : ',['class' => 'text-blue']) !!} <span class="text-danger">*</span>
            <div class="input-group mb-3">
                {!! Form::text('descripcion', null, ['class' => 'form-control' . ($errors->has('descripcion') ? ' is-invalid' : ''), 'placeholder' => 'Descripci??n']) !!}
                {!! $errors->first('descripcion', ' <div class="invalid-feedback text-center"><strong>:message</strong></div>') !!}

            </div>
        </div>
            
    </div>
    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('observacionp', 'Observaci??n : ',['class' => 'text-blue']) !!} <span class="text-danger">*</span>
            <div class="input-group mb-3">
                {!! Form::text('observacionp', null, ['class' => 'form-control' . ($errors->has('observacionp') ? ' is-invalid' : ''), 'placeholder' => 'Descripci??n']) !!}
                {!! $errors->first('observacionp', ' <div class="invalid-feedback text-center"><strong>:message</strong></div>') !!}

            </div>
        </div>
            
    </div>
</div>

@section('css')
    {{-- <link rel="stylesheet" href="{{asset('vendor/select2/css/bootstrap-select.min.css')}}"> --}}
    <link rel="stylesheet" href="{{ asset('vendor/select2/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/select2/select2-bootstrap4.min.css') }}">
@stop

@section('js')
<script src="{{asset('vendor/jQuery-Plugin-stringToSlug-1.3/jquery.stringToSlug.min.js')}}"></script>
<script src="{{ asset('vendor/select2/select2.full.min.js') }}"></script>


    <script>
        $('.select2').select2({
            placeholder: 'Selecciona una opcion'
        });

        $(document).ready( function() {
            $("#nombre").stringToSlug({
                setEvents: 'keyup keydown blur',
                getPut: '#slug',
                space: '-'
            });
        });

    </script>
@stop