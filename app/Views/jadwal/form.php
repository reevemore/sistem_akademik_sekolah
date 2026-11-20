<?= $this->extend('layout/main') ?>

<?= $this->section('content') ?>

<div class="card-box">

    <form method="post" action="<?= $row ? site_url('jadwal/' . $row['id_jadwal']) : site_url('jadwal') ?>">
        <?= csrf_field() ?>

        <?php if ($row): ?>
            <input type="hidden" name="_method" value="PUT">
        <?php endif; ?>

        <div class="form-group">
            <label>Kelas</label>
            <select class="form-control" name="id_kelas">
                <?php foreach ($kelas as $k): ?>
                    <option value="<?= $k['id_kelas'] ?>" <?= (string) old('id_kelas', $row['id_kelas'] ?? '') === (string) $k['id_kelas'] ? 'selected' : '' ?>>
                        <?= esc($k['nama_kelas']) ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="form-group">
            <label>Mata Pelajaran</label>
            <select class="form-control" name="id_mapel">
                <?php foreach ($mapel as $m): ?>
                    <option value="<?= $m['id_mapel'] ?>" <?= (string) old('id_mapel', $row['id_mapel'] ?? '') === (string) $m['id_mapel'] ? 'selected' : '' ?>>
                        <?= esc($m['nama_mapel']) ?> — <?= esc($m['nama_guru']) ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="form-group">
            <label>Hari</label>
            <select class="form-control" name="hari">
                <?php foreach (['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat'] as $h): ?>
                    <option <?= old('hari', $row['hari'] ?? 'Senin') === $h ? 'selected' : '' ?>>
                        <?= $h ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="row">
            <div class="col-md-6 form-group">
                <label>Jam Mulai</label>
                <input type="time" class="form-control" name="jam_mulai" value="<?= old('jam_mulai', $row['jam_mulai'] ?? '') ?>">
            </div>

            <div class="col-md-6 form-group">
                <label>Jam Selesai</label>
                <input type="time" class="form-control" name="jam_selesai" value="<?= old('jam_selesai', $row['jam_selesai'] ?? '') ?>">
            </div>
        </div>

        <button class="btn btn-primary">Simpan</button>
        <a class="btn btn-secondary" href="<?= site_url('jadwal') ?>">Batal</a>

    </form>

</div>

<?= $this->endSection() ?>