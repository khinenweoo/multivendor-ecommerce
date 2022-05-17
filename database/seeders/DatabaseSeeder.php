<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;



class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {         
        $this->call([
            UserSeeder::class,
            AdminSeeder::class,
            CategorySeeder::class,
            SellerSeeder::class,
        ]);
  
        \App\Models\User::factory(30)->create();      
        \App\Models\Brand::factory(30)->create();      
        \App\Models\Seller::factory(15)->create();    
        \App\Models\Shop::factory(15)->create();    

    }
}
