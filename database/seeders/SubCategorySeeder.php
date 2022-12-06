<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class SubCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sub_categories = [
            [
                'id'    => 1,
                'category_id'   => 1,
                'name' => 'Espresso Beverages'
            ],
            [
                'id'    => 2,
                'category_id'   => 1,
                'name' => 'Brewed Coffee',
            ],
            [
                'id'    => 3,
                'category_id'   => 1,
                'name' => 'Blended Beverages'
            ],
            [
                'id'    => 4,
                'category_id'   => 2,
                'name' => 'Bakery'
            ],
            [
                'id'    => 5,
                'category_id'   => 2,
                'name' => 'Sandwiches'
            ],
            [
                'id'    => 6,
                'category_id'   => 2,
                'name' => 'Cakes & Sweets'
            ],
        ];
        DB::table('sub_category')->insert($sub_categories);
    }
}
