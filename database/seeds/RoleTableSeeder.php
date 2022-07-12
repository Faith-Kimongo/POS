<?php

use Illuminate\Database\Seeder;
use App\Role;
class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $is_exist = Role::all();

    if (!$is_exist->count()) {
        $role_student = new Role();
        $role_student->name = 'waiter';
        $role_student->description = 'Hotel Waiter';
        $role_student->save();

        $role_instructor = new Role();
        $role_instructor->name = 'kitchen';
        $role_instructor->description = 'Factory Itself';
        $role_instructor->save();

        $role_admin = new Role();
        $role_admin->name = 'Management';
        $role_admin->description = 'Hotel Management the dashboard';
        $role_admin->save();

        $role_admin = new Role();
        $role_admin->name = 'Super Admin';
        $role_admin->description = 'Register New Hotels';
        $role_admin->save();
    }
    }
}
