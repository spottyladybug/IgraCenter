<?php

use Illuminate\Database\Seeder;

class TeamsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Team::class, 4)->create()->each(function($t) {
            factory(App\User::class, 8)->states('player')->create()->each(function($u) use($t) {
                factory(App\TeamTable::class)->create([
                    'team_id' => $t->id,
                    'player_id' => $u->id,
                ]);
            });
        });
    }
}
