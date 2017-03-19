<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserList extends Model
{
    /**
     * The table name for this model
     *
     * @var array
     */
    protected $table = 'lists';

    /**
     * The attributes that are not mass assignable.
     *
     * @var array
     */
    protected $guarded = [
        'id'
    ];

    /**
     * Return the count of members
     *
     * @return mixed
     */
    public function getMembersCountAttribute()
    {
        return $this->members()->count();
    }

    /**
     * Return the members of this list
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function members()
    {
        return $this->hasMany(ListMember::class, 'list_id');
    }

    /**
     * Return the count of subscribers
     *
     * @return mixed
     */
    public function getSubscribersCountAttribute()
    {
        return $this->subscribers()->count();
    }

    /**
     * Return the subscribers of this list
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function subscribers()
    {
        return $this->hasMany(ListSubscriber::class, 'list_id');
    }

}