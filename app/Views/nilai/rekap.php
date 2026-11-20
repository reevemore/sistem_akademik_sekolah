<?= $this->extend('layout/main') ?>
<?= $this->section('content') ?>

<div class="card-box">
    <form class="form-inline no-print mb-3" method="get">
        <select class="form-control mr-2" name="kelas">
            <option value="">Semua Kelas</option>
            <?php foreach($kelas as $k): ?>
                <option value="<?= $k['id_kelas'] ?>" <?= (string)$filterKelas===(string)$k['id_kelas']?'selected':'' ?>><?= esc($k['nama_kelas']) ?></option>
            <?php endforeach; ?>
        </select>

        <select class="form-control mr-2" name="mapel">
            <option value="">Semua Mapel</option>
            <?php foreach($mapel as $m): ?>
                <option value="<?= $m['id_mapel'] ?>" <?= (string)$filterMapel===(string)$m['id_mapel']?'selected':'' ?>><?= esc($m['nama_mapel']) ?></option>
            <?php endforeach; ?>
        </select>

        <button class="btn btn-info">Filter</button>
    </form>

    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>NIS</th>
                    <th>Nama Siswa</th>
                    <th>Kelas</th>
                    <th>Mapel</th>
                    <th>Tugas</th>
                    <th>UTS</th>
                    <th>UAS</th>
                    <th>Nilai Akhir</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($rows as $i=>$r): ?>
                    <tr>
                        <td><?= $i+1 ?></td>
                        <td><?= esc($r['nis']) ?></td>
                        <td><?= esc($r['nama_siswa']) ?></td>
                        <td><?= esc($r['nama_kelas']) ?></td>
                        <td><?= esc($r['nama_mapel']) ?></td>
                        <td><?= esc($r['tugas']) ?></td>
                        <td><?= esc($r['uts']) ?></td>
                        <td><?= esc($r['uas']) ?></td>
                        <td><strong><?= esc($r['nilai_akhir']) ?></strong></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<?= $this->endSection() ?>