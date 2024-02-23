<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    
    <title>test</title>
</head>
<body>
    @auth

        <div class="m mx-auto flex space-x-5 m-10 pl-6 items-center">
            <p>congrate</p>
            <form action="/logout" method="post">
                @csrf
                <button class="btn bg-orange-500 py-2 px-4 rounded-lg hover:bg-orange-600">Log Out</button>
    
            </form>
        </div>
        <div style="border: 3px solid black;">
            <h2>All Posts</h2>
            @foreach($posts as $post)
            <div style="background-color: gray; padding: 10px; margin: 10px;">
              <h3>{{$post['title']}} </h3>
              {{$post['body']}}
              <p><a href="/edit-post/{{$post->id}}">Edit</a></p>
              <form action="/delete-post/{{$post->id}}" method="POST">
                @csrf
                @method('DELETE')
                <button>Delete</button>
              </form>
            </div>
            @endforeach
          </div>

        <hr class="br m-4">
        <div class="p-6">
            <h1>Create a new Post</h1>
            <form action="/create-post" method="post" class="mx-auto items-center flex space-x-5 m-10 text-center ">
                @csrf
                <input type="text" name="title" placeholder="title">
                <textarea name="body" cols="30" rows="2" placeholder="body" class="p-2"></textarea>
                <button class="btn bg-orange-500 py-2 px-4 rounded-lg hover:bg-orange-600">Save</button>
            </form>
        </div>
    @else
    <div class="mx-auto p-10">
        <h1 class="t text-xl">Sign Up : </h1>
        <form action="/register" method="POST" class="name p-6 ">
            @csrf
            <input name="name" type="text" placeholder="name">
            <input name='email' type="text" placeholder="email">
            <input name='password' type="password" placeholder="password">
            <button class="btn bg-orange-500 py-2 px-4 rounded-lg hover:bg-orange-600">REGISTER</button>
        </form>
    </div>

    <div class="mx-auto p-10">
        <h1 class="t text-xl">Sign Up : </h1>
        <form action="/login" method="POST" class="name p-6 ">
            @csrf
            <input name="name" type="text" placeholder="name">
            
            <input name='password' type="password" placeholder="password">
            <button class="btn bg-orange-500 py-2 px-4 rounded-lg hover:bg-orange-600">LOGIN</button>
        </form>
        
    </div>
        
        
    @endauth

</body>
</html>