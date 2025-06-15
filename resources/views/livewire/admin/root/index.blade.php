<?php

use App\Helpers\pr;
use Livewire\Volt\Component;
use App\Models\Root;
use App\Models\Word;
use Livewire\WithPagination;
use Spatie\QueryBuilder\QueryBuilder;
use Livewire\Attributes\Url;

new class extends Component {
    public Root $root;
    public function mount() {
        $this->root->load(relations: ['words.verse', 'words.surah']);
        pr::log($this->root);
    }
    public function surahs(Word $word) {
        return  $word->root->words()
            ->where('word', $word->word)
            ->with('surah')
            ->get()
            ->groupBy('surah_id');
    }
}; ?>
<div>

    @foreach ($root->words->unique('verse_id') as $word)

    <div x-data="{ open: false }" class="mb-4">
        <div
            class="flex items-center justify-between p-4 bg-white border border-gray-200 rounded-t-lg cursor-pointer dark:bg-gray-800 dark:border-gray-700"
            @click="open = !open">
            <div class="text-right">
                <h3 class="text-xl font-semibold text-brown-900 dark:text-white">
                    {{ $word->word_tashkeel  }}
                </h3>

                <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                    @foreach ($this->surahs($word) as $surahId => $wordsInSurah)
                    @php
                    $surah = $wordsInSurah->first()->surah;
                    $verseCount = $wordsInSurah->count();
                    @endphp
                    <span>
                        {{ $surah->name }} ({{ $verseCount }} آية{{ $verseCount > 1 ? 'ً' : '' }})
                        @unless($loop->last)
                        •
                        @endunless
                    </span>
                    @endforeach
                </p>
            </div>

            <!-- Chevron Icon -->
            <svg xmlns="http://www.w3.org/2000/svg"
                class="w-5 h-5 text-gray-500 transition-transform duration-300 ease-in-out"
                :class="{ 'rotate-180': open }" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
            </svg>
        </div>

        <!-- Collapsible Content -->
        <div x-show="open" x-collapse.duration.300ms class="px-4 pb-4 bg-white border-b border-l border-r border-gray-200 rounded-b-lg dark:bg-gray-800 dark:border-gray-700">


            <ul class="space-y-4">
                @foreach ($this->surahs($word) as $surahId => $wordsInSurah)
                @php
                $surah = $wordsInSurah->first()->surah;
                $verses = $wordsInSurah->map(fn($w) => $w->verse)->unique('id');
                @endphp

                <li dir="rtl" class="text-right">
                    <h4 class="mb-2 font-bold text-indigo-600 dark:text-indigo-400">{{ $surah->name }}</h4>
                    <ul class="pr-4 space-y-2 border-l border-gray-200 dark:border-gray-600">
                        @foreach ($verses as $verse)
                        <li class="relative py-2 pl-4 pr-3 border border-gray-200 rounded-md bg-gray-50 dark:bg-gray-700 dark:border-gray-600">
                            <span class="absolute top-0 bottom-0 flex items-center block text-xs font-semibold text-indigo-600 dark:text-indigo-400 -left-3">
                                {{ $verse->verse_number }}
                            </span>
                            <p class="text-sm text-gray-800 dark:text-gray-200">
                                {{ $verse->text }}
                            </p>
                        </li>
                        @endforeach
                    </ul>
                </li>
                @endforeach
            </ul>
        </div>
    </div>
    @endforeach
</div>