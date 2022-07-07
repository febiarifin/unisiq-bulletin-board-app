<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $title = $this->faker->sentence();
        $categories = ['Beasiswa','Event','Recruitment','Voting','Artikel'];
        $categoryRandom = rand(0,4);
        $users = ['usersatu','userdua'];
        $userRandom = rand(0,1);
        return [
            'title' => $title,
            'slug' => Str::slug($title),
            'category' => $categories[$categoryRandom],
            'user' => $users[$userRandom],
            'attachment' => 'https://example.com',
            'image' => $this->faker->imageUrl(640, 480),
            'status' => 'publish',
            'content' => $this->faker->paragraph(),
        ];
    }
}
