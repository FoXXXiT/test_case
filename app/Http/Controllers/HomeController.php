<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\BookArticle;
use Illuminate\Contracts\View\View;

class HomeController extends Controller {

    public function index(): View
    {
        $books = Book::all();

        return view('index', compact('books'));
    }

    public function testShit()
    {
        $books = Book::all()->pluck('id')->toArray();

        $bookRandIndex = array_rand($books);

        $randomBook = $books[$bookRandIndex];

    }

}
