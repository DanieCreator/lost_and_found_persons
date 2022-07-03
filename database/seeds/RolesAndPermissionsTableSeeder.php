<?php

use App\Role;
use App\Permission;
use Illuminate\Database\Seeder;

class RolesAndPermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [

            //Stations permissions

            'view-all-stations-page',
            'view-create-station-page',
            'create-station',
            'view-single-station-page',
            'view-edit-station-page',
            'update-station',
            'delete-station',

            //Roles Permissions

            'view-all-roles-page',
            'view-create-role-page',
            'create-role',
            'view-edit-role-page',
            'update-role',
            'delete-role',

            //Officers Permissions

            'view-all-officers-page',
            'view-create-officer-page',
            'create-officer',
            'view-edit-officer-page',
            'update-officer',
            'delete-officer',

            //Permissions Permissions

            'view-all-permissions-page',
        ];

        //Create all system permissions
        foreach ($permissions as $permission) {
            Permission::create([
                'title' => $permission
            ]);
        }

        //Create admin role and grant all permissions
        $role = Role::firstOrCreate(
            ['title' =>  'admin'],
            ['description' => 'The uttermost rol of the system, with this, you can call the sharks on everything']
        );

        $role->permissions()->attach(Permission::pluck('id')->toArray());
    }
}
