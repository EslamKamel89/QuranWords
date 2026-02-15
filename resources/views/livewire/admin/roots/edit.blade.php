<?php

use App\Helpers\pr;
use App\Models\Root;
use Livewire\Volt\Component;
use App\Models\Surah;
use App\Models\Verse;
use App\Models\Word;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\On;
use Masmerise\Toaster\Toaster;
use Masmerise\Toaster\Toastable;

new class extends Component {
    use Toastable;
    public Root $root;
    public $origin_word;
    public $name;
    public $words = [];
    public $roots;
    public ?int $updatedRoot = null;

    public function mount() {
        // pr::log($this->root->id, 'rootId in the edit page');
        $this->roots = Root::select(['id', 'name', 'origin_word'])
            ->latest('word_updated_at')
            ->get();
        $this->root->load(['words', 'words.verse:id,surah_id']);
        $this->origin_word = $this->root->origin_word;
        $this->name = $this->root->name;
        $this->initAndSortWords();
        $this->updatedRoot = $this->root->id;
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

    public function changeRoot() {
        DB::table('words')
            ->where([
                'root_id' => $this->root->id,
            ])->update([
                'root_id' => $this->updatedRoot,
            ]);
        return redirect()->route('roots.edit', ['root' => $this->root->id]);
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
        <div x-data="{editMainInfo:true}">
            <ul class="flex flex-wrap mb-3 text-sm font-medium text-center text-gray-500 border-b border-gray-200 dark:border-gray-700 dark:text-gray-400">
                <li class="me-2" @click="editMainInfo = true">
                    <div
                        class="inline-block p-4 rounded-t-lg cursor-pointer hover:text-gray-600 hover:bg-gray-50 dark:hover:bg-gray-800 dark:hover:text-gray-300"
                        x-bind:class="{
                    'text-blue-600 border border-blue-500 dark:text-blue-500':editMainInfo ,
                    }">تعديل المعلومات الرئيسية</div>
                </li>
                <li class="me-2" @click="editMainInfo = false">
                    <div
                        class="inline-block p-4 rounded-t-lg cursor-pointer hover:text-gray-600 hover:bg-gray-50 dark:hover:bg-gray-800 dark:hover:text-gray-300"
                        x-bind:class="{
                    'text-blue-600 border border-blue-500 dark:text-blue-500':!editMainInfo ,
                    }">تغيير الكلمة الرئيسية</div>
                </li>
            </ul>
            <div x-show="editMainInfo">
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
                    <x-shared.button wire:click="save" label=" احفظ الكلمة الرئيسية" />

                </div>
            </div>
            <div x-show="!editMainInfo">
                <flux:select wire:model.live="updatedRoot" placeholder="اختر الكلمة الأصلية">
                    @foreach ($roots as $rootModel )
                    <flux:select.option :key="'root-selector-'.$rootModel->id" :value="$rootModel->id">{{ $rootModel->origin_word.'-'.$rootModel->name }}</flux:select.option>
                    @endforeach
                </flux:select>
                <div class="flex justify-end w-full mt-4" wire:click="changeRoot()" wire:confirm="تنبيه: هذا الإجراء لا رجعة فيه">
                    <flux:button type="button" variant="primary">احفظ</flux:button>
                </div>
            </div>
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