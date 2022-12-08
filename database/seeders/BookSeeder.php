<?php

namespace Database\Seeders;

use App\Models\Book;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        Book::create([
            'title' => 'Duna'
        ]);

        Book::create([
            'title' => 'Tenet'
        ]);
    }
}
