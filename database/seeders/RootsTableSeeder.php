<?php

namespace Database\Seeders;

use App\Models\Root;
use App\Models\Surah;
use App\Models\Verse;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RootsTableSeeder extends Seeder {
    public function run(): void {
        $roots = [
            [
                'origin_word' => 'كتب',
                'name' => 'الكتابة والرسائل',
                'words' => [
                    ['word' => 'كتاب', 'word_tashkeel' => 'كِتَاب'],
                    ['word' => 'كتب', 'word_tashkeel' => 'كَتَبَ'],
                    ['word' => 'كاتب', 'word_tashkeel' => 'كَاتِب'],
                    ['word' => 'مكتب', 'word_tashkeel' => 'مَكْتَب'],
                    ['word' => 'مكتب', 'word_tashkeel' => 'مَكْتَب'],
                    ['word' => 'مكتب', 'word_tashkeel' => 'مَكْتَب'],
                    ['word' => 'مكتب', 'word_tashkeel' => 'مَكْتَب'],
                ],
            ],
            [
                'origin_word' => 'علم',
                'name' => 'المعرفة والتعليم',
                'words' => [
                    ['word' => 'علم', 'word_tashkeel' => 'عَلِمَ'],
                    ['word' => 'عالم', 'word_tashkeel' => 'عَالِم'],
                    ['word' => 'عالم', 'word_tashkeel' => 'عَالِم'],
                    ['word' => 'عالم', 'word_tashkeel' => 'عَالِم'],
                    ['word' => 'عالم', 'word_tashkeel' => 'عَالِم'],
                    ['word' => 'تعليم', 'word_tashkeel' => 'تَعْلِيم'],
                ],
            ],
            [
                'origin_word' => 'قرء',
                'name' => 'التلاوة والقراءة',
                'words' => [
                    ['word' => 'قران', 'word_tashkeel' => 'قُرْآن'],
                    ['word' => 'قرأ', 'word_tashkeel' => 'قَرَأَ'],
                    ['word' => 'قرأ', 'word_tashkeel' => 'قَرَأَ'],
                    ['word' => 'قرأ', 'word_tashkeel' => 'قَرَأَ'],
                    ['word' => 'قرأ', 'word_tashkeel' => 'قَرَأَ'],
                    ['word' => 'قارئ', 'word_tashkeel' => 'قَارِئ'],
                ],
            ],
            [
                'origin_word' => 'سمى',
                'name' => 'الذكر والاستدعاء',
                'words' => [
                    ['word' => 'اسم', 'word_tashkeel' => 'اسْمٌ'],
                    ['word' => 'دعا', 'word_tashkeel' => 'دَعَا'],
                    ['word' => 'دعا', 'word_tashkeel' => 'دَعَا'],
                    ['word' => 'دعا', 'word_tashkeel' => 'دَعَا'],
                    ['word' => 'دعا', 'word_tashkeel' => 'دَعَا'],
                    ['word' => 'دعاء', 'word_tashkeel' => 'دُعَاء'],
                ],
            ],
            [
                'origin_word' => 'صلّى',
                'name' => 'العبادة والصلاة',
                'words' => [
                    ['word' => 'صلاة', 'word_tashkeel' => 'صَلَاة'],
                    ['word' => 'مساجد', 'word_tashkeel' => 'مَسَاجِد'],
                    ['word' => 'مساجد', 'word_tashkeel' => 'مَسَاجِد'],
                    ['word' => 'مساجد', 'word_tashkeel' => 'مَسَاجِد'],
                    ['word' => 'مساجد', 'word_tashkeel' => 'مَسَاجِد'],
                    ['word' => 'راكع', 'word_tashkeel' => 'رَاكِع'],
                ],
            ],
            [
                'origin_word' => 'زكّى',
                'name' => 'الطهارة والزكاة',
                'words' => [
                    ['word' => 'زكاة', 'word_tashkeel' => 'زَكَاة'],
                    ['word' => 'طهور', 'word_tashkeel' => 'طُهُور'],
                    ['word' => 'طهور', 'word_tashkeel' => 'طُهُور'],
                    ['word' => 'طهور', 'word_tashkeel' => 'طُهُور'],
                    ['word' => 'طهور', 'word_tashkeel' => 'طُهُور'],
                    ['word' => 'طاهر', 'word_tashkeel' => 'طَاهِر'],
                ],
            ],
            [
                'origin_word' => 'صوّم',
                'name' => 'الصوم والعبادة',
                'words' => [
                    ['word' => 'صيام', 'word_tashkeel' => 'صِيَام'],
                    ['word' => 'صائم', 'word_tashkeel' => 'صَائِم'],
                    ['word' => 'صائم', 'word_tashkeel' => 'صَائِم'],
                    ['word' => 'صائم', 'word_tashkeel' => 'صَائِم'],
                    ['word' => 'صائم', 'word_tashkeel' => 'صَائِم'],
                    ['word' => 'رمضان', 'word_tashkeel' => 'رَمَضَان'],
                ],
            ],
            [
                'origin_word' => 'حجّ',
                'name' => 'زيارة البيت الحرام',
                'words' => [
                    ['word' => 'حج', 'word_tashkeel' => 'حَجَّ'],
                    ['word' => 'حاج', 'word_tashkeel' => 'حَاجٌ'],
                    ['word' => 'حاج', 'word_tashkeel' => 'حَاجٌ'],
                    ['word' => 'حاج', 'word_tashkeel' => 'حَاجٌ'],
                    ['word' => 'حاج', 'word_tashkeel' => 'حَاجٌ'],
                    ['word' => 'معتمر', 'word_tashkeel' => 'مُعْتَمِر'],
                ],
            ],
            [
                'origin_word' => 'أمّن',
                'name' => 'الإيمان والثقة',
                'words' => [
                    ['word' => 'ايمان', 'word_tashkeel' => 'إِيمَان'],
                    ['word' => 'مؤمن', 'word_tashkeel' => 'مُؤْمِن'],
                    ['word' => 'مؤمن', 'word_tashkeel' => 'مُؤْمِن'],
                    ['word' => 'مؤمن', 'word_tashkeel' => 'مُؤْمِن'],
                    ['word' => 'مؤمن', 'word_tashkeel' => 'مُؤْمِن'],
                    ['word' => 'توكل', 'word_tashkeel' => 'تَوَكُّل'],
                ],
            ],
            [
                'origin_word' => 'فقه',
                'name' => 'الفهم والفقه الديني',
                'words' => [
                    ['word' => 'فقه', 'word_tashkeel' => 'فَقْه'],
                    ['word' => 'فقهاء', 'word_tashkeel' => 'فُقَهَاء'],
                    ['word' => 'فقهاء', 'word_tashkeel' => 'فُقَهَاء'],
                    ['word' => 'فقهاء', 'word_tashkeel' => 'فُقَهَاء'],
                    ['word' => 'فقهاء', 'word_tashkeel' => 'فُقَهَاء'],
                    ['word' => 'فتوى', 'word_tashkeel' => 'فَتْوَى'],
                ],
            ],
            [
                'origin_word' => 'ربى',
                'name' => 'التربية والتزكية',
                'words' => [
                    ['word' => 'تربي', 'word_tashkeel' => 'تَرْبِيَة'],
                    ['word' => 'مربي', 'word_tashkeel' => 'مُرَبِّي'],
                    ['word' => 'مربي', 'word_tashkeel' => 'مُرَبِّي'],
                    ['word' => 'مربي', 'word_tashkeel' => 'مُرَبِّي'],
                    ['word' => 'مربي', 'word_tashkeel' => 'مُرَبِّي'],
                    ['word' => 'تزكي', 'word_tashkeel' => 'تَزْكِيَة'],
                ],
            ],
            [
                'origin_word' => 'شكر',
                'name' => 'الامتنان والنعمة',
                'words' => [
                    ['word' => 'شكر', 'word_tashkeel' => 'شُكْر'],
                    ['word' => 'شاكر', 'word_tashkeel' => 'شَاكِر'],
                    ['word' => 'شاكر', 'word_tashkeel' => 'شَاكِر'],
                    ['word' => 'شاكر', 'word_tashkeel' => 'شَاكِر'],
                    ['word' => 'شاكر', 'word_tashkeel' => 'شَاكِر'],
                    ['word' => 'حمد', 'word_tashkeel' => 'حَمْد'],
                ],
            ],
            [
                'origin_word' => 'خاف',
                'name' => 'التقوى والخشية',
                'words' => [
                    ['word' => 'خوف', 'word_tashkeel' => 'خَوْف'],
                    ['word' => 'خائف', 'word_tashkeel' => 'خَائِف'],
                    ['word' => 'خائف', 'word_tashkeel' => 'خَائِف'],
                    ['word' => 'خائف', 'word_tashkeel' => 'خَائِف'],
                    ['word' => 'خائف', 'word_tashkeel' => 'خَائِف'],
                    ['word' => 'متقي', 'word_tashkeel' => 'مُتَّقِي'],
                ],
            ],
            [
                'origin_word' => 'توب',
                'name' => 'الندم والعودة إلى الله',
                'words' => [
                    ['word' => 'توبة', 'word_tashkeel' => 'تَوْبَة'],
                    ['word' => 'توبة', 'word_tashkeel' => 'تَوْبَة'],
                    ['word' => 'توبة', 'word_tashkeel' => 'تَوْبَة'],
                    ['word' => 'توبة', 'word_tashkeel' => 'تَوْبَة'],
                    ['word' => 'تائب', 'word_tashkeel' => 'تَائِب'],
                    ['word' => 'استغفر', 'word_tashkeel' => 'اسْتَغْفَرَ'],
                ],
            ],
            [
                'origin_word' => 'دعى',
                'name' => 'الندب والاستغاثة',
                'words' => [
                    ['word' => 'دعاء', 'word_tashkeel' => 'دُعَاء'],
                    ['word' => 'دعاء', 'word_tashkeel' => 'دُعَاء'],
                    ['word' => 'دعاء', 'word_tashkeel' => 'دُعَاء'],
                    ['word' => 'دعاء', 'word_tashkeel' => 'دُعَاء'],
                    ['word' => 'داعي', 'word_tashkeel' => 'دَاعِي'],
                    ['word' => 'ادع', 'word_tashkeel' => 'ٱدْعُ'],
                ],
            ],
            [
                'origin_word' => 'سمى',
                'name' => 'الذكر والدعاء',
                'words' => [
                    ['word' => 'اسم', 'word_tashkeel' => 'ٱسْم'],
                    ['word' => 'اذكار', 'word_tashkeel' => 'أَذْكَار'],
                    ['word' => 'اذكار', 'word_tashkeel' => 'أَذْكَار'],
                    ['word' => 'اذكار', 'word_tashkeel' => 'أَذْكَار'],
                    ['word' => 'اذكار', 'word_tashkeel' => 'أَذْكَار'],
                    ['word' => 'تسبيح', 'word_tashkeel' => 'تَسْبِيح'],
                ],
            ],
            [
                'origin_word' => 'ركع',
                'name' => 'العبادة والركوع',
                'words' => [
                    ['word' => 'ركوع', 'word_tashkeel' => 'رُكُوع'],
                    ['word' => 'سجود', 'word_tashkeel' => 'سُجُود'],
                    ['word' => '礼拜', 'word_tashkeel' => 'صَلَاة'],
                ],
            ],
            [
                'origin_word' => 'سمع',
                'name' => 'السماع والانتباه',
                'words' => [
                    ['word' => 'سمع', 'word_tashkeel' => 'سَمِعَ'],
                    ['word' => 'سامع', 'word_tashkeel' => 'سَامِع'],
                    ['word' => 'سامع', 'word_tashkeel' => 'سَامِع'],
                    ['word' => 'سامع', 'word_tashkeel' => 'سَامِع'],
                    ['word' => 'سامع', 'word_tashkeel' => 'سَامِع'],
                    ['word' => 'استمع', 'word_tashkeel' => 'اِسْتَمَعَ'],
                ],
            ],
            [
                'origin_word' => 'مشى',
                'name' => 'الحركة والسعي',
                'words' => [
                    ['word' => 'مشي', 'word_tashkeel' => 'مَشْي'],
                    ['word' => 'سار', 'word_tashkeel' => 'سَارَ'],
                    ['word' => 'سار', 'word_tashkeel' => 'سَارَ'],
                    ['word' => 'سار', 'word_tashkeel' => 'سَارَ'],
                    ['word' => 'سار', 'word_tashkeel' => 'سَارَ'],
                    ['word' => 'مشى', 'word_tashkeel' => 'مَشَى'],
                ],
            ],
            [
                'origin_word' => 'نظر',
                'name' => 'الرؤية والتأمل',
                'words' => [
                    ['word' => 'نظر', 'word_tashkeel' => 'نَظَر'],
                    ['word' => 'ناظر', 'word_tashkeel' => 'نَاظِر'],
                    ['word' => 'ناظر', 'word_tashkeel' => 'نَاظِر'],
                    ['word' => 'ناظر', 'word_tashkeel' => 'نَاظِر'],
                    ['word' => 'ناظر', 'word_tashkeel' => 'نَاظِر'],
                    ['word' => 'تفكر', 'word_tashkeel' => 'تَفَكُّر'],
                ],
            ],
            [
                'origin_word' => 'علم',
                'name' => 'المعرفة والتعليم',
                'words' => [
                    ['word' => 'تعلم', 'word_tashkeel' => 'تَعَلُّم'],
                    ['word' => 'طالب', 'word_tashkeel' => 'طَالِب'],
                    ['word' => 'طالب', 'word_tashkeel' => 'طَالِب'],
                    ['word' => 'طالب', 'word_tashkeel' => 'طَالِب'],
                    ['word' => 'طالب', 'word_tashkeel' => 'طَالِب'],
                    ['word' => 'مدرس', 'word_tashkeel' => 'مُدَرِّس'],
                ],
            ],
            [
                'origin_word' => 'ركب',
                'name' => 'الركوب والسفر',
                'words' => [
                    ['word' => 'مركبة', 'word_tashkeel' => 'مَرْكَبَة'],
                    ['word' => 'راكب', 'word_tashkeel' => 'رَاكِب'],
                    ['word' => 'راكب', 'word_tashkeel' => 'رَاكِب'],
                    ['word' => 'راكب', 'word_tashkeel' => 'رَاكِب'],
                    ['word' => 'راكب', 'word_tashkeel' => 'رَاكِب'],
                    ['word' => 'سفر', 'word_tashkeel' => 'سَفَر'],
                ],
            ],
            [
                'origin_word' => 'ركض',
                'name' => 'الجري والنشاط',
                'words' => [
                    ['word' => 'ركض', 'word_tashkeel' => 'رَكَضَ'],
                    ['word' => 'جرى', 'word_tashkeel' => 'جَرَى'],
                    ['word' => 'جرى', 'word_tashkeel' => 'جَرَى'],
                    ['word' => 'جرى', 'word_tashkeel' => 'جَرَى'],
                    ['word' => 'جرى', 'word_tashkeel' => 'جَرَى'],
                    ['word' => 'عدو', 'word_tashkeel' => 'عَدَوَ'],
                ],
            ],
            [
                'origin_word' => 'ركع',
                'name' => 'العبادة والركوع',
                'words' => [
                    ['word' => 'ركوع', 'word_tashkeel' => 'رُكُوع'],
                    ['word' => 'سجدة', 'word_tashkeel' => 'سَجْدَة'],
                    ['word' => 'سجدة', 'word_tashkeel' => 'سَجْدَة'],
                    ['word' => 'سجدة', 'word_tashkeel' => 'سَجْدَة'],
                    ['word' => 'سجدة', 'word_tashkeel' => 'سَجْدَة'],
                    ['word' => 'ركعتين', 'word_tashkeel' => 'رَكْعَتَيْن'],
                ],
            ],
            [
                'origin_word' => 'زرع',
                'name' => 'الزراعة والعمل',
                'words' => [
                    ['word' => 'زراعة', 'word_tashkeel' => 'زِرَاعَة'],
                    ['word' => 'زراعة', 'word_tashkeel' => 'زِرَاعَة'],
                    ['word' => 'زراعة', 'word_tashkeel' => 'زِرَاعَة'],
                    ['word' => 'زارع', 'word_tashkeel' => 'زَارِع'],
                    ['word' => 'محصول', 'word_tashkeel' => 'مَحْصُول'],
                ],
            ],
            [
                'origin_word' => 'شرب',
                'name' => 'الشرب والطعام',
                'words' => [
                    ['word' => 'شرب', 'word_tashkeel' => 'شَرِبَ'],
                    ['word' => 'شارب', 'word_tashkeel' => 'شَارِب'],
                    ['word' => 'شارب', 'word_tashkeel' => 'شَارِب'],
                    ['word' => 'شارب', 'word_tashkeel' => 'شَارِب'],
                    ['word' => 'شارب', 'word_tashkeel' => 'شَارِب'],
                    ['word' => 'ماء', 'word_tashkeel' => 'مَاء'],
                ],
            ],
            [
                'origin_word' => 'أكل',
                'name' => 'الطعام والشراب',
                'words' => [
                    ['word' => 'طعام', 'word_tashkeel' => 'طَعَام'],
                    ['word' => 'فاكهة', 'word_tashkeel' => 'فَاكِهَة'],
                    ['word' => 'فاكهة', 'word_tashkeel' => 'فَاكِهَة'],
                    ['word' => 'فاكهة', 'word_tashkeel' => 'فَاكِهَة'],
                    ['word' => 'فاكهة', 'word_tashkeel' => 'فَاكِهَة'],
                    ['word' => 'خبز', 'word_tashkeel' => 'خُبْز'],
                ],
            ],
            [
                'origin_word' => 'ركب',
                'name' => 'الركوب والسفر',
                'words' => [
                    ['word' => 'عربة', 'word_tashkeel' => 'عَرَبِيَّة'],
                    ['word' => 'عربة', 'word_tashkeel' => 'عَرَبِيَّة'],
                    ['word' => 'عربة', 'word_tashkeel' => 'عَرَبِيَّة'],
                    ['word' => 'عربة', 'word_tashkeel' => 'عَرَبِيَّة'],
                    ['word' => 'سيارة', 'word_tashkeel' => 'سَيَّارَة'],
                    ['word' => 'دراجة', 'word_tashkeel' => 'دَرَّاجَة'],
                ],
            ],
            [
                'origin_word' => 'ركض',
                'name' => 'الجري والنشاط',
                'words' => [
                    ['word' => 'عدو', 'word_tashkeel' => 'عَدْو'],
                    ['word' => 'ركض', 'word_tashkeel' => 'رَكْض'],
                    ['word' => 'ركض', 'word_tashkeel' => 'رَكْض'],
                    ['word' => 'ركض', 'word_tashkeel' => 'رَكْض'],
                    ['word' => '走', 'word_tashkeel' => 'مَشَى'],
                ],
            ],
            [
                'origin_word' => 'نطق',
                'name' => 'الكلام والتعبير',
                'words' => [
                    ['word' => 'قول', 'word_tashkeel' => 'قَوْل'],
                    ['word' => 'تكلم', 'word_tashkeel' => 'تَكَلَّمَ'],
                    ['word' => 'خطب', 'word_tashkeel' => 'خَطَبَ'],
                ],
            ],
            [
                'origin_word' => 'مشى',
                'name' => 'الحركة والسعي',
                'words' => [
                    ['word' => 'مشي', 'word_tashkeel' => 'مَشَى'],
                    ['word' => 'سيرة', 'word_tashkeel' => 'سِيرَة'],
                    ['word' => 'سيرة', 'word_tashkeel' => 'سِيرَة'],
                    ['word' => 'سيرة', 'word_tashkeel' => 'سِيرَة'],
                    ['word' => 'سيرة', 'word_tashkeel' => 'سِيرَة'],
                    ['word' => 'مشوار', 'word_tashkeel' => 'مَشْوَار'],
                ],
            ],
            [
                'origin_word' => 'ركب',
                'name' => 'الركوب والقيادة',
                'words' => [
                    ['word' => 'ركوب', 'word_tashkeel' => 'رُكُوب'],
                    ['word' => 'ركوب', 'word_tashkeel' => 'رُكُوب'],
                    ['word' => 'ركوب', 'word_tashkeel' => 'رُكُوب'],
                    ['word' => 'قيادة', 'word_tashkeel' => 'قِيَادَة'],
                    ['word' => 'مقود', 'word_tashkeel' => 'مَقُود'],
                ],
            ],
            [
                'origin_word' => 'كتب',
                'name' => 'الكتابة والقراءة',
                'words' => [
                    ['word' => 'كتاب', 'word_tashkeel' => 'كِتَاب'],
                    ['word' => 'كتب', 'word_tashkeel' => 'كَتَبَ'],
                    ['word' => 'كاتبة', 'word_tashkeel' => 'كَاتِبَة'],
                    ['word' => 'كاتبة', 'word_tashkeel' => 'كَاتِبَة'],
                    ['word' => 'كاتبة', 'word_tashkeel' => 'كَاتِبَة'],
                    ['word' => 'كاتبة', 'word_tashkeel' => 'كَاتِبَة'],
                ],
            ],
            [
                'origin_word' => 'فعل',
                'name' => 'العمل والأفعال',
                'words' => [
                    ['word' => 'فعل', 'word_tashkeel' => 'فَعَلَ'],
                    ['word' => 'فاعل', 'word_tashkeel' => 'فَاعِل'],
                    ['word' => 'فاعل', 'word_tashkeel' => 'فَاعِل'],
                    ['word' => 'فاعل', 'word_tashkeel' => 'فَاعِل'],
                    ['word' => 'فاعل', 'word_tashkeel' => 'فَاعِل'],
                    ['word' => 'فعلة', 'word_tashkeel' => 'فَعْلَة'],
                ],
            ],
            [
                'origin_word' => 'خلق',
                'name' => 'الخلق والصفات',
                'words' => [
                    ['word' => 'خلق', 'word_tashkeel' => 'خَلَقَ'],
                    ['word' => 'خلق', 'word_tashkeel' => 'خَلَقَ'],
                    ['word' => 'خلق', 'word_tashkeel' => 'خَلَقَ'],
                    ['word' => 'خلق', 'word_tashkeel' => 'خَلَقَ'],
                    ['word' => 'خلاق', 'word_tashkeel' => 'خُلُق'],
                    ['word' => 'خلق', 'word_tashkeel' => 'خَلْق'],
                ],
            ],
            [
                'origin_word' => 'صنع',
                'name' => 'الصناعة والعمل',
                'words' => [
                    ['word' => 'صنع', 'word_tashkeel' => 'صَنَعَ'],
                    ['word' => 'صنع', 'word_tashkeel' => 'صَنَعَ'],
                    ['word' => 'صنع', 'word_tashkeel' => 'صَنَعَ'],
                    ['word' => 'صنع', 'word_tashkeel' => 'صَنَعَ'],
                    ['word' => 'صانع', 'word_tashkeel' => 'صَانِع'],
                    ['word' => 'صنعة', 'word_tashkeel' => 'صِنْعَة'],
                ],
            ],
            [
                'origin_word' => 'علم',
                'name' => 'المعرفة والدراسة',
                'words' => [
                    ['word' => 'علوم', 'word_tashkeel' => 'عُلُوم'],
                    ['word' => 'علوم', 'word_tashkeel' => 'عُلُوم'],
                    ['word' => 'علوم', 'word_tashkeel' => 'عُلُوم'],
                    ['word' => 'علوم', 'word_tashkeel' => 'عُلُوم'],
                    ['word' => 'علوم', 'word_tashkeel' => 'عُلُوم'],
                    ['word' => 'علوم', 'word_tashkeel' => 'عُلُوم'],
                    ['word' => 'طالب', 'word_tashkeel' => 'طَالِب'],
                    ['word' => 'بحث', 'word_tashkeel' => 'بَحْث'],
                ],
            ],
            [
                'origin_word' => 'طلب',
                'name' => 'الطلبات والرغبات',
                'words' => [
                    ['word' => 'طلب', 'word_tashkeel' => 'طَلَبَ'],
                    ['word' => 'طلب', 'word_tashkeel' => 'طَلَبَ'],
                    ['word' => 'طلب', 'word_tashkeel' => 'طَلَبَ'],
                    ['word' => 'طلب', 'word_tashkeel' => 'طَلَبَ'],
                    ['word' => 'طلب', 'word_tashkeel' => 'طَلَبَ'],
                    ['word' => 'طالب', 'word_tashkeel' => 'طَالِب'],
                    ['word' => 'طلبية', 'word_tashkeel' => 'طَلَبِيَّة'],
                ],
            ],
            [
                'origin_word' => 'سعى',
                'name' => 'الجهد والسعي',
                'words' => [
                    ['word' => 'سعي', 'word_tashkeel' => 'سَعْي'],
                    ['word' => 'ساعي', 'word_tashkeel' => 'سَاعٍ'],
                    ['word' => 'مسعى', 'word_tashkeel' => 'مَسْعًى'],
                ],
            ],
        ];

        foreach ($roots as $rootData) {
            $root = \App\Models\Root::create([
                'origin_word' => $rootData['origin_word'],
                'name' => $rootData['name'],
            ]);

            foreach ($rootData['words'] as $wordData) {
                $surah = Surah::inRandomOrder()->get()->first();
                $verse = Verse::where('surah_id', $surah->id)->inRandomOrder()->get()->first();
                $wordData['surah_id'] = $surah->id;
                $wordData['verse_id'] = $verse->id;
                $root->words()->create($wordData);
            }
        }
    }
}
