<?php

use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('Categories')->insert([
            'name' => 'BreakFast ',
            'description' => 'Type of BreakFast'
        ]);

        DB::table('Categories')->insert([
            'name' => 'Launch ',
            'description' => 'Type of Launch'
        ]);

        DB::table('Categories')->insert([
            'name' => 'Desert',
            'description' => 'Type of Desert'
        ]);

    }
}
