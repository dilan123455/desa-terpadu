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
                <div class="mb-6 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                    <div>
                        <h2 class="text-2xl font-bold text-gray-800">Proses Implementasi</h2>
                        <p class="text-sm text-gray-500 mt-1">Kelola langkah-langkah implementasi Desa Terpadu.</p>
                    </div>
                    <!-- Tombol Tambah -->
                    <a href="<?= site_url('admin/implementation/add'); ?>"
                       class="inline-flex items-center gap-2 px-4 py-2 bg-red-500 hover:bg-red-600 text-white rounded-lg text-sm font-semibold transition">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                        </svg>
                        Tambah Data
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
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                        <?= html_escape($this->session->flashdata('error')); ?>
                    </div>
                <?php endif; ?>

                <!-- Implementation Card -->
                <div class="bg-white border border-gray-200 rounded-2xl shadow-sm overflow-hidden">

                    <?php if (!empty($implementation_steps)): ?>

                        <!-- Card Header -->
                        <div class="flex items-center gap-3 px-6 py-5 border-b border-gray-200">
                            <div class="w-10 h-10 rounded-lg bg-red-50 text-red-500 flex items-center justify-center">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-base font-semibold text-gray-800">Daftar Proses Implementasi</h3>
                                <p class="text-xs text-gray-400 mt-0.5">Langkah implementasi yang ditampilkan pada website.</p>
                            </div>
                        </div>

                        <!-- ================= MOBILE CARD VIEW (ANDROID) ================= -->
                        <div class="mobile-only divide-y divide-gray-100">
                            <?php foreach ($implementation_steps as $step): ?>
                                <div class="p-4">
                                    <div class="flex items-start gap-3">
                                        <!-- Gambar -->
                                        <div class="flex-shrink-0">
                                            <?php
                                            $image_path = FCPATH . 'assets/uploads/implementation/' . $step->image;
                                            ?>
                                            <?php if (!empty($step->image) && file_exists($image_path)): ?>
                                                <img src="<?= base_url('assets/uploads/implementation/' . $step->image); ?>"
                                                    alt="<?= html_escape($step->title); ?>"
                                                    class="w-20 h-14 object-cover rounded-lg border border-gray-200">
                                            <?php else: ?>
                                                <div class="w-20 h-14 flex items-center justify-center bg-gray-50 text-gray-400 border border-gray-200 rounded-lg text-xs">
                                                    Tidak ada gambar
                                                </div>
                                            <?php endif; ?>
                                        </div>

                                        <!-- Info -->
                                        <div class="flex-1 min-w-0">
                                            <div class="flex items-start justify-between gap-2">
                                                <h4 class="font-semibold text-gray-800 leading-snug">
                                                    <?= html_escape($step->title); ?>
                                                </h4>
                                                <span class="shrink-0 inline-flex items-center justify-center w-8 h-8 bg-red-50 text-red-500 rounded-lg text-xs font-bold">
                                                    <?= (int) $step->sort_order; ?>
                                                </span>
                                            </div>

                                            <p class="mt-1 text-sm text-gray-600 leading-relaxed">
                                                <?= html_escape(character_limiter($step->description, 80, '...')); ?>
                                            </p>

                                            <!-- Aksi -->
                                            <div class="mt-2 flex flex-wrap gap-1.5">
                                                <a href="<?= site_url('admin/implementation/edit/' . $step->id); ?>"
                                                   class="inline-flex items-center px-2.5 py-1 bg-amber-50 text-amber-700 rounded-md text-xs font-semibold hover:bg-amber-100 transition">
                                                    Edit
                                                </a>
                                                <a href="<?= site_url('admin/implementation/delete/' . $step->id); ?>"
                                                   onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')"
                                                   class="inline-flex items-center px-2.5 py-1 bg-red-50 text-red-700 rounded-md text-xs font-semibold hover:bg-red-100 transition">
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
                            <table class="w-full min-w-[900px] border-collapse">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th class="px-4 py-3 text-left text-xs font-bold text-gray-500 uppercase tracking-wider border-b border-gray-200 whitespace-nowrap">No</th>
                                        <th class="px-4 py-3 text-left text-xs font-bold text-gray-500 uppercase tracking-wider border-b border-gray-200 whitespace-nowrap">Gambar</th>
                                        <th class="px-4 py-3 text-left text-xs font-bold text-gray-500 uppercase tracking-wider border-b border-gray-200 whitespace-nowrap min-w-[200px]">Judul</th>
                                        <th class="px-4 py-3 text-left text-xs font-bold text-gray-500 uppercase tracking-wider border-b border-gray-200 whitespace-nowrap min-w-[250px]">Deskripsi</th>
                                        <th class="px-4 py-3 text-center text-xs font-bold text-gray-500 uppercase tracking-wider border-b border-gray-200 whitespace-nowrap">Urutan</th>
                                        <th class="px-4 py-3 text-center text-xs font-bold text-gray-500 uppercase tracking-wider border-b border-gray-200 whitespace-nowrap min-w-[100px]">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-100">
                                    <?php $no = 1; ?>
                                    <?php foreach ($implementation_steps as $step): ?>
                                        <tr class="hover:bg-red-50/50 transition">
                                            <td class="px-4 py-3.5 text-sm text-gray-600 align-middle whitespace-nowrap"><?= $no++; ?></td>
                                            <td class="px-4 py-3.5 align-middle">
                                                <?php
                                                $image_path = FCPATH . 'assets/uploads/implementation/' . $step->image;
                                                ?>
                                                <?php if (!empty($step->image) && file_exists($image_path)): ?>
                                                    <img src="<?= base_url('assets/uploads/implementation/' . $step->image); ?>"
                                                        alt="<?= html_escape($step->title); ?>"
                                                        class="w-20 h-14 object-cover rounded-lg border border-gray-200">
                                                <?php else: ?>
                                                    <div class="w-20 h-14 flex items-center justify-center bg-gray-50 text-gray-400 border border-gray-200 rounded-lg text-xs">
                                                        Tidak ada gambar
                                                    </div>
                                                <?php endif; ?>
                                            </td>
                                            <td class="px-4 py-3.5 align-middle">
                                                <div class="font-semibold text-gray-800 leading-snug">
                                                    <?= html_escape($step->title); ?>
                                                </div>
                                            </td>
                                            <td class="px-4 py-3.5 align-middle">
                                                <div class="max-w-[400px] text-sm text-gray-600 leading-relaxed">
                                                    <?= html_escape(character_limiter($step->description, 80, '...')); ?>
                                                </div>
                                            </td>
                                            <td class="px-4 py-3.5 align-middle text-center">
                                                <span class="inline-flex items-center justify-center w-8 h-8 bg-red-50 text-red-500 rounded-lg text-xs font-bold">
                                                    <?= (int) $step->sort_order; ?>
                                                </span>
                                            </td>
                                            <td class="px-4 py-3.5 align-middle text-center whitespace-nowrap">
                                                <div class="flex justify-center gap-2">
                                                    <a href="<?= site_url('admin/implementation/edit/' . $step->id); ?>"
                                                        class="inline-flex items-center px-3 py-1.5 bg-amber-50 text-amber-700 rounded-md text-xs font-semibold hover:bg-amber-100 transition">
                                                        Edit
                                                    </a>
                                                    <a href="<?= site_url('admin/implementation/delete/' . $step->id); ?>"
                                                        onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')"
                                                        class="inline-flex items-center px-3 py-1.5 bg-red-50 text-red-700 rounded-md text-xs font-semibold hover:bg-red-100 transition">
                                                        Hapus
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>

                    <?php else: ?>

                        <!-- Empty State -->
                        <div class="py-16 px-5 text-center">
                            <div class="w-16 h-16 mx-auto mb-4 rounded-full bg-red-50 text-red-500 flex items-center justify-center">
                                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                            </div>
                            <strong class="block text-sm font-semibold text-gray-700">Belum Ada Data Implementation</strong>
                            <p class="mt-2 text-sm text-gray-500">Belum terdapat data proses implementasi yang tersimpan.</p>
                            <a href="<?= site_url('admin/implementation/add'); ?>"
                               class="mt-4 inline-flex items-center gap-2 px-4 py-2 bg-red-500 hover:bg-red-600 text-white rounded-lg text-sm font-semibold transition">
                                Tambah Data Sekarang
                            </a>
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