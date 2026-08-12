<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Implementation - Admin</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >
</head>

<body>

<div class="container py-5">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>
            <h2 class="mb-1">
                Proses Implementasi
            </h2>

            <p class="text-muted mb-0">
                Kelola langkah implementasi Desa Terpadu.
            </p>
        </div>

    </div>


    <?php if ($this->session->flashdata('success')): ?>

        <div class="alert alert-success">
            <?= $this->session->flashdata('success'); ?>
        </div>

    <?php endif; ?>


    <div class="card shadow-sm border-0">

        <div class="card-body p-0">

            <div class="table-responsive">

                <table class="table table-hover align-middle mb-0">

                    <thead class="table-light">

                        <tr>
                            <th width="80">
                                No
                            </th>

                            <th width="100">
                                Gambar
                            </th>

                            <th>
                                Judul
                            </th>

                            <th>
                                Deskripsi
                            </th>

                            <th width="100">
                                Urutan
                            </th>

                            <th width="150">
                                Aksi
                            </th>
                        </tr>

                    </thead>

                    <tbody>

                        <?php if (!empty($implementation_steps)): ?>

                            <?php foreach ($implementation_steps as $step): ?>

                                <tr>

                                    <td>
                                        <?= $step->sort_order; ?>
                                    </td>

                                    <td>
<?php
$image_path = FCPATH . 'assets/uploads/implementation/' . $step->image;
?>

<?php if (!empty($step->image) && file_exists($image_path)): ?>

    <img
        src="<?= base_url('assets/uploads/implementation/' . $step->image); ?>"
        alt="<?= html_escape($step->title); ?>"
        width="80"
        height="60"
        style="
            object-fit: cover;
            border-radius: 8px;
        "
    >

<?php else: ?>

    <span class="text-muted">-</span>

<?php endif; ?>
                                    </td>

                                    <td>
                                        <strong>
                                            <?= html_escape($step->title); ?>
                                        </strong>
                                    </td>

                                    <td>
                                        <?= html_escape($step->description); ?>
                                    </td>

                                    <td>
                                        <?= $step->sort_order; ?>
                                    </td>

                                    <td>

                                        <a
                                            href="<?= site_url(
                                                'admin/implementation/edit/' .
                                                $step->id
                                            ); ?>"
                                            class="btn btn-sm btn-primary"
                                        >
                                            Edit
                                        </a>

                                        <a
                                            href="<?= site_url(
                                                'admin/implementation/delete/' .
                                                $step->id
                                            ); ?>"
                                            class="btn btn-sm btn-danger"
                                            onclick="return confirm('Yakin ingin menghapus data ini?');"
                                        >
                                            Hapus
                                        </a>

                                    </td>

                                </tr>

                            <?php endforeach; ?>

                        <?php else: ?>

                            <tr>

                                <td
                                    colspan="6"
                                    class="text-center py-5 text-muted"
                                >
                                    Belum ada data implementation.
                                </td>

                            </tr>

                        <?php endif; ?>

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</div>

</body>
</html>