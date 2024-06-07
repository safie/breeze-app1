<!DOCTYPE html>
<html data-theme="pastel" lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased bg-base-200/50 dark:bg-base-200">

    {{-- The navbar with `sticky` and `full-width` --}}
    <x-mary-nav sticky full-width>

        <x-slot:brand>
            {{-- Drawer toggle for "main-drawer" --}}
            <label class="mr-3 lg:hidden" for="main-drawer">
                <x-icon class="cursor-pointer" name="heroicon-s-bars-4" />
            </label>

            {{-- Brand --}}
            <div>App</div>
        </x-slot:brand>

        {{-- Right side actions --}}
        <x-slot:actions>
            <x-mary-button class="btn-ghost btn-sm" label="Messages" icon="o-envelope" link="###" responsive />
            <x-mary-button class="btn-ghost btn-sm" label="Notifications" icon="o-bell" link="###" responsive />
            {{-- <x-mary-theme-toggle /> --}}
        </x-slot:actions>
    </x-mary-nav>

    {{-- MAIN --}}
    <x-mary-main with-nav full-width>

        {{-- This is a sidebar that works also as a drawer on small screens --}}
        {{-- Notice the `main-drawer` reference here --}}
        <x-slot:sidebar class="bg-base-200" drawer="main-drawer" collapsible>

            {{-- User --}}
            @if ($user = auth()->user())
                <x-mary-list-item class="pt-2" value="name" :item="$user" sub-value="email" no-separator
                    no-hover>
                    <x-slot:actions>
                        <x-mary-button class="btn-circle btn-ghost btn-xs" wire:click="logout" icon="o-power"
                            tooltip-left="logoff" no-wire-navigate />
                    </x-slot:actions>
                </x-mary-list-item>

                <x-mary-menu-separator />
            @endif

            {{-- Activates the menu item when a route matches the `link` property --}}
            <x-mary-menu activate-by-route>
                <x-mary-menu-item title="Dashboard" icon="o-home" link="/" />
                <x-mary-menu-item title="Messages" icon="o-envelope" link="###" />
                <x-mary-menu-sub title="Tetapan" icon="o-cog-6-tooth">
                    <x-mary-menu-item title="Isu" icon="o-paint-brush" link="{{ route('tetapan.isu') }}" />
                    <x-mary-menu-item title="Archives" icon="o-archive-box" link="####" />
                </x-mary-menu-sub>
            </x-mary-menu>
        </x-slot:sidebar>
        {{-- The `$slot` goes here --}}
        <x-slot:content class="bg-base-300">
            {{ $slot }}
        </x-slot:content>

    </x-mary-main>

    {{-- Toast --}}
    <x-mary-toast />
</body>

</html>
