<!DOCTYPE html>
<html lang="en">
  <?php
require "layout/head.php";
require "include/conn.php";
?>

  <body>
    <div id="app">
      <?php require "layout/sidebar.php";?>
      <div id="main">
        <header class="mb-3">
          <a href="#" class="burger-btn d-block d-xl-none">
            <i class="bi bi-justify fs-3"></i>
          </a>
        </header>
        <div class="page-heading">
        <div class="page-heading">
          <h3>Kriteria Penilaian Zakat Fitrah</h3>
          <p class="text-subtitle text-muted">Masjid Jannatun Na'im</p>
        </div>
        </div>
        <div class="page-content">
          <section class="row">
            <div class="col-12">
              <div class="card">

                <div class="card-header d-flex justify-content-between align-items-center">
                  <h4 class="card-title">Bobot Kriteria Penerima Zakat</h4>
                  <a href="bobot-tambah.php" class="btn btn-success btn-sm">Tambah Bobot</a>
                </div>
                
                <div class="card-content">
                  <div class="card-body">
                  <div class="alert alert-info">
                      <strong>Petunjuk:</strong>
                      <ul>
                        <li>Total bobot harus bernilai 1</li>
                        <li>Benefit = Semakin besar nilai semakin prioritas</li>
                        <li>Cost = Semakin kecil nilai semakin prioritas</li>
                      </ul>
                    </div>
                  <div class="table-responsive">
                    <table class="table table-striped mb-0">
                    <caption>
    Tabel Kriteria C<sub>i</sub>
  </caption>
  <tr>
  <th>#</th>
                            <th>Kode</th>
                            <th>Kriteria Zakat</th>
                            <th>Bobot</th>
                            <th>Jenis</th>
                            <th>Aksi</th>
  </tr>
  <?php
$sql = 'SELECT id_criteria,criteria,weight,attribute FROM saw_criterias';
$result = $db->query($sql);
$i = 0;
while ($row = $result->fetch_object()) {
    echo "<tr>
        <td class='right'>" . (++$i) . "</td>
        <td class='center'>C{$i}</td>
        <td>{$row->criteria}</td>
        <td>{$row->weight}</td>
        <td>{$row->attribute}</td>
        <td>
            <a href='bobot-edit.php?id={$row->id_criteria}' class='btn btn-info btn-sm'>Edit</a>
        </td>
      </tr>\n";
}
$result->free();
?>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </section>
        </div>
        <?php require "layout/footer.php";?>
      </div>
    </div>
    <?php require "layout/js.php";?>
  </body>
</html>
