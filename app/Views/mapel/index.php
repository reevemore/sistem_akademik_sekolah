<?= $this->extend('layout/main') ?>
<?= $this->section('content') ?>
<div class="card-box">
    <div class="text-right mb-3">
        <a class="btn btn-primary" href="<?= site_url('mapel/new') ?>">+ Tambah Mapel</a>
    </div>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Kode</th>
                <th>Mata Pelajaran</th>
                <th>Guru Pengampu</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($rows as $i=>$r): ?>
            <tr>
                <td><?= $i+1 ?></td><td><?= esc($r['kode_mapel']) ?></td>
                <td><?= esc($r['nama_mapel']) ?></td>
                <td><?= esc($r['nama_guru']) ?></td>
                <td><a class="btn btn-sm btn-warning" href="<?= site_url('mapel/'.$r['id_mapel'].'/edit') ?>"><i class="fa fa-edit"></i></a>
                <form style="display:inline" method="post" action="<?= site_url('mapel/'.$r['id_mapel']) ?>" onsubmit="return confirm('Hapus mapel?')"><?= csrf_field() ?>
                    <input type="hidden" name="_method" value="DELETE">
                    <button class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>
                </form>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<?= $this->endSection() ?>