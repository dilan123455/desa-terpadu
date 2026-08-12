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
            max-width: 900px;
            margin: 50px auto;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
        }

        .header h1 {
            margin: 0 0 8px;
            font-size: 32px;
        }

        .header p {
            margin: 0;
            color: #6b7280;
            font-size: 14px;
        }

        .back {
            text-decoration: none;
            background: #e5e7eb;
            color: #1f2937;
            padding: 10px 16px;
            border-radius: 7px;
            font-size: 14px;
        }

        .card {
            background: #fff;
            border-radius: 12px;
            padding: 30px;
            box-shadow: 0 4px 18px rgba(0, 0, 0, 0.08);
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
            font-size: 14px;
        }

        input,
        textarea,
        select {
            width: 100%;
            padding: 11px 12px;
            border: 1px solid #d1d5db;
            border-radius: 7px;
            font-family: inherit;
            font-size: 14px;
        }

        textarea {
            min-height: 180px;
            resize: vertical;
        }

        input:focus,
        textarea:focus,
        select:focus {
            outline: none;
            border-color: #2563eb;
        }

        .help {
            margin-top: 6px;
            font-size: 12px;
            color: #6b7280;
        }

        .actions {
            display: flex;
            justify-content: flex-end;
            gap: 10px;
            margin-top: 25px;
        }

        .btn {
            display: inline-block;
            border: none;
            padding: 10px 18px;
            border-radius: 7px;
            text-decoration: none;
            font-weight: 600;
            cursor: pointer;
            font-size: 14px;
        }

        .btn-cancel {
            background: #e5e7eb;
            color: #374151;
        }

        .btn-primary {
            background: #2563eb;
            color: white;
        }

        .btn-primary:hover {
            background: #1d4ed8;
        }

        .alert {
            margin-bottom: 20px;
            padding: 12px 15px;
            border-radius: 7px;
            background: #fee2e2;
            color: #991b1b;
            font-size: 14px;
        }
    </style>
</head>

<body>

<div class="container">

    <div class="header">

        <div>
            <h1>Tambah FAQ</h1>

            <p>
                Tambahkan pertanyaan dan jawaban untuk website Desa Terpadu.
            </p>
        </div>

        <a
            href="<?= site_url('admin/faq'); ?>"
            class="back"
        >
            ← Kembali
        </a>

    </div>


    <?php if ($this->session->flashdata('error')): ?>

        <div class="alert">
            <?= html_escape($this->session->flashdata('error')); ?>
        </div>

    <?php endif; ?>


    <div class="card">

        <form
            action="<?= site_url('admin/faq/store'); ?>"
            method="post"
        >

            <div class="form-group">

                <label for="question">
                    Pertanyaan
                </label>

                <input
                    type="text"
                    id="question"
                    name="question"
                    placeholder="Contoh: Apa itu Desa Terpadu?"
                    required
                >

                <div class="help">
                    Masukkan pertanyaan yang sering ditanyakan masyarakat.
                </div>

            </div>


            <div class="form-group">

                <label for="answer">
                    Jawaban
                </label>

                <textarea
                    id="answer"
                    name="answer"
                    placeholder="Tuliskan jawaban untuk pertanyaan tersebut..."
                    required
                ></textarea>

                <div class="help">
                    Berikan jawaban yang jelas dan mudah dipahami.
                </div>

            </div>


            <div class="form-group">

                <label for="sort_order">
                    Urutan
                </label>

                <input
                    type="number"
                    id="sort_order"
                    name="sort_order"
                    value="1"
                    min="0"
                >

                <div class="help">
                    Menentukan urutan FAQ yang ditampilkan.
                </div>

            </div>


            <div class="form-group">

                <label for="status">
                    Status
                </label>

                <select
                    id="status"
                    name="status"
                >

                    <option value="active">
                        Aktif
                    </option>

                    <option value="inactive">
                        Tidak Aktif
                    </option>

                </select>

            </div>


            <div class="actions">

                <a
                    href="<?= site_url('admin/faq'); ?>"
                    class="btn btn-cancel"
                >
                    Batal
                </a>

                <button
                    type="submit"
                    class="btn btn-primary"
                >
                    Simpan FAQ
                </button>

            </div>

        </form>

    </div>

</div>

</body>
</html>