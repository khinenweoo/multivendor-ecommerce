<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
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
        User::create([
            'name' => 'Sharr Thet Zaw',
            'last_name'=> 'lastname',
            'email' => 'sharrthetzaw@gmail.com',
            'email_verified_at' => now(),
            'password' =>\Hash::make('usersecret'),
            'remember_token' => Str::random(10),
            'created_at' => now(),
            'updated_at' => now()
        ]);
        User::create([
            'name' => 'Khine Nwe',
            'last_name'=> 'Oo',
            'email' => 'devkhinenweoo@gmail.com',
            'email_verified_at' => now(),
            'password' =>\Hash::make('usersecret'),
            'remember_token' => Str::random(10),
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
