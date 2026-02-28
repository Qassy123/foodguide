<!DOCTYPE html>
<html>
<head>
    <title><?= esc($takeaway['name']) ?></title>
</head>
<body>

<h1><?= esc($takeaway['name']) ?></h1>

<p>Category: <?= esc($takeaway['category']) ?></p>

<p><?= esc($takeaway['description']) ?></p>

<a href="/takeaways">Back</a>

</body>
</html>