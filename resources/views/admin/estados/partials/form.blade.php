<a href=" {{route('admin.estados.index')}} " class="float-right btn bg-navy btn-sm px-3 py-2 elevation-4"><i class="fas fa-reply"></i>    Volver</a>
<p class="h3 text-blue">Estado</p>
<hr>
<div class="row">
    <div class="col-md-12">
        <div class="form-group">
        {!! Form::label('nombre', 'Nombre &',['class' => 'text-blue']) !!} {!! Form::label('slug', 'slug :',['class' => 'text-blue']) !!} <span class="text-danger">*</span>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-sitemap text-blue"></i></span>
                </div>
                {!! Form::text('nombre', null, ['class' => 'form-control'  . ($errors->has('nombre') ? ' is-invalid' : ''), 'placeholder' => 'Nombre']) !!}
                {!! $errors->first('nombre', ' <div class="invalid-feedback text-center"><strong>:message</strong></div>') !!}
                {!! Form::hidden('slug', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el slug' ,'readonly']) !!}
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