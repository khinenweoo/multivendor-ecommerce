<?php

namespace Database\Factories;

use App\Models\Shop;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Seller;
use App\Models\Category;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

class ShopFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Shop::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $shop_name = $this->faker->unique()->words($nb=3,$asText=true);
        $shop_slug = Str::slug($shop_name);
        return [
            'shop_name' => $shop_name,
            'shop_slug' => $shop_slug,
            'seller_id' =>  $this->faker->unique()->randomElement(Seller::pluck('id')->toArray()),
            'company_name' => $this->faker->unique()->words($nb=3,$asText=true),
            'account_type' => 'business',
            'main_categories' => $this->faker->randomElement(Category::pluck('name')->toArray()),
            'other_category' => $this->faker->word(),
            'business_register_no' => Str::random(15),
            'business_address' => $this->faker->text(50),
            'pickup_address' => $this->faker->text(50),
            'business_email'=> $this->faker->unique()->safeEmail(),
            'description' => $this->faker->sentences(2, true),
            'is_active' => true,
        ];
    }
}
