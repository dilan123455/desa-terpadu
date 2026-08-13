<section class="relative flex min-h-screen flex-col items-center justify-center overflow-hidden bg-[#f2ece7] pt-20 pb-40 md:pb-64">
  <!-- Konten Utama -->
  <div class="relative z-10 w-full">
    <!-- Header -->
    <header class="max-w-4xl mx-auto text-center mb-16 px-4">
      <p class="text-[#D05A5A] text-lg md:text-xl font-medium tracking-wide mb-4">Artikel & News</p>
      <h2 class="text-4xl md:text-6xl font-bold text-[#2E2D2D] mb-8">Menuju Desa Masa Depan</h2>
      <p class="text-[#4A4A4A] text-base md:text-lg leading-relaxed max-w-3xl mx-auto">
        Ikuti kabar terkini dari desa – desa yang telah bergabung dengan DesaTerpadu. Dapatkan update regulasi, kisah sukses, dan tren teknologi desa yang bisa jadi referensi untuk transformasi digital Anda.
      </p>
    </header>

    <!-- Grid Kartu Artikel (Dinamis dari Database) -->
    <div class="w-full max-w-7xl mx-auto px-4 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
      
      <?php 
      // Ambil 3 artikel teratas dari data yang dikirim controller
      if (isset($articles) && count($articles) > 0): 
          $highlight_posts = array_slice($articles, 0, 3);
          foreach($highlight_posts as $post): 
      ?>
      
      <article class="bg-white rounded-2xl shadow-sm overflow-hidden flex flex-col h-full hover:shadow-md transition-shadow duration-300">
        <div class="relative">
          
          <!-- LOGIKA GAMBAR: Jika ada gambar, tampilkan. Jika kosong, tampilkan placeholder abu-abu -->
          <?php if (!empty($post->image)): ?>
            <img src="<?= base_url('assets/uploads/'.$post->image) ?>" 
                 alt="<?= $post->title ?>" 
                 class="w-full h-52 object-cover" 
                 loading="lazy" />
          <?php else: ?>
            <div class="w-full h-52 bg-gray-200 flex items-center justify-center">
                <span class="text-gray-400 text-sm font-medium">No Image</span>
            </div>
          <?php endif; ?>

          <!-- Badge Kategori -->
          <span class="absolute top-4 right-4 bg-[#4E8C7B] text-white text-[10px] font-bold px-3 py-1 rounded-full uppercase tracking-wide">
            <?= $post->category ?>
          </span>
        </div>
        <div class="p-6 md:p-8 flex flex-col flex-grow">
          <h3 class="text-xl md:text-2xl font-bold text-[#2E2D2D] mb-6 leading-tight">
            <?= $post->title ?>
          </h3>
          
          <!-- Link Baca Selengkapnya -->
          <a href="<?= base_url('blog/detail/'.$post->slug) ?>" class="inline-block text-[#B03A3A] font-bold text-sm uppercase tracking-wide mt-auto mb-5 hover:text-red-700 transition-colors">
            Baca Selengkapnya
          </a>
          
          <hr class="border-gray-200" />
          
          <!-- Tanggal Artikel -->
          <time datetime="<?= $post->published_at ?>" class="text-xs text-gray-400 mt-3">
            <?= date('d F Y', strtotime($post->published_at)) ?>
          </time>
        </div>
      </article>

      <?php 
          endforeach; 
      else: 
      ?>
        <!-- Jika belum ada artikel sama sekali -->
        <div class="col-span-full text-center text-gray-500 py-10">
            <p>Belum ada artikel yang dipublikasikan. Silakan tambahkan dari halaman Admin.</p>
        </div>
      <?php endif; ?>

    </div>
  </div>

  <!-- Tombol Artikel Lainnya -->
  <div class="mt-10">
    <a href="<?= base_url('blog') ?>" class="group relative inline-block bg-[#f2d88d] text-gray-900 font-semibold px-8 py-3.5 md:px-10 md:py-4 rounded-lg shadow-md hover:shadow-[0_10px_40px_-10px_rgba(0,0,0,0.3)] transition-all duration-300 ease-in-out hover:scale-105 active:scale-95 overflow-hidden cta-fade-in-up">
      <span class="relative z-10">Artikel Lainnya</span>

      <span class="absolute inset-0 bg-gradient-to-r from-[#e6d082] to-[#f2d88d] opacity-0 group-hover:opacity-100 transition-opacity duration-300"></span>
    </a>
  </div>

  <!-- Background Wave -->
  <div class="pointer-events-none absolute bottom-0 left-0 z-0 w-full" style="transform: scaleY(-1);" aria-hidden="true">
    <svg viewBox="0 0 1440 400" class="h-auto w-full" fill="none" xmlns="http://www.w3.org/2000/svg">
      <path d="M0,96 C300,240 500,30 800,80 C1100,130 1300,240 1440,180 L1440,0 L0,0 Z" fill="#FFFFFF" opacity="0.8" />
      <path d="M0,110 C300,260 500,50 800,100 C1100,150 1300,260 1440,200 L1440,0 L0,0 Z" fill="#FFFFFF" opacity="0.5" />
    </svg>
  </div>
</section>