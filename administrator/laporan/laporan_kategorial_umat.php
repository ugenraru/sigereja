<div class="card card-info">
  <div class="card-header">
    <h3 class="card-title">
      <i class="fa fa-file"></i>Laporan Umat PerKategorial</h3>
  </div>
</div>
  <form action="./report/cetak_kategorial_umat.php" method="post" enctype="multipart/form-data">
    <div class="card-body">
      <div class="form-group row">
        <label class="col-sm-2 col-form-label">Kelompok Kategorial</label>
        <div class="col-sm-6">
          <select name="id_kategorial" id="id_kategorial" class="form-control select2bs4" required>
            <option value="" disabled selected>- Pilih KELOMPOK KATEGORIAL -</option>
            <?php
        // ambil data dari database
        $query = "select * from tb_kategorial";
        $hasil = mysqli_query($koneksi, $query);
        while ($row = mysqli_fetch_array($hasil)) {
        ?>
            <option value="<?php echo $row['id_kategorial'] ?>">
              <?php echo $row['nama_kategorial'] ?>
            </option>
            <?php
        }
        ?>
          </select>
        </div>
      </div>

    </div>
    <div class="card-footer">

      <input target="_blank" type="submit" name="Cetak" value="Cetak" class="btn btn-info"></input>
    </div>
  </form>
</div>
       

      


