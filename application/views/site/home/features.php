<style>
    .wave-top {
        transform: scaleY(-1);
    }

    .tab-button {
        position: relative;
        color: #ffffff;
        padding: 12px 20px;
        font-size: 1.5rem;
        font-weight: 700;
        transition: color 0.3s ease, transform 0.3s ease;
        cursor: pointer;
    }

    .tab-button::after {
        content: "";
        position: absolute;
        left: 0;
        bottom: 0;
        width: 100%;
        height: 4px;
        background: transparent;
        transform: scaleX(0);
        transform-origin: center;
        transition: transform 0.3s ease, background 0.3s ease;
    }

    .tab-button:hover {
        color: #ffe0a3;
    }

    .tab-button.active {
        color: #ffe0a3;
    }

    .tab-button.active::after {
        background: #ffe0a3;
        transform: scaleX(1);
    }

    .tab-content {
        animation: fadeIn 0.45s ease;
    }

    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(15px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .feature-image {
        transition: transform 0.4s ease;
    }

    .feature-image:hover {
        transform: translateY(-5px);
    }

    .mobile-icon {
        transition: transform 0.3s ease;
    }

    .tab-button.active .mobile-icon {
        transform: rotate(45deg);
    }
</style>

<section id="features" class="relative bg-[#cc4b4d] min-h-[1000px] md:min-h-[1300px] lg:min-h-[1500px] overflow-hidden pt-20 pb-48 md:pb-64 scroll-mt-20">

    <!-- Wave Atas -->
    <svg class="absolute top-0 left-0 w-full h-40 md:h-64 pointer-events-none block wave-top"
         style="margin-top: -2px;"
         viewBox="0 0 1440 320"
         preserveAspectRatio="none"
         xmlns="http://www.w3.org/2000/svg">
        <path fill="#ffffff" d="M0,180 C180,340 360,60 540,140 C720,220 900,20 1080,120 C1200,180 1320,200 1440,180 L1440,320 L0,320 Z"/>
    </svg>

    <div class="relative z-10 max-w-7xl mx-auto px-6">

        <!-- Judul -->
        <div class="text-center pt-24 md:pt-32 lg:pt-36">
            <p class="text-[#ffe0a3] text-xl md:text-2xl lg:text-3xl font-semibold">Fitur Unggulan Desa Terpadu</p>
            <h1 class="mt-3 text-white text-4xl md:text-5xl lg:text-6xl xl:text-7xl font-bold leading-tight">Tiga Platform Dalam Satu Ekosistem</h1>
        </div>

        <!-- Konten Tab dengan Flex Order -->
        <div class="mt-14 md:mt-16 flex flex-col md:flex-row md:flex-wrap justify-center items-center gap-4 md:gap-8 w-full">

            <!-- Tombol Web App -->
            <button type="button" class="tab-button active w-full md:w-auto text-left md:text-center order-1 md:order-1 flex justify-between md:justify-center items-center border-b md:border-b-0 border-white/10 pb-4 md:pb-0" data-tab="web">
                Web App <span class="mobile-icon md:hidden text-2xl font-light">+</span>
            </button>

            <!-- Konten Web App -->
            <div id="web" class="tab-content w-full order-2 md:order-4">
                <p class="max-w-6xl mx-auto text-center text-white text-lg md:text-xl lg:text-2xl leading-relaxed">
                    Pusat kendali utama bagi perangkat desa untuk mengelola seluruh sistem Desa Terpadu. Melalui platform ini, perangkat desa dapat mengatur data kependudukan, layanan publik, keuangan, hingga komunikasi internal secara terintegrasi. Dirancang untuk efisiensi kerja, keamanan data, dan transparansi pelayanan.
                </p>

                <div class="mt-10 md:mt-14 flex justify-center">
                    <img src="https://desaterpadu.id/wp-content/uploads/2025/08/core-mockup.png" alt="Dashboard Web App Desa Terpadu" class="feature-image w-full max-w-xs sm:max-w-sm md:max-w-md lg:max-w-lg rounded-2xl">
                </div>

                <!-- Grid Fitur Web App -->
                <div class="mt-10 md:mt-14 max-w-6xl mx-auto grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-x-8 gap-y-8 md:gap-y-10">
                    <div class="flex flex-row items-start gap-3 text-left">
                        <div class="bg-white rounded-2xl p-2 w-12 h-12 md:w-14 md:h-14 flex-shrink-0 flex items-center justify-center shadow-sm">
                            <img src="https://desaterpadu.id/wp-content/uploads/2025/08/icon1web_.svg" class="w-full h-full object-contain" alt="Data Warga">
                        </div>
                        <div class="flex flex-col">
                            <h4 class="text-white font-bold text-base md:text-lg leading-tight">Data Warga</h4>
                            <p class="text-white/90 text-sm leading-snug mt-1">Kelola data warga cepat dan terpusat</p>
                        </div>
                    </div>
                    <div class="flex flex-row items-start gap-3 text-left">
                        <div class="bg-white rounded-2xl p-2 w-12 h-12 md:w-14 md:h-14 flex-shrink-0 flex items-center justify-center shadow-sm">
                            <img src="https://desaterpadu.id/wp-content/uploads/2025/08/icon2web_.svg" class="w-full h-full object-contain" alt="Layanan Digital">
                        </div>
                        <div class="flex flex-col">
                            <h4 class="text-white font-bold text-base md:text-lg leading-tight">Layanan Digital</h4>
                            <p class="text-white/90 text-sm leading-snug mt-1">Proses surat dan dokumen tanpa kertas</p>
                        </div>
                    </div>
                    <div class="flex flex-row items-start gap-3 text-left">
                        <div class="bg-white rounded-2xl p-2 w-12 h-12 md:w-14 md:h-14 flex-shrink-0 flex items-center justify-center shadow-sm">
                            <img src="https://desaterpadu.id/wp-content/uploads/2025/08/icon3web_.svg" class="w-full h-full object-contain" alt="Pendataan Bansos">
                        </div>
                        <div class="flex flex-col">
                            <h4 class="text-white font-bold text-base md:text-lg leading-tight">Pendataan Bansos</h4>
                            <p class="text-white/90 text-sm leading-snug mt-1">Kelola data warga cepat dan terpusat</p>
                        </div>
                    </div>
                    <div class="flex flex-row items-start gap-3 text-left">
                        <div class="bg-white rounded-2xl p-2 w-12 h-12 md:w-14 md:h-14 flex-shrink-0 flex items-center justify-center shadow-sm">
                            <img src="https://desaterpadu.id/wp-content/uploads/2025/08/icon4web_.svg" class="w-full h-full object-contain" alt="Peta Potensi Desa">
                        </div>
                        <div class="flex flex-col">
                            <h4 class="text-white font-bold text-base md:text-lg leading-tight">Peta Potensi Desa</h4>
                            <p class="text-white/90 text-sm leading-snug mt-1">Lihat potensi desa dalam peta interaktif</p>
                        </div>
                    </div>
                    <div class="flex flex-row items-start gap-3 text-left">
                        <div class="bg-white rounded-2xl p-2 w-12 h-12 md:w-14 md:h-14 flex-shrink-0 flex items-center justify-center shadow-sm">
                            <svg class="w-full h-full p-1" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M12 2C6.48 2 2 6.48 2 12C2 17.52 6.48 22 12 22C17.52 22 22 17.52 22 12C22 6.48 17.52 2 12 2ZM12 4C16.41 4 20 7.59 20 12C20 16.41 16.41 20 12 20C7.59 20 4 16.41 4 12C4 7.59 7.59 4 12 4Z" fill="#cc4b4d"/>
                                <path d="M12 6V8H10V10H14V14H10V16H12V18H14V16H16V14H12V10H16V8H14V6H12Z" fill="#cc4b4d"/>
                            </svg>
                        </div>
                        <div class="flex flex-col">
                            <h4 class="text-white font-bold text-base md:text-lg leading-tight">Keuangan & Aset</h4>
                            <p class="text-white/90 text-sm leading-snug mt-1">Pantau anggaran dan aset dengan mudah</p>
                        </div>
                    </div>
                    <div class="flex flex-row items-start gap-3 text-left">
                        <div class="bg-white rounded-2xl p-2 w-12 h-12 md:w-14 md:h-14 flex-shrink-0 flex items-center justify-center shadow-sm">
                            <svg class="w-full h-full p-1" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M19 3H5C3.89 3 3 3.89 3 5V19C3 20.11 3.89 21 5 21H19C20.11 21 21 20.11 21 19V5C21 3.89 20.11 3 19 3ZM10 17L6 13L7.41 11.59L10 14.17L16.59 7.58L18 9L10 17Z" fill="#cc4b4d"/>
                            </svg>
                        </div>
                        <div class="flex flex-col">
                            <h4 class="text-white font-bold text-base md:text-lg leading-tight">Tanda Tangan Elektronik</h4>
                            <p class="text-white/90 text-sm leading-snug mt-1">Tanda tangan elektronik, cepat dan aman</p>
                        </div>
                    </div>
                    <div class="flex flex-row items-start gap-3 text-left">
                        <div class="bg-white rounded-2xl p-2 w-12 h-12 md:w-14 md:h-14 flex-shrink-0 flex items-center justify-center shadow-sm">
                            <svg class="w-full h-full p-1" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M20 2H4C2.9 2 2 2.9 2 4V22L6 18H20C21.1 18 22 17.1 22 16V4C22 2.9 21.1 2 20 2ZM13 13H11V11H13V13ZM13 9H11V5H13V9Z" fill="#cc4b4d"/>
                            </svg>
                        </div>
                        <div class="flex flex-col">
                            <h4 class="text-white font-bold text-base md:text-lg leading-tight">Pengaduan Warga</h4>
                            <p class="text-white/90 text-sm leading-snug mt-1">Pantau & respon keluhan warga secara online.</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Tombol Anjungan Mandiri -->
            <button type="button" class="tab-button w-full md:w-auto text-left md:text-center order-3 md:order-2 flex justify-between md:justify-center items-center border-b md:border-b-0 border-white/10 pb-4 md:pb-0" data-tab="anjungan">
                Anjungan Mandiri <span class="mobile-icon md:hidden text-2xl font-light">+</span>
            </button>

            <!-- Konten Anjungan Mandiri -->
            <div id="anjungan" class="tab-content w-full order-4 md:order-4 hidden">
                <p class="max-w-6xl mx-auto text-center text-white text-lg md:text-xl lg:text-2xl leading-relaxed">
                    Anjungan Mandiri memberikan kemudahan bagi masyarakat untuk mengakses berbagai layanan Desa Terpadu secara mandiri, cepat, mudah, dan efisien.
                </p>

                <div class="mt-10 md:mt-14 flex justify-center">
                    <img src="https://desaterpadu.id/wp-content/uploads/2025/08/tablet-mockup.png" alt="Anjungan Mandiri Desa Terpadu" class="feature-image w-full max-w-xs sm:max-w-sm md:max-w-md lg:max-w-lg rounded-2xl">
                </div>

                <div class="mt-10 md:mt-14 max-w-6xl mx-auto grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-x-8 gap-y-8 md:gap-y-10">
                    <div class="flex flex-row items-start gap-3 text-left">
                        <div class="bg-white rounded-2xl p-2 w-12 h-12 md:w-14 md:h-14 flex-shrink-0 flex items-center justify-center shadow-sm">
                            <img src="https://desaterpadu.id/wp-content/uploads/2025/08/icon1_anjungan.svg" class="w-full h-full object-contain" alt="Login Cepat">
                        </div>
                        <div class="flex flex-col">
                            <h4 class="text-white font-bold text-base md:text-lg leading-tight">Login Cepat</h4>
                            <p class="text-white/90 text-sm leading-snug mt-1">Akses layanan hanya dengan NIK atau KK.</p>
                        </div>
                    </div>
                    <div class="flex flex-row items-start gap-3 text-left">
                        <div class="bg-white rounded-2xl p-2 w-12 h-12 md:w-14 md:h-14 flex-shrink-0 flex items-center justify-center shadow-sm">
                            <img src="https://desaterpadu.id/wp-content/uploads/2025/08/icon2_anjungan.svg" class="w-full h-full object-contain" alt="Surat Mandiri">
                        </div>
                        <div class="flex flex-col">
                            <h4 class="text-white font-bold text-base md:text-lg leading-tight">Surat Mandiri</h4>
                            <p class="text-white/90 text-sm leading-snug mt-1">Pengajuan langsung dari layar sentuh.</p>
                        </div>
                    </div>
                    <div class="flex flex-row items-start gap-3 text-left">
                        <div class="bg-white rounded-2xl p-2 w-12 h-12 md:w-14 md:h-14 flex-shrink-0 flex items-center justify-center shadow-sm">
                            <img src="https://desaterpadu.id/wp-content/uploads/2025/08/icon3_anjungan.svg" class="w-full h-full object-contain" alt="Cek Status Surat">
                        </div>
                        <div class="flex flex-col">
                            <h4 class="text-white font-bold text-base md:text-lg leading-tight">Cek Status Surat</h4>
                            <p class="text-white/90 text-sm leading-snug mt-1">Lihat progres dan kesiapan dokumen.</p>
                        </div>
                    </div>
                    <div class="flex flex-row items-start gap-3 text-left">
                        <div class="bg-white rounded-2xl p-2 w-12 h-12 md:w-14 md:h-14 flex-shrink-0 flex items-center justify-center shadow-sm">
                            <img src="https://desaterpadu.id/wp-content/uploads/2025/08/icon4_anjungan.svg" class="w-full h-full object-contain" alt="Cetak Mandiri">
                        </div>
                        <div class="flex flex-col">
                            <h4 class="text-white font-bold text-base md:text-lg leading-tight">Cetak Mandiri</h4>
                            <p class="text-white/90 text-sm leading-snug mt-1">Ambil dokumen tanpa antre di loket.</p>
                        </div>
                    </div>
                    <div class="flex flex-row items-start gap-3 text-left">
                        <div class="bg-white rounded-2xl p-2 w-12 h-12 md:w-14 md:h-14 flex-shrink-0 flex items-center justify-center shadow-sm">
                            <img src="https://desaterpadu.id/wp-content/uploads/2025/08/icon5_anjungan.svg" class="w-full h-full object-contain" alt="Pengaduan Langsung">
                        </div>
                        <div class="flex flex-col">
                            <h4 class="text-white font-bold text-base md:text-lg leading-tight">Pengaduan Langsung</h4>
                            <p class="text-white/90 text-sm leading-snug mt-1">Sampaikan laporan langsung ke admin.</p>
                        </div>
                    </div>
                    <div class="flex flex-row items-start gap-3 text-left">
                        <div class="bg-white rounded-2xl p-2 w-12 h-12 md:w-14 md:h-14 flex-shrink-0 flex items-center justify-center shadow-sm">
                            <svg class="w-full h-full p-1" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M12 12C14.21 12 16 10.21 16 8C16 5.79 14.21 4 12 4C9.79 4 8 5.79 8 8C8 10.21 9.79 12 12 12Z" stroke="#cc4b4d" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M5 20V19C5 15.6863 7.68629 13 11 13H13C16.3137 13 19 15.6863 19 19V20" stroke="#cc4b4d" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M17 6H19" stroke="#cc4b4d" stroke-width="2" stroke-linecap="round"/>
                                <path d="M17 8H19" stroke="#cc4b4d" stroke-width="2" stroke-linecap="round"/>
                                <path d="M17 10L19 10" stroke="#cc4b4d" stroke-width="2" stroke-linecap="round"/>
                            </svg>
                        </div>
                        <div class="flex flex-col">
                            <h4 class="text-white font-bold text-base md:text-lg leading-tight">Scan Tamu</h4>
                            <p class="text-white/90 text-sm leading-snug mt-1">Catat kunjungan dengan cepat lewat QR Code.</p>
                        </div>
                    </div>
                    <div class="flex flex-row items-start gap-3 text-left">
                        <div class="bg-white rounded-2xl p-2 w-12 h-12 md:w-14 md:h-14 flex-shrink-0 flex items-center justify-center shadow-sm">
                            <img src="https://desaterpadu.id/wp-content/uploads/2025/08/icon7_anjungan.svg" class="w-full h-full object-contain" alt="Tampilan yang Ramah">
                        </div>
                        <div class="flex flex-col">
                            <h4 class="text-white font-bold text-base md:text-lg leading-tight">Tampilan yang Ramah</h4>
                            <p class="text-white/90 text-sm leading-snug mt-1">Mudah digunakan semua kalangan.</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Tombol Mobile App -->
            <button type="button" class="tab-button w-full md:w-auto text-left md:text-center order-5 md:order-3 flex justify-between md:justify-center items-center border-b md:border-b-0 border-white/10 pb-4 md:pb-0" data-tab="mobile">
                Mobile App <span class="mobile-icon md:hidden text-2xl font-light">+</span>
            </button>

            <!-- Konten Mobile App -->
            <div id="mobile" class="tab-content w-full order-6 md:order-4 hidden">
                <p class="max-w-6xl mx-auto text-center text-white text-lg md:text-xl lg:text-2xl leading-relaxed">
                    Mobile App Desa Terpadu memudahkan masyarakat dan perangkat desa untuk mengakses berbagai informasi dan layanan desa melalui perangkat mobile kapan saja dan di mana saja.
                </p>

                <div class="mt-10 md:mt-14 flex justify-center">
                    <img src="https://desaterpadu.id/wp-content/uploads/2025/08/mobile-mockup.png" alt="Mobile App Desa Terpadu" class="feature-image w-full max-w-[140px] sm:max-w-[160px] md:max-w-[180px] lg:max-w-[200px] rounded-3xl shadow-xl">
                </div>

                <div class="mt-10 md:mt-14 max-w-6xl mx-auto grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-x-8 gap-y-8 md:gap-y-10">
                    <div class="flex flex-row items-start gap-3 text-left">
                        <div class="bg-white rounded-2xl p-2 w-12 h-12 md:w-14 md:h-14 flex-shrink-0 flex items-center justify-center shadow-sm">
                            <img src="https://desaterpadu.id/wp-content/uploads/2025/08/icon1_mobile.svg" class="w-full h-full object-contain" alt="Pendataan Langsung">
                        </div>
                        <div class="flex flex-col">
                            <h4 class="text-white font-bold text-base md:text-lg leading-tight">Pendataan Langsung</h4>
                            <p class="text-white/90 text-sm leading-snug mt-1">Input data di lokasi tanpa pulang ke kantor.</p>
                        </div>
                    </div>
                    <div class="flex flex-row items-start gap-3 text-left">
                        <div class="bg-white rounded-2xl p-2 w-12 h-12 md:w-14 md:h-14 flex-shrink-0 flex items-center justify-center shadow-sm">
                            <img src="https://desaterpadu.id/wp-content/uploads/2025/08/icon2_mobile.svg" class="w-full h-full object-contain" alt="Surat Mandiri">
                        </div>
                        <div class="flex flex-col">
                            <h4 class="text-white font-bold text-base md:text-lg leading-tight">Surat Mandiri</h4>
                            <p class="text-white/90 text-sm leading-snug mt-1">Buat surat langsung dari HP atau tablet.</p>
                        </div>
                    </div>
                    <div class="flex flex-row items-start gap-3 text-left">
                        <div class="bg-white rounded-2xl p-2 w-12 h-12 md:w-14 md:h-14 flex-shrink-0 flex items-center justify-center shadow-sm">
                            <img src="https://desaterpadu.id/wp-content/uploads/2025/08/icon3_mobile.svg" class="w-full h-full object-contain" alt="Absensi Pegawai">
                        </div>
                        <div class="flex flex-col">
                            <h4 class="text-white font-bold text-base md:text-lg leading-tight">Absensi Pegawai</h4>
                            <p class="text-white/90 text-sm leading-snug mt-1">Absen dengan face scan atau QR Code.</p>
                        </div>
                    </div>
                    <div class="flex flex-row items-start gap-3 text-left">
                        <div class="bg-white rounded-2xl p-2 w-12 h-12 md:w-14 md:h-14 flex-shrink-0 flex items-center justify-center shadow-sm">
                            <img src="https://desaterpadu.id/wp-content/uploads/2025/08/icon4_mobile.svg" class="w-full h-full object-contain" alt="Notifikasi Tugas">
                        </div>
                        <div class="flex flex-col">
                            <h4 class="text-white font-bold text-base md:text-lg leading-tight">Notifikasi Tugas</h4>
                            <p class="text-white/90 text-sm leading-snug mt-1">Pengingat dan update kerja staf desa.</p>
                        </div>
                    </div>
                    <div class="flex flex-row items-start gap-3 text-left">
                        <div class="bg-white rounded-2xl p-2 w-12 h-12 md:w-14 md:h-14 flex-shrink-0 flex items-center justify-center shadow-sm">
                            <img src="https://desaterpadu.id/wp-content/uploads/2025/08/icon5_mobile.svg" class="w-full h-full object-contain" alt="Akses Data Warga">
                        </div>
                        <div class="flex flex-col">
                            <h4 class="text-white font-bold text-base md:text-lg leading-tight">Akses Data Warga</h4>
                            <p class="text-white/90 text-sm leading-snug mt-1">Lihat profil dan riwayat layanan warga.</p>
                        </div>
                    </div>
                    <div class="flex flex-row items-start gap-3 text-left">
                        <div class="bg-white rounded-2xl p-2 w-12 h-12 md:w-14 md:h-14 flex-shrink-0 flex items-center justify-center shadow-sm">
                            <img src="https://desaterpadu.id/wp-content/uploads/2025/08/icon6_mobile.svg" class="w-full h-full object-contain" alt="Pembayaran PBB">
                        </div>
                        <div class="flex flex-col">
                            <h4 class="text-white font-bold text-base md:text-lg leading-tight">Pembayaran</h4>
                            <p class="text-white/90 text-sm leading-snug mt-1">Bayar PBB atau retribusi dari smartphone.</p>
                        </div>
                    </div>
                    <div class="flex flex-row items-start gap-3 text-left">
                        <div class="bg-white rounded-2xl p-2 w-12 h-12 md:w-14 md:h-14 flex-shrink-0 flex items-center justify-center shadow-sm">
                            <img src="https://desaterpadu.id/wp-content/uploads/2025/08/icon7_mobile.svg" class="w-full h-full object-contain" alt="Pengaduan Online">
                        </div>
                        <div class="flex flex-col">
                            <h4 class="text-white font-bold text-base md:text-lg leading-tight">Pengaduan Online</h4>
                            <p class="text-white/90 text-sm leading-snug mt-1">Laporkan masalah dan pantau statusnya.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Wave Bawah -->
    <svg class="absolute bottom-0 left-0 w-full h-60 md:h-80 pointer-events-none block"
         style="margin-bottom: -2px;"
         viewBox="0 0 1440 320"
         preserveAspectRatio="none"
         xmlns="http://www.w3.org/2000/svg">
        <path fill="#ffffff" d="M0,180 C180,340 360,60 540,140 C720,220 900,20 1080,120 C1200,180 1320,200 1440,180 L1440,320 L0,320 Z"/>
    </svg>

</section>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const buttons = document.querySelectorAll(".tab-button");
        const contents = document.querySelectorAll(".tab-content");

        buttons.forEach(function (button) {
            button.addEventListener("click", function () {
                const target = this.getAttribute("data-tab");

                buttons.forEach(btn => btn.classList.remove("active"));
                contents.forEach(content => content.classList.add("hidden"));

                this.classList.add("active");

                const selectedContent = document.getElementById(target);
                if (selectedContent) {
                    selectedContent.classList.remove("hidden");
                }
            });
        });
    });
</script>