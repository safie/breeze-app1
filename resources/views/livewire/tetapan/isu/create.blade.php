<?php

use Livewire\Volt\Component;

new class extends Component {
    public string $isu = '';
    public string $keterangan = '';
}; ?>

<x-mary-card class="m-2" title="Borang - Isu" subtitle="Borang daftar isu" separator progress-indicator>
    <x-mary-form wire:submit="save6">
        {{-- Full error bag --}}
        {{-- All attributes are optional, remove it and give a try --}}
        <x-mary-errors title="Oops!" description="Please, fix them." icon="o-face-frown" />

        <x-mary-input label="Isu" wire:model="isu" />
        <x-mary-input label="Keterangan" wire:model="keterangan" />

        <x-slot:actions>
            <x-mary-button class="btn-primary" type="submit" label="Simpan!" spinner="save6" />
        </x-slot:actions>
    </x-mary-form>
</x-mary-card>
