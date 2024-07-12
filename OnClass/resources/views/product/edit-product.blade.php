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
    <form class="row g-3" method="post" action="{{ route('products.updateProduct', $product->id) }}">
        @csrf
        <div class="col-12">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" name="name" value="{{ $product->name }}">
        </div>
        <div class="col-12">
            <label for="price" class="form-label">price</label>
            <input type="text" class="form-control" name="price" value="{{ $product->price }}">
        </div>
        <div class="col-12">
            <label for="category" class="form-label">Department</label>
            <select name="category" class="form-select">
                @foreach($category as $value)
                    <option value="{{ $value->id }}" {{ $product->category_id === $value->id ? 'selected' : '' }}>{{ $value->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-12">
            <label for="view" class="form-label">View</label>
            <input type="text" class="form-control" name="view" value="{{ $product->view }}">
        </div>
        <div class="col-12 mt-5">
            <button type="submit" class="btn btn-primary" name="submit">Update</button>
        </div>
    </form>
</div>
</body>
</html>
