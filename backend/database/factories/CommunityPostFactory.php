<?php

namespace Database\Factories;

use App\Models\CommunityPost;
use App\Models\Community;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CommunityPost>
 */
class CommunityPostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = CommunityPost::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $types = ['discussion', 'announcement', 'poll', 'media'];
        
        $title = $this->faker->unique()->sentence(rand(3, 7));

        return [
            'community_id' => Community::factory(), 
            'user_id' => User::factory(), 

            'title' => $title,
            'slug' => Str::slug($title), 
            'content' => $this->faker->paragraphs(rand(2, 5), true),
            
            'type' => $this->faker->randomElement($types),
            
            'file_path' => $this->faker->optional(0.3)->imageUrl(800, 600, 'abstract', true), 
            
            'status' => $this->faker->randomElement(['published', 'draft']),
            
            'likes_count' => $this->faker->numberBetween(0, 150),
            'comments_count' => 0, 

            'created_at' => $this->faker->dateTimeBetween('-1 year', 'now'),
            'updated_at' => $this->faker->dateTimeBetween('-6 month', 'now'),
        ];
    }
}
