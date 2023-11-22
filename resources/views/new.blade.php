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
  <h2>NEWS</h2>
  <form action="{{route('NEWS')}}" method="post">
  @csrf
    <div class="mb-3 mt-3">
      <label for="Title">Title</label>
      <input type="text" class="form-control" id="Title" placeholder="Enter Title" name="Title">
    </div>
    <div class="mb-3">
      <label for="author">Author</label>
      <input type="text" class="form-control" id="author" placeholder="Enter Author" name="Author">
    </div>
    
    <div class="mb-3 mt-3">
      <label for="content">Content</label>
      <textarea class="form-control" rows="5" id="content" name="Content"></textarea>
    </div>

    <div class="form-check mb-3">
      <label class="form-check-label">
        <input class="form-check-input" type="checkbox" name="Published"> Published
      </label>
    </div>
    <button type="submit" class="btn btn-primary">Add</button>
  </form>
</div>

</body>
</html>
