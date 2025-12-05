<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::first() ?? User::factory()->create([
            'email' => 'test@example.com',
            'password' => bcrypt('password'),
        ]);

        for ($i = 0; $i < 50; $i++) {
            Product::create([
                'user_id'          => $user->id,
                'category_id'      => rand(1, 5),
                'subcategory_id'   => rand(1, 10),
                'client_id'        => null,
                'region_id'        => rand(1, 12),
                'city_id'          => rand(1, 50),

                'name'             => 'Random Product ' . Str::random(5),
                'price'            => rand(10000, 100000),
                'description'      => 'Random description ' . Str::random(20),
                'phone'            => '+9989' . rand(100000000, 999999999),

                'floor'            => rand(1, 9),
                'building_floor'   => rand(1, 15),
                'square'           => rand(30, 150),
                'rooms'            => rand(1, 5),
                'repair'           => 'evro remont',
                'sotix'            => rand(1, 10),
                
                'images'           => [],
                'status'           => true,
                'landmark'         => null,
                'exchange'         => false,
                'pay_in_installments' => false,
                'credit'           => false,
            ]);
        }
    }
}

