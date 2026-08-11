<h3><?= $title ?></h3>
 
<?php if (validation_errors()): ?>
    <div class="alert alert-danger"><?= validation_errors() ?></div>
<?php endif; ?>
 
<?php
$form_url = ($action === 'edit')
    ? base_url('admin/testimoni/update/' . $item->id)
    : base_url('admin/testimoni/store');
?>
 
<form action="<?= $form_url ?>" method="post" enctype="multipart/form-data">
 
    <div class="form-group">
        <label>Nama</label>
        <input type="text" name="name" class="form-control"
               value="<?= set_value('name', $item->name ?? '') ?>">
    </div>
 
    <div class="form-group">
        <label>Jabatan</label>
        <input type="text" name="position" class="form-control"
               value="<?= set_value('position', $item->position ?? '') ?>">
    </div>
 
    <div class="form-group">
        <label>Isi Testimoni</label>
        <textarea name="content" rows="4" class="form-control"><?= set_value('content', $item->content ?? '') ?></textarea>
    </div>
 
    <div class="form-group">
        <label>Foto <?= $action === 'edit' ? '(kosongkan kalau tidak ganti)' : '' ?></label>
        <input type="file" name="photo" class="form-control-file">
        <?php if ($action === 'edit' && !empty($item->photo)): ?>
            <div class="mt-2">
                <img src="<?= base_url('uploads/testimoni/' . $item->photo) ?>" width="80">
            </div>
        <?php endif; ?>
    </div>
 
    <div class="form-group form-check">
        <input type="checkbox" name="is_active" class="form-check-input" value="1"
               <?= (!isset($item) || $item->status === 'active') ? 'checked' : '' ?>>
        <label class="form-check-label">Aktif (tampil di website)</label>
    </div>
 
    <button type="submit" class="btn btn-primary">Simpan</button>
    <a href="<?= base_url('admin/testimoni') ?>" class="btn btn-secondary">Batal</a>
</form>
