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
    <table>
        <a href="{{ route('/') }}">Add Image</a>
        <tr>
            <td>Images</td>
            <td>Action</td>
        </tr>
        @foreach($files as $file)
        <tr>
            <td><img src="{{ asset('uploads/'.$file->image) }}" alt="" style="height: 60px; width: 60px;"></td>
            <td>
                <form action="{{ route('delete.image')}}" method="post">
                    @csrf
                    <input type="hidden" name="image_id" value="{{ $file->id }}">
                    <input type="submit" value="Delete">
                </form>
            </td>
            <td>
                <a href="{{ route('edit.image',['id'=>$file->id]) }}">
                    <input type="submit" value="Edit">
                </a>
            </td>
        </tr>
        @endforeach
    </table>
</body>
</html>
