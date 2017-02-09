<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Create new User with name - Admin
        $admin = new User();
        $admin->name = 'Admin';
        $admin->email = 'admin@admin.com';
        $admin->password = bcrypt('123456');
        /**Get the ID of ROLE - Admin*/
        $role_admin = Role::where('name', 'Admin')->first();
        $admin->role_id = $role_admin->id;
        $admin->save();


        /**
         * Create new User with name - Agent
         */
        $client = new User();
        $client->name = 'Test Client';
        $client->email = 'client@client.com';
        $client->password = bcrypt('123456');
        /**Get the ID of ROLE - Client*/
        $role_client = Role::where('name', 'Client')->first();
        $client->role_id = $role_client->id;
        $client->save();
    }
}
