<?php

namespace Database\Factories;

use App\Models\Community;
use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Community>
 */
class CommunityFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Community::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $name = $this->faker->unique()->words(3, true) . ' Community';

        return [
            'name' => ucwords($name),
            'slug' => Str::slug($name),
            'description' => $this->faker->paragraph(),
            'status' => $this->faker->randomElement(['active', 'pending', 'archived']),

            // Relasi otomatis (Automatically create related models)
            'category_id' => Category::factory(),
            'creator_id' => User::factory(),

            'rules' => $this->faker->paragraphs(2, true),
            'avatar' => 'avatars/community/' . $this->faker->uuid() . '.jpg',
            'cover_image' => 'covers/community/' . $this->faker->uuid() . '.jpg',
            
            'members_count' => $this->faker->numberBetween(1, 500),
            'posts_count' => $this->faker->numberBetween(10, 1000),

            'created_at' => $this->faker->dateTimeBetween('-2 years', 'now'),
            'updated_at' => $this->faker->dateTimeBetween('-1 year', 'now'),
        ];
    }
}
