<?php

namespace Database\Factories;

use App\Models\MusicBasket;
use App\Models\SubCategory;
use Illuminate\Database\Eloquent\Factories\Factory;

class MusicBasketFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = MusicBasket::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->word(),
            'icon' => $this->faker->imageUrl(200,200), 
            'url' => $this->faker->imageUrl(),
        ];
    }
}
