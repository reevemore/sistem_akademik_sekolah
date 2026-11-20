<?= $this->extend('layout/main') ?>

<?= $this->section('content') ?>
<div class="card-box">
    <div class="text-right mb-3">
        <a class="btn btn-primary" href="<?= site_url('kelas/new') ?>">
            <i class="fa fa-plus"></i> Tambah Kelas
        </a>
    </div>
    <div class="table-responsive">
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th width="60">No</th>
                    <th>Nama Kelas</th>
                    <th>Wali Kelas</th>
                    <th width="140">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php if(!$rows): ?>
                    <tr>
                        <td colspan="4" class="text-center">Belum ada data.</td>
                    </tr>
                <?php endif; ?>
                
                <?php foreach($rows as $i => $r): ?>
                    <tr>
                        <td><?= $i + 1 ?></td>
                        <td><?= esc($r['nama_kelas']) ?></td>
                        <td><?= esc($r['wali_kelas']) ?></td>
                        <td>
                            <a class="btn btn-sm btn-warning" href="<?= site_url('kelas/'.$r['id_kelas'].'/edit') ?>">
                                <i class="fa fa-edit"></i>
                            </a> 
                            <form class="d-inline" style="display:inline" method="post" action="<?= site_url('kelas/'.$r['id_kelas']) ?>" onsubmit="return confirm('Hapus data ini?')">
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