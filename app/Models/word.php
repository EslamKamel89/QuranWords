<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 *
 *
 * @property int $id
 * @property int $root_id
 * @property int|null $verse_id
 * @property int|null $surah_id
 * @property string $word
 * @property string $word_tashkeel
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Root $Root
 * @property-read \App\Models\Surah|null $surah
 * @property-read \App\Models\Verse|null $verse
 * @method static \Database\Factories\wordFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|word newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|word newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|word query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|word whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|word whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|word whereRootId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|word whereSurahId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|word whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|word whereVerseId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|word whereWord($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|word whereWordTashkeel($value)
 * @property-read \App\Models\root $root
 * @method static Builder<static>|Word search(string $search)
 * @method static Builder<static>|Word stepOne(string $search)
 * @method static Builder<static>|Word stepThree(string $search)
 * @method static Builder<static>|Word stepTwo(string $search)
 * @mixin \Eloquent
 */
class Word extends Model {
    /** @use HasFactory<\Database\Factories\WordFactory> */
    use HasFactory;
    protected $fillable = [
        'root_id',
        'verse_id',
        'surah_id',
        'word',
        'word_tashkeel',
    ];
    public function root(): BelongsTo {
        return $this->belongsTo(Root::class);
    }
    public function verse(): BelongsTo {
        return $this->belongsTo(\App\Models\Verse::class);
    }
    public function surah(): BelongsTo {
        return $this->belongsTo(\App\Models\Surah::class);
    }
    public function scopeSearch(Builder $query, string $search) {
        $query->where('word', 'LIKE', "%{$search}%");
        $query->orWhere('word_tashkeel', 'LIKE', "%{$search}%");
    }
    public function scopeStepOne(Builder $query, string $search) {
        $query->Where('word_tashkeel', 'LIKE', "%{$search}%");
    }
    public function scopeStepTwo(Builder $query, string $search) {
        $query->where('word', 'LIKE', "%{$search}%");
    }
    public function scopeStepThree(Builder $query, string $search) {
        $query->whereHas('root', function (Builder $q) use ($search) {
            $q->where('origin_word', 'LIKE', "%{$search}%");
            $q->orWhere('name', 'LIKE', "%{$search}%");
        });
    }
}
