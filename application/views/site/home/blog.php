<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Highlight Desa Terpadu</title>
    <link rel="stylesheet" href="<?= base_url('assets/css/output.css'); ?>">
    <style>
        .line-clamp-2 {
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <?php $this->load->view('site/layout/nav'); ?>

    <div class="bg-white font-sans text-gray-800">
        <main class="max-w-6xl mx-auto px-4 pt-28 pb-16 md:pt-36 md:pb-20">
            
            <!-- Header Section -->
            <div class="text-center mb-8">
                <span class="text-red-500 font-medium text-sm tracking-wide">Artikel & News</span>
                <h1 class="text-3xl md:text-4xl font-bold text-gray-900 mt-2">Highlight Desa Terpadu</h1>
            </div>

            <!-- Highlight Section (Grid 2x2) - Tetap ambil 3 teratas -->
            <?php if (count($articles) > 0): ?>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 md:gap-6 mb-16">
                <?php 
                // Ambil 3 artikel pertama sebagai Highlight
                $highlights = array_slice($articles, 0, 3); 
                ?>

                <!-- Card 1 (Colspan 2) - Artikel Highlight ke-1 -->
                <?php if (isset($highlights[0])): ?>
                <a href="<?= base_url('blog/detail/'.$highlights[0]->slug) ?>" class="relative rounded-2xl overflow-hidden group md:col-span-2 h-64 md:h-[350px]">
                    <img src="<?= base_url('assets/uploads/'.$highlights[0]->image) ?>" 
                         alt="<?= $highlights[0]->title ?>" 
                         class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/40 to-transparent"></div>
                    <div class="absolute bottom-4 md:bottom-6 left-4 md:left-6 right-4 z-10 text-white">
                        <p class="text-xs md:text-sm text-gray-300 mb-1"><?= date('F d, Y', strtotime($highlights[0]->published_at)) ?></p>
                        <h3 class="text-lg md:text-xl font-semibold"><?= $highlights[0]->title ?></h3>
                    </div>
                </a>
                <?php endif; ?>

                <!-- Card 2 - Artikel Highlight ke-2 -->
                <?php if (isset($highlights[1])): ?>
                <a href="<?= base_url('blog/detail/'.$highlights[1]->slug) ?>" class="relative rounded-2xl overflow-hidden group h-64 md:h-[350px]">
                    <img src="<?= base_url('assets/uploads/'.$highlights[1]->image) ?>" 
                         alt="<?= $highlights[1]->title ?>" 
                         class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/40 to-transparent"></div>
                    <div class="absolute bottom-4 md:bottom-6 left-4 md:left-6 right-4 z-10 text-white">
                        <p class="text-xs md:text-sm text-gray-300 mb-1"><?= date('F d, Y', strtotime($highlights[1]->published_at)) ?></p>
                        <h3 class="text-lg md:text-xl font-semibold"><?= $highlights[1]->title ?></h3>
                    </div>
                </a>
                <?php endif; ?>

                <!-- Card 3 - Artikel Highlight ke-3 -->
                <?php if (isset($highlights[2])): ?>
                <a href="<?= base_url('blog/detail/'.$highlights[2]->slug) ?>" class="relative rounded-2xl overflow-hidden group h-64 md:h-[350px]">
                    <img src="<?= base_url('assets/uploads/'.$highlights[2]->image) ?>" 
                         alt="<?= $highlights[2]->title ?>" 
                         class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/40 to-transparent"></div>
                    <div class="absolute bottom-4 md:bottom-6 left-4 md:left-6 right-4 z-10 text-white">
                        <p class="text-xs md:text-sm text-gray-300 mb-1"><?= date('F d, Y', strtotime($highlights[2]->published_at)) ?></p>
                        <h3 class="text-lg md:text-xl font-semibold"><?= $highlights[2]->title ?></h3>
                    </div>
                </a>
                <?php endif; ?>
            </div>
            <?php endif; ?>

            <!-- All Posts Section (Sekarang tampilkan SEMUA artikel) -->
            <div class="mb-16">
                <h2 class="text-2xl font-semibold text-gray-800 mb-6">All Posts</h2>
                
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    <?php 
                    // PERUBAHAN: Langsung looping semua data articles, tanpa dipotong
                    if (count($articles) > 0): 
                        foreach($articles as $post): 
                    ?>
                    <a href="<?= base_url('blog/detail/'.$post->slug) ?>" class="block group">
                        <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden hover:shadow-md transition-shadow">
                            <div class="relative h-48 overflow-hidden">
                                <img src="<?= base_url('assets/uploads/'.$post->image) ?>" 
                                     alt="<?= $post->title ?>" 
                                     class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                                <span class="absolute top-3 right-3 bg-teal-600 text-white text-[10px] font-bold uppercase px-2 py-1 rounded-full tracking-wider">
                                    <?= $post->category ?>
                                </span>
                            </div>
                            <div class="p-5">
                                <h3 class="text-gray-800 font-medium text-base line-clamp-2 mb-3 min-h-[3rem]">
                                    <?= $post->title ?>
                                </h3>
                                <span class="inline-block text-red-500 text-[10px] font-bold uppercase tracking-wider hover:text-red-700">
                                    Read More &rarr;
                                </span>
                                <p class="mt-4 text-[10px] text-gray-400 border-t border-gray-100 pt-3">
                                    <?= date('F d, Y', strtotime($post->published_at)) ?>
                                </p>
                            </div>
                        </div>
                    </a>
                    <?php 
                        endforeach; 
                    else: ?>
                        <div class="col-span-full text-center text-gray-500 py-10">
                            <p>Belum ada artikel.</p>
                        </div>
                    <?php endif; ?>
                </div>
            </div>

        </main>
    </div>

    <?php $this->load->view('site/layout/footer'); ?>
</body>
</html>