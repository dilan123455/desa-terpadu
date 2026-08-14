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
            <h1 class="text-2xl font-bold text-gray-800">Edit Artikel</h1>
            <p class="text-sm text-gray-500 mt-1">Perbarui informasi artikel.</p>
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

            <form action="<?= site_url('admin/articles/update/' . $article->id); ?>" method="post" enctype="multipart/form-data">

                <!-- Judul Artikel -->
                <div class="mb-5">
                    <label for="title" class="block text-sm font-semibold text-gray-700 mb-2">Judul Artikel</label>
                    <input type="text" id="title" name="title"
                        value="<?= html_escape($article->title); ?>"
                        required
                        class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:outline-none focus:border-red-500 focus:ring-2 focus:ring-red-100 text-sm">
                </div>

                <!-- Kategori -->
                <div class="mb-5">
                    <label for="category" class="block text-sm font-semibold text-gray-700 mb-2">Kategori</label>
                    <input type="text" id="category" name="category"
                        value="<?= html_escape($article->category); ?>"
                        required
                        class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:outline-none focus:border-red-500 focus:ring-2 focus:ring-red-100 text-sm">
                </div>

                <!-- Gambar Artikel -->
                <div class="mb-5">
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Gambar Artikel</label>

                    <!-- Preview Gambar -->
                    <div class="mb-3">
                        <?php if (!empty($article->image)): ?>
                            <img id="imagePreview"
                                src="<?= base_url('assets/uploads/' . $article->image); ?>"
                                alt="<?= html_escape($article->title); ?>"
                                class="w-56 h-36 object-cover rounded-lg border border-gray-200">
                        <?php else: ?>
                            <div id="noImageText"
                                class="w-56 h-36 flex items-center justify-center bg-gray-100 text-gray-400 border border-gray-200 rounded-lg text-xs">
                                Belum ada gambar
                            </div>
                            <img id="imagePreview"
                                src=""
                                alt="Preview gambar"
                                class="w-56 h-36 object-cover rounded-lg border border-gray-200 hidden">
                        <?php endif; ?>
                    </div>

                    <input type="file" id="imageInput" name="image"
                        accept=".jpg,.jpeg,.png,.webp"
                        class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-red-50 file:text-red-600 hover:file:bg-red-100 cursor-pointer">
                    <p class="mt-2 text-xs text-gray-400">Biarkan kosong jika tidak ingin mengganti gambar. Format JPG, JPEG, PNG, atau WEBP. Maksimal 5 MB.</p>
                </div>

                <!-- Isi Artikel -->
                <div class="mb-5">
                    <label for="content" class="block text-sm font-semibold text-gray-700 mb-2">Isi Artikel</label>
                    <textarea id="content" name="content"
                        rows="10"
                        required
                        class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:outline-none focus:border-red-500 focus:ring-2 focus:ring-red-100 text-sm resize-y"><?= html_escape($article->content); ?></textarea>
                </div>

                <!-- Status -->
                <div class="mb-6">
                    <label for="status" class="block text-sm font-semibold text-gray-700 mb-2">Status</label>
                    <select id="status" name="status" required
                        class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:outline-none focus:border-red-500 focus:ring-2 focus:ring-red-100 text-sm">
                        <option value="draft" <?= $article->status === 'draft' ? 'selected' : ''; ?>>Draft</option>
                        <option value="published" <?= $article->status === 'published' ? 'selected' : ''; ?>>Published</option>
                    </select>
                </div>

                <!-- Actions -->
                <div class="flex flex-col sm:flex-row items-center gap-3">
                    <a href="<?= site_url('admin/articles'); ?>"
                        class="w-full sm:w-auto inline-flex items-center justify-center px-5 py-2.5 bg-gray-200 text-gray-700 rounded-lg text-sm font-semibold hover:bg-gray-300 transition">
                        Batal
                    </a>
                    <button type="submit"
                        class="w-full sm:w-auto inline-flex items-center justify-center px-5 py-2.5 bg-red-500 text-white rounded-lg text-sm font-semibold shadow-md hover:bg-red-600 transition">
                        Simpan Perubahan
                    </button>
                </div>

            </form>

        </div>

    </div>

    <!-- Script Preview Gambar -->
    <script>
        document.getElementById('imageInput').addEventListener('change', function(event) {
            const file = event.target.files[0];

            if (!file) {
                return;
            }

            const imagePreview = document.getElementById('imagePreview');
            const noImageText = document.getElementById('noImageText');

            imagePreview.src = URL.createObjectURL(file);
            imagePreview.classList.remove('hidden');

            if (noImageText) {
                noImageText.classList.add('hidden');
            }
        });
    </script>

</body>

</html>