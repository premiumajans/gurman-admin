<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        $admin = Admin::create([
            'name' => 'Admin',
            'email' => 'admin@gurmanplyus.az',
            'password' => '$2y$10$hcn0QuYc5NOiKrjaNMGNIeITHW3bzJ6UeTVWWg/1ZaFQ8eXX1Incm' //Password
        ]);
        $seo = Admin::create([
            'name' => 'SEO',
            'email' => 'seo@gurmanplyus.az',
            'password' => '$2y$10$hcn0QuYc5NOiKrjaNMGNIeITHW3bzJ6UeTVWWg/1ZaFQ8eXX1Incm' //Password
        ]);
        $developer = Admin::create([
            'name' => 'Developer',
            'email' => 'developer@gurmanplyus.az',
            'password' => '$2y$10$hcn0QuYc5NOiKrjaNMGNIeITHW3bzJ6UeTVWWg/1ZaFQ8eXX1Incm' //Password
        ]);
        $admin->givePermissionTo(Permission::all());
        $seo->givePermissionTo(Permission::all());
        $developer->givePermissionTo(Permission::all());
    }
}
