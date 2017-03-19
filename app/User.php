<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Return the followers_count for this user
     *
     * @return mixed
     */
    public function getFollowersCountAttribute()
    {
        return $this->followers()->count();
    }

    /**
     * Return the followers of the user
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function followers()
    {
        // relations where the user_id = friend_id
        // in all those relation user ie being followed
        return $this->belongsToMany(User::class, 'user_relations', 'friend_id', 'follower_id');
    }

    /**
     * Return the friends_count for this user
     *
     * @return mixed
     */
    public function getFriendsCountAttribute()
    {
        return $this->friends()->count();
    }

    /**
     * Return the friends aka followings of the user
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function friends()
    {
        // relations where the user_id = follower_id
        // in all those relations user is following some other user
        return $this->belongsToMany(User::class, 'user_relations', 'follower_id', 'friend_id');
    }

    /**
     * Return the favourites_count for this user
     *
     * @return mixed
     */
    public function getFavouritesCountAttribute()
    {
        return $this->favourites()->count();
    }

    /**
     * Return the tweets favourited by the user
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function favourites()
    {
        // relations where the user_id = follower_id
        // in all those relations user is following some other user
        return $this->belongsToMany(Tweet::class, 'favourites');
    }

    /**
     * Return the lists_count for this user
     *
     * @return mixed
     */
    public function getListsCountAttribute()
    {
        return $this->lists()->count();
    }

    /**
     * Return the lists created by the user
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function lists()
    {
        return $this->hasMany(UserList::class);
    }

    /**
     * @return mixed
     */
    public function getNewFriendRequests()
    {
        return $this->friends()->where('is_approved', 1);
    }

    public function getTimelineTweetsAttribute()
    {
        $tweetsTable = $this->tweets()->getQuery()->getModel()->getTable();

        return Tweet::query()->join('user_relations', 'friend_id', '=', 'user_id')->select('tweets.*')->where('is_approved', 1)->where('follower_id', $this->id)->get();
    }

    /**
     * Return the tweets of this user
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function tweets()
    {
        return $this->hasMany(Tweet::class);
    }

    public function getUsernameAttribute()
    {
        return "@{$this->screen_name}";
    }

    public function getProfileLinkAttribute()
    {
        return route('users.show', $this->screen_name);
    }
}
