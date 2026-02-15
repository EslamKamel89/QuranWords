<?php

namespace App\Livewire\Admin\Categories;

use App\Models\Category;
use Livewire\Component;

class Create extends Component {
    public string $name = '';

    protected function rules() {
        return [
            'name' => ['required', 'string', 'max:255', 'unique:categories,name'],
        ];
    }

    public function save() {
        $this->validate();

        Category::create([
            'name' => $this->name,
        ]);

        session()->flash('success', 'تم إنشاء التصنيف بنجاح');

        return redirect()->route('admin.categories.index');
    }

    public function render() {
        return view('livewire.admin.categories.create');
    }
}
