<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class QuranAyah extends Model {
    public $timestamps = false;
    protected $fillable = [
        'global_ayah',
        'surah_no',
        'ayah_no',
        'page',
        'juz',
        'sajda',
        'text_uthmani',
        'text_plain',
        'text_plain_norm',
    ];
    protected $casts = [
        'sajda' => 'boolean',
    ];

    public function tokens(): HasMany {
        return $this->hasMany(QuranToken::class, 'quran_ayah_id');
    }
    public function uthmaniTokens(): HasMany {
        return $this->hasMany(QuranUthmaniToken::class, 'quran_ayah_id');
    }
    public function reference(): string {
        return "{$this->surah_no}:{$this->ayah_no}";
    }
}
