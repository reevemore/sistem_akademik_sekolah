<?= $this->extend('layout/main') ?>

<?= $this->section('content') ?>
<div class="card-box">
    <div class="text-right mb-3">
        <a class="btn btn-primary" href="<?= site_url('guru/new') ?>">
            <i class="fa fa-plus"></i> Tambah Guru
        </a>
    </div>
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>NIP</th>
                    <th>Nama Guru</th>
                    <th>JK</th>
                    <th>No HP</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($rows as $i => $r): ?>
                    <tr>
                        <td><?= $i + 1 ?></td>
                        <td><?= esc($r['nip']) ?></td>
                        <td><?= esc($r['nama_guru']) ?></td>
                        <td><?= $r['jenis_kelamin'] === 'L' ? 'Laki-laki' : 'Perempuan' ?></td>
                        <td><?= esc($r['no_hp']) ?></td>
                        <td>
                            <a class="btn btn-sm btn-warning" href="<?= site_url('guru/'.$r['id_guru'].'/edit') ?>">
                                <i class="fa fa-edit"></i>
                            </a> 
                            <form style="display:inline" method="post" action="<?= site_url('guru/'.$r['id_guru']) ?>" onsubmit="return confirm('Hapus guru?')">
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