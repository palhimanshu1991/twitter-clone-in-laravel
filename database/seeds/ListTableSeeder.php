<?php

use App\User;
use Illuminate\Database\Seeder;

class ListTableSeeder extends Seeder
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

                factory(\App\UserList::class, rand(1, 5))->create([
                    'user_id' => $user->id
                ]);
            }
        });
    }
}
