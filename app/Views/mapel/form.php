<?= $this->extend('layout/main') ?>
<?= $this->section('content') ?>
<div class="card-box">
    <form method="post" action="<?= $row?site_url('mapel/'.$row['id_mapel']):site_url('mapel') ?>"><?= csrf_field() ?><?php if($row): ?>
        <input type="hidden" name="_method" value="PUT"><?php endif; ?>
        <div class="form-group">
            <label>Kode Mapel *</label>
            <input class="form-control" name="kode_mapel" value="<?= old('kode_mapel',$row['kode_mapel']??'') ?>" required>
        </div>
        <div class="form-group">
            <label>Nama Mata Pelajaran *</label>
            <input class="form-control" name="nama_mapel" value="<?= old('nama_mapel',$row['nama_mapel']??'') ?>" required>
        </div>
        <div class="form-group">
            <label>Guru Pengampu *</label>
            <select class="form-control" name="id_guru"><?php foreach($guru as $g): ?>
                <option value="<?= $g['id_guru'] ?>" <?= (string)old('id_guru',$row['id_guru']??'')===(string)$g['id_guru']?'selected':'' ?>><?= esc($g['nama_guru']) ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <button class="btn btn-primary">Simpan</button>
        <a class="btn btn-secondary" href="<?= site_url('mapel') ?>">Batal</a>
    </form>
</div>
<?= $this->endSection() ?>