<?php

namespace Database\Factories;

use Domain\Post\Post;
use Enum\WebpageStatus;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class PostFactory extends Factory
{
    protected $model = Post::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => $this->faker->name(),
            'slug' => $this->faker->slug(),
            'publish_date' => $this->faker->dateTime(),
            'status' => WebpageStatus::Draft,
            'parent_id' => null,
        ];
    }
}
