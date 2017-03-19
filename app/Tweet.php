<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tweet extends Model
{
    /**
     * The attributes that are not mass assignable.
     *
     * @var array
     */
    protected $guarded = [
        'id'
    ];

    /**
     * Return the owner/user of this tweet
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }


    public function entities()
    {
//        "entities":
//{
//    "hashtags":[],
//    "urls":[],
//    "user_mentions":[]
//}
    }

    public function getFavouriteCountAttribute()
    {
        return $this->favourites()->count();
    }

    /**
     * Return the users who favourited this tweet
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function favourites()
    {
        return $this->hasMany(Favourite::class);
    }

    public function getRetweetCountAttribute()
    {
        return $this->retweets()->count();
    }

    /**
     * Return the users who retweeted this tweet
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function retweets()
    {
        return $this->hasMany(Retweet::class);
    }

}