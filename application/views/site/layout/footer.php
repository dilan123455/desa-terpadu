<style>
    .bg-footer { background-color: #883a3a; }
</style>

<section class="bg-footer text-white pt-12 pb-6 px-4 md:px-8 w-full">
    <div class="max-w-7xl mx-auto">
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-10 md:gap-12">
            <!-- Kolom 1: Brand -->
            <div class="flex flex-col items-start md:items-start">
                <div class="flex items-center gap-4 mb-4">
                    <a href="<?= base_url('home'); ?>" class="shrink-0">
                        <img src="<?= base_url('assets/logo2.png'); ?>" alt="Desa Terpadu" class="h-12 w-auto">
                    </a>
                </div>
                <div class="flex gap-3 mt-2">
                    <!-- Instagram -->
                    <a href="https://www.instagram.com/desaterpadu/" target="_blank" class="w-10 h-10 rounded-full bg-white flex items-center justify-center hover:bg-gray-100 transition">
                        <svg class="w-5 h-5 text-[#883a3a]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><rect x="2" y="2" width="20" height="20" rx="5" ry="5" stroke-width="2"></rect><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z" stroke-width="2"></path><line x1="17.5" y1="6.5" x2="17.51" y2="6.5" stroke-width="2"></line></svg>
                    </a>
                    <!-- Facebook -->
                    <a href="https://www.facebook.com/people/Desa-Terpadu/61579853082004/" target="_blank" class="w-10 h-10 rounded-full bg-white flex items-center justify-center hover:bg-gray-100 transition">
                        <svg class="w-5 h-5 text-[#883a3a]" fill="currentColor" viewBox="0 0 24 24"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
                    </a>
                    <!-- WhatsApp -->
                    <a href="https://api.whatsapp.com/send/?phone=6285172238883" target="_blank" class="w-10 h-10 rounded-full bg-white flex items-center justify-center hover:bg-gray-100 transition">
                        <svg class="w-5 h-5 text-[#883a3a]" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
                    </a>
                </div>
            </div>

            <!-- Kolom 2: Links -->
            <div>
                <h3 class="text-lg font-bold mb-4">Link</h3>
                <div class="grid grid-cols-3 gap-x-4 gap-y-3 text-sm md:text-base">
                    <a href="<?= base_url('home#hero'); ?>" class="hover:text-gray-200 transition">Home</a>
                    <a href="<?= base_url('home#about'); ?>" class="hover:text-gray-200 transition">About</a>
                    <a href="<?= base_url('home#features'); ?>" class="hover:text-gray-200 transition">Features</a>
                    <a href="<?= base_url('home#contact'); ?>" class="hover:text-gray-200 transition">Contact</a>
                    <a href="<?= base_url('blog'); ?>" class="hover:text-gray-200 transition">Blog</a>
                    <a href="<?= base_url('faq'); ?>" class="hover:text-gray-200 transition">FAQ</a>
                </div>
            </div>

            <!-- Kolom 3: Contact -->
            <div>
                <h3 class="text-lg font-bold mb-4">Hubungi Kami</h3>
                <div class="flex flex-col gap-3 text-sm md:text-base">
                    <div class="flex items-center gap-3">
                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg>
                        <span>0851 7223 8883</span>
                    </div>
                    <div class="flex items-center gap-3">
                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                        <span>info@desaterpadu.id</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Divider -->
        <div class="border-t border-white/40 mt-8 mb-6"></div>

        <!-- Copyright & Privacy Link (BAGIAN INI PENTING!) -->
        <div class="flex flex-col md:flex-row justify-between items-center text-xs md:text-sm font-light opacity-90 gap-4 md:gap-0">
            <div>
                &copy; 2025 DesaTerpadu. Powered By Tridatu Solution.
            </div>
            <!-- LINK PRIVACY & POLICY YANG SUDAH DIARAHKAN -->
            <div>
                <a href="<?= base_url('home/privacy_policy') ?>" class="hover:text-gray-200 transition">
                    Privacy & Policy
                </a>
            </div>
        </div>

    </div>
</section>