<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Reset Password - Desa Terpadu</title>

    <link rel="stylesheet" href="<?= base_url('assets/css/output.css'); ?>">

</head>

<body class="min-h-screen bg-gradient-to-br from-[#cc4b4d] via-[#b83e40] to-[#8a2d2f] flex items-center justify-center p-4">

    <div class="w-full max-w-md">

        <!-- Card -->
        <div class="bg-white rounded-2xl shadow-2xl overflow-hidden">

            <!-- Header -->
            <div class="bg-[#cc4b4d] px-8 py-8 text-center">

                <div class="inline-flex items-center justify-center w-16 h-16 bg-white/20 rounded-full mb-4 backdrop-blur-sm">

                    <svg
                        class="w-8 h-8 text-white"
                        fill="none"
                        stroke="currentColor"
                        viewBox="0 0 24 24"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"
                        />
                    </svg>

                </div>

                <h1 class="text-2xl font-bold text-white">
                    Desa Terpadu
                </h1>

                <p class="text-white/80 text-sm mt-1">
                    Panel Administrasi
                </p>

            </div>


            <!-- Body -->
            <div class="px-8 py-8">

                <h2 class="text-2xl font-bold text-gray-800 mb-1">
                    Reset Password
                </h2>

                <p class="text-gray-500 text-sm mb-6">
                    Silakan buat password baru untuk akun
                    Desa Terpadu Anda.
                </p>


                <!-- Error dari controller -->
                <?php if (!empty($error)): ?>

                    <div class="flex items-start gap-3 bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-lg mb-5">

                        <svg
                            class="w-5 h-5 mt-0.5 shrink-0"
                            fill="none"
                            stroke="currentColor"
                            viewBox="0 0 24 24"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M12 9v2m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"
                            />
                        </svg>

                        <p class="text-sm">
                            <?= html_escape($error); ?>
                        </p>

                    </div>


                    <div class="text-center mt-6">

                        <a
                            href="<?= site_url('auth/forgot_password'); ?>"
                            class="text-sm text-[#cc4b4d] hover:underline font-medium"
                        >
                            ← Minta Link Reset Baru
                        </a>

                    </div>


                <?php else: ?>


                    <!-- Flash Error -->
                    <?php if ($this->session->flashdata('error')): ?>

                        <div class="flex items-start gap-3 bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-lg mb-5">

                            <svg
                                class="w-5 h-5 mt-0.5 shrink-0"
                                fill="none"
                                stroke="currentColor"
                                viewBox="0 0 24 24"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M12 9v2m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"
                                />
                            </svg>

                            <p class="text-sm">
                                <?= html_escape($this->session->flashdata('error')); ?>
                            </p>

                        </div>

                    <?php endif; ?>


                    <!-- Form -->
                    <form
                        action="<?= site_url('auth/update_password'); ?>"
                        method="post"
                        id="resetForm"
                    >

                        <!-- Token -->
                        <input
                            type="hidden"
                            name="token"
                            value="<?= html_escape($token); ?>"
                        >


                        <!-- Password Baru -->
                        <div class="mb-5">

                            <label
                                for="password"
                                class="block text-sm font-semibold text-gray-700 mb-2"
                            >
                                Password Baru
                            </label>

                            <div class="relative">

                                <input
                                    type="password"
                                    id="password"
                                    name="password"
                                    minlength="8"
                                    autocomplete="new-password"
                                    placeholder="Minimal 8 karakter"
                                    required
                                    class="w-full pr-12 px-4 py-3 bg-gray-50 border border-gray-200 rounded-lg text-gray-800 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-[#cc4b4d] focus:border-transparent transition"
                                >

                                <button
                                    type="button"
                                    id="togglePassword"
                                    class="absolute inset-y-0 right-0 flex items-center pr-3 text-gray-400 hover:text-gray-600"
                                    aria-label="Tampilkan password"
                                >
                                    <svg
                                        id="eyePassword"
                                        class="w-5 h-5"
                                        fill="none"
                                        stroke="currentColor"
                                        viewBox="0 0 24 24"
                                    >
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"
                                        />

                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"
                                        />
                                    </svg>
                                </button>

                            </div>

                            <p class="text-xs text-gray-400 mt-2">
                                Password minimal 8 karakter.
                            </p>

                        </div>


                        <!-- Konfirmasi Password -->
                        <div class="mb-6">

                            <label
                                for="password_confirm"
                                class="block text-sm font-semibold text-gray-700 mb-2"
                            >
                                Konfirmasi Password
                            </label>

                            <div class="relative">

                                <input
                                    type="password"
                                    id="password_confirm"
                                    name="password_confirm"
                                    minlength="8"
                                    autocomplete="new-password"
                                    placeholder="Ulangi password baru"
                                    required
                                    class="w-full pr-12 px-4 py-3 bg-gray-50 border border-gray-200 rounded-lg text-gray-800 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-[#cc4b4d] focus:border-transparent transition"
                                >

                                <button
                                    type="button"
                                    id="toggleConfirmPassword"
                                    class="absolute inset-y-0 right-0 flex items-center pr-3 text-gray-400 hover:text-gray-600"
                                    aria-label="Tampilkan konfirmasi password"
                                >
                                    <svg
                                        class="w-5 h-5"
                                        fill="none"
                                        stroke="currentColor"
                                        viewBox="0 0 24 24"
                                    >
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268 2.943-9.542 7-9.542-7z"
                                        />

                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"
                                        />
                                    </svg>
                                </button>

                            </div>

                        </div>


                        <!-- Submit -->
                        <button
                            type="submit"
                            class="w-full bg-[#cc4b4d] hover:bg-[#b83e40] text-white font-semibold py-3 rounded-lg shadow-md hover:shadow-lg transform hover:-translate-y-0.5 transition-all duration-200"
                        >
                            Simpan Password Baru
                        </button>

                    </form>


                    <!-- Back Login -->
                    <div class="text-center mt-6">

                        <a
                            href="<?= site_url('auth/login'); ?>"
                            class="text-sm text-[#cc4b4d] hover:underline font-medium"
                        >
                            ← Kembali ke Login
                        </a>

                    </div>

                <?php endif; ?>

            </div>


            <!-- Footer -->
            <div class="bg-gray-50 px-8 py-4 text-center border-t border-gray-100">

                <p class="text-xs text-gray-500">
                    &copy; <?= date('Y'); ?> Desa Terpadu. All rights reserved.
                </p>

            </div>

        </div>


        <p class="text-center text-white/80 text-sm mt-6">
            Sistem Administrasi Desa Terpadu
        </p>

    </div>


    <!-- JS -->
    <script>

        // Toggle password baru
        const togglePassword =
            document.getElementById('togglePassword');

        const password =
            document.getElementById('password');


        if (togglePassword && password) {

            togglePassword.addEventListener('click', function () {

                const type =
                    password.getAttribute('type') === 'password'
                        ? 'text'
                        : 'password';

                password.setAttribute('type', type);

            });

        }


        // Toggle konfirmasi password
        const toggleConfirmPassword =
            document.getElementById('toggleConfirmPassword');

        const passwordConfirm =
            document.getElementById('password_confirm');


        if (toggleConfirmPassword && passwordConfirm) {

            toggleConfirmPassword.addEventListener('click', function () {

                const type =
                    passwordConfirm.getAttribute('type') === 'password'
                        ? 'text'
                        : 'password';

                passwordConfirm.setAttribute('type', type);

            });

        }


        // Validasi password sebelum submit
        const resetForm =
            document.getElementById('resetForm');


        if (resetForm) {

            resetForm.addEventListener('submit', function (event) {

                const passwordValue =
                    password.value;

                const confirmValue =
                    passwordConfirm.value;


                if (passwordValue.length < 8) {

                    event.preventDefault();

                    alert('Password minimal 8 karakter.');

                    return;

                }


                if (passwordValue !== confirmValue) {

                    event.preventDefault();

                    alert('Konfirmasi password tidak sama.');

                    return;

                }

            });

        }

    </script>

</body>

</html>