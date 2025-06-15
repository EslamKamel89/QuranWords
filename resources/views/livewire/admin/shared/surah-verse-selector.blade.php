<?php

use App\Helpers\pr;
use App\Models\Surah;
use App\Models\Verse;
use Illuminate\Support\Collection;
use Livewire\Volt\Component;

new class extends Component {
    public string $eventName;
    public Collection $surahs;
    public  $verses = null;
    public string $searchSurah = '';
    public string $searchVerse = '';
    public $selectedVerse  = null;
    public $selectedSurah = null;
    public $meta;
    public function mount() {
        $word =    $this->meta['init']['word'] ?? null;
        if ($word) {
            $this->selectedSurah = Surah::find($word['surah_id'] ?? null);
            $this->selectedVerse = Verse::find($word['verse_id'] ?? null);
            $this->searchSurah = $this->selectedSurah?->name ?? '';
            $this->searchVerse = $this->selectedVerse?->verse_number ?? '';
        }
    }
    public function with() {
        return [
            'filteredSurahs' => collect($this->surahs)
                ->filter(
                    fn(Surah $surah) =>
                    $this->searchSurah ? str($surah->name)
                        ->contains($this->searchSurah)  || $surah->id == $this->searchSurah : true
                ),
            'filteredVerses' => $this->selectedSurah && $this->verses ? collect($this->verses)
                ->filter(
                    fn(Verse $verse) =>
                    $this->searchVerse ? $verse->verse_number == $this->searchVerse : true
                ) : collect([])
        ];
    }
    public function selectSurah(array $surah) {
        dd($surah);
        $this->selectedSurah = $surah;
        $this->searchSurah = $surah['name'];
        $this->verses = Verse::select(['id', 'surah_id', 'text', 'verse_number'])
            ->where('surah_id', $surah['id'])
            ->get();
    }
    public function selectVerse(array $verse) {
        $this->selectedVerse = $verse;
        $this->searchVerse = $verse['verse_number'];
        if ($this->selectedSurah && $this->selectedVerse) {

            $this->dispatch($this->eventName, [
                'meta' => $this->meta,
                'selectedVerse' => $this->selectedVerse,
            ]);
        }
    }
}; ?>

<div class="grid w-full grid-cols-1 gap-4 mt-4 lg:grid-cols-2">
    <div class="releative" x-data="{open:false}" @click.outside="open=false">
        <input type="text"
            wire:model.live.debounce.750="searchSurah"
            @click="open=true"
            placeholder="ابحث عن السور"
            class="w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm dark:bg-zinc-900 dark:border-zinc-700 dark:text-white">
        <div x-show="open">
            <div class="grid grid-cols-3">
                @forelse ($filteredSurahs as $surah )
                <div
                    @click="open=false"
                    wire:click="selectSurah({{ $surah }})"
                    class="px-4 py-2 cursor-pointer hover:bg-indigo-100 dark:hover:bg-zinc-700" key="{{ $surah->id }}">{{ $surah->id }}-{{ $surah->name }}</div>
                @empty
                <div class="px-4 py-2 text-gray-500 dark:text-gray-400">لا توجد نتائج</div>
                @endforelse
            </div>
        </div>
    </div>
    @if($selectedSurah)
    <div class="releative" x-data="{open:false}" @click.outside="open=false">
        <input type="number"
            wire:model.live.debounce.750="searchVerse"
            @click="open=true"
            placeholder="ابحث عن رقم الآية"
            class="w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm dark:bg-zinc-900 dark:border-zinc-700 dark:text-white">
        <div x-show="open">
            <div class="grid grid-cols-1">
                @forelse ($filteredVerses as $verse )
                <div
                    @click="open=false"
                    wire:click="selectVerse({{ $verse }})"
                    class="px-4 py-2 cursor-pointer hover:bg-indigo-100 dark:hover:bg-zinc-700" key="{{ $verse->id }}">{{ "{$verse->verse_number} - {$verse->text}" }}</div>
                @empty
                <div class="px-4 py-2 text-gray-500 dark:text-gray-400">لا توجد نتائج</div>
                @endforelse
            </div>
        </div>
    </div>
    @endif
</div>