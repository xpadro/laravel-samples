<?php require('partials/head.php') ?>
<?php require('partials/navbar.php') ?>
<?php require('partials/title.php') ?>

<main>
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
        <p>
            <h3 class="font-bold">Detail</h3>
            <?= htmlspecialchars($note['body']) ?>
        </p>

    </div>
</main>
<?php require('partials/foot.php') ?>