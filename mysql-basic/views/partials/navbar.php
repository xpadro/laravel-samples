<nav class="bg-gray-800">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="flex h-16 items-center justify-between">
            <div class="flex items-center">
                <div class="hidden md:block">
                    <div class="ml-10 flex items-baseline space-x-4">
                        <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
                        <a href="/" class="<?= isUrl('/') ? 'bg-gray-900 text-white' : 'text-gray-300' ?> rounded-md px-3 py-2 text-sm font-medium hover:bg-gray-700 hover:text-white" aria-current="page">Home</a>
                        <?php if ($_SESSION['user'] ?? false) : ?>
                            <a href="/notes" class="<?php if ($_SERVER['REQUEST_URI'] === '/notes') { echo 'bg-gray-900 text-white';} else { echo 'text-gray-300';} ?> rounded-md px-3 py-2 text-sm font-medium hover:bg-gray-700 hover:text-white" aria-current="page">Notes</a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

            <?php if (!$_SESSION['user'] ?? false) : ?>
                <div class="relative ml-3">
                    <a href="/register" class="<?= isUrl('/register') ? 'bg-gray-900 text-white' : 'text-gray-300' ?> rounded-md px-3 py-2 text-sm font-medium hover:bg-gray-700 hover:text-white" aria-current="page">Register</a>
                    <a href="/login" class="<?= isUrl('/login') ? 'bg-gray-900 text-white' : 'text-gray-300' ?> rounded-md px-3 py-2 text-sm font-medium hover:bg-gray-700 hover:text-white" aria-current="page">Log In</a>
                </div>
            <?php endif; ?>

            <?php if ($_SESSION['user'] ?? false) : ?>
                <div class="relative ml-3">
                    <form action="/sessions" method="POST">
                        <input type="hidden" name="_method" value="DELETE">
                        <button class="text-white">Log Out</button>
                    </form>
                </div>
            <?php endif; ?>

        </div>
    </div>
</nav>