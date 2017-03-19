<?php

use App\User;
use Illuminate\Database\Seeder;

class TweetTableSeeder extends Seeder
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

                factory(\App\Tweet::class, rand(0, 10))->create([
                    'user_id' => $user->id
                ]);
            }
        });
    }
}
