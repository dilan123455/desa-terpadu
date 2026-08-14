<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?= html_escape($title); ?> - Admin</title>

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
            max-width: 1000px;
            margin: 40px auto;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
        }

        .header h1 {
            margin: 0 0 8px;
        }

        .header p {
            margin: 0;
            color: #64748b;
        }

        .btn {
            padding: 10px 16px;
            border-radius: 8px;
            text-decoration: none;
            font-weight: bold;
            font-size: 13px;
        }

        .btn-primary {
            background: #CC4B4B;
            color: white;
        }

        .btn-edit {
            background: #2563eb;
            color: white;
        }

        .btn-delete {
            background: #dc2626;
            color: white;
        }

        .card {
            background: white;
            border-radius: 14px;
            box-shadow: 0 4px 18px rgba(0,0,0,.07);
            overflow: hidden;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 15px 18px;
            text-align: left;
            border-bottom: 1px solid #e5e7eb;
        }

        th {
            background: #f8fafc;
            font-size: 12px;
            color: #64748b;
            text-transform: uppercase;
        }

        td {
            font-size: 14px;
        }

        .number {
            font-weight: bold;
            color: #CC4B4B;
        }

        .description {
            color: #64748b;
            line-height: 1.5;
        }

        .actions {
            display: flex;
            gap: 7px;
        }

        .empty {
            padding: 40px;
            text-align: center;
            color: #64748b;
        }
    </style>
</head>

<body>

<div class="container">

    <div class="header">

        <div>
            <h1>Manfaat About</h1>

            <p>
                Kelola manfaat yang ditampilkan pada halaman About.
            </p>
        </div>

        <a
            href="<?= site_url('admin/about/benefit_create'); ?>"
            class="btn btn-primary"
        >
            + Tambah Manfaat
        </a>

    </div>

    <div class="card">

        <?php if (!empty($benefits)): ?>

            <table>

                <thead>
                    <tr>
                        <th width="80">No</th>
                        <th>Manfaat</th>
                        <th>Deskripsi</th>
                        <th width="180">Aksi</th>
                    </tr>
                </thead>

                <tbody>

                    <?php foreach ($benefits as $index => $benefit): ?>

                        <tr>

                            <td class="number">
                                <?= $index + 1; ?>
                            </td>

                            <td>
                                <?= html_escape($benefit->title); ?>
                            </td>

                            <td class="description">
                                <?= html_escape($benefit->description); ?>
                            </td>

                            <td>

                                <div class="actions">

                                    <a
                                        href="<?= site_url('admin/about/benefit_edit/' . $benefit->id); ?>"
                                        class="btn btn-edit"
                                    >
                                        Edit
                                    </a>

                                    <a
                                        href="<?= site_url('admin/about/benefit_delete/' . $benefit->id); ?>"
                                        class="btn btn-delete"
                                        onclick="return confirm('Yakin ingin menghapus manfaat ini?');"
                                    >
                                        Hapus
                                    </a>

                                </div>

                            </td>

                        </tr>

                    <?php endforeach; ?>

                </tbody>

            </table>

        <?php else: ?>

            <div class="empty">
                Belum ada data manfaat.
            </div>

        <?php endif; ?>

    </div>

</div>

</body>

</html>