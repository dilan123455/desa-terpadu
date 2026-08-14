<?php
$CI =& get_instance();
$currentClass  = strtolower($CI->router->fetch_class());
$currentMethod = strtolower($CI->router->fetch_method());
?>

<!-- ==================== NAVBAR HTML ==================== -->
<header class="fixed inset-x-0 top-0 z-[99999] w-full bg-[#cc4b4d]">
    <div class="mx-auto max-w-7xl px-4 sm:px-6">
        <div class="flex h-16 items-center justify-between">
            <!-- Logo -->
            <a href="<?= base_url('home') ?>" class="flex shrink-0 items-center">
                <img src="<?= base_url('assets/logo2.png'); ?>" alt="Desa Terpadu" class="h-10 w-auto">
            </a>

            <!-- Menu Desktop -->
            <nav class="hidden sm:block">
                <div class="flex space-x-0">
                    <a href="<?= base_url('home#hero') ?>" 
                       class="nav-link border-b-2 px-3 py-2 text-lg transition-colors duration-200 <?= ($currentClass === 'home' && $currentMethod === 'index') ? 'text-[#fff0c7] border-[#fff0c7]' : 'text-white border-transparent hover:text-[#fff0c7] hover:border-[#fff0c7]' ?>" 
                       data-section="hero">Home</a>

                    <a href="<?= base_url('home#about') ?>" 
                       class="nav-link border-b-2 px-3 py-2 text-lg transition-colors duration-200 text-white border-transparent hover:text-[#fff0c7] hover:border-[#fff0c7]" 
                       data-section="about">About</a>

                    <a href="<?= base_url('home#features') ?>" 
                       class="nav-link border-b-2 px-3 py-2 text-lg transition-colors duration-200 text-white border-transparent hover:text-[#fff0c7] hover:border-[#fff0c7]" 
                       data-section="features">Features</a>

                    <a href="<?= base_url('home#contact') ?>" 
                       class="nav-link border-b-2 px-3 py-2 text-lg transition-colors duration-200 text-white border-transparent hover:text-[#fff0c7] hover:border-[#fff0c7]" 
                       data-section="contact">Contact</a>

                    <a href="<?= base_url('blog') ?>" 
                       class="nav-link border-b-2 px-3 py-2 text-lg transition-colors duration-200 <?= ($currentClass === 'blog' && $currentMethod === 'index') ? 'text-[#fff0c7] border-[#fff0c7]' : 'text-white border-transparent hover:text-[#fff0c7] hover:border-[#fff0c7]' ?>">Blog</a>

                    <a href="<?= base_url('faq') ?>" 
                       class="nav-link border-b-2 px-3 py-2 text-lg transition-colors duration-200 <?= ($currentClass === 'faq' && $currentMethod === 'index') ? 'text-[#fff0c7] border-[#fff0c7]' : 'text-white border-transparent hover:text-[#fff0c7] hover:border-[#fff0c7]' ?>">FAQ</a>
                </div>
            </nav>

            <!-- Tombol Mobile dengan onclick langsung -->
            <button id="menu-button" type="button" 
                    onclick="toggleMobileMenu()" 
                    class="rounded-md bg-[#c64648] p-2 text-white sm:hidden">
                <svg class="h-7 w-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                </svg>
            </button>
        </div>
    </div>

    <!-- Menu Mobile -->
    <nav id="mobile-menu" class="hidden border-t border-white/20 sm:hidden">
        <div class="flex flex-col items-center py-5">
            <a href="<?= base_url('home#hero') ?>" 
               class="mobile-nav-link nav-link border-b-2 py-3 text-lg transition-colors duration-200 <?= ($currentClass === 'home' && $currentMethod === 'index') ? 'text-[#fff0c7] border-[#fff0c7]' : 'text-white border-transparent hover:text-[#fff0c7] hover:border-[#fff0c7]' ?>" 
               data-section="hero">Home</a>
            <a href="<?= base_url('home#about') ?>" class="mobile-nav-link nav-link border-b-2 py-3 text-lg transition-colors duration-200 text-white border-transparent hover:text-[#fff0c7] hover:border-[#fff0c7]" data-section="about">About</a>
            <a href="<?= base_url('home#features') ?>" class="mobile-nav-link nav-link border-b-2 py-3 text-lg transition-colors duration-200 text-white border-transparent hover:text-[#fff0c7] hover:border-[#fff0c7]" data-section="features">Features</a>
            <a href="<?= base_url('home#contact') ?>" class="mobile-nav-link nav-link border-b-2 py-3 text-lg transition-colors duration-200 text-white border-transparent hover:text-[#fff0c7] hover:border-[#fff0c7]" data-section="contact">Contact</a>
            <a href="<?= base_url('blog') ?>" 
               class="mobile-nav-link nav-link border-b-2 py-3 text-lg transition-colors duration-200 <?= ($currentClass === 'blog' && $currentMethod === 'index') ? 'text-[#fff0c7] border-[#fff0c7]' : 'text-white border-transparent hover:text-[#fff0c7] hover:border-[#fff0c7]' ?>">Blog</a>
            <a href="<?= base_url('faq') ?>" 
               class="mobile-nav-link nav-link border-b-2 py-3 text-lg transition-colors duration-200 <?= ($currentClass === 'faq' && $currentMethod === 'index') ? 'text-[#fff0c7] border-[#fff0c7]' : 'text-white border-transparent hover:text-[#fff0c7] hover:border-[#fff0c7]' ?>">FAQ</a>
        </div>
    </nav>
