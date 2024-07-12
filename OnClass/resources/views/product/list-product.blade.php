<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <title>Document</title>
</head>
<body>

<div class="container">
    <form class="d-flex" role="search" action="{{ route('products.searchProduct') }}" method="get">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search">
        <button class="btn btn-outline-success" type="submit">Search</button>
    </form>
    <a href="{{ route('products.addProduct') }}" class="btn btn-primary">ADD</a>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">NAME</th>
            <th scope="col">PRICE</th>
            <th scope="col">CATEGORY</th>
            <th scope="col">VIEW</th>
            <th scope="col">ACTION</th>
        </tr>
        </thead>

        <tbody>
        @foreach($list as $value)
            {{--            @dd($list)--}}
            <tr>
                <td>{{ $value->id }}</td>
                <td>{{ $value->name }}</td>
                <td>{{ $value->price }}</td>
                <td>{{ $value->category_name }}</td>
                <td>{{ $value->view }}</td>
                <td>
                    <a href="{{ route('products.deleteProduct', $value->id) }}" class="btn btn-danger" onclick="return confirm('U sure?')">DELETE</a>
                    <a href="{{ route('products.editProduct', $value->id) }}" class="btn btn-warning">UPDATE</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
</body>
</html>
