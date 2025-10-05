<?php

namespace Database\Seeders;

use App\Models\Community;
use App\Models\CommunityPost;
use App\Models\CommunityMember;
use App\Models\CommunityPostComment;
use App\Models\User;
use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CommunitySeeder extends Seeder
{
    public function run(): void
    {
        $users = User::count() > 0 ? User::all() : User::factory()->count(10)
            ->make()
            ->each(function ($user, $index) {
                $baseUsername = Str::slug($user->name);
                $uniqueUsername = $baseUsername . $index;
                $user->username = $uniqueUsername;
                $user->save();
            });

        $categories = collect([
            'Art & Design',
            'Technology',
            'Music',
            'Photography',
            'Writing',
        ])->map(function ($name) {
            return Category::firstOrCreate(['name' => $name]);
        });

        // Data komunitas manual
        $communityData = [
            [
                'name' => 'Digital Artists Hub',
                'description' => 'A community for digital artists to share and collaborate on creative projects.',
                'status' => 'active',
                'category_id' => $categories->where('name', 'Art & Design')->first()->id,
                'creator_id' => $users->random()->id,
                'rules' => 'Be respectful, share constructive feedback, no spam.',
                'avatar' => 'avatars/community1.jpg',
                'cover_image' => 'covers/community1.jpg',
            ],
            [
                'name' => 'Tech Innovators',
                'description' => 'Connecting tech enthusiasts to discuss the latest innovations.',
                'status' => 'active',
                'category_id' => $categories->where('name', 'Technology')->first()->id,
                'creator_id' => $users->random()->id,
                'rules' => 'Keep discussions technical, no self-promotion.',
                'avatar' => 'avatars/community2.jpg',
                'cover_image' => 'covers/community2.jpg',
            ],
            [
                'name' => 'Music Makers Collective',
                'description' => 'A place for musicians to share their work and collaborate.',
                'status' => 'active',
                'category_id' => $categories->where('name', 'Music')->first()->id,
                'creator_id' => $users->random()->id,
                'rules' => 'Support fellow musicians, no copyrighted material.',
                'avatar' => 'avatars/community3.jpg',
                'cover_image' => 'covers/community3.jpg',
            ],
            [
                'name' => 'Shutterbugs Society',
                'description' => 'Photography enthusiasts sharing tips and showcasing their work.',
                'status' => 'pending',
                'category_id' => $categories->where('name', 'Photography')->first()->id,
                'creator_id' => $users->random()->id,
                'rules' => 'Share original work, provide constructive feedback.',
                'avatar' => 'avatars/community4.jpg',
                'cover_image' => 'covers/community4.jpg',
            ],
            [
                'name' => 'Writers Guild',
                'description' => 'A community for writers to share stories and get feedback.',
                'status' => 'active',
                'category_id' => $categories->where('name', 'Writing')->first()->id,
                'creator_id' => $users->random()->id,
                'rules' => 'Respect all genres, no plagiarism.',
                'avatar' => 'avatars/community5.jpg',
                'cover_image' => 'covers/community5.jpg',
            ],
        ];

        $communities = collect($communityData)->map(fn($data) => Community::create($data));

        // Tambahkan member ke tiap komunitas
        foreach ($communities as $community) {
            $userCount = $users->count();

            // Safety check: if there are no users, skip adding members
            if ($userCount === 0) {
                continue;
            }

            // Calculate min/max members to select, ensuring we never exceed the available users.
            // Maximum number of members to request (capped at 20 or the actual user count).
            $maxRequestable = min(20, $userCount);
            
            // Minimum number of members to request (capped at 5 or the actual user count).
            $minRequestable = min(5, $userCount);
            
            // Determine the final member count. If $minRequestable is greater than $maxRequestable 
            // (which only happens if $userCount < 5), we select $userCount (which is $maxRequestable).
            if ($minRequestable > $maxRequestable) {
                $memberCount = $maxRequestable; // Select all available users
            } else {
                $memberCount = rand($minRequestable, $maxRequestable);
            }

            $selectedUsers = $users->random($memberCount);

            foreach ($selectedUsers as $index => $user) {
                $role = $index === 0 ? 'admin' : ($index <= 2 ? 'moderator' : 'member');
                CommunityMember::firstOrCreate([ // Use firstOrCreate to prevent duplicate member entries
                    'community_id' => $community->id,
                    'user_id' => $user->id,
                ], [
                    'role' => $role,
                    'joined_at' => now()->subDays(rand(1, 30)),
                ]);
            }
        }

        // Tambahkan post & komentar
        foreach ($communities as $community) {
            CommunityPost::factory()
                ->count(rand(3, 10))
                ->create([
                    'community_id' => $community->id,
                    'user_id' => $users->random()->id,
                    'type' => 'discussion',
                ])
                ->each(function ($post) use ($users) {
                    CommunityPostComment::factory()
                        ->count(rand(0, 5))
                        ->create([
                            'post_id' => $post->id,
                            'user_id' => $users->random()->id,
                        ]);
                });
        }
    }
}