</header>

<script>
    // === FUNGSI GLOBAL UNTUK TOGGLE MENU MOBILE ===
    // Didefinisikan di luar DOMContentLoaded agar selalu tersedia
    function toggleMobileMenu() {
        var mobileMenu = document.getElementById('mobile-menu');
        if (mobileMenu) {
            mobileMenu.classList.toggle('hidden');
        }
    }

    // Tutup menu mobile saat link di dalamnya diklik
    document.addEventListener('click', function(e) {
        if (e.target.closest('.mobile-nav-link')) {
            var mobileMenu = document.getElementById('mobile-menu');
            if (mobileMenu) {
                mobileMenu.classList.add('hidden');
            }
        }
    });

    // === SCROLLSPY & NAVIGASI HALAMAN HOME ===
    document.addEventListener('DOMContentLoaded', function() {
        const activeClasses   = ['text-[#fff0c7]', 'border-[#fff0c7]'];
        const inactiveClasses = ['text-white', 'border-transparent', 'hover:text-[#fff0c7]', 'hover:border-[#fff0c7]'];

        function setActiveLink(sectionId) {
            document.querySelectorAll('.nav-link[data-section]').forEach(link => {
                const isActive = link.dataset.section === sectionId;
                link.classList.remove(...activeClasses, ...inactiveClasses);
                link.classList.add(...(isActive ? activeClasses : inactiveClasses));
            });
        }

        // Klik pada link dengan data-section
        document.querySelectorAll('.nav-link[data-section]').forEach(link => {
            link.addEventListener('click', function (e) {
                const targetUrl = new URL(this.href);
                const currentUrl = new URL(window.location.href);
                if (targetUrl.pathname === currentUrl.pathname) {
                    e.preventDefault();
                    const target = document.querySelector(targetUrl.hash);
                    if (target) {
                        const y = target.getBoundingClientRect().top + window.pageYOffset - 80;
                        window.scrollTo({ top: y, behavior: 'smooth' });
                        history.pushState(null, null, targetUrl.hash);
                        setActiveLink(this.dataset.section);
                    }
                }
            });
        });

        // Scrollspy hanya di halaman yang memiliki section
        function initScrollspy() {
            const sections = document.querySelectorAll('section[id]');
            if (!sections.length) return;
            const observer = new IntersectionObserver(entries => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) setActiveLink(entry.target.id);
                });
            }, { rootMargin: '-20% 0px -70% 0px' });
            sections.forEach(section => observer.observe(section));
        }

        // Inisialisasi saat halaman dimuat
        const isHomePage = document.querySelector('section#hero') !== null;
        if (isHomePage) {
            if (window.location.hash) {
                const target = document.querySelector(window.location.hash);
                if (target) {
                    setTimeout(() => {
                        const y = target.getBoundingClientRect().top + window.pageYOffset - 80;
                        window.scrollTo({ top: y, behavior: 'smooth' });
                        setActiveLink(window.location.hash.substring(1));
                    }, 100);
                }
            } else {
                setActiveLink('hero');
            }
            initScrollspy();
        }
    });
</script>