<?php

namespace Database\Factories;

use App\Models\Book;
use App\Models\BookArticle;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<BookArticle>
 */
class BookArticleFactory extends Factory
{

    protected $model = BookArticle::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        $books = Book::all()->pluck('id')->toArray();
        $bookRandIndex = array_rand($books);
        $randomBookId = $books[$bookRandIndex];

        return [
            'book_id' => $randomBookId,
            'article' => "book {$this->faker->unique()->randomNumber()}"
        ];
    }
}
