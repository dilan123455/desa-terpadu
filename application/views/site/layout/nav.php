<?php
function menuActive($controller, $method = 'index') {
    $CI =& get_instance();
    $currentClass  = strtolower($CI->router->fetch_class());
    $currentMethod = strtolower($CI->router->fetch_method());

    $isActive = ($currentClass === $controller && $currentMethod === $method);

    return $isActive
        ? 'text-[#fff0c7] border-[#fff0c7]'
        : 'text-white border-transparent hover:text-[#fff0c7] hover:border-[#fff0c7]';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="<?= base_url('assets/css/output.css'); ?>">
</head>
<body>

<!-- Header -->
<header class="bg-[#cc4b4d]">
    <div class="max-w-7xl mx-auto px-4 sm:px-15">
        <div class="h-18 flex items-center justify-between">

            <!-- Logo -->
            <div class="flex shrink-0 items-center">
                <img src="https://tailwindcss.com/plus-assets/img/logos/mark.svg?color=indigo&shade=500"
                     alt="Desa Terpadu" class="h-12 w-auto" />
                <span class="ml-3 text-xl font-bold text-white">Desa Terpadu</span>
            </div>

            <!-- Desktop Menu -->
            <div class="hidden sm:block">
                <div class="flex space-x-0">

                    <a href="<?= base_url('home'); ?>"
                       class="nav-link px-3 py-2 text-lg font-normal border-b-3 transition-colors duration-200  <?= menuActive('home', 'index'); ?>">
                        Home
                    </a>

                    <a href="<?= base_url('about'); ?>"
                       class="nav-link px-3 py-2 text-lg font-normal border-b-3 transition-colors duration-200 <?= menuActive('about'); ?>">
                        About
                    </a>

                    <a href="<?= base_url('features'); ?>"
                       class="nav-link px-3 py-2 text-lg font-normal border-b-3 transition-colors duration-200 <?= menuActive('features'); ?>">
                        Features
                    </a>

                    <a href="<?= base_url('contact'); ?>"
                       class="nav-link px-3 py-2 text-lg font-normal border-b-3 transition-colors duration-200 <?= menuActive('contact'); ?>">
                        Contact
                    </a>

                    <a href="<?= base_url('blog'); ?>"
                       class="nav-link px-3 py-2 text-lg font-normal border-b-3 transition-colors duration-200 <?= menuActive('blog'); ?>">
                        Blog
                    </a>

                    <a href="<?= base_url('faq'); ?>"
                       class="nav-link px-3 py-2 text-lg font-normal border-b-3 transition-colors duration-200 <?= menuActive('faq'); ?>">
                        FAQ
                    </a>

                </div>
            </div>

            <!-- Mobile Button -->
            <button id="menu-button" type="button"
                    class="sm:hidden p-2 rounded-md text-white bg-[#c64648]">
                <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                </svg>
            </button>

        </div>
    </div>

    <!-- Mobile Menu -->
    <div id="mobile-menu" class="hidden sm:hidden border-t border-white/20">
        <div class="flex flex-col items-center py-5">

            <a href="<?= base_url(); ?>"
               class="nav-link py-3 text-lg border-b-2 transition-colors duration-200  <?= menuActive('home', 'index'); ?>">
                Home
            </a>
            <a href="<?= base_url('about'); ?>"
               class="nav-link py-3 text-lg border-b-2 transition-colors duration-200 <?= menuActive('about'); ?>">
                About
            </a>
            <a href="<?= base_url('features'); ?>"
               class="nav-link py-3 text-lg border-b-2 transition-colors duration-200 <?= menuActive('features'); ?>">
                Features
            </a>
            <a href="<?= base_url('contact'); ?>"
               class="nav-link py-3 text-lg border-b-2 transition-colors duration-200 <?= menuActive('contact'); ?>">
                Contact
            </a>
            <a href="<?= base_url('blog'); ?>"
               class="nav-link py-3 text-lg border-b-2 transition-colors duration-200 <?= menuActive('blog'); ?>">
                Blog
            </a>
            <a href="<?= base_url('faq'); ?>"
               class="nav-link py-3 text-lg border-b-2 transition-colors duration-200 <?= menuActive('faq'); ?>">
                FAQ
            </a>

        </div>
    </div>

</header>

<!-- JavaScript (HANYA untuk toggle mobile menu, click handler DIHAPUS) -->
<script>
    const menuButton = document.getElementById('menu-button');
    const mobileMenu = document.getElementById('mobile-menu');
    menuButton.addEventListener('click', function () {
        mobileMenu.classList.toggle('hidden');
    });
</script>

</body>
</html>