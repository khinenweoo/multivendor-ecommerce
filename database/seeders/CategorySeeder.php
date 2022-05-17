<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Category::create([
            'name' => ($name = 'Groceries'),
            'slug' => Str::slug($name),
            'category_image' => 'default_image.png',
        ]);
        Category::create([
            'name' => ($name = 'Beauty & Personal Care'),
            'slug' => Str::slug($name),
            'category_image' => 'default_image.png',
        ]);
        Category::create([
            'name' => ($name = 'Electronics'),
            'slug' => Str::slug($name),
            'category_image' => 'default_image.png',
        ]);
        Category::create([
            'name' => ($name = 'Handmade Crafts & Gifts'),
            'slug' => Str::slug($name),
            'category_image' => 'default_image.png',
        ]);
        Category::create([
            'name' => ($name = 'Home Appliances'),
            'slug' => Str::slug($name),
            'category_image' => 'default_image.png',
        ]);


        Category::create([
            'parent_id' => '2',
            'name' => ($name = 'Bath & Shower'),
            'slug' => Str::slug($name),
            'category_image' => 'default_image.png',
        ]);
        Category::create([
            'parent_id' => '2',
            'name' => ($name = 'Body Care'),
            'slug' => Str::slug($name),
            'category_image' => 'default_image.png',
        ]);
        Category::create([
            'parent_id' => '2',
            'name' => ($name = 'Perfumes'),
            'slug' => Str::slug($name),
            'category_image' => 'default_image.png',
        ]);
        Category::create([
            'parent_id' => '2',
            'name' => ($name = 'Hair Care'),
            'slug' => Str::slug($name),
            'category_image' => 'default_image.png',
        ]);
        Category::create([
            'parent_id' => '2',
            'name' => ($name = 'Makeup & Cosmetics'),
            'slug' => Str::slug($name),
            'category_image' => 'default_image.png',
        ]);
        Category::create([
            'parent_id' => '2',
            'name' => ($name = 'Skin care products'),
            'slug' => Str::slug($name),
            'category_image' => 'default_image.png',
        ]);
        Category::create([
            'parent_id' => '2',
            'name' => ($name = 'Feminine & Hygeine'),
            'slug' => Str::slug($name),
            'category_image' => 'default_image.png',
        ]);
        Category::create([
            'parent_id' => '1',
            'name' => ($name = 'Snacks & Sweets'),
            'slug' => Str::slug($name),
            'category_image' => 'default_image.png',
        ]);
        Category::create([
            'parent_id' => '1',
            'name' => ($name = 'Fresh & Frozen Food'),
            'slug' => Str::slug($name),
            'category_image' => 'default_image.png',
        ]);
        Category::create([
            'parent_id' => '1',
            'name' => ($name = 'Beverages'),
            'slug' => Str::slug($name),
            'category_image' => 'default_image.png',
        ]);

        Category::create([
            'parent_id' => '6',
            'name' => ($name = 'Liquid Soap'),
            'slug' => Str::slug($name),
            'category_image' => 'default_image.png',
        ]);
        Category::create([
            'parent_id' => '6',
            'name' => ($name = 'Bar Soap'),
            'slug' => Str::slug($name),
            'category_image' => 'default_image.png',
        ]);
        Category::create([
            'parent_id' => '6',
            'name' => ($name = 'Shower Accessories'),
            'slug' => Str::slug($name),
            'category_image' => 'default_image.png',
        ]);


        Category::create([
            'parent_id' => '7',
            'name' => ($name = 'Body Moisturizer'),
            'slug' => Str::slug($name),
            'category_image' => 'default_image.png',
        ]);
        Category::create([
            'parent_id' => '7',
            'name' => ($name = 'Body Treatment'),
            'slug' => Str::slug($name),
            'category_image' => 'default_image.png',
        ]);
        Category::create([
            'parent_id' => '7',
            'name' => ($name = 'Hair Removal'),
            'slug' => Str::slug($name),
            'category_image' => 'default_image.png',
        ]);
        Category::create([
            'parent_id' => '7',
            'name' => ($name = 'Hand Care'),
            'slug' => Str::slug($name),
            'category_image' => 'default_image.png',
        ]);
        Category::create([
            'parent_id' => '7',
            'name' => ($name = 'Foot Care'),
            'slug' => Str::slug($name),
            'category_image' => 'default_image.png',
        ]);
        Category::create([
            'parent_id' => '13',
            'name' => ($name = 'Oatmeals'),
            'slug' => Str::slug($name),
            'category_image' => 'default_image.png',
        ]);
        Category::create([
            'parent_id' => '13',
            'name' => ($name = 'Biscuit'),
            'slug' => Str::slug($name),
            'category_image' => 'default_image.png',
        ]);
        Category::create([
            'parent_id' => '13',
            'name' => ($name = 'Chocalates'),
            'slug' => Str::slug($name),
            'category_image' => 'default_image.png',
        ]);
        Category::create([
            'parent_id' => '14',
            'name' => ($name = 'Dairy & Chilled'),
            'slug' => Str::slug($name),
            'category_image' => 'default_image.png',
        ]);
        Category::create([
            'parent_id' => '15',
            'name' => ($name = 'Wines & Beers'),
            'slug' => Str::slug($name),
            'category_image' => 'default_image.png',
        ]);
        Category::create([
            'parent_id' => '15',
            'name' => ($name = 'Fruit Drinks'),
            'slug' => Str::slug($name),
            'category_image' => 'default_image.png',
        ]);
        Category::create([
            'parent_id' => '3',
            'name' => ($name = 'Photography'),
            'slug' => Str::slug($name),
            'category_image' => 'default_image.png',
        ]);
        Category::create([
            'parent_id' => '3',
            'name' => ($name = 'Projectors & Screens'),
            'slug' => Str::slug($name),
            'category_image' => 'default_image.png',
        ]);
        Category::create([
            'parent_id' => '3',
            'name' => ($name = 'Smart Phones'),
            'slug' => Str::slug($name),
            'category_image' => 'default_image.png',
        ]);
        Category::create([
            'parent_id' => '3',
            'name' => ($name = 'Monitors'),
            'slug' => Str::slug($name),
            'category_image' => 'default_image.png',
        ]);
        Category::create([
            'parent_id' => '3',
            'name' => ($name = 'Laptops'),
            'slug' => Str::slug($name),
            'category_image' => 'default_image.png',
        ]);
        Category::create([
            'parent_id' => '3',
            'name' => ($name = 'Headphones & Speaker'),
            'slug' => Str::slug($name),
            'category_image' => 'default_image.png',
        ]);
        Category::create([
            'parent_id' => '3',
            'name' => ($name = 'Gaming Laptop'),
            'slug' => Str::slug($name),
            'category_image' => 'default_image.png',
        ]);
        Category::create([
            'parent_id' => '3',
            'name' => ($name = 'Power & Lighting'),
            'slug' => Str::slug($name),
            'category_image' => 'default_image.png',
        ]);
        Category::create([
            'parent_id' => '30',
            'name' => ($name = 'Digital Cameras'),
            'slug' => Str::slug($name),
            'category_image' => 'default_image.png',
        ]);
        Category::create([
            'parent_id' => '30',
            'name' => ($name = 'Tripod'),
            'slug' => Str::slug($name),
            'category_image' => 'default_image.png',
        ]);
        Category::create([
            'parent_id' => '30',
            'name' => ($name = 'Lens'),
            'slug' => Str::slug($name),
            'category_image' => 'default_image.png',
        ]);
        Category::create([
            'parent_id' => '30',
            'name' => ($name = 'Camera Accessories'),
            'slug' => Str::slug($name),
            'category_image' => 'default_image.png',
        ]);
        Category::create([
            'parent_id' => '31',
            'name' => ($name = 'Projectors'),
            'slug' => Str::slug($name),
            'category_image' => 'default_image.png',
        ]);
        Category::create([
            'parent_id' => '31',
            'name' => ($name = 'Projector Screens'),
            'slug' => Str::slug($name),
            'category_image' => 'default_image.png',
        ]);
        Category::create([
            'parent_id' => '31',
            'name' => ($name = 'Presentation Remotes'),
            'slug' => Str::slug($name),
            'category_image' => 'default_image.png',
        ]);
        Category::create([
            'parent_id' => '32',
            'name' => ($name = 'iPhone'),
            'slug' => Str::slug($name),
            'category_image' => 'default_image.png',
        ]);
        Category::create([
            'parent_id' => '32',
            'name' => ($name = 'Samsung'),
            'slug' => Str::slug($name),
            'category_image' => 'default_image.png',
        ]);
        Category::create([
            'parent_id' => '32',
            'name' => ($name = 'Oppo'),
            'slug' => Str::slug($name),
            'category_image' => 'default_image.png',
        ]);
        Category::create([
            'parent_id' => '33',
            'name' => ($name = 'Desktop Monitors'),
            'slug' => Str::slug($name),
            'category_image' => 'default_image.png',
        ]);
        Category::create([
            'parent_id' => '33',
            'name' => ($name = 'TV Screens'),
            'slug' => Str::slug($name),
            'category_image' => 'default_image.png',
        ]);
        Category::create([
            'parent_id' => '34',
            'name' => ($name = 'Macbook'),
            'slug' => Str::slug($name),
            'category_image' => 'default_image.png',
        ]);
        Category::create([
            'parent_id' => '34',
            'name' => ($name = 'Dell'),
            'slug' => Str::slug($name),
            'category_image' => 'default_image.png',
        ]);
        Category::create([
            'parent_id' => '34',
            'name' => ($name = 'HP'),
            'slug' => Str::slug($name),
            'category_image' => 'default_image.png',
        ]);
        Category::create([
            'parent_id' => '34',
            'name' => ($name = 'Lenovo'),
            'slug' => Str::slug($name),
            'category_image' => 'default_image.png',
        ]);
        Category::create([
            'parent_id' => '35',
            'name' => ($name = 'Wireless Speakers'),
            'slug' => Str::slug($name),
            'category_image' => 'default_image.png',
        ]);
        Category::create([
            'parent_id' => '35',
            'name' => ($name = 'Home Audio & Theaters'),
            'slug' => Str::slug($name),
            'category_image' => 'default_image.png',
        ]);
        Category::create([
            'name' => ($name = 'Clothing'),
            'slug' => Str::slug($name),
            'category_image' => 'default_image.png',
        ]);
        Category::create([
            'name' => ($name = 'Books and Literature'),
            'slug' => Str::slug($name),
            'category_image' => 'default_image.png',
        ]);
        Category::create([
            'name' => ($name = 'Jewelry & Watch'),
            'slug' => Str::slug($name),
            'category_image' => 'default_image.png',
        ]);
        Category::create([
            'parent_id' => '1',
            'name' => ($name = 'Rice, Oil & Staples'),
            'slug' => Str::slug($name),
            'category_image' => 'default_image.png',
        ]);
        Category::create([
            'parent_id' => '1',
            'name' => ($name = 'Ready Made Foods'),
            'slug' => Str::slug($name),
            'category_image' => 'default_image.png',
        ]);
        Category::create([
            'parent_id' => '59',
            'name' => ($name = 'Rice'),
            'slug' => Str::slug($name),
            'category_image' => 'default_image.png',
        ]);
        Category::create([
            'parent_id' => '59',
            'name' => ($name = 'Oil'),
            'slug' => Str::slug($name),
            'category_image' => 'default_image.png',
        ]);
        Category::create([
            'parent_id' => '59',
            'name' => ($name = 'Kitchen Ingredients'),
            'slug' => Str::slug($name),
            'category_image' => 'default_image.png',
        ]);
        Category::create([
            'parent_id' => '59',
            'name' => ($name = 'Seasonings & Spices'),
            'slug' => Str::slug($name),
            'category_image' => 'default_image.png',
        ]);
        Category::create([
            'parent_id' => '60',
            'name' => ($name = 'Noodles'),
            'slug' => Str::slug($name),
            'category_image' => 'default_image.png',
        ]);
        Category::create([
            'parent_id' => '60',
            'name' => ($name = 'Canned Food and Powdered'),
            'slug' => Str::slug($name),
            'category_image' => 'default_image.png',
        ]);
        Category::create([
            'parent_id' => '60',
            'name' => ($name = 'Processed Meat'),
            'slug' => Str::slug($name),
            'category_image' => 'default_image.png',
        ]);

    }
}
