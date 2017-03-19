<?php

namespace App\Repositories;

use App\Tweet;
use Illuminate\Database\Eloquent\Model;

class TweetRepository extends BaseRepository
{

    /**
     * Instance of model
     *
     * @var Model
     */
    protected $model = Tweet::class;


    /**
     * @param array $users
     */
    public function findByUsers(array $userIds)
    {
        return $this->model()->query()->whereIn('user_id', $userIds)->paginate();
    }

    public function getTimeline()
    {
        return auth()->user()->timeline_tweets;
    }

}