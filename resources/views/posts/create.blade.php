<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <title>Posts</title>
  <link rel="stylesheet" href="../css/create.css">
</head>

<body>
  <div class="fluid">
    <div class="container">
      <div class="crud-box">
        <h3>Add a Post</h3>
        <form action="{{ route('posts.store') }}" method="post">
          @csrf
          <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" id="title" name="title" required>
          </div>
          <div class="form-group">
            <label for="body">Body</label>
            <textarea class="form-control" id="body" name="body" rows="3" required></textarea>
          </div>
          <br>
          <div class="btn-box">
            <button type="submit" class="btn btn-primary">Create Post</button>
            <a class="btn btn-primary" href={{ route('posts.index') }}>Check Post</a>
            <!-- <a class="btn btn-sm btn-success" href={{ route('posts.create') }}>Add Post</a> -->

          </div>
        </form>
      </div>

    </div>
  </div>
  <style type="text/css">
    .fluid {
      width: 100%;
    }

    .container {
      display: flex;
      justify-content: center;
      flex-direction: column;
      gap: 20px;
      width: 60%;
      height: auto;
    }

    .crud-box {
      margin-top: 120px;
    }

    .btn-box {
      display: flex;
      flex-direction: row;
      align-items: center;
      justify-content: flex-start;
      gap: 20px;
    }
    .form-group{
      margin-top: 10px;
    }
    
  </style>
</body>

</html>