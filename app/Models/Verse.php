<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * 
 *
 * @property int $id
 * @property int $surah_id
 * @property int $verse_number
 * @property string $text
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Surah $surah
 * @method static \Database\Factories\VerseFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Verse newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Verse newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Verse query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Verse whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Verse whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Verse whereSurahId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Verse whereText($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Verse whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Verse whereVerseNumber($value)
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\word> $word
 * @property-read int|null $word_count
 * @mixin \Eloquent
 */
class Verse extends Model {
    /** @use HasFactory<\Database\Factories\VerseFactory> */
    use HasFactory;
    protected $fillable = [
        'surah_id',
        'verse_number',
        'text'
    ];

    public function surah(): BelongsTo {
        return $this->belongsTo(Surah::class);
    }
    public function word(): HasMany {
        return $this->hasMany(Word::class);
    }
}
