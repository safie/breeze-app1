<?php

use App\Models\Isu;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Volt\Component;

new class extends Component {
    public Collection $isu;

    public ?Isu $editing = null;

    public function mount(): void
    {
        $this->getIsu();
    }

    #[On('Isu-created')]
    public function getIsu(): void
    {
        $this->isu = Isu::latest()->get();
    }

    public function edit(Isu $isu): void
    {
        $this->editing = $isu;

        $this->getIsu();
    }

    public $headers = [['key' => 'id', 'label' => '#'], ['key' => 'isu_nama', 'label' => 'Isu'], ['key' => 'isu_keterangan', 'label' => 'Keterangan']];
};
?>

<div>
    <x-mary-card class="" title="Senarai Isu Kementerian Ekonomi" subtitle="" separator progress-indicator>
        <x-mary-table :headers="$headers" :rows="$isu">
            @scope('actions', $isu)
                <div class="flex">
                    <x-mary-button class="btn-sm" icon="tabler.edit" wire:click="edit({{ $isu->id }})" spinner />
                    <x-mary-button class="btn-sm" icon="o-trash" wire:click="delete({{ $isu->id }})" spinner />
                </div>
            @endscope
        </x-mary-table>
    </x-mary-card>
</div>
