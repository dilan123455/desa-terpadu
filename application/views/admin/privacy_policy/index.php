<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Privacy Policy - Admin</title>

    <link rel="stylesheet"
          href="<?= base_url('assets/css/output.css'); ?>">

</head>

<body class="bg-gray-50">

    <!-- =====================================================
         SIDEBAR
    ====================================================== -->

    <?php $this->load->view('admin/sidebar'); ?>


    <!-- =====================================================
         MAIN CONTENT
    ====================================================== -->

    <main class="lg:ml-64 min-h-screen">

        <!-- Header -->

        <div class="bg-white border-b border-gray-200">

            <div class="px-6 py-5">

                <h1 class="text-2xl font-bold text-gray-800">
                    Privacy Policy
                </h1>

                <p class="text-sm text-gray-500 mt-1">
                    Kelola bagian-bagian kebijakan privasi website.
                </p>

            </div>

        </div>


        <!-- Content -->

        <div class="p-6">


            <!-- =================================================
                 FLASH MESSAGE
            ================================================== -->

            <?php if ($this->session->flashdata('success')): ?>

                <div class="mb-5 px-4 py-3 rounded-lg bg-green-50
                            border border-green-200 text-green-700">

                    <?= $this->session->flashdata('success'); ?>

                </div>

            <?php endif; ?>


            <!-- =================================================
                 INFORMASI UTAMA CARD (SEPERTI PADA GAMBAR)
            ================================================== -->
            
            <?php if (isset($main_info)): ?>
            <div class="bg-white rounded-xl border border-gray-200 shadow-sm p-6 mb-6">
                
                <div class="flex flex-col md:flex-row justify-between items-start md:items-center border-b border-gray-100 pb-4 mb-4 gap-4">
                    
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 flex items-center justify-center rounded-lg bg-red-50 text-red-500">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-lg font-bold text-gray-800">Informasi Utama</h3>
                            <p class="text-sm text-gray-500">Data yang ditampilkan pada halaman About</p>
                        </div>
                    </div>

                    <!-- Tombol Edit Informasi -->
                    <a href="<?= site_url('admin/privacy_policy/edit_main_info'); ?>" 
                       class="inline-flex items-center justify-center gap-2 px-4 py-2 bg-red-500 hover:bg-red-600 text-white text-sm font-medium rounded-lg transition shadow-sm hover:shadow-md">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5 M18.5 2.5a2.121 2.121 0 013 3L12 15l-4 1 1-4 9.5-9.5z" />
                        </svg>
                        Edit Informasi
                    </a>

                </div>

                <div class="space-y-4">
                    <!-- Judul Utama -->
                    <div>
                        <label class="block text-sm font-semibold text-gray-600 mb-1">JUDUL</label>
                        <div class="w-full bg-gray-50 border border-gray-200 rounded-lg px-4 py-3 text-gray-800">
                            <?= html_escape($main_info->judul_utama ?? 'Satu Solusi, Semua Terintegrasi'); ?>
                        </div>
                    </div>
                    
                    <!-- Deskripsi Utama -->
                    <div>
                        <label class="block text-sm font-semibold text-gray-600 mb-1">DESKRIPSI</label>
                        <div class="w-full bg-gray-50 border border-gray-200 rounded-lg px-4 py-3 text-gray-800 min-h-[80px]">
                            <?= html_escape($main_info->deskripsi_utama ?? 'Platform digital yang dirancang khusus untuk memudahkan pengelolaan administrasi, pelayanan publik, dan komunikasi di tingkat desa.'); ?>
                        </div>
                    </div>
                </div>

            </div>
            <?php endif; ?>


            <!-- =================================================
                 HEADER CONTENT (DAFTAR PRIVACY POLICY)
            ================================================== -->

            <div class="flex flex-col sm:flex-row
                        sm:items-center sm:justify-between
                        gap-4 mb-6">

                <div>

                    <h2 class="text-lg font-semibold text-gray-800">
                        Daftar Privacy Policy
                    </h2>

                    <p class="text-sm text-gray-500 mt-1">
                        Atur judul, isi, dan urutan tampil kebijakan privasi.
                    </p>

                </div>


                <!-- Tambah -->

                <a href="<?= site_url('admin/privacy_policy/create'); ?>"
                   class="inline-flex items-center justify-center
                          gap-2 px-4 py-2.5
                          bg-red-500 hover:bg-red-600
                          text-white text-sm font-medium
                          rounded-lg transition">

                    <svg class="w-5 h-5"
                         fill="none"
                         stroke="currentColor"
                         viewBox="0 0 24 24">

                        <path stroke-linecap="round"
                              stroke-linejoin="round"
                              stroke-width="2"
                              d="M12 4v16m8-8H4" />

                    </svg>

                    Tambah Privacy Policy

                </a>

            </div>


            <!-- =================================================
                 TABLE
            ================================================== -->

            <div class="bg-white rounded-xl
                        border border-gray-200
                        shadow-sm overflow-hidden">


                <?php if (!empty($privacy_policies)): ?>


                    <div class="overflow-x-auto">

                        <table class="w-full text-sm">


                            <!-- TABLE HEADER -->

                            <thead class="bg-gray-50 border-b border-gray-200">

                                <tr>

                                    <th class="px-6 py-4 text-left
                                               font-semibold text-gray-600
                                               w-24">

                                        Urutan

                                    </th>

                                    <th class="px-6 py-4 text-left
                                               font-semibold text-gray-600">

                                        Judul

                                    </th>

                                    <th class="px-6 py-4 text-left
                                               font-semibold text-gray-600">

                                        Isi

                                    </th>

                                    <th class="px-6 py-4 text-center
                                               font-semibold text-gray-600
                                               w-40">

                                        Aksi

                                    </th>

                                </tr>

                            </thead>


                            <!-- TABLE BODY -->

                            <tbody class="divide-y divide-gray-100">


                                <?php foreach ($privacy_policies as $policy): ?>


                                    <tr class="hover:bg-gray-50 transition">


                                        <!-- URUTAN -->

                                        <td class="px-6 py-4">

                                            <span class="inline-flex
                                                         items-center
                                                         justify-center
                                                         w-9 h-9
                                                         rounded-lg
                                                         bg-red-50
                                                         text-red-500
                                                         font-semibold">

                                                <?= (int) $policy->sort_order; ?>

                                            </span>

                                        </td>


                                        <!-- JUDUL -->

                                        <td class="px-6 py-4">

                                            <div class="font-semibold
                                                        text-gray-800">

                                                <?= html_escape($policy->judul); ?>

                                            </div>

                                        </td>


                                        <!-- ISI -->

                                        <td class="px-6 py-4">

                                            <div class="max-w-xl
                                                        text-gray-500
                                                        line-clamp-2">

                                                <?= strip_tags($policy->isi); ?>

                                            </div>

                                        </td>


                                        <!-- AKSI -->

                                        <td class="px-6 py-4">

                                            <div class="flex items-center
                                                        justify-center
                                                        gap-2">


                                                <!-- EDIT -->

                                                <a href="<?= site_url(
                                                    'admin/privacy_policy/edit/' .
                                                    $policy->id
                                                ); ?>"
                                                   class="inline-flex
                                                          items-center
                                                          gap-1.5
                                                          px-3 py-2
                                                          rounded-lg
                                                          bg-blue-50
                                                          text-blue-600
                                                          hover:bg-blue-100
                                                          text-xs
                                                          font-medium
                                                          transition">

                                                    <svg class="w-4 h-4"
                                                         fill="none"
                                                         stroke="currentColor"
                                                         viewBox="0 0 24 24">

                                                        <path stroke-linecap="round"
                                                              stroke-linejoin="round"
                                                              stroke-width="2"
                                                              d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5
                                                                 M18.5 2.5a2.121 2.121 0 013 3L12 15l-4 1 1-4 9.5-9.5z" />

                                                    </svg>

                                                    Edit

                                                </a>


                                                <!-- HAPUS -->

                                                <a href="<?= site_url(
                                                    'admin/privacy_policy/delete/' .
                                                    $policy->id
                                                ); ?>"
                                                   onclick="return confirm('Apakah Anda yakin ingin menghapus Privacy Policy ini?');"
                                                   class="inline-flex
                                                          items-center
                                                          gap-1.5
                                                          px-3 py-2
                                                          rounded-lg
                                                          bg-red-50
                                                          text-red-600
                                                          hover:bg-red-100
                                                          text-xs
                                                          font-medium
                                                          transition">

                                                    <svg class="w-4 h-4"
                                                         fill="none"
                                                         stroke="currentColor"
                                                         viewBox="0 0 24 24">

                                                        <path stroke-linecap="round"
                                                              stroke-linejoin="round"
                                                              stroke-width="2"
                                                              d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7
                                                                 m5 4v6m4-6v6
                                                                 M9 7V4a1 1 0 011-1h4a1 1 0 011 1v3
                                                                 m-9 0h14" />

                                                    </svg>

                                                    Hapus

                                                </a>

                                            </div>

                                        </td>

                                    </tr>


                                <?php endforeach; ?>


                            </tbody>

                        </table>

                    </div>


                <?php else: ?>


                    <!-- =================================================
                         EMPTY STATE
                    ================================================== -->

                    <div class="py-16 text-center">

                        <div class="mx-auto w-16 h-16
                                    flex items-center justify-center
                                    rounded-xl bg-gray-100
                                    text-gray-400">

                            <svg class="w-8 h-8"
                                 fill="none"
                                 stroke="currentColor"
                                 viewBox="0 0 24 24">

                                <path stroke-linecap="round"
                                      stroke-linejoin="round"
                                      stroke-width="2"
                                      d="M9 12h6m-6 4h6
                                         M7 3h7l5 5v13H7a2 2 0 01-2-2V5a2 2 0 012-2z
                                         M14 3v5h5" />

                            </svg>

                        </div>


                        <h3 class="mt-4 text-lg font-semibold
                                   text-gray-800">

                            Belum ada data Privacy Policy.

                        </h3>


                        <p class="mt-1 text-sm text-gray-500">

                            Silakan tambahkan Privacy Policy terlebih dahulu.

                        </p>


                        <a href="<?= site_url('admin/privacy_policy/create'); ?>"
                           class="inline-flex items-center gap-2
                                  mt-5 px-4 py-2.5
                                  bg-red-500 hover:bg-red-600
                                  text-white text-sm font-medium
                                  rounded-lg transition">

                            <svg class="w-5 h-5"
                                 fill="none"
                                 stroke="currentColor"
                                 viewBox="0 0 24 24">

                                <path stroke-linecap="round"
                                      stroke-linejoin="round"
                                      stroke-width="2"
                                      d="M12 4v16m8-8H4" />

                            </svg>

                            Tambah Privacy Policy

                        </a>

                    </div>


                <?php endif; ?>


            </div>

        </div>

    </main>


</body>

</html>