<?php

namespace App\Livewire\Admin\Categories;

use App\Models\Category;
use Livewire\Component;

class Edit extends Component {
    public Category $category;

    public string $name = '';

    public function mount(Category $category) {
        $this->category = $category;
        $this->name = $category->name;
    }

    protected function rules() {
        return [
            'name' => ['required', 'string', 'max:255', "unique:categories,name,{$this->category->id}"],
        ];
    }

    public function update() {
        $this->validate();

        $this->category->update([
            'name' => $this->name,
        ]);

        session()->flash('success', 'تم تحديث التصنيف بنجاح');

        return redirect()->route('admin.categories.index');
    }

    public function render() {
        return view('livewire.admin.categories.edit');
    }
}
