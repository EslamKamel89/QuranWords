<?php

namespace Database\Seeders;

use App\Models\Surah;
use App\Models\Verse;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class QuranSeeder extends Seeder {
    /**
     * Run the database seeds.
     */
    public function run(): void {
        $json = File::get(database_path('seeders/data/quran.json'));

        $data = json_decode($json, true);

        foreach ($data as $item) {
            $surah = Surah::create([
                'id' => $item['id'],
                'name' => $item['name'],
                'name_en' => $item['transliteration'],
                'type' => $item['type'],
                'total_verses' => $item['total_verses'],
            ]);

            foreach ($item['verses'] as $verse) {
                Verse::create([
                    'surah_id' => $surah->id,
                    'verse_number' => $verse['id'],
                    'text' => $verse['text'],
                ]);
            }
        }
    }
}
