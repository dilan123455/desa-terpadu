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
                Kelola Testimoni
            </h2>

            <p style="margin: 0; color: #666;">
                Kelola testimoni masyarakat yang ditampilkan pada website Desa Terpadu.
            </p>
        </div>

        <div style="display: flex; gap: 10px;">

            <a href="<?= base_url('admin/dashboard'); ?>"
               style="
                    text-decoration: none;
                    padding: 9px 15px;
                    border: 1px solid #ccc;
                    border-radius: 5px;
                    color: #333;
                    background: #fff;
               ">
                ← Dashboard
            </a>

            <a href="<?= base_url('admin/testimoni/create'); ?>"
               style="
                    text-decoration: none;
                    padding: 9px 15px;
                    border-radius: 5px;
                    color: white;
                    background: #007bff;
               ">
                + Tambah Testimoni
            </a>

        </div>

    </div>


    <!-- Alert Success -->
    <?php if ($this->session->flashdata('success')): ?>

        <div style="
            padding: 12px 15px;
            margin-bottom: 20px;
            border-radius: 5px;
            background: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        ">
            <?= $this->session->flashdata('success'); ?>
        </div>

    <?php endif; ?>


    <!-- Alert Error -->
    <?php if ($this->session->flashdata('error')): ?>

        <div style="
            padding: 12px 15px;
            margin-bottom: 20px;
            border-radius: 5px;
            background: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        ">
            <?= $this->session->flashdata('error'); ?>
        </div>

    <?php endif; ?>


    <!-- Card Table -->
    <div style="
        background: white;
        border: 1px solid #ddd;
        border-radius: 8px;
        overflow: hidden;
    ">

        <div style="
            padding: 15px 18px;
            border-bottom: 1px solid #ddd;
            font-weight: bold;
        ">
            Daftar Testimoni
        </div>


        <div style="overflow-x: auto;">

            <table style="
                width: 100%;
                border-collapse: collapse;
                font-size: 14px;
            ">

                <thead>
                    <tr style="background: #f8f9fa;">

                        <th style="padding: 12px; border-bottom: 1px solid #ddd;">
                            #
                        </th>

                        <th style="padding: 12px; border-bottom: 1px solid #ddd;">
                            Foto
                        </th>

                        <th style="padding: 12px; border-bottom: 1px solid #ddd; text-align: left;">
                            Nama
                        </th>

                        <th style="padding: 12px; border-bottom: 1px solid #ddd; text-align: left;">
                            Jabatan
                        </th>

                        <th style="padding: 12px; border-bottom: 1px solid #ddd; text-align: left;">
                            Isi Testimoni
                        </th>

                        <th style="padding: 12px; border-bottom: 1px solid #ddd;">
                            Status
                        </th>

                        <th style="padding: 12px; border-bottom: 1px solid #ddd;">
                            Aksi
                        </th>

                    </tr>
                </thead>


                <tbody>

                <?php if (empty($testimonies)): ?>

                    <tr>
                        <td colspan="7"
                            style="
                                padding: 30px;
                                text-align: center;
                                color: #777;
                            ">
                            Belum ada testimoni.
                        </td>
                    </tr>

                <?php else: ?>

                    <?php $no = 1; ?>

                    <?php foreach ($testimonies as $row): ?>

                        <tr>

                            <!-- Nomor -->
                            <td style="
                                padding: 12px;
                                border-bottom: 1px solid #eee;
                                text-align: center;
                            ">
                                <?= $no++; ?>
                            </td>


                            <!-- Foto -->
                            <td style="
                                padding: 12px;
                                border-bottom: 1px solid #eee;
                                text-align: center;
                            ">

                                <?php if (!empty($row->photo)): ?>

                                    <img
                                        src="<?= base_url('uploads/testimoni/' . $row->photo); ?>"
                                        alt="<?= html_escape($row->name); ?>"
                                        style="
                                            width: 55px;
                                            height: 55px;
                                            object-fit: cover;
                                            border-radius: 50%;
                                            border: 1px solid #ddd;
                                        "
                                    >

                                <?php else: ?>

                                    <span style="color: #999;">
                                        Tidak ada
                                    </span>

                                <?php endif; ?>

                            </td>


                            <!-- Nama -->
                            <td style="
                                padding: 12px;
                                border-bottom: 1px solid #eee;
                            ">
                                <strong>
                                    <?= html_escape($row->name); ?>
                                </strong>
                            </td>


                            <!-- Jabatan -->
                            <td style="
                                padding: 12px;
                                border-bottom: 1px solid #eee;
                            ">
                                <?= html_escape($row->position); ?>
                            </td>


                            <!-- Isi -->
                            <td style="
                                padding: 12px;
                                border-bottom: 1px solid #eee;
                                max-width: 300px;
                            ">
                                <?= html_escape(character_limiter($row->content, 80)); ?>
                            </td>


                            <!-- Status -->
                            <td style="
                                padding: 12px;
                                border-bottom: 1px solid #eee;
                                text-align: center;
                            ">

                                <?php if ($row->status === 'active'): ?>

                                    <span style="
                                        display: inline-block;
                                        padding: 5px 10px;
                                        border-radius: 20px;
                                        background: #d4edda;
                                        color: #155724;
                                        font-size: 12px;
                                    ">
                                        Aktif
                                    </span>

                                <?php else: ?>

                                    <span style="
                                        display: inline-block;
                                        padding: 5px 10px;
                                        border-radius: 20px;
                                        background: #e2e3e5;
                                        color: #383d41;
                                        font-size: 12px;
                                    ">
                                        Nonaktif
                                    </span>

                                <?php endif; ?>

                            </td>


                            <!-- Aksi -->
                            <td style="
                                padding: 12px;
                                border-bottom: 1px solid #eee;
                                text-align: center;
                                white-space: nowrap;
                            ">

                                <!-- Detail -->
                                <a href="<?= base_url('admin/testimoni/detail/' . $row->id); ?>"
                                   style="
                                        display: inline-block;
                                        padding: 6px 10px;
                                        margin: 2px;
                                        border-radius: 4px;
                                        text-decoration: none;
                                        color: white;
                                        background: #17a2b8;
                                        font-size: 13px;
                                   ">
                                    Detail
                                </a>


                                <!-- Edit -->
                                <a href="<?= base_url('admin/testimoni/edit/' . $row->id); ?>"
                                   style="
                                        display: inline-block;
                                        padding: 6px 10px;
                                        margin: 2px;
                                        border-radius: 4px;
                                        text-decoration: none;
                                        color: white;
                                        background: #ffc107;
                                        font-size: 13px;
                                   ">
                                    Edit
                                </a>


                                <!-- Hapus -->
                                <a href="<?= base_url('admin/testimoni/delete/' . $row->id); ?>"
                                   onclick="return confirm('Yakin ingin menghapus testimoni ini?');"
                                   style="
                                        display: inline-block;
                                        padding: 6px 10px;
                                        margin: 2px;
                                        border-radius: 4px;
                                        text-decoration: none;
                                        color: white;
                                        background: #dc3545;
                                        font-size: 13px;
                                   ">
                                    Hapus
                                </a>

                            </td>

                        </tr>

                    <?php endforeach; ?>

                <?php endif; ?>

                </tbody>

            </table>

        </div>

    </div>

</div>