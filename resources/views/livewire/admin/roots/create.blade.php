<?php

use Livewire\Volt\Component;
use App\Models\Root;
use App\Models\Word;


new class extends Component {
    public $origin_word;
    public $name;
    public $words = [];

    public function mount() {
        $this->addWord(); // Start with one word
    }

    public function addWord() {
        $this->words[] = [
            'word' => '',
            'word_tashkeel' => ''
        ];
    }

    public function removeWord($index) {
        unset($this->words[$index]);
        $this->words = array_values($this->words);
    }

    public function save() {
        $this->validate([
            'origin_word' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'words' => 'required|array|min:1',
            'words.*.word' => 'required|string|max:255',
            'words.*.word_tashkeel' => 'nullable|string|max:255',
        ]);

        $root = Root::create([
            'origin_word' => $this->origin_word,
            'name' => $this->name,
        ]);

        foreach ($this->words as $wordData) {
            $root->words()->create($wordData);
        }

        session()->flash('message', 'تم حفظ الجذر مع الكلمات بنجاح');

        return redirect()->route('roots.index');
    }
}; ?>

<div class="w-full px-4 py-8 mx-auto">
    <h1 class="mb-6 text-2xl font-bold text-gray-800 dark:text-white">إضافة جذر جديد مع كلمات</h1>

    @if (session()->has('message'))
    <div class="p-4 mb-6 text-green-700 bg-green-100 border border-green-200 rounded-md dark:bg-green-900 dark:text-green-200 dark:border-green-800">
        {{ session('message') }}
    </div>
    @endif

    <form wire:submit.prevent="save" class="space-y-6">
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

        <!-- Words Repeater -->
        <div class="mt-6">
            <div class="flex items-center justify-between">
                <h2 class="text-lg font-semibold text-gray-800 dark:text-white">الكلمات المرتبطة</h2>
                <button type="button" wire:click="addWord" class="inline-flex items-center px-3 py-1.5 text-sm font-medium text-white bg-indigo-600 rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    إضافة كلمة
                </button>
            </div>

            <div class="mt-4 space-y-4">
                @foreach ($words as $index => $word)
                <div class="p-4 border border-gray-200 rounded-md dark:border-gray-700 bg-gray-50 dark:bg-zinc-900">
                    <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">الكلمة بدون تشكيل</label>
                            <input type="text" wire:model="words.{{ $index }}.word" class="block w-full px-4 py-2 mt-1 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 dark:bg-zinc-800 dark:border-zinc-600 dark:text-white sm:text-sm">
                            @error("words.$index.word") <span class="text-sm text-red-600">{{ $message }}</span> @enderror
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">الكلمة بالتشكيل</label>
                            <input type="text" wire:model="words.{{ $index }}.word_tashkeel" class="block w-full px-4 py-2 mt-1 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 dark:bg-zinc-800 dark:border-zinc-600 dark:text-white sm:text-sm">
                            @error("words.$index.word_tashkeel") <span class="text-sm text-red-600">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <div class="flex justify-end mt-2">
                        <button type="button" wire:click="removeWord({{ $index }})" class="text-sm text-red-600 hover:text-red-800">
                            حذف
                        </button>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

        <!-- Submit Button -->
        <div class="pt-5">
            <button type="submit" class="inline-flex justify-center px-4 py-2 text-sm font-medium text-white bg-indigo-600 border border-transparent rounded-md shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                حفظ الجذر والكلمات
            </button>
        </div>
    </form>
</div>