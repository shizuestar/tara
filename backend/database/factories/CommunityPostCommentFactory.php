<?php

namespace Database\Factories;

use App\Models\CommunityPostComment;
use Illuminate\Database\Eloquent\Factories\Factory;

class CommunityPostCommentFactory extends Factory
{
    protected $model = CommunityPostComment::class;

    public function definition()
    {
        return [
            'post_id' => null,
            'user_id' => null,
            'comment' => $this->faker->sentence(rand(3, 10)),
            'created_at' => $this->faker->dateTimeBetween('-1 year', 'now'),
            'updated_at' => $this->faker->dateTimeBetween('-6 months', 'now'),
        ];
    }
}