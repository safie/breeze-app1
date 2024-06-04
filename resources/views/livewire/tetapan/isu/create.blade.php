<?php
use App\Models\Isu;
use Livewire\Atrribute\Validate;
use Livewire\Volt\Component;

new class extends Component {
    // #[Validate('required|string|max:255')]
    public string $isu = '';

    // #[Validate('required|string|max:255')]
    public string $keterangan = '';

    protected $rules = [
        'isu' => 'required|string|max:255',
        'keterangan' => 'required|string|max:255',
    ];

    public function messages(): array
    {
        return [
            'isu.required' => 'Sila masukkan Isu!',
            'keterangan.required' => 'Sila masukkan Keterangan!',
        ];
    }

    public function store()
    {
        $this->validate();

        Isu::create([
            'isu_nama' => $this->isu,
            'isu_keterangan' => $this->keterangan,
        ]);
        // Isu::create($validated);
        $this->validate();
        session()->flash('success', 'Isu telah di simpan!');
        $this->isu = '';
        $this->keterangan = '';

        // dd($validated);

        return $this->redirect('isu');
    }
}; ?>

<x-mary-card class="" title="Borang - Isu" subtitle="Borang daftar isu" separator progress-indicator>
    <x-mary-form wire:submit="store">
        {{-- Full error bag --}}
        {{-- All attributes are optional, remove it and give a try --}}
        <x-mary-errors title="Oops!" description="Maaf, data anda ada masalah." icon="o-face-frown" />

        <x-mary-input label="Isu" wire:model="isu" />
        <x-mary-input label="Keterangan" wire:model="keterangan" />

        <x-slot:actions>
            <x-mary-button class="btn-primary" type="submit" label="Simpan!" spinner="store" />
        </x-slot:actions>
    </x-mary-form>
</x-mary-card>
