<?php

namespace Database\Seeders;

use App\Models\LoanedBook;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LoanedBookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        LoanedBook::factory()->count(50)->create();
    }
}
