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
              <a class="nav-link" aria-current="page" href="<?= base_url('/jadwal-konsultasi') ?>">
               Jadwal Konsultasi
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
      <div class="content-box">
        <img class="placeholder-picture" src="<?= base_url('assets/img/dr1.png') ?>"></img>
        <div class="content">
          <div class="title-category">
            <div class="category">Dokter Umum</div>
            <div class="title">Dr. Adinda Agustina</div>
          </div>
          <div class="user-card">
            <div class="user-thumb"><img class="icon-jam-icons" src="<?= base_url('assets/img/user.svg') ?>" /></div>
            <div class="details">
              <div class="text-wrapper">Alumnus Universitas Hasanuddin, 2020</div>
              <div class="div">Pengalaman 15 Tahun</div>
            </div>
          </div>
          <?php if (session()->get('logged_in')): ?>
            <div class="style-outlined">
              <a href="#" class="text-wrapper-2" data-bs-toggle="modal" data-bs-target="#scheduleModal" onclick="setDoctorName('Dr. Adinda Agustina')">Atur Jadwal</a>
              <img class="icon-jam-icons" src="<?= base_url('assets/img/arrow-right.svg') ?>" />
            </div>
          <?php else: ?>
            <div class="style-outlined">
              <a href="<?= base_url('login') ?>" class="text-wrapper-2">Login untuk Atur Jadwal</a>
              <img class="icon-jam-icons" src="<?= base_url('assets/img/arrow-right.svg') ?>" />
            </div>
          <?php endif ?>
        </div>
      </div>
      <div class="content-box">
        <img class="placeholder-picture-2" src="<?= base_url('assets/img/dr2.png') ?>"></img>
        <div class="content-2">
          <div class="title-category">
            <div class="category">Dokter Umum</div>
            <div class="title">Dr. Betshaida Yunisha purba</div>
          </div>
          <div class="user-card-2">
            <div class="user-thumb"><img class="icon-jam-icons" src="<?= base_url('assets/img/user.svg') ?>" /></div>
            <div class="details">
              <div class="text-wrapper">Alumnus Universitas Semarang, 2020</div>
              <div class="div">Pengalaman 17 Tahun</div>
            </div>
          </div>
          <?php if (session()->get('logged_in')): ?>
            <div class="style-outlined">
              <a href="#" class="text-wrapper-2" data-bs-toggle="modal" data-bs-target="#scheduleModal" onclick="setDoctorName('Dr. Betshaida Yunisha purba')">Atur Jadwal</a>
              <img class="icon-jam-icons" src="<?= base_url('assets/img/arrow-right.svg') ?>" />
            </div>
          <?php else: ?>
            <div class="style-outlined">
              <a href="<?= base_url('login') ?>" class="text-wrapper-2">Login untuk Atur Jadwal</a>
              <img class="icon-jam-icons" src="<?= base_url('assets/img/arrow-right.svg') ?>" />
            </div>
          <?php endif ?>
        </div>
      </div>
      <div class="content-box">
        <img class="placeholder-picture-3" src="<?= base_url('assets/img/dr3.png') ?>"></img>
        <div class="content-2">
          <div class="title-category">
            <div class="category">Dokter Umum</div>
            <p class="title">Dr. I Nyoman Yogi Prawiradinata</p>
          </div>
          <div class="user-card-2">
            <div class="user-thumb"><img class="icon-jam-icons" src="<?= base_url('assets/img/user.svg') ?>" /></div>
            <div class="details">
              <div class="text-wrapper">Alumnus Universitas Brawijaya, 2020</div>
              <div class="div">Pengalaman 15 Tahun</div>
            </div>
          </div>
          <?php if (session()->get('logged_in')): ?>
            <div class="style-outlined">
              <a href="#" class="text-wrapper-2" data-bs-toggle="modal" data-bs-target="#scheduleModal" onclick="setDoctorName('Dr. I Nyoman Yogi Prawiradinata')">Atur Jadwal</a>
              <img class="icon-jam-icons" src="<?= base_url('assets/img/arrow-right.svg') ?>" />
            </div>
          <?php else: ?>
            <div class="style-outlined">
              <a href="<?= base_url('login') ?>" class="text-wrapper-2">Login untuk Atur Jadwal</a>
              <img class="icon-jam-icons" src="<?= base_url('assets/img/arrow-right.svg') ?>" />
            </div>
          <?php endif ?>
        </div>
      </div>
    </div>
    <div class="frame">

      <div class="content-box">
        <img class="placeholder-picture-5" src="<?= base_url('assets/img/picture.png') ?>"></img>
        <div class="content-2">
          <div class="title-category">
            <div class="category">Ahli Gizi</div>
            <div class="title">Dr. Muhammad Nasir S.Si, M.Kes</div>
          </div>
          <div class="user-card-2">
            <div class="user-thumb"><img class="icon-jam-icons" src="<?= base_url('assets/img/user.svg') ?>" /></div>
            <div class="details">
              <div class="text-wrapper">Alumnus Universitas Gajah Mada, 2019</div>
              <div class="div">Pengalaman 15 Tahun</div>
            </div>
          </div>
          <?php if (session()->get('logged_in')): ?>
            <div class="style-outlined">
              <a href="#" class="text-wrapper-2" data-bs-toggle="modal" data-bs-target="#scheduleModal" onclick="setDoctorName('Dr. Muhammad Nasir S.Si, M.Kes')">Atur Jadwal</a>
              <img class="icon-jam-icons" src="<?= base_url('assets/img/arrow-right.svg') ?>" />
            </div>
          <?php else: ?>
            <div class="style-outlined">
              <a href="<?= base_url('login') ?>" class="text-wrapper-2">Login untuk Atur Jadwal</a>
              <img class="icon-jam-icons" src="<?= base_url('assets/img/arrow-right.svg') ?>" />
            </div>
          <?php endif ?>
        </div>
      </div>
      <div class="content-box">
        <img class="placeholder-picture-5" src="<?= base_url('assets/img/picture-1.png') ?>"></img>
        <div class="content-2">
          <div class="title-category">
            <div class="category">Ahli Gizi</div>
            <div class="title">Dr. Herumanuddin Sp.GK</div>
          </div>
          <div class="user-card-2">
            <div class="user-thumb"><img class="icon-jam-icons" src="<?= base_url('assets/img/user.svg') ?>" /></div>
            <div class="details">
              <div class="text-wrapper">Alumnus Universitas Indonesia, 2020</div>
              <div class="div">Pengalaman 15 Tahun</div>
            </div>
          </div>
          <?php if (session()->get('logged_in')): ?>
            <div class="style-outlined">
              <a href="#" class="text-wrapper-2" data-bs-toggle="modal" data-bs-target="#scheduleModal" onclick="setDoctorName('Dr. Herumanuddin Sp.GK')">Atur Jadwal</a>
              <img class="icon-jam-icons" src="<?= base_url('assets/img/arrow-right.svg') ?>" />
            </div>
          <?php else: ?>
            <div class="style-outlined">
              <a href="<?= base_url('login') ?>" class="text-wrapper-2">Login untuk Atur Jadwal</a>
              <img class="icon-jam-icons" src="<?= base_url('assets/img/arrow-right.svg') ?>" />
            </div>
          <?php endif ?>
        </div>
      </div>
      <div class="content-box">
        <img class="placeholder-picture-6" src="<?= base_url('assets/img/picture-2.png') ?>"></img>
        <div class="content-2">
          <div class="title-category">
            <div class="category">Ahli Gizi</div>
            <p class="title">Dr. Febryan Agus Pramudyo Sp.GK</p>
          </div>
          <div class="user-card-2">
            <div class="user-thumb"><img class="icon-jam-icons" src="<?= base_url('assets/img/user.svg') ?>" /></div>
            <div class="details">
              <div class="text-wrapper">Alumnus Universitas Padjadjaran, 2017</div>
              <div class="div">Pengalaman 10 Tahun</div>
            </div>
          </div>
          <?php if (session()->get('logged_in')): ?>
            <div class="style-outlined">
              <a href="#" class="text-wrapper-2" data-bs-toggle="modal" data-bs-target="#scheduleModal" onclick="setDoctorName('Dr. Febryan Agus Pramudyo Sp.GK')">Atur Jadwal</a>
              <img class="icon-jam-icons" src="<?= base_url('assets/img/arrow-right.svg') ?>" />
            </div>
          <?php else: ?>
            <div class="style-outlined">
              <a href="<?= base_url('login') ?>" class="text-wrapper-2">Login untuk Atur Jadwal</a>
              <img class="icon-jam-icons" src="<?= base_url('assets/img/arrow-right.svg') ?>" />
            </div>
          <?php endif ?>
        </div>
      </div>
    </div>
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
           
  <script>
   

    function setDoctorName(doctorName) {
      document.getElementById('doctorName').value = doctorName;
    }

    // Tangani form submit
    document.getElementById('scheduleForm').addEventListener('submit', async function(event) {
      event.preventDefault();
      const userId = document.getElementById('scheduleModal').getAttribute('data-user-id');
      // Ambil data dari form
      const formData = {
        nama_dokter: document.getElementById('doctorName').value,
        tanggal_konsultasi: document.getElementById('scheduleDate').value,
        waktu_konsultasi: document.getElementById('scheduleTime').value,
        catatan: document.getElementById('additionalNotes').value,
      };

      try {
        // Kirim data ke API menggunakan fetch
        const response = await fetch('<?= base_url('/api/reservasi') ?>', {
          method: 'POST',
          headers: {
            'Content-Type': 'application/json',
          },
          body: JSON.stringify(formData),
        });

        // Periksa respon dari server
        if (response.ok) {
          const result = await response.json();
          alert('Jadwal berhasil disimpan: ' + result.message);

          // Tutup modal setelah submit
          const modal = bootstrap.Modal.getInstance(document.getElementById('scheduleModal'));
          modal.hide();
        } else {
          const error = await response.json();
          alert('Terjadi kesalahan: ' + error.message);
        }
      } catch (error) {
        console.error('Error:', error);
        alert('Gagal menghubungi server.');
      }
    });
  </script>

</body>

</html>