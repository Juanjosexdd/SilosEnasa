<a href=" {{ route('admin.biennacionals.index') }} " class="float-right btn bg-navy btn-sm px-3 py-2 elevation-4"><i
        class="fas fa-reply"></i> Volver</a>
<p class="h3 text-blue">Información</p>
<hr>
<div class="row">
    
    <div class="col-md-4">
        <div class="form-group">
            {!! Form::label('nombre', 'Nombre ', ['class' => 'text-blue']) !!} {!! Form::label('slug', 'slug :', ['class' => 'text-blue']) !!} <span class="text-danger">*</span>
            <div class="input-group mb-3">
                {!! Form::text('nombre', null, ['class' => 'form-control' . ($errors->has('slug') ? ' is-invalid' : ''), 'placeholder' => 'Nombre']) !!}
                {!! Form::hidden('slug', null, ['class' => 'form-control', 'placeholder' => 'Nombre']) !!}
                {!! $errors->first('slug', ' <div class="invalid-feedback text-center"><strong>:message</strong></div>') !!}

            </div>
        </div>
    </div>
    <div class="col-md-2">
        <div >
            {!! Form::label('clacificacionbienes_id', 'Clacificacion : ', ['class' => 'text-blue']) !!} <span class="text-danger">*</span>
            {!! Form::select('clacificacionbienes_id', $clacificacionbienes, null, ['class' => 'form-control select2 '. ($errors->has('clacificacionbienes_id') ? ' is-invalid' : ''), 'placeholder' => '' ]) !!}
            {!! $errors->first('clacificacionbienes_id', ' <div class="invalid-feedback text-center"><strong>:message</strong></div>') !!}

        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            {!! Form::label('descripcion', 'Descripción : ', ['class' => 'text-blue']) !!} <span class="text-danger">*</span>
            <div class="input-group mb-3">
                {!! Form::text('descripcion', null, ['class' => 'form-control' . ($errors->has('descripcion') ? ' is-invalid' : ''), 'placeholder' => 'Descripción']) !!}
                {!! $errors->first('descripcion', ' <div class="invalid-feedback text-center"><strong>:message</strong></div>') !!}
            </div>
        </div>
    </div>
    <div class="col-md-2">
        <div class="form-group">
            {!! Form::label('costo', 'Costo : ', ['class' => 'text-blue']) !!} <span class="text-danger">*</span>
            <div class="input-group mb-3">
                {!! Form::number('costo', null, ['class' => 'form-control' . ($errors->has('costo') ? ' is-invalid' : ''), 'placeholder' => 'Costo']) !!}
                {!! $errors->first('costo', ' <div class="invalid-feedback text-center"><strong>:message</strong></div>') !!}
            </div>
        </div>
    </div>    
</div>
<div class="row">
    <div class="col-md-3">
        <div class="form-group">
            {!! Form::label('codigo', 'Codigo : ', ['class' => 'text-blue']) !!} <span class="text-danger">*</span>
            <div class="input-group mb-3">
                {!! Form::text('codigo', null, ['class' => 'form-control' . ($errors->has('codigo') ? ' is-invalid' : ''), 'placeholder' => 'Codigo']) !!}
                {!! $errors->first('codigo', ' <div class="invalid-feedback text-center"><strong>:message</strong></div>') !!}
            </div>
        </div>
    </div>
    
    <div class="col-md-3">
        <div class="form-group">
            {!! Form::label('fecha_adquisicion', 'Fecha adquisicion : ', ['class' => 'text-blue']) !!} <span class="text-danger">*</span>
            
            {{ Form::date('fecha_adquisicion', null,['class' => 'form-control']) }}
            
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            {!! Form::label('vidautil', 'Vida util : ', ['class' => 'text-blue']) !!} <span class="text-danger">*(Meses)</span>
            <div class="input-group mb-3">
                {!! Form::number('vidautil', null, ['class' => 'form-control' . ($errors->has('vidautil') ? ' is-invalid' : ''), 'placeholder' => 'Vida Util']) !!}
                {!! $errors->first('vidautil', ' <div class="invalid-feedback text-center"><strong>:message</strong></div>') !!}
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            {!! Form::label('fecha_desincorporacion', 'Fecha desincorporacion : ', ['class' => 'text-blue']) !!} <span class="text-danger">*</span>
            
            {{ Form::date('fecha_desincorporacion', null,['class' => 'form-control']) }}
            
        </div>
    </div>
</div>
@section('js')
    <script src="{{ asset('vendor/jQuery-Plugin-stringToSlug-1.3/jquery.stringToSlug.min.js') }}"></script>
    <script src="{{ asset('vendor/select2/select2.full.min.js') }}"></script>


    <script>
        // $('.select2').select2({
        //     placeholder: 'Selecciona una opcion'
        // });

        $(document).ready(function() {
            $("#nombre").stringToSlug({
                setEvents: 'keyup keydown blur',
                getPut: '#slug',
                space: '-'
            });
        });

    </script>
@stop