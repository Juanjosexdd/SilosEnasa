@extends('adminlte::page')

@section('title', 'Inicio Enasa')

@section('content')
    <div class="container">

        <div class="card card-custom bg-white border-white border-0 elevation-5">
            <div class="card-custom-img"
                style="background-image: url(http://res.cloudinary.com/d3/image/upload/c_scale,q_auto:good,w_1110/trianglify-v1-cs85g_cc5d2i.jpg);">
            </div>
            <div class="card-custom-avatar">
                <img
                                        class="img-size-32  img-circle image elevation-2"
                                        src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}"  />
                                    
            </div>
            <div class="card-body" style="overflow-y: auto">
                <h1>Bienvenido a Enasa {{ Auth::user()->name }} {{ Auth::user()->last_name }}</h1>
            </div>
            <div class="card-footer" style="background: inherit; border-color: inherit;">

            </div>
        </div>
        <!-- Copy until here -->

    </div>
@stop


@section('js')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

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
