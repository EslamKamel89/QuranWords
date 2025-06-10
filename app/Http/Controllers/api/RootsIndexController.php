<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Root;
use Illuminate\Http\Request;

class RootsIndexController extends Controller {
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request) {
        $roots = Root::select(['id', 'name'])
            ->latest()
            ->get();
        return $roots;
    }
}
