<?php

namespace Database\Factories;

use App\Models\Attribute;
use Illuminate\Database\Eloquent\Factories\Factory;

class AttributeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Attribute::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $attr_names = ['color','size','manufacturer','origin'];
        return [
            'attr_name' => $this->faker->unique()->randomElement($attr_names),
            'product_id' => array_rand(\App\Models\Product::pluck('product_id','product_id')->toArray()) ,
        ];
    }
}
