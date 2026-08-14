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
                    <h1 class="text-xl font-bold text-gray-800"><?= html_escape($title); ?></h1>
                    <p class="text-sm text-gray-400 mt-1">Kelola informasi tentang Desa Terpadu</p>
                </div>

                <div class="flex items-center gap-3">
                    <div class="text-right hidden sm:block">
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

                <!-- Page Header -->
                <div class="mb-6">
                    <h2 class="text-2xl font-bold text-gray-800">Tentang Desa Terpadu</h2>
                    <p class="text-sm text-gray-500 mt-1">Informasi ini akan digunakan pada bagian About di website Desa Terpadu.</p>
                </div>

                <?php if (!empty($about)): ?>

                    <!-- ==================== ABOUT CARD ==================== -->
                    <div class="bg-white border border-gray-200 rounded-2xl shadow-sm overflow-hidden">

                        <!-- Card Header -->
                        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 px-6 py-5 border-b border-gray-200">
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 rounded-lg bg-red-50 text-red-500 flex items-center justify-center">
                                    <!-- Ikon Information Circle -->
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                </div>
                                <div>
                                    <h3 class="text-base font-semibold text-gray-800">Informasi Utama</h3>
                                    <p class="text-xs text-gray-400 mt-0.5">Data yang ditampilkan pada halaman About</p>
                                </div>
                            </div>

                            <a href="<?= site_url('admin/about/edit'); ?>"
                                class="inline-flex items-center gap-2 px-4 py-2 bg-red-500 text-white rounded-lg text-sm font-semibold shadow-md hover:bg-red-600 transition whitespace-nowrap">
                                <!-- Ikon Pencil -->
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                </svg>
                                Edit Informasi
                            </a>
                        </div>

                        <!-- Card Body -->
                        <div class="p-6 space-y-6">

                            <!-- Judul -->
                            <div>
                                <span class="flex items-center gap-2 text-xs font-bold text-gray-500 uppercase tracking-wider mb-2">
                                    <!-- Ikon Document Text -->
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                    </svg>
                                    Judul
                                </span>
                                <div class="px-4 py-3 bg-gray-50 border border-gray-200 rounded-lg text-base font-semibold text-gray-800 leading-relaxed">
                                    <?= html_escape($about->title); ?>
                                </div>
                            </div>

                            <!-- Deskripsi -->
                            <div>
                                <span class="flex items-center gap-2 text-xs font-bold text-gray-500 uppercase tracking-wider mb-2">
                                    <!-- Ikon Clipboard List -->
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4" />
                                    </svg>
                                    Deskripsi
                                </span>
                                <div class="px-4 py-3 bg-gray-50 border border-gray-200 rounded-lg text-sm text-gray-700 leading-relaxed">
                                    <?= nl2br(html_escape($about->description)); ?>
                                </div>
                            </div>

                        </div>

                    </div>

                    <!-- ==================== SLIDES CARD ==================== -->
                    <div class="bg-white border border-gray-200 rounded-2xl shadow-sm overflow-hidden mt-6">

                        <!-- Slides Card Header -->
                        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 px-6 py-5 border-b border-gray-200">
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 rounded-lg bg-red-50 text-red-500 flex items-center justify-center">
                                    <!-- Ikon Photograph -->
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                    </svg>
                                </div>
                                <div>
                                    <h3 class="text-base font-semibold text-gray-800">Gambar Carousel</h3>
                                    <p class="text-xs text-gray-400 mt-0.5">Gambar yang ditampilkan pada bagian About website.</p>
                                </div>
                            </div>

                            <!-- Tombol Tambah Slide -->
                            <a href="<?= site_url('admin/about/slide_create'); ?>"
                                class="inline-flex items-center gap-2 px-4 py-2 bg-red-500 text-white rounded-lg text-sm font-semibold shadow-md hover:bg-red-600 transition whitespace-nowrap self-start sm:self-center">
                                <!-- Ikon Plus -->
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                                </svg>
                                Tambah Slide
                            </a>
                        </div>

                        <?php if (!empty($slides)): ?>

                            <!-- Slides List -->
                            <div class="p-6 divide-y divide-gray-100">
                                <?php foreach ($slides as $slide): ?>
                                    <div class="flex flex-col sm:flex-row sm:items-center gap-4 py-4 first:pt-0 last:pb-0">

                                        <!-- Gambar -->
                                        <div class="w-full sm:w-[180px] flex-shrink-0">
                                            <img src="<?= base_url('assets/uploads/about/' . $slide->image); ?>"
                                                alt="<?= html_escape($slide->title); ?>"
                                                class="w-full h-[100px] object-cover rounded-lg border border-gray-200">
                                        </div>

                                        <!-- Informasi -->
                                        <div class="flex-1">
                                            <div class="text-sm font-semibold text-gray-800 mb-1">
                                                <?= html_escape($slide->title); ?>
                                            </div>
                                            <div class="text-xs text-gray-500 mb-1">
                                                File: <?= html_escape($slide->image); ?>
                                            </div>
                                            <div class="text-xs text-gray-500">
                                                Urutan: <?= html_escape($slide->sort_order); ?>
                                            </div>
                                        </div>

                                        <!-- Edit Slide -->
                                        <div>
                                            <a href="<?= site_url('admin/about/edit_slide/' . $slide->id); ?>"
                                                class="inline-flex items-center gap-2 px-4 py-2 bg-red-500 text-white rounded-lg text-sm font-semibold shadow-md hover:bg-red-600 transition whitespace-nowrap">
                                                <!-- Ikon Pencil -->
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                                </svg>
                                                Edit
                                            </a>
                                        </div>

                                    </div>
                                <?php endforeach; ?>
                            </div>

                        <?php else: ?>

                            <!-- Empty Slides -->
                            <div class="p-8 text-center">
                                <div class="w-14 h-14 mx-auto mb-3 rounded-full bg-gray-100 text-gray-400 flex items-center justify-center">
                                    <!-- Ikon Photograph -->
                                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                    </svg>
                                </div>
                                <p class="text-sm text-gray-500">Belum ada gambar carousel.</p>
                                <a href="<?= site_url('admin/about/slide_create'); ?>"
                                    class="mt-4 inline-flex items-center gap-2 px-4 py-2 bg-red-500 text-white rounded-lg text-sm font-semibold shadow-md hover:bg-red-600 transition">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                                    </svg>
                                    Tambah Slide
                                </a>
                            </div>

                        <?php endif; ?>

                    </div>

                <?php else: ?>

                    <!-- Empty State About -->
                    <div class="bg-white border border-gray-200 rounded-2xl shadow-sm overflow-hidden">
                        <div class="p-8 text-center">
                            <div class="w-16 h-16 mx-auto mb-4 rounded-full bg-red-50 text-red-500 flex items-center justify-center">
                                <!-- Ikon Information Circle -->
                                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                            <strong class="block text-sm font-semibold text-gray-700">Data Tentang Desa Terpadu Belum Tersedia</strong>
                            <p class="mt-2 text-sm text-gray-500">Silakan tambahkan informasi About terlebih dahulu.</p>
                        </div>
                    </div>

                <?php endif; ?>

                <!-- Footer -->
                <footer class="mt-8 pt-5 border-t border-gray-200 flex flex-col sm:flex-row justify-between gap-4 text-xs text-gray-400">
                    <p>© <?= date('Y'); ?> Desa Terpadu</p>
                    <p>Admin Panel</p>
                </footer>

            </main>
        </div>
    </div>

</body>

</html>