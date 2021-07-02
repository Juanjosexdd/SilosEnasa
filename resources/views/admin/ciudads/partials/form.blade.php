<a href=" {{ route('admin.ciudads.index') }} " class="float-right btn bg-navy btn-sm px-3 py-2 elevation-4"><i
        class="fas fa-reply"></i> Volver</a>
<p class="h3 text-blue">Municipio</p>
<hr>
<div class="row">
    <div class="col-md-6">
        <div>
            {!! Form::label('estados_id', 'Estado :', ['class' => 'text-blue']) !!}
            {!! Form::select('estados_id', $estados, null, ['class' => 'form-control select2']) !!}
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('nombre', 'Nombre del municipio & ', ['class' => 'text-blue ']) !!} {!! Form::label('slug', 'slug :', ['class' => 'text-blue']) !!}
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="far fa-address-card text-blue"></i></span>
                </div>
                {!! Form::text('nombre', null, ['class' => 'form-control', 'placeholder' => 'Nombre']) !!}
                {!! Form::hidden('slug', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el slug', 'readonly']) !!}
            </div>
            @error('nombre')
                <small class="text-danger mt-0">{{ $message }}</small>
            @enderror
        </div>
    </div>
</div>

@section('css')
    <link rel="stylesheet" href="{{ asset('vendor/select2/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/select2/select2-bootstrap4.min.css') }}">
@stop


@section('js')
    <script src="{{ asset('vendor/jQuery-Plugin-stringToSlug-1.3/jquery.stringToSlug.min.js') }}"></script>
    <script src="{{ asset('vendor/select2/select2.full.min.js') }}"></script>


    <script>
        $(function() {
            $('.select2').select2()
        });
        $(document).ready(function() {
            $("#nombre").stringToSlug({
                setEvents: 'keyup keydown blur',
                getPut: '#slug',
                space: '-'
            });
        });

    </script>
@stop
