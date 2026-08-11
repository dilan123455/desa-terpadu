<div style="padding: 20px;">

    <!-- Header -->
    <div style="
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 20px;
        border-bottom: 1px solid #ddd;
        padding-bottom: 15px;
    ">

        <div>
            <h2 style="margin: 0 0 5px 0;">
                Detail Testimoni
            </h2>

            <p style="margin: 0; color: #666;">
                Informasi lengkap testimoni masyarakat.
            </p>
        </div>

        <div>

            <a href="<?= base_url('admin/testimoni'); ?>"
               style="
                    display: inline-block;
                    padding: 9px 15px;
                    border: 1px solid #ccc;
                    border-radius: 5px;
                    text-decoration: none;
                    color: #333;
                    background: #fff;
               ">
                ← Kembali
            </a>

            <a href="<?= base_url('admin/testimoni/edit/' . $item->id); ?>"
               style="
                    display: inline-block;
                    padding: 9px 15px;
                    border-radius: 5px;
                    text-decoration: none;
                    color: white;
                    background: #ffc107;
                    margin-left: 5px;
               ">
                Edit Testimoni
            </a>

        </div>

    </div>


    <!-- Detail Card -->
    <div style="
        max-width: 800px;
        background: white;
        border: 1px solid #ddd;
        border-radius: 8px;
        padding: 25px;
    ">

        <!-- Foto -->
        <div style="
            text-align: center;
            margin-bottom: 25px;
        ">

            <?php if (!empty($item->photo)): ?>

                <img
                    src="<?= base_url('uploads/testimoni/' . $item->photo); ?>"
                    alt="<?= html_escape($item->name); ?>"
                    style="
                        width: 140px;
                        height: 140px;
                        object-fit: cover;
                        border-radius: 50%;
                        border: 3px solid #eee;
                    "
                >

            <?php else: ?>

                <div style="
                    width: 140px;
                    height: 140px;
                    margin: auto;
                    border-radius: 50%;
                    background: #eee;
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    color: #888;
                ">
                    Tidak ada foto
                </div>

            <?php endif; ?>

        </div>


        <!-- Nama -->
        <div style="margin-bottom: 18px;">

            <small style="color: #777;">
                Nama
            </small>

            <h3 style="margin: 5px 0;">
                <?= html_escape($item->name); ?>
            </h3>

        </div>


        <!-- Jabatan -->
        <div style="margin-bottom: 18px;">

            <small style="color: #777;">
                Jabatan
            </small>

            <p style="margin: 5px 0;">
                <?= !empty($item->position)
                    ? html_escape($item->position)
                    : '-'; ?>
            </p>

        </div>


        <!-- Status -->
        <div style="margin-bottom: 18px;">

            <small style="color: #777;">
                Status
            </small>

            <div style="margin-top: 5px;">

                <?php if ($item->status === 'active'): ?>

                    <span style="
                        display: inline-block;
                        padding: 6px 12px;
                        border-radius: 20px;
                        background: #d4edda;
                        color: #155724;
                    ">
                        Aktif
                    </span>

                <?php else: ?>

                    <span style="
                        display: inline-block;
                        padding: 6px 12px;
                        border-radius: 20px;
                        background: #e2e3e5;
                        color: #383d41;
                    ">
                        Nonaktif
                    </span>

                <?php endif; ?>

            </div>

        </div>


        <!-- Isi Testimoni -->
        <div>

            <small style="color: #777;">
                Isi Testimoni
            </small>

            <div style="
                margin-top: 8px;
                padding: 18px;
                background: #f8f9fa;
                border-radius: 6px;
                line-height: 1.7;
            ">
                <?= nl2br(html_escape($item->content)); ?>
            </div>

        </div>

    </div>

</div>