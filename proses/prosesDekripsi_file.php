<?php 
include_once('Aes.php');
include('../functions.php');

function error_found(){
  header('Location: ../view/decrypt_file_v.php?x=2');
  die;
}
set_error_handler('error_found');

/*Menerima input dari user*/
$password = $_POST['password'];

$ekstensi_diperbolehkan = array('png','jpg');
$nama = $_FILES['upload']['name'];
  $x = explode('.', $nama);//img.jpg
  //setelah di explode nilai1=image . nilai2=jpg JPG
  $ekstensi = strtolower(end($x)); //jpg
  $ukuran = $_FILES['upload']['size'];
  $file_temp = $_FILES['upload']['tmp_name'];//original name
  if(in_array($ekstensi, $ekstensi_diperbolehkan) === TRUE){
    if($ukuran < 10044070){
      //cek ukuran file
      move_uploaded_file($file_temp, '../proses/decryptingImage/'.$nama);
    }
    else{
      header('Location: ../view/decrypt_file_v.php?x=2');
      die;
    }
  }
  else{
    header('Location: ../view/decrypt_file_v.php?x=2');
    die;
  }
  /*end Menerima input dari user*/

  /*proses dekripsi*/
$src = '../proses/decryptingImage/'.$nama; //Change this to the image to decrypt
$img = imagecreatefrompng($src); //Returns image identifier
$real_message = ''; //Empty variable to store our message

$count = 0; //Wil be used to check our last char
$pixelX = 0; //Start pixel x coordinates
$pixelY = 0; //start pixel y coordinates

list($width, $height, $type, $attr) = getimagesize($src); //get image size

for ($x = 0; $x < ($width*$height); $x++) { //Loop through pixel by pixel
  if($pixelX === $width+1){ //If this is true, we've reached the end of the row of pixels, start on next row
  $pixelY++;
  $pixelX=0;
}

  if($pixelY===$height && $pixelX===$width){ //Check if we reached the end of our file
    echo('Max Reached');
    die();
  }

  $rgb = imagecolorat($img,$pixelX,$pixelY); //Color of the pixel at the x and y positions
  $r = ($rgb >>16) & 0xFF; //returns red value for example int(119)
  $g = ($rgb >>8) & 0xFF; //^^ but green
  $b = $rgb & 0xFF;//^^ but blue

  $blue = toBin($b); //Convert our blue to binary

  $real_message .= $blue[strlen($blue) - 1]; //Ad the lsb to our binary result

  $count++; //Coun that a digit was added

  if ($count == 8) { //Every time we hit 8 new digits, check the value
      if (toString(substr($real_message, -8)) === '|') { //Whats the value of the last 8 digits?
          $real_message = toString(substr($real_message,0,-8)); //convert to string and remove /
          /*proses ekstraksi*/
          $real_messageX = explode("///",$real_message);
          $real_messageY = $real_messageX['0'];
          $passAndNamef = $real_messageX['1'];
          $real_messageZ = explode("~~~",$passAndNamef);
          $namaf = $real_messageZ['1'];

          /*decrypt with AES258*/
          $c = '12345678912345678912345678912345';
          $hasil3 = $real_messageZ['0'];
        // echo bin2hex($hasil);
          $aes = new Aes($c);
          $hasil2 = hex2bin($hasil3);

          $d = $aes->decrypt($hasil2);
          $real_messageZ['0'] = $d;
          /*end decrypt with AES258*/

          if ($real_messageZ['0']==$password){
            $myfile = fopen("../decryptedFile/".$namaf, "w") or die("Unable to open file!");
            fwrite($myfile, $real_messageY);
            fclose($myfile);
            header('Location: ../view/decrypt_file_v.php?x=1&y='.$namaf);
            die;
          }
          else {
            header('Location: ../view/decrypt_file_v.php?x=2');
            die;
          }
        }
      $count = 0; //Reset counter
    }

  $pixelX++; //Change x coordinates to next
}


?>