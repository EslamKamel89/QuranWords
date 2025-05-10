<!DOCTYPE html>
@php
$isRtl = app()->getLocale() === 'ar';
@endphp
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark" dir="{{ $isRtl ? 'rtl' : 'ltr' }}">

<head>
    @include('partials.head')
</head>

<body class="flex flex-row min-h-screen bg-white dark:bg-zinc-800" x-data="{show:false}">
    <div class="sticky h-screen pt-0 overflow-hidden sticky-top sticky-bottom border-e border-zinc-200 bg-zinc-50 dark:border-zinc-700 dark:bg-zinc-900 lg:pt-14">
        <flux:icon.bars-2 class="block m-4 lg:hidden" @click="show=!show" x-show="!show" />
        <flux:icon.x-mark class="block m-4 lg:hidden" @click="show=!show" x-show="show" />
        <flux:sidebar sticky class="hidden lg:block" x-bind:class="{'!block':show}">

            <a href="{{ route('dashboard') }}" class="flex items-center space-x-2 me-5 rtl:space-x-reverse" wire:navigate>
                <x-app-logo />
            </a>

            <flux:navlist variant="outline">
                <flux:navlist.group class="grid mt-5">
                    <flux:navlist.item icon="home" :href="route('dashboard')" :current="request()->routeIs('dashboard')" wire:navigate>الإحصائيات </flux:navlist.item>
                    <flux:navlist.item icon="book-open" :href="route('roots.index')" :current="request()->routeIs('roots.index')" wire:navigate>الكلمات الرئيسية </flux:navlist.item>
                </flux:navlist.group>
            </flux:navlist>
            <flux:spacer />
        </flux:sidebar>
        <!-- Desktop User Menu -->
        <flux:dropdown position="bottom" align="start" class=" bottom-5 right-3 lg:!absolute" x-bind:class="{'absolute':show , 'hidden':!show}">
            <flux:profile
                :name="auth()->user()->name"
                :initials="auth()->user()->initials()"
                icon-trailing="chevrons-up-down" />

            <flux:menu class="w-[220px]">
                <flux:menu.radio.group>
                    <div class="p-0 text-sm font-normal">
                        <div class="flex items-center gap-2 px-1 py-1.5 text-start text-sm">
                            <span class="relative flex w-8 h-8 overflow-hidden rounded-lg shrink-0">
                                <span
                                    class="flex items-center justify-center w-full h-full text-black rounded-lg bg-neutral-200 dark:bg-neutral-700 dark:text-white">
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
    </div>
    <div class="w-full overflow-auto ms-10 lg:ms-56">

        {{ $slot }}
    </div>

    @fluxScripts
</body>

</html>