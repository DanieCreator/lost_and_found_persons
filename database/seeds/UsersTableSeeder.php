<?php

use App\Role;
use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $role = Role::firstOrCreate(
            ['title' =>  'admin'],
            ['description' => 'The uttermost rol of the system, with this, you can call the sharks on everything']
        );

        factory(User::class)->create([
            'name' =>'Super Admin',
            'email' => 'admin@gmail.com',
            'phone_number' => '+254700000000',
            'national_identification_number' => '00000000',
            'role_id' => $role
        ]);
    }
}
