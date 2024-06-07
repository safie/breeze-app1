<?php

use App\Models\Isu;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Volt\Component;
use Livewire\WithPagination;
use Illuminate\Pagination\LengthAwarePaginator;

new class extends Component {
    use WithPagination;

    public Collection $isu;

    public ?Isu $editing = null;

    public function mount(): void
    {
        $this->getIsu();
    }

    #[On('Isu-created')]
    public function getIsu(): LengthAwarePaginator
    {
        $this->isu = Isu::paginate(5);
    }

    public function edit(Isu $isu): void
    {
        $this->editing = $isu;

        $this->getIsu();
    }

    public function delete(Isu $isu): void
    {
        $this->authorize('delete', $isu);

        $chirp->delete();

        $this->getIsu();
    }

    public $headers = [['key' => 'id', 'label' => '#'], ['key' => 'isu_nama', 'label' => 'Isu'], ['key' => 'isu_keterangan', 'label' => 'Keterangan']];
};
?>

<div>
    <x-mary-card class="" title="Senarai Isu Kementerian Ekonomi" subtitle="" separator progress-indicator>
        <x-mary-table :headers="$headers" :rows="$isu" with-pagination>
            @scope('actions', $isu)
                <div class="flex">
                    <x-mary-button class="text-white btn-sm bg-slate-600" icon="tabler.edit"
                        wire:click="edit({{ $isu->id }})" spinner />
                    <x-mary-button class="text-white bg-red-600 btn-sm" icon="o-trash" wire:click="delete({{ $isu->id }})"
                        spinner />
                </div>
            @endscope
        </x-mary-table>
    </x-mary-card>
</div>
