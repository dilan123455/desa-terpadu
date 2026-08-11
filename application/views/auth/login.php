<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin - Desa Terpadu</title>
    <link rel="stylesheet" href="<?= base_url('assets/css/output.css'); ?>">
</head>
<body class="min-h-screen bg-gradient-to-br from-[#cc4b4d] via-[#b83e40] to-[#8a2d2f] flex items-center justify-center p-4">

    <div class="w-full max-w-md">

        <!-- Card -->
        <div class="bg-white rounded-2xl shadow-2xl overflow-hidden">

            <!-- Header Card -->
            <div class="bg-[#cc4b4d] px-8 py-8 text-center">
                <div class="inline-flex items-center justify-center w-16 h-16 bg-white/20 rounded-full mb-4 backdrop-blur-sm">
                    <img 
                        src="https://tailwindcss.com/plus-assets/img/logos/mark.svg?color=indigo&shade=500"
                        alt="Desa Terpadu"
                        class="h-10 w-10"
                    />
                </div>
                <h1 class="text-2xl font-bold text-white">Desa Terpadu</h1>
                <p class="text-white/80 text-sm mt-1">Panel Administrasi</p>
            </div>

            <!-- Body Card -->
            <div class="px-8 py-8">

                <h2 class="text-2xl font-bold text-gray-800 mb-1">Login Admin</h2>
                <p class="text-gray-500 text-sm mb-6">Masukkan kredensial Anda untuk melanjutkan</p>

                <!-- Flash error -->
                <?php if ($this->session->flashdata('error')): ?>
                    <div class="flex items-start gap-3 bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-lg mb-5">
                        <svg class="w-5 h-5 mt-0.5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 9v2m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        <p class="text-sm"><?= $this->session->flashdata('error'); ?></p>
                    </div>
                <?php endif; ?>

                <!-- Form -->
                <form action="<?= site_url('auth/process_login') ?>" method="post">

                    <!-- Username -->
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">
                            Username
                        </label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none text-gray-400">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                </svg>
                            </div>
                            <input
                                type="text"
                                name="username"
                                required
                                placeholder="Masukkan username"
                                class="w-full pl-10 pr-4 py-3 bg-gray-50 border border-gray-200 rounded-lg text-gray-800 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-[#cc4b4d] focus:border-transparent transition"
                            >
                        </div>
                    </div>

                    <!-- Password -->
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">
                            Password
                        </label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none text-gray-400">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                                </svg>
                            </div>
                            <input
                                type="password"
                                name="password"
                                id="password"
                                required
                                placeholder="Masukkan password"
                                class="w-full pl-10 pr-11 py-3 bg-gray-50 border border-gray-200 rounded-lg text-gray-800 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-[#cc4b4d] focus:border-transparent transition"
                            >
                            <!-- Toggle password -->
                            <button
                                type="button"
                                id="togglePassword"
                                class="absolute inset-y-0 right-0 flex items-center pr-3 text-gray-400 hover:text-gray-600">
                                <svg id="eyeIcon" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                </svg>
                            </button>
                        </div>
                    </div>

                    <!-- Remember + Forgot -->
                    <div class="flex items-center justify-between text-sm">
                        <label class="flex items-center gap-2 text-gray-600 cursor-pointer">
                            <input type="checkbox" class="w-4 h-4 rounded border-gray-300 text-[#cc4b4d] focus:ring-[#cc4b4d]">
                            Ingat saya
                        </label>
                        <a href="#" class="text-[#cc4b4d] hover:underline font-medium">Lupa password?</a>
                    </div>

                    <!-- Button -->
                    <button
                        type="submit"
                        class="w-full bg-[#cc4b4d] hover:bg-[#b83e40] text-white font-semibold py-3 rounded-lg shadow-md hover:shadow-lg transform hover:-translate-y-0.5 transition-all duration-200">
                        Masuk
                    </button>

                </form>

            </div>

            <!-- Footer Card -->
            <div class="bg-gray-50 px-8 py-4 text-center border-t border-gray-100">
                <p class="text-xs text-gray-500">
                    &copy; <?= date('Y'); ?> Desa Terpadu. All rights reserved.
                </p>
            </div>

        </div>

        <!-- Small note -->
        <p class="text-center text-white/80 text-sm mt-6">
            Butuh bantuan? <a href="#" class="font-semibold underline hover:text-[#fff0c7]">Hubungi Admin</a>
        </p>

    </div>

    <!-- JS Toggle password -->
    <script>
        const togglePassword = document.getElementById('togglePassword');
        const password = document.getElementById('password');

        togglePassword.addEventListener('click', function () {
            const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
            password.setAttribute('type', type);
        });
    </script>

</body>
</html>