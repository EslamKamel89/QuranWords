<div dir="rtl" class="max-w-4xl mx-auto space-y-6">

    <flux:breadcrumbs>
        <flux:breadcrumbs.item href="{{ route('admin.questions.index') }}">
            الأسئلة
        </flux:breadcrumbs.item>
        <flux:breadcrumbs.item>
            إضافة سؤال
        </flux:breadcrumbs.item>
    </flux:breadcrumbs>

    <h1 class="text-2xl font-bold text-zinc-800 dark:text-zinc-100">
        إضافة سؤال
    </h1>

    <div class="p-8 space-y-6 bg-white border rounded-2xl border-zinc-200 dark:border-zinc-800 dark:bg-zinc-900">

        <flux:field>
            <flux:label>التصنيف</flux:label>
            <flux:select wire:model="category_id">
                <option value="">بدون تصنيف</option>
                @foreach($categories as $id => $name)
                <option value="{{ $id }}">{{ $name }}</option>
                @endforeach
            </flux:select>
        </flux:field>

        <flux:field>
            <flux:label>السؤال</flux:label>
            <flux:textarea wire:model="question" rows="4" />
            <flux:error name="question" />
        </flux:field>

        <flux:field>
            <flux:label>الإجابة</flux:label>
            <flux:textarea wire:model="answer" rows="5" />
            <flux:error name="answer" />
        </flux:field>

        <flux:field>
            <flux:label>الكلمات المفتاحية</flux:label>
            <flux:input wire:model="keywords" placeholder="كلمة1, كلمة2" />
        </flux:field>

        <div class="flex justify-end gap-3 pt-4 border-t border-zinc-100 dark:border-zinc-800">

            <flux:button variant="ghost" href="{{ route('admin.questions.index') }}">
                إلغاء
            </flux:button>

            <flux:button wire:click="save">
                حفظ
            </flux:button>

        </div>

    </div>

</div>