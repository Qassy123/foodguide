<!DOCTYPE html>
<html>
<head>
    <title><?= esc($food['name']) ?></title>
</head>
<body>

<h1><?= esc($food['name']) ?></h1>

<p><?= esc($food['description']) ?></p>

<a href="/foods">Back to list</a>

</body>
</html>