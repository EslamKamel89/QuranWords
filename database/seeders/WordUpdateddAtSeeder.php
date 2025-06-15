<?php

namespace Database\Seeders;

use App\Models\Root;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WordUpdateddAtSeeder extends Seeder {
    /**
     * Run the database seeds.
     */
    public function run(): void {
        $roots = Root::with(['words'])->get();
        $roots->each(function ($root) {
            $word =   $root->words->sortByDesc(
                fn($word) => $word->updated_at
            )->first();
            $root->update(['word_updated_at' => $word->updated_at]);
        });
    }
}
