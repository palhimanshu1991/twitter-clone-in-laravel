<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserTableSeeder::class);
        $this->call(UserRelationTableSeeder::class);

        $this->call(TweetTableSeeder::class);
        $this->call(RetweetTableSeeder::class);
        $this->call(FavouriteTableSeeder::class);

        $this->call(ListTableSeeder::class);
        $this->call(ListMemberTableSeeder::class);
        $this->call(ListSubscriberTableSeeder::class);
    }
}
