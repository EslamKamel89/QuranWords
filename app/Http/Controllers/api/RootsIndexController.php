<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Root;
use Illuminate\Http\Request;

class RootsIndexController extends Controller {

    public function __invoke(Request $request) {
        $query = Root::query();
        $query->with([
            'words:id,root_id,verse_id,surah_id,word,word_tashkeel',
            'words.surah:id,name,type,total_verses',
            'words.verse:id,surah_id,verse_number,text',
        ]);
        if ($request->has('query')) {
            // todo: filtering stuff
        }
        $query =  $query->limit(50);
        return $query->get();
    }
}
