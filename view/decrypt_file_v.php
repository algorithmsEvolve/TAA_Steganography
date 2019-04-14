<!DOCTYPE html>
<html>
<?php 
$thisPage = "Unhide";
include "../view/_partials/headView.php"; ?>
<?php include "./_partials/js.php";?>
<?php 
error_reporting(0);
ini_set('display_errors', 0);
$y = $_GET['x'];
$namaDF = $_GET['y'];
if ($y==1) {
  echo "<script type='text/javascript'>";
  echo "$(window).on('load',function(){
    $('#modalDF').modal('show');
  });";
  echo "</script>";
}
if ($y==2) {
  echo "<script type='text/javascript'>";
  echo "$(window).on('load',function(){
    $('#modalSP').modal('show');
  });";
  echo "</script>";
}
?>
<body>
  <?php include "../view/_partials/navbarView.php"; ?>
  <div id="page-container" class="center">
    <div class="form-group text-white">
      <label for="format">Pilih jenis dekripsi : </label>
      <select class="form-control selectInput" name="forma" onchange="location = this.value;">
        <option value="decrypt_file_v.php">File</option>
        <option value="decrypt_v.php">Text</option>
      </select>
    </div>
    <form id="formInput" method="post" action="../proses/prosesDekripsi_file.php" enctype="multipart/form-data">
      <div class="form-group">
        <label for="upload">Pilih image yang ingin di dekripsi : </label>
        <input type="file" class="form-control-file" name="upload" id="upload" required>
      </div>
      <div class="form-group">
        <label for="password"> Masukkan Password : </label>
        <input class="form-control" id="password" name="password" required></input>
      </div>

      <button type="submit" name="submit" id="submit" class="btn btn-primary">Dekripsi</button>
    </form>
    <?php include "../view/_partials/modal.php";?>
  </div>
</body>
</html>