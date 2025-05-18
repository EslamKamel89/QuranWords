<?php

namespace App\Http\Controllers\Api;

use App\Helpers\pr;
use App\Http\Controllers\Controller;
use App\Models\Root;
use App\Models\Word;
use Illuminate\Http\Request;

class WordsSearchController extends Controller {
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request) {

        if (!$request->has('search')) {
            return   $this->getWordQueryInstance()->paginate(10);
        }
        $search = $request->get('search');

        if ($this->getWordQueryInstance()->stepOne($search)->count()) {
            $stepOne = $this->getWordQueryInstance()->stepOne($search)->paginate(10);
            // pr::log('Step one triggered');
            return $stepOne;
        }
        // dd($this->getWordQueryInstance()->stepTwo($search)->toRawSql());
        if ($this->getWordQueryInstance()->stepTwo($search)->count()) {
            $stepTwo = $this->getWordQueryInstance()->stepTwo($search)->paginate(10);
            // pr::log('Step two triggered');
            return $stepTwo;
        }
        // dd($this->getWordQueryInstance()->stepThree($search)->toRawSql());
        $stepThree = $this->getWordQueryInstance()->stepThree($search)->paginate(10);
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
