
 <!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>NEWS</h2>
  <!-- <p>The .table-hover class enables a hover state on table rows:</p>            -->
  <table class="table table-hover">
    <thead>
      <tr>
        <th>Title</th>
        <th>Author</th>
        <th>Content</th>
        <th>Published</th>
        <th>Edit</th>
      </tr>
    </thead>
    <tbody>
        @foreach($news as $new)
      <tr>
        <td>{{$news->newTitle}}</td>
        <td>{{$news->author}}</td>
        <td>{{$news->content}}</td>
        <td>{{$news->description}}</td>
        
        @if($news->published=== 1)
        <td>yes</td>
        @else
        <td>no</td>
        @endif

        <td><a href="editnew/{{$news->id}}">Edit</a></td>
        
      </tr>
      @endforeach
     
      </tbody>
  </table>
</div>

</body>
</html>




















































 <!-- <!DOCTYPE html>

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
    </div> @foreach($cars as $car)
    <div class="mb-3">
      <label for="author">Author</label>
      <input type="text" class="form-control" id="author" placeholder="Enter Author" name="Author">
    </div>
    
    <div class="mb-3 mt-3">
      <label for="content">Author</label>
      <textarea class="form-control" rows="5" id="content" name="Content"></textarea>
    </div>

    <div class="form-check mb-3">
      <label class="form-check-label">
        <input class="form-check-input" type="checkbox" name="Published"> Published
      </label>


      <div>
        <a href="editnew/{{$news->id}}">Edit</a>
      </div>
      <div>
      @if($news->published=== 1)
      <button type="ok" class="btn btn-primary">yes</button>
        @else
        <button type="not" class="btn btn-primary">no</button>
        @endif
</div>
    </div>
    <button type="submit" class="btn btn-primary">Add</button>
    @endforeach
  </form>
</div>

</body>
</html>

 -->


<!-- <!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>Hover Rows</h2>
  <p>The .table-hover class enables a hover state on table rows:</p>            
  <table class="table table-hover">
    <thead>
      <tr>
        <th>Title</th>
        <th>Author</th>
        <th>Content</th>
        <th>Published</th>
         <th>Edit</th>

      </tr>
    </thead>
    <tbody>
        @foreach($new as $news)
      <tr>
        <td>{{$news->title}}</td>
        <td>{{$news->description}}</td>
        <td>{{$news->pr}}</td>
        @if($news->published=== 1)
        <td>yes</td>
        @else
        <td>no</td>
        @endif

        <td><a href="editcar/{{$car->id}}">Edit</a></td>
        
      </tr>
      @endforeach
      <!-- <tr>
        <td>Mary</td>
        <td>Moe</td>
        <td>mary@example.com</td>
      </tr>
      <tr>
        <td>July</td>
        <td>Dooley</td>
        <td>july@example.com</td>
      </tr> -->
    <!-- </tbody>
  </table>
</div>

</body>
</html> -->















