<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="<?= base_url('assets/css/output.css'); ?>">

    <title><?= html_escape($title); ?> - Desa Terpadu</title>
</head>

<body class="bg-gray-100 text-gray-800 min-h-screen">

    <div class="admin-wrapper">

        <!-- SIDEBAR -->
        <?php $this->load->view('admin/sidebar'); ?>

        <!-- MAIN AREA -->
        <div class="ml-0 lg:ml-64">

            <!-- Topbar -->
            <header class="fixed top-0 right-0 left-0 lg:left-64 h-20 bg-white/95 border-b border-gray-200 flex items-center justify-between px-4 sm:px-8 z-40">
                <div>
                    <h2 class="text-xl font-bold text-gray-800">Dashboard</h2>
                    <p class="text-sm text-gray-400 mt-1">Kelola konten website Desa Terpadu</p>
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

            <!-- Content -->
            <main class="p-4 sm:p-8 pt-24 sm:pt-28 min-h-screen">

                <!-- Welcome Card -->
                <section class="bg-red-500 rounded-2xl p-7 text-white mb-7 shadow-lg">
                    <div class="flex items-center justify-between gap-6">
                        <div>
                            <p class="text-sm text-red-100 mb-1">Selamat datang kembali 👋</p>
                            <h3 class="text-3xl font-bold"><?= html_escape($name); ?></h3>
                            <p class="text-sm text-red-100 mt-2 leading-relaxed max-w-2xl">
                                Kelola informasi, artikel, testimoni, FAQ, dan konten website Desa Terpadu melalui panel admin.
                            </p>
                        </div>
                        <div class="text-6xl opacity-20 select-none">🏡</div>
                    </div>
                </section>

                <!-- Statistics -->
                <section class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-5 mb-8">
                    <!-- Artikel -->
                    <div class="bg-white border border-gray-200 rounded-2xl p-5 shadow-sm hover:shadow-md transition">
                        <div class="flex items-center justify-between gap-4">
                            <div>
                                <p class="text-sm text-gray-500">Artikel</p>
                                <h3 class="text-3xl font-bold text-gray-800 mt-1"><?= (int) $total_articles; ?></h3>
                                <p class="text-xs text-gray-400 mt-1">Total artikel</p>
                            </div>
                            <div class="w-12 h-12 rounded-xl bg-red-100 text-red-500 flex items-center justify-center">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z" />
                                </svg>
                            </div>
                        </div>
                    </div>

                    <!-- Testimoni -->
                    <div class="bg-white border border-gray-200 rounded-2xl p-5 shadow-sm hover:shadow-md transition">
                        <div class="flex items-center justify-between gap-4">
                            <div>
                                <p class="text-sm text-gray-500">Testimoni</p>
                                <h3 class="text-3xl font-bold text-gray-800 mt-1"><?= (int) $total_testimonials; ?></h3>
                                <p class="text-xs text-gray-400 mt-1">Total testimoni</p>
                            </div>
                            <div class="w-12 h-12 rounded-xl bg-green-100 text-green-500 flex items-center justify-center">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                                </svg>
                            </div>
                        </div>
                    </div>

                    <!-- FAQ -->
                    <div class="bg-white border border-gray-200 rounded-2xl p-5 shadow-sm hover:shadow-md transition">
                        <div class="flex items-center justify-between gap-4">
                            <div>
                                <p class="text-sm text-gray-500">FAQ</p>
                                <h3 class="text-3xl font-bold text-gray-800 mt-1"><?= (int) $total_faqs; ?></h3>
                                <p class="text-xs text-gray-400 mt-1">Total pertanyaan</p>
                            </div>
                            <div class="w-12 h-12 rounded-xl bg-purple-100 text-purple-500 flex items-center justify-center">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                        </div>
                    </div>

                    <!-- Pesan Masuk -->
                    <div class="bg-white border border-gray-200 rounded-2xl p-5 shadow-sm hover:shadow-md transition">
                        <div class="flex items-center justify-between gap-4">
                            <div>
                                <p class="text-sm text-gray-500">Pesan Masuk</p>
                                <h3 class="text-3xl font-bold text-gray-800 mt-1"><?= (int) $total_messages; ?></h3>
                                <p class="text-xs text-gray-400 mt-1">Pesan dari pengunjung</p>
                            </div>
                            <div class="w-12 h-12 rounded-xl bg-orange-100 text-orange-500 flex items-center justify-center">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4" />
                                </svg>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- Quick Access Header -->
                <section class="mb-4">
                    <h3 class="text-xl font-bold text-gray-800">Akses Cepat</h3>
                    <p class="text-sm text-gray-400 mt-1">Kelola konten website dengan cepat.</p>
                </section>

                <!-- Quick Access Cards -->
                <section class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5">
                    <!-- Artikel -->
                    <a href="<?= site_url('admin/articles'); ?>" class="block bg-white border border-gray-200 rounded-2xl p-5 hover:shadow-md hover:border-red-200 transition">
                        <div class="flex items-center justify-between">
                            <div class="w-12 h-12 rounded-xl bg-red-100 text-red-500 flex items-center justify-center">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z" />
                                </svg>
                            </div>
                            <span class="text-2xl text-gray-300">→</span>
                        </div>
                        <h4 class="mt-4 text-lg font-bold text-gray-800">Kelola Artikel</h4>
                        <p class="mt-1 text-sm text-gray-500">Tambah, edit, dan hapus artikel website.</p>
                    </a>

                    <!-- Testimoni -->
                    <a href="<?= site_url('admin/testimoni'); ?>" class="block bg-white border border-gray-200 rounded-2xl p-5 hover:shadow-md hover:border-red-200 transition">
                        <div class="flex items-center justify-between">
                            <div class="w-12 h-12 rounded-xl bg-green-100 text-green-500 flex items-center justify-center">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                                </svg>
                            </div>
                            <span class="text-2xl text-gray-300">→</span>
                        </div>
                        <h4 class="mt-4 text-lg font-bold text-gray-800">Kelola Testimoni</h4>
                        <p class="mt-1 text-sm text-gray-500">Kelola testimoni dari pengguna Desa Terpadu.</p>
                    </a>

                    <!-- FAQ -->
                    <a href="<?= site_url('admin/faq'); ?>" class="block bg-white border border-gray-200 rounded-2xl p-5 hover:shadow-md hover:border-red-200 transition">
                        <div class="flex items-center justify-between">
                            <div class="w-12 h-12 rounded-xl bg-purple-100 text-purple-500 flex items-center justify-center">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                            <span class="text-2xl text-gray-300">→</span>
                        </div>
                        <h4 class="mt-4 text-lg font-bold text-gray-800">Kelola FAQ</h4>
                        <p class="mt-1 text-sm text-gray-500">Kelola pertanyaan dan jawaban yang sering ditanyakan.</p>
                    </a>

                    <!-- Pesan Masuk -->
                    <a href="<?= site_url('admin/contact_messages'); ?>" class="block bg-white border border-gray-200 rounded-2xl p-5 hover:shadow-md hover:border-red-200 transition">
                        <div class="flex items-center justify-between">
                            <div class="w-12 h-12 rounded-xl bg-orange-100 text-orange-500 flex items-center justify-center">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4" />
                                </svg>
                            </div>
                            <span class="text-2xl text-gray-300">→</span>
                        </div>
                        <h4 class="mt-4 text-lg font-bold text-gray-800">Pesan Masuk</h4>
                        <p class="mt-1 text-sm text-gray-500">Lihat pesan dan konsultasi dari pengunjung.</p>
                    </a>

                    <!-- About -->
                    <a href="<?= site_url('admin/about'); ?>" class="block bg-white border border-gray-200 rounded-2xl p-5 hover:shadow-md hover:border-red-200 transition">
                        <div class="flex items-center justify-between">
                            <div class="w-12 h-12 rounded-xl bg-indigo-100 text-indigo-500 flex items-center justify-center">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                            <span class="text-2xl text-gray-300">→</span>
                        </div>
                        <h4 class="mt-4 text-lg font-bold text-gray-800">Tentang Desa Terpadu</h4>
                        <p class="mt-1 text-sm text-gray-500">Kelola informasi mengenai Desa Terpadu.</p>
                    </a>

                    <!-- Features -->
                    <a href="<?= site_url('admin/features'); ?>" class="block bg-white border border-gray-200 rounded-2xl p-5 hover:shadow-md hover:border-red-200 transition">
                        <div class="flex items-center justify-between">
                            <div class="w-12 h-12 rounded-xl bg-amber-100 text-amber-500 flex items-center justify-center">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.196-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.783-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z" />
                                </svg>
                            </div>
                            <span class="text-2xl text-gray-300">→</span>
                        </div>
                        <h4 class="mt-4 text-lg font-bold text-gray-800">Fitur Unggulan</h4>
                        <p class="mt-1 text-sm text-gray-500">Kelola fitur unggulan Desa Terpadu.</p>
                    </a>

                    <!-- Implementation -->
                    <a href="<?= site_url('admin/implementation'); ?>" class="block bg-white border border-gray-200 rounded-2xl p-5 hover:shadow-md hover:border-red-200 transition">
                        <div class="flex items-center justify-between">
                            <div class="w-12 h-12 rounded-xl bg-green-100 text-green-600 flex items-center justify-center">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                            </div>
                            <span class="text-2xl text-gray-300">→</span>
                        </div>
                        <h4 class="mt-4 text-lg font-bold text-gray-800">Implementation</h4>
                        <p class="mt-1 text-sm text-gray-500">Kelola langkah implementasi Desa Terpadu.</p>
                    </a>
                </section>

                <!-- Footer -->
                <footer class="mt-8 pt-5 border-t border-gray-200 flex flex-col sm:flex-row justify-between gap-4 text-xs text-gray-400">
                    <p>© <?= date('Y'); ?> Desa Terpadu</p>
                    <p>Admin Dashboard</p>
                </footer>

            </main>
        </div>
    </div>

</body>

</html>