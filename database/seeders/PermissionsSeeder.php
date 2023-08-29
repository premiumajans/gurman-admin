<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
class PermissionsSeeder extends Seeder
{
    public function run(): void
    {
        $permissions = [
            'about',
            'slider',
            'categories',
            'content',
            'languages',
            'settings',
            'users',
            'permissions',
            'report',
            'dodenv',
            'blog',
            'partner',
            'faq',
            'meta',
            'product',
            'gallery',
            'manufacturer'

        ];
        foreach ($permissions as $permission) {
            add_permission($permission);
        }
        $singlePermissions = [
            'contact index',
            'contact delete',
            'newsletter index',
            'newsletter create',
            'newsletter delete',
            'mail index',
            'mail delete',
        ];
        foreach ($singlePermissions as $single) {
            $permission = new \Spatie\Permission\Models\Permission();
            $permission->name = $single;
            $permission->guard_name = 'admin';
            $permission->save();
        }
    }
}
