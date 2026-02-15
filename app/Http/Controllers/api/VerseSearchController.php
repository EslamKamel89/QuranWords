<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Root;
use App\Models\Verse;
use Exception;
use Illuminate\Http\Request;

class VerseSearchController extends Controller {

    // public function __invoke(Request $request) {
    //     $query = Verse::query();
    //     $query
    //         ->select(['id', 'surah_id', 'verse_number', 'text'])
    //         ->with([
    //             'surah:id,name,total_verses',
    //             'words:id,root_id,verse_id,surah_id,word_tashkeel'
    //         ]);
    //     if (!$request->has('search')) {
    //         return $query->get();
    //     }
    //     $search = $request->get('search');
    //     // dd($query->search($search ?? '')->toRawSql());
    //     return $query->search($search)->get();
    // }
    public function __invoke(Request $request) {
        if (!$request->has('rootId')) {
            throw new Exception('rootId is not in the query paramaters');
        }
        $rootId = $request->get('rootId');
        $root = Root::where('id', $rootId)
            ->with(['words.verse.surah'])->first();
        $result = collect([]);
        $root->words->each(function ($word) use (&$result) {
            $result->push([...$word->verse->toArray(), 'word_id' => $word->id, 'root_id' => $word->root_id, 'word_tashkeel' => $word->word_tashkeel]);
        });
        return $result;
    }
}
