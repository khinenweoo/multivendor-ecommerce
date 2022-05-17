<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class CategoryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Category::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $category_names = ['Handicraft', 'Furniture', 'Beverage & Snacks', 'Handmade & Accessories', 'Clothing & Shoes', 'Health & Beauty', 'Grocery Food', 'Art & Collectibles','Kitchenware','Outdoor Plants'];
        // $slug = Str::slug($category_names);
        return [
            'parent_id' => $this->faker->randomElement(Category::pluck('id')->toArray()),
            'name' => $this->faker->unique()->randomElement($category_names),
            'slug'  => $this->faker->unique()->words($nb=2,$asText=true),
            'category_image' => 'default_image.png',
            'description'=> $this->faker->sentences(2, true),
            'status' => $this->faker->randomElement(['active', 'inactive']),
            'is_featured' => $this->faker->randomElement([0,1]),
        ];
    }
}
