<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use App\Models\Tag;
// use Illuminate\Contracts\Auth\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
// use Illuminate\Support\Testing\Fakes\Fake;
use Faker\Factory as Faker;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(10)->create();



        Category::create([
            'name' => 'Programming',
            'slug' => 'programming'
        ]);

        Category::create([
            'name' => 'Web Design',
            'slug' => 'web-design'
        ]);

        Category::create([
            'name' => 'Personal',
            'slug' => 'personal'
        ]);

        Tag::create([
            'name' => 'javascript',
        ]);
        Tag::create([
            'name' => 'laravel',
        ]);
        Tag::create([
            'name' => 'react',
        ]);
        Tag::create([
            'name' => 'figma',
        ]);
        Tag::create([
            'name' => 'fullstack',
        ]);

        Post::factory(50)->create();

        $faker = Faker::create();

        for($i = 1 ; $i < 50; $i++){
            DB::table('post_tag')->insert([
                'post_id' => $faker->numberBetween(1, 50),
                'tags_id'=> $faker->numberBetween(1, 5),
            ]);
        }


        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
