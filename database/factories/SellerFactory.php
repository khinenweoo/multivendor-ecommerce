<?php

namespace Database\Factories;

use App\Models\Seller;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

class SellerFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Seller::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'role' => 'owner',
            'email' => $this->faker->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => \Hash::make('seller1234'), // password
            'remember_token' => Str::random(10),
            'nrc_number' => $this->faker->unique()->randomNumber($nbDigits=6, $strict=false),
            'nrc_front' => 'NRC_nrc_front.jpg',
            'nrc_back' => 'NRC_nrc_back.jpg',
            'mobile' =>  $this->faker->numberBetween(4000,10000),
            'viber_no' => $this->faker->numberBetween(4000,10000),
            'approved' => false,
        ];
    }
      /**
     * Indicate that the model's email address should be unverified.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }
}
