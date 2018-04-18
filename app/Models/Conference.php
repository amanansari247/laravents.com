<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Laravel\Scout\Searchable;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

/**
 * App\Models\Conference
 *
 * @property int $id
 * @property int $user_id
 * @property bool $is_approved
 * @property string $title
 * @property string|null $website
 * @property string|null $ticket_url
 * @property string $description
 * @property string|null $deleted_at
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \App\Models\User $user
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Conference onlyTrashed()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Conference whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Conference whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Conference whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Conference whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Conference whereIsApproved($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Conference whereTicketUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Conference whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Conference whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Conference whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Conference whereWebsite($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Conference withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Conference withoutTrashed()
 * @mixin \Eloquent
 * @property string|null $slug
 * @property string|null $header_image
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Conference whereHeaderImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Conference whereSlug($value)
 * @property string|null $lat
 * @property string|null $lon
 * @property string|null $address
 * @property string|null $country
 * @property string|null $city
 * @property string|null $state
 * @property string $start_date
 * @property string $end_date
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Conference whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Conference whereCity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Conference whereCountry($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Conference whereEndDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Conference whereLat($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Conference whereLon($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Conference whereStartDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Conference whereState($value)
 */
class Conference extends Model
{
    use Searchable, SoftDeletes, Notifiable, HasSlug;

    /**
     * @var array
     */
    protected $guarded = [];

    /**
     * Get the options for generating the slug.
     */
    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('title')
            ->saveSlugsTo('slug');
    }

    protected $with = [
        'user'
    ];

    /**
     * @var array
     */
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
