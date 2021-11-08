<?php

namespace Database\Factories;

use \Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\News;

class NewsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = News::class;

    /**
     * @inheritDoc
     * @return array
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->unique->realTextBetween(50, 256),
            'description' => $this->faker->realTextBetween(100, 500),
            'text' => $this->faker->realTextBetween(500, 2000),
            'is_published' => $this->faker->boolean(70),
            'published_at' => $this->faker->dateTimeBetween('-2 months'),
        ];
    }
}
