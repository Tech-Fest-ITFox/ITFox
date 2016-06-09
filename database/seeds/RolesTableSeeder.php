<?php

use Illuminate\Database\Seeder;
use App\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $student = new Role();
        $student->role = 'Student';
        $student->save();

        $teacher = new Role();
        $teacher->role = 'Teacher';
        $teacher->save();

        $admin = new Role();
        $admin->role = 'Admin';
        $admin->save();
    }
}
