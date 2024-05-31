<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen font-sans antialiased bg-base-200/50 dark:bg-base-200">

    {{-- NAVBAR mobile only --}}
    <x-mary-nav class="lg:hidden" sticky>
        <x-slot:brand>
            <div class="pt-5 ml-5">App</div>
        </x-slot:brand>
        <x-slot:actions>
            <label class="mr-3 lg:hidden" for="main-drawer">
                <x-mary-icon class="cursor-pointer" name="o-bars-3" />
            </label>
        </x-slot:actions>
    </x-mary-nav>

    {{-- MAIN --}}
    <x-mary-main full-width>
        {{-- SIDEBAR --}}
        <x-slot:sidebar class="bg-base-100 lg:bg-inherit" drawer="main-drawer" collapsible>

            {{-- BRAND --}}

            <div class="flex justify-center pt-5">
                <h1 class="text-lg font-bold"> PMS (V2)</h1>
            </div>

            {{-- MENU --}}
            <x-mary-menu activate-by-route>

                {{-- User --}}
                @if ($user = auth()->user())
                    <x-mary-menu-separator />

                    <x-mary-list-item class="-mx-2 !-my-2 rounded" value="name" :item="$user" sub-value="email"
                        no-separator no-hover>
                        <x-slot:actions>
                            <x-mary-button class="btn-circle btn-ghost btn-xs" icon="o-power" tooltip-left="logoff"
                                no-wire-navigate link="/logout" />
                        </x-slot:actions>
                    </x-mary-list-item>

                    <x-mary-menu-separator />
                @endif

                <x-mary-menu-item title="Dashboard" icon="o-sparkles" link="/" />
                <x-mary-menu-sub title="Tetapan" icon="o-cog-6-tooth">
                    <x-mary-menu-item title="Isu" icon="o-wifi" link="{{ route('isu.create') }}" />
                    <x-mary-menu-item title="Archives" icon="o-archive-box" link="####" />
                </x-mary-menu-sub>

            </x-mary-menu>
        </x-slot:sidebar>

        {{-- The `$slot` goes here --}}
        <x-slot:content>
            {{ $slot }}
        </x-slot:content>
    </x-mary-main>

    {{-- Toast --}}
    <x-mary-toast />
</body>

</html>
