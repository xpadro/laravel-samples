<?php require basePath('views/partials/head.php') ?>
<?php require basePath('views/partials/navbar.php') ?>
<?php require basePath('views/partials/title.php') ?>

<main>
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
        <ul>
            <?php foreach ($notes as $note): ?>
                <li>
                    <a href="/note?id=<?= $note['id'] ?>">
                        <?= htmlspecialchars($note['body']) ?>
                    </a>
                </li>
            <?php endforeach ?>
        </ul>

        <p class="mt-6">
            <a href="/notes/create" class="text-blue-500 hover:underline">Create new note</a>
        </p>
    </div>
</main>
<?php require basePath('views/partials/foot.php') ?>