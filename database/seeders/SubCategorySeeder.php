<?php

namespace Database\Seeders;

use App\Constants;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
     public function run(): void
    {
        $map = [
            Constants::APARTMENT_SELLERS => [
                Constants::NEW_APARTMENT,
                Constants::OLD_APARTMENT
            ],
            Constants::APARTMENT_RENTERS => [
                Constants::NEW_APARTMENT,
                Constants::OLD_APARTMENT
            ],
            Constants::HOME_LOT_SELLERS => [
                Constants::UNDER_DEMOLITION,
                Constants::FOR_HOME,
                Constants::BOX,
                Constants::EURO_HOUSE,
                Constants::UNDER_LDC_AND_TOWNSHIPS
            ],
            Constants::COMMERCIAL_BUILDING_SALESPEOPLE => [
                Constants::OFFICE_BUILDINGS,
                Constants::WAREHOUSES_INDUSTRIAL_ZONES,
                Constants::BUILDING,
                Constants::CATERING_BUILDING,
                Constants::PRIVATE_PROPERTY,
            ],
            Constants::COMMERCIAL_BUILDING_LESSORS => [
                Constants::OFFICE_BUILDINGS,
                Constants::WAREHOUSES_INDUSTRIAL_ZONES,
                Constants::BUILDING,
                Constants::CATERING_BUILDING,
                Constants::PRIVATE_PROPERTY,
            ]
        ];
        foreach ($map as $categoryName => $subcategories) {
            $category = Category::where('name', trim($categoryName))->first();
            if ($category) {
                foreach ($subcategories as $sub) {
                    SubCategory::create([
                        'name' => trim($sub),
                        'category_id' => $category->id,
                    ]);
                }
            }
        }
    }
}
