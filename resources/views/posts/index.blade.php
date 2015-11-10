<!DOCTYPE html>
<html>
<head>
    <title>Posts</title>
</head>
<body>
<div>
    @foreach($posts as $post)
        <div>
            <h2>
                {{ $post->id }}
            </h2>
            <h2>
                {{ $post->title }}
            </h2>
            <h3>
                {{ $post->sub_title }}
            </h3>
            <h3>
                {{ $post->content }}
            </h3>
        </div>
        <hr>
    @endforeach
</div>
</body>
</html>