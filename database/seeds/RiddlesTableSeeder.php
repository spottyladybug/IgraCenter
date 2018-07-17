<?php

use Illuminate\Database\Seeder;

class RiddlesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Riddle::class, 12)->create();
    }
}
