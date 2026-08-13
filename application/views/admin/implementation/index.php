<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>
        Implementation - Desa Terpadu
    </title>


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


        /* =====================================================
           SIDEBAR
        ===================================================== */

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


        /* =====================================================
           MENU
        ===================================================== */

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


        /* =====================================================
           LOGOUT
        ===================================================== */

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


        /* =====================================================
           MAIN
        ===================================================== */

        .main {

            margin-left: 230px;

            min-height: 100vh;

        }


        /* =====================================================
           TOPBAR
        ===================================================== */

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


        /* =====================================================
           CONTENT
        ===================================================== */

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


        /* =====================================================
           BUTTON
        ===================================================== */

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

        }


        .btn-add:hover {

            background: #b83f3f;

            transform: translateY(-1px);

        }


        /* =====================================================
           ALERT
        ===================================================== */

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


        /* =====================================================
           CARD
        ===================================================== */

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


        /* =====================================================
           TABLE
        ===================================================== */

        .table-wrapper {

            width: 100%;

            overflow-x: auto;

        }


        table {

            width: 100%;

            min-width: 900px;

            border-collapse: collapse;

        }


        thead {

            background: #fafafa;

        }


        th {

            padding: 13px 14px;

            text-align: left;

            font-size: 11px;

            color: #64748b;

            font-weight: 700;

            text-transform: uppercase;

            letter-spacing: .3px;

            border-bottom: 1px solid #e5e7eb;

            white-space: nowrap;

        }


        td {

            padding: 14px;

            border-bottom: 1px solid #f1f5f9;

            vertical-align: middle;

            font-size: 13px;

            color: #475569;

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


        /* =====================================================
           IMAGE
        ===================================================== */

        .implementation-image {

            width: 80px;

            height: 60px;

            object-fit: cover;

            border-radius: 8px;

            display: block;

            border: 1px solid #e5e7eb;

        }


        .no-image {

            width: 80px;

            height: 60px;

            display: flex;

            align-items: center;

            justify-content: center;

            background: #f8fafc;

            color: #94a3b8;

            border: 1px solid #e2e8f0;

            border-radius: 8px;

            font-size: 10px;

            text-align: center;

        }


        /* =====================================================
           TITLE
        ===================================================== */

        .step-title {

            font-weight: 600;

            color: #1e293b;

            line-height: 1.5;

        }


        /* =====================================================
           DESCRIPTION
        ===================================================== */

        .description {

            max-width: 400px;

            color: #64748b;

            line-height: 1.6;

        }


        /* =====================================================
           ORDER
        ===================================================== */

        .order-badge {

            width: 30px;

            height: 30px;

            display: inline-flex;

            align-items: center;

            justify-content: center;

            background: #fbe8e8;

            color: #CC4B4B;

            border-radius: 8px;

            font-size: 12px;

            font-weight: 700;

        }


        /* =====================================================
           ACTIONS
        ===================================================== */

        .action-buttons {

            display: flex;

            gap: 6px;

            flex-wrap: wrap;

        }


        .action-btn {

            display: inline-flex;

            align-items: center;

            justify-content: center;

            padding: 7px 11px;

            border-radius: 7px;

            text-decoration: none;

            font-size: 11px;

            font-weight: 600;

            transition: .15s;

            white-space: nowrap;

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


        /* =====================================================
           EMPTY
        ===================================================== */

        .empty {

            padding: 60px 20px;

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


        /* =====================================================
           FOOTER
        ===================================================== */

        .footer {

            margin-top: 30px;

            padding: 18px 0;

            border-top: 1px solid #e5e7eb;

            color: #94a3b8;

            font-size: 11px;

            display: flex;

            justify-content: space-between;

        }


        /* =====================================================
           RESPONSIVE
        ===================================================== */

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

        }

    </style>

</head>


<body>


    <!-- =====================================================
         SIDEBAR
    ===================================================== -->

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

                <span class="menu-icon">
                    ⌂
                </span>

                <span>
                    Dashboard
                </span>

            </a>



            <!-- Artikel -->

            <a href="<?= site_url('admin/articles'); ?>">

                <span class="menu-icon">
                    📰
                </span>

                <span>
                    Artikel
                </span>

            </a>



            <!-- Testimoni -->

            <a href="<?= site_url('admin/testimoni'); ?>">

                <span class="menu-icon">
                    💬
                </span>

                <span>
                    Testimoni
                </span>

            </a>



            <!-- FAQ -->

            <a href="<?= site_url('admin/faq'); ?>">

                <span class="menu-icon">
                    ❓
                </span>

                <span>
                    FAQ
                </span>

            </a>



            <!-- Contact -->

            <a href="<?= site_url('admin/contact_messages'); ?>">

                <span class="menu-icon">
                    ✉️
                </span>

                <span>
                    Pesan Masuk
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

                <span class="menu-icon">
                    ℹ️
                </span>

                <span>
                    About
                </span>

            </a>



            <!-- Features -->

            <a href="<?= site_url('admin/features'); ?>">

                <span class="menu-icon">
                    ⭐
                </span>

                <span>
                    Features
                </span>

            </a>



            <!-- Implementation -->

            <a
                href="<?= site_url('admin/implementation'); ?>"
                class="active"
            >

                <span class="menu-icon">
                    ⚙️
                </span>

                <span>
                    Implementation
                </span>

            </a>


        </nav>



        <!-- Logout -->

        <div class="logout">

            <a href="<?= site_url('auth/logout'); ?>">

                <span class="menu-icon">
                    ↪
                </span>

                <span>
                    Logout
                </span>

            </a>

        </div>


    </aside>



    <!-- =====================================================
         MAIN
    ===================================================== -->

    <main class="main">



        <!-- =================================================
             TOPBAR
        ================================================= -->

        <header class="topbar">


            <div class="topbar-title">

                <h1>
                    Implementation
                </h1>

                <p>
                    Kelola proses implementasi Desa Terpadu
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



        <!-- =================================================
             CONTENT
        ================================================= -->

        <section class="content">



            <!-- Page Header -->

            <div class="page-header">


                <div>

                    <h2>
                        Proses Implementasi
                    </h2>

                    <p>
                        Kelola langkah-langkah implementasi
                        Desa Terpadu.
                    </p>

                </div>


            </div>



            <!-- =================================================
                 FLASH MESSAGE
            ================================================= -->

            <?php if ($this->session->flashdata('success')): ?>

                <div class="alert alert-success">

                    ✓

                    <?= html_escape(
                        $this->session->flashdata('success')
                    ); ?>

                </div>

            <?php endif; ?>



            <!-- =================================================
                 IMPLEMENTATION CARD
            ================================================= -->

            <div class="card">


                <?php if (!empty($implementation_steps)): ?>


                    <!-- Card Header -->

                    <div class="card-header">


                        <div class="card-icon">
                            ⚙️
                        </div>


                        <div>

                            <h3>
                                Daftar Proses Implementasi
                            </h3>

                            <p>
                                Langkah implementasi yang
                                ditampilkan pada website.
                            </p>

                        </div>


                    </div>



                    <!-- Table -->

                    <div class="table-wrapper">


                        <table>


                            <thead>

                                <tr>

                                    <th>
                                        No
                                    </th>

                                    <th>
                                        Gambar
                                    </th>

                                    <th>
                                        Judul
                                    </th>

                                    <th>
                                        Deskripsi
                                    </th>

                                    <th>
                                        Urutan
                                    </th>

                                    <th>
                                        Aksi
                                    </th>

                                </tr>

                            </thead>



                            <tbody>


                                <?php foreach (
                                    $implementation_steps
                                    as $step
                                ): ?>


                                    <tr>


                                        <!-- No -->

                                        <td>

                                            <span
                                                class="order-badge"
                                            >

                                                <?= $step->sort_order; ?>

                                            </span>

                                        </td>



                                        <!-- Image -->

                                        <td>


                                            <?php

                                            $image_path =
                                                FCPATH .
                                                'assets/uploads/implementation/' .
                                                $step->image;

                                            ?>


                                            <?php if (
                                                !empty($step->image) &&
                                                file_exists($image_path)
                                            ): ?>


                                                <img
                                                    src="<?= base_url(
                                                        'assets/uploads/implementation/' .
                                                        $step->image
                                                    ); ?>"
                                                    alt="<?= html_escape(
                                                        $step->title
                                                    ); ?>"
                                                    class="implementation-image"
                                                >


                                            <?php else: ?>


                                                <div class="no-image">

                                                    Tidak ada
                                                    gambar

                                                </div>


                                            <?php endif; ?>


                                        </td>



                                        <!-- Title -->

                                        <td>

                                            <div class="step-title">

                                                <?= html_escape(
                                                    $step->title
                                                ); ?>

                                            </div>

                                        </td>



                                        <!-- Description -->

                                        <td>

                                            <div class="description">

                                                <?= html_escape(
                                                    $step->description
                                                ); ?>

                                            </div>

                                        </td>



                                        <!-- Order -->

                                        <td>

                                            <span
                                                class="order-badge"
                                            >

                                                <?= $step->sort_order; ?>

                                            </span>

                                        </td>



                                        <!-- Actions -->

                                        <td>


                                            <div
                                                class="action-buttons"
                                            >


                                                <!-- Edit -->

                                                <a
                                                    href="<?= site_url(
                                                        'admin/implementation/edit/' .
                                                        $step->id
                                                    ); ?>"
                                                    class="action-btn btn-edit"
                                                >

                                                    Edit

                                                </a>



                                                <!-- Delete -->

                                                <a
                                                    href="<?= site_url(
                                                        'admin/implementation/delete/' .
                                                        $step->id
                                                    ); ?>"
                                                    class="action-btn btn-delete"
                                                    onclick="return confirm('Yakin ingin menghapus data ini?');"
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


                <?php else: ?>


                    <!-- Empty State -->

                    <div class="empty">


                        <div class="empty-icon">
                            ⚙️
                        </div>


                        <strong>
                            Belum Ada Data Implementation
                        </strong>


                        <p>
                            Belum terdapat data proses implementasi
                            yang tersimpan.
                        </p>


                    </div>


                <?php endif; ?>


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