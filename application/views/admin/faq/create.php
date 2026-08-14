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
            <h1 class="text-2xl font-bold text-gray-800">Tambah FAQ</h1>
            <p class="text-sm text-gray-500 mt-1">Tambahkan pertanyaan dan jawaban untuk website Desa Terpadu.</p>
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

            <form action="<?= site_url('admin/faq/store'); ?>" method="post">

                <!-- Pertanyaan -->
                <div class="mb-5">
                    <label for="question" class="block text-sm font-semibold text-gray-700 mb-2">Pertanyaan</label>
                    <input type="text" id="question" name="question"
                        placeholder="Contoh: Apa itu Desa Terpadu?"
                        required
                        class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:outline-none focus:border-red-500 focus:ring-2 focus:ring-red-100 text-sm">
                    <p class="mt-2 text-xs text-gray-400">Masukkan pertanyaan yang sering ditanyakan masyarakat.</p>
                </div>

                <!-- Jawaban -->
                <div class="mb-5">
                    <label for="answer" class="block text-sm font-semibold text-gray-700 mb-2">Jawaban</label>
                    <textarea id="answer" name="answer"
                        placeholder="Tuliskan jawaban untuk pertanyaan tersebut..."
                        rows="6"
                        required
                        class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:outline-none focus:border-red-500 focus:ring-2 focus:ring-red-100 text-sm resize-y"></textarea>
                    <p class="mt-2 text-xs text-gray-400">Berikan jawaban yang jelas dan mudah dipahami.</p>
                </div>

                <!-- Urutan -->
                <div class="mb-5">
                    <label for="sort_order" class="block text-sm font-semibold text-gray-700 mb-2">Urutan</label>
                    <input type="number" id="sort_order" name="sort_order"
                        value="1" min="0"
                        class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:outline-none focus:border-red-500 focus:ring-2 focus:ring-red-100 text-sm">
                    <p class="mt-2 text-xs text-gray-400">Menentukan urutan FAQ yang ditampilkan.</p>
                </div>

                <!-- Status -->
                <div class="mb-6">
                    <label for="status" class="block text-sm font-semibold text-gray-700 mb-2">Status</label>
                    <select id="status" name="status"
                        class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:outline-none focus:border-red-500 focus:ring-2 focus:ring-red-100 text-sm">
                        <option value="active" selected>Aktif</option>
                        <option value="inactive">Tidak Aktif</option>
                    </select>
                </div>

                <!-- Actions -->
                <div class="flex flex-col sm:flex-row items-center gap-3">
                    <a href="<?= site_url('admin/faq'); ?>"
                        class="w-full sm:w-auto inline-flex items-center justify-center px-5 py-2.5 bg-gray-200 text-gray-700 rounded-lg text-sm font-semibold hover:bg-gray-300 transition">
                        Batal
                    </a>
                    <button type="submit"
                        class="w-full sm:w-auto inline-flex items-center justify-center px-5 py-2.5 bg-red-500 text-white rounded-lg text-sm font-semibold shadow-md hover:bg-red-600 transition">
                        Simpan FAQ
                    </button>
                </div>

            </form>

        </div>

    </div>

</body>

</html>