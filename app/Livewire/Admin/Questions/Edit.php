<?php

namespace App\Livewire\Admin\Questions;

use App\Models\Category;
use App\Models\Question;
use Livewire\Component;

class Edit extends Component {
    public Question $questionModel;

    public ?int $category_id = null;
    public string $question = '';
    public string $answer = '';
    public string $keywords = '';

    public function mount(Question $question) {
        $this->questionModel = $question;

        $this->category_id = $question->category_id;
        $this->question = $question->question;
        $this->answer = $question->answer;
        $this->keywords = $question->keywords ?? '';
    }

    protected function rules() {
        return [
            'category_id' => ['nullable', 'exists:categories,id'],
            'question' => ['required', 'string'],
            'answer' => ['required', 'string'],
            'keywords' => ['nullable', 'string'],
        ];
    }

    public function update() {
        $this->validate();

        $this->questionModel->update([
            'category_id' => $this->category_id,
            'question' => $this->question,
            'answer' => $this->answer,
            'keywords' => $this->keywords,
        ]);

        session()->flash('success', 'تم تحديث السؤال بنجاح');

        return redirect()->route('admin.questions.index');
    }

    public function render() {
        return view('livewire.admin.questions.edit', [
            'categories' => Category::pluck('name', 'id'),
        ]);
    }
}
