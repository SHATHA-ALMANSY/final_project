<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('categories')->insert(
            [
                'name' => 'TV & Audios',
                'slug' => 'tv-audios',
                'created_at'=>now(),

            ]
        );
        DB::table('categories')->insert(
            [
                'name' => 'Smart Phones',
                'slug' => 'smart-phones',
                'created_at'=>now(),

            ]
        );
        DB::table('categories')->insert(
            [
                'name' => 'Smart Television',
                'slug' => 'smart-television',
                'created_at'=>now(),
                'parent_id' => 1,

            ]
        );
    }
}
