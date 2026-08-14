<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Edit Contact - Desa Terpadu</title>

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
            max-width: 800px;
            margin: 40px auto;
        }

        .header {
            margin-bottom: 25px;
        }

        .header h1 {
            margin: 0 0 8px;
            font-size: 30px;
        }

        .header p {
            margin: 0;
            color: #6b7280;
        }

        .card {
            background: white;
            border-radius: 14px;
            box-shadow: 0 4px 18px rgba(0, 0, 0, .07);
            padding: 30px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-size: 14px;
            font-weight: 700;
            color: #374151;
        }

        input,
        textarea {
            width: 100%;
            padding: 12px 14px;
            border: 1px solid #d1d5db;
            border-radius: 8px;
            font-size: 15px;
            font-family: Arial, sans-serif;
            outline: none;
        }

        input:focus,
        textarea:focus {
            border-color: #2563eb;
        }

        textarea {
            min-height: 120px;
            resize: vertical;
        }

        .actions {
            display: flex;
            gap: 10px;
            margin-top: 25px;
        }

        .btn {
            display: inline-block;
            padding: 11px 18px;
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

        .error {
            background: #fee2e2;
            color: #991b1b;
            padding: 12px 16px;
            border-radius: 8px;
            margin-bottom: 20px;
        }
    </style>
</head>

<body>

<div class="container">

    <div class="header">

        <h1>Edit Contact</h1>

        <p>
            Ubah informasi kontak yang tampil pada website.
        </p>

    </div>


    <?php if ($this->session->flashdata('error')): ?>

        <div class="error">
            <?= html_escape($this->session->flashdata('error')); ?>
        </div>

    <?php endif; ?>


    <div class="card">

        <form
            action="<?= site_url('admin/contact/update/' . $contact->id); ?>"
            method="post"
        >

            <!-- TELEPON -->
            <div class="form-group">

                <label for="phone">
                    No. Telepon & WhatsApp
                </label>

                <input
                    type="text"
                    id="phone"
                    name="phone"
                    value="<?= html_escape($contact->phone); ?>"
                    placeholder="Contoh: 0851-7223-8883"
                    required
                >

            </div>


            <!-- EMAIL -->
            <div class="form-group">

                <label for="email">
                    Email
                </label>

                <input
                    type="email"
                    id="email"
                    name="email"
                    value="<?= html_escape($contact->email); ?>"
                    placeholder="Contoh: info@desaterpadu.id"
                    required
                >

            </div>


            <!-- ALAMAT -->
            <div class="form-group">

                <label for="address">
                    Alamat
                </label>

                <textarea
                    id="address"
                    name="address"
                    placeholder="Masukkan alamat"
                    required
                ><?= html_escape($contact->address); ?></textarea>

            </div>


            <div class="actions">

                <a
                    href="<?= site_url('admin/contact'); ?>"
                    class="btn btn-secondary"
                >
                    ← Batal
                </a>

                <button
                    type="submit"
                    class="btn btn-primary"
                >
                    💾 Simpan Perubahan
                </button>

            </div>

        </form>

    </div>

</div>

</body>

</html>