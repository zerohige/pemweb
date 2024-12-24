<?php if (session()->getFlashdata('error')): ?>
    <div class="alert alert-danger">
        <?= session()->getFlashdata('error'); ?>
    </div>
<?php endif; ?>

<?php if (session()->getFlashdata('success')): ?>
    <div class="alert alert-success">
        <?= session()->getFlashdata('success'); ?>
    </div>
<?php endif; ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
  <link rel="stylesheet" href="<?= base_url('assets/css/Daftarguide.css') ?>">
  <link rel="stylesheet" href="<?= base_url('assets/css/Daftar.css') ?>">
  <title>Register</title>
</head>

<body>
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
              <img src="<?= base_url('assets/img/beranda.svg') ?>" alt="">Beranda</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?= base_url('artikel') ?>">
              <img src="<?= base_url('assets/img/artikel.svg') ?>" alt="">Artikel</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?= base_url('konsultasi') ?>">
              <img src="<?= base_url('assets/img/tanya-dokter.svg') ?>" alt="">Tanya Dokter</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?= base_url('resep') ?>">
              <img src="<?= base_url('assets/img/katering.svg') ?>" alt="">Resep</a>
          </li>
          <div class="login-register d-flex">
            <li class="nav-item">
              <a class="masuk nav-link" href="<?= base_url('login') ?>">Masuk</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?= base_url('daftar') ?>" style="background: #ED254E; color: #fff;">Daftar Sekarang</a>
            </li>
          </div>
        </ul>
      </div>
    </div>
  </nav>

  <div class="page-content">
    <div class="right-column">
      <div class="div">
        <div class="top">
          <div class="secondary-headline">Daftar Akun</div>
        </div>
      </div>
      <div class="form-fields">

        <form action="<?= base_url('/api/register') ?>" method="post">
          <?= csrf_field() ?>
          <div class="fields-group">
            <div class="text-field">
              <div class="label">Nama Depan</div>
              <input class="field" name="nama_depan" placeholder="Masukan Nama Depan" required>
              <?php if (isset($validation) && $validation->hasError('nama_depan')): ?>
                <div class="text-danger"><?= $validation->getError('nama_depan'); ?></div>
              <?php endif; ?>
            </div>
            <div class="text-field">
              <div class="label">Nama Belakang</div>
              <input class="field" name="nama_belakang" placeholder="Masukan Nama Belakang" required>
              <?php if (isset($validation) && $validation->hasError('nama_belakang')): ?>
                <div class="text-danger"><?= $validation->getError('nama_belakang'); ?></div>
              <?php endif; ?>
            </div>
          </div>
          <div class="text-field-2">
            <div class="label">Email</div>
            <input class="field" name="email" placeholder="Masukan Email" type="email" required>
            <?php if (isset($validation) && $validation->hasError('email')): ?>
              <div class="text-danger"><?= $validation->getError('email'); ?></div>
            <?php endif; ?>
          </div>
          <div class="text-field-2">
            <div class="label">Password</div>
            <input class="field" name="password" placeholder="Masukan Password" type="password" required>
            <?php if (isset($validation) && $validation->hasError('password')): ?>
              <div class="text-danger"><?= $validation->getError('password'); ?></div>
            <?php endif; ?>
          </div>
          <div class="controls-with-label">
            <input type="checkbox" class="form-check-input" name="rememberMe" id="rememberMe">
            <label class="form-check-label" for="rememberMe">Ingatkan Saya</label>
          </div>
          <div class="buttons-group">
            <button type="submit" class="btn btn-primary">Daftar</button>
          </div>
        </form>

      

      </div>
      <img class="sep" src="<?= base_url('assets/img/sep.svg') ?>" />
      <a href="<?= base_url('login') ?>" class="text-wrapper">Sudah memiliki akun?</a>
    </div>
    <img class="placeholder-picture" src="<?= base_url('assets/img/picture.png') ?>">
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  
</body>

</html>