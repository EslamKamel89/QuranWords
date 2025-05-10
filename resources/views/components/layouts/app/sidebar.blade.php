<!DOCTYPE html>
@php
$isRtl = app()->getLocale() === 'ar';
@endphp
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark" dir="{{ $isRtl ? 'rtl' : 'ltr' }}">

<head>
    @include('partials.head')
</head>

<body class="flex min-h-screen text-right bg-white dark:bg-zinc-800" x-data="{ show: false }">
    <!-- Sidebar -->
    <aside class="fixed inset-y-0 right-0 z-30 hidden w-64 h-screen overflow-y-auto transition-all duration-300 ease-in-out bg-white dark:bg-zinc-800 border-e border-zinc-200 dark:border-zinc-700 lg:relative lg:block" :class="{ 'block': show, 'hidden': !show }">
        <div class="p-4">
            <a href="{{ route('dashboard') }}" class="flex items-center space-x-2 rtl:space-x-reverse" wire:navigate>
                <x-app-logo />
            </a>
        </div>

        <flux:navlist variant="outline" class="px-4">
            <flux:navlist.group class="grid gap-1 mt-5">
                <flux:dropdown position="bottom" align="start" class="w-full ">
                    <flux:profile
                        :name="auth()->user()->name"
                        :initials="auth()->user()->initials()"
                        icon-trailing="chevrons-up-down" />

                    <flux:menu class="w-[220px]">
                        <flux:menu.radio.group>
                            <div class="p-0 text-sm font-normal">
                                <div class="flex items-center gap-2 px-1 py-1.5 text-start text-sm">
                                    <span class="relative flex w-8 h-8 overflow-hidden rounded-lg shrink-0">
                                        <span class="flex items-center justify-center w-full h-full text-black rounded-lg bg-neutral-200 dark:bg-neutral-700 dark:text-white">
                                            {{ auth()->user()->initials() }}
                                        </span>
                                    </span>

                                    <div class="grid flex-1 text-sm leading-tight text-start">
                                        <span class="font-semibold truncate">{{ auth()->user()->name }}</span>
                                        <span class="text-xs truncate">{{ auth()->user()->email }}</span>
                                    </div>
                                </div>
                            </div>
                        </flux:menu.radio.group>

                        <flux:menu.separator />

                        <flux:menu.radio.group>
                            <flux:menu.item :href="route('settings.profile')" icon="cog" wire:navigate>{{ __('Settings') }}</flux:menu.item>
                        </flux:menu.radio.group>

                        <flux:menu.separator />

                        <form method="POST" action="{{ route('logout') }}" class="w-full">
                            @csrf
                            <flux:menu.item as="button" type="submit" icon="arrow-right-start-on-rectangle" class="w-full">
                                {{ __('Log Out') }}
                            </flux:menu.item>
                        </form>
                    </flux:menu>
                </flux:dropdown>
                <flux:menu.separator />

                <flux:navlist.item icon="home" :href="route('dashboard')" :current="request()->routeIs('dashboard')" wire:navigate>الإحصائيات</flux:navlist.item>
                <flux:navlist.item icon="book-open" :href="route('roots.index')" :current="request()->routeIs('roots.index')" wire:navigate>الكلمات الرئيسية</flux:navlist.item>
            </flux:navlist.group>
        </flux:navlist>

        <flux:spacer />


    </aside>

    <!-- Toggle Button -->
    <button @click="show = !show" class="fixed z-20 p-2 bg-white rounded-md shadow top-4 left-4 dark:bg-zinc-900 lg:hidden">
        <flux:icon.bars-2 x-show="!show" />
        <flux:icon.x-mark x-show="show" />
    </button>

    <!-- Main Content -->
    <main class="flex-1 overflow-auto bg-zinc-100 dark:bg-zinc-800 ">
        {{ $slot }}
    </main>



    @fluxScripts
</body>

</html>