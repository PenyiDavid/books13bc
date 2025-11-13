<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    @if($errors->any())
        @foreach ($errors->all() as $error)
            {{ $error}}
        @endforeach
    @endif
    <form action="{{Route('genres.store')}}" method="post">
        @csrf
        <label for="genre_name">Genre name:</label>
        <input type="text" name="genre_name" id="genre_name">
        <input type="submit" value="Save">
    </form>
</body>
</html>