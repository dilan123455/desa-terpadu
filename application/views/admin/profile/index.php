<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= base_url('assets/css/output.css'); ?>">
    <title><?= html_escape($title); ?> - Desa Terpadu</title>
</head>

<body class="bg-gray-100 text-gray-800 min-h-screen">

    <?php $this->load->view('admin/sidebar'); ?>

    <div class="ml-0 lg:ml-64">

        <!-- TOPBAR -->
        <header class="fixed top-0 right-0 left-0 lg:left-64 h-20 bg-white border-b border-gray-200 flex items-center justify-between px-6 sm:px-10 z-40">
            <div>
                <h1 class="text-xl font-bold">Profil</h1>
                <p class="text-sm text-gray-400 mt-0.5">Kelola profil dan logo website</p>
            </div>

            <div class="flex items-center gap-3">
                <div class="text-right hidden sm:block">
                    <p class="text-sm font-semibold"><?= html_escape($name); ?></p>
                    <p class="text-xs text-gray-400">Administrator</p>
                </div>
                <div class="w-10 h-10 rounded-full bg-red-500 flex items-center justify-center text-white font-bold select-none">
                    <?= strtoupper(substr(html_escape($name), 0, 1)); ?>
                </div>
            </div>
        </header>

        <!-- CONTENT -->
        <main class="p-6 sm:p-10 pt-24 sm:pt-28">
            <!-- UBAH DI SINI: Menggunakan max-w-full agar kontainer melebar penuh -->
            <div class="max-w-full space-y-6">

                <!-- PAGE HEADER -->
                <div>
                    <h2 class="text-2xl font-bold text-gray-800">Profil</h2>
                    <p class="text-sm text-gray-500 mt-1">Informasi administrator dan pengaturan logo website.</p>
                </div>

                <!-- ALERT SUCCESS -->
                <?php if ($this->session->flashdata('success')): ?>
                    <div class="px-4 py-3 bg-green-50 border border-green-200 text-green-700 rounded-lg text-sm flex items-center gap-2">
                        <svg class="w-5 h-5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                        </svg>
                        <span><?= html_escape($this->session->flashdata('success')); ?></span>
                    </div>
                <?php endif; ?>

                <!-- ALERT ERROR -->
                <?php if ($this->session->flashdata('error')): ?>
                    <div class="px-4 py-3 bg-red-50 border border-red-200 text-red-600 rounded-lg text-sm flex items-center gap-2">
                        <svg class="w-5 h-5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
                        </svg>
                        <span><?= html_escape($this->session->flashdata('error')); ?></span>
                    </div>
                <?php endif; ?>

                <!-- INFORMASI PROFIL -->
                <div class="bg-white border border-gray-200 rounded-2xl shadow-sm overflow-hidden">
                    <div class="px-6 py-4 border-b border-gray-200 bg-gray-50/50">
                        <p class="text-xs font-semibold text-red-500 uppercase tracking-wider">Profil</p>
                        <h3 class="text-lg font-bold text-gray-800 mt-0.5">Informasi Administrator</h3>
                    </div>

                    <form action="<?= site_url('admin/profile/update'); ?>" method="POST" class="p-6 space-y-5">
                        <!-- NAMA -->
                        <div>
                            <label for="name" class="block text-sm font-semibold text-gray-700 mb-2">Nama Lengkap</label>
                            <input 
                                type="text" 
                                id="name"
                                name="name" 
                                value="<?= html_escape($name); ?>" 
                                required
                                class="w-full bg-white border border-gray-300 rounded-lg px-4 py-2.5 text-sm text-gray-700 focus:outline-none focus:ring-2 focus:ring-red-200 focus:border-red-400 transition"
                            >
                        </div>

                        <!-- EMAIL -->
                        <div>
                            <label for="email" class="block text-sm font-semibold text-gray-700 mb-2">Alamat Email</label>
                            <input 
                                type="email" 
                                id="email"
                                name="email" 
                                value="<?= html_escape($email); ?>" 
                                required
                                class="w-full bg-white border border-gray-300 rounded-lg px-4 py-2.5 text-sm text-gray-700 focus:outline-none focus:ring-2 focus:ring-red-200 focus:border-red-400 transition"
                            >
                        </div>

                        <!-- BUTTON -->
                        <div class="pt-2 flex justify-start">
                            <button 
                                type="submit" 
                                class="px-5 py-2.5 bg-red-500 hover:bg-red-600 text-white rounded-lg text-sm font-semibold transition duration-150 shadow-sm"
                            >
                                Simpan Perubahan
                            </button>
                        </div>
                    </form>
                </div>

                <!-- LOGO WEBSITE -->
                <div class="bg-white border border-gray-200 rounded-2xl shadow-sm overflow-hidden">
                    <div class="px-6 py-4 border-b border-gray-200 bg-gray-50/50">
                        <p class="text-xs font-semibold text-red-500 uppercase tracking-wider">Logo Website</p>
                        <h3 class="text-lg font-bold text-gray-800 mt-0.5">Update Logo</h3>
                    </div>

                    <form action="<?= site_url('admin/profile/update-logo'); ?>" method="POST" enctype="multipart/form-data" class="p-6 space-y-6">
                        <!-- CURRENT LOGO -->
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-3">Logo Saat Ini</label>
                            <div class="w-full min-h-[160px] bg-gray-50 border border-gray-200 rounded-xl flex items-center justify-center p-6">
                                <?php if (!empty($logo)): ?>
                                    <img id="logo-preview" src="<?= $logo; ?>" alt="Logo Desa Terpadu" class="max-h-32 max-w-xs object-contain">
                                <?php else: ?>
                                    <div id="logo-empty" class="text-center text-gray-400">
                                        <svg class="w-12 h-12 mx-auto mb-2 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4-4 3 3 4-5 5 6M5 20h14a1 1 0 001-1V5a1 1 0 00-1-1H5a1 1 0 00-1 1v14a1 1 0 001 1z" />
                                        </svg>
                                        <p class="text-sm">Logo belum tersedia</p>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>

                        <!-- UPLOAD -->
                        <div>
                            <label for="logo-input" class="block text-sm font-semibold text-gray-700 mb-2">Pilih Logo Baru</label>
                            <input 
                                type="file" 
                                name="logo" 
                                id="logo-input" 
                                accept=".jpg,.jpeg,.png,.webp,image/jpeg,image/png,image/webp" 
                                class="block w-full text-sm text-gray-500 border border-gray-300 rounded-lg cursor-pointer bg-white file:mr-4 file:py-2.5 file:px-4 file:rounded-l-lg file:border-0 file:text-sm file:font-semibold file:bg-red-50 file:text-red-600 hover:file:bg-red-100 focus:outline-none transition"
                            >
                            <p class="text-xs text-gray-400 mt-2">Format JPG, JPEG, PNG, atau WEBP. Maksimal 5 MB.</p>
                        </div>

                        <!-- PREVIEW BARU -->
                        <div id="new-logo-container" class="hidden">
                            <p class="text-sm font-semibold text-gray-700 mb-3">Preview Logo Baru</p>
                            <div class="w-full bg-gray-50 border border-gray-200 rounded-xl p-6 flex items-center justify-center">
                                <img id="new-logo-preview" src="" alt="Preview Logo" class="max-h-32 max-w-xs object-contain">
                            </div>
                        </div>

                        <!-- BUTTONS -->
                        <div class="flex flex-col-reverse sm:flex-row justify-end gap-3 pt-2">
                            <a 
                                href="<?= site_url('admin/dashboard'); ?>" 
                                class="px-5 py-2.5 border border-gray-300 rounded-lg text-sm font-semibold text-gray-600 text-center hover:bg-gray-50 transition"
                            >
                                Batal
                            </a>
                            <button 
                                type="submit" 
                                class="px-5 py-2.5 bg-red-500 hover:bg-red-600 text-white rounded-lg text-sm font-semibold transition duration-150 shadow-sm"
                            >
                                Simpan Logo
                            </button>
                        </div>
                    </form>
                </div>

                <!-- FOOTER -->
                <footer class="pt-6 border-t border-gray-200 text-xs text-gray-400 text-center sm:text-left">
                    © <?= date('Y'); ?> Desa Terpadu — Admin Panel
                </footer>

            </div>
        </main>
    </div>

    <!-- JAVASCRIPT -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const input = document.getElementById('logo-input');
            const preview = document.getElementById('new-logo-preview');
            const container = document.getElementById('new-logo-container');

            if (!input || !preview || !container) return;

            input.addEventListener('change', function () {
                const file = this.files[0];

                if (!file) {
                    container.classList.add('hidden');
                    preview.src = '';
                    return;
                }

                if (file.size > 5 * 5024 * 5024) {
                    alert('Ukuran logo maksimal 5 MB.');
                    this.value = '';
                    container.classList.add('hidden');
                    return;
                }

                const reader = new FileReader();
                reader.onload = function (event) {
                    preview.src = event.target.result;
                    container.classList.remove('hidden');
                };
                reader.readAsDataURL(file);
            });
        });
    </script>
</body>
</html>