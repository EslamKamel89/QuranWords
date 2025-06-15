<?php

use App\Helpers\pr;
use Livewire\Volt\Component;
use App\Models\Root;
use Livewire\WithPagination;
use Spatie\QueryBuilder\QueryBuilder;
use Livewire\Attributes\Url;

new class extends Component {
    public Root $root;
    public function mount() {
        $this->root->load(relations: ['words.verse', 'words.surah']);
        pr::log($this->root);
    }
}; ?>

<div class="mb-6">
    @foreach ($root->words as $word)
    <div class="p-4 mb-3 transition-shadow duration-200 bg-white border border-gray-200 rounded-lg shadow-sm dark:bg-gray-800 dark:border-gray-700 hover:shadow-md">
        <!-- Surah Info -->
        <div class="flex items-center justify-between mb-2">
            <span class="text-xs font-semibold text-indigo-600 dark:text-indigo-400">
                {{ $word->surah->name }} ({{ $word->surah->id }})
            </span>
            <span class="text-xs text-gray-500 dark:text-gray-400">
                الآية {{ $word->verse->verse_number }}
            </span>
        </div>

        <!-- Word -->
        <div class="mb-3 text-right">
            <span class="text-lg font-medium text-brown-900 dark:text-white">
                {{ $word->word_tashkeel ?: $word->word }}
            </span>
        </div>

        <!-- Verse Text -->
        <div dir="rtl" class="text-sm leading-relaxed text-right text-gray-700 dark:text-gray-300">
            {{ $word->verse->text }}
        </div>
    </div>
    @endforeach
</div>