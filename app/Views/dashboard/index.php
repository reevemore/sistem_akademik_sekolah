<?= $this->extend('layout/main') ?>

<?= $this->section('content') ?>
<div class="row">
    <div class="col-md-4">
        <div class="card-box stat-card">
            <div class="stat-number"><?= $counts['siswa'] ?></div>
            <div>Data Siswa</div>
        </div>
    </div>
    
    <div class="col-md-4">
        <div class="card-box stat-card">
            <div class="stat-number"><?= $counts['guru'] ?></div>
            <div>Data Guru</div>
        </div>
    </div>
    
    <div class="col-md-4">
        <div class="card-box stat-card">
            <div class="stat-number"><?= $counts['mapel'] ?></div>
            <div>Mata Pelajaran</div>
        </div>
    </div>
</div>

<div class="card-box">
    <h4>Selamat datang, <?= esc(session('nama')) ?></h4>
    <p>Dashboard menampilkan ringkasan jumlah data dari database.</p>
</div>
<?= $this->endSection() ?>