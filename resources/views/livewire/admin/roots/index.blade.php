<?php

use Livewire\Volt\Component;
use App\Models\Root;
use Livewire\WithPagination;
use Spatie\QueryBuilder\QueryBuilder;
use Livewire\Attributes\Url;

new class extends Component {
    use WithPagination;

    public $search = '';
    #[Url()]
    public ?string $sort = '';
    public array $allowedSort = [
        'words_count',
        'created_at',
        'word_updated_at',
        'origin_word',
        'name',
    ];
    public int $perPage  = 10;
    public function mount() {
        if (!$this->sort) {
            $this->sort = '-word_updated_at';
        }
    }
    public function delete($id) {
        $root = Root::findOrFail($id);
        $root->delete();

        session()->flash('message', 'تم حذف الكلمة بنجاح.');
    }

    public function with() {
        $roots = QueryBuilder::for(Root::class)
            ->where('origin_word', 'like', '%' . $this->search . '%')
            ->orWhere('name', 'like', '%' . $this->search . '%')
            ->withCount('words')
            ->allowedSorts($this->allowedSort)
            ->defaultSort('-word_updated_at')
            ->paginate($this->perPage);

        return [
            'roots' => $roots
        ];
    }
    public function sortRoots(string $key) {
        foreach ($this->allowedSort as $i => $value) {
            $this->hanldeKeyChange($key, $value);
        }
        return $this->redirect(route('roots.index', ['sort' => $key]), true);
    }
    protected function hanldeKeyChange(string &$key, string $value) {
        if ($key == $value) {
            $key = $this->sort == $value ? '-' . $value : $value;
        }
    }
}; ?>

<div class="px-4 py-8 mx-auto overflow-auto max-w-7xl">
    <div class="flex items-center justify-between mb-6">
        <h1 class="text-2xl font-bold text-gray-800 dark:text-white"> الكلمات الرئيسية </h1>
        <a wire:navigate href="{{ route('roots.create') }}" class="px-4 py-2 text-sm font-medium text-white bg-indigo-600 rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
            إضافة كلمة رئيسية
        </a>
    </div>

    <!-- Search -->
    <div class="flex items-center justify-center w-full mb-6 space-x-4">
        <input type="text" wire:model.live.debounce.750="search" placeholder=" الكلمات الرئيسية..." class="w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm dark:bg-gray-800 dark:border-gray-600 dark:text-white focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
        <div class="flex flex-col space-y-2 grow-1 shrink-0">
            <div class="text-xs">عدد العناصر في الصفحة</div>
            <select wire:model.live="perPage" class="px-2 py-2">
                <option class="dark:text-black " value="5">5</option>
                <option class="dark:text-black " value="10">10</option>
                <option class="dark:text-black " value="20">20</option>
                <option class="dark:text-black " value="30">30</option>
                <option class="dark:text-black " value="40">40</option>
            </select>
        </div>
    </div>

    <!-- Table -->
    <div class="rounded-lg shadow g-white dark:bg-gray-800">
        @if (session()->has('message'))
        <div class="p-4 mt-4 text-green-700 bg-green-100 border border-green-200 rounded-md dark:bg-green-900 dark:text-green-200 dark:border-green-800">
            {{ session('message') }}
        </div>
        @endif
        <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
            <thead class="bg-gray-50 dark:bg-gray-700">
                <tr>
                    <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase dark:text-gray-300">الرقم</th>
                    <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase dark:text-gray-300">
                        <div wire:click="sortRoots('origin_word')">
                            <livewire:admin.shared.sort-icon
                                direction="{{ $sort == 'origin_word'? 'asc' : ($sort == '-origin_word' ? 'desc' : '') }}"
                                label="الكلمة الأصلية" />
                        </div>
                    </th>
                    <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase dark:text-gray-300">
                        <div wire:click="sortRoots('name')">
                            <livewire:admin.shared.sort-icon
                                direction="{{ $sort == 'name'? 'asc' : ($sort == '-name' ? 'desc' : '') }}"
                                label="الاسم" />
                        </div>
                    </th>
                    <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase dark:text-gray-300">
                        <div wire:click="sortRoots('words_count')">
                            <livewire:admin.shared.sort-icon
                                direction="{{ $sort == 'words_count'? 'asc' : ($sort == '-words_count' ? 'desc' : '') }}"
                                label="عدد الكلمات" />
                        </div>
                    </th>
                    <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase dark:text-gray-300">
                        <div wire:click="sortRoots('created_at')">
                            <livewire:admin.shared.sort-icon
                                direction="{{ $sort == 'created_at'? 'asc' : ($sort == '-created_at' ? 'desc' : '') }}"
                                label="وقت التسجيل" />
                        </div>
                    </th>
                    <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase dark:text-gray-300">
                        <div wire:click="sortRoots('word_updated_at')">
                            <livewire:admin.shared.sort-icon
                                direction="{{ $sort == 'word_updated_at'? 'asc' : ($sort == '-word_updated_at' ? 'desc' : '') }}"
                                label="اخر تعديل" />
                        </div>
                    </th>
                    <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase dark:text-gray-300">الإجراءات</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200 dark:bg-gray-800 dark:divide-gray-700">
                @forelse ($roots as $root)
                <tr class="transition duration-150 ease-in-out hover:bg-gray-50 dark:hover:bg-gray-700">
                    <td class="px-6 py-4 text-sm font-medium text-center text-gray-900 whitespace-nowrap dark:text-white">{{ $root->id }}</td>
                    <td class="px-6 py-4 text-sm text-center text-gray-800 whitespace-nowrap dark:text-gray-200">{{ $root->origin_word }}</td>
                    <td class="px-6 py-4 text-sm text-center text-gray-800 whitespace-nowrap dark:text-gray-200">{{ $root->name }}</td>
                    <td class="px-6 py-4 text-sm text-center text-gray-800 whitespace-nowrap dark:text-gray-200">{{ $root->words_count }}</td>
                    <td class="px-6 py-4 text-sm text-center text-gray-800 whitespace-nowrap dark:text-gray-200">{{ $root->created_at }}</td>
                    <td class="px-6 py-4 text-sm text-center text-gray-800 whitespace-nowrap dark:text-gray-200">{{ $root->word_updated_at }}</td>
                    <td class="px-6 py-4 space-x-2 space-x-reverse text-sm font-medium text-center whitespace-nowrap">
                        <a wire:navigate href="{{ route('roots.edit' , ['root'=>$root->id]) }}" class="inline-flex items-center px-3 py-1.5 text-sm font-medium text-white bg-blue-600 rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                            تعديل
                        </a>
                        <button wire:click="delete({{ $root->id }})" wire:confirm="هل أنت متأكد من أنك تريد حذف هذا الجذر؟" class="inline-flex items-center px-3 py-1.5 text-sm font-medium text-white bg-red-600 rounded-md hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                            حذف
                        </button>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="px-6 py-4 text-sm text-center text-gray-500 dark:text-gray-400">لا توجد بيانات.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Pagination -->
    <div class="mt-4">
        {{ $roots->links() }}
    </div>


</div>