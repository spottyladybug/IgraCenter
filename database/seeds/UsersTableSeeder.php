<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // factory(App\User::class, 32)->states('player')->create();
        // factory(App\User::class, 12)->states('moderator')->create();
        factory(App\User::class, 1)->states('administrator')->create();
    }
}
