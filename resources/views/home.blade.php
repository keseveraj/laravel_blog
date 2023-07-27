<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css">

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laravel Blog</title>

</head>
<body>    
    
    @auth {{-- if user is login --}}
    <div style="padding: 15px">
        <form action="/logout" method="POST">
            @csrf
            <button>Log out</button>        
        </form>
    </div>

    <div style="border: 3px solid black; margin: 10px; padding: 10px;">
        <h2>Create New Post</h2>
        <form action="/create-post" method="POST">
            @csrf
            <label>Title : </label>
            <input name="title" type="text" placeholder="Post Title"><br><br>
            <label>Content : </label><br>
            <textarea name="body" placeholder="You may start writing your content here....."></textarea><br>
            <button>Save Post</button>
        </form>
    </div>

    <div style="border: 3px solid black; margin: 10px; padding: 10px;">
        <h2>All post</h2>
        @foreach($posts as $post)
            <div style="background-color:pink ; border: 3px solid black; margin: 10px; padding: 10px;">
                <label>Author: {{ $post->user->name}}</label><br>
                <label>Title : {{ $post->title }}</label><br>
                <label>Content : {{ $post->body }}</label><br>
                <a href="/edit-post/{{ $post->id }}">Edit</a> 
                <form action="/delete-post/{{ $post->id }}" method="POST">
                    @method('DELETE')
                    @csrf
                    <button>Delete</button>
                </form>
            </div>
        @endforeach 
    </div>

    @else
    <div style="border: 3px solid black; margin: 10px; padding: 10px;">
        <h1>Login</h1>
        <form action="/login" method="POST">
            @csrf
            <div>Name: <input name="loginname" type="text" placeholder="Name" required></div>
            <div>Password: <input name="loginpassword" type="password" placeholder="Password" required></div>
            <button>login</button>
        </form>
    </div>

    <div style="border: 3px solid black; margin: 10px; padding: 10px;">
        <h1>Register</h1>
        <form action="/register" method="POST">
            @csrf
            <div>Name: <input name="name" type="text" placeholder="Name" required></div>
            <div>Email: <input name="email" type="text" placeholder="Email" required></div>
            <div>Password: <input name="password" type="password" placeholder="Password" required></div>
            <button>Register</button>
        </form>
    </div>
    
    @endauth

</body>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

</html>