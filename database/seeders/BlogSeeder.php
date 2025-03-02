<?php

namespace Database\Seeders;

use App\Models\Blog;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('blogs')->truncate();

        Blog::factory()->count(30)->create();

        // DB::table('blogs')->insert([
        //     'title' => 'blog 1',
        //     'description' => 'ini adalah description dari blog 1',
        // ]);

        // DB::table('blogs')->insert([
        //     'title' => 'blog 2',
        //     'description' => 'ini adalah description dari blog 2',
        // ]);

        // DB::table('blogs')->insert([
        //     'title' => 'blog 3',
        //     'description' => 'ini adalah description dari blog 3',
        // ]);
    }
}
