<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Laravel\Scout\Searchable;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

/**
 * App\Models\Meetup
 *
 * @property int $id
 * @property int $user_id
 * @property bool $is_approved
 * @property string $title
 * @property string|null $website
 * @property string|null $meetup_url
 * @property string $description
 * @property string|null $deleted_at
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \App\Models\User $user
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Meetup onlyTrashed()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Meetup whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Meetup whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Meetup whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Meetup whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Meetup whereIsApproved($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Meetup whereMeetupUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Meetup whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Meetup whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Meetup whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Meetup whereWebsite($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Meetup withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Meetup withoutTrashed()
 * @mixin \Eloquent
 * @property string|null $slug
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Meetup whereSlug($value)
 * @property string|null $header_image
 * @property string|null $lat
 * @property string|null $lon
 * @property string|null $address
 * @property string|null $country
 * @property string|null $city
 * @property string|null $state
 * @property string $start_date
 * @property string $end_date
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Meetup whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Meetup whereCity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Meetup whereCountry($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Meetup whereEndDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Meetup whereHeaderImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Meetup whereLat($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Meetup whereLon($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Meetup whereStartDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Meetup whereState($value)
 */
class Meetup extends Model
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
