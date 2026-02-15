<?php

namespace App\Livewire\Admin\Categories;

use App\Models\Category;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component {
    use WithPagination;

    public string $search = '';

    protected $queryString = ['search'];

    public function updatingSearch() {
        $this->resetPage();
    }

    public function delete(Category $category) {
        $category->delete();

        session()->flash('success', 'تم حذف التصنيف بنجاح');
    }

    public function render() {
        $categories = Category::query()
            ->when(
                $this->search,
                fn($q) =>
                $q->where('name', 'like', "%{$this->search}%")
            )
            ->latest()
            ->paginate(10);

        return view('livewire.admin.categories.index', compact('categories'));
    }
}
