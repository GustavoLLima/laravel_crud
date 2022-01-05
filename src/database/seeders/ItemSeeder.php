<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('items')->insert([
            'name' => 'Cool weapon',
            'superior' => 0,
            'eth' => 0,
            'description' => "This is a very cool weapon to have",
            'sockets' => 1,
            'type_id' => 3,
            'level_id' => 4,
        ]);

        DB::table('items')->insert([
            'name' => 'Cool armor',
            'superior' => 1,
            'eth' => 1,
            'description' => "This is a very cool armor to have",
            'sockets' => 0,
            'type_id' => 2,
            'level_id' => 1,
        ]);
    }
}
