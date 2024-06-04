<x-app-layout>
    {{-- <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Tetapan: ISU') }}
        </h2>
    </x-slot> --}}

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="w-full grid grid-cols-3 gap-5">
            <div>
                <livewire:tetapan.isu.create />
                <livewire:tetapan.isu.edit />
            </div>
            <div class="col-span-2">
                <livewire:tetapan.isu.index />
            </div>
        </div>
    </div>

</x-app-layout>
