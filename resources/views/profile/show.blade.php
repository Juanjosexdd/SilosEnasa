@extends('adminlte::page')

@section('title', 'ENASA | PERFIl DE USUARIO')

@section('css')
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">

@endsection
@section('js')
    <script src="{{ mix('js/app.js') }}" defer></script>

@endsection

@section('content')
    <x-card-header>
        <h3 class="text-white h3">Perfil de {{ auth()->user()->display_user }}</h3>
    </x-card-header>
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
