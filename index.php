<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="layout/style.css">
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <link rel="stylesheet" href="assets/css/app.css">
</head>
<body>
    <div id="app">
        <?php require "layout/sidebar.php"; ?>
        <div id="main">
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>

            <div class="page-heading">
                <h3>Dashboard</h3>
                <p class="text-subtitle text-muted">Masjid Jannatun Na'im</p>
            </div>

            <div class="page-content">
                <section class="row">
                    <div class="col-12">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="card bg-primary text-white">
                                    <div class="card-body py-4">
                                        <div class="d-flex align-items-center">
                                            <div class="avatar avatar-xl">
                                                <i class="bi bi-people-fill fs-1"></i>
                                            </div>
                                            <div class="ms-3">
                                                <h4>500 Mustahik</h4>
                                                <p class="mb-0">Terdaftar</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="card bg-success text-white">
                                    <div class="card-body py-4">
                                        <div class="d-flex align-items-center">
                                            <div class="avatar avatar-xl">
                                                <i class="bi bi-check-circle fs-1"></i>
                                            </div>
                                            <div class="ms-3">
                                                <h4>200 Keluarga</h4>
                                                <p class="mb-0">Kuota Penerima</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="card bg-info text-white">
                                    <div class="card-body py-4">
                                        <div class="d-flex align-items-center">
                                            <div class="avatar avatar-xl">
                                                <i class="bi bi-clipboard-data fs-1"></i>
                                            </div>
                                            <div class="ms-3">
                                                <h4>100 Data</h4>
                                                <p class="mb-0">Penilaian Terekam</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Penjelasan Sistem -->
                    <div class="col-12 mt-4">
                        <div class="card">
                            <div class="card-header bg-primary text-white">
                                <h4>Sistem Pendukung Keputusan Penerima Zakat Fitrah</h4>
                            </div>
                            <div class="card-content">
                                <div class="card-body">
                                    <p>
                                        Sistem ini menggunakan metode <i>Simple Additive Weighting</i> (SAW) untuk menentukan prioritas penerima zakat fitrah.
                                    </p>
                                    <div class="alert alert-secondary">
                                        <strong>Kriteria Penilaian:</strong>
                                        <ul>
                                            <li>Penghasilan Bulanan</li>
                                            <li>Jumlah Tanggungan</li>
                                            <li>Pengeluaran Rutin</li>
                                            <li>Status Tempat Tinggal</li>
                                        </ul>
                                    </div>
                                    <hr>
                                    <h5>Langkah Perhitungan SAW:</h5>
                                    <ol>
                                        <li>Menentukan kriteria yang digunakan dalam penilaian.</li>
                                        <li>Menentukan bobot untuk setiap kriteria.</li>
                                        <li>Membuat matriks keputusan dan melakukan normalisasi.</li>
                                        <li>Menghitung skor akhir dan menentukan prioritas penerima.</li>
                                    </ol>
                                    <div class="mt-4 text-center">
                                        <a href="preferensi.php" class="btn btn-lg btn-primary">
                                            <i class="bi bi-calculator"></i> Lihat Perhitungan
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
            <?php require "layout/footer.php"; ?>
        </div>
    </div>
    <?php require "layout/js.php"; ?>
</body>
</html>