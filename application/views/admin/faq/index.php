<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="<?= base_url('assets/css/output.css'); ?>">

    <title><?= html_escape($title); ?> - Desa Terpadu</title>

    <style>
        /* Mobile (default) */
        .mobile-only {
            display: block;
        }
        .desktop-only {
            display: none;
        }

        /* Desktop (min-width 768px) */
        @media (min-width: 768px) {
            .mobile-only {
                display: none !important;
            }
            .desktop-only {
                display: block !important;
            }
        }
    </style>
</head>

<body class="bg-gray-100 text-gray-800 min-h-screen">

    <div class="admin-wrapper">

        <!-- SIDEBAR -->
        <?php $this->load->view('admin/sidebar'); ?>

        <!-- MAIN AREA -->
        <div class="ml-0 lg:ml-64">

            <!-- TOPBAR (dipisah) -->
            <?php $this->load->view('admin/topbar'); ?>

            <!-- Content -->
            <main class="p-4 sm:p-8 pt-24 sm:pt-28 min-h-screen">

                <!-- Page Header -->
                <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-6">
                    <div>
                        <h2 class="text-2xl font-bold text-gray-800">Kelola FAQ</h2>
                        <p class="text-sm text-gray-500 mt-1">Kelola pertanyaan dan jawaban yang ditampilkan pada website Desa Terpadu.</p>
                    </div>

                    <!-- Tambah FAQ -->
                    <a href="<?= site_url('admin/faq/create'); ?>"
                        class="inline-flex items-center gap-2 px-4 py-2.5 bg-red-500 text-white rounded-lg text-sm font-semibold shadow-md hover:bg-red-600 transition whitespace-nowrap">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                        </svg>
                        Tambah FAQ
                    </a>
                </div>

                <!-- Flash Success -->
                <?php if ($this->session->flashdata('success')): ?>
                    <div class="flex items-center gap-2 px-4 py-3 mb-5 rounded-lg bg-green-50 text-green-700 border border-green-200 text-sm">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                        <?= html_escape($this->session->flashdata('success')); ?>
                    </div>
                <?php endif; ?>

                <!-- Flash Error -->
                <?php if ($this->session->flashdata('error')): ?>
                    <div class="flex items-center gap-2 px-4 py-3 mb-5 rounded-lg bg-red-50 text-red-700 border border-red-200 text-sm">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <?= html_escape($this->session->flashdata('error')); ?>
                    </div>
                <?php endif; ?>

                <!-- FAQ Card -->
                <div class="bg-white border border-gray-200 rounded-2xl shadow-sm overflow-hidden">

                    <?php if (empty($faqs)): ?>

                        <!-- Empty State -->
                        <div class="py-16 px-5 text-center">
                            <div class="w-16 h-16 mx-auto mb-4 rounded-full bg-red-50 text-red-500 flex items-center justify-center">
                                <!-- Ikon Question Mark Circle -->
                                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                            <strong class="block text-sm font-semibold text-gray-700">Belum Ada FAQ</strong>
                            <p class="mt-2 text-sm text-gray-500">Belum terdapat pertanyaan dan jawaban yang tersimpan di sistem.</p>
                            <a href="<?= site_url('admin/faq/create'); ?>"
                                class="mt-5 inline-flex items-center gap-2 px-4 py-2.5 bg-red-500 text-white rounded-lg text-sm font-semibold shadow-md hover:bg-red-600 transition">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                                </svg>
                                Tambah FAQ
                            </a>
                        </div>

                    <?php else: ?>

                        <!-- Card Header -->
                        <div class="flex items-center gap-3 px-6 py-5 border-b border-gray-200">
                            <div class="w-10 h-10 rounded-lg bg-red-50 text-red-500 flex items-center justify-center">
                                <!-- Ikon Question Mark Circle -->
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-base font-semibold text-gray-800">Daftar FAQ</h3>
                                <p class="text-xs text-gray-400 mt-0.5">Pertanyaan dan jawaban yang tersimpan di sistem</p>
                            </div>
                        </div>

                        <!-- ================= MOBILE CARD VIEW (ANDROID) ================= -->
                        <div class="mobile-only divide-y divide-gray-100">
                            <?php foreach ($faqs as $faq): ?>
                                <div class="p-4">
                                    <div class="flex items-start gap-3">
                                        <!-- Urutan -->
                                        <div class="flex-shrink-0">
                                            <span class="inline-flex items-center justify-center w-8 h-8 bg-gray-50 border border-gray-200 rounded-md text-xs font-semibold text-gray-600">
                                                <?= (int) $faq->sort_order; ?>
                                            </span>
                                        </div>

                                        <!-- Info -->
                                        <div class="flex-1 min-w-0">
                                            <div class="flex items-start justify-between gap-2">
                                                <h4 class="font-semibold text-gray-800 leading-snug">
                                                    <?= html_escape($faq->question); ?>
                                                </h4>
                                                <span class="shrink-0 text-xs font-semibold px-2 py-1 rounded-full <?= $faq->status === 'active' ? 'bg-green-50 text-green-700' : 'bg-gray-100 text-gray-600'; ?>">
                                                    <?= $faq->status === 'active' ? 'Aktif' : 'Nonaktif'; ?>
                                                </span>
                                            </div>

                                            <p class="mt-2 text-sm text-gray-600 leading-relaxed">
                                                <?= html_escape(character_limiter(strip_tags($faq->answer), 100, '...')); ?>
                                            </p>

                                            <!-- Aksi -->
                                            <div class="mt-2 flex flex-wrap gap-1.5">
                                                <a href="<?= site_url('admin/faq/detail/' . $faq->id); ?>"
                                                   class="inline-flex items-center px-2.5 py-1 bg-cyan-50 text-cyan-700 rounded-md text-xs font-semibold hover:bg-cyan-100 transition">
                                                    Detail
                                                </a>
                                                <a href="<?= site_url('admin/faq/edit/' . $faq->id); ?>"
                                                   class="inline-flex items-center px-2.5 py-1 bg-amber-50 text-amber-700 rounded-md text-xs font-semibold hover:bg-amber-100 transition">
                                                    Edit
                                                </a>
                                                <a href="<?= site_url('admin/faq/delete/' . $faq->id); ?>"
                                                   onclick="return confirm('Yakin ingin menghapus FAQ ini?');"
                                                   class="inline-flex items-center px-2.5 py-1 bg-red-50 text-red-600 rounded-md text-xs font-semibold hover:bg-red-100 transition">
                                                    Hapus
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>

                        <!-- ================= DESKTOP TABLE VIEW ================= -->
                        <div class="desktop-only overflow-x-auto">
                            <table class="w-full min-w-[850px] border-collapse">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th class="px-4 py-3 text-left text-xs font-bold text-gray-500 uppercase tracking-wider border-b border-gray-200 whitespace-nowrap">No</th>
                                        <th class="px-4 py-3 text-left text-xs font-bold text-gray-500 uppercase tracking-wider border-b border-gray-200 whitespace-nowrap min-w-[200px]">Pertanyaan</th>
                                        <th class="px-4 py-3 text-left text-xs font-bold text-gray-500 uppercase tracking-wider border-b border-gray-200 whitespace-nowrap min-w-[250px]">Jawaban</th>
                                        <th class="px-4 py-3 text-center text-xs font-bold text-gray-500 uppercase tracking-wider border-b border-gray-200 whitespace-nowrap">Urutan</th>
                                        <th class="px-4 py-3 text-center text-xs font-bold text-gray-500 uppercase tracking-wider border-b border-gray-200 whitespace-nowrap">Status</th>
                                        <th class="px-4 py-3 text-center text-xs font-bold text-gray-500 uppercase tracking-wider border-b border-gray-200 whitespace-nowrap min-w-[180px]">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-100">
                                    <?php $no = 1; ?>
                                    <?php foreach ($faqs as $faq): ?>
                                        <tr class="hover:bg-red-50/50 transition">
                                            <!-- Nomor -->
                                            <td class="px-4 py-3.5 text-sm text-gray-600 align-middle whitespace-nowrap"><?= $no++; ?></td>

                                            <!-- Pertanyaan -->
                                            <td class="px-4 py-3.5 align-middle">
                                                <div class="max-w-[280px] font-semibold text-gray-800 leading-snug">
                                                    <?= html_escape($faq->question); ?>
                                                </div>
                                            </td>

                                            <!-- Jawaban -->
                                            <td class="px-4 py-3.5 align-middle">
                                                <div class="max-w-[430px] text-sm text-gray-600 leading-relaxed">
                                                    <?= html_escape(character_limiter(strip_tags($faq->answer), 100, '...')); ?>
                                                </div>
                                            </td>

                                            <!-- Urutan -->
                                            <td class="px-4 py-3.5 align-middle text-center">
                                                <span class="inline-flex items-center justify-center w-8 h-8 bg-gray-50 border border-gray-200 rounded-md text-xs font-semibold text-gray-600">
                                                    <?= (int) $faq->sort_order; ?>
                                                </span>
                                            </td>

                                            <!-- Status -->
                                            <td class="px-4 py-3.5 align-middle text-center whitespace-nowrap">
                                                <?php if ($faq->status === 'active'): ?>
                                                    <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full bg-green-50 text-green-700 text-xs font-semibold">
                                                        <span class="w-1.5 h-1.5 rounded-full bg-green-600"></span>
                                                        Aktif
                                                    </span>
                                                <?php else: ?>
                                                    <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full bg-gray-100 text-gray-600 text-xs font-semibold">
                                                        <span class="w-1.5 h-1.5 rounded-full bg-gray-400"></span>
                                                        Nonaktif
                                                    </span>
                                                <?php endif; ?>
                                            </td>

                                            <!-- Aksi -->
                                            <td class="px-4 py-3.5 align-middle text-center whitespace-nowrap">
                                                <div class="flex items-center justify-center gap-1.5">
                                                    <a href="<?= site_url('admin/faq/detail/' . $faq->id); ?>"
                                                        class="inline-flex items-center justify-center px-3 py-1.5 bg-cyan-50 text-cyan-700 rounded-md text-xs font-semibold hover:bg-cyan-100 transition whitespace-nowrap shrink-0">
                                                        Detail
                                                    </a>
                                                    <a href="<?= site_url('admin/faq/edit/' . $faq->id); ?>"
                                                        class="inline-flex items-center justify-center px-3 py-1.5 bg-amber-50 text-amber-700 rounded-md text-xs font-semibold hover:bg-amber-100 transition whitespace-nowrap shrink-0">
                                                        Edit
                                                    </a>
                                                    <a href="<?= site_url('admin/faq/delete/' . $faq->id); ?>"
                                                        onclick="return confirm('Yakin ingin menghapus FAQ ini?');"
                                                        class="inline-flex items-center justify-center px-3 py-1.5 bg-red-50 text-red-600 rounded-md text-xs font-semibold hover:bg-red-100 transition whitespace-nowrap shrink-0">
                                                        Hapus
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>

                    <?php endif; ?>

                </div>

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