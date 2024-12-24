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
    <?php if (session()->getFlashdata('success')): ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <?= session()->getFlashdata('success') ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>
    <div class="row mt-4">
        <?php if (!empty($reseps)): ?>
            <?php foreach ($reseps as $resep): ?>
                <div class="col-md-4 mb-4">
                    <div class="card">

                        <img src="<?= base_url($resep['foto_resep']) ?>" class="card-img-top" alt="<?= $resep['nama_resep'] ?>">

                        <div class="card-body">

                            <h5 class="card-title"><?= $resep['nama_resep'] ?></h5>

                            <p class="card-text">
                                <?= $resep['catatan_resep'] ?>
                            </p>

                            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editModal<?= $resep['id'] ?>">
                                Edit
                            </button>
                            <button class="btn btn-danger delete-btn" data-id="<?= $resep['id'] ?>">Hapus</button>

                        </div>
                    </div>
                </div>
                <div class="modal fade" id="editModal<?= $resep['id'] ?>" tabindex="-1" aria-labelledby="editModalLabel<?= $resep['id'] ?>" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="editModalLabel<?= $resep['id'] ?>">Edit Resep: <?= $resep['nama_resep'] ?></h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form id="editForm<?= $resep['id'] ?>" action="<?= base_url('/api/resep/update/' . $resep['id']) ?>" method="post" enctype="multipart/form-data">
                                    <!-- Nama Resep -->
                                    <div class="mb-3">
                                        <label for="nama_resep_<?= $resep['id'] ?>" class="form-label">Nama Resep</label>
                                        <input type="text" name="nama_resep" id="nama_resep_<?= $resep['id'] ?>" class="form-control" value="<?= $resep['nama_resep'] ?>" required>
                                    </div>

                                    <!-- Catatan Resep -->
                                    <div class="mb-3">
                                        <label for="catatan_resep_<?= $resep['id'] ?>" class="form-label">Catatan Resep</label>
                                        <textarea name="catatan_resep" id="catatan_resep_<?= $resep['id'] ?>" class="form-control" rows="3" required><?= $resep['catatan_resep'] ?></textarea>
                                    </div>

                                    <!-- Resep Makanan -->
                                    <div class="mb-3">
                                        <label for="resep_makanan_<?= $resep['id'] ?>" class="form-label">Resep Makanan</label>
                                        <textarea name="resep_makanan" id="resep_makanan_<?= $resep['id'] ?>" class="form-control" rows="3" required><?= $resep['resep_makanan'] ?? '' ?></textarea>
                                    </div>

                                    <!-- Foto Resep -->
                                    <div class="mb-3">
                                        <label for="foto_resep_<?= $resep['id'] ?>" class="form-label">Foto Resep</label>
                                        <input type="file" name="foto_resep" id="foto_resep_<?= $resep['id'] ?>" class="form-control">
                                    </div>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                <button type="submit" form="editForm<?= $resep['id'] ?>" class="btn btn-primary">Simpan Perubahan</button>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p class="text-center">Tidak ada resep yang tersedia saat ini.</p>
        <?php endif; ?>
    </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const deleteButtons = document.querySelectorAll('.delete-btn');

            deleteButtons.forEach(button => {
                button.addEventListener('click', () => {
                    const id = button.getAttribute('data-id');

                    if (confirm('Apakah Anda yakin ingin menghapus resep ini?')) {
                        fetch(`<?= base_url('/api/resep/delete/') ?>${id}`, {
                                method: 'DELETE',
                                headers: {
                                    'X-Requested-With': 'XMLHttpRequest',
                                },
                            })
                            .then(response => response.json())
                            .then(data => {
                                if (data.message) {
                                    alert(data.message);
                                    // Refresh halaman atau hapus elemen secara dinamis
                                    button.closest('.col-md-4').remove();
                                } else if (data.error) {
                                    alert(data.error);
                                }
                            })
                            .catch(error => {
                                console.error('Error:', error);
                                alert('Terjadi kesalahan saat menghapus data.');
                            });
                    }
                });
            });
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>


</body>

</html>