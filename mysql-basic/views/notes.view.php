<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>MySQL Basics App</title>
</head>
<body>
    <?php require('partials/title.php') ?>
    <?php foreach ($notes as $note): ?>
        <li>
            <a href="/notes?id=<?= $note['id'] ?>">
                <?= $note['body'] ?>
            </a>
        </li>
    <?php endforeach ?>
</body>
</html>