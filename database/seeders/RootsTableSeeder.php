<?php

namespace Database\Seeders;

use App\Models\Root;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RootsTableSeeder extends Seeder {
    public function run(): void {
        $roots = [
            ['origin_word' => 'كتب', 'name' => 'الكتابة والرسائل'],
            ['origin_word' => 'علم', 'name' => 'المعرفة والتعليم'],
            ['origin_word' => 'قرء', 'name' => 'القراءة والتلاوة'],
            ['origin_word' => 'سمى', 'name' => 'الذكر والدعاء'],
            ['origin_word' => 'صلّى', 'name' => 'العبادة والصلاة'],
            ['origin_word' => 'زكّى', 'name' => 'الطهارة والزكاة'],
            ['origin_word' => 'صوّم', 'name' => 'الصوم والعبادة'],
            ['origin_word' => 'حجّ', 'name' => 'زيارة البيت الحرام'],
            ['origin_word' => 'أمّن', 'name' => 'الإيمان والثقة'],
            ['origin_word' => 'فقه', 'name' => 'الفهم والفقه الديني'],
            ['origin_word' => 'دعى', 'name' => 'الندب والاستغاثة'],
            ['origin_word' => 'شكر', 'name' => 'التقدير والنعمة'],
            ['origin_word' => 'خاف', 'name' => 'التقوى والخشية'],
            ['origin_word' => 'توب', 'name' => 'العودة إلى الله'],
            ['origin_word' => 'ربّى', 'name' => 'التربية والتزكية'],
        ];

        foreach ($roots as $root) {
            Root::create([
                'origin_word' => $root['origin_word'],
                'name' => $root['name'],
            ]);
        }
    }
}
