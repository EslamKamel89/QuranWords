<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * 
 *
 * @property int $id
 * @property string $name
 * @property string $name_en
 * @property string $type
 * @property int $total_verses
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Verse> $verses
 * @property-read int|null $verses_count
 * @method static \Database\Factories\SurahFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Surah newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Surah newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Surah query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Surah whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Surah whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Surah whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Surah whereNameEn($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Surah whereTotalVerses($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Surah whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Surah whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Surah extends Model {
    /** @use HasFactory<\Database\Factories\SurahFactory> */
    use HasFactory;
    protected $fillable = [
        'name',
        'name_en',
        'type',
        'total_verses'
    ];

    public function verses(): HasMany {
        return $this->hasMany(Verse::class);
    }
}
