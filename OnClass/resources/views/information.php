<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<table border="1">
    <thead>
        <tr>
            <td>NAME</td>
            <td>AGE</td>
            <td>OCCUPATION</td>
        </tr>
    </thead>

    <tbody>
        <tr>
            <td><?= $info['name'] ?></td>
            <td><?= $info['age'] ?></td>
            <td><?= $info['occupation'] ?></td>
        </tr>
    </tbody>
</table>
</body>
</html>
