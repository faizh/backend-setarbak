<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class MenusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $menus = [
            [
                'name' => 'Caffè Latte',
                'description' => 'Rich, full-bodied espresso in steamed milk, lightly topped with foam. A caffè latte is simply a shot or two of bold, tasty espresso with fresh, sweet steamed milk over it.',
                'price' => 30000,
                'img_src' => 'https://www.starbucks.co.id/storage/image/temporary/summernote_image_1648177502.jpg',
                'category' => 1
            ],
            [
                'name' => 'Cappuccino',
                'description' => 'Espresso with steamed milk, topped with a deep layer of foam.',
                'price' => 25000,
                'img_src' => 'https://www.starbucks.co.id/storage/image/temporary/summernote_image_1648177603.jpg',
                'category' => 1
            ],
            [
                'name' => 'Caffè Mocha',
                'description' => 'Espresso with bittersweet mocha sauce and steamed milk, topped with sweetened whipped cream. Delightful.',
                'price' => 35000,
                'img_src' => 'https://www.starbucks.co.id/storage/image/temporary/summernote_image_1648177734.jpg',
                'category' => 1
            ],
            [
                'name' => 'Caramel Macchiato',
                'description' => 'Espresso combined with vanilla-flavoured syrup, milk and caramel sauce over ice. A Starbucks classic, chilled for a classic summer’s day. To our signature espresso we add a creamy mix of vanilla syrup and cold milk poured over ice; it’s then topped with our proprietary buttery caramel sauce. Sweet! ',
                'price' => 45000,
                'img_src' => 'https://www.starbucks.co.id/storage/image/temporary/summernote_image_1648177837.jpg',
                'category' => 1
            ],
            [
                'name' => 'Caffè Americano',
                'description' => 'HOT: Rich, full-bodied espresso with hot water.',
                'price' => 20000,
                'img_src' => 'https://www.starbucks.co.id/storage/image/temporary/summernote_image_1648177928.jpg',
                'category' => 1
            ],
            [
                'name' => 'Espresso Con Panna',
                'description' => 'The delicate dollop of whipped cream softens the rich and caramelly espresso flavours so exquisitely, you may choose to forego adding sugar altogether.',
                'price' => 30000,
                'img_src' => 'https://www.starbucks.co.id/storage/image/temporary/summernote_image_1648178043.jpg',
                'category' => 1
            ],
            [
                'name' => 'Espresso Macchiato',
                'description' => 'Sometimes a touch is just enough. And so it is with the slight dab of foam we set atop our signature espresso in this classic European-style beverage.',
                'price' => 30000,
                'img_src' => 'https://www.starbucks.co.id/storage/image/temporary/summernote_image_1648178152.jpg',
                'category' => 1
            ],
            [
                'name' => 'Caramel Frappuccino',
                'description' => 'Buttery caramel syrup meets coffee, milk and ice for a rendezvous in the blender. Then whipped cream and caramel sauce layer the love on top.',
                'price' => 40000,
                'img_src' => 'https://www.starbucks.co.id/storage/image/temporary/summernote_image_1648475750.jpg',
                'category' => 1
            ],
            [
                'name' => 'Dark Mocha Frappuccino',
                'description' => 'For serious chocolate lovers: We blend dark cocoa with milk, ice and coffee for an extraordinarily chocolatey experience thats then topped with a swirl of whipped cream.',
                'price' => 44000,
                'img_src' => 'https://www.starbucks.co.id/storage/image/temporary/summernote_image_1648477546.jpg',
                'category' => 1
            ],
            [
                'name' => 'Beef Sausage & Cheese Croissant ',
                'description' => 'This classic croissant is made with 100 percent butter to create a golden, crunchy top and soft, flaky layers inside.',
                'price' => 20000,
                'img_src' => 'https://www.starbucks.co.id/storage/image/temporary/summernote_image_1648614145.jpg',
                'category' => 2
            ],
            [
                'name' => 'Almond Croissant',
                'description' => 'Rich, almond flan enveloped in a croissant, then topped with sliced almonds. Its the perfect combination of sweet and savory.',
                'price' => 20000,
                'img_src' => 'https://www.starbucks.co.id/storage/image/temporary/summernote_image_1648614514.jpg',
                'category' => 2
            ],
            [
                'name' => 'Chocolate Croissant',
                'description' => 'Butter croissant dough is wrapped around two chocolate batons to create a perfect balance that will satisfy any sweet tooth.',
                'price' => 22000,
                'img_src' => 'https://www.starbucks.co.id/storage/image/temporary/summernote_image_1648614596.jpg',
                'category' => 2
            ],
            [
                'name' => 'Tuna Puff',
                'description' => 'Buttery flaky savory tuna puff pastry',
                'price' => 30000,
                'img_src' => 'https://www.starbucks.co.id/storage/image/temporary/summernote_image_1648615734.jpg',
                'category' => 2
            ],
            [
                'name' => 'Cheese Quiche',
                'description' => 'A classic twist of a Quiche Lorraine',
                'price' => 33000,
                'img_src' => 'https://www.starbucks.co.id/storage/image/temporary/summernote_image_1648632947.jpg',
                'category' => 2
            ],
            [
                'name' => 'New York Cheesecake',
                'description' => 'A staple at its best Cheesecake, New York style',
                'price' => 40000,
                'img_src' => 'https://www.starbucks.co.id/storage/image/temporary/summernote_image_1648702048.jpg',
                'category' => 2
            ],

        ];
        DB::table('menus')->insert($menus);
    }
}
