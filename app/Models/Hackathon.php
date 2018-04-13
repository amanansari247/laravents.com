<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Scout\Searchable;

/**
 * App\Models\Hackathon
 *
 * @property int $id
 * @property int $user_id
 * @property bool $is_approved
 * @property string $title
 * @property string|null $website
 * @property string $description
 * @property string|null $deleted_at
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \App\Models\User $user
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Hackathon onlyTrashed()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Hackathon whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Hackathon whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Hackathon whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Hackathon whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Hackathon whereIsApproved($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Hackathon whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Hackathon whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Hackathon whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Hackathon whereWebsite($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Hackathon withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Hackathon withoutTrashed()
 * @mixin \Eloquent
 */
class Hackathon extends Model
{
    use Searchable, SoftDeletes;

    protected $guarded = [];

    protected $casts = [
        'is_approved' => 'boolean'
    ];

    /**
     * Get the indexable data array for the model.
     *
     * @return array
     */
    public function toSearchableArray()
    {
        $array = $this->toArray();

        // Customize array...

        return $array;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
