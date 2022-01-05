<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('types')->insert([
            'name' => 'Ring',
        ]);
        DB::table('types')->insert([
            'name' => 'Armor',
        ]);
        DB::table('types')->insert([
            'name' => 'Weapon',
        ]);
        DB::table('types')->insert([
            'name' => 'Helmet',
        ]);
        DB::table('types')->insert([
            'name' => 'Amulet',
        ]);
    }
}
