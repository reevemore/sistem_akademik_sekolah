<?= $this->extend('layout/main') ?>
<?= $this->section('content') ?>

<div class="card-box">
    <div class="alert alert-info">Rumus: 30% Tugas + 30% UTS + 40% UAS.</div>

    <form method="post" action="<?= $row?site_url('nilai/'.$row['id_nilai']):site_url('nilai') ?>">
        <?= csrf_field() ?>
        <?php if($row): ?>
            <input type="hidden" name="_method" value="PUT">
        <?php endif; ?>

        <div class="form-group">
            <label>Siswa</label>
            <select class="form-control" name="id_siswa">
                <?php foreach($siswa as $s): ?>
                    <option value="<?= $s['id_siswa'] ?>" <?= (string)old('id_siswa',$row['id_siswa']??'')===(string)$s['id_siswa']?'selected':'' ?>><?= esc($s['nama_siswa']) ?> — <?= esc($s['nama_kelas']) ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="form-group">
            <label>Mata Pelajaran</label>
            <select class="form-control" name="id_mapel">
                <?php foreach($mapel as $m): ?>
                    <option value="<?= $m['id_mapel'] ?>" <?= (string)old('id_mapel',$row['id_mapel']??'')===(string)$m['id_mapel']?'selected':'' ?>><?= esc($m['nama_mapel']) ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="row">
            <div class="col-md-4 form-group">
                <label>Tugas</label>
                <input type="number" step="0.01" min="0" max="100" class="form-control" name="tugas" value="<?= old('tugas',$row['tugas']??'') ?>">
            </div>
            <div class="col-md-4 form-group">
                <label>UTS</label>
                <input type="number" step="0.01" min="0" max="100" class="form-control" name="uts" value="<?= old('uts',$row['uts']??'') ?>">
            </div>
            <div class="col-md-4 form-group">
                <label>UAS</label>
                <input type="number" step="0.01" min="0" max="100" class="form-control" name="uas" value="<?= old('uas',$row['uas']??'') ?>">
            </div>
        </div>

        <div class="form-group">
            <label>Semester</label>
            <select class="form-control" name="semester">
                <option value="1">1</option>
                <option value="2" <?= old('semester',$row['semester']??'1')==='2'?'selected':'' ?>>2</option>
            </select>
        </div>

        <button class="btn btn-primary">Simpan & Hitung</button>
        <a class="btn btn-secondary" href="<?= site_url('nilai') ?>">Batal</a>
    </form>
</div>

<?= $this->endSection() ?>