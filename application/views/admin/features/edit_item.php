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
            <h1 class="text-2xl font-bold text-gray-800">Edit Fitur</h1>
            <p class="text-sm text-gray-500 mt-1">Perbarui informasi fitur unggulan.</p>
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

            <form action="<?= site_url('admin/features/update-item/' . $item->id); ?>" method="post">

                <!-- Platform -->
                <div class="mb-5">
                    <label for="platform_id" class="block text-sm font-semibold text-gray-700 mb-2">Platform</label>
                    <select name="platform_id" id="platform_id"
                        class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:outline-none focus:border-red-500 focus:ring-2 focus:ring-red-100 text-sm">
                        <?php foreach ($platforms as $platform): ?>
                            <option value="<?= $platform->id; ?>" <?= $platform->id == $item->platform_id ? 'selected' : ''; ?>>
                                <?= html_escape($platform->name); ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <!-- Nama Fitur -->
                <div class="mb-5">
                    <label for="title" class="block text-sm font-semibold text-gray-700 mb-2">Nama Fitur</label>
                    <input type="text" name="title" id="title"
                        value="<?= html_escape($item->title); ?>"
                        required
                        class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:outline-none focus:border-red-500 focus:ring-2 focus:ring-red-100 text-sm">
                </div>

                <!-- Deskripsi -->
                <div class="mb-5">
                    <label for="description" class="block text-sm font-semibold text-gray-700 mb-2">Deskripsi</label>
                    <textarea name="description" id="description"
                        rows="4"
                        required
                        class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:outline-none focus:border-red-500 focus:ring-2 focus:ring-red-100 text-sm resize-y"><?= html_escape($item->description); ?></textarea>
                </div>

                <!-- Icon -->
                <div class="mb-5">
                    <label for="icon" class="block text-sm font-semibold text-gray-700 mb-2">Icon</label>
                    <input type="text" name="icon" id="icon"
                        value="<?= html_escape($item->icon); ?>"
                        placeholder="URL / path icon"
                        class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:outline-none focus:border-red-500 focus:ring-2 focus:ring-red-100 text-sm">
                </div>

                <!-- Urutan -->
                <div class="mb-6">
                    <label for="sort_order" class="block text-sm font-semibold text-gray-700 mb-2">Urutan</label>
                    <input type="number" name="sort_order" id="sort_order"
                        value="<?= html_escape($item->sort_order); ?>"
                        class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:outline-none focus:border-red-500 focus:ring-2 focus:ring-red-100 text-sm">
                </div>

                <!-- Actions -->
                <div class="flex flex-col sm:flex-row items-center gap-3">
                    <a href="<?= site_url('admin/features'); ?>"
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