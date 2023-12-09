<!DOCTYPE html>
<html lang="en">
<head>
    <title>Add Car</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
    <h2>Add Place</h2>
    <form action="{{route('storePlace')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="title">Title:</label>
            <input type="text" class="form-control" id="title" placeholder="Enter title" name="title" value="{{ old('title') }}">
            @error('carTitle')
            <div class="alert alert-warning">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="price">Start Price:</label>
            <input type="number" class="form-control" id="price" placeholder="Enter Price" name="startPrice" value="{{ old('startPrice') }}">
        </div>
        <div class="form-group">
            <label for="price">End Price:</label>
            <input type="number" class="form-control" id="price" placeholder="Enter Price" name="endPrice" value="{{ old('endPrice') }}">
        </div>
        <div class="form-group">
            <label for="description">Description:</label>
            <textarea class="form-control" rows="5" id="description" name="description">{{ old('description') }}</textarea>
            @error('description')
                {{ $message }}
            @enderror
        </div>
        <div class="form-group">
            <label for="image">Image:</label>
            <input type="file" class="form-control" id="image" name="image" value="{{ old('image') }}">
            @error('image')
                {{ $message }}
            @enderror
        </div>
      
        <button type="submit" class="btn btn-default">Add</button>
    </form>
</div>

</body>
</html>
