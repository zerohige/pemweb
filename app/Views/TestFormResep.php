<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="<?= base_url('assets/css/Konsultasiguide.css') ?>">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="<?= base_url('assets/css/Konsultasi.css') ?>">
    <link href="<?= base_url('assets/css/c_top.css') ?>" rel="stylesheet" />
    <title>Tambah/Update Resep</title>
</head>

<body>
    <?php if (session()->get('logged_in')): ?>
        <!-- Navbar untuk pengguna yang sudah login -->
        <nav class="navbar navbar-expand-lg bg-body-tertiary px-5">
            <div class="container-fluid">
                <div class="navbar-brand">
                    <img src="<?= base_url('assets/img/navbar.svg') ?>" alt="">
                    <a class="navbar-brand" href="<?= base_url('/') ?>">Reto<span>Gizi</span></a>
                </div>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                    <ul class="navbar-nav gap-2">



                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="<?= base_url('/admin/dashboard') ?>">
                                Jadwal Konsultasi
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="<?= base_url('/testi') ?>">
                                Tambah Resep
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="<?= base_url('/admin/daftar-resep') ?>">
                                Daftar Resep
                            </a>
                        </li>
                        <!-- Bagian untuk pengguna yang login -->
                        <div class="d-flex align-items-center gap-2">
                            <span>Halo, <?= session()->get('admin_name') . ' ' ?>!</span>
                            <a href="<?= base_url('logout') ?>" class="nav-link">Logout</a>
                        </div>
                    </ul>
                </div>
            </div>
        </nav>
    <?php else: ?>
        <!-- Navbar untuk pengguna yang belum login -->
        <nav class="navbar navbar-expand-lg bg-body-tertiary px-5">
            <div class="container-fluid">
                <div class="navbar-brand">
                    <img src="<?= base_url('assets/img/navbar.svg') ?>" alt="">
                    <a class="navbar-brand" href="<?= base_url('/') ?>">Reto<span>Gizi</span></a>
                </div>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                    <ul class="navbar-nav gap-2">
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="<?= base_url('/') ?>">
                                <img src="<?= base_url('assets/img/beranda.svg') ?>" alt="">Beranda
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= base_url('artikel') ?>">
                                <img src="<?= base_url('assets/img/artikel.svg') ?>" alt="">Artikel
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= base_url('konsultasi') ?>">
                                <img src="<?= base_url('assets/img/tanya-dokter.svg') ?>" alt="">Tanya Dokter
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= base_url('resep') ?>">
                                <img src="<?= base_url('assets/img/katering.svg') ?>" alt="">Tambah
                            </a>
                        </li>

                        <!-- Bagian untuk pengguna yang belum login -->
                        <li class="nav-item">
                            <a class="masuk nav-link" href="<?= base_url('login') ?>">Masuk</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= base_url('register') ?>">Daftar Sekarang</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    <?php endif; ?>
    <div class="container mt-5">
        <?php if (session()->getFlashdata('success')): ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <?= session()->getFlashdata('success') ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>

        <div class="card shadow-lg">
            <div class="card-header bg-primary text-white">
                <h3 class="text-center mb-0">
                    <?= isset($resep) ? 'Update Resep' : 'Tambah Resep Baru' ?>
                </h3>
            </div>
            <div class="card-body">
                <form action="<?= isset($resep) ? base_url('/api/resep/update/' . $resep['id']) : base_url('/api/resep') ?>" method="post" enctype="multipart/form-data">
                    <!-- Nama Resep -->
                    <div class="mb-4">
                        <label for="nama_resep" class="form-label">Nama Resep</label>
                        <input type="text" name="nama_resep" id="nama_resep" class="form-control" required
                            value="<?= isset($resep) ? $resep['nama_resep'] : '' ?>" placeholder="Masukkan nama resep">
                    </div>

                    <div class="mb-4">
                        <label for="catatan_resep" class="form-label">Catatan Resep</label>
                        <textarea name="catatan_resep" id="catatan_resep" class="form-control" rows="5" required
                            placeholder="Masukkan deskripsi resep"><?= isset($resep) ? $resep['catatan_resep'] : '' ?></textarea>
                    </div>

                    <div class="mb-4">
                        <label for="resep_makanan" class="form-label">Resep Makanan</label>
                        <textarea name="resep_makanan" id="resep_makanan" class="form-control" rows="5" required
                            placeholder="masukan resep makanan"><?= isset($resep) ? $resep['resep_makanan'] : '' ?></textarea>
                    </div>
                  
                    <div class="mb-4">
                        <label for="foto_resep" class="form-label">Foto Resep</label>

                        <?php if (isset($resep['foto_resep']) && $resep['foto_resep']): ?>
                            <div class="mb-3 text-center">
                                <img src="<?= base_url($resep['foto_resep']) ?>" alt="Foto Resep" class="img-thumbnail" style="max-width: 200px; height: auto;">
                            </div>
                        <?php endif; ?>

                        <!-- Input untuk Mengunggah Foto Baru -->
                        <input type="file" name="foto_resep" id="foto_resep" class="form-control" accept="image/*">
                    </div>

                    <!-- Submit Button -->
                    <div class="text-center">
                        <button type="submit" class="btn btn-success px-5 py-2">
                            <?= isset($resep) ? 'Update Resep' : 'Simpan Resep' ?>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>