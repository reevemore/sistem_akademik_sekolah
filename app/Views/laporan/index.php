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

        <button class="btn btn-info">Tampilkan</button>
        <button type="button" onclick="window.print()" class="btn btn-secondary"><i class="fa fa-print"></i> Cetak</button>
    </form>

    <div class="text-center mb-4">
        <h3>LAPORAN NILAI SISWA</h3>
        <p>Sistem Akademik Sekolah</p>
    </div>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>NIS</th>
                <th>Nama</th>
                <th>Kelas</th>
                <th>Mapel</th>
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
                    <td><?= esc($r['nilai_akhir']) ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
        <tfoot>
            <tr>
                <th colspan="5" class="text-right">Rata-rata</th>
                <th><?= esc($rata) ?></th>
            </tr>
        </tfoot>
    </table>
</div>

<?= $this->endSection() ?>