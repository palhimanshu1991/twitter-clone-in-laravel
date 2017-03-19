<?php

use Illuminate\Database\Seeder;

class ListMemberTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\UserList::chunk(100, function ($lists) {

            foreach ($lists as $list) {

                $memberIds = \App\User::inRandomOrder()->take(rand(5, 20))->pluck('id');

                foreach ($memberIds as $memberId) {

                    $list->members()->create([
                        'user_id' => $memberId
                    ]);
                }
            }
        });

    }
}
