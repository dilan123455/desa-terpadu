<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="<?= base_url('assets/css/output.css'); ?>">

    <title><?= html_escape($title); ?> - Desa Terpadu</title>
</head>

<body class="bg-gray-100 text-gray-800 min-h-screen py-8 px-4">

    <div class="w-full max-w-3xl mx-auto">

        <!-- Kembali -->
        <a href="<?= site_url('admin/faq'); ?>"
            class="inline-flex items-center gap-2 text-sm font-semibold text-gray-600 hover:text-red-500 transition mb-6">
            <!-- Ikon Arrow Left -->
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
            </svg>
            Kembali ke FAQ
        </a>

        <!-- Flash Success -->
        <?php if ($this->session->flashdata('success')): ?>
            <div class="flex items-center gap-2 px-4 py-3 mb-5 rounded-lg bg-green-50 text-green-700 border border-green-200 text-sm">
                <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                </svg>
                <?= html_escape($this->session->flashdata('success')); ?>
            </div>
        <?php endif; ?>

        <!-- Flash Error -->
        <?php if ($this->session->flashdata('error')): ?>
            <div class="flex items-center gap-2 px-4 py-3 mb-5 rounded-lg bg-red-50 text-red-700 border border-red-200 text-sm">
                <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <?= html_escape($this->session->flashdata('error')); ?>
            </div>
        <?php endif; ?>

        <!-- Detail Card -->
        <div class="bg-white border border-gray-200 rounded-2xl shadow-sm p-6 sm:p-8">

            <!-- Pertanyaan -->
            <div class="mb-6">
                <span class="block text-xs font-bold text-gray-500 uppercase tracking-wider mb-2">Pertanyaan</span>
                <h1 class="text-xl sm:text-2xl font-bold text-gray-900 leading-relaxed">
                    <?= html_escape($faq->question); ?>
                </h1>
            </div>

            <!-- Jawaban -->
            <div class="mb-8">
                <span class="block text-xs font-bold text-gray-500 uppercase tracking-wider mb-2">Jawaban</span>
                <div class="bg-gray-50 border border-gray-200 rounded-lg p-5 text-sm text-gray-700 leading-relaxed whitespace-pre-line">
                    <?= html_escape($faq->answer); ?>
                </div>
            </div>

            <!-- Info Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 mb-8">
                <!-- Status -->
                <div class="bg-gray-50 rounded-lg p-4">
                    <span class="block text-xs font-semibold text-gray-500 uppercase tracking-wider mb-2">Status</span>
                    <?php if ($faq->status === 'active'): ?>
                        <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-green-50 text-green-700 text-xs font-semibold">
                            <span class="w-1.5 h-1.5 rounded-full bg-green-600"></span>
                            Aktif
                        </span>
                    <?php else: ?>
                        <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-gray-100 text-gray-600 text-xs font-semibold">
                            <span class="w-1.5 h-1.5 rounded-full bg-gray-400"></span>
                            Nonaktif
                        </span>
                    <?php endif; ?>
                </div>

                <!-- Urutan -->
                <div class="bg-gray-50 rounded-lg p-4">
                    <span class="block text-xs font-semibold text-gray-500 uppercase tracking-wider mb-2">Urutan</span>
                    <span class="text-sm font-bold text-gray-800"><?= (int) $faq->sort_order; ?></span>
                </div>

                <!-- Dibuat -->
                <div class="bg-gray-50 rounded-lg p-4">
                    <span class="block text-xs font-semibold text-gray-500 uppercase tracking-wider mb-2">Dibuat</span>
                    <span class="text-sm font-semibold text-gray-800">
                        <?= !empty($faq->created_at) ? date('d M Y H:i', strtotime($faq->created_at)) : '-'; ?>
                    </span>
                </div>
            </div>

            <!-- Actions -->
            <div class="flex flex-col sm:flex-row justify-end gap-3 pt-5 border-t border-gray-100">
                <a href="<?= site_url('admin/faq'); ?>"
                    class="inline-flex items-center justify-center gap-2 px-5 py-2.5 bg-gray-200 text-gray-700 rounded-lg text-sm font-semibold hover:bg-gray-300 transition">
                    <!-- Ikon Arrow Left -->
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                    </svg>
                    Kembali
                </a>
                <a href="<?= site_url('admin/faq/edit/' . $faq->id); ?>"
                    class="inline-flex items-center justify-center gap-2 px-5 py-2.5 bg-red-500 text-white rounded-lg text-sm font-semibold shadow-md hover:bg-red-600 transition">
                    <!-- Ikon Pencil -->
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                    </svg>
                    Edit FAQ
                </a>
            </div>

        </div>

    </div>

</body>

</html>