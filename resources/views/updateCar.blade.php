<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<div class="container mt-3">
  <h2>Update Car</h2>
  <form action="{{route('updateCar',$car->id)}}" method="post">
  @csrf
  @method('put')
    <div class="mb-3 mt-3">
      <label for="Title">Title</label>
      <input type="text" class="form-control" id="Title" placeholder="Enter Title" name="Title" value="{{$car->title}}">
    </div>
    <div class="mb-3">
      <label for="pwd">Price</label>
      <input type="number" class="form-control" id="pwd" placeholder="Enter Price" name="Price" value="{{$car->price}}">
    </div>
    
    <div class="mb-3 mt-3">
      <label for="comment">Description</label>
      <textarea class="form-control" rows="5" id="description" name="description">{{$car->description}}</textarea>
    </div>
    <div class="form-check mb-3">
      <label class="form-check-label">
        <input class="form-check-input" type="checkbox" name="Published" @checked($car->published)> Remember me
      </label>
    </div>
    <button type="submit" class="btn btn-primary">Add</button>
  </form>
</div>

</body>
</html>
