<!DOCTYPE html>
<html>
<head>
    <title>Food Guide</title>
</head>
<body>

<h1>Food Guide</h1>

<ul>
    <?php foreach ($foods as $food): ?>
        <li><?= esc($food) ?></li>
    <?php endforeach; ?>
</ul>

</body>
</html>