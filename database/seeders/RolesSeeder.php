<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            [
                'id' => 1,
                'role_name' => 'Administrator',
            ],
            [
                'id' => 2,
                'role_name' => 'Cashier'
            ],
            [
                'id' => 3,
                'role_name' => 'Customer'
            ],
        ];

        DB::table('roles')->insert($roles);
    }
}
