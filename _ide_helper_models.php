<?php

// @formatter:off
// phpcs:ignoreFile
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Question> $questions
 * @property-read int|null $questions_count
 * @method static \Database\Factories\CategoryFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Category newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Category newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Category query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Category whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Category whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Category whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Category whereUpdatedAt($value)
 */
	class Category extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property int|null $category_id
 * @property string|null $question
 * @property string|null $answer
 * @property string|null $keywords
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Category|null $category
 * @method static \Database\Factories\QuestionFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Question newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Question newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Question query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Question whereAnswer($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Question whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Question whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Question whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Question whereKeywords($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Question whereQuestion($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Question whereUpdatedAt($value)
 */
	class Question extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @method static \Illuminate\Database\Eloquent\Builder<static>|QuranAyah newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|QuranAyah newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|QuranAyah query()
 */
	class QuranAyah extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @method static \Illuminate\Database\Eloquent\Builder<static>|QuranToken newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|QuranToken newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|QuranToken query()
 */
	class QuranToken extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @method static \Illuminate\Database\Eloquent\Builder<static>|QuranUthmaniToken newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|QuranUthmaniToken newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|QuranUthmaniToken query()
 */
	class QuranUthmaniToken extends \Eloquent {}
}

namespace App\Models{
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
 * @method static Builder<static>|Root search(string $search)
 * @property string|null $word_updated_at
 * @method static Builder<static>|Root whereWordUpdatedAt($value)
 * @mixin \Eloquent
 */
	class Root extends \Eloquent {}
}

namespace App\Models{
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
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\word> $word
 * @property-read int|null $word_count
 * @mixin \Eloquent
 */
	class Surah extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @method static \Database\Factories\UserFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class User extends \Eloquent {}
}

namespace App\Models{
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
	class Verse extends \Eloquent {}
}

namespace App\Models{
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
 * @property string|null $word_updated_at
 * @method static Builder<static>|Word whereWordUpdatedAt($value)
 * @mixin \Eloquent
 */
	class Word extends \Eloquent {}
}

