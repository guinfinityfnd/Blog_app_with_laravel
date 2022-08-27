<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
  <div class="container">
    <div class="card">
      <div class="card-header text-center">
        New Posts
      </div>
      <div class="card-body">
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
        <form action="/posts/{{$post->id}}" method="post">
          @csrf
          @method('PUT')
          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Name</label>
            <input type="text" name="name" class="form-control " placeholder="Title name" value="{{ old('name',$post->name) }}">
          </div>
          <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Description</label>
            <textarea class="form-control" name="description" id="" cols="30" rows="10" placeholder="Description">{{ old('text',$post->description) }}</textarea>
          </div>
          <div class="mb-3 from-group">
          <select name="category_id" id="" class="form-control">
            <option value="">Select Category</option>
            @foreach ($categories as $cat)
              <option value="{{$cat->id}}" {{ $cat->id == $post->category_id ? "selected" : "" }}>{{ $cat->name }}</option>
            @endforeach
          </select>
        </div>
          <button type="submit" class="btn btn-primary">UPDATE</button>
          <a href="/posts" class="btn btn-success">Back</a>
        </form>
      </div>
    </div>
  </div>
</body>

</html>