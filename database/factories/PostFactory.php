<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class PostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Post::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
          'title' => $this->faker->sentence(6, true),
          'image_path' => "https://picsum.photos/200/300",
          'description' => $this->faker->text(400),
          'user_id' => User::all()->random()->id,
          'uuid' => Str::uuid(),
        ];
    }
}
