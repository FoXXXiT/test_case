<?php

namespace Database\Seeders;

use App\Models\BookArticle;
use Illuminate\Database\Seeder;

class BookArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        BookArticle::factory()->count(50)->create();
    }
}
