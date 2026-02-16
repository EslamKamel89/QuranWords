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
                ->json(['data' => [], 'count' => 0, 'message' => 'Query is empty']);
        }
        $results = QuranUthmaniToken::with('ayah')
            ->where(function ($q) use ($query) {
                $q->where('token_uthmani', 'LIKE', "%{$query}%")
                    ->orWhere('token_uthmani_norm', 'LIKE', "%{$query}%")
                    ->orWhere('token_plain_norm', 'LIKE', "%{$query}%")
                    ->orWhere('root', 'LIKE', "%{$query}%");
            })->get();
        return response()->json(
            ['data' => $results, 'count' => $results->count(), 'message' => 'success']
        );
    }
}
