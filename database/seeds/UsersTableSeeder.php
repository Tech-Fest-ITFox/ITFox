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


        $user_admin = new User();
        $user_admin->name = 'Admin Adminov';
        $user_admin->email = 'admin@adminov.admin';
        $user_admin->password = bcrypt('adminbatko');
        $user_admin->save();
        $user_admin->roles()->attach(3);

    }
}
