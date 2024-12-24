<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="<?= base_url('assets/css/Artikel.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/c_top.css') ?>">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <title>Artikel</title>
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

    <div class="content-section">
        <div class="wrapper">Artikel Terbaru</div>
        <div class="auto-layout">
            <div class="auto-layout-vertical">
                <div class="div">
                    <p class="p">Gizi Seimbang Untuk Gaya Hidup Yang Sehat</p>
                    <p class="text-wrapper-2">
                        Gizi adalah zat makanan pokok yang diperlukan bagi pertumbuhan dan kesehatan tubuh. Gizi seimbang adalah
                        susunan makanan sehari-hari yang mengandung zat gizi dalam jenis dan jumlah yang sesuai dengan kebutuhan
                        tubuh yaitu...
                    </p>
                </div>
                <div class="style-outlined">
                    <div class="text-wrapper-3"><a href="<?= base_url('artikelbaca') ?>">Telusuri Artikel</a></div>
                    <img class="icon-jam-icons" src="<?= base_url('assets/img/arrow-right.svg') ?>" alt="Arrow Right" />
                </div>
            </div>
            <img class="placeholder-image" src="<?= base_url('assets/img/image.png') ?>" alt="Image" />
        </div>
        <div class="auto-layout">
            <div class="auto-layout-vertical">
                <div class="div">
                    <p class="p">Gizi dan Imunitas: Pentingkah Konsumsi Makanan Bergizi Seimbang?</p>
                    <p class="text-wrapper-2">
                        Sistem imunitas atau sistem kekebalan tubuh merupakan sistem pertahanan alami yang bertugas untuk
                        melindungi tubuh dari serangan patogen atau kuman. Salah satu faktor penting yang dapat mempengaruhi
                        sistem kekebalan adalah asupan gizi yang seimbang. Asupan gizi seimbang...
                    </p>
                </div>
                <div class="style-outlined">
                    <div class="text-wrapper-3"><a href="<?= base_url('artikelbaca') ?>">Telusuri Artikel</a></div>
                    <img class="icon-jam-icons" src="<?= base_url('assets/img/arrow-right.svg') ?>" alt="Arrow Right" />
                </div>
            </div>
            <img class="placeholder-image" src="<?= base_url('assets/img/image1.png') ?>" alt="Image 1">
        </div>
        <div class="auto-layout">
            <div class="auto-layout-vertical">
                <div class="div">
                    <p class="p">Pola Hidup Sehat dengan Menerapkan Pedoman Gizi Seimbang</p>
                    <p class="text-wrapper-2">
                        &#34;Pahami pedoman gizi seimbang untuk memahami dengan benar seberapa banyak kebutuhan nutrisi harian
                        tubuh. Tentunya, hal ini akan berpengaruh pada pola hidup yang jauh lebih sehat ke depannya.&#34;
                    </p>
                </div>
                <div class="style-outlined">
                    <div class="text-wrapper-3"><a href="<?= base_url('artikelbaca') ?>">Telusuri Artikel</a></div>
                    <img class="icon-jam-icons" src="<?= base_url('assets/img/arrow-right.svg') ?>" alt="Arrow Right" />
                </div>
            </div>
            <img class="placeholder-image" src="<?= base_url('assets/img/image2.png') ?>" alt="Image 2" />
        </div>
    </div>

    <div class="footer">
        <div class="top">
            <div class="logo-container">
                <div class="logo">
                    <img class="img" src="<?= base_url('assets/img/mask.svg') ?>" alt="Logo" />
                    <div class="text">
                        <div class="brand">RetoGizi</div>
                    </div>
                </div>
            </div>
            <div class="menu">
                <div class="menu-item">
                    <img class="img" src="<?= base_url('assets/img/homewith.svg') ?>" alt="Home" />
                    <a class="text-wrapper" href="<?= base_url('/') ?>">Beranda</a>
                </div>
                <div class="menu-item">
                    <img class="img" src="<?= base_url('assets/img/icon (2).svg') ?>" alt="Artikel" />
                    <a class="text-wrapper" href="<?= base_url('artikel') ?>">Artikel</a>
                </div>
                <div class="menu-item">
                    <img class="img" src="<?= base_url('assets/img/Icon.svg') ?>" alt="Konsultasi" />
                    <a class="text-wrapper" href="<?= base_url('konsultasi') ?>">Tanya Dokter</a>
                </div>
                <div class="menu-item">
                    <img class="img" src="<?= base_url('assets/img/icon (1).svg') ?>" alt="Resep" />
                    <a class="text-wrapper" href="<?= base_url('resep') ?>">Resep</a>
                </div>
                <div class="menu-item">
                    <img class="img" src="<?= base_url('assets/img/user.svg') ?>" alt="Tentang" />
                    <a class="text-wrapper" href="#">Tentang</a>
                </div>
            </div>
            <div class="social-icons">
                <img class="img" src="<?= base_url('assets/img/Vector.svg') ?>" alt="Social Icon" />
                <img class="img" src="<?= base_url('assets/img/youtube.svg') ?>" alt="YouTube" />
                <img class="img" src="<?= base_url('assets/img/Vector-1.svg') ?>" alt="Social Icon" />
                <img class="img" src="<?= base_url('assets/img/instagram.svg') ?>" alt="Instagram" />
            </div>
        </div>
        <p class="div">RetoGizi @ 2023. All rights reserved.</p>
    </div>
</body>

</html>