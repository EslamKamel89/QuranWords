<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\QuranUthmaniToken;

class QuranSearchController extends Controller {
    public function search(Request $request) {
        $query = $request->get('q');
        if (!$query) {
            return response()
                ->json([]);
        }
        $root = QuranUthmaniToken::where(function ($q) use ($query) {
            $q->where('token_uthmani',  $query)
                ->orWhere('token_uthmani_norm',  $query)
                ->orWhere('token_plain_norm',  $query)
                ->orWhere('token_simple',  $query)
                ->orWhere('root',  $query);
        })->limit(1)
            ->first();
        if (!$root) {
            return response()
                ->json([]);
        }
        $results = QuranUthmaniToken
            ::select(['id', 'quran_ayah_id', 'old_ayah_id', 'token_uthmani', 'token_simple', 'root'])
            ->with('ayah:id,global_ayah,surah_no,ayah_no,page,juz,sajda,text_uthmani')
            ->where('root', $root->root)->get();
        return response()->json(
            $results
        );
    }
}
