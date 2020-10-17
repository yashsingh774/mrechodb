<?php

use App\Enums\UserRole;
use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'first_name'     => 'Super',
            'last_name'      => 'Admin',
            'username'       => 'admin',
            'email'          => 'admin@example.com',
            'phone'          => '+911234567890',
            'address'        => 'Indore, Madhya Pradesh, India',
            'roles'          => UserRole::ADMIN,
            'password'       => bcrypt('123456'),
            'remember_token' => Str::random(10),
        ]);

        User::create([
            'first_name'     => 'Customer',
            'last_name'      => 'First',
            'username'       => 'customer',
            'email'          => 'customer@example.com',
            'phone'          => '+911234567890',
            'address'        => 'Indore, Madhya Pradesh, India',
            'roles'          => UserRole::CUSTOMER,
            'password'       => bcrypt('123456'),
            'remember_token' => Str::random(10),
        ]);

        User::create([
            'first_name'     => 'Shop',
            'last_name'      => 'First',
            'username'       => 'shop',
            'email'          => 'shop@example.com',
            'phone'          => '+911234567890',
            'address'        => 'Indore, Madhya Pradesh, India',
            'roles'          => UserRole::SHOPOWNER,
            'password'       => bcrypt('123456'),
            'remember_token' => Str::random(10),
        ]);
    }
}
