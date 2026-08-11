<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?= html_escape($title); ?> - Desa Terpadu</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #f5f7fa;
            color: #1f2937;
        }

        .page-container {
            width: 92%;
            max-width: 1250px;
            margin: 40px auto;
        }

        .page-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 20px;
            margin-bottom: 25px;
        }

        .page-title h1 {
            margin: 0 0 6px;
            font-size: 30px;
        }

        .page-title p {
            margin: 0;
            color: #6b7280;
            font-size: 14px;
        }

        .header-actions {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
        }

        .btn {
            display: inline-block;
            padding: 10px 16px;
            border-radius: 8px;
            text-decoration: none;
            border: none;
            cursor: pointer;
            font-size: 14px;
            font-weight: 600;
        }

        .btn-primary {
            background: #2563eb;
            color: #fff;
        }

        .btn-primary:hover {
            background: #1d4ed8;
        }

        .btn-secondary {
            background: #e5e7eb;
            color: #374151;
        }

        .btn-secondary:hover {
            background: #d1d5db;
        }

        .btn-warning {
            background: #f59e0b;
            color: #fff;
        }

        .btn-warning:hover {
            background: #d97706;
        }

        .btn-danger {
            background: #dc2626;
            color: #fff;
        }

        .btn-danger:hover {
            background: #b91c1c;
        }

        .btn-info {
            background: #0891b2;
            color: #fff;
        }

        .btn-info:hover {
            background: #0e7490;
        }

        .alert {
            padding: 14px 16px;
            border-radius: 8px;
            margin-bottom: 20px;
        }

        .alert-success {
            background: #dcfce7;
            color: #166534;
        }

        .alert-danger {
            background: #fee2e2;
            color: #991b1b;
        }

        .table-card {
            background: #fff;
            border-radius: 12px;
            box-shadow: 0 3px 15px rgba(0, 0, 0, 0.07);
            overflow: hidden;
        }

        .table-wrapper {
            width: 100%;
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            min-width: 950px;
        }

        thead {
            background: #f8fafc;
        }

        th {
            padding: 15px;
            text-align: left;
            font-size: 13px;
            color: #374151;
            border-bottom: 1px solid #e5e7eb;
            white-space: nowrap;
        }

        td {
            padding: 14px 15px;
            border-bottom: 1px solid #f1f5f9;
            vertical-align: middle;
            font-size: 14px;
        }

        tbody tr:hover {
            background: #f8fafc;
        }

        .article-image {
            width: 80px;
            height: 55px;
            object-fit: cover;
            border-radius: 7px;
            display: block;
        }

        .no-image {
            width: 80px;
            height: 55px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #e5e7eb;
            color: #6b7280;
            border-radius: 7px;
            font-size: 11px;
            text-align: center;
        }

        .status {
            display: inline-block;
            padding: 5px 9px;
            border-radius: 6px;
            font-size: 12px;
            font-weight: 600;
        }

        .status-published {
            background: #dcfce7;
            color: #166534;
        }

        .status-draft {
            background: #fef3c7;
            color: #92400e;
        }

        .category {
            color: #2563eb;
            font-weight: 600;
        }

        .action-buttons {
            display: flex;
            gap: 6px;
            flex-wrap: wrap;
        }

        .action-buttons .btn {
            padding: 7px 10px;
            font-size: 12px;
        }

        .empty {
            padding: 50px 20px;
            text-align: center;
            color: #6b7280;
        }

        @media (max-width: 700px) {
            .page-container {
                width: 94%;
                margin: 25px auto;
            }

            .page-header {
                align-items: flex-start;
                flex-direction: column;
            }

            .header-actions {
                width: 100%;
            }

            .header-actions .btn {
                flex: 1;
                text-align: center;
            }
        }
    </style>
</head>

<body>

<div class="page-container">

    <!-- Header -->
    <div class="page-header">

        <div class="page-title">
            <h1>Artikel</h1>
            <p>Kelola artikel dan berita Desa Terpadu</p>
        </div>

        <div class="header-actions">

            <a
                href="<?= site_url('admin/dashboard'); ?>"
                class="btn btn-secondary"
            >
                ← Dashboard
            </a>

            <a
                href="<?= site_url('admin/articles/create'); ?>"
                class="btn btn-primary"
            >
                + Tambah Artikel
            </a>

        </div>

    </div>


    <!-- Flash Message -->
    <?php if ($this->session->flashdata('success')): ?>

        <div class="alert alert-success">
            <?= html_escape($this->session->flashdata('success')); ?>
        </div>

    <?php endif; ?>


    <?php if ($this->session->flashdata('error')): ?>

        <div class="alert alert-danger">
            <?= html_escape($this->session->flashdata('error')); ?>
        </div>

    <?php endif; ?>


    <!-- Table -->
    <div class="table-card">

        <?php if (empty($articles)): ?>

            <div class="empty">
                <p>Belum ada artikel.</p>

                <a
                    href="<?= site_url('admin/articles/create'); ?>"
                    class="btn btn-primary"
                >
                    + Tambah Artikel
                </a>
            </div>

        <?php else: ?>

            <div class="table-wrapper">

                <table>

                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Gambar</th>
                            <th>Judul</th>
                            <th>Kategori</th>
                            <th>Penulis</th>
                            <th>Status</th>
                            <th>Tanggal</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <tbody>

                    <?php $no = 1; ?>

                    <?php foreach ($articles as $article): ?>

                        <tr>

                            <td>
                                <?= $no++; ?>
                            </td>

                            <td>

                                <?php if (!empty($article->image)): ?>

                                    <img
                                        class="article-image"
                                        src="<?= base_url('assets/uploads/' . $article->image); ?>"
                                        alt="<?= html_escape($article->title); ?>"
                                    >

                                <?php else: ?>

                                    <div class="no-image">
                                        Tidak ada gambar
                                    </div>

                                <?php endif; ?>

                            </td>

                            <td>
                                <strong>
                                    <?= html_escape($article->title); ?>
                                </strong>
                            </td>

                            <td>
                                <span class="category">
                                    <?= html_escape($article->category); ?>
                                </span>
                            </td>

                            <td>
                                <?= html_escape($article->author_name ?? '-'); ?>
                            </td>

                            <td>

                                <?php if ($article->status === 'published'): ?>

                                    <span class="status status-published">
                                        Published
                                    </span>

                                <?php else: ?>

                                    <span class="status status-draft">
                                        Draft
                                    </span>

                                <?php endif; ?>

                            </td>

                            <td>
                                <?= date('d M Y', strtotime($article->created_at)); ?>
                            </td>

                            <td>

                                <div class="action-buttons">

                                    <a
                                        href="<?= site_url('admin/articles/detail/' . $article->id); ?>"
                                        class="btn btn-info"
                                    >
                                        Detail
                                    </a>

                                    <a
                                        href="<?= site_url('admin/articles/edit/' . $article->id); ?>"
                                        class="btn btn-warning"
                                    >
                                        Edit
                                    </a>

                                    <a
                                        href="<?= site_url('admin/articles/delete/' . $article->id); ?>"
                                        class="btn btn-danger"
                                        onclick="return confirm('Yakin ingin menghapus artikel ini?');"
                                    >
                                        Hapus
                                    </a>

                                </div>

                            </td>

                        </tr>

                    <?php endforeach; ?>

                    </tbody>

                </table>

            </div>

        <?php endif; ?>

    </div>

</div>

</body>
</html>