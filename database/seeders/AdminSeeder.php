<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Admin;
use Illuminate\Support\Str;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Admin::create([
            'name' => 'Admin Khine',
            'email' => 'devkhinenweoo@gmail.com',
            'email_verified_at' => now(),
            'password' =>\Hash::make('admin1234'),
            'remember_token' => Str::random(10),
            'role' => 'superuser',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        Admin::create([
            'name' => 'Admin Super User',
            'email' => 'superuser@aeg.com',
            'email_verified_at' => now(),
            'password' =>\Hash::make('superuser1234'),
            'remember_token' => Str::random(10),
            'role' => 'superuser',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        Admin::create([
            'name' => 'Admin Super User',
            'email' => 'admin@demo.com',
            'email_verified_at' => now(),
            'password' =>\Hash::make('adminsecret'),
            'remember_token' => Str::random(10),
            'role' => 'superuser',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
