<?php
// Ambil segment URL untuk menentukan menu aktif
// Contoh: admin/dashboard -> segment 2 = dashboard
//         admin/articles  -> segment 2 = articles
$current = $this->uri->segment(2);
?>
<!-- =========================================================
     SIDEBAR (hanya tampil di desktop lg ke atas)
========================================================== -->
<aside class="fixed top-0 left-0 bottom-0 w-64 bg-white border-r border-gray-200 flex-col z-50 hidden lg:flex">
    <!-- Logo -->
    <div class="h-20 px-6 flex items-center border-b border-gray-200">
        <div class="w-10 h-10 rounded-xl bg-red-500 flex items-center justify-center text-white text-xl font-bold">
            D
        </div>
        <div class="ml-3">
            <h1 class="text-base font-bold text-gray-800 leading-tight">Desa Terpadu</h1>
            <p class="text-xs text-gray-400 mt-1">Admin Panel</p>
        </div>
    </div>

    <!-- Navigation -->
    <nav class="flex-1 px-4 py-6 overflow-y-auto">
        <p class="px-3 mb-2 text-xs font-bold text-gray-400 uppercase tracking-wider">Menu Utama</p>

        <!-- Dashboard -->
        <a href="<?= site_url('admin/dashboard'); ?>"
            class="flex items-center gap-3 w-full px-3 py-2.5 rounded-lg text-sm font-medium transition mt-1 <?= $current === 'dashboard' ? 'bg-red-50 text-red-500' : 'text-gray-500 hover:bg-red-50 hover:text-red-500'; ?>">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M3 12l9-9 9 9M5 10v10a1 1 0 001 1h3a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1h3a1 1 0 001-1V10" />
            </svg>
            <span>Dashboard</span>
        </a>

        <!-- Artikel -->
        <a href="<?= site_url('admin/articles'); ?>"
            class="flex items-center gap-3 w-full px-3 py-2.5 rounded-lg text-sm font-medium transition mt-1 <?= $current === 'articles' ? 'bg-red-50 text-red-500' : 'text-gray-500 hover:bg-red-50 hover:text-red-500'; ?>">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z" />
            </svg>
            <span>Artikel</span>
        </a>

        <!-- Testimoni -->
        <a href="<?= site_url('admin/testimoni'); ?>"
            class="flex items-center gap-3 w-full px-3 py-2.5 rounded-lg text-sm font-medium transition mt-1 <?= $current === 'testimoni' ? 'bg-red-50 text-red-500' : 'text-gray-500 hover:bg-red-50 hover:text-red-500'; ?>">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
            </svg>
            <span>Testimoni</span>
        </a>

        <!-- FAQ -->
        <a href="<?= site_url('admin/faq'); ?>"
            class="flex items-center gap-3 w-full px-3 py-2.5 rounded-lg text-sm font-medium transition mt-1 <?= $current === 'faq' ? 'bg-red-50 text-red-500' : 'text-gray-500 hover:bg-red-50 hover:text-red-500'; ?>">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            <span>FAQ</span>
        </a>

        <!-- Contact (menggantikan Pesan Masuk) -->
        <a href="<?= site_url('admin/contact'); ?>"
            class="flex items-center gap-3 w-full px-3 py-2.5 rounded-lg text-sm font-medium transition mt-1 <?= $current === 'contact' ? 'bg-red-50 text-red-500' : 'text-gray-500 hover:bg-red-50 hover:text-red-500'; ?>">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
            </svg>
            <span>Contact</span>
        </a>

        <!-- Konten Website -->
        <div class="mt-6">
            <p class="px-3 mb-2 text-xs font-bold text-gray-400 uppercase tracking-wider">Konten Website</p>

            <!-- About -->
            <a href="<?= site_url('admin/about'); ?>"
                class="flex items-center gap-3 w-full px-3 py-2.5 rounded-lg text-sm font-medium transition <?= $current === 'about' ? 'bg-red-50 text-red-500' : 'text-gray-500 hover:bg-red-50 hover:text-red-500'; ?>">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <span>About</span>
            </a>

            <!-- Features -->
            <a href="<?= site_url('admin/features'); ?>"
                class="flex items-center gap-3 w-full px-3 py-2.5 rounded-lg text-sm font-medium transition mt-1 <?= $current === 'features' ? 'bg-red-50 text-red-500' : 'text-gray-500 hover:bg-red-50 hover:text-red-500'; ?>">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.196-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.783-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z" />
                </svg>
                <span>Features</span>
            </a>

            <!-- Implementation -->
            <a href="<?= site_url('admin/implementation'); ?>"
                class="flex items-center gap-3 w-full px-3 py-2.5 rounded-lg text-sm font-medium transition mt-1 <?= $current === 'implementation' ? 'bg-red-50 text-red-500' : 'text-gray-500 hover:bg-red-50 hover:text-red-500'; ?>">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                </svg>
                <span>Implementation</span>
            </a>
        </div>
    </nav>

    <!-- Logout -->
    <div class="p-4 border-t border-gray-200">
        <a href="<?= site_url('auth/logout'); ?>"
            class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-red-600 text-sm font-medium hover:bg-red-50 transition">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
            </svg>
            <span>Logout</span>
        </a>
    </div>
</aside>