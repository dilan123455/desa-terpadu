<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= base_url('assets/css/output.css'); ?>">
    <title><?= html_escape($title); ?> - Desa Terpadu</title>
</head>

<body class="bg-gray-100 text-gray-800 min-h-screen">
  <div class="admin-wrapper">
    <!-- SIDEBAR -->
    <?php $this->load->view('admin/sidebar'); ?>

    <!-- MAIN AREA -->
    <div class="ml-0 lg:ml-64">
      <!-- TOPBAR -->
      <?php $this->load->view('admin/topbar'); ?>

      <!-- Content -->
      <main class="p-4 sm:p-8 pt-24 sm:pt-28 min-h-screen">
        <!-- Page Header -->
        <div class="mb-6">
          <h2 class="text-2xl font-bold text-gray-800">Tentang Desa Terpadu</h2>
          <p class="text-sm text-gray-500 mt-1">Informasi ini akan digunakan pada bagian About di website Desa Terpadu.</p>
        </div>

        <!-- Notifikasi Flashdata -->
        <?php if ($this->session->flashdata('success')): ?>
          <div class="mb-6 p-4 rounded-lg bg-green-50 border border-green-200 text-green-700 text-sm font-medium">
            <?= $this->session->flashdata('success'); ?>
          </div>
        <?php endif; ?>

        <?php if ($this->session->flashdata('error')): ?>
          <div class="mb-6 p-4 rounded-lg bg-red-50 border border-red-200 text-red-700 text-sm font-medium">
            <?= $this->session->flashdata('error'); ?>
          </div>
        <?php endif; ?>

        <?php if (!empty($about)): ?>

          <!-- ==================== ABOUT CARD ==================== -->
          <div class="bg-white border border-gray-200 rounded-2xl shadow-sm overflow-hidden">
            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 px-6 py-5 border-b border-gray-200">
              <div class="flex items-center gap-3">
                <div class="w-10 h-10 rounded-lg bg-red-50 text-red-500 flex items-center justify-center">
                  <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                  </svg>
                </div>
                <div>
                  <h3 class="text-base font-semibold text-gray-800">Informasi Utama</h3>
                  <p class="text-xs text-gray-400 mt-0.5">Data yang ditampilkan pada halaman About</p>
                </div>
              </div>

              <a href="<?= site_url('admin/about/edit'); ?>"
                 class="inline-flex items-center gap-2 px-4 py-2 bg-red-500 text-white rounded-lg text-sm font-semibold shadow-md hover:bg-red-600 transition whitespace-nowrap">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                </svg>
                Edit Informasi
              </a>
            </div>

            <div class="p-6 space-y-6">
              <div>
                <span class="flex items-center gap-2 text-xs font-bold text-gray-500 uppercase tracking-wider mb-2">
                  <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                  </svg>
                  Judul
                </span>
                <div class="px-4 py-3 bg-gray-50 border border-gray-200 rounded-lg text-base font-semibold text-gray-800 leading-relaxed">
                  <?= html_escape($about->title); ?>
                </div>
              </div>

              <div>
                <span class="flex items-center gap-2 text-xs font-bold text-gray-500 uppercase tracking-wider mb-2">
                  <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4" />
                  </svg>
                  Deskripsi
                </span>
                <div class="px-4 py-3 bg-gray-50 border border-gray-200 rounded-lg text-sm text-gray-700 leading-relaxed">
                  <?= nl2br(html_escape($about->description)); ?>
                </div>
              </div>
            </div>
          </div>

          <!-- ==================== SLIDES CARD ==================== -->
          <div class="bg-white border border-gray-200 rounded-2xl shadow-sm overflow-hidden mt-6">
            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 px-6 py-5 border-b border-gray-200">
              <div class="flex items-center gap-3">
                <div class="w-10 h-10 rounded-lg bg-red-50 text-red-500 flex items-center justify-center">
                  <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                  </svg>
                </div>
                <div>
                  <h3 class="text-base font-semibold text-gray-800">Gambar Carousel</h3>
                  <p class="text-xs text-gray-400 mt-0.5">Gambar yang ditampilkan pada bagian About website.</p>
                </div>
              </div>

              <a href="<?= site_url('admin/about/slide_create'); ?>"
                 class="inline-flex items-center gap-2 px-4 py-2 bg-red-500 text-white rounded-lg text-sm font-semibold shadow-md hover:bg-red-600 transition whitespace-nowrap self-start sm:self-center">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>
                Tambah Slide
              </a>
            </div>

            <?php if (!empty($slides)): ?>
              <div class="p-6 divide-y divide-gray-100">
                <?php foreach ($slides as $slide): ?>
                  <div class="flex flex-col sm:flex-row sm:items-center gap-4 py-4 first:pt-0 last:pb-0">
                    <div class="w-full sm:w-[180px] flex-shrink-0">
                      <img src="<?= base_url('assets/uploads/about/' . $slide->image); ?>"
                           alt="<?= html_escape($slide->title); ?>"
                           class="w-full h-[100px] object-cover rounded-lg border border-gray-200">
                    </div>

                    <div class="flex-1">
                      <div class="text-sm font-semibold text-gray-800 mb-1">
                        <?= html_escape($slide->title); ?>
                      </div>
                      <div class="text-xs text-gray-500 mb-1">
                        File: <?= html_escape($slide->image); ?>
                      </div>
                      <div class="text-xs text-gray-500">
                        Urutan: <?= html_escape($slide->sort_order); ?>
                      </div>
                    </div>

                    <div class="flex items-center gap-2">
                      <!-- Tombol Edit - warna biru selalu tampil -->
                      <a href="<?= site_url('admin/about/edit_slide/' . $slide->id); ?>"
                         class="inline-flex items-center gap-2 px-4 py-2 !bg-blue-600 !text-white rounded-lg text-sm font-semibold shadow-md hover:!bg-blue-700 transition whitespace-nowrap">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                        </svg>
                        Edit
                      </a>
                      <!-- Tombol Hapus -->
                      <a href="<?= site_url('admin/about/slide_delete/' . $slide->id); ?>"
                         class="inline-flex items-center gap-2 px-4 py-2 bg-red-500 text-white rounded-lg text-sm font-semibold shadow-md hover:bg-red-600 transition whitespace-nowrap"
                         onclick="return confirm('Yakin ingin menghapus slide ini?');">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                        </svg>
                        Hapus
                      </a>
                    </div>
                  </div>
                <?php endforeach; ?>
              </div>
            <?php else: ?>
              <div class="p-8 text-center">
                <div class="w-14 h-14 mx-auto mb-3 rounded-full bg-gray-100 text-gray-400 flex items-center justify-center">
                  <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                  </svg>
                </div>
                <p class="text-sm text-gray-500">Belum ada gambar carousel.</p>
                <a href="<?= site_url('admin/about/slide_create'); ?>"
                   class="mt-4 inline-flex items-center gap-2 px-4 py-2 bg-red-500 text-white rounded-lg text-sm font-semibold shadow-md hover:bg-red-600 transition">
                  <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                  </svg>
                  Tambah Slide
                </a>
              </div>
            <?php endif; ?>
          </div>

          <!-- ==================== BENEFITS CARD ==================== -->
          <div class="bg-white border border-gray-200 rounded-2xl shadow-sm overflow-hidden mt-6">
            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 px-6 py-5 border-b border-gray-200">
              <div class="flex items-center gap-3">
                <div class="w-10 h-10 rounded-lg bg-red-50 text-red-500 flex items-center justify-center">
                  <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z" />
                  </svg>
                </div>
                <div>
                  <h3 class="text-base font-semibold text-gray-800">Manfaat / Keunggulan Desa</h3>
                  <p class="text-xs text-gray-400 mt-0.5">Daftar benefit yang ditampilkan pada bagian About.</p>
                </div>
              </div>

              <a href="<?= site_url('admin/about/benefit_create'); ?>"
                 class="inline-flex items-center gap-2 px-4 py-2 bg-red-500 text-white rounded-lg text-sm font-semibold shadow-md hover:bg-red-600 transition whitespace-nowrap self-start sm:self-center">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>
                Tambah Manfaat
              </a>
            </div>

            <?php if (!empty($benefits)): ?>
              <div class="overflow-x-auto">
                <table class="benefits-table w-full text-sm text-left text-gray-700">
                  <thead class="text-xs text-gray-500 uppercase bg-gray-50 border-b border-gray-200">
                    <tr>
                      <th class="px-6 py-3 font-medium w-16">No</th>
                      <th class="px-6 py-3 font-medium">Manfaat</th>
                      <th class="px-6 py-3 font-medium">Deskripsi</th>
                      <th class="px-6 py-3 font-medium text-right w-40">Aksi</th>
                    </tr>
                  </thead>
                  <tbody class="divide-y divide-gray-100">
                    <?php foreach ($benefits as $benefit): ?>
                      <tr>
                        <td class="px-6 py-4 font-bold text-red-500" data-label="No">
                          <?= html_escape($benefit->sort_order); ?>
                        </td>
                        <td class="px-6 py-4 font-semibold text-gray-800" data-label="Manfaat">
                          <?= html_escape($benefit->title); ?>
                        </td>
                        <td class="px-6 py-4 text-gray-600" data-label="Deskripsi">
                          <?= html_escape($benefit->description); ?>
                        </td>
                        <td class="px-6 py-4 text-right" data-label="Aksi">
                          <div class="flex justify-end gap-2">
                            <!-- Tombol Edit -->
                            <a href="<?= site_url('admin/about/benefit_edit/' . $benefit->id); ?>"
                               class="inline-flex items-center gap-1 px-3 py-1.5 !bg-blue-600 !text-white rounded text-xs font-semibold shadow hover:!bg-blue-700 transition">
                              <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                              </svg>
                              Edit
                            </a>
                            <!-- Tombol Hapus -->
                            <a href="<?= site_url('admin/about/benefit_delete/' . $benefit->id); ?>"
                               class="inline-flex items-center gap-1 px-3 py-1.5 bg-red-500 text-white rounded text-xs font-semibold shadow hover:bg-red-600 transition"
                               onclick="return confirm('Yakin ingin menghapus manfaat ini?');">
                              <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
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
              <div class="p-8 text-center">
                <div class="w-14 h-14 mx-auto mb-3 rounded-full bg-gray-100 text-gray-400 flex items-center justify-center">
                  <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z" />
                  </svg>
                </div>
                <p class="text-sm text-gray-500">Belum ada data manfaat.</p>
                <a href="<?= site_url('admin/about/benefit_create'); ?>"
                   class="mt-4 inline-flex items-center gap-2 px-4 py-2 bg-red-500 text-white rounded-lg text-sm font-semibold shadow-md hover:bg-red-600 transition">
                  <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                  </svg>
                  Tambah Manfaat
                </a>
              </div>
            <?php endif; ?>
          </div>

        <?php else: ?>
          <!-- Empty State About -->
          <div class="bg-white border border-gray-200 rounded-2xl shadow-sm overflow-hidden">
            <div class="p-8 text-center">
              <div class="w-16 h-16 mx-auto mb-4 rounded-full bg-red-50 text-red-500 flex items-center justify-center">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
              </div>
              <strong class="block text-sm font-semibold text-gray-700">Data Tentang Desa Terpadu Belum Tersedia</strong>
              <p class="mt-2 text-sm text-gray-500">Silakan tambahkan informasi About terlebih dahulu.</p>
            </div>
          </div>
        <?php endif; ?>

        <!-- Footer -->
        <footer class="mt-8 pt-5 border-t border-gray-200 flex flex-col sm:flex-row justify-between gap-4 text-xs text-gray-400">
          <p>© <?= date('Y'); ?> Desa Terpadu</p>
          <p>Admin Panel</p>
        </footer>
      </main>
    </div>
  </div>

  <!-- CSS Responsif untuk Tabel Manfaat -->
  <style>
    @media (max-width: 640px) {
      .benefits-table thead {
        display: none;
      }
      .benefits-table,
      .benefits-table tbody,
      .benefits-table tr,
      .benefits-table td {
        display: block;
        width: 100%;
      }
      .benefits-table tr {
        margin-bottom: 1rem;
        border: 1px solid #e5e7eb;
        border-radius: 0.5rem;
        padding: 1rem;
        background: #fff;
        box-shadow: 0 1px 2px rgba(0,0,0,0.05);
      }
      .benefits-table td {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 0.5rem 0;
        border-bottom: 1px solid #f3f4f6;
        text-align: right;
      }
      .benefits-table td:last-child {
        border-bottom: 0;
      }
      .benefits-table td::before {
        content: attr(data-label);
        font-weight: 600;
        color: #6b7280;
        text-align: left;
        margin-right: 1rem;
        flex-shrink: 0;
      }
      /* Khusus untuk kolom aksi, buat tombol tetap sejajar kanan */
      .benefits-table td:last-child {
        justify-content: flex-end;
      }
      .benefits-table td:last-child::before {
        display: none; /* Sembunyikan label "Aksi" agar tombol lebih leluasa */
      }
      /* Opsional: buat tombol aksi full width di mobile */
      .benefits-table .flex.justify-end {
        width: 100%;
        justify-content: flex-end;
      }
    }
  </style>
</body>

</html>