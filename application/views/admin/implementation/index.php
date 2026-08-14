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
                    <p class="text-sm text-gray-400 mt-1">Kelola proses implementasi Desa Terpadu</p>
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
                    <h2 class="text-2xl font-bold text-gray-800">Proses Implementasi</h2>
                    <p class="text-sm text-gray-500 mt-1">Kelola langkah-langkah implementasi Desa Terpadu.</p>
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

                <!-- Implementation Card -->
                <div class="bg-white border border-gray-200 rounded-2xl shadow-sm overflow-hidden">

                    <?php if (!empty($implementation_steps)): ?>

                        <!-- Card Header -->
                        <div class="flex items-center gap-3 px-6 py-5 border-b border-gray-200">
                            <div class="w-10 h-10 rounded-lg bg-red-50 text-red-500 flex items-center justify-center">
                                <!-- Ikon Cog -->
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

                        <!-- Table Wrapper -->
                        <div class="overflow-x-auto">
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
                                            <!-- No -->
                                            <td class="px-4 py-3.5 text-sm text-gray-600 align-middle whitespace-nowrap"><?= $no++; ?></td>

                                            <!-- Gambar -->
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

                                            <!-- Judul -->
                                            <td class="px-4 py-3.5 align-middle">
                                                <div class="font-semibold text-gray-800 leading-snug">
                                                    <?= html_escape($step->title); ?>
                                                </div>
                                            </td>

                                            <!-- Deskripsi -->
                                            <td class="px-4 py-3.5 align-middle">
                                                <div class="max-w-[400px] text-sm text-gray-600 leading-relaxed">
                                                    <?= html_escape(character_limiter($step->description, 80, '...')); ?>
                                                </div>
                                            </td>

                                            <!-- Urutan -->
                                            <td class="px-4 py-3.5 align-middle text-center">
                                                <span class="inline-flex items-center justify-center w-8 h-8 bg-red-50 text-red-500 rounded-lg text-xs font-bold">
                                                    <?= (int) $step->sort_order; ?>
                                                </span>
                                            </td>

                                            <!-- Aksi -->
                                            <td class="px-4 py-3.5 align-middle text-center whitespace-nowrap">
                                                <div class="flex justify-center">
                                                    <a href="<?= site_url('admin/implementation/edit/' . $step->id); ?>"
                                                        class="inline-flex items-center px-3 py-1.5 bg-amber-50 text-amber-700 rounded-md text-xs font-semibold hover:bg-amber-100 transition">
                                                        Edit
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
                                <!-- Ikon Cog -->
                                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                            </div>
                            <strong class="block text-sm font-semibold text-gray-700">Belum Ada Data Implementation</strong>
                            <p class="mt-2 text-sm text-gray-500">Belum terdapat data proses implementasi yang tersimpan.</p>
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