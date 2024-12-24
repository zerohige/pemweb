<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=<nav class=" navbar navbar-expand-lg bg-body-tertiary px-5">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="<?= base_url('assets/css/Konsultasiguide.css') ?>">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="<?= base_url('assets/css/Konsultasi.css') ?>">
    <link href="<?= base_url('assets/css/c_top.css') ?>" rel="stylesheet" />

    <title>konsultasi</title>
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
                            <a class="nav-link" aria-current="page" href="<?= base_url('/jadwal-konsultasi') ?>">
                                Jadwal Konsultasi
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="<?= base_url('/testi') ?>">
                                Tambah Resep
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
    <div class="section">
        <div class="section-text">
            <div class="top">
                <div class="heading">Konsultasikan Kepada Ahli Kami</div>
                <p class="paragraph">
                    Kami menyediakan layanan konsultasi yang dibimbing langsung oleh para tenaga kesehatan gizi yang terampil di
                    bidangnya
                </p>
            </div>
        </div>
        <div class="frame">
            <div class="container mt-5">
                <h3 style="color: wheat;">Daftar Reservasi</h3>
                <table class="table table-bordered table-striped" style="margin-bottom:100px">
                    <thead class="table-dark">
                        <tr>
                            <th>No</th>
                            <th>ID Reservasi</th>
                            <th>Email User</th>
                            <th>Dokter</th>
                            <th>Catatan</th>
                            <th>tanggal Konsul</th>
                            <th>Waktu Konsul</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody id="reservationTable">
                        <!-- Data akan diisi oleh JavaScript -->
                    </tbody>
                </table>
            </div>
            <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
            <script>
                $(document).ready(function() {
                    const baseUrl = "<?= base_url() ?>";

                    function fetchReservations() {
                        $.get(`${baseUrl}/api/getreservasi`, function(data) {
                            let rows = "";

                            data.forEach((reservasi, index) => {
                                let infostatus = "";
                                if (reservasi.status == 0) {
                                    infostatus = "Menunggu persetujuan";
                                }
                                if (reservasi.status == 1) {
                                    infostatus = "Diterima";
                                }
                                if (reservasi.status == 2) {
                                    infostatus = "selesai";
                                }


                                rows += `
                    <tr>
                        <td>${index + 1}</td>
                        <td>${reservasi.id}</td>
                        <td>${reservasi.email}</td>
                        <td>${reservasi.nama_dokter}</td>
                        <td>${reservasi.catatan}</td>
                        <td>${reservasi.tanggal_konsultasi}</td>
                        <td>${reservasi.waktu_konsultasi}</td>
                        <td>${infostatus}</td>
                         <td>
                                    <button class="btn btn-danger btn-sm" onclick="deleteReservation(${reservasi.id})">Hapus</button>
                                    <button class="btn btn-danger btn-sm" style = "background-color:blue;border-color:blue;" onclick="accReservation(${reservasi.id})">Terima</button>
                                    <button class="btn btn-danger btn-sm" style = "background-color :green;border-color:green;" onclick="doneReservation(${reservasi.id})">Selesai</button>
                                </td>
                     
                    </tr>
                `;

                            });

                            $("#reservationTable").html(rows);
                        }).fail(function(xhr, status, error) {
                            alert("Gagal mengambil data reservasi: " + error);
                        });
                    }

                    window.accReservation = function(id) {
                        if (confirm("Terima Permintaan reservasi ini?")) {
                            $.ajax({
                                url: `${baseUrl}/admin/api/SetujuReservation/${id}`,
                                type: "POST",
                                success: function() {
                                    alert("Reservasi Diterima");
                                    fetchReservations();
                                }
                            });
                        }
                    }

                    window.doneReservation = function(id) {
                        if (confirm("Reservasi ini sudah selesai?")) {
                            $.ajax({
                                url: `${baseUrl}/admin/api/doneReservation/${id}`,
                                type: "POST",
                                success: function() {
                                    alert("Reservasi Selesai");
                                    fetchReservations();
                                }
                            });
                        }
                    }

                    window.deleteReservation = function(id) {
                        if (confirm("Yakin ingin menghapus reservasi ini?")) {
                            $.ajax({
                                url: `${baseUrl}/api/deletereservasi/${id}`,
                                type: "DELETE",
                                success: function() {
                                    alert("Reservasi berhasil dihapus");
                                    fetchReservations();
                                }
                            });
                        }
                    };

                    // Panggil fungsi untuk mengambil data
                    fetchReservations();
                });
            </script>
        </div>



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
                        <img class="img" src="<?= base_url('assets/img/Icon.svg') ?>" />
                        <a class="text-wrapper" href="<?= base_url('konsultasi') ?>">Tanya Dokter</a>
                    </div>
                    <div class="menu-item">
                        <img class="img" src="<?= base_url('assets/img/icon (1).svg') ?>" />
                        <a class="text-wrapper" href="<?= base_url('resep') ?>">Resep</a>
                    </div>
                    <div class="menu-item">
                        <img class="img" src="<?= base_url('assets/img/user.svg') ?>" />
                        <a class="text-wrapper" href="<?= base_url('#') ?>">Tentang</a>
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

        <!-- Modal -->
        <div class="modal fade" id="scheduleModal" tabindex="-1" aria-labelledby="scheduleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="scheduleModalLabel">Atur Jadwal Konsultasi</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="scheduleForm">
                            <div class="mb-3">
                                <label for="doctorName" class="form-label">Nama Dokter</label>
                                <input type="text" class="form-control" name="nama_dokter" id="doctorName" readonly>
                            </div>
                            <div class="mb-3">
                                <label for="scheduleDate" class="form-label">Tanggal Konsultasi</label>
                                <input type="date" class="form-control" name="tanggal_konsultasi" id="scheduleDate" required>
                            </div>
                            <div class="mb-3">
                                <label for="scheduleTime" class="form-label">Waktu Konsultasi</label>
                                <input type="time" class="form-control" name="waktu_konsultasi" id="scheduleTime" required>
                            </div>
                            <div class="mb-3">
                                <label for="additionalNotes" class="form-label">Catatan Tambahan</label>
                                <textarea class="form-control" id="additionalNotes" name="catatan" rows="3"></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Konfirmasi Jadwal</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div id="scheduleModal" data-user-id="<?= session()->get('id') ?>"></div>



</body>

</html>