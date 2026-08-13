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
            max-width: 800px;
            margin: 40px auto;
        }

        .header {
            margin-bottom: 25px;
        }

        .header h1 {
            margin: 0 0 8px;
        }

        .header p {
            margin: 0;
            color: #64748b;
        }

        .card {
            background: white;
            padding: 30px;
            border-radius: 14px;
            box-shadow: 0 4px 18px rgba(0,0,0,.07);
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
        }

        input {
            width: 100%;
            padding: 12px 14px;
            border: 1px solid #d1d5db;
            border-radius: 8px;
            font-size: 14px;
        }

        input:focus {
            outline: none;
            border-color: #2563eb;
        }

        .actions {
            display: flex;
            gap: 10px;
            margin-top: 25px;
        }

        .btn {
            padding: 11px 18px;
            border-radius: 8px;
            border: none;
            text-decoration: none;
            font-weight: bold;
            cursor: pointer;
        }

        .btn-primary {
            background: #2563eb;
            color: white;
        }

        .btn-secondary {
            background: #e5e7eb;
            color: #1f2937;
        }
    </style>
</head>
<body>
<div class="container">

    <div class="header">

        <h1>
            Tambah Slide About
        </h1>

        <p>
            Tambahkan gambar baru untuk carousel pada halaman About.
        </p>

    </div>

    <div class="card">

        <form
            action="<?= site_url('admin/about/slide_store'); ?>"
            method="post"
            enctype="multipart/form-data"
        >

            <div class="form-group">

                <label for="title">
                    Judul Slide
                </label>

                <input
                    type="text"
                    id="title"
                    name="title"
                    required
                >

            </div>

            <div class="form-group">

                <label for="image">
                    Gambar Slide
                </label>

                <input
                    type="file"
                    id="image"
                    name="image"
                    accept="image/*"
                    required
                >

            </div>
        
                    <div class="actions">

                <a
                    href="<?= site_url('admin/about/slides'); ?>"
                    class="btn btn-secondary"
                >
                    Batal
                </a>

                <button
                    type="submit"
                    class="btn btn-primary"
                >
                    Simpan Slide
                </button>

            </div>

        </form>

    </div>

</div>

</body>

</html>
