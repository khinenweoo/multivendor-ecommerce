<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Seller;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Faker\Generator as Faker;


class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $product_name = $this->faker->unique()->words($nb=3,$asText=true);
        $slug = Str::slug($product_name);
     
         return [
            'category_id' =>  $this->faker->randomElement(Category::pluck('id')->toArray()),
            'brand_id' => $this->faker->randomElement(Brand::pluck('brand_id')->toArray()),
            'seller_id' => $this->faker->randomElement(Seller::pluck('id')->toArray()),
            'product_name' => $product_name,
            'product_slug' => $slug,
            'sku' => 'PD00'.$this->faker->unique()->randomNumber($nbDigits=5, $strict=false),
            'short_description' => $this->faker->text(200),
            'product_image' => 'default_image.png',
            'product_video' => 'null',
            'stock_status' =>  $this->faker->randomElement(['instock', 'out of stock']),
            'quantity' => $this->faker->randomDigit(),
            'weight'=> $this->faker->randomDigit(),
            'price' => $this->faker->numberBetween(600,10000),
            'description' => $this->faker->sentences(3, true),
            'conditions' => $this->faker->randomElement(['new','popular','recommend']),
            'status' => $this->faker->randomElement(['active','inactive']),
        ];
    }
}
