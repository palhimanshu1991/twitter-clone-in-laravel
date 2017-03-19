<?php

namespace App\Tasks\Timeline;

use App\Repositories\TweetRepository;
use App\Tasks\BaseTask;
use App\User;


class GetTimelineTweets extends BaseTask
{


    public function __construct()
    {

    }


    public function handle(TweetRepository $tweets)
    {

        $tweets->getModel()->join('user_relations', 'friend_id', '=', 'user_id')->select('tweets.*')->where('is_approved', 1)->where('follower_id', $this->id)->get();

    }

    /**
     * Retur
     *
     * @return User
     */
    private function user()
    {
        return auth()->user();
    }

}