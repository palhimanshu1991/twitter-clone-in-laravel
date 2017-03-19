<?php

use App\Tweet;
use Illuminate\Database\Seeder;

class RetweetTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Tweet::chunk(100, function ($tweets) {

            foreach ($tweets as $tweet) {


            }
        });
    }
}
