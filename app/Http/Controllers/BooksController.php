<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\LoanedBook;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;

class BooksController extends Controller
{

    public function index(Book $book): View
    {
        $loanedBooks = LoanedBook::with(
            [
                'article',
                'article.book',
                'user'
            ]
        )->whereHas('article', function ($query) use ($book) {
            $query->where('book_id', $book->id);
        })->get();

        $booksInStock = DB::table('loaned_books')
            ->selectRaw('COUNT(*)')
            ->leftJoin('book_articles', 'book_articles.id', '=', 'loaned_books.book_article_id')
            ->leftJoin('books', 'books.id', '=', 'book_articles.book_id')
            ->whereRaw("book_id = {$book->id}")
            ->get();

        $booksInStockAvailable = DB::table('loaned_books')
            ->selectRaw('COUNT(*)')
            ->leftJoin('book_articles', 'book_articles.id', '=', 'loaned_books.book_article_id')
            ->leftJoin('books', 'books.id', '=', 'book_articles.book_id')
            ->whereRaw("book_id = {$book->id}")
            ->whereRaw('CURDATE() NOT between borrow_start and borrow_end')
            ->get();


        $booksOnHands = DB::table('loaned_books')
            ->leftJoin('book_articles', 'book_articles.id', '=', 'loaned_books.book_article_id')
            ->leftJoin('books', 'books.id', '=', 'book_articles.book_id')
            ->selectRaw('COUNT(*) as count')
            ->whereRaw('CURDATE() BETWEEN borrow_start AND borrow_end')
            ->whereRaw("book_id = {$book->id}")
            ->get();

        $bookNextDateReturned = DB::table('loaned_books')
            ->selectRaw('DATE(borrow_end)')
            ->leftJoin('book_articles', 'book_articles.id', '=', 'loaned_books.book_article_id')
            ->leftJoin('books', 'books.id', '=', 'book_articles.book_id')
            ->whereRaw('DATEDIFF(borrow_end, NOW()) >= 0')
            ->whereRaw("book_id = {$book->id}")
            ->orderByRaw('ABS(DATEDIFF(borrow_end, NOW()))')
            ->first();

        $mostBorrowedBook = DB::table('books')
            ->select('title')
            ->leftJoin('book_articles', 'books.id', '=', 'book_articles.book_id')
            ->leftJoin('loaned_books', 'book_articles.id', '=', 'loaned_books.book_article_id')
            ->groupBy('books.title')
            ->orderByRaw('COUNT(`title`) DESC')
            ->first();


        return view('books.item', compact('book', 'loanedBooks'));
    }

}
