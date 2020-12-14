<?php

use App\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $userCreate = User::create([
            'name' => 'Laili Septiandi',
            'email' => 'lailiseptiandi2@gmail.com',
            'password' => bcrypt('123qweasd')
        ]);

        // assign  permission to role
        $role = Role::find(1);
        $permissions = Permission::all();

        $role->syncPermissions($permissions);

        // assign role with permission to user
        $user = User::find(1);
        $user->assignRole($role->name);


    }
}
