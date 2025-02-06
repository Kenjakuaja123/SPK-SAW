<!DOCTYPE html>
<html lang="en">
  <?php
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
        <h3>Matriks Penilaian Zakat</h3>
        <p class="text-subtitle text-muted">Masjid Jannatun Na'im</p>
        </div>
        <div class="page-content">
          <section class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                 <h4 class="card-title">Matriks Keputusan dan Ternormalisasi</h4>
                </div>
                <div class="card-content">
                  <div class="card-body">
                  </div>
                  <button type="button" class="btn btn-outline-success btn-sm m-2" data-bs-toggle="modal"
                          data-bs-target="#inlineForm">
                    Isi Nilai Alternatif
                  </button>
                  <div class="table-responsive">
                    <table class="table table-striped mb-0">
                      <caption>Matrik Keputusan (X)</caption>
                      <tr>
                        <th>Alternatif</th>
                        <th>C1</th>
                        <th>C2</th>
                        <th>C3</th>
                        <th>C4</th>
                        <th>C5</th>
                        <th>Aksi</th>
                      </tr>
                      <?php
                      $sql = "SELECT a.id_alternative, b.name, 
                                    MAX(IF(a.id_criteria=1,a.value,0)) AS C1,
                                    MAX(IF(a.id_criteria=2,a.value,0)) AS C2,
                                    MAX(IF(a.id_criteria=3,a.value,0)) AS C3,
                                    MAX(IF(a.id_criteria=4,a.value,0)) AS C4,
                                    MAX(IF(a.id_criteria=5,a.value,0)) AS C5
                              FROM saw_evaluations a
                              JOIN saw_alternatives b USING(id_alternative)
                              GROUP BY a.id_alternative ORDER BY a.id_alternative";
                      $result = $db->query($sql);
                      while ($row = $result->fetch_assoc()) {
                        echo "<tr>
                                <th>A{$row['id_alternative']} {$row['name']}</th>
                                <td>{$row['C1']}</td>
                                <td>{$row['C2']}</td>
                                <td>{$row['C3']}</td>
                                <td>{$row['C4']}</td>
                                <td>{$row['C5']}</td>
                                <td><a href='keputusan-hapus.php?id={$row['id_alternative']}' class='btn btn-danger btn-sm'>Hapus</a></td>
                              </tr>";
                      }
                      ?>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </section>
        </div>
        <?php require "layout/footer.php"; ?>
      </div>
    </div>

    <div class="modal fade" id="inlineForm" tabindex="-1" role="dialog" aria-labelledby="inlineFormLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Isi Nilai Kandidat</h4>
            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
              <span>&times;</span>
            </button>
          </div>
          <form action="matrik-simpan.php" method="POST">
            <div class="modal-body">
              <label>Nama Alternatif:</label>
              <select class="form-control" name="id_alternative">
                <?php
                $sql = 'SELECT id_alternative, name FROM saw_alternatives';
                $result = $db->query($sql);
                while ($row = $result->fetch_assoc()) {
                  echo "<option value='{$row['id_alternative']}'>{$row['name']}</option>";
                }
                ?>
              </select>
              <label>Kriteria:</label>
              <select class="form-control" name="id_criteria">
                <?php
                $sql = 'SELECT id_criteria, criteria FROM saw_criterias';
                $result = $db->query($sql);
                while ($row = $result->fetch_assoc()) {
                  echo "<option value='{$row['id_criteria']}'>{$row['criteria']}</option>";
                }
                ?>
              </select>
              <label>Nilai:</label>
              <input type="number" name="value" class="form-control" required>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
              <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
          </form>
        </div>
      </div>
    </div>
    <?php require "layout/js.php"; ?>
  </body>
</html>