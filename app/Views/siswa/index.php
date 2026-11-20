<?= $this->extend('layout/main') ?>

<?= $this->section('content') ?>
<div class="card-box">
    <div class="text-right mb-3">
        <a class="btn btn-primary" href="<?= site_url('siswa/new') ?>">
            <i class="fa fa-plus"></i> Tambah Siswa
        </a>
    </div>
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>NIS</th>
                    <th>Nama Siswa</th>
                    <th>JK</th>
                    <th>Kelas</th>
                    <th>Alamat</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($rows as $i => $r): ?>
                    <tr>
                        <td><?= $i + 1 ?></td>
                        <td><?= esc($r['nis']) ?></td>
                        <td><?= esc($r['nama_siswa']) ?></td>
                        <td><?= esc($r['jenis_kelamin']) ?></td>
                        <td><?= esc($r['nama_kelas']) ?></td>
                        <td><?= esc($r['alamat']) ?></td>
                        <td>
                            <a class="btn btn-sm btn-warning" href="<?= site_url('siswa/'.$r['id_siswa'].'/edit') ?>">
                                <i class="fa fa-edit"></i>
                            </a> 
                            <form style="display:inline" method="post" action="<?= site_url('siswa/'.$r['id_siswa']) ?>" onsubmit="return confirm('Hapus siswa?')">
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