<?php

use App\Helpers\pr;
use Livewire\Volt\Component;
use App\Models\Surah;
use App\Models\Verse;
use App\Models\Word;
use Livewire\Attributes\On;
use Masmerise\Toaster\Toastable;

new class extends Component {
    use Toastable;
    public  $word;
    public $surahs;
    public int $rootId;
    public int $wordId;
    public int $index;
    public function mount() {
        // pr::log($this->rootId, 'rootId');
    }
    #[On('surah-verse-selector_update.{wordId}')]
    public function surahVerseListener(array $payload) {
        // pr::log($payload, 'surahVerseListener');
        // $index = $payload['meta']['index'] ?? null;
        $surahId = $payload['selectedVerse']['surah_id'] ?? null;
        $verseId = $payload['selectedVerse']['id'] ?? null;
        $this->word['surah_id'] = $surahId;
        $this->word['verse_id'] = $verseId;
    }
    public function removeWord() {
        // if ($this->word['id'] != -1) {
        //     Word::where('id', $this->word['id'])->delete();
        // }
        $this->dispatch('upsert-word_remove-word', ['id' => $this->word['id']]);
    }
    public function save() {
        $this->validate([
            'word.word' => 'required|string|max:255',
            'word.word_tashkeel' => 'nullable|string|max:255',
        ]);
        if (!isset($this->word['surah_id']) ||  !isset($this->word['surah_id'])) {
            $this->error("الرجاء تحديد السورة والآية قبل الحفظ");
            return;
        }
        if ($this->word['id'] == -1) {
            $word =   Word::create([
                'word' => $this->word['word'],
                'word_tashkeel' => $this->word['word_tashkeel'],
                'surah_id' => $this->word['surah_id'],
                'verse_id' => $this->word['verse_id'],
                'root_id' => $this->rootId,
            ]);
            $this->dispatch('upsert-word_new-word-created', $word->toArray());
        } else {
            $word = Word::where('id', $this->word['id'])->first();
            $word->update([
                'word' => $this->word['word'],
                'word_tashkeel' => $this->word['word_tashkeel'],
                'surah_id' => $this->word['surah_id'],
                'verse_id' => $this->word['verse_id'],
            ]);
        }
        $this->info("تم حفظ الكلمة بنجاح");
    }
}; ?>

<div class="p-4 border border-gray-200 rounded-md dark:border-gray-700 bg-gray-50 dark:bg-zinc-900">
    <div class="flex justify-end w-full">

        <flux:badge color="lime">{{ $word['id'] == -1 ? "كلمة جديدة" : ($index  + 1)}}</flux:badge>
    </div>
    <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
        <div>
            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">الكلمة بدون تشكيل</label>
            <input type="text" wire:model="word.word" class="block w-full px-4 py-2 mt-1 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 dark:bg-zinc-800 dark:border-zinc-600 dark:text-white sm:text-sm">
            @error("word.word") <span class="text-sm text-red-600">{{ $message }}</span> @enderror
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">الكلمة بالتشكيل</label>
            <input type="text" wire:model="word.word_tashkeel" class="block w-full px-4 py-2 mt-1 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 dark:bg-zinc-800 dark:border-zinc-600 dark:text-white sm:text-sm">
            @error("word.word_tashkeel") <span class="text-sm text-red-600">{{ $message }}</span> @enderror
        </div>
    </div>
    <div>
        <livewire:admin.shared.surah-verse-selector :event-name="'surah-verse-selector_update.'.$word['id']" :surahs="$surahs" :meta="[
        'init' => ['word'=>$word]
        ]" :key="'word-upsert'.$word['id']" />
    </div>
    <div class="flex justify-end mt-2 space-x-4">
        <button type="button"
            wire:click="save" class="px-2 py-1 text-sm text-green-600 bg-green-100 border rounded-lg shadow hover:text-green-800 hover:scale-105 hover:shadow-lg">
            حفظ
        </button>
        <button type="button"
            wire:confirm="هل أنت متأكد أنك تريد حذف هذه الكلمة؟ هذا الإجراء لا يمكن التراجع عنه"
            wire:click="removeWord" class="px-2 py-1 text-sm text-red-600 bg-red-100 border rounded-lg shadow hover:text-red-800 hover:scale-105 hover:shadow-lg">
            حذف
        </button>
    </div>
</div>