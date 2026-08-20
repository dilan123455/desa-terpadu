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
<body class="bg-gray-100 text-gray-800 min-h-screen flex items-center justify-center p-4">
    <div class="w-full max-w-3xl">

        <!-- Header -->
        <div class="mb-6">
            <h1 class="text-2xl font-bold text-gray-800">Tambah Artikel</h1>
            <p class="text-sm text-gray-500 mt-1">Tambahkan artikel atau berita baru.</p>
        </div>

        <!-- Card Form -->
        <div class="bg-white border border-gray-200 rounded-2xl shadow-sm p-6 sm:p-8">

            <!-- Flash Error -->
            <?php if ($this->session->flashdata('error')): ?>
                <div class="flex items-center gap-2 px-4 py-3 mb-5 rounded-lg bg-red-50 text-red-700 border border-red-200 text-sm">
                    <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <?= html_escape($this->session->flashdata('error')); ?>
                </div>
            <?php endif; ?>

            <form action="<?= site_url('admin/articles/store'); ?>" method="post" enctype="multipart/form-data">

                <!-- Judul Artikel -->
                <div class="mb-5">
                    <label for="title" class="block text-sm font-semibold text-gray-700 mb-2">Judul Artikel</label>
                    <input type="text" id="title" name="title"
                        placeholder="Masukkan judul artikel"
                        value="<?= set_value('title'); ?>"
                        required
                        class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:outline-none focus:border-red-500 focus:ring-2 focus:ring-red-100 text-sm">
                    <?= form_error('title', '<small class="text-red-500">', '</small>'); ?>
                </div>

                <!-- Kategori -->
                <div class="mb-5">
                    <label for="category" class="block text-sm font-semibold text-gray-700 mb-2">Kategori</label>
                    <input type="text" id="category" name="category"
                        placeholder="Contoh: Digitalisasi Desa"
                        value="<?= set_value('category'); ?>"
                        required
                        class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:outline-none focus:border-red-500 focus:ring-2 focus:ring-red-100 text-sm">
                    <?= form_error('category', '<small class="text-red-500">', '</small>'); ?>
                </div>

                <!-- Tanggal Upload -->
                <div class="mb-5">
                    <label for="publish_date" class="block text-sm font-semibold text-gray-700 mb-2">Tanggal Upload</label>
                    <input type="date" id="publish_date" name="publish_date"
                        value="<?= set_value('publish_date', date('Y-m-d')); ?>"
                        required
                        class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:outline-none focus:border-red-500 focus:ring-2 focus:ring-red-100 text-sm">
                    <?= form_error('publish_date', '<small class="text-red-500">', '</small>'); ?>
                </div>

                <!-- Gambar Artikel -->
                <div class="mb-5">
                    <label for="image" class="block text-sm font-semibold text-gray-700 mb-2">Gambar Artikel</label>
                    <input type="file" id="image" name="image"
                        accept=".jpg,.jpeg,.png,.webp"
                        class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-red-50 file:text-red-600 hover:file:bg-red-100 cursor-pointer">
                    <p class="mt-2 text-xs text-gray-400">Format: JPG, JPEG, PNG, atau WEBP. Maksimal 5 MB.</p>

                    <!-- Preview Gambar -->
                    <div id="previewWrapper" class="mt-3 hidden">
                        <img id="imagePreview" src="" alt="Preview gambar" class="w-56 h-36 object-cover rounded-lg border border-gray-200">
                    </div>
                </div>

                <!-- Isi Artikel -->
                <div class="mb-5">
                    <label for="content" class="block text-sm font-semibold text-gray-700 mb-2">Isi Artikel</label>
                    <textarea id="content" name="content"
                        placeholder="Tulis isi artikel..."
                        rows="10"
                        required
                        class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:outline-none focus:border-red-500 focus:ring-2 focus:ring-red-100 text-sm resize-y"><?= set_value('content'); ?></textarea>
                    <?= form_error('content', '<small class="text-red-500">', '</small>'); ?>
                </div>

                <!-- Status -->
                <div class="mb-6">
                    <label for="status" class="block text-sm font-semibold text-gray-700 mb-2">Status</label>
                    <select id="status" name="status" required
                        class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:outline-none focus:border-red-500 focus:ring-2 focus:ring-red-100 text-sm">
                        <option value="draft" <?= set_select('status', 'draft', TRUE); ?>>Draft</option>
                        <option value="published" <?= set_select('status', 'published'); ?>>Published</option>
                    </select>
                    <?= form_error('status', '<small class="text-red-500">', '</small>'); ?>
                </div>

                <!-- Actions -->
                <div class="flex flex-col sm:flex-row items-center gap-3">
                    <a href="<?= site_url('admin/articles'); ?>"
                        class="w-full sm:w-auto inline-flex items-center justify-center px-5 py-2.5 bg-gray-200 text-gray-700 rounded-lg text-sm font-semibold hover:bg-gray-300 transition">
                        Batal
                    </a>
                    <button type="submit"
                        class="w-full sm:w-auto inline-flex items-center justify-center px-5 py-2.5 bg-red-500 text-white rounded-lg text-sm font-semibold shadow-md hover:bg-red-600 transition">
                        Simpan Artikel
                    </button>
                </div>

            </form>

        </div>

    </div>

    <!-- Script Preview Gambar -->
    <script>
        document.getElementById('image').addEventListener('change', function(event) {
            const file = event.target.files[0];
            const preview = document.getElementById('imagePreview');
            const wrapper = document.getElementById('previewWrapper');

            if (!file) {
                wrapper.classList.add('hidden');
                preview.src = '';
                return;
            }

            preview.src = URL.createObjectURL(file);
            wrapper.classList.remove('hidden');
        });
    </script>

</body>
</html>