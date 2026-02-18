<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class QuranUthmaniToken extends Model {
    public $timestamps = false;
    protected $fillable = [
        'quran_ayah_id',
        'old_ayah_id',
        'pos',
        'token_uthmani',
        'token_uthmani_norm',
        'token_plain_norm',
        'token_simple',
        'root',
        'align_tag',
    ];
    public function ayah(): BelongsTo {
        return $this->belongsTo(QuranAyah::class, 'quran_ayah_id');
    }
}
