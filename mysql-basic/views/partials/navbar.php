<nav class="bg-gray-800">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="flex h-16 items-center justify-between">
            <div class="flex items-center">
                <div class="hidden md:block">
                    <div class="ml-10 flex items-baseline space-x-4">
                        <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
                        <a href="/" class="<?= isUrl('/') ? 'bg-gray-900 text-white' : 'text-gray-300' ?> rounded-md px-3 py-2 text-sm font-medium hover:bg-gray-700 hover:text-white" aria-current="page">Home</a>
                        <a href="/notes" class="<?php if ($_SERVER['REQUEST_URI'] === '/notes') { echo 'bg-gray-900 text-white';} else { echo 'text-gray-300';} ?> rounded-md px-3 py-2 text-sm font-medium hover:bg-gray-700 hover:text-white" aria-current="page">Notes</a>
                    </div>
                </div>
            </div>

            <div class="relative ml-3">
                <?php if ($_SESSION['user'] ?? false) : ?>
                    <span class="text-white">Signed in</span>

                <?php else : ?>
                    <a href="/register" class="text-white">Register</a>

                <?php endif; ?>
            </div>
        </div>
    </div>
</nav>