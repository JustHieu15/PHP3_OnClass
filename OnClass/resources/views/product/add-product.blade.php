<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
<div class="container">
    <form class="row g-3" method="post" action="{{ route('products.createProduct') }}">
        @csrf
        <div class="col-12">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" name="name">
        </div>
        <div class="col-12">
            <label for="price" class="form-label">Price</label>
            <input type="text" class="form-control" name="price">
        </div>
        <div class="col-12">
            <label for="category" class="form-label">Category</label>
            <select name="category" class="form-select">
                <option value="">Choose</option>
                @foreach($category as $value)
                    <option value="{{ $value->id }}">{{ $value->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-12">
            <label for="view" class="form-label">View</label>
            <input type="text" class="form-control" name="view">
        </div>
        <div class="col-12 mt-5">
            <button type="submit" class="btn btn-primary" name="submit">Add</button>
        </div>
    </form>
</div>
</body>
</html>
