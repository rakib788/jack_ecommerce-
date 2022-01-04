<?php

namespace Database\Seeders;
use App\Models\User;

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       User::create( [
        'name' => 'Admin',
        'email' => 'admin@gmail.com' ,
        'password' => bcrypt('12345'),
        'status' =>1,
        'address' => 'Dhaka',
        'contactNumber' => '01679430909',
        'gender' => 'Male',
        'photo'=>'upload/babu.jpg',
        ] );
       User::create( [
        'name' => 'Rakib',
        'email' => 'rakib@gmail.com' ,
        'password' => bcrypt('12345'),
        'status' =>1,
        'address' => 'Dhaka',
        'contactNumber' => '01679430909',
        'gender' => 'Male',
        'photo'=>'upload/babu.jpg',
        ] );
    }
}
