<?php

namespace Database\Factories;

use App\Models\Prodcast;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProdcastFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Prodcast::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->name(),
            'description' => $this->faker->sentence(),
            'image' => $this->faker->imageUrl(200,200), 
            'from' => now(),
            'to' => now()->addHours(2),
        ];
    }

   
}
