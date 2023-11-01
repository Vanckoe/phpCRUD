<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <title>Posts</title>
</head>

<body>
  <div class="fluid">
    <div class="container">
      <div class="flex">
        <h1 class="postTitle">Post list</h1>
        <a class="btn btn-sm btn-success" href={{ route('posts.create') }}>Add Post</a>

      </div>
      <p class="p24">Here you can see the commentaries of our random users, read carefully!</p>
      @foreach ($posts as $post)
      <div class="col-sm">

        <div class="card">

          <div class="card-header">
            <h5 class="card-title">{{ $post->title }}</h5>
          </div>

          <div class="card-body">
            <p class="card-text">{{ $post->body }}</p>
          </div>

          <div class="card-footer">
            <div class="row">

              <div class="col-sm">
                <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-primary btn-sm">Edit</a>
              </div>

              <div class="col-sm">
                <form action="{{ route('posts.destroy', $post->id) }}" method="post">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                </form>
              </div>

            </div>
          </div>
        </div>
      </div>

      @endforeach
    </div>

  </div>

  <style type="text/css">
    .container {
      display: flex;
      justify-content: center;
      flex-direction: column;
      gap: 20px;
      width: 60%;
      height: auto;
    }

    .postTitle {
      font-size: 60px;
    }

    .p24 {
      font-size: 24px;
    }

    .flex {
      display: flex;
      gap: 50px;
      margin-top: 50px;
      align-items: center;
      flex-direction: row;
    }
  </style>
</body>

</html>