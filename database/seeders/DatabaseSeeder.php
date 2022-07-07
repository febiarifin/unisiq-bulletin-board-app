<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\User;
use App\Models\Post;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $users = ['admin','usersatu','userdua'];
        $roles = ['admin','user','user'];
        for ($i=0; $i < sizeOf($users); $i++) { 
            User::create([
                "name" => $users[$i],
                "email" => $users[$i]."@gmail.com",
                "password" => Hash::make("password"),
                "role" => $roles[$i],
                "status" => 'active'
            ]);
        }

        $categories = ['Beasiswa','Event','Recruitment','Voting','Artikel'];
        for ($i=0; $i < sizeof($categories); $i++) { 
            Category::create([
                "name" => $categories[$i],
                "slug" => Str::slug($categories[$i])
            ]);
        }

        Post::factory()->count(20)->create();
    }
}
