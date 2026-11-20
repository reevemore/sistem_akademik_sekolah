<?= $this->extend('layout/main') ?>

<?= $this->section('content') ?>
<div class="card-box">
    <form method="post" action="<?= $row ? site_url('guru/'.$row['id_guru']) : site_url('guru') ?>">
        <?= csrf_field() ?>
        
        <?php if($row): ?>
            <input type="hidden" name="_method" value="PUT">
        <?php endif; ?>
        
        <div class="form-group">
            <label>NIP *</label>
            <input class="form-control" name="nip" value="<?= old('nip', $row['nip'] ?? '') ?>" required>
        </div>
        
        <div class="form-group">
            <label>Nama Guru *</label>
            <input class="form-control" name="nama_guru" value="<?= old('nama_guru', $row['nama_guru'] ?? '') ?>" required>
        </div>
        
        <div class="form-group">
            <label>Jenis Kelamin *</label>
            <select class="form-control" name="jenis_kelamin">
                <option value="L" <?= old('jenis_kelamin', $row['jenis_kelamin'] ?? 'L') === 'L' ? 'selected' : '' ?>>Laki-laki</option>
                <option value="P" <?= old('jenis_kelamin', $row['jenis_kelamin'] ?? '') === 'P' ? 'selected' : '' ?>>Perempuan</option>
            </select>
        </div>
        
        <div class="form-group">
            <label>No HP</label>
            <input class="form-control" name="no_hp" value="<?= old('no_hp', $row['no_hp'] ?? '') ?>">
        </div>
        
        <button class="btn btn-primary">Simpan</button> 
        <a class="btn btn-secondary" href="<?= site_url('guru') ?>">Batal</a>
    </form>
</div>
<?= $this->endSection() ?>