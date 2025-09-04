<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Insert 10 dummy posts
        for ($i = 1; $i <= 10; $i++) {
            DB::table('posts')->insert([
                'title' => 'Post Title ' . $i,
                'content' => 'This is the content of post number ' . $i,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
