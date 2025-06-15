<?php

use App\Helpers\pr;
use Livewire\Volt\Component;
use App\Models\Surah;
use App\Models\Verse;
use App\Models\Word;
use Livewire\Attributes\On;
use Masmerise\Toaster\Toaster;
use Masmerise\Toaster\Toastable;

new class extends Component {
    use Toastable;
    public \App\Models\Root $root;
    public $origin_word;
    public $name;
    public $words = [];

    public function mount() {
        $this->root->load(['words', 'words.verse:id,surah_id']);
        $this->origin_word = $this->root->origin_word;
        $this->name = $this->root->name;
        $this->initAndSortWords();
    }
    public function initAndSortWords() {
        $this->words = $this->root->words
            ->sortByDesc('created_at')
            ->sortBy(function ($word) {
                return $word->verse->id;
            }, SORT_ASC)
            ->toArray();
    }
    public function addWord() {
        // pr::log($this->words, 'addWord');
        if ($this->words[count($this->words) - 1]['id'] == -1) {
            $this->warning('لقد أضفت كلمة ولم تحفظها!');
            return;
        }
        $this->words[] = [
            'id' => -1,
            'word' => '',
            'word_tashkeel' => ''
        ];
    }
    #[On('upsert-word_remove-word')]
    public function removeWord($payload) {
        $id = $payload['id'];
        if (count($this->words) == 1) {
            $this->info("لا يمكنك حذف الكلمة الوحيدة المرتبطة بالكلمة الرئيسية. أضف كلمة أخرى لتتمكن من الحذف");
            return;
        }
        foreach ($this->words as $index => $word) {
            if ($word['id'] == $id) {
                if ($id != -1) {
                    Word::where('id', $id)->delete();
                }
                unset($this->words[$index]);
                $this->info("تم حذف الكلمة بنجاح");
                break;
            }
        }
    }

    public function save() {
        $this->validate([
            'origin_word' => 'required|string|max:255',
            'name' => 'required|string|max:255',
        ]);
        $this->root->update([
            'origin_word' => $this->origin_word,
            'name' => $this->name,
        ]);
        $this->info("تم حفظ الكلمة الرئيسية بنجاح");
        session()->flash('message', "تم حفظ الكلمة الرئيسية بنجاح");

        return redirect()->route('roots.edit', ['root' => $this->root->id]);
    }

    #[On('upsert-word_new-word-created')]
    public function newWordSaved($payload) {
        $this->words[count($this->words) - 1] = $payload;
    }

    public function with() {
        return [
            'surahs' => Surah::Select(['id', 'name'])->get(),
        ];
    }
}; ?>

<div class="w-full px-4 py-8 mx-auto">
    <h1 class="mb-6 text-2xl font-bold text-gray-800 dark:text-white">إضافة كلمات رئيسية مع كلمات تابعة</h1>

    @if (session()->has('message'))
    <div class="p-4 mb-6 text-green-700 bg-green-100 border border-green-200 rounded-md dark:bg-green-900 dark:text-green-200 dark:border-green-800">
        {{ session('message') }}
    </div>
    @endif
    @error('words')
    <div class="p-4 mb-6 text-sm text-red-700 bg-green-100 border border-red-200 rounded-md dark:bg-red-900 dark:text-red-200 dark:border-red-800">
        يجب إدخال كلمة واحدة على الأقل من الكلمات التابعة
    </div>
    @enderror
    <div class="space-y-6">
        <!-- Origin Word -->
        <div>
            <label for="origin_word" class="block text-sm font-medium text-gray-700 dark:text-gray-300">الكلمة الأصلية</label>
            <input type="text" wire:model="origin_word" id="origin_word" class="block w-full px-4 py-2 mt-1 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 dark:bg-zinc-900 dark:border-zinc-700 dark:text-white sm:text-sm">
            @error('origin_word') <span class="text-sm text-red-600">{{ $message }}</span> @enderror
        </div>

        <!-- Name -->
        <div>
            <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300">الاسم</label>
            <input type="text" wire:model="name" id="name" class="block w-full px-4 py-2 mt-1 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 dark:bg-zinc-900 dark:border-zinc-700 dark:text-white sm:text-sm">
            @error('name') <span class="text-sm text-red-600">{{ $message }}</span> @enderror
        </div>
        <!-- Submit Button -->
        <div class="flex justify-end w-full py-5">
            <button type="button" wire:click="save" class="px-2 py-1 text-sm text-green-600 bg-green-100 border rounded-lg shadow hover:text-green-800 hover:scale-105 hover:shadow-lg">
                احفظ الكلمة الرئيسية
            </button>
        </div>
        <!-- Words Repeater -->
        <div class="mt-6">
            <div class="flex items-center justify-between">
                <h2 class="text-lg font-semibold text-gray-800 dark:text-white">الكلمات المرتبطة</h2>

            </div>

            <div class="mt-4 space-y-4">
                @foreach (array_values($words) as $index => $word)
                <livewire:admin.roots.comps.upsert_word
                    :surahs="$surahs"
                    :word="$word"
                    :rootId="$root->id"
                    :wordId="$word['id']"
                    :index="$index"
                    :key="'word-repeater'.$word['id']" />
                @endforeach
            </div>
            <div class="flex justify-end w-full mt-4 space-x-2">
                <flux:button type="button" wire:click="initAndSortWords"> ترتيب الكلمات</flux:button>
                <flux:button type="button" variant="primary" class="bg-green-500 hover:bg-green-600" wire:click="addWord"> إضافة كلمة</flux:button>


            </div>
        </div>


    </div>
</div>