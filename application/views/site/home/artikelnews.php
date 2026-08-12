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

    <!-- Grid Kartu Artikel -->
    <div class="w-full max-w-7xl mx-auto px-4 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
      <!-- Kartu 1 -->
      <article class="bg-white rounded-2xl shadow-sm overflow-hidden flex flex-col h-full hover:shadow-md transition-shadow duration-300">
        <div class="relative">
          <img src="" alt="Pasar Baru untuk Petani" class="w-full h-52 object-cover random-image" loading="lazy" />
          <span class="absolute top-4 right-4 bg-[#4E8C7B] text-white text-[10px] font-bold px-3 py-1 rounded-full uppercase tracking-wide">Highlight</span>
        </div>
        <div class="p-6 md:p-8 flex flex-col flex-grow">
          <h3 class="text-xl md:text-2xl font-bold text-[#2E2D2D] mb-6 leading-tight">Pasar Baru untuk Petani: Dari Kebun ke Toko Online Desa</h3>
          <a href="#" class="inline-block text-[#B03A3A] font-bold text-sm uppercase tracking-wide mt-auto mb-5 hover:text-red-700 transition-colors">Baca Selengkapnya</a>
          <hr class="border-gray-200" />
          <time datetime="2025-08-31" class="text-xs text-gray-400 mt-3">31 Agustus 2025</time>
        </div>
      </article>

      <!-- Kartu 2 -->
      <article class="bg-white rounded-2xl shadow-sm overflow-hidden flex flex-col h-full hover:shadow-md transition-shadow duration-300">
        <div class="relative">
          <img src="" alt="Digitalisasi Tingkatkan Transparansi Anggaran Desa" class="w-full h-52 object-cover random-image" loading="lazy" />
          <span class="absolute top-4 right-4 bg-[#4E8C7B] text-white text-[10px] font-bold px-3 py-1 rounded-full uppercase tracking-wide">Uncategorized</span>
        </div>
        <div class="p-6 md:p-8 flex flex-col flex-grow">
          <h3 class="text-xl md:text-2xl font-bold text-[#2E2D2D] mb-6 leading-tight">Digitalisasi Tingkatkan Transparansi Anggaran Desa</h3>
          <a href="#" class="inline-block text-[#B03A3A] font-bold text-sm uppercase tracking-wide mt-auto mb-5 hover:text-red-700 transition-colors">Baca Selengkapnya</a>
          <hr class="border-gray-200" />
          <time datetime="2025-08-31" class="text-xs text-gray-400 mt-3">31 Agustus 2025</time>
        </div>
      </article>

      <!-- Kartu 3 -->
      <article class="bg-white rounded-2xl shadow-sm overflow-hidden flex flex-col h-full hover:shadow-md transition-shadow duration-300">
        <div class="relative">
          <img src="" alt="5 Langkah Mudah Menuju Desa Digital" class="w-full h-52 object-cover random-image" loading="lazy" />
          <span class="absolute top-4 right-4 bg-[#4E8C7B] text-white text-[10px] font-bold px-3 py-1 rounded-full uppercase tracking-wide">Uncategorized</span>
        </div>
        <div class="p-6 md:p-8 flex flex-col flex-grow">
          <h3 class="text-xl md:text-2xl font-bold text-[#2E2D2D] mb-6 leading-tight">5 Langkah Mudah Menuju Desa Digital</h3>
          <a href="#" class="inline-block text-[#B03A3A] font-bold text-sm uppercase tracking-wide mt-auto mb-5 hover:text-red-700 transition-colors">Baca Selengkapnya</a>
          <hr class="border-gray-200" />
          <time datetime="2025-08-30" class="text-xs text-gray-400 mt-3">30 Agustus 2025</time>
        </div>
      </article>
    </div>
  </div>

  <!-- Tombol Artikel Lainnya (Ukuran Lebih Kecil) -->
<div class="mt-10">
  <a href="#" class="group relative inline-block bg-[#f2d88d] text-gray-900 font-semibold px-8 py-3.5 md:px-10 md:py-4 rounded-lg shadow-md hover:shadow-[0_10px_40px_-10px_rgba(0,0,0,0.3)] transition-all duration-300 ease-in-out hover:scale-105 active:scale-95 overflow-hidden cta-fade-in-up">
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

<script>
  // Mengisi gambar acak untuk setiap kartu
  document.querySelectorAll('.random-image').forEach((img, index) => {
    const seed = Math.floor(Math.random() * 10000) + index;
    img.src = `https://picsum.photos/seed/${seed}/600/400`;
  });
</script>