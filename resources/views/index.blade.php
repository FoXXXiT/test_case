<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>NEWAGE TEST</title>

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

</head>
<body>
<div class="container">
    <h1>
        Books
    </h1>

    @if($books)
        <ul class="book-list">
            @foreach($books as $book)
                <li><a href="{{ route('books.item', $book->id) }}">{{ $book->title }}</a></li>
            @endforeach
        </ul>
    @endif
</div>
</body>
</html>
