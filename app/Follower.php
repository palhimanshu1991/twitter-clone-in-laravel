<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Follower extends Model
{
    /**
     * The attributes that are not mass assignable.
     *
     * @var array
     */
    protected $guarded = [
        'id'
    ];

}