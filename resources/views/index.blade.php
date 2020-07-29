<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <title>PHP/LaravelでGoogle books apiを使うサンプル</title>
    </head>
    <body>
        <h1>PHP/LaravelでGoogle books apiを使うサンプル</h1>
        <form action="/" method="get">
            書籍名:<input type="text" name="keyword" size="50" value="{{ $keyword }}">&nbsp;<input type="submit" value="検索">
        </form>

        @if ($items == null)
            <p>書籍名を入力してください。</p>
        @else (count($items) > 0)
            <p>検索語：{{ $keyword }}</p>
            <hr>
            @foreach ($items as $item)
                <img src="{{ $item['volumeInfo']['imageLinks']['thumbnail']}}"><br>
                タイトル：{{ $item['volumeInfo']['title']}}<br>
                著者：{{ $item['volumeInfo']['authors'][0]}}<br>
                発売年月：{{ $item['volumeInfo']['publishedDate']}}<br>
                <br>
                概要：{{ $item['volumeInfo']['description']}}<br>
                <hr>
            @endforeach
        @endif
    </body>
</html>