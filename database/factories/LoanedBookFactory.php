<?php

namespace Database\Factories;

use App\Models\BookArticle;
use App\Models\LoanedBook;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

/**
 * @extends Factory<LoanedBook>
 */
class LoanedBookFactory extends Factory
{
    protected $model = LoanedBook::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        $bookArticles = BookArticle::all()->pluck('id')->toArray();
        $bookArticleRandomIndex = array_rand($bookArticles);
        $bookArticleId = $bookArticles[$bookArticleRandomIndex];

        $users = User::all()->pluck('id')->toArray();
        $userRandomIndex = array_rand($users);
        $userId = $users[$userRandomIndex];

        $borrowStart = $this->faker->dateTimeBetween('-1 year', '+1 year');
        $days = rand(3, 10);
        $borrowEnd = Carbon::parse($borrowStart)->addDays($days);

        return [
            'book_article_id' => $bookArticleId,
            'user_id' => $userId,
            'borrow_start' => $borrowStart,
            'borrow_end' => $borrowEnd,
            'return_deadline_passed' => $this->faker->boolean(),
        ];
    }
}
