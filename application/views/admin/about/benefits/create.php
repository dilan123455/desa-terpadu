<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="<?= base_url('assets/css/output.css'); ?>">

    <title><?= html_escape($title); ?> - Desa Terpadu</title>
</head>

<body class="bg-gray-100 text-gray-800 min-h-screen flex items-center justify-center py-12">

    <!-- Form Card -->
    <div class="bg-white border border-gray-200 rounded-2xl shadow-sm overflow-hidden w-full max-w-2xl mx-4">

        <div class="p-6">

            <!-- Page Header (inside card) -->
            <div class="mb-6">
                <h2 class="text-2xl font-bold text-gray-800">Tambah Manfaat</h2>
                <p class="text-sm text-gray-500 mt-1">Tambahkan manfaat baru untuk halaman About.</p>
            </div>

            <form action="<?= site_url('admin/about/benefit_store'); ?>" method="post">

                <!-- CSRF (jika diperlukan) -->
                <!-- <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>"> -->

                <!-- Judul Manfaat -->
                <div class="mb-5">
                    <label for="title" class="block text-sm font-semibold text-gray-700 mb-2">
                        Judul Manfaat <span class="text-red-500">*</span>
                    </label>
                    <input
                        type="text"
                        id="title"
                        name="title"
                        required
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-red-500 outline-none transition text-sm"
                        placeholder="Misalnya: Pelayanan Cepat"
                    >
                </div>

                <!-- Deskripsi -->
                <div class="mb-5">
                    <label for="description" class="block text-sm font-semibold text-gray-700 mb-2">
                        Deskripsi <span class="text-red-500">*</span>
                    </label>
                    <textarea
                        id="description"
                        name="description"
                        required
                        rows="4"
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-red-500 outline-none transition text-sm resize-y"
                        placeholder="Jelaskan manfaat ini secara singkat..."
                    ></textarea>
                </div>

                <!-- Urutan (default kosong, opsional) -->
                <div class="mb-5">
                    <label for="sort_order" class="block text-sm font-semibold text-gray-700 mb-2">
                        Urutan
                    </label>
                    <input
                        type="number"
                        id="sort_order"
                        name="sort_order"
                        class="w-24 px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-red-500 outline-none transition text-sm"
                    >
                    <p class="text-xs text-gray-500 mt-1">Biarkan kosong untuk urutan otomatis.</p>
                </div>

                <!-- Actions -->
                <div class="flex flex-wrap gap-3 pt-2">

                    <a
                        href="<?= site_url('admin/about'); ?>"
                        class="inline-flex items-center gap-2 px-5 py-2.5 bg-gray-200 text-gray-700 rounded-lg text-sm font-semibold hover:bg-gray-300 transition"
                    >
                        Batal
                    </a>

                    <button
                        type="submit"
                        class="inline-flex items-center gap-2 px-5 py-2.5 bg-red-500 text-white rounded-lg text-sm font-semibold shadow-md hover:bg-red-600 transition"
                    >
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                        Simpan Manfaat
                    </button>

                </div>

            </form>

        </div>

    </div>

</body>

</html>