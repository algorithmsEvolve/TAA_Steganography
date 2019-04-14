<!DOCTYPE html>
<html>
<?php 
$thisPage = "Unhide";
include "../view/_partials/headView.php"; ?>
<?php include "./_partials/js.php";?>
<body>
  <?php include "../view/_partials/navbarView.php"; ?>
  <div id="page-container" class="center">
    <div class="form-group text-white">
      <label for="format">Pilih jenis dekripsi : </label>
      <select class="form-control selectInput" name="forma" onchange="location = this.value;">
        <option value="decrypt_v.php">Text</option>
        <option value="decrypt_file_v.php">File</option>
      </select>
    </div>
    <form id="formInput" method="post" action="../proses/prosesDekripsi_text.php" enctype="multipart/form-data">
      <div class="form-group">
        <label for="upload">Pilih gambar yang ingin di dekripsi : </label>
        <input type="file" class="form-control-file" name="upload" id="upload" required>
      </div>
      <div class="form-group">
        <label for="password"> Masukkan Password : </label>
        <input class="form-control" id="password" name="password" required></input>
      </div>

      <!-- Tampil pesan yang didekripsi -->
      <?php
      error_reporting(0);
      ini_set('display_errors', 0);
      $y = $_GET['x'];
      session_start();
      if ($y==1){
        $real_messageY = $_SESSION['real_messageY'];
        echo "<script type='text/javascript'>";
        echo "$(window).on('load',function(){
          $('#modalDT').modal('show');
        });";
        echo "</script>";
      }
      elseif ($y==2){
        echo "<script type='text/javascript'>";
        echo "$(window).on('load',function(){
          $('#modalSP').modal('show');
        });";
        echo "</script>";
      }
      echo "<div class='form-group'>";
      echo "<label for='encrypted_text'>Pesan teks yang telah di dekripsi : </label>";
      echo "<input type='text' class='form-control' id='decrypted_text' name='decrypted_text'";
      if (isset($real_messageY)){
        echo "value='$real_messageY'";
      }
      echo "style='height:100px' readonly></input>";
      echo "</div>";
      ?>
      <!-- end tampil pesan -->
      
      <button type="submit" name="submit" id="submit" class="btn btn-primary">Dekripsi</button>
    </form>
    <?php include "../view/_partials/modal.php";?>
  </div>
</body>
</html>