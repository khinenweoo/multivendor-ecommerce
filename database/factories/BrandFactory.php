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
        $brand_names = ['Vistra', 'Ipanema', 'Pretty Fit', 'Nestle', 'MDS', 'Panasonic', 'ZARA', 'Star Secret','Kerasys','H&M'];
        return [
            'brand_name' => $this->faker->unique()->randomElement($brand_names),
            'brand_slug' => $this->faker->unique()->words($nb=2,$asText=true),
            'brand_image' => 'brand-sample.png',
            'brand_description' => $this->faker->realText(60),
        ];
    }
}
