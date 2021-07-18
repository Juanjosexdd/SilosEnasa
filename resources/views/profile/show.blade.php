@extends('adminlte::page')

@section('title', 'ENASA | PERFIl DE USUARIO')

@section('css')
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">

@endsection
@section('js')
    <script src="{{ mix('js/app.js') }}" defer></script>

@endsection

@section('content')

    <div class="container">
        <div class="card elevation-4 col-md-12 col-sm-12" style="border-radius: 0.95rem">
            <div class="card-body">
                <h3 class="text-blue h3">Perfil de {{ auth()->user()->display_user }}</h3>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="card elevation-4 col-md-12 col-sm-12" style="border-radius: 0.95rem">
            <div class="card-body">
                <div class="row justify-content">
                    <div class="col-md-8">
                        <p class="h3 text-blue">Información Personal</p>
                        <hr>
                        @if (Laravel\Fortify\Features::canUpdateProfileInformation())
                            @livewire('profile.update-profile-information-form')

                        @endif
                        <br>
                        <p class="h3 text-blue">Actualizar Contraseña</p>
                        <hr>

                        @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::updatePasswords()))
                            <div class="mt-10 sm:mt-0">
                                @livewire('profile.update-password-form')
                            </div>

                            <x-jet-section-border />
                        @endif
                    </div>
                    <div class="col-md-4">
                        <p class="h3 text-blue">Notificaciones</p>
                        <hr>
                        @if (auth()->user())
                            @forelse ($ingresoNotifications as $notification)
                                <div class="alert alert-default-warning mt-3">
                                    El usuario {{ $notification->data['user_id'] }}
                                    registró el documento nro.: {{ $notification->data['ingreso'] }} -
                                    {{ $notification->created_at->diffForHumans() }}
                                    <button type="submit" class="mark-as-read btn btn-sm btn-dark"
                                        data-id="{{ $notification->id }}">Marcar como leida</button>
                                </div>
                                @if ($loop->last)
                                    <a href="" id="mark-all">Marcar todas como leidas</a>
                                @endif
                            @empty
                                <span class="text-center m-2 p-2">No hay notificaciones</span> 
                            @endforelse
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    @livewireScripts

@stop

@section('js')
<script>
    function sendMarkRequest(id = null) {
        return $.ajax("{{ route('markNotification') }}", {
            method: 'POST',
            data: {
                _token: "{{ csrf_token() }}",
                id
            }
        });
    }
    $(function() {
        $('.mark-as-read').click(function() {
            let request = sendMarkRequest($(this).data('id'));
            request.done(() => {
                $(this).parents('div.alert').remove();
            });
        });
        $('#mark-all').click(function() {
            let request = sendMarkRequest();

            request.done(() => {
                $('div.alert').remove();
            })
        });
    });

</script>
@stop