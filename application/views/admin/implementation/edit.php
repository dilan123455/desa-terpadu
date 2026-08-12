<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Edit Implementation</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >

</head>

<body>

<div class="container py-5">

    <div class="mb-4">

        <h2>
            Edit Langkah Implementasi
        </h2>

        <p class="text-muted">
            Ubah informasi langkah implementasi Desa Terpadu.
        </p>

    </div>


    <?php if (!empty($error)): ?>

        <div class="alert alert-danger">
            <?= $error; ?>
        </div>

    <?php endif; ?>


    <?= validation_errors(
        '<div class="alert alert-danger">',
        '</div>'
    ); ?>


    <div class="card border-0 shadow-sm">

        <div class="card-body">

            <form
                method="post"
                enctype="multipart/form-data"
            >

                <div class="mb-3">

                    <label class="form-label">
                        Judul
                    </label>

                    <input
                        type="text"
                        name="title"
                        class="form-control"
                        value="<?= set_value(
                            'title',
                            $step->title
                        ); ?>"
                        required
                    >

                </div>


                <div class="mb-3">

                    <label class="form-label">
                        Deskripsi
                    </label>

                    <textarea
                        name="description"
                        class="form-control"
                        rows="5"
                        required
                    ><?= set_value(
                        'description',
                        $step->description
                    ); ?></textarea>

                </div>


                <div class="mb-3">

                    <label class="form-label">
                        Urutan
                    </label>

                    <input
                        type="number"
                        name="sort_order"
                        class="form-control"
                        value="<?= set_value(
                            'sort_order',
                            $step->sort_order
                        ); ?>"
                        min="1"
                        required
                    >

                </div>


      <div class="mb-4">

    <label class="form-label">
        Gambar
    </label>

    <?php if (!empty($step->image)): ?>

        <div class="mb-3">

            <img
                src="<?= base_url(
                    'assets/uploads/implementation/' .
                    $step->image
                ); ?>"
                alt="<?= html_escape($step->title); ?>"
                style="
                    width: 220px;
                    height: 150px;
                    object-fit: cover;
                    border-radius: 12px;
                "
            >

        </div>
        

    <?php endif; ?>


    <!-- Upload gambar baru -->

    <input
        type="file"
        name="image"
        class="form-control"
        accept=".jpg,.jpeg,.png,.webp"
    >

    <small class="text-muted d-block mt-1">
        Kosongkan jika tidak ingin mengganti gambar.
    </small>


    <!-- Hapus gambar lama -->

    <?php if (!empty($step->image)): ?>

        <div class="form-check mt-3">

            <input
                class="form-check-input"
                type="checkbox"
                name="delete_image"
                value="1"
                id="delete_image"
            >

            <label
                class="form-check-label text-danger"
                for="delete_image"
            >
                Hapus gambar
            </label>

        </div>

    <?php endif; ?>

</div>


                <div class="d-flex gap-2">

                    <a
                        href="<?= site_url(
                            'admin/implementation'
                        ); ?>"
                        class="btn btn-secondary"
                    >
                        Kembali
                    </a>

                    <button
                        type="submit"
                        class="btn btn-primary"
                    >
                        Simpan Perubahan
                    </button>

                </div>

            </form>

        </div>

    </div>

</div>

</body>

</html>