<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Seller;
use Illuminate\Support\Str;
class SellerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Seller::create([
            'name' => 'Demo Vendor',
            'username' => 'Demo Seller',
            'role' => 'owner',
            'email' => 'vendor@demo.com',
            'email_verified_at' => now(),
            'password' =>\Hash::make('vendorsecret'),
            'remember_token' => Str::random(10),
            'nrc_number' => '12/MaGaTa(N)34989536',
            'nrc_front' => 'NRC_nrc_front.jpg',
            'nrc_back' => 'NRC_nrc_back.jpg',
            'mobile' => '093254234',
            'viber_no' => '09346728',
            'approved' => true,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        Seller::create([
            'name' => 'Capital Seller',
            'username' => 'Capital',
            'role' => 'owner',
            'email' => 'seller@demo.com',
            'email_verified_at' => now(),
            'password' =>\Hash::make('vendorsecret'),
            'remember_token' => Str::random(10),
            'nrc_number' => '12/MaGaTa(N)34989536',
            'nrc_front' => 'NRC_nrc_front.jpg',
            'nrc_back' => 'NRC_nrc_back.jpg',
            'mobile' => '0934563255',
            'viber_no' => '09593574',
            'approved' => true,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        Seller::create([
            'name' => 'City Mart',
            'username' => 'City Mart Retailer',
            'role' => 'owner',
            'email' => 'seller2@demo.com',
            'email_verified_at' => now(),
            'password' =>\Hash::make('vendorsecret'),
            'remember_token' => Str::random(10),
            'nrc_number' => '12/MaGaTa(N)34989536',
            'nrc_front' => 'NRC_nrc_front.jpg',
            'nrc_back' => 'NRC_nrc_back.jpg',
            'mobile' => '09321303',
            'viber_no' => '095453794',
            'approved' => true,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        Seller::create([
            'name' => 'Century Mart',
            'role' => 'retailer',
            'email' => 'seller3@demo.com',
            'email_verified_at' => now(),
            'password' =>\Hash::make('vendorsecret'),
            'remember_token' => Str::random(10),
            'nrc_number' => '12/MaGaTa(N)34989536',
            'nrc_front' => 'NRC_nrc_front.jpg',
            'nrc_back' => 'NRC_nrc_back.jpg',
            'mobile' => '093254234',
            'viber_no' => '09346728',
            'approved' => true,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        Seller::create([
            'name' => 'Capital Mart',
            'role' => 'retailer',
            'email' => 'seller4@demo.com',
            'email_verified_at' => now(),
            'password' =>\Hash::make('vendorsecret'),
            'remember_token' => Str::random(10),
            'nrc_number' => '12/MaGaTa(N)34989536',
            'nrc_front' => 'NRC_nrc_front.jpg',
            'nrc_back' => 'NRC_nrc_back.jpg',
            'mobile' => '093204696',
            'viber_no' => '093432509',
            'approved' => true,
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
