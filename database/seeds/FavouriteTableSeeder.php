<?php

use Illuminate\Database\Seeder;

class FavouriteTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\User::chunk(100, function ($users) {

            foreach ($users as $user) {

                $tweets = \App\Tweet::inRandomOrder()->take(rand(10, 20))->get();

                foreach ($tweets as $tweet) {
                    
                    $user->favourites()->create([
                        'user_id'  => $user->id,
                        'tweet_id' => $tweet->id
                    ]);
                }
            }
        });

    }
}
