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
                    <p class="text-sm text-gray-400 mt-1">Kelola testimoni masyarakat Desa Terpadu</p>
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
                <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-6">
                    <div>
                        <h2 class="text-2xl font-bold text-gray-800">Kelola Testimoni</h2>
                        <p class="text-sm text-gray-500 mt-1">Kelola testimoni masyarakat yang ditampilkan pada website Desa Terpadu.</p>
                    </div>

                    <!-- Tambah Testimoni -->
                    <a href="<?= base_url('admin/testimoni/create'); ?>"
                        class="inline-flex items-center gap-2 px-4 py-2.5 bg-red-500 text-white rounded-lg text-sm font-semibold shadow-md hover:bg-red-600 transition whitespace-nowrap">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                        </svg>
                        Tambah Testimoni
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

                <!-- Testimoni Card -->
                <div class="bg-white border border-gray-200 rounded-2xl shadow-sm overflow-hidden">

                    <?php if (empty($testimonies)): ?>

                        <!-- Empty State -->
                        <div class="py-16 px-5 text-center">
                            <div class="w-16 h-16 mx-auto mb-4 rounded-full bg-red-50 text-red-500 flex items-center justify-center">
                                <!-- Ikon Chat Bubble -->
                                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                                </svg>
                            </div>
                            <strong class="block text-sm font-semibold text-gray-700">Belum Ada Testimoni</strong>
                            <p class="mt-2 text-sm text-gray-500">Belum terdapat data testimoni yang tersimpan.</p>
                            <a href="<?= base_url('admin/testimoni/create'); ?>"
                                class="mt-5 inline-flex items-center gap-2 px-4 py-2.5 bg-red-500 text-white rounded-lg text-sm font-semibold shadow-md hover:bg-red-600 transition">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                                </svg>
                                Tambah Testimoni
                            </a>
                        </div>

                    <?php else: ?>

                        <!-- Card Header -->
                        <div class="flex items-center gap-3 px-6 py-5 border-b border-gray-200">
                            <div class="w-10 h-10 rounded-lg bg-red-50 text-red-500 flex items-center justify-center">
                                <!-- Ikon Chat Bubble -->
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-base font-semibold text-gray-800">Daftar Testimoni</h3>
                                <p class="text-xs text-gray-400 mt-0.5">Data testimoni yang tersimpan di sistem</p>
                            </div>
                        </div>

                        <!-- Table Wrapper -->
                        <div class="overflow-x-auto">
                            <table class="w-full min-w-[900px] border-collapse">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th class="px-4 py-3 text-center text-xs font-bold text-gray-500 uppercase tracking-wider border-b border-gray-200 whitespace-nowrap">#</th>
                                        <th class="px-4 py-3 text-center text-xs font-bold text-gray-500 uppercase tracking-wider border-b border-gray-200 whitespace-nowrap">Foto</th>
                                        <th class="px-4 py-3 text-left text-xs font-bold text-gray-500 uppercase tracking-wider border-b border-gray-200 whitespace-nowrap">Nama</th>
                                        <th class="px-4 py-3 text-left text-xs font-bold text-gray-500 uppercase tracking-wider border-b border-gray-200 whitespace-nowrap">Jabatan</th>
                                        <th class="px-4 py-3 text-left text-xs font-bold text-gray-500 uppercase tracking-wider border-b border-gray-200 whitespace-nowrap min-w-[250px]">Isi Testimoni</th>
                                        <th class="px-4 py-3 text-center text-xs font-bold text-gray-500 uppercase tracking-wider border-b border-gray-200 whitespace-nowrap">Status</th>
                                        <th class="px-4 py-3 text-center text-xs font-bold text-gray-500 uppercase tracking-wider border-b border-gray-200 whitespace-nowrap min-w-[200px]">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-100">
                                    <?php $no = 1; ?>
                                    <?php foreach ($testimonies as $row): ?>
                                        <tr class="hover:bg-red-50/50 transition">
                                            <!-- Nomor -->
                                            <td class="px-4 py-3.5 text-center text-sm text-gray-600 align-middle whitespace-nowrap"><?= $no++; ?></td>

                                            <!-- Foto -->
                                            <td class="px-4 py-3.5 align-middle text-center">
                                                <?php if (!empty($row->photo)): ?>
                                                    <img src="<?= base_url('uploads/testimoni/' . $row->photo); ?>"
                                                        alt="<?= html_escape($row->name); ?>"
                                                        class="w-12 h-12 object-cover rounded-full border-2 border-gray-200 inline-block">
                                                <?php else: ?>
                                                    <span class="w-12 h-12 rounded-full bg-gray-100 border border-gray-200 flex items-center justify-center text-gray-400 text-xs inline-flex">
                                                        —
                                                    </span>
                                                <?php endif; ?>
                                            </td>

                                            <!-- Nama -->
                                            <td class="px-4 py-3.5 align-middle">
                                                <span class="font-semibold text-gray-800"><?= html_escape($row->name); ?></span>
                                            </td>

                                            <!-- Jabatan -->
                                            <td class="px-4 py-3.5 text-sm text-gray-600 align-middle whitespace-nowrap">
                                                <?= html_escape($row->position); ?>
                                            </td>

                                            <!-- Isi Testimoni (perbaikan ellipsis) -->
                                            <td class="px-4 py-3.5 align-middle">
                                                <div class="max-w-[350px] leading-relaxed text-sm text-gray-600">
                                                    <?= html_escape(character_limiter($row->content, 80, '...')); ?>
                                                </div>
                                            </td>

                                            <!-- Status -->
                                            <td class="px-4 py-3.5 align-middle text-center whitespace-nowrap">
                                                <?php if ($row->status === 'active'): ?>
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
                                                <div class="flex flex-wrap justify-center gap-1.5">
                                                    <a href="<?= base_url('admin/testimoni/detail/' . $row->id); ?>"
                                                        class="inline-flex items-center px-3 py-1.5 bg-cyan-50 text-cyan-700 rounded-md text-xs font-semibold hover:bg-cyan-100 transition">Detail</a>
                                                    <a href="<?= base_url('admin/testimoni/edit/' . $row->id); ?>"
                                                        class="inline-flex items-center px-3 py-1.5 bg-amber-50 text-amber-700 rounded-md text-xs font-semibold hover:bg-amber-100 transition">Edit</a>
                                                    <a href="<?= base_url('admin/testimoni/delete/' . $row->id); ?>"
                                                        onclick="return confirm('Yakin ingin menghapus testimoni ini?');"
                                                        class="inline-flex items-center px-3 py-1.5 bg-red-50 text-red-600 rounded-md text-xs font-semibold hover:bg-red-100 transition">Hapus</a>
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