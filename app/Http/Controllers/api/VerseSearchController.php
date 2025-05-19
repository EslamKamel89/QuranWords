<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Verse;
use Illuminate\Http\Request;

class VerseSearchController extends Controller {
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request) {
        $query = Verse::query();
        $query
            ->select(['id', 'surah_id', 'verse_number', 'text'])
            ->with([
                'surah:id,name,total_verses',
                'words:id,root_id,verse_id,surah_id,word_tashkeel'
            ]);
        if (!$request->has('search')) {
            return $query->get();
        }
        $search = $request->get('search');
        // dd($query->search($search ?? '')->toRawSql());
        return $query->search($search)->get();
    }
}
