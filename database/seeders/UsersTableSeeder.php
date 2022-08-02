<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        User::create([
            'firstname' => 'rajib',
            'lastname' => 'admin',
            'username' => 'rajibadmin',
            'email' => 'rajibadmin@gmail.com',
            'password' => bcrypt('123456'),
            'role' => 'admin',
        ]);

        User::create([
            'firstname' => 'rajib',
            'lastname' => 'vendor',
            'username' => 'rajibvendor',
            'email' => 'rajibvendor@gmail.com',
            'password' => bcrypt('123456'),
            'role' => 'vendor',
            'is_vendor' => 1,
        ]);

        User::create([
            'firstname' => 'rajib',
            'lastname' => 'customer',
            'username' => 'rajibcustomer',
            'email' => 'rajibcustomer@gmail.com',
            'password' => bcrypt('123456'),
            'role' => 'customer',
        ]);
    }
}
