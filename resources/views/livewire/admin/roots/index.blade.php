<?php

use Livewire\Volt\Component;
use App\Models\Root;
use Livewire\WithPagination;

new class extends Component {
    use WithPagination;

    public $search = '';


    public function delete($id) {
        $root = Root::findOrFail($id);
        $root->delete();

        session()->flash('message', 'تم حذف الكلمة بنجاح.');
    }

    public function with() {
        $roots = Root::query()
            ->where('origin_word', 'like', '%' . $this->search . '%')
            ->orWhere('name', 'like', '%' . $this->search . '%')
            ->withCount('words')
            ->orderByDesc('word_updated_at')
            ->paginate(10);

        return [
            'roots' => $roots
        ];
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
    <div class="mb-6">
        <input type="text" wire:model.live.debounce.750="search" placeholder=" الكلمات الرئيسية..." class="w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm dark:bg-gray-800 dark:border-gray-600 dark:text-white focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
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
                    <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase dark:text-gray-300">الكلمة الأصلية</th>
                    <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase dark:text-gray-300">الاسم</th>
                    <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase dark:text-gray-300">عدد الكلمات</th>
                    <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase dark:text-gray-300">وقت التسجيل</th>
                    <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase dark:text-gray-300">اخر تعديل</th>
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