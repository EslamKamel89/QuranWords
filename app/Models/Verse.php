<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
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
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Word> $words
 * @property-read int|null $words_count
 * @method static Builder<static>|Verse search(string $search)
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
    public function words(): HasMany {
        return $this->hasMany(Word::class);
    }
    public function scopeSearch(Builder $query,  string $search) {
        $query->whereHas('words', function (Builder $q) use ($search) {
            $q->where('word_tashkeel', 'LIKE', "%{$search}%");
        });
    }
}
