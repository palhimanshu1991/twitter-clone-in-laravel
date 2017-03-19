<?php

namespace App;

class Friend extends UserRelation
{
    /**
     * The attributes that are not mass assignable.
     *
     * @var array
     */
    protected $guarded = [
        'id'
    ];

    protected $table = 'user_relations';

}