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

        .container {
            width: 90%;
            max-width: 1200px;
            margin: 40px auto;
        }

        .page-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
        }

        .page-header h1 {
            margin: 0 0 8px;
            font-size: 30px;
        }

        .page-header p {
            margin: 0;
            color: #6b7280;
            font-size: 14px;
        }

        .header-actions {
            display: flex;
            gap: 10px;
        }

        .btn {
            display: inline-block;
            padding: 10px 16px;
            border-radius: 7px;
            text-decoration: none;
            border: none;
            cursor: pointer;
            font-size: 14px;
            font-weight: 600;
        }

        .btn-primary {
            background: #2563eb;
            color: white;
        }

        .btn-secondary {
            background: #e5e7eb;
            color: #1f2937;
        }

        .btn-info {
            background: #0ea5e9;
            color: white;
        }

        .btn-warning {
            background: #f59e0b;
            color: white;
        }

        .btn-danger {
            background: #dc2626;
            color: white;
        }

        .btn:hover {
            opacity: 0.9;
        }

        .alert {
            padding: 12px 16px;
            border-radius: 8px;
            margin-bottom: 20px;
        }

        .alert-success {
            background: #dcfce7;
            color: #166534;
        }

        .alert-error {
            background: #fee2e2;
            color: #991b1b;
        }

        .card {
            background: white;
            border-radius: 14px;
            box-shadow: 0 4px 18px rgba(0, 0, 0, 0.07);
            overflow: hidden;
        }

        .table-wrapper {
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 15px;
            border-bottom: 1px solid #e5e7eb;
            text-align: left;
            vertical-align: middle;
        }

        th {
            background: #f8fafc;
            font-size: 13px;
            color: #475569;
        }

        td {
            font-size: 14px;
        }

        .question {
            font-weight: 600;
            color: #1e293b;
            max-width: 300px;
        }

        .answer {
    max-width: 420px;
    color: #64748b;
    line-height: 1.6;
    white-space: normal;
    word-break: break-word;
}

        .badge {
            display: inline-block;
            padding: 5px 10px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
        }

        .badge-active {
            background: #dcfce7;
            color: #166534;
        }

        .badge-inactive {
            background: #e5e7eb;
            color: #475569;
        }

        .actions {
            display: flex;
            gap: 6px;
            flex-wrap: wrap;
        }

        .actions .btn {
            padding: 7px 10px;
            font-size: 12px;
        }

        .empty {
            text-align: center;
            padding: 50px 20px;
            color: #64748b;
        }

        @media (max-width: 700px) {
            .page-header {
                flex-direction: column;
                align-items: flex-start;
                gap: 15px;
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

<div class="container">

    <div class="page-header">

        <div>
            <h1>Kelola FAQ</h1>

            <p>
                Kelola pertanyaan dan jawaban yang ditampilkan pada website Desa Terpadu.
            </p>
        </div>

        <div class="header-actions">

            <a
                href="<?= site_url('admin/dashboard'); ?>"
                class="btn btn-secondary"
            >
                ← Dashboard
            </a>

            <a
                href="<?= site_url('admin/faq/create'); ?>"
                class="btn btn-primary"
            >
                + Tambah FAQ
            </a>

        </div>

    </div>


    <?php if ($this->session->flashdata('success')): ?>

        <div class="alert alert-success">
            <?= html_escape($this->session->flashdata('success')); ?>
        </div>

    <?php endif; ?>


    <?php if ($this->session->flashdata('error')): ?>

        <div class="alert alert-error">
            <?= html_escape($this->session->flashdata('error')); ?>
        </div>

    <?php endif; ?>


    <div class="card">

        <?php if (empty($faqs)): ?>

            <div class="empty">

                <p>Belum ada FAQ.</p>

                <a
                    href="<?= site_url('admin/faq/create'); ?>"
                    class="btn btn-primary"
                >
                    + Tambah FAQ
                </a>

            </div>

        <?php else: ?>

            <div class="table-wrapper">

                <table>

                    <thead>

                        <tr>
                            <th>No</th>
                            <th>Pertanyaan</th>
                            <th>Jawaban</th>
                            <th>Urutan</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>

                    </thead>

                    <tbody>

                        <?php $no = 1; ?>

                        <?php foreach ($faqs as $faq): ?>

                            <tr>

                                <td>
                                    <?= $no++; ?>
                                </td>

                                <td class="question">
                                    <?= html_escape($faq->question); ?>
                                </td>

                                <td class="answer">
                                 <?= html_escape(strip_tags($faq->answer)); ?>
                                </td>

                                <td>
                                    <?= (int) $faq->sort_order; ?>
                                </td>

                                <td>

                                    <?php if ($faq->status === 'active'): ?>

                                        <span class="badge badge-active">
                                            Aktif
                                        </span>

                                    <?php else: ?>

                                        <span class="badge badge-inactive">
                                            Nonaktif
                                        </span>

                                    <?php endif; ?>

                                </td>

                                <td>

                                    <div class="actions">

                                        <a
                                            href="<?= site_url('admin/faq/detail/' . $faq->id); ?>"
                                            class="btn btn-info"
                                        >
                                            Detail
                                        </a>

                                        <a
                                            href="<?= site_url('admin/faq/edit/' . $faq->id); ?>"
                                            class="btn btn-warning"
                                        >
                                            Edit
                                        </a>

                                        <a
                                            href="<?= site_url('admin/faq/delete/' . $faq->id); ?>"
                                            class="btn btn-danger"
                                            onclick="return confirm('Yakin ingin menghapus FAQ ini?');"
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