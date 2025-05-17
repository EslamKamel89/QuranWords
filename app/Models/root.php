<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 *
 *
 * @property int $id
 * @property string $origin_word
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\word> $words
 * @property-read int|null $words_count
 * @method static \Database\Factories\rootFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|root newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|root newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|root query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|root whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|root whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|root whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|root whereOriginWord($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|root whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Root extends Model {
    /** @use HasFactory<\Database\Factories\RootFactory> */
    use HasFactory;
    protected $fillable = [
        'origin_word',
        'name',
    ];
    public function words(): HasMany {
        return $this->hasMany(Word::class);
    }
    public function scopeSearch(Builder $query, string $search) {
        $query->where('origin_word', 'LIKE', "%{$search}%");
        $query->orWhere('name', 'LIKE', "%{$search}%");
        $query->orWhereHas('words', function (Builder $q) use ($search) {
            $q->where('word', 'LIKE', "%{$search}%");
            $q->orWhere('word_tashkeel', 'LIKE', "%{$search}%");
        });
    }
}
