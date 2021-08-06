@extends('adminlte::page')

@section('title', 'Inicio Enasa')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box blue bg-warning darken-3 elevation-4 text-white">
                    <div class="inner">
                        <h3 class="text-white">{{ App\Models\User::count() }}</h3>

                        <p class="text-white">Usuarios registrados.</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-user-tie "></i>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box green bg-info darken-3 elevation-4  text-white">
                    <div class="inner">
                        <h3>{{ Spatie\Permission\Models\Role::count() }}</h3>

                        <p>Roles registrados.</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-lock"></i>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box purple bg-green darken-3 elevation-4 text-white">
                    <div class="inner">
                        <h3>{{ Spatie\Permission\Models\Permission::count() }}</h3>

                        <p>Permisos registrados.</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-lock-open"></i>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-danger darken-3 elevation-4 text-white">
                    <div class="inner">
                        <h3> {{ App\Models\Log\LogSistema::count() }}</h3>

                        <p>Histórico del sistema.</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-file-archive"></i>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="card card-custom bg-white border-white border-0 elevation-5">
            <div class="card-custom-img"
                style="background-image: url(http://res.cloudinary.com/d3/image/upload/c_scale,q_auto:good,w_1110/trianglify-v1-cs85g_cc5d2i.jpg);">
            </div>
            <div class="card-custom-avatar">
                <img class="img-size-32  img-circle image elevation-2" src="{{ Auth::user()->profile_photo_url }}"
                    alt="{{ Auth::user()->name }}" />

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

@section('footer')
    <x-footer></x-footer>
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



@section('css')
    <style>
        .card-custom {
            overflow: hidden;
            min-height: 300px;
            box-shadow: 0 0 15px rgba(10, 10, 10, 0.3);
        }

        .card-custom-img {
            height: 50px;
            min-height: 10px;
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center;
            border-color: inherit;
        }

        /* First border-left-width setting is a fallback */
        .card-custom-img::after {
            position: absolute;
            content: '';
            top: 161px;
            left: 0;
            width: 0;
            height: 0;
            border-style: solid;
            border-top-width: 40px;
            border-right-width: 0;
            border-bottom-width: 0;
            border-left-width: 545px;
            border-left-width: calc(575px - 5vw);
            border-top-color: transparent;
            border-right-color: transparent;
            border-bottom-color: transparent;
            border-left-color: inherit;
        }

        .card-custom-avatar img {
            border-radius: 50%;
            box-shadow: 0 0 15px rgba(10, 10, 10, 0.3);
            position: absolute;
            top: 10px;
            left: 1.25rem;
            width: 50px;
            height: 50px;
        }

    </style>
@stop
