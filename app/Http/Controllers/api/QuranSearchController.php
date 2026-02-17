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
        $results = QuranUthmaniToken
            ::select(['id', 'quran_ayah_id', 'old_ayah_id', 'token_uthmani', 'root'])
            ->with('ayah:id,global_ayah,surah_no,ayah_no,page,juz,sajda,text_uthmani')
            ->where(function ($q) use ($query) {
                $q->where('token_uthmani', 'LIKE', "%{$query}%")
                    ->orWhere('token_uthmani_norm', 'LIKE', "%{$query}%")
                    ->orWhere('token_plain_norm', 'LIKE', "%{$query}%")
                    ->orWhere('root', 'LIKE', "%{$query}%");
            })->get();
        return response()->json(
            $results
        );
    }
}
