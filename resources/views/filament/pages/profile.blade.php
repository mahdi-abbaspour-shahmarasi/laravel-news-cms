<x-filament-panels::page>

    <form wire:submit.prevent="submit">
        {{ $this->form }}
        <br>
        <x-filament::button type="submit" class="mt-4">
            ذخیره تغییرات
        </x-filament::button>

    </form>

    @if (session()->has('message'))
        <div class="alert alert-success mt-4">
            {{ session('message') }}
        </div>
    @endif
</x-filament-panels::page>
