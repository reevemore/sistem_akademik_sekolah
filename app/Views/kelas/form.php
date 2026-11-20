<?= $this->extend('layout/main') ?>

<?= $this->section('content') ?>
<div class="card-box">
    <form method="post" action="<?= $row ? site_url('kelas/'.$row['id_kelas']) : site_url('kelas') ?>">
        <?= csrf_field() ?>
        
        <?php if($row): ?>
            <input type="hidden" name="_method" value="PUT">
        <?php endif; ?>
        
        <div class="form-group">
            <label>Nama Kelas *</label>
            <input class="form-control" name="nama_kelas" value="<?= old('nama_kelas', $row['nama_kelas'] ?? '') ?>" required>
        </div>
        
        <div class="form-group">
            <label>Wali Kelas</label>
            <input class="form-control" name="wali_kelas" value="<?= old('wali_kelas', $row['wali_kelas'] ?? '') ?>">
        </div>
        
        <div class="form-actions">
            <button class="btn btn-primary">
                <i class="fa fa-save"></i> Simpan
            </button>
            <a class="btn btn-secondary" href="<?= site_url('kelas') ?>">Batal</a>
        </div>
    </form>
</div>
<?= $this->endSection() ?>