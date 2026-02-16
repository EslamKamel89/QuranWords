<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class QuranToken extends Model {
    public $timestamps = false;

    protected $fillable = [
        'quran_ayah_id',
        'old_ayah_id',
        'pos',
        'token',
        'root',
    ];
    public function ayah(): BelongsTo {
        return $this->belongsTo(QuranAyah::class, 'quran_ayah_id');
    }
}
