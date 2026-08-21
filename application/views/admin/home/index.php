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

            <!-- TOPBAR (dipisah) -->
            <?php $this->load->view('admin/topbar'); ?>

            <!-- CONTENT -->
            <main class="p-4 sm:p-8 pt-24 sm:pt-28 min-h-screen">

                <!-- PAGE HEADER -->
                <div class="mb-6">
                    <h2 class="text-2xl font-bold text-gray-800">Halaman Home</h2>
                    <p class="text-sm text-gray-500 mt-1">Kelola bagian Hero dan Tantangan Desa yang tampil pada halaman utama website.</p>
                </div>

                <!-- FLASH MESSAGE -->
                <?php if ($this->session->flashdata('success')): ?>
                    <div class="mb-6 px-4 py-3 bg-green-50 border border-green-200 text-green-700 rounded-lg text-sm">
                        <?= html_escape($this->session->flashdata('success')); ?>
                    </div>
                <?php endif; ?>

                <!-- =====================================================
                     HERO
                ====================================================== -->
                <div class="bg-white border border-gray-200 rounded-2xl shadow-sm overflow-hidden mb-6">
                    <div class="px-6 py-5 border-b border-gray-200 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                        <div>
                            <p class="text-xs font-semibold text-red-500 uppercase">Hero</p>
                            <h3 class="text-lg font-bold text-gray-800 mt-1">Hero Homepage</h3>
                        </div>

                        <?php if (!empty($hero)): ?>
                            <a href="<?= site_url('admin/home/edit-hero'); ?>"
                               class="inline-flex items-center justify-center gap-2 px-4 py-2 bg-red-500 hover:bg-red-600 text-white rounded-lg text-sm font-semibold transition">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5M18.5 2.5a2.121 2.121 0 013 3L12 15l-4 1 1-4 8.5-8.5z" />
                                </svg>
                                Edit Hero
                            </a>
                        <?php endif; ?>
                    </div>

                    <?php if (!empty($hero)): ?>
                        <div class="p-6">
                            <p class="text-sm font-semibold text-red-500 mb-2"><?= html_escape($hero->tagline); ?></p>
                            <h4 class="text-2xl font-bold text-gray-800"><?= html_escape($hero->title); ?></h4>
                            <p class="text-sm text-gray-500 mt-3 max-w-3xl leading-relaxed"><?= html_escape($hero->description); ?></p>

                            <?php if (!empty($hero->image)): ?>
                                <div class="mt-5">
                                    <p class="text-xs text-gray-400 mb-2">Gambar Hero</p>
                                    <p class="text-sm text-gray-600"><?= html_escape($hero->image); ?></p>
                                </div>
                            <?php endif; ?>
                        </div>
                    <?php else: ?>
                        <div class="p-6">
                            <p class="text-sm text-gray-500">Data Hero belum tersedia.</p>
                        </div>
                    <?php endif; ?>
                </div>

                <!-- =====================================================
                     TANTANGAN DESA
                ====================================================== -->
                <div class="bg-white border border-gray-200 rounded-2xl shadow-sm overflow-hidden">
                    <div class="px-6 py-5 border-b border-gray-200 flex items-center justify-between">
                        <div>
                            <p class="text-xs font-semibold text-red-500 uppercase">Tantangan Desa</p>
                            <h3 class="text-lg font-bold text-gray-800 mt-1">Tantangan Desa Saat Ini</h3>
                        </div>

                        <div class="flex items-center gap-3">
                            <a href="<?= site_url('admin/home/create-challenge'); ?>"
                               class="inline-flex items-center justify-center px-4 py-2 bg-red-500 hover:bg-red-600 text-white rounded-lg text-sm font-semibold transition">
                                + Tambah
                            </a>

                            <span class="px-3 py-1 bg-red-50 text-red-500 rounded-full text-xs font-semibold">
                                <?= count($challenges); ?> Data
                            </span>
                        </div>
                    </div>

                    <div class="p-6">
                        <?php if (!empty($challenges)): ?>
                            <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-4">
                                <?php foreach ($challenges as $challenge): ?>
                                    <div class="border border-gray-200 rounded-xl p-4 hover:shadow-sm transition">
                                        <div class="flex items-start justify-between gap-3">
                                            <div class="w-9 h-9 rounded-lg bg-red-50 text-red-500 flex items-center justify-center font-bold text-sm">
                                                <?= html_escape($challenge->sort_order); ?>
                                            </div>

                                            <div class="flex items-center gap-3">
                                                <a href="<?= site_url('admin/home/edit-challenge/' . $challenge->id); ?>"
                                                   class="text-xs text-red-500 hover:text-red-600 font-semibold">Edit</a>
                                                <a href="<?= site_url('admin/home/delete-challenge/' . $challenge->id); ?>"
                                                   onclick="return confirm('Yakin ingin menghapus tantangan ini?');"
                                                   class="text-xs text-gray-400 hover:text-red-500 font-semibold">Hapus</a>
                                            </div>
                                        </div>

                                        <h4 class="font-semibold text-gray-800 text-sm mt-4 leading-relaxed">
                                            <?= html_escape($challenge->title); ?>
                                        </h4>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        <?php else: ?>
                            <p class="text-sm text-gray-500">Belum ada data Tantangan Desa.</p>
                        <?php endif; ?>
                    </div>
                </div>

                <!-- FOOTER -->
                <footer class="mt-8 pt-5 border-t border-gray-200 text-xs text-gray-400">
                    © <?= date('Y'); ?> Desa Terpadu — Admin Panel
                </footer>

            </main>

        </div>

    </div>

</body>

</html>