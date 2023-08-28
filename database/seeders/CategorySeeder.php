<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\CategoryTranslation;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            ['az' => 'Kamar', 'en' => 'Kamar', 'ru' => 'Камар'],
            ['az' => 'Ostankino', 'en' => 'Ostankino', 'ru' => 'Останкино'],
            ['az' => 'Cherkizovo', 'en' => 'Cherkizovo', 'ru' => 'Черкизово'],
            ['az' => 'Cherkizovo Toyuq', 'en' => 'Cherkizovo Chicken', 'ru' => 'Черкизово Курица'],
            ['az' => 'Remit', 'en' => 'Remit', 'ru' => 'Ремит'],
            ['az' => 'Milch Farm', 'en' => 'Milch Farm', 'ru' => 'Милч Фарм'],
            ['az' => 'Lotte', 'en' => 'Lotte', 'ru' => 'Лотте'],
            ['az' => 'Torku', 'en' => 'Torku', 'ru' => 'Торку'],
        ];


        foreach ($categories as $category) {
            $newCategory = new Category();
            $newCategory->save();
            foreach (active_langs() as $lang) {
                $translation = new CategoryTranslation();
                $translation->locale = $lang->code;
                $translation->category_id = $newCategory->id;
                $translation->name = $category[$lang->code];
                $translation->save();
            }
        }
    }
}
