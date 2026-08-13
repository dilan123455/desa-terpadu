<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $article->title ?> - Desa Digital</title>
    <link rel="stylesheet" href="<?= base_url('assets/css/output.css'); ?>">
</head>
<body>
    <!-- Navbar -->
    <?php $this->load->view('site/layout/nav'); ?>

    <div class="bg-white font-sans text-gray-800">
        <main class="max-w-4xl mx-auto px-4 pt-28 pb-16 md:pt-36 md:pb-20">
            
            <!-- Header Artikel -->
            <div class="text-center mb-8">
                <h1 class="text-3xl md:text-4xl font-bold text-gray-900 leading-tight mb-4">
                    <?= $article->title ?>
                </h1>
                <div class="text-sm text-gray-500">
                    <span><?= date('F d, Y', strtotime($article->published_at)) ?></span> 
                    <span class="mx-2">|</span> 
                    <span><?= $article->author_name ?></span>
                </div>
            </div>

            <!-- Gambar Utama Artikel (Path sudah disesuaikan dengan Admin) -->
            <div class="mb-10">
                <img src="<?= base_url('assets/uploads/'.$article->image) ?>" 
                     alt="<?= $article->title ?>" 
                     class="w-full h-auto object-cover rounded-lg shadow-sm">
            </div>

            <!-- Isi Artikel -->
            <div class="prose prose-lg max-w-none text-gray-700 leading-loose">
                <?= $article->content ?>
            </div>

            <!-- Share & Next Post -->
            <div class="flex flex-col md:flex-row justify-between items-center border-t border-b border-gray-100 py-6 mt-10 gap-4">
                <div class="flex items-center gap-3 text-sm font-medium text-gray-600">
                    <span>Share this Post:</span>
                    <div class="flex gap-2">
                        <a href="#" class="w-8 h-8 rounded-full bg-gray-100 flex items-center justify-center hover:bg-red-500 hover:text-white transition">X</a>
                        <a href="#" class="w-8 h-8 rounded-full bg-gray-100 flex items-center justify-center hover:bg-red-500 hover:text-white transition">Fb</a>
                        <a href="#" class="w-8 h-8 rounded-full bg-gray-100 flex items-center justify-center hover:bg-red-500 hover:text-white transition">Ig</a>
                    </div>
                </div>
                <div class="text-sm">
                    <!-- LINK KEMBALI DIUBAH KE blog -->
                    <a href="<?= base_url('blog') ?>" class="inline-flex items-center gap-2 text-gray-500 hover:text-red-500 transition font-medium">
                        Kembali ke List <span>&larr;</span>
                    </a>
                </div>
            </div>

            <!-- Related Posts Section -->
            <?php if (!empty($related_artikel)): ?>
            <div class="mt-12">
                <h2 class="text-2xl font-bold text-gray-900 mb-6">Related Posts</h2>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <?php foreach($related_artikel as $row): ?>
                    <!-- LINK RELATED POSTS DIUBAH KE blog/detail -->
                    <div class="group cursor-pointer" onclick="window.location.href='<?= base_url('blog/detail/'.$row->slug) ?>'">
                        <div class="overflow-hidden rounded-lg mb-3">
                            <img src="<?= base_url('assets/uploads/'.$row->image) ?>" 
                                 class="w-full h-48 object-cover group-hover:scale-105 transition-transform duration-300">
                        </div>
                        <h3 class="font-semibold text-gray-800 group-hover:text-red-500 transition"><?= $row->title ?></h3>
                        <p class="text-xs text-gray-500 mt-2 line-clamp-2">
                            <?= word_limiter(strip_tags($row->content), 15) ?>
                        </p>
                        <span class="text-red-500 text-xs font-bold inline-block mt-2 hover:underline">Baca Selengkapnya</span>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <?php endif; ?>

        </main>
    </div>
</body>
</html>