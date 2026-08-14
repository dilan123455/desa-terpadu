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
            <h1 class="text-2xl font-bold text-gray-800">Edit Langkah Implementasi</h1>
            <p class="text-sm text-gray-500 mt-1">Ubah informasi langkah implementasi Desa Terpadu.</p>
        </div>

        <!-- Card Form -->
        <div class="bg-white border border-gray-200 rounded-2xl shadow-sm p-6 sm:p-8">

            <!-- Flash Error -->
            <?php if (!empty($error)): ?>
                <div class="flex items-center gap-2 px-4 py-3 mb-5 rounded-lg bg-red-50 text-red-700 border border-red-200 text-sm">
                    <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <?= html_escape($error); ?>
                </div>
            <?php endif; ?>

            <form method="post" enctype="multipart/form-data">

                <!-- Judul -->
                <div class="mb-5">
                    <label for="title" class="block text-sm font-semibold text-gray-700 mb-2">Judul</label>
                    <input type="text" id="title" name="title"
                        value="<?= html_escape($step->title); ?>"
                        required
                        class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:outline-none focus:border-red-500 focus:ring-2 focus:ring-red-100 text-sm">
                </div>

                <!-- Deskripsi -->
                <div class="mb-5">
                    <label for="description" class="block text-sm font-semibold text-gray-700 mb-2">Deskripsi</label>
                    <textarea id="description" name="description"
                        rows="5"
                        required
                        class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:outline-none focus:border-red-500 focus:ring-2 focus:ring-red-100 text-sm resize-y"><?= html_escape($step->description); ?></textarea>
                </div>

                <!-- Urutan -->
                <div class="mb-5">
                    <label for="sort_order" class="block text-sm font-semibold text-gray-700 mb-2">Urutan</label>
                    <input type="number" id="sort_order" name="sort_order"
                        value="<?= html_escape($step->sort_order); ?>"
                        min="1"
                        required
                        class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:outline-none focus:border-red-500 focus:ring-2 focus:ring-red-100 text-sm">
                </div>

                <!-- Gambar -->
                <div class="mb-5">
                    <span class="block text-sm font-semibold text-gray-700 mb-2">Gambar</span>

                    <?php if (!empty($step->image)): ?>
                        <div class="mb-3">
                            <img src="<?= base_url('assets/uploads/implementation/' . $step->image); ?>"
                                alt="<?= html_escape($step->title); ?>"
                                class="w-56 h-36 object-cover rounded-lg border border-gray-200">
                        </div>
                    <?php endif; ?>

                    <!-- Upload Gambar Baru -->
                    <input type="file" id="image" name="image"
                        accept=".jpg,.jpeg,.png,.webp"
                        class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-red-50 file:text-red-600 hover:file:bg-red-100 cursor-pointer">
                    <p class="mt-2 text-xs text-gray-400">Kosongkan jika tidak ingin mengganti gambar.</p>

                    <!-- Hapus Gambar Lama -->
                    <?php if (!empty($step->image)): ?>
                        <label class="flex items-center gap-2 mt-4 text-sm text-red-600 font-medium cursor-pointer">
                            <input type="checkbox" name="delete_image" value="1" class="rounded border-gray-300 text-red-500 focus:ring-red-400">
                            Hapus gambar
                        </label>
                    <?php endif; ?>
                </div>

                <!-- Actions -->
                <div class="flex flex-col sm:flex-row items-center gap-3">
                    <a href="<?= site_url('admin/implementation'); ?>"
                        class="w-full sm:w-auto inline-flex items-center justify-center gap-2 px-5 py-2.5 bg-gray-200 text-gray-700 rounded-lg text-sm font-semibold hover:bg-gray-300 transition">
                        <!-- Ikon Arrow Left -->
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                        </svg>
                        Kembali
                    </a>
                    <button type="submit"
                        class="w-full sm:w-auto inline-flex items-center justify-center gap-2 px-5 py-2.5 bg-red-500 text-white rounded-lg text-sm font-semibold shadow-md hover:bg-red-600 transition">
                        <!-- Ikon Check -->
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                        Simpan Perubahan
                    </button>
                </div>

            </form>

        </div>

    </div>

</body>

</html>