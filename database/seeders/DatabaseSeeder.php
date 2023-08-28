<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            LanguageSeeder::class,
            PermissionsSeeder::class,
            AdminSeeder::class,
            SettingSeeder::class,
            CategorySeeder::class,
        ]);
    }
}
