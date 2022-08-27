<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
 <div class="container">
 <div class="card-body">
    <h5 class="card-title">{{ $post->name }}</h5>
    <p class="card-text">{{ $post->description }}</p>
    <p class="card-text">Categoriy : <b>{{ $post->categories->name }}</b></p>
    <a href="/posts" class="btn btn-danger">Back</a>
</div><hr>
 </div>
</body>
</html>