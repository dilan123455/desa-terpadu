<h3><?= $title ?></h3>
 
<?php if ($this->session->flashdata('success')): ?>
    <div class="alert alert-success"><?= $this->session->flashdata('success') ?></div>
<?php endif; ?>
 
<?php if ($this->session->flashdata('error')): ?>
    <div class="alert alert-danger"><?= $this->session->flashdata('error') ?></div>
<?php endif; ?>
 
<a href="<?= base_url('admin/testimoni/create') ?>" class="btn btn-primary mb-3">+ Tambah Testimoni</a>
 
<table class="table table-bordered">
    <thead>
        <tr>
            <th>#</th>
            <th>Foto</th>
            <th>Nama</th>
            <th>Jabatan</th>
            <th>Isi Testimoni</th>
            <th>Status</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php if (empty($testimonies)): ?>
            <tr>
                <td colspan="7" class="text-center">Belum ada testimoni.</td>
            </tr>
        <?php else: ?>
            <?php $no = 1; ?>
            <?php foreach ($testimonies as $row): ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td>
                        <?php if (!empty($row->photo)): ?>
                            <img src="<?= base_url('uploads/testimoni/' . $row->photo) ?>" width="50">
                        <?php else: ?>
                            -
                        <?php endif; ?>
                    </td>
                    <td><?= html_escape($row->name) ?></td>
                    <td><?= html_escape($row->position) ?></td>
                    <td><?= html_escape(character_limiter($row->content, 60)) ?></td>
                    <td>
                        <?= ($row->status === 'active') ? '<span class="badge badge-success">Aktif</span>' : '<span class="badge badge-secondary">Nonaktif</span>' ?>
                    </td>
                    <td>
                        <a href="<?= base_url('admin/testimoni/edit/' . $row->id) ?>" class="btn btn-sm btn-warning">Edit</a>
                        <a href="<?= base_url('admin/testimoni/delete/' . $row->id) ?>"
                           class="btn btn-sm btn-danger"
                           onclick="return confirm('Yakin mau hapus testimoni ini?')">Hapus</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php endif; ?>
    </tbody>
</table>