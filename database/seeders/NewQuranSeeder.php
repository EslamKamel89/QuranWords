<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NewQuranSeeder extends Seeder {
    /**
     * Seed the application's database.
     */
    public function run(): void {
        DB::transaction(function () {
            $ayahMap = $this->seedAyahs();
            $this->seedTokens($ayahMap);
            $this->seedUthmaniTokens($ayahMap);
        });
    }
    private function seedAyahs(): array {
        $path = database_path('seeders/data/ayah.json');
        $data = json_decode(file_get_contents($path), true);
        $map = [];
        $rows = [];
        foreach ($data as $row) {
            $rows[] = [
                'global_ayah' => $row['global_ayah'],
                'surah_no' => $row['surah_no'],
                'ayah_no' => $row['ayah_no'],
                'page' => $row['page'],
                'juz' => $row['juz'],
                'sajda' => (bool)$row['sajda'],
                'text_uthmani' => $row['text_uthmani'],
                'text_plain' => $row['text_plain'],
                'text_plain_norm' => $row['text_plain_norm'],
            ];
        }
        foreach (array_chunk($rows, 1000) as $chunk) {
            DB::table('quran_ayahs')->insert($chunk);
        }
        $ayahs = DB::table('quran_ayahs')
            ->select('id', 'surah_no', 'ayah_no')
            ->get();
        foreach ($ayahs as $ayah) {
            $map["{$ayah->surah_no}:{$ayah->ayah_no}"] = $ayah->id;
        }
        return $map;
    }
    private function seedTokens(array $map): void {
        $path = database_path('seeders/data/token.json');
        $data = json_decode(file_get_contents($path), true);
        $rows = [];
        foreach ($data as $row) {
            $rows[] = [
                'quran_ayah_id' => $map[$row['ayah_id']],
                'old_ayah_id' => $row['ayah_id'],
                'pos' => $row['pos'],
                'token' => $row['token'],
                'root' => $row['root'],
            ];
        }
        foreach (array_chunk($rows, 1000) as $chunk) {
            DB::table('quran_tokens')->insert($chunk);
        }
    }
    private function seedUthmaniTokens(array $map): void {
        $path = database_path('seeders/data/token_uthmani.json');
        $data = json_decode(file_get_contents($path), true);
        $rows = [];
        foreach ($data as $row) {
            $rows[] = [
                'quran_ayah_id' => $map[$row['ayah_id']],
                'old_ayah_id' => $row['ayah_id'],
                'pos' => $row['pos'],
                'token_uthmani' => $row['token_uthmani'],
                'token_uthmani_norm' => $row['token_uthmani_norm'],
                'token_plain_norm' => $row['token_plain_norm'],
                'root' => $row['root'],
                'align_tag' => $row['align_tag'],
            ];
        }
        foreach (array_chunk($rows, 1000) as $chunk) {
            DB::table('quran_uthmani_tokens')->insert($chunk);
        }
    }
}
