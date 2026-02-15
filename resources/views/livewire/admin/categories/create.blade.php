<div dir="rtl" class="max-w-4xl mx-auto space-y-6">

    <flux:breadcrumbs>
        <flux:breadcrumbs.item href="{{ route('admin.categories.index') }}">
            التصنيفات
        </flux:breadcrumbs.item>
        <flux:breadcrumbs.item>
            إضافة تصنيف
        </flux:breadcrumbs.item>
    </flux:breadcrumbs>

    <h1 class="text-2xl font-bold text-zinc-800 dark:text-zinc-100">
        إضافة تصنيف
    </h1>

    <div class="p-8 space-y-6 bg-white border rounded-2xl border-zinc-200 dark:border-zinc-800 dark:bg-zinc-900">

        <flux:field>
            <flux:label>اسم التصنيف</flux:label>

            <flux:input wire:model="name" />

            <flux:error name="name" />
        </flux:field>

        <div class="flex justify-end gap-3 pt-4 border-t border-zinc-100 dark:border-zinc-800">

            <flux:button
                variant="ghost"
                href="{{ route('admin.categories.index') }}">
                إلغاء
            </flux:button>

            <flux:button wire:click="save">
                حفظ
            </flux:button>

        </div>

    </div>

</div>