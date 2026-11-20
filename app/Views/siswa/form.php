<?= $this->extend('layout/main') ?>

<?= $this->section('content') ?>
<div class="card-box">
    <form method="post" action="<?= $row ? site_url('siswa/'.$row['id_siswa']) : site_url('siswa') ?>">
        <?= csrf_field() ?>
        
        <?php if($row): ?>
            <input type="hidden" name="_method" value="PUT">
        <?php endif; ?>
        
        <div class="form-group">
            <label>NIS *</label>
            <input class="form-control" name="nis" value="<?= old('nis', $row['nis'] ?? '') ?>" required>
        </div>
        
        <div class="form-group">
            <label>Nama Siswa *</label>
            <input class="form-control" name="nama_siswa" value="<?= old('nama_siswa', $row['nama_siswa'] ?? '') ?>" required>
        </div>
        
        <div class="form-group">
            <label>Jenis Kelamin *</label>
            <select class="form-control" name="jenis_kelamin">
                <option value="L" <?= old('jenis_kelamin', $row['jenis_kelamin'] ?? 'L') === 'L' ? 'selected' : '' ?>>Laki-laki</option>
                <option value="P" <?= old('jenis_kelamin', $row['jenis_kelamin'] ?? '') === 'P' ? 'selected' : '' ?>>Perempuan</option>
            </select>
        </div>
        
        <div class="form-group">
            <label>Kelas *</label>
            <select class="form-control" name="id_kelas" required>
                <?php foreach($kelas as $k): ?>
                    <option value="<?= $k['id_kelas'] ?>" <?= (string)old('id_kelas', $row['id_kelas'] ?? '') === (string)$k['id_kelas'] ? 'selected' : '' ?>>
                        <?= esc($k['nama_kelas']) ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>
        
        <div class="form-group">
            <label>Alamat</label>
            <textarea class="form-control" name="alamat"><?= old('alamat', $row['alamat'] ?? '') ?></textarea>
        </div>
        
        <button class="btn btn-primary">Simpan</button> 
        <a class="btn btn-secondary" href="<?= site_url('siswa') ?>">Batal</a>
    </form>
</div>
<?= $this->endSection() ?>