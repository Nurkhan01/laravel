<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Tag;
use App\Models\Test;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Category::factory(20)->create();
        $tags = Tag::factory(50)->create();
        $tests = Test::factory(200)->create();

        foreach ($tests as $test){
            $tagsIds = $tags->random(5)->pluck('id');
            $test->tags()->attach($tagsIds);
        }
        \App\Models\User::factory(10)->create();   }
}
