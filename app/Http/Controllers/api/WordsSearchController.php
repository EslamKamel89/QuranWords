<?php

namespace App\Http\Controllers\Api;

use App\Helpers\pr;
use App\Http\Controllers\Controller;
use App\Models\Root;
use App\Models\Word;
use Illuminate\Http\Request;

class WordsSearchController extends Controller {
    protected int $paginationLimit = 20;
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request) {
        if ($request->has('wordId')) {
            return   $this->getWordQueryInstance()->where('id', $request->get('wordId'))
                ->paginate($this->paginationLimit);
        }
        if (!$request->has('search')) {
            return   $this->getWordQueryInstance()->paginate($this->paginationLimit);
        }
        $search = $request->get('search');

        if ($this->getWordQueryInstance()->stepOne($search)->count()) {
            pr::log($this->getWordQueryInstance()->stepOne($search)->toRawSql());
            $stepOne = $this->getWordQueryInstance()->stepOne($search)->paginate($this->paginationLimit);
            // pr::log('Step one triggered');
            return $stepOne;
        }
        // dd($this->getWordQueryInstance()->stepTwo($search)->toRawSql());
        if ($this->getWordQueryInstance()->stepTwo($search)->count()) {
            $stepTwo = $this->getWordQueryInstance()->stepTwo($search)->paginate($this->paginationLimit);
            // pr::log('Step two triggered');
            return $stepTwo;
        }
        // dd($this->getWordQueryInstance()->stepThree($search)->toRawSql());
        $stepThree = $this->getWordQueryInstance()->stepThree($search)->paginate($this->paginationLimit);
        // pr::log('Step three triggered');
        return $stepThree;
    }
    protected function getWordQueryInstance() {
        $query = Word::query();
        $query
            ->select(["id", "root_id", "verse_id", "surah_id", 'word', 'word_tashkeel'])
            ->with([
                'root:id,name,origin_word',
                'surah:id,name',
                'verse:id,surah_id,verse_number,text',
            ]);
        return $query;
    }
}
