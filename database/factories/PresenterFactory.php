<?php

namespace Database\Factories;

use App\Models\Presenter;
use Illuminate\Database\Eloquent\Factories\Factory;

class PresenterFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Presenter::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'description' => $this->faker->sentence(),
            'image' => $this->faker->imageUrl(200,200),    
            'priorty' => $this->faker->numberBetween(1, 70),
        ];
    }
}
