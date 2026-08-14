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
            background: #f3f4f6;
            color: #1f2937;
        }

        /* ================= SIDEBAR ================= */

        .sidebar {
            width: 230px;
            background: #ffffff;
            border-right: 1px solid #e5e7eb;
            min-height: 100vh;
            position: fixed;
            left: 0;
            top: 0;
            display: flex;
            flex-direction: column;
        }

        .logo-area {
            height: 72px;
            padding: 15px 18px;
            border-bottom: 1px solid #e5e7eb;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .logo {
            width: 40px;
            height: 40px;
            background: #CC4B4B;
            color: white;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
            font-weight: bold;
        }

        .logo-text h2 {
            margin: 0;
            font-size: 14px;
            color: #172554;
        }

        .logo-text p {
            margin: 3px 0 0;
            font-size: 10px;
            color: #64748b;
        }

        .menu {
            padding: 22px 12px;
            flex: 1;
        }

        .menu-title {
            font-size: 10px;
            color: #94a3b8;
            text-transform: uppercase;
            letter-spacing: .5px;
            margin: 0 10px 10px;
        }

        .menu a {
            display: flex;
            align-items: center;
            gap: 11px;
            padding: 11px 13px;
            margin-bottom: 4px;
            border-radius: 9px;
            text-decoration: none;
            color: #475569;
            font-size: 13px;
            transition: .2s;
        }

        .menu a:hover {
            background: #fbe8e8;
            color: #CC4B4B;
        }

        .menu a.active {
            background: #fbe8e8;
            color: #CC4B4B;
            font-weight: 600;
        }

        .menu-icon {
            width: 20px;
            text-align: center;
            font-size: 15px;
        }

        /* ================= LOGOUT ================= */

        .logout {
            padding: 15px 12px;
            border-top: 1px solid #e5e7eb;
        }

        .logout a {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 11px 13px;
            border-radius: 9px;
            color: #dc2626;
            text-decoration: none;
            font-size: 13px;
            font-weight: 500;
        }

        .logout a:hover {
            background: #fef2f2;
        }

        /* ================= MAIN ================= */

        .main {
            margin-left: 230px;
            min-height: 100vh;
        }

        /* ================= TOPBAR ================= */

        .topbar {
            height: 72px;
            background: white;
            border-bottom: 1px solid #e5e7eb;
            padding: 0 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .topbar-title h1 {
            margin: 0;
            font-size: 22px;
            color: #172033;
        }

        .topbar-title p {
            margin: 4px 0 0;
            color: #64748b;
            font-size: 12px;
        }

        .admin-profile {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .admin-info {
            text-align: right;
        }

        .admin-info strong {
            display: block;
            font-size: 12px;
            color: #1e293b;
        }

        .admin-info span {
            font-size: 10px;
            color: #64748b;
        }

        .avatar {
            width: 34px;
            height: 34px;
            background: #CC4B4B;
            color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 13px;
            font-weight: bold;
        }

        /* ================= CONTENT ================= */

        .content {
            padding: 30px;
        }

        .page-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 20px;
            margin-bottom: 25px;
        }

        .page-header h2 {
            margin: 0;
            font-size: 25px;
            color: #172033;
        }

        .page-header p {
            margin: 7px 0 0;
            color: #64748b;
            font-size: 13px;
        }

        /* ================= BUTTON ================= */

        .btn-add {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 10px 16px;
            background: #CC4B4B;
            color: white;
            text-decoration: none;
            border-radius: 9px;
            font-size: 12px;
            font-weight: 600;
            box-shadow: 0 3px 8px rgba(204, 75, 75, .2);
            transition: .2s;
            white-space: nowrap;
        }

        .btn-add:hover {
            background: #b83f3f;
            transform: translateY(-1px);
        }

        /* ================= ALERT ================= */

        .alert {
            padding: 13px 16px;
            margin-bottom: 20px;
            border-radius: 10px;
            font-size: 13px;
        }

        .alert-success {
            background: #ecfdf3;
            color: #166534;
            border: 1px solid #bbf7d0;
        }

        .alert-error {
            background: #fef2f2;
            color: #991b1b;
            border: 1px solid #fecaca;
        }

        /* ================= CARD ================= */

        .card {
            background: white;
            border: 1px solid #e5e7eb;
            border-radius: 15px;
            box-shadow: 0 3px 12px rgba(0, 0, 0, .04);
            overflow: hidden;
        }

        .card-header {
            padding: 20px 23px;
            border-bottom: 1px solid #edf0f2;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .card-header-left {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .card-icon {
            width: 40px;
            height: 40px;
            background: #fbe8e8;
            color: #CC4B4B;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 18px;
        }

        .card-header h3 {
            margin: 0;
            font-size: 16px;
            color: #1e293b;
        }

        .card-header p {
            margin: 4px 0 0;
            font-size: 11px;
            color: #94a3b8;
        }

        /* ================= TABLE ================= */

        .table-wrapper {
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            font-size: 13px;
        }

        thead tr {
            background: #fafafa;
        }

        th {
            padding: 13px 14px;
            border-bottom: 1px solid #e5e7eb;
            color: #64748b;
            font-size: 11px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: .3px;
            white-space: nowrap;
        }

        th.left {
            text-align: left;
        }

        th.center {
            text-align: center;
        }

        td {
            padding: 14px;
            border-bottom: 1px solid #f1f5f9;
            color: #475569;
            vertical-align: middle;
        }

        tbody tr {
            transition: .15s;
        }

        tbody tr:hover {
            background: #fffafa;
        }

        tbody tr:last-child td {
            border-bottom: none;
        }

        .number {
            text-align: center;
            color: #94a3b8;
            font-weight: 600;
        }

        /* ================= PHOTO ================= */

        .photo-wrapper {
            text-align: center;
        }

        .photo {
            width: 48px;
            height: 48px;
            object-fit: cover;
            border-radius: 50%;
            border: 2px solid #f1f5f9;
        }

        .no-photo {
            width: 48px;
            height: 48px;
            border-radius: 50%;
            background: #f8fafc;
            border: 1px solid #e2e8f0;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            color: #94a3b8;
            font-size: 11px;
        }

        /* ================= NAME ================= */

        .name {
            font-weight: 600;
            color: #1e293b;
        }

        .position {
            color: #64748b;
        }

        /* ================= CONTENT ================= */

        .testimonial-content {
            max-width: 350px;
            line-height: 1.6;
            color: #64748b;
        }

        /* ================= STATUS ================= */

        .status {
            display: inline-flex;
            align-items: center;
            gap: 5px;
            padding: 5px 10px;
            border-radius: 20px;
            font-size: 11px;
            font-weight: 600;
        }

        .status-active {
            background: #ecfdf3;
            color: #15803d;
        }

        .status-inactive {
            background: #f1f5f9;
            color: #64748b;
        }

        .status-dot {
            width: 6px;
            height: 6px;
            border-radius: 50%;
            background: currentColor;
        }

        /* ================= ACTION ================= */

        .actions {
            text-align: center;
            white-space: nowrap;
        }

        .action-btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 7px 10px;
            margin: 2px;
            border-radius: 7px;
            text-decoration: none;
            font-size: 11px;
            font-weight: 600;
            transition: .15s;
        }

        .btn-detail {
            background: #e8f7fa;
            color: #087990;
        }

        .btn-detail:hover {
            background: #cff4fc;
        }

        .btn-edit {
            background: #fff8df;
            color: #a16207;
        }

        .btn-edit:hover {
            background: #fef3c7;
        }

        .btn-delete {
            background: #fef2f2;
            color: #dc2626;
        }

        .btn-delete:hover {
            background: #fee2e2;
        }

        /* ================= EMPTY ================= */

        .empty {
            padding: 50px 20px;
            text-align: center;
        }

        .empty-icon {
            width: 60px;
            height: 60px;
            margin: 0 auto 15px;
            border-radius: 50%;
            background: #fbe8e8;
            color: #CC4B4B;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 25px;
        }

        .empty strong {
            display: block;
            color: #334155;
            font-size: 14px;
        }

        .empty p {
            margin: 7px 0 0;
            color: #94a3b8;
            font-size: 12px;
        }

        /* ================= FOOTER ================= */

        .footer {
            margin-top: 30px;
            padding: 18px 0;
            border-top: 1px solid #e5e7eb;
            color: #94a3b8;
            font-size: 11px;
            display: flex;
            justify-content: space-between;
        }

        /* ================= RESPONSIVE ================= */

        @media (max-width: 900px) {

            .sidebar {
                width: 70px;
            }

            .logo-text,
            .menu-title,
            .menu a span:not(.menu-icon),
            .logout a span:not(.menu-icon) {
                display: none;
            }

            .logo-area {
                justify-content: center;
                padding: 15px 5px;
            }

            .menu a {
                justify-content: center;
                padding: 12px;
            }

            .logout a {
                justify-content: center;
            }

            .main {
                margin-left: 70px;
            }

            .content {
                padding: 20px;
            }
        }

        @media (max-width: 650px) {

            .page-header {
                flex-direction: column;
                align-items: flex-start;
            }

            .admin-info {
                display: none;
            }

            .topbar {
                padding: 0 18px;
            }

            .topbar-title h1 {
                font-size: 18px;
            }

            .content {
                padding: 15px;
            }

            .card-header {
                padding: 16px;
            }
        }
    </style>

</head>

<body>


    <!-- ================= SIDEBAR ================= -->

    <aside class="sidebar">

        <!-- Logo -->
        <div class="logo-area">

            <div class="logo">
                D
            </div>

            <div class="logo-text">

                <h2>
                    Desa Terpadu
                </h2>

                <p>
                    Admin Panel
                </p>

            </div>

        </div>


        <!-- Menu -->
        <nav class="menu">

            <p class="menu-title">
                Menu Utama
            </p>


            <!-- Dashboard -->
            <a href="<?= site_url('admin/dashboard'); ?>">

                <span class="menu-icon">⌂</span>

                <span>
                    Dashboard
                </span>

            </a>


            <!-- Artikel -->
            <a href="<?= site_url('admin/articles'); ?>">

                <span class="menu-icon">📰</span>

                <span>
                    Artikel
                </span>

            </a>


            <!-- Testimoni -->
            <a
                href="<?= site_url('admin/testimoni'); ?>"
                class="active"
            >

                <span class="menu-icon">💬</span>

                <span>
                    Testimoni
                </span>

            </a>


            <!-- FAQ -->
            <a href="<?= site_url('admin/faq'); ?>">

                <span class="menu-icon">❓</span>

                <span>
                    FAQ
                </span>

            </a>


            <!-- Contact -->
            <a href="<?= site_url('admin/contact_messages'); ?>">

                <span class="menu-icon">✉️</span>

                <span>
                    Contact
                </span>

            </a>


            <p
                class="menu-title"
                style="margin-top: 25px;"
            >
                Konten Website
            </p>


            <!-- About -->
            <a href="<?= site_url('admin/about'); ?>">

                <span class="menu-icon">ℹ️</span>

                <span>
                    About
                </span>

            </a>


            <!-- Features -->
            <a href="<?= site_url('admin/features'); ?>">

                <span class="menu-icon">⭐</span>

                <span>
                    Features
                </span>

            </a>


            <!-- Implementation -->
            <a href="<?= site_url('admin/implementation'); ?>">

                <span class="menu-icon">⚙️</span>

                <span>
                    Implementation
                </span>

            </a>

        </nav>


        <!-- Logout -->
        <div class="logout">

            <a href="<?= site_url('auth/logout'); ?>">

                <span class="menu-icon">↪</span>

                <span>
                    Logout
                </span>

            </a>

        </div>

    </aside>



    <!-- ================= MAIN ================= -->

    <main class="main">


        <!-- Topbar -->
        <header class="topbar">

            <div class="topbar-title">

                <h1>
                    Testimoni
                </h1>

                <p>
                    Kelola testimoni masyarakat Desa Terpadu
                </p>

            </div>


            <div class="admin-profile">

                <div class="admin-info">

                    <strong>
                        Administrator
                    </strong>

                    <span>
                        Admin Panel
                    </span>

                </div>

                <div class="avatar">
                    A
                </div>

            </div>

        </header>



        <!-- ================= CONTENT ================= -->

        <section class="content">


            <!-- Page Header -->
            <div class="page-header">

                <div>

                    <h2>
                        Kelola Testimoni
                    </h2>

                    <p>
                        Kelola testimoni masyarakat yang ditampilkan
                        pada website Desa Terpadu.
                    </p>

                </div>


                <!-- Tambah -->
                <a
                    href="<?= base_url('admin/testimoni/create'); ?>"
                    class="btn-add"
                >
                    <span>+</span>
                    Tambah Testimoni
                </a>

            </div>



            <!-- ================= ALERT SUCCESS ================= -->

            <?php if ($this->session->flashdata('success')): ?>

                <div class="alert alert-success">

                    ✓
                    <?= $this->session->flashdata('success'); ?>

                </div>

            <?php endif; ?>



            <!-- ================= ALERT ERROR ================= -->

            <?php if ($this->session->flashdata('error')): ?>

                <div class="alert alert-error">

                    ⚠
                    <?= $this->session->flashdata('error'); ?>

                </div>

            <?php endif; ?>



            <!-- ================= TABLE CARD ================= -->

            <div class="card">


                <!-- Card Header -->
                <div class="card-header">

                    <div class="card-header-left">

                        <div class="card-icon">
                            💬
                        </div>

                        <div>

                            <h3>
                                Daftar Testimoni
                            </h3>

                            <p>
                                Data testimoni yang tersimpan di sistem
                            </p>

                        </div>

                    </div>

                </div>



                <!-- Table -->
                <div class="table-wrapper">

                    <table>

                        <thead>

                            <tr>

                                <th class="center">
                                    #
                                </th>

                                <th class="center">
                                    Foto
                                </th>

                                <th class="left">
                                    Nama
                                </th>

                                <th class="left">
                                    Jabatan
                                </th>

                                <th class="left">
                                    Isi Testimoni
                                </th>

                                <th class="center">
                                    Status
                                </th>

                                <th class="center">
                                    Aksi
                                </th>

                            </tr>

                        </thead>


                        <tbody>


                            <?php if (empty($testimonies)): ?>


                                <!-- Empty -->
                                <tr>

                                    <td colspan="7">

                                        <div class="empty">

                                            <div class="empty-icon">
                                                💬
                                            </div>

                                            <strong>
                                                Belum Ada Testimoni
                                            </strong>

                                            <p>
                                                Belum terdapat data testimoni
                                                yang tersimpan.
                                            </p>

                                        </div>

                                    </td>

                                </tr>


                            <?php else: ?>


                                <?php $no = 1; ?>


                                <?php foreach ($testimonies as $row): ?>


                                    <tr>


                                        <!-- Nomor -->
                                        <td class="number">

                                            <?= $no++; ?>

                                        </td>



                                        <!-- Foto -->
                                        <td>

                                            <div class="photo-wrapper">

                                                <?php if (!empty($row->photo)): ?>

                                                    <img
                                                        src="<?= base_url('uploads/testimoni/' . $row->photo); ?>"
                                                        alt="<?= html_escape($row->name); ?>"
                                                        class="photo"
                                                    >

                                                <?php else: ?>

                                                    <span class="no-photo">
                                                        —
                                                    </span>

                                                <?php endif; ?>

                                            </div>

                                        </td>



                                        <!-- Nama -->
                                        <td>

                                            <span class="name">
                                                <?= html_escape($row->name); ?>
                                            </span>

                                        </td>



                                        <!-- Jabatan -->
                                        <td>

                                            <span class="position">
                                                <?= html_escape($row->position); ?>
                                            </span>

                                        </td>



                                        <!-- Isi -->
                                        <td>

                                            <div class="testimonial-content">

                                                <?= html_escape(
                                                    character_limiter($row->content, 80)
                                                ); ?>

                                            </div>

                                        </td>



                                        <!-- Status -->
                                        <td style="text-align: center;">

                                            <?php if ($row->status === 'active'): ?>

                                                <span class="status status-active">

                                                    <span class="status-dot"></span>

                                                    Aktif

                                                </span>

                                            <?php else: ?>

                                                <span class="status status-inactive">

                                                    <span class="status-dot"></span>

                                                    Nonaktif

                                                </span>

                                            <?php endif; ?>

                                        </td>



                                        <!-- Aksi -->
                                        <td class="actions">


                                            <!-- Detail -->
                                            <a
                                                href="<?= base_url('admin/testimoni/detail/' . $row->id); ?>"
                                                class="action-btn btn-detail"
                                            >
                                                Detail
                                            </a>


                                            <!-- Edit -->
                                            <a
                                                href="<?= base_url('admin/testimoni/edit/' . $row->id); ?>"
                                                class="action-btn btn-edit"
                                            >
                                                Edit
                                            </a>


                                            <!-- Hapus -->
                                            <a
                                                href="<?= base_url('admin/testimoni/delete/' . $row->id); ?>"
                                                onclick="return confirm('Yakin ingin menghapus testimoni ini?');"
                                                class="action-btn btn-delete"
                                            >
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



            <!-- Footer -->
           <div class="footer">

                <span>
                    © <?= date('Y'); ?> Desa Terpadu
                </span>

                <span>
                    Admin Panel
                </span>

            </div>


        </section>

    </main>

</body>

</html>