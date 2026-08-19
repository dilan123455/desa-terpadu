<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Edit Privacy Policy - Admin</title>

    <link rel="stylesheet" href="<?= base_url('assets/css/output.css'); ?>">

</head>

<body class="bg-gray-50">

    <!-- SIDEBAR -->
    <?php $this->load->view('admin/sidebar'); ?>

    <!-- MAIN CONTENT -->
    <main class="lg:ml-64 min-h-screen">

        <!-- Header -->
        <div class="bg-white border-b border-gray-200">
            <div class="px-6 py-5">
                <h1 class="text-2xl font-bold text-gray-800">
                    Edit Privacy Policy
                </h1>
                <p class="text-sm text-gray-500 mt-1">
                    Perbarui bagian kebijakan privasi website.
                </p>
            </div>
        </div>

        <!-- Content -->
        <div class="p-6">

            <!-- Form -->
            <div class="rounded-xl border border-gray-200 bg-white p-6 shadow-sm">

                <form action="<?= site_url('admin/privacy_policy/update/' . $privacy_policy->id); ?>" method="POST">

                    <!-- Judul -->
                    <div class="mb-5">
                        <label for="judul" class="mb-2 block text-sm font-semibold text-gray-700">
                            Judul
                        </label>

                        <input
                            type="text"
                            id="judul"
                            name="judul"
                            value="<?= set_value('judul', $privacy_policy->judul); ?>"
                            placeholder="Contoh: Persetujuan"
                            class="w-full rounded-lg border border-gray-300 px-4 py-2.5 text-sm text-gray-800 outline-none transition focus:border-[#cc4b4d] focus:ring-2 focus:ring-[#cc4b4d]/20"
                            required
                        >

                        <?= form_error('judul', '<p class="mt-1 text-sm text-red-600">', '</p>'); ?>
                    </div>

                    <!-- Isi -->
                    <div class="mb-5">
                        <label for="isi" class="mb-2 block text-sm font-semibold text-gray-700">
                            Isi
                        </label>

                        <textarea
                            id="isi"
                            name="isi"
                            rows="10"
                            placeholder="Masukkan isi kebijakan privasi..."
                            class="w-full rounded-lg border border-gray-300 px-4 py-3 text-sm text-gray-800 outline-none transition focus:border-[#cc4b4d] focus:ring-2 focus:ring-[#cc4b4d]/20"
                            required
                        ><?= set_value('isi', $privacy_policy->isi); ?></textarea>

                        <?= form_error('isi', '<p class="mt-1 text-sm text-red-600">', '</p>'); ?>
                    </div>

                    <!-- Urutan -->
                    <div class="mb-6">
                        <label for="sort_order" class="mb-2 block text-sm font-semibold text-gray-700">
                            Urutan
                        </label>

                        <input
                            type="number"
                            id="sort_order"
                            name="sort_order"
                            value="<?= set_value('sort_order', $privacy_policy->sort_order); ?>"
                            min="1"
                            placeholder="Contoh: 1"
                            class="w-full rounded-lg border border-gray-300 px-4 py-2.5 text-sm text-gray-800 outline-none transition focus:border-[#cc4b4d] focus:ring-2 focus:ring-[#cc4b4d]/20"
                            required
                        >

                        <p class="mt-1 text-xs text-gray-500">
                            Tentukan posisi bagian Privacy Policy. Angka yang lebih kecil akan tampil lebih dahulu.
                        </p>

                        <?= form_error('sort_order', '<p class="mt-1 text-sm text-red-600">', '</p>'); ?>
                    </div>

                    <!-- Button -->
                    <div class="flex flex-col-reverse gap-3 sm:flex-row sm:justify-end">

                        <a
                            href="<?= site_url('admin/privacy_policy'); ?>"
                            class="inline-flex items-center justify-center rounded-lg border border-gray-300 px-5 py-2.5 text-sm font-semibold text-gray-700 transition hover:bg-gray-50"
                        >
                            Batal
                        </a>

                        <button
                            type="submit"
                            class="inline-flex items-center justify-center rounded-lg bg-[#cc4b4d] px-5 py-2.5 text-sm font-semibold text-white transition hover:bg-[#b83f41]"
                        >
                            Simpan Perubahan
                        </button>

                    </div>

                </form>

            </div>

        </div>

    </main>

</body>

</html>