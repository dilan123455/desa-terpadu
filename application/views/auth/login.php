<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin - Desa Terpadu</title>
</head>
<body>

    <h2>Login Admin</h2>

    <?php if ($this->session->flashdata('error')): ?>
        <p style="color:red;">
            <?= $this->session->flashdata('error'); ?>
        </p>
    <?php endif; ?>

    <form action="<?= site_url('auth/process_login'); ?>" method="POST">

        <div>
            <label>Username</label>
            <input type="text" name="username" required>
        </div>

        <br>

        <div>
            <label>Password</label>
            <input type="password" name="password" required>
        </div>

        <br>

        <button type="submit">Login</button>

    </form>

</body>
</html>