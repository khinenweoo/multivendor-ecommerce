<?php

namespace Database\Factories;

use App\Models\Brand;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
class BrandFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Brand::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'brand_name' => ($name = $this->faker->streetName.random_int(0,99)),
            'brand_slug' => Str::slug($name),
            'brand_image' => 'brand-sample.png',
            'brand_description' => $this->faker->realText(60),
        ];
    }
}
