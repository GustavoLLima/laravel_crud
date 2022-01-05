<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('levels')->insert([
            'name' => 'White',
        ]);
        DB::table('levels')->insert([
            'name' => 'Blue',
        ]);
        DB::table('levels')->insert([
            'name' => 'Yellow',
        ]);
        DB::table('levels')->insert([
            'name' => 'Green',
        ]);
    }
}
