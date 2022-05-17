<?php

namespace Database\Factories;

use App\Models\AttributeValue;
use Illuminate\Database\Eloquent\Factories\Factory;

class AttributeValueFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = AttributeValue::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $attribute_values = ['large', 'medium', 'small', 'XL', 'L', 'M', 'S', 'White','Blue','Green','Red','Black'];
        return [
            'value' => $this->faker->randomElement($attribute_values),
            'attr_id' => array_rand(\App\Models\Attribute::pluck('attr_id','attr_id')->toArray()),
        ];
    }
}
