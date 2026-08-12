<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Highlight Desa Terpadu</title>
    <link rel="stylesheet" href="<?= base_url('assets/css/output.css'); ?>">
    <style>
        /* Custom font utility untuk line clamp jika diperlukan */
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

    <div class="bg-white font-sans text-gray-800">>

    <main class="max-w-6xl mx-auto px-4 py-12 md:py-16">
        
        <!-- Header Section -->
        <div class="text-center mb-8">
            <span class="text-red-500 font-medium text-sm tracking-wide">Artikel & News</span>
            <h1 class="text-3xl md:text-4xl font-bold text-gray-900 mt-2">Highlight Desa Terpadu</h1>
        </div>

        <!-- Highlight Section (Grid 2x2) -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 md:gap-6 mb-16">
            <!-- Card 1 (Colspan 2) -->
            <div class="relative rounded-2xl overflow-hidden group md:col-span-2 h-64 md:h-[350px]">
                <img src="https://images.unsplash.com/photo-1542744173-8e7e53415bb0?auto=format&fit=crop&q=80&w=1200" 
                     alt="Pasar Petani" 
                     class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105">
                <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/40 to-transparent"></div>
                <div class="absolute bottom-4 md:bottom-6 left-4 md:left-6 right-4 z-10 text-white">
                    <p class="text-xs md:text-sm text-gray-300 mb-1">August 31, 2025</p>
                    <h3 class="text-lg md:text-xl font-semibold">Pasar Baru untuk Petani: Dari Kebun ke Toko Online Desa</h3>
                </div>
            </div>

            <!-- Card 2 -->
            <div class="relative rounded-2xl overflow-hidden group h-64 md:h-[350px]">
                <img src="https://images.unsplash.com/photo-1551288049-bebda4e38f71?auto=format&fit=crop&q=80&w=800" 
                     alt="Digitalisasi Desa" 
                     class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105">
                <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/40 to-transparent"></div>
                <div class="absolute bottom-4 md:bottom-6 left-4 md:left-6 right-4 z-10 text-white">
                    <p class="text-xs md:text-sm text-gray-300 mb-1">August 31, 2025</p>
                    <h3 class="text-lg md:text-xl font-semibold">Digitalisasi Tingkatkan Transparansi Anggaran Desa</h3>
                </div>
            </div>

            <!-- Card 3 -->
            <div class="relative rounded-2xl overflow-hidden group h-64 md:h-[350px]">
                <img src="https://images.unsplash.com/photo-1511497584788-876760111969?auto=format&fit=crop&q=80&w=800" 
                     alt="Desa Digital" 
                     class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105">
                <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/40 to-transparent"></div>
                <div class="absolute bottom-4 md:bottom-6 left-4 md:left-6 right-4 z-10 text-white">
                    <p class="text-xs md:text-sm text-gray-300 mb-1">August 30, 2025</p>
                    <h3 class="text-lg md:text-xl font-semibold">5 Langkah Mudah Menuju Desa Digital</h3>
                </div>
            </div>
        </div>


        <!-- All Posts Section -->
        <div class="mb-16">
            <h2 class="text-2xl font-semibold text-gray-800 mb-6">All Posts</h2>
            
            <!-- Container untuk JS Render -->
            <div id="posts-container" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <!-- Kartu akan di-render oleh JavaScript di bawah -->
            </div>
        </div>


        <!-- Social Media Posts Section -->
        <div class="mb-8 text-center">
            <h2 class="text-3xl font-bold text-gray-900 mb-2">Social Media Posts</h2>
            <p class="text-gray-500 text-sm max-w-2xl mx-auto">
                Kunjungi Sosial Media Kami dan Temukan Hal Menarik Tentang Perubahan Digital Lainnya
            </p>
        </div>

        <!-- Container untuk JS Render -->
        <div id="social-container" class="grid grid-cols-2 md:grid-cols-5 gap-4">
            <!-- Grid item akan di-render oleh JavaScript di bawah -->
        </div>

    </main>

    <!-- JavaScript Logic -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            
            // 1. Data Mockup untuk All Posts
            const postsData = [
                {
                    image: 'https://images.unsplash.com/photo-1542744173-8e7e53415bb0?auto=format&fit=crop&q=80&w=600',
                    category: 'LINGKUNGAN',
                    title: 'Pasar Baru untuk Petani: Dari Kebun ke Toko Online Desa',
                    date: 'August 31, 2025'
                },
                {
                    image: 'https://images.unsplash.com/photo-1551288049-bebda4e38f71?auto=format&fit=crop&q=80&w=600',
                    category: 'TEKNOLOGI',
                    title: 'Digitalisasi Tingkatkan Transparansi Anggaran Desa',
                    date: 'August 31, 2025'
                },
                {
                    image: 'https://images.unsplash.com/photo-1511497584788-876760111969?auto=format&fit=crop&q=80&w=600',
                    category: 'LINGKUNGAN',
                    title: '5 Langkah Mudah Menuju Desa Digital',
                    date: 'August 30, 2025'
                }
            ];

            // 2. Render All Posts
            const postsContainer = document.getElementById('posts-container');
            if (postsContainer) {
                postsContainer.innerHTML = postsData.map(post => `
                    <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden hover:shadow-md transition-shadow group">
                        <div class="relative h-48 overflow-hidden">
                            <img src="${post.image}" alt="${post.title}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                            <span class="absolute top-3 right-3 bg-teal-600 text-white text-[10px] font-bold uppercase px-2 py-1 rounded-full tracking-wider">
                                ${post.category}
                            </span>
                        </div>
                        <div class="p-5">
                            <h3 class="text-gray-800 font-medium text-base line-clamp-2 mb-3 min-h-[3rem]">
                                ${post.title}
                            </h3>
                            <a href="#" class="inline-block text-red-500 text-[10px] font-bold uppercase tracking-wider hover:text-red-700">
                                Read More &rarr;
                            </a>
                            <p class="mt-4 text-[10px] text-gray-400 border-t border-gray-100 pt-3">
                                ${post.date}
                            </p>
                        </div>
                    </div>
                `).join('');
            }

            // 3. Render Social Media Posts (Placeholder)
            const socialContainer = document.getElementById('social-container');
            if (socialContainer) {
                let socialHTML = '';
                // Loop sebanyak 5 kali untuk membuat kotak placeholder
                for (let i = 0; i < 5; i++) {
                    socialHTML += `
                        <div class="aspect-square bg-[#f3f4f6] rounded-lg flex items-center justify-center hover:bg-gray-200 transition-colors">
                            <svg class="w-10 h-10 text-gray-300" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm12 12H4l4-8 3 6 2-4 3 6z" clip-rule="evenodd" />
                            </svg>
                        </div>
                    `;
                }
                socialContainer.innerHTML = socialHTML;
            }

        });
    </script>
 </div>
</body>
</html>