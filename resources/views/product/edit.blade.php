<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <a href="{{ route('dashboard') }}">All Image</a><br><br>
    <form action="{{ route('update.image') }}" method="post" enctype="multipart/form-data">
        @csrf
        <input type="hidden" value="{{ $files->id }}" name="image_id">
        <img src="{{ asset('uploads/'.$files->image) }}" alt="" style="height: 60px; width: 60px;"><br>
        <input type="file" name="image[]" multiple><br><br>
        <button type="submit">Update</button>
    </form>
</body>
</html>
