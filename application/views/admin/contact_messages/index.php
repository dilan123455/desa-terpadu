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
            max-width: 1250px;
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

        .btn-secondary {
            background: #e5e7eb;
            color: #1f2937;
        }

        .btn-info {
            background: #0ea5e9;
            color: white;
        }

        .btn-success {
            background: #16a34a;
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

        .name {
            font-weight: 600;
            color: #1e293b;
        }

        .email {
            color: #2563eb;
        }

        .subject {
            max-width: 250px;
            font-weight: 600;
        }

        .message-preview {
            max-width: 300px;
            color: #64748b;
            line-height: 1.5;
        }

        .status {
            display: inline-block;
            padding: 5px 10px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
        }

        .status-unread {
            background: #fee2e2;
            color: #991b1b;
        }

        .status-read {
            background: #fef3c7;
            color: #92400e;
        }

        .status-replied {
            background: #dcfce7;
            color: #166534;
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
            padding: 60px 20px;
            color: #64748b;
        }

        @media (max-width: 800px) {
            .page-header {
                flex-direction: column;
                align-items: flex-start;
                gap: 15px;
            }

            .header-actions {
                width: 100%;
            }
        }

        .table-wrapper {
    overflow-x: auto;
}

table {
    width: 100%;
    border-collapse: collapse;
    min-width: 1000px;
}

th,
td {
    padding: 14px 16px;
    border-bottom: 1px solid #e5e7eb;
    text-align: left;
    vertical-align: middle;
}

th {
    background: #f8fafc;
    font-size: 13px;
    color: #475569;
    font-weight: 700;
    white-space: nowrap;
}

td {
    font-size: 14px;
}

.name {
    font-weight: 600;
    color: #1e293b;
    margin-bottom: 4px;
}

.email {
    color: #2563eb;
    font-size: 13px;
    margin-bottom: 3px;
}

.email a {
    color: inherit;
    text-decoration: none;
}

.email a:hover {
    text-decoration: underline;
}

.subject {
    max-width: 220px;
    font-weight: 600;
    color: #334155;
}

.message-preview {
    width: 300px;
    max-width: 300px;
    color: #64748b;
    line-height: 1.5;
}

.message-preview {
    word-break: break-word;
}

.actions {
    display: flex;
    align-items: center;
    gap: 6px;
    flex-wrap: wrap;
    min-width: 180px;
}

.actions .btn {
    padding: 7px 10px;
    font-size: 12px;
    white-space: nowrap;
}
    </style>
</head>

<body>

<div class="container">

    <div class="page-header">

        <div>
            <h1>Pesan Masuk</h1>

            <p>
                Kelola pesan yang dikirim oleh pengunjung melalui halaman kontak.
            </p>
        </div>

        <div class="header-actions">

            <a
                href="<?= site_url('admin/dashboard'); ?>"
                class="btn btn-secondary"
            >
                ← Dashboard
            </a>

        </div>

    </div>


    <?php if ($this->session->flashdata('success')): ?>

        <div class="alert alert-success">
            <?= html_escape($this->session->flashdata('success')); ?>
        </div>

    <?php endif; ?>


    <div class="card">

        <?php if (empty($messages)): ?>

            <div class="empty">

                <h3>Belum Ada Pesan</h3>

                <p>
                    Belum ada pesan yang dikirim oleh pengunjung.
                </p>

            </div>

        <?php else: ?>

            <div class="table-wrapper">

                <table>

                    <thead>

                        <tr>
                            <th>No</th>
                            <th>Pengirim</th>
                            <th>Subjek</th>
                            <th>Pesan</th>
                            <th>Status</th>
                            <th>Tanggal</th>
                            <th>Aksi</th>
                        </tr>

                    </thead>

                    <tbody>

                        <?php $no = 1; ?>

                        <?php foreach ($messages as $message): ?>

                            <tr>

                                <td>
                                    <?= $no++; ?>
                                </td>

                                <td>

                                    <div class="name">
                                        <?= html_escape($message->name); ?>
                                    </div>

                                    <div class="email">
    <a href="mailto:<?= html_escape($message->email); ?>">
        <?= html_escape($message->email); ?>
    </a>
</div>

                                    <?php if (!empty($message->phone)): ?>

                                        <small>
                                            <?= html_escape($message->phone); ?>
                                        </small>

                                    <?php endif; ?>

                                </td>

                                <td class="subject">

                                    <?= html_escape(
                                        $message->subject ?: '-'
                                    ); ?>

                                </td>

                                <td class="message-preview">
    <?php
        $preview = strip_tags($message->message);

        if (strlen($preview) > 100) {
            $preview = substr($preview, 0, 100) . '...';
        }
    ?>

    <?= html_escape($preview); ?>
</td>

                                <td>

                                    <?php if ($message->status === 'unread'): ?>

                                        <span class="status status-unread">
                                            Belum Dibaca
                                        </span>

                                    <?php elseif ($message->status === 'read'): ?>

                                        <span class="status status-read">
                                            Sudah Dibaca
                                        </span>

                                    <?php else: ?>

                                        <span class="status status-replied">
                                            Sudah Dibalas
                                        </span>

                                    <?php endif; ?>

                                </td>

                                <td>

                                    <?= date(
                                        'd M Y H:i',
                                        strtotime($message->created_at)
                                    ); ?>

                                </td>

                                <td>

                                    <div class="actions">

                                        <a
                                            href="<?= site_url(
                                                'admin/contact_messages/detail/' . $message->id
                                            ); ?>"
                                            class="btn btn-info"
                                        >
                                            Detail
                                        </a>

                                        <?php if ($message->status !== 'replied'): ?>

                                            <a
                                                href="<?= site_url(
                                                    'admin/contact_messages/replied/' . $message->id
                                                ); ?>"
                                                class="btn btn-success"
                                                onclick="return confirm('Tandai pesan ini sebagai sudah dibalas?');"
                                            >
                                                Dibalas
                                            </a>

                                        <?php endif; ?>

                                        <a
                                            href="<?= site_url(
                                                'admin/contact_messages/delete/' . $message->id
                                            ); ?>"
                                            class="btn btn-danger"
                                            onclick="return confirm('Yakin ingin menghapus pesan ini?');"
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