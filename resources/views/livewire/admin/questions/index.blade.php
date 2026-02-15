<div dir="rtl" class="space-y-6">

    <div class="flex items-center justify-between">
        <h1 class="text-2xl font-bold">الأسئلة</h1>

        <flux:button href="{{ route('admin.questions.create') }}" wire:navigate>
            إضافة سؤال
        </flux:button>
    </div>

    @if(session('success'))
    <div class="flex items-start gap-3 p-4 border rounded-xl bg-emerald-50 border-emerald-200 text-emerald-800 dark:bg-emerald-500/10 dark:border-emerald-500/30 dark:text-emerald-300">
        <flux:icon.check-circle class="w-5 h-5 mt-0.5 shrink-0" />
        <div class="font-medium">{{ session('success') }}</div>
    </div>
    @endif

    <flux:input
        placeholder="بحث..."
        wire:model.live.debounce.500ms="search" />

    <div class="overflow-hidden bg-white border rounded-2xl border-zinc-200 dark:border-zinc-800 dark:bg-zinc-900">

        <table class="w-full text-sm">

            <thead class="bg-zinc-50 dark:bg-zinc-800/60 text-zinc-600 dark:text-zinc-300">
                <tr class="text-right">
                    <th class="px-6 py-4 font-semibold">السؤال</th>
                    <th class="px-6 py-4 font-semibold">التصنيف</th>
                    <th class="px-6 py-4 font-semibold">الكلمات المفتاحية</th>
                    <th class="w-40 px-6 py-4 font-semibold">الإجراءات</th>
                </tr>
            </thead>

            <tbody class="divide-y divide-zinc-100 dark:divide-zinc-800">

                @forelse($questions as $question)

                <tr class="transition-colors hover:bg-zinc-50 dark:hover:bg-zinc-800/40">

                    <td class="px-6 py-4 text-zinc-800 dark:text-zinc-200">
                        {{ \Illuminate\Support\Str::limit($question->question, 80) }}
                    </td>

                    <td class="px-6 py-4">
                        {{ $question->category?->name ?? 'بدون تصنيف' }}
                    </td>

                    <td class="px-6 py-4">
                        <div class="flex flex-wrap gap-2">
                            @forelse($question->keywordsToArray() as $keyword)
                            <span class="px-2 py-1 text-xs font-medium rounded-md bg-zinc-100 dark:bg-zinc-800 text-zinc-700 dark:text-zinc-300">
                                {{ $keyword }}
                            </span>
                            @empty
                            <span class="text-zinc-400">—</span>
                            @endforelse
                        </div>
                    </td>

                    <td class="px-6 py-4">
                        <div class="flex justify-end gap-2">

                            <flux:button
                                wire:navigate
                                size="sm"
                                variant="ghost"
                                href="{{ route('admin.questions.edit', $question) }}">
                                تعديل
                            </flux:button>

                            <flux:button
                                size="sm"
                                variant="danger"
                                wire:click="delete({{ $question->id }})"
                                wire:confirm="هل أنت متأكد من الحذف؟">
                                حذف
                            </flux:button>

                        </div>
                    </td>

                </tr>

                @empty
                <tr>
                    <td colspan="4" class="px-6 py-12 text-center text-zinc-500 dark:text-zinc-400">
                        لا يوجد بيانات
                    </td>
                </tr>
                @endforelse

            </tbody>


        </table>

    </div>

    <div>
        {{ $questions->links() }}
    </div>

</div>