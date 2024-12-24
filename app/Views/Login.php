<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=<nav class=" navbar navbar-expand-lg bg-body-tertiary px-5">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
  <link rel="stylesheet" href="<?= base_url('assets/css/Loginguide.css') ?>">

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="<?= base_url('assets/css/Login.css') ?>">


  <title>login</title>
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
            <a class="nav-link" href="<?= base_url('artikel.html') ?>">
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
              <a class="nav-link" href="<?= base_url('daftar') ?>">Daftar Sekarang</a>
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
          <div class="secondary-headline">Login Akun</div>
        </div>
      </div>
      <div class="form-fields">
        <form id="loginForm" method="post">
          <?= csrf_field() ?>
          <div class="fields-group"></div>
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
            <label for="loginAs" class="form-label">Login Sebagai</label>
            <select name="role" id="loginAs" class="form-select" required>
              <option value="user">User</option>
              <option value="admin">Admin</option>
            </select>
          </div>
          <div class="controls-with-label">
            <input type="checkbox" class="form-check-input" name="rememberMe" id="rememberMe">
            <label class="form-check-label" for="rememberMe">Ingatkan Saya</label>
          </div>
          <div class="buttons-group">
            <button type="submit" class="btn btn-primary">Masuk</button>
          </div>
        </form>

        <script>
          document.getElementById("loginForm").addEventListener("submit", function(event) {
            // Prevent default form submission
            event.preventDefault();

            // Get the role from the dropdown
            const role = document.getElementById("loginAs").value;

            // Set the form action based on the selected role
            if (role === "user") {
              this.action = "<?= base_url('/api/login') ?>";
            } else if (role === "admin") {
              this.action = "<?= base_url('/api/loginadmin') ?>";
            }

            // Submit the form
            this.submit();
          });
        </script>

      </div>
      <img class="sep" src="<?= base_url('assets/img/sep.svg') ?>" />
    </div>
    <img class="placeholder-picture" src="<?= base_url('assets/img/picture.png') ?>"></img>
  </div>

</body>

</html>