<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="<?= base_url('assets/css/output.css'); ?>">

    <title><?= html_escape($title); ?> - Desa Terpadu</title>
</head>

<body class="bg-gray-100 text-gray-800 min-h-screen py-8 px-4">

    <div class="w-full max-w-4xl mx-auto">

        <!-- Kembali -->
        <a href="<?= site_url('admin/articles'); ?>"
            class="inline-flex items-center gap-2 text-sm font-semibold text-gray-600 hover:text-red-500 transition mb-6">
            <!-- Ikon Arrow Left -->
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
            </svg>
            Kembali ke Artikel
        </a>

        <!-- Flash Message -->
        <?php if ($this->session->flashdata('success')): ?>
            <div class="flex items-center gap-2 px-4 py-3 mb-5 rounded-lg bg-green-50 text-green-700 border border-green-200 text-sm">
                <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                </svg>
                <?= html_escape($this->session->flashdata('success')); ?>
            </div>
        <?php endif; ?>

        <!-- Article Card -->
        <article class="bg-white border border-gray-200 rounded-2xl shadow-sm p-6 sm:p-10">

            <!-- Kategori -->
            <?php if (!empty($article->category)): ?>
                <span class="inline-block px-3 py-1 bg-blue-50 text-blue-600 rounded-full text-xs font-bold mb-4">
                    <?= html_escape($article->category); ?>
                </span>
            <?php endif; ?>

            <!-- Judul -->
            <h1 class="text-2xl sm:text-3xl font-bold text-gray-900 leading-tight mb-3">
                <?= html_escape($article->title); ?>
            </h1>

            <!-- Meta -->
            <div class="flex flex-wrap items-center gap-2 text-sm text-gray-500 mb-6">
                <?php if (!empty($article->published_at)): ?>
                    <span><?= date('d M Y H:i', strtotime($article->published_at)); ?></span>
                <?php endif; ?>
                <?php if (!empty($article->author_name)): ?>
                    <span>·</span>
                    <span><?= html_escape($article->author_name); ?></span>
                <?php endif; ?>
            </div>

            <!-- Gambar -->
            <?php if (!empty($article->image)): ?>
                <img src="<?= base_url('assets/uploads/' . $article->image); ?>"
                    alt="<?= html_escape($article->title); ?>"
                    class="w-full max-h-[500px] object-cover rounded-xl border border-gray-200 mb-8">
            <?php else: ?>
                <div class="w-full h-64 bg-gray-50 border border-gray-200 rounded-xl flex items-center justify-center text-gray-400 text-sm mb-8">
                    Tidak ada gambar
                </div>
            <?php endif; ?>

            <!-- Isi Artikel -->
            <div class="prose max-w-none text-gray-700 leading-relaxed space-y-4">
                <?= nl2br(html_escape($article->content)); ?>
            </div>

            <!-- Informasi Tambahan -->
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mt-8 pt-6 border-t border-gray-100">
                <!-- Status -->
                <div class="bg-gray-50 rounded-lg p-4">
                    <span class="block text-xs font-semibold text-gray-500 uppercase tracking-wider mb-2">Status</span>
                    <?php if ($article->status === 'published'): ?>
                        <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-green-50 text-green-700 text-xs font-semibold">
                            <span class="w-1.5 h-1.5 rounded-full bg-green-600"></span>
                            Published
                        </span>
                    <?php else: ?>
                        <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-amber-50 text-amber-700 text-xs font-semibold">
                            <span class="w-1.5 h-1.5 rounded-full bg-amber-600"></span>
                            <?= html_escape($article->status); ?>
                        </span>
                    <?php endif; ?>
                </div>

                <!-- Slug -->
                <div class="bg-gray-50 rounded-lg p-4">
                    <span class="block text-xs font-semibold text-gray-500 uppercase tracking-wider mb-2">Slug</span>
                    <span class="text-sm font-semibold text-gray-800 break-all"><?= html_escape($article->slug); ?></span>
                </div>
            </div>

            <!-- Tombol Aksi -->
            <div class="flex flex-col sm:flex-row gap-3 mt-8">
                <a href="<?= site_url('admin/articles'); ?>"
                    class="inline-flex items-center justify-center gap-2 px-5 py-2.5 bg-gray-200 text-gray-700 rounded-lg text-sm font-semibold hover:bg-gray-300 transition">
                    <!-- Ikon Arrow Left -->
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                    </svg>
                    Kembali
                </a>
                <a href="<?= site_url('admin/articles/edit/' . $article->id); ?>"
                    class="inline-flex items-center justify-center gap-2 px-5 py-2.5 bg-red-500 text-white rounded-lg text-sm font-semibold shadow-md hover:bg-red-600 transition">
                    <!-- Ikon Pencil -->
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                    </svg>
                    Edit Artikel
                </a>
            </div>

        </article>

    </div>

</body>

</html>