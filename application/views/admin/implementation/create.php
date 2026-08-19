<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
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
                    <h2 class="text-2xl font-bold text-gray-800">Tambah Proses Implementasi</h2>
                    <p class="text-sm text-gray-500 mt-1">Isi formulir di bawah ini untuk menambah data baru.</p>
                </div>

                <!-- Flash Error (jika ada) -->
                <?php if ($this->session->flashdata('error')): ?>
                    <div class="px-4 py-3 mb-4 rounded-lg bg-red-50 text-red-700 border border-red-200 text-sm">
                        <?= html_escape($this->session->flashdata('error')); ?>
                    </div>
                <?php endif; ?>

                <!-- Error dari upload (jika ada) -->
                <?php if (isset($error)): ?>
                    <div class="px-4 py-3 mb-4 rounded-lg bg-red-50 text-red-700 border border-red-200 text-sm">
                        <?= html_escape($error); ?>
                    </div>
                <?php endif; ?>

                <!-- Form Card -->
                <div class="bg-white border border-gray-200 rounded-2xl shadow-sm p-6">
                    <?= form_open_multipart('admin/implementation/save'); ?>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                            <!-- Judul -->
                            <div class="col-span-2 md:col-span-1">
                                <label class="block text-sm font-medium text-gray-700 mb-1">Judul</label>
                                <input type="text" name="title" value="<?= set_value('title'); ?>"
                                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500"
                                       placeholder="Masukkan judul" required>
                                <?= form_error('title', '<small class="text-red-500">', '</small>'); ?>
                            </div>

                            <!-- Urutan -->
                            <div class="col-span-2 md:col-span-1">
                                <label class="block text-sm font-medium text-gray-700 mb-1">Urutan</label>
                                <input type="number" name="sort_order"
                                       value="<?= set_value('sort_order', $next_order); ?>"
                                       min="1"
                                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500"
                                       placeholder="<?= $next_order; ?>" required>
                                <?= form_error('sort_order', '<small class="text-red-500">', '</small>'); ?>
                            </div>

                            <!-- Deskripsi -->
                            <div class="col-span-2">
                                <label class="block text-sm font-medium text-gray-700 mb-1">Deskripsi</label>
                                <textarea name="description" rows="5"
                                          class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500"
                                          placeholder="Tulis deskripsi implementasi" required><?= set_value('description'); ?></textarea>
                                <?= form_error('description', '<small class="text-red-500">', '</small>'); ?>
                            </div>

                            <!-- Gambar -->
                            <div class="col-span-2">
                                <label class="block text-sm font-medium text-gray-700 mb-1">Gambar</label>
                                <input type="file" name="image" accept="image/*"
                                       class="block w-full text-sm text-gray-500
                                              file:mr-4 file:py-2 file:px-4
                                              file:rounded-lg file:border-0
                                              file:text-sm file:font-semibold
                                              file:bg-red-50 file:text-red-700
                                              hover:file:bg-red-100">
                                <small class="text-gray-400 block mt-1">Format: jpg, jpeg, png, webp. Maksimal 5MB.</small>
                            </div>

                        </div>

                        <!-- Tombol Aksi -->
                        <div class="mt-6 flex justify-end gap-3">
                            <a href="<?= site_url('admin/implementation'); ?>"
                               class="px-4 py-2 bg-gray-200 hover:bg-gray-300 text-gray-700 rounded-lg text-sm font-semibold transition">
                                Batal
                            </a>
                            <button type="submit"
                                    class="px-4 py-2 bg-red-500 hover:bg-red-600 text-white rounded-lg text-sm font-semibold transition">
                                Simpan Data
                            </button>
                        </div>

                    <?= form_close(); ?>
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