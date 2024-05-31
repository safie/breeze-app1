<?php

use App\Models\Isu;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Volt\Component;

new class extends Component {
    public Collection $isu;

    public function mount(): void
    {
        $this->isu = Isu::all();
    }

    public $headers = [['key' => 'id', 'label' => '#'], ['key' => 'isu_nama', 'label' => 'Isu'], ['key' => 'isu_keterangan', 'label' => 'Keterangan']];
};
?>

<div>
    <x-mary-card class="col-span-2 m-2" title="Senarai Isu Kementerian Ekonomi" subtitle="" separator
        progress-indicator>
        <x-mary-table :headers="$headers" :rows="$isu" link="/docs/installation/?from={username}" />
    </x-mary-card>
</div>
