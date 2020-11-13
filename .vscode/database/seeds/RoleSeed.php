<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = Role::create(['name' => 'administrator']);
        $role->givePermissionTo(['users_manage','create_project']);

        $role = Role::create(['name' => '3dcontent']);
        $role->givePermissionTo('create_project');
    }
}
