<!-- SOCIAL MEDIA POSTS SECTION -->
<section id="social-media-posts-section" class="w-full bg-white pt-6 pb-24 sm:pt-8 sm:pb-32">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Header -->
        <div class="text-center mb-10 sm:mb-12">
            <h2 class="text-3xl sm:text-4xl font-bold text-gray-900 tracking-tight">Social Media Posts</h2>
            <p class="mt-4 text-base sm:text-lg text-gray-600 max-w-2xl mx-auto leading-relaxed">
                Kunjungi Sosial Media Kami dan Temukan Hal Menarik Tentang Perubahan Digital<br class="hidden sm:block" /> Lainnya
            </p>
        </div>

        <!-- Grid Layout -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            
            <!-- ITEM 1 -->
            <div class="bg-gray-100 rounded-lg overflow-hidden shadow-sm border border-gray-200 relative">
                <a href="https://www.instagram.com/p/DOXpxFIlEK1/" target="_blank" rel="noopener noreferrer" class="block w-full h-full">
                 <img 
    src="<?= base_url('assets/uploads/social_media/sm_1.jpg'); ?>" 
    alt="Instagram Post 1" 
    class="w-full h-full object-cover" 
    loading="lazy"
/>
                </a>
            </div>

            <!-- ITEM 2 -->
            <div class="bg-gray-100 rounded-lg overflow-hidden shadow-sm border border-gray-200 relative">
                <a href="https://www.instagram.com/p/DOX1nX_ADOt/" target="_blank" rel="noopener noreferrer" class="block w-full h-full">
                    <img src="<?= base_url('assets/uploads/social_media/sm_2.jpg'); ?>" alt="Instagram Post 2" class="w-full h-full object-cover" loading="lazy" />
                </a>
            </div>

            <!-- ITEM 3 -->
            <div class="bg-gray-100 rounded-lg overflow-hidden shadow-sm border border-gray-200 relative">
                <a href="https://www.instagram.com/p/DOcceoogeBO/" target="_blank" rel="noopener noreferrer" class="block w-full h-full">
                    <img src="<?= base_url('assets/uploads/social_media/sm_3.jpg'); ?>" alt="Instagram Post 3" class="w-full h-full object-cover" loading="lazy" />
                </a>
            </div>

            <!-- ITEM 4 -->
            <div class="bg-gray-100 rounded-lg overflow-hidden shadow-sm border border-gray-200 relative">
                <a href="https://www.instagram.com/p/DOXp5sHFRcU/" target="_blank" rel="noopener noreferrer" class="block w-full h-full">
                    <img src="<?= base_url('assets/uploads/social_media/sm_4.jpg'); ?>" alt="Instagram Post 4" class="w-full h-full object-cover" loading="lazy" />
                </a>
            </div>

        </div>

    </div>
</section>

<!-- CSS khusus untuk social media section saja -->
<style>
    #social-media-posts-section .grid > div {
        aspect-ratio: 4 / 5; /* rasio tinggi/lebar untuk card */
    }
    #social-media-posts-section .grid img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }
</style>