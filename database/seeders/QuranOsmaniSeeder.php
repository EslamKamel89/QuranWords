<?php

namespace Database\Seeders;

use App\Models\Verse;
use File;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class QuranOsmaniSeeder extends Seeder {
    /**
     * Run the database seeds.
     */
    public function run(): void {
        $json = File::get(database_path('seeders/data/quran_osmani.json'));
        $data = json_decode($json, true);
        foreach ($data as $item) {
            Verse::where('id', $item['id'])->update(['text' => $item['text_ar']]);
        }
    }
}
