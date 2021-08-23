<a href=" {{ route('admin.almacens.index') }} " class="float-right btn bg-navy btn-sm px-3 py-2 elevation-4"><i
    class="fas fa-reply"></i> Volver</a>
<p class="h3 text-blue">Almacen</p>

    <hr>
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('nombre', 'Nombre & ',['class' => 'text-blue ']) !!} {!! Form::label('slug', 'slug :',['class' => 'text-blue']) !!} <span class="text-danger">*</span>
            <div class="input-group mb-3">
                {!! Form::text('nombre', null, ['class' => 'form-control' . ($errors->has('slug') ? ' is-invalid' : ''), 'placeholder' => 'Nombre']) !!}
                {!! Form::hidden('slug', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el slug' ,'readonly']) !!}
                {!! $errors->first('slug', ' <div class="invalid-feedback text-center"><strong>:message</strong></div>') !!}
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('descripcion', 'Descripción : ',['class' => 'text-blue']) !!} <span class="text-danger">*</span>
            <div class="input-group mb-3">
                {!! Form::text('descripcion', null, ['class' => 'form-control'. ($errors->has('descripcion') ? ' is-invalid' : ''), 'placeholder' => 'Descripción']) !!}
                {!! $errors->first('descripcion', ' <div class="invalid-feedback text-center"><strong>:message</strong></div>') !!}
            </div>
        </div>
    </div>
</div>

@section('js')
<script src="{{asset('vendor/jQuery-Plugin-stringToSlug-1.3/jquery.stringToSlug.min.js')}}"></script>


    <script>
        $(document).ready( function() {
            $("#nombre").stringToSlug({
                setEvents: 'keyup keydown blur',
                getPut: '#slug',
                space: '-'
            });
        });

    </script>
@stop