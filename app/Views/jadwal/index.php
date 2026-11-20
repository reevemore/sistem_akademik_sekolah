<?= $this->extend('layout/main') ?>

<?= $this->section('content') ?>

<div class="card-box">

    <div class="text-right mb-3">
        <a class="btn btn-primary" href="<?= site_url('jadwal/new') ?>">+ Tambah Jadwal</a>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Hari</th>
                    <th>Waktu</th>
                    <th>Kelas</th>
                    <th>Mapel</th>
                    <th>Guru</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach (array_values($rows) as $i => $r): ?>
                    <tr>
                        <td><?= $i + 1 ?></td>
                        <td><?= esc($r['hari']) ?></td>
                        <td><?= substr($r['jam_mulai'], 0, 5) ?> - <?= substr($r['jam_selesai'], 0, 5) ?></td>
                        <td><?= esc($r['nama_kelas']) ?></td>
                        <td><?= esc($r['nama_mapel']) ?></td>
                        <td><?= esc($r['nama_guru']) ?></td>
                        <td>
                            <a class="btn btn-sm btn-warning" href="<?= site_url('jadwal/' . $r['id_jadwal'] . '/edit') ?>">
                                <i class="fa fa-edit"></i>
                            </a>

                            <form style="display:inline" method="post" action="<?= site_url('jadwal/' . $r['id_jadwal']) ?>">
                                <?= csrf_field() ?>
                                <input type="hidden" name="_method" value="DELETE">
                                <button class="btn btn-sm btn-danger">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

</div>

<?= $this->endSection() ?>