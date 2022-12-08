<!DOCTYPE html>
{{--<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">--}}
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>SHOW BOOK</title>

{{--    <link rel="stylesheet" href="{{ asset('css/style.css') }}">--}}

</head>
<body>
<div class="container">
    <a href="{{ route('index') }}"><- GO TO MAINPAGE</a>
    <h1>
        Book {{ $book->title }} (id: {{ $book->id }})
    </h1>

    <table border="1" cellpadding="0" cellspacing="0">
        <tr>
            <th>ID</th>
            <th>ARTICLE</th>
        </tr>
        @foreach( $book->articles as $article)
            <tr>
                <td>
                    {{ $article->id }}
                </td>
                <td>
                    {{ $article->article }}
                </td>
            </tr>
        @endforeach
    </table>
</div>
<table border="1" cellpadding="3" cellspacing="0">
    <tr>
        <th>ARTICLE</th>
        <th>USER</th>
        <th>BORROW START</th>
        <th>BORROW END</th>
    </tr>
    @foreach( $loanedBooks as $book)
        <tr>
            <td>
                {{ $book?->article?->article }}
            </td>
            <td>
                {{ $book->user->name }}
            </td>
            <td>
                {{ $book->borrow_start }}
            </td>
            <td>
                {{ $book->borrow_end }}
            </td>
        </tr>
    @endforeach
</table>
</body>
</html>
