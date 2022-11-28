<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $categories = [
            [
                'id'    => 1,
                'name' => 'Beverages',
            ],
            [
                'id'    => 2,
            'name' => 'Foods',
        ],
        [
            'id'    => 3,
            'name' => 'Others',
        ]];
        DB::table('menu_categories')->insert($categories);
    }
}
