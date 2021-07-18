@props(['submit'])

<div {{ $attributes->merge(['class' => 'md:grid md:grid-cols-6 md:gap-12']) }}>

    <div class="mt-5 md:mt-0 md:col-span-6">
        <form wire:submit.prevent="{{ $submit }}">
                <div class="grid grid-cols-12 gap-6">
                    {{ $form }}
                </div>

            @if (isset($actions))
                    {{ $actions }}
            @endif
        </form>
    </div>
</div>
