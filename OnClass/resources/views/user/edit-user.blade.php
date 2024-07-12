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
    <form class="row g-3" method="post" action="{{ route('users.updateUser', $user->id) }}">
        @csrf
        <div class="col-12">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" name="name" value="{{ $user->name }}">
        </div>
        <div class="col-12">
            <label for="email" class="form-label">Email</label>
            <input type="text" class="form-control" name="email" value="{{ $user->email }}">
        </div>
        <div class="col-12">
            <label for="phongban" class="form-label">Department</label>
            <select name="phongban" class="form-select">
                @foreach($phongBan as $value)
                    <option value="{{ $value->id }}" {{ $user->phongban_id === $value->id ? 'selected' : '' }}>{{ $value->ten_donvi }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-12">
            <label for="age" class="form-label">Age</label>
            <input type="text" class="form-control" name="age" value="{{ $user->tuoi }}">
        </div>
        <div class="col-12 mt-5">
            <button type="submit" class="btn btn-primary" name="submit">Update</button>
        </div>
    </form>
</div>
</body>
</html>



