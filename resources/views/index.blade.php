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
            <p>「{{ $keyword }}」の検索結果</p>
            <hr>
            @foreach ($items as $item)
            <h2>{{ $item['volumeInfo']['title']}}</h2>
                @if (array_key_exists('imageLinks', $item['volumeInfo']))
                    <img src="{{ $item['volumeInfo']['imageLinks']['thumbnail']}}"><br>
                @endif
                                
                @if (array_key_exists('description', $item['volumeInfo']))
                    著者：{{ $item['volumeInfo']['authors'][0]}}<br>
                @endif
                @if (array_key_exists('description', $item['volumeInfo']))
                    発売年月：{{ $item['volumeInfo']['publishedDate']}}<br>
                @endif
                <br>
                @foreach ($item['volumeInfo']['industryIdentifiers'] as $industryIdentifier)
                    {{ $industryIdentifier['type'] }}&nbsp;：&nbsp;{{ $industryIdentifier['identifier'] }} <br>
                @endforeach
                <br>
                @if (array_key_exists('description', $item['volumeInfo']))
                    概要：{{ $item['volumeInfo']['description']}}<br>
                @endif
                <br>
                <hr>
            @endforeach
        @endif
    </body>
</html>