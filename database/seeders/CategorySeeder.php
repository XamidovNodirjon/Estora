<?php

namespace Database\Seeders;

use App\Constants;
use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            Constants::APARTMENT_RENTERS,
            Constants::APARTMENT_SELLERS,
            Constants::HOME_LOT_SELLERS,
            Constants::COMMERCIAL_BUILDING_LESSORS,
            Constants::COMMERCIAL_BUILDING_SALESPEOPLE,
            Constants::EXCHANGE,
            Constants::MORTGAGE_LOAN,
            Constants::INSTALLMENT,
        ];

        foreach ($categories as $category) {
            Category::create(['name' => trim($category)]);
        }
    }
}
