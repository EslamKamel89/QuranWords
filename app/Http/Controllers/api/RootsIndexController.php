<?php

namespace App\Http\Controllers\Api;

use App\Helpers\pr;
use App\Http\Controllers\Controller;
use App\Models\Root;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Ramsey\Collection\Collection;

class RootsIndexController extends Controller {

    public function __invoke(Request $request) {
        $query = Root::query();
        $query
            ->select(['id', 'origin_word', 'name'])
            ->with([
                'words:id,root_id,verse_id,surah_id,word,word_tashkeel',
                'words.surah:id,name,type,total_verses',
                'words.verse:id,surah_id,verse_number,text',
            ]);
        if ($request->has('search')) {
            $search = $request->get('search') ?? '';
            $query->search($search);
        }
        $query =  $query->limit(10);
        $result = $query->get()->toArray();

        foreach ($result as $i => $root) {
            $result[$i]['words'] =
                collect($root['words'])->groupBy('word_tashkeel')->values()->map(
                    fn($arr) => $arr[0]
                );
        }
        return $result;
    }
}
