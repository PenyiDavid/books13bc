<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=ű, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    @if(session('success'))
        {{session('success')}}
    @endif
    <ul>
        @foreach ($genres as $genre)
        <li>
            {{$genre->genre_name}}
            <ol>
                @foreach ($genre->books as $book)
                    <li>{{$book['title']}}</li>
                @endforeach
            </ol>
        </li>
        @endforeach
    </ul>
</body>

</html>