<?php

namespace Database\Seeders;

use \Illuminate\Database\Seeder;
use App\Models\News;

class NewsSeeder extends Seeder
{
    public function run()
    {
        News::query()->delete();
        News::factory()->count(rand(15, 25))->create();
    }
}
