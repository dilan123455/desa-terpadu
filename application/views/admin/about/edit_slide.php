<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="<?= base_url('assets/css/output.css'); ?>">

    <title><?= html_escape($title); ?> - Desa Terpadu</title>
</head>

<body class="bg-gray-100 text-gray-800 min-h-screen flex items-center justify-center p-4">

    <div class="w-full max-w-2xl">

        <!-- Header -->
        <div class="mb-6">
            <h1 class="text-2xl font-bold text-gray-800">Edit Slide About</h1>
            <p class="text-sm text-gray-500 mt-1">Perbarui gambar dan informasi slide pada halaman About.</p>
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

            <!-- Flash Success -->
            <?php if ($this->session->flashdata('success')): ?>
                <div class="flex items-center gap-2 px-4 py-3 mb-5 rounded-lg bg-green-50 text-green-700 border border-green-200 text-sm">
                    <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                    </svg>
                    <?= html_escape($this->session->flashdata('success')); ?>
                </div>
            <?php endif; ?>

            <form action="<?= site_url('admin/about/update_slide/' . $slide->id); ?>" method="post" enctype="multipart/form-data">

                <!-- Judul Slide -->
                <div class="mb-5">
                    <label for="title" class="block text-sm font-semibold text-gray-700 mb-2">Judul Slide</label>
                    <input type="text" id="title" name="title"
                        value="<?= html_escape($slide->title); ?>"
                        required
                        class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:outline-none focus:border-red-500 focus:ring-2 focus:ring-red-100 text-sm">
                </div>

                <!-- Urutan -->
                <div class="mb-5">
                    <label for="sort_order" class="block text-sm font-semibold text-gray-700 mb-2">Urutan</label>
                    <input type="number" id="sort_order" name="sort_order"
                        value="<?= html_escape($slide->sort_order); ?>"
                        min="1" required
                        class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:outline-none focus:border-red-500 focus:ring-2 focus:ring-red-100 text-sm">
                </div>

                <!-- Gambar Saat Ini -->
                <div class="mb-5">
                    <span class="block text-sm font-semibold text-gray-700 mb-2">Gambar Saat Ini</span>
                    <img src="<?= base_url('assets/uploads/about/' . $slide->image); ?>"
                        alt="<?= html_escape($slide->title); ?>"
                        class="w-full max-w-md rounded-xl border border-gray-200">
                    <p class="mt-2 text-xs text-gray-500"><?= html_escape($slide->image); ?></p>
                </div>

                <!-- Ganti Gambar -->
                <div class="mb-6">
                    <label for="image" class="block text-sm font-semibold text-gray-700 mb-2">Ganti Gambar</label>
                    <input type="file" id="image" name="image"
                        accept=".jpg,.jpeg,.png,.webp"
                        class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-red-50 file:text-red-600 hover:file:bg-red-100 cursor-pointer">
                    <p class="mt-2 text-xs text-gray-400">Kosongkan jika tidak ingin mengganti gambar.</p>
                </div>

                <!-- Actions -->
                <div class="flex items-center gap-3">
                    <a href="<?= site_url('admin/about'); ?>"
                        class="inline-flex items-center justify-center px-5 py-2.5 bg-gray-200 text-gray-700 rounded-lg text-sm font-semibold hover:bg-gray-300 transition">
                        Batal
                    </a>
                    <button type="submit"
                        class="inline-flex items-center justify-center px-5 py-2.5 bg-red-500 text-white rounded-lg text-sm font-semibold shadow-md hover:bg-red-600 transition">
                        Simpan Perubahan
                    </button>
                </div>

            </form>

        </div>

    </div>

</body>

</html>