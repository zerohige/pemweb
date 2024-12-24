<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
  <link rel="stylesheet" href="<?= base_url('assets/css/Kateringguide.css') ?>">

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="<?= base_url('assets/css/Katering.css') ?>">
  <title>Resep</title>

  <style>
    body {
      background-color: #011936;
    }
  </style>
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
              <a class="nav-link" aria-current="page" href="<?= base_url('/') ?>" style="color: #ED254E; font-weight: 700;">
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
                <img src="<?= base_url('assets/img/katering.svg') ?>" alt="">Resep
              </a>
            </li>

            <!-- Bagian untuk pengguna yang login -->
            <div class="d-flex align-items-center gap-2">
              <span>Halo, <?= session()->get('nama_depan') . ' ' . session()->get('nama_belakang') ?>!</span>
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
                <img src="<?= base_url('assets/img/katering.svg') ?>" alt="">Resep
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
    <h1 class="text-center" style="color: wheat">Daftar Resep</h1>
    <p class="text-center" style="color:wheat">
      Nikmati menu resep kami yang sehat dan lezat! Kami menyajikan hidangan segar dengan pilihan bahan-bahan berkualitas tinggi yang memanjakan lidah dan tubuh Anda.
    </p>

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

                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalResep<?= $resep['id'] ?>">
                  Lihat Resep
                </button>
              </div>
            </div>
          </div>
          <div class="modal fade" id="modalResep<?= $resep['id'] ?>" tabindex="-1" aria-labelledby="modalResepLabel<?= $resep['id'] ?>" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="modalResepLabel<?= $resep['id'] ?>"><?= $resep['nama_resep'] ?></h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <img src="<?= base_url($resep['foto_resep']) ?>" class="img-fluid mb-3" alt="<?= $resep['nama_resep'] ?>">
                  <p><strong>Deskripsi:</strong></p>
                  <p><?= $resep['catatan_resep'] ?></p>
                  <p><strong>Resep:</strong></p>
                  <p><?= $resep['resep_makanan'] ?? 'Belum ada informasi resep.' ?></p>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
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

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

  <div class="footer">
    <div class="top">
      <div class="logo-container">
        <div class="logo">
          <img class="img" src="<?= base_url('assets/img/mask.svg') ?>" />
          <div class="text">
            <div class="brand">RetoGizi</div>
          </div>
        </div>
      </div>
      <div class="menu">
        <div class="menu-item">
          <img class="img" src="<?= base_url('assets/img/homewith.svg') ?>" />
          <a class="text-wrapper" href="<?= base_url('/') ?>">Beranda</a>
        </div>
        <div class="menu-item">
          <img class="img" src="<?= base_url('assets/img/icon (2).svg') ?>" />
          <a class="text-wrapper" href="<?= base_url('artikel') ?>">Artikel</a>
        </div>
        <div class="menu-item">
          <img class="img" src="<?= base_url('assets/img/Icon.svg') ?>" />
          <a class="text-wrapper" href="<?= base_url('konsultasi') ?>">Tanya Dokter</a>
        </div>
        <div class="menu-item">
          <img class="img" src="<?= base_url('assets/img/icon (1).svg') ?>" />
          <a class="text-wrapper" href="<?= base_url('resep') ?>">Resep</a>
        </div>
        <div class="menu-item">
          <img class="img" src="<?= base_url('assets/img/user.svg') ?>" />
          <a class="text-wrapper" href="#">Tentang</a>
        </div>
      </div>
      <div class="social-icons">
        <img class="img" src="<?= base_url('assets/img/Vector.svg') ?>" />
        <img class="img" src="<?= base_url('assets/img/youtube.svg') ?>" />
        <img class="img" src="<?= base_url('assets/img/Vector-1.svg') ?>" />
        <img class="img" src="<?= base_url('assets/img/instagram.svg') ?>" />
      </div>
    </div>
    <p class="div">RetoGizi @ 2023. All rights reserved.</p>
  </div>
</body>

</html>