<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="<?= base_url('assets/css/Home.css') ?>">
    <title>RetoGizi</title>
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

                <div class="login-register d-flex">
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('login') ?>">Masuk</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('daftar') ?>">Daftar Sekarang</a>
                    </li>
                </div>
            </ul>
        </div>
    </div>
</nav>

<div class="container-fluid d-flex hero">
    <div class="content">
        <div class="top-bar">
            <img src="<?= base_url('assets/img/yellow-dot.svg') ?>" alt="">
            <img src="<?= base_url('assets/img/green-dot.svg') ?>" alt="">
            <img src="<?= base_url('assets/img/red-dot.svg') ?>" alt="">
        </div>
        <img src="<?= base_url('assets/img/hero.png') ?>" alt="">
    </div>
    
    <div class="hero-body d-flex flex-column justify-content-center">
        <h1>Solusi Kesehatan Gizi Terlengkap</h1>
        <p>
            Tingkatkan kualitas hidup anda dengan solusi kesehatan gizi
            terlengkap kami dan temukan potensi terbaik tubuh dan pikiran anda
            melalui gizi yang tepat.
        </p>
    </div>
</div>

<div class="container-fluid p-5 d-flex flex-column align-items-center text-center gap-3">
    <h2>Tentang Kami</h2>
    <p>
        Kami adalah Retogizi Indonesia, kami berinisiatif yang didedikasikan
        untuk menciptakan perubahan positif dalam masalah kekurangan gizi di
        Indonesia. Didirikan dengan visi menciptakan Indonesia yang lebih
        sehat, kami menawarkan solusi untuk meningkatkan kualitas gizi
        masyarakat.
    </p>

    <div class="stats-card">
        <div class="d-flex align-items-center gap-2">
            <img src="<?= base_url('assets/img/smile.svg') ?>" alt="">
            <div class="body d-flex flex-column">
                <h3>250+</h3>
                <p>Pelanggan Puas</p>
            </div>
        </div>

        <div class="d-flex align-items-center gap-2">
            <img src="<?= base_url('assets/img/files.svg') ?>" alt="">
            <div class="body d-flex flex-column">
                <h3>600+</h3>
                <p>Konsultasi Pelanggan</p>
            </div>
        </div>

        <div class="d-flex align-items-center gap-2">
            <img src="<?= base_url('assets/img/pizza.svg') ?>" alt="">
            <div class="body d-flex flex-column">
                <h3>1.8K+</h3>
                <p>Catering Terjual</p>
            </div>
        </div>

        <div class="d-flex align-items-center gap-2">
            <img src="<?= base_url('assets/img/users.svg') ?>" alt="">
            <div class="body d-flex flex-column">
                <h3>11K+</h3>
                <p>Pengikut Kami</p>
            </div>
        </div>
    </div>
</div>
</body>
</html>
