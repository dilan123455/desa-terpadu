<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lupa Password - Desa Terpadu</title>
    <link rel="stylesheet" href="<?= base_url('assets/css/output.css'); ?>">
</head>
<body class="min-h-screen bg-gradient-to-br from-[#cc4b4d] via-[#b83e40] to-[#8a2d2f] flex items-center justify-center p-4">

    <div class="w-full max-w-md">

        <!-- Card -->
        <div class="bg-white rounded-2xl shadow-2xl overflow-hidden">

            <!-- Header -->
            <div class="bg-[#cc4b4d] px-8 py-8 text-center">
                <div class="inline-flex items-center justify-center w-16 h-16 bg-white/20 rounded-full mb-4 backdrop-blur-sm">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M15 7a2 2 0 012 2m4 0a6 6 0 01-12 0V7a6 6 0 0112 0zM6 21h12a2 2 0 002-2v-3a2 2 0 00-2-2H4a2 2 0 00-2 2v3a2 2 0 002 2z" />
                    </svg>
                </div>
                <h1 class="text-2xl font-bold text-white">Desa Terpadu</h1>
                <p class="text-white/80 text-sm mt-1">Panel Administrasi</p>
            </div>

            <!-- Body -->
            <div class="px-8 py-8">

                <h2 class="text-2xl font-bold text-gray-800 mb-1">Lupa Password?</h2>
                <p class="text-gray-500 text-sm mb-6">Masukkan email yang terdaftar untuk mendapatkan link reset password.</p>

                <!-- Error -->
                <?php if ($this->session->flashdata('error')): ?>
                    <div class="flex items-start gap-3 bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-lg mb-5">
                        <svg class="w-5 h-5 mt-0.5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 9v2m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <p class="text-sm"><?= html_escape($this->session->flashdata('error')); ?></p>
                    </div>
                <?php endif; ?>

                <!-- Success -->
                <?php if ($this->session->flashdata('success')): ?>
                    <div class="flex items-start gap-3 bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded-lg mb-5">
                        <svg class="w-5 h-5 mt-0.5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M5 13l4 4L19 7" />
                        </svg>
                        <p class="text-sm"><?= html_escape($this->session->flashdata('success')); ?></p>
                    </div>
                <?php endif; ?>

                <!-- Form -->
                <form action="<?= site_url('auth/send_reset_link'); ?>" method="post">

                    <!-- Email -->
                    <div>
                        <label for="email" class="block text-sm font-semibold text-gray-700 mb-2">Email</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none text-gray-400">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                </svg>
                            </div>
                            <input
                                type="email"
                                id="email"
                                name="email"
                                required
                                autocomplete="email"
                                placeholder="Masukkan email Anda"
                                class="w-full pl-10 pr-4 py-3 bg-gray-50 border border-gray-200 rounded-lg text-gray-800 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-[#cc4b4d] focus:border-transparent transition"
                            >
                        </div>
                    </div>

                    <!-- Button -->
                    <button
                        type="submit"
                        class="w-full mt-6 bg-[#cc4b4d] hover:bg-[#b83e40] text-white font-semibold py-3 rounded-lg shadow-md hover:shadow-lg transform hover:-translate-y-0.5 transition-all duration-200"
                    >
                        Kirim Link Reset
                    </button>

                </form>

                <!-- Back Login -->
                <div class="text-center mt-6">
                    <a href="<?= site_url('auth/login'); ?>" class="text-sm text-[#cc4b4d] hover:underline font-medium">
                        ← Kembali ke Login
                    </a>
                </div>

            </div>

            <!-- Footer -->
            <div class="bg-gray-50 px-8 py-4 text-center border-t border-gray-100">
                <p class="text-xs text-gray-500">&copy; <?= date('Y'); ?> Desa Terpadu. All rights reserved.</p>
            </div>

        </div>

        <p class="text-center text-white/80 text-sm mt-6">Sistem Administrasi Desa Terpadu</p>

    </div>

</body>
</html>