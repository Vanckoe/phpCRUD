<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <title>Plan maker</title>
  <link rel="stylesheet" href="../css/create.css">
</head>

<body>
  <div class="editFluid">

    <div class="container">
      <h3 class="editTitle">Редактировать план</h3>
      <form action="{{ route('posts.update', $post->id) }}" method="post">
        @csrf
        @method('PUT')
        <div class="form-group">
          <label class="title" for="title">Название</label>
          <input type="text" class="form-control input-css" id="title" name="title" value="{{ $post->title }}" required>
        </div>
        <div class="form-group">
          <label class="title" for="body">Подробности</label>
          <textarea class="form-control input-css" id="body" name="body" rows="3" required>{{ $post->body }}</textarea>
        </div>
        <div class="flex">
          <button type="submit" class="green btn btn-primary">Обновить</button>
          <a class="green btn btn-primary" href={{ route('posts.index') }}>Отменить</a>

        </div>

      </form>
    </div>

  </div>

  <style type="text/css">
    .editFluid {
      width: 100%;
    }

    .container {
      display: flex;
      justify-content: center;
      flex-direction: column;
      height: auto;
      align-items: center;
      margin-top: 100px;
    }

    .editTitle {
      font-size: 30px;
      margin-top: 80px;
      margin-bottom: 0;
    }

    .form-group {
      margin-top: 20px;
      margin-bottom: 20px;
      display: flex;
      flex-direction: column;
    }

    .input-css {
      box-sizing: border-box;
      box-shadow: 0px 0px 2px grey;
      width: 300px;
      border-radius: 5px;
    }

    .title {
      margin-bottom: 10px;
    }

    .flex {
      display: flex;
      justify-content: space-around;
      flex-direction: row-reverse;
    }

    .green {
      background-color: gray;
      border-bottom: 0px;
      border: 0px;
    }
  </style>
</body>

</html>