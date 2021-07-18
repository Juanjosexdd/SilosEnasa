<x-jet-form-section submit="updateProfileInformation">
    
    <x-slot name="form">
        <!-- Name -->
        <div class="col-span-4 sm:col-span-4">
            <div class="form-group">
                <x-jet-label for="name" class="text-blue" value="{{ __('Nombres : *') }}"/>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="far fa-address-card text-blue"></i></span>
                    </div>
                    <x-jet-input id="name" type="text" class="  form-control" wire:model.defer="state.name" autocomplete="name" />
                    <x-jet-input-error for="last_name" class="mt-2" />
                </div>
            </div>    
        </div>
        <!-- Last_Name -->
        <div class="col-span-4 sm:col-span-4">
            <div class="form-group">
                <x-jet-label for="last_name" class="text-blue" value="{{ __('Apellidos : *') }}"/>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="far fa-address-card text-blue"></i></span>
                    </div>
                    <x-jet-input id="last_name" type="text" class="  form-control" wire:model.defer="state.last_name" autocomplete="last_name" />
                    <x-jet-input-error for="last_name" class="mt-2" />
                </div>
            </div>
        </div>
        <div class="col-span-4 sm:col-span-4">
            <div class="form-group">
                <x-jet-label for="cedula" class="text-blue" value="{{ __('Cedula : *') }}"/>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="far fa-address-card text-blue"></i></span>
                    </div>
                    <x-jet-input id="cedula" type="text" class="  form-control" wire:model.defer="state.cedula" autocomplete="cedula" />
                    <x-jet-input-error for="cedula" class="mt-2" />
                </div>
            </div>
        </div>
        <!-- Email -->
        <div class="col-span-4 sm:col-span-4">
            <div class="form-group">
                <x-jet-label for="email" class="text-blue" value="{{ __('Correo Electronico : *') }}"/>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="far fa-address-card text-blue"></i></span>
                    </div>
                    <x-jet-input id="email" type="text" class="  form-control" wire:model.defer="state.email" autocomplete="email" />
                    <x-jet-input-error for="email" class="mt-2" />
                </div>
            </div>
        </div>
        <div class="col-span-4 sm:col-span-4">
            <div class="form-group">
                <x-jet-label for="username" class="text-blue" value="{{ __('Nombre de usuario : *') }}"/>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="far fa-address-card text-blue"></i></span>
                    </div>
                    <x-jet-input id="username" type="text" class="  form-control" disabled wire:model.defer="state.username" autocomplete="username" />
                    <x-jet-input-error for="username" class="mt-2" />
                </div>
            </div>
        </div>
        <div class="col-span-4 sm:col-span-4">
            <div class="form-group">
                <x-jet-label for="phone" class="text-blue" value="{{ __('Celular : *') }}"/>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="far fa-address-card text-blue"></i></span>
                    </div>
                    <x-jet-input id="phone" type="text" class="  form-control" wire:model.defer="state.phone" autocomplete="phone" />
                    <x-jet-input-error for="phone" class="mt-2" />
                </div>
            </div>
        </div>
        <div class="col-span-4 sm:col-span-4">
            <div class="form-group">
                <x-jet-label for="phone2" class="text-blue" value="{{ __('Telefono : *') }}"/>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="far fa-address-card text-blue"></i></span>
                    </div>
                    <x-jet-input id="phone2" type="text" class="  form-control" wire:model.defer="state.phone2" autocomplete="phone2" />
                    <x-jet-input-error for="phone2" class="mt-2" />
                </div>
            </div>
        </div>
        <br>
    </x-slot>

    <x-slot name="actions">
        <x-jet-action-message class="mr-3" on="saved">
            {{ __('Guardando.') }}
        </x-jet-action-message>

        <x-jet-button wire:loading.attr="disabled" wire:target="photo" class="float-right">
            {{ __('Guardar') }}
        </x-jet-button>
    </x-slot>

</x-jet-form-section>
