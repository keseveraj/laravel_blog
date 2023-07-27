<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config('app.name') }}</title>
</head>
<body>
    <div style="border: 3px solid black; margin: 10px; padding: 10px;">
        <h2>Edit Post</h2>
        <form action="/edit-post/{{ $post->id }}" method="POST">
            @csrf
            @method('PUT')
            <label>Title : </label>
            <input name="title" type="text" value= "{{ $post->title }}"><br><br>
            <textarea name="body">{{ $post->body }}</textarea><br>
            <button>Save Changes</button>
        </form>
    </div>
</body>
</html>