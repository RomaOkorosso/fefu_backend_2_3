<?php

namespace Database\Seeders;

use \Illuminate\Database\Seeder;
use App\Models\News;

class NewsSeeder extends Seeder
{
    public function run()
    {
        News::factory()->count(rand(10, 25))->create();
    }
}
