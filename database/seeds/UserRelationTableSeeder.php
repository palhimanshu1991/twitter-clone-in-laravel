<?php

use App\User;
use Illuminate\Database\Seeder;

class UserRelationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::chunk(100, function ($users) {

            foreach ($users as $user) {

                $randomUserIds = User::inRandomOrder()->take(rand(0, 10))->pluck('id');

                foreach ($randomUserIds as $followerId) {

                    \App\UserRelation::create([
                        'friend_id'   => $user->id,
                        'follower_id' => $followerId
                    ]);
                }
            }
        });
    }
}
