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

            <!-- Gambar Utama Artikel -->
            <div class="mb-10">
                <img src="<?= base_url('assets/uploads/'.$article->image) ?>" 
                     alt="<?= $article->title ?>" 
                     class="w-full h-auto object-cover rounded-lg shadow-sm"
                     loading="lazy"
                     decoding="async">
            </div>

            <!-- Isi Artikel -->
            <div class="prose prose-lg max-w-none text-gray-700 leading-loose">
                <?= $article->content ?>
            </div>

            <?php
                // Siapkan URL share untuk artikel ini
                $share_url = base_url('blog/detail/'.$article->slug);
                $wa_share = 'https://api.whatsapp.com/send?text=' . urlencode($article->title . ' - ' . $share_url);
                $twitter_share = 'https://twitter.com/intent/tweet?url=' . urlencode($share_url) . '&text=' . urlencode($article->title);
                $linkedin_share = 'https://www.linkedin.com/sharing/share-offsite/?url=' . urlencode($share_url);
                $facebook_share = 'https://www.facebook.com/sharer/sharer.php?u=' . urlencode($share_url);
            ?>

            <!-- Share & Next Post -->
            <div class="flex flex-col md:flex-row justify-between items-center border-t border-b border-gray-100 py-6 mt-10 gap-4">
                <div class="flex items-center gap-3 text-sm font-medium text-gray-600">
                    <span>Share this Post:</span>
                    <div class="flex gap-2">
                        <!-- WhatsApp -->
                        <a href="<?= $wa_share ?>" target="_blank" rel="noopener noreferrer" 
                           class="w-8 h-8 rounded-full bg-gray-100 flex items-center justify-center hover:bg-green-500 hover:text-white transition" 
                           title="Bagikan ke WhatsApp">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
                            </svg>
                        </a>
                        <!-- Twitter/X -->
                        <a href="<?= $twitter_share ?>" target="_blank" rel="noopener noreferrer" 
                           class="w-8 h-8 rounded-full bg-gray-100 flex items-center justify-center hover:bg-blue-400 hover:text-white transition" 
                           title="Bagikan ke Twitter/X">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/>
                            </svg>
                        </a>
                        <!-- LinkedIn -->
                        <a href="<?= $linkedin_share ?>" target="_blank" rel="noopener noreferrer" 
                           class="w-8 h-8 rounded-full bg-gray-100 flex items-center justify-center hover:bg-blue-700 hover:text-white transition" 
                           title="Bagikan ke LinkedIn">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/>
                            </svg>
                        </a>
                        <!-- Facebook -->
                        <a href="<?= $facebook_share ?>" target="_blank" rel="noopener noreferrer" 
                           class="w-8 h-8 rounded-full bg-gray-100 flex items-center justify-center hover:bg-blue-600 hover:text-white transition" 
                           title="Bagikan ke Facebook">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                            </svg>
                        </a>
                    </div>
                </div>
                <div class="text-sm">
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
                    <div class="group cursor-pointer" onclick="window.location.href='<?= base_url('blog/detail/'.$row->slug) ?>'">
                        <div class="overflow-hidden rounded-lg mb-3">
                            <img src="<?= base_url('assets/uploads/'.$row->image) ?>" 
                                 class="w-full h-48 object-cover group-hover:scale-105 transition-transform duration-300"
                                 loading="lazy"
                                 decoding="async">
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