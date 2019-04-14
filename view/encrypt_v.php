<!DOCTYPE html>
<html>
<?php 
$thisPage = "Hide";
include "./_partials/headView.php"; ?>
<?php include "./_partials/js.php";?>
<?php 
error_reporting(0);
ini_set('display_errors', 0);
$y = $_GET['x'];
$namaET = $_GET['y'];
if ($y==1) {
  echo "<script type='text/javascript'>";
  echo "$(window).on('load',function(){
    $('#modalET').modal('show');
  });";
  echo "</script>";
}
?>
<body>
  <?php include "../view/_partials/navbarView.php"; ?>
  <div id="page-container text-center" class="center">
    <div class="form-group text-white">
      <label for="format">Pilih jenis enkripsi : </label>
      <select class="form-control selectInput" name="forma" onchange="location = this.value;">
        <option value="encrypt_v.php">Text</option>
        <option value="encrypt_file_v.php">File</option>
      </select>
    </div>
    <form id="formInput" method="post" action="../proses/prosesEnkripsi_text.php" enctype="multipart/form-data">
      <div class="form-group">
        <label for="encrypted_text">Masukkan pesan teks yang ingin di enkripsi : </label>
        <textarea class="form-control" id="encypted_text" name="encrypted_text" rows="3" required></textarea>
      </div>
      <div class="form-group">
        <label for="upload">Pilih gambar yang ingin di masukkan pesan : </label>
        <input type="file" class="form-control-file" name="upload" id="upload" required>
      </div>
      <div class="form-group">
        <label for="password"> Masukkan Password : </label>
        <input class="form-control" id="password" name="password" required></input>
      </div>

      <button type="submit" name="submit" id="submit" class="btn btn-primary">Enkripsi</button>
    </form>
    <?php include "../view/_partials/modal.php";?>
  </div>
</body>
</html>