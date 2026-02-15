<?php

namespace App\Livewire\Admin\Questions;

use App\Models\Category;
use App\Models\Question;
use Livewire\Component;

class Create extends Component {
    public ?int $category_id = null;
    public string $question = '';
    public string $answer = '';
    public string $keywords = '';

    protected function rules() {
        return [
            'category_id' => ['nullable', 'exists:categories,id'],
            'question' => ['required', 'string'],
            'answer' => ['required', 'string'],
            'keywords' => ['nullable', 'string'],
        ];
    }

    public function save() {
        $this->validate();

        Question::create([
            'category_id' => $this->category_id,
            'question' => $this->question,
            'answer' => $this->answer,
            'keywords' => $this->keywords,
        ]);

        session()->flash('success', 'تم إنشاء السؤال بنجاح');

        return redirect()->route('admin.questions.index');
    }

    public function render() {
        return view('livewire.admin.questions.create', [
            'categories' => Category::pluck('name', 'id'),
        ]);
    }
}
