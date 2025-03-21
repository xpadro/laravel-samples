<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>MySQL Basics App</title>
</head>
<body>
    <?php require('partials/title.php') ?>
    <?php
        foreach ($posts as $post) {
            echo "<li> {$post['title']} </li>";

        }
    ?>
</body>
</html>