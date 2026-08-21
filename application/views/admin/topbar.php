<?php
// Ambil data user dari session
$name = $this->session->userdata('name');

// Default judul halaman jika tidak di-set
$page_title = isset($page_title) ? $page_title : 'Dashboard';
$page_subtitle = isset($page_subtitle) ? $page_subtitle : 'Kelola konten website Desa Terpadu';
?>

<header class="fixed top-0 right-0 left-0 lg:left-64 h-20 bg-white/95 border-b border-gray-200 flex items-center justify-between px-4 sm:px-8 z-30">
    <div class="flex items-center gap-3">
        <!-- Tombol hamburger (hanya mobile) -->
        <button type="button" id="hamburger" class="lg:hidden p-2 rounded-md bg-white shadow-md text-gray-600 hover:text-red-500 transition">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
            </svg>
        </button>

        <!-- Judul & Subjudul -->
        <div>
            <h2 class="text-xl font-bold text-gray-800"><?= html_escape($page_title); ?></h2>
            <p class="text-sm text-gray-400 mt-1"><?= html_escape($page_subtitle); ?></p>
        </div>
    </div>

    <div class="flex items-center gap-3">
        <div class="text-right">
            <p class="text-sm font-semibold text-gray-800"><?= html_escape($name); ?></p>
            <p class="text-xs text-gray-400 mt-1">Administrator</p>
        </div>
        <div class="w-10 h-10 rounded-full bg-red-500 flex items-center justify-center text-white text-sm font-bold">
            <?= strtoupper(substr(html_escape($name), 0, 1)); ?>
        </div>
    </div>
</header>