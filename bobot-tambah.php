<?php
session_start();
require "layout/head.php";
require "include/conn.php";
?>

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
                <h3>Tambah Bobot Kriteria</h3>
            </div>

            <div class="page-content">
                <section class="row">
                    <div class="col-md-8 mx-auto">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Form Tambah Bobot</h4>
                            </div>
                            <div class="card-body">
                                <!-- Form tambah bobot -->
                                <form action="bobot-simpan.php" method="POST">
                                    <div class="mb-3">
                                        <label for="criteria" class="form-label">Kriteria</label>
                                        <input type="text" id="criteria" name="criteria" class="form-control" required>
                                    </div>

                                    <div class="mb-3">
                                        <label for="weight" class="form-label">Bobot</label>
                                        <input type="text" id="weight" name="weight" class="form-control" required>
                                    </div>

                                    <div class="mb-3">
                                        <label for="attribute" class="form-label">Atribut</label>
                                        <select id="attribute" name="attribute" class="form-control">
                                            <option value="benefit">Benefit</option>
                                            <option value="cost">Cost</option>
                                        </select>
                                    </div>

                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                    <a href="bobot.php" class="btn btn-secondary">Batal</a>
                                </form>
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
