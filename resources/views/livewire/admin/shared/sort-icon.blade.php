<?php

use App\Helpers\pr;
use App\Models\Surah;
use App\Models\Verse;
use Illuminate\Support\Collection;
use Livewire\Attributes\Reactive;
use Livewire\Volt\Component;

new class extends Component {
    #[Reactive()]
    public string $direction;
    public string $label;
}; ?>

<div>
    <div class="flex flex-row items-center justify-center space-x-3 cursor-pointer">
        <div class="">
            {{ $label  }}
        </div>
        <div>

            @if($direction == 'asc')
            <flux:icon.chevron-up class="size-4" />
            @elseif($direction == 'desc')
            <flux:icon.chevron-down class="size-4" />
            @else
            <flux:icon.minus class="size-4" />
            @endif
        </div>
    </div>
</div>