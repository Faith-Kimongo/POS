<?php

use Illuminate\Database\Seeder;
// use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        DB::table('users')->insert([
            'name' => "Koech Charles",
            'email' => 'c.koech@tribus-tsg.com',
            'role_id'=>4,
            'phone'=>'0721397357',
            'password' => Hash::make('12345678'),
        ]);


        DB::table('users')->insert([
            'name' => "Smart Waiter",
            'email' => 'info@smartwaiter.com',
            'role_id'=>'3',
            'phone'=>'0721397358',
            'added_by'=>1,
            'password' => Hash::make('12345678'),
        ]);


        DB::table('users')->insert([
            'name' => "Waiter Chef",
            'email' => 'waiter@smartwaiter.com',
            'role_id'=>'1',
            'added_by'=>'2',
            'branch_id'=>'1',
            'phone'=>'0721397359',
            'password' => Hash::make('12345678'),
        ]);
    }
}
