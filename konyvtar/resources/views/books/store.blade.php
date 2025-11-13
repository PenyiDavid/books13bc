<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    @if($errors->any())
        @foreach($errors->all() as $error)
            {{$error}}
        @endforeach
    @endif    
    <form action="{{route('books.store')}}" method="post">
        @csrf
        <label for="book_title">Book title:</label>
        <input type="text" id="book_title" name="book_title">
        <label for="book_author">Book author:</label>
        <input type="text" id="book_author" name="book_author">
        <label for="genre_id">Genre id:</label>
        <select name="genre_id" id="genre_id">
            @foreach ($genres as $genre)
                <option value="{{$genre['id']}}">{{$genre['genre_name']}}</option>
            @endforeach
        </select>
        <label for="publish_year">Publish year</label>
        <input type="number" min="1" max="3000" id="publish_year" name="publish_year" value="2025">
        <input type="submit" value="Save">
    </form>
</body>
</html>