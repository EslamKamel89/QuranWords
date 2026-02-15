<?php

namespace App\Livewire\Admin\Questions;

use App\Models\Question;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component {
    use WithPagination;

    public string $search = '';

    protected $queryString = ['search'];

    public function updatingSearch() {
        $this->resetPage();
    }

    public function delete(Question $question) {
        $question->delete();

        session()->flash('success', 'تم حذف السؤال بنجاح');
    }

    public function render() {
        $questions = Question::query()
            ->with('category')
            ->when(
                $this->search,
                fn($q) =>
                $q->where('question', 'like', "%{$this->search}%")
                    ->orWhere('keywords', 'like', "%{$this->search}%")
            )
            ->latest()
            ->paginate(10);

        return view('livewire.admin.questions.index', compact('questions'));
    }
}
