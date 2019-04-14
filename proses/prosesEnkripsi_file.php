<?php 
include_once('Aes.php');
include('../functions.php');
error_reporting(0);
ini_set('display_errors', 0);

function error_found(){
  header('Location: ../view/encrypt_file_v.php?x=2');
  die;
}
set_error_handler('error_found');

/*Menerima input dari user*/
$password = $_POST['password'];

/*encrypt with AES256*/
$b = '12345678912345678912345678912345';
$a = $password;
$aes = new Aes($b);

        // $a2 = hex2bin($a);
$hasil = bin2hex($aes->encrypt($a));
$password = $hasil;

/*end encrypt with AES256*/

/*input file*/
$ekstensi_diperbolehkan = array('txt');
$namaf = $_FILES['uploadf']['name'];
  $x = explode('.', $namaf);//file.txt
  //setelah di explode nilai1=file . nilai2=txt
  $ekstensi = strtolower(end($x)); //txt
  $file_temp = $_FILES['uploadf']['tmp_name'];//original name
  if(in_array($ekstensi, $ekstensi_diperbolehkan) === TRUE){
    move_uploaded_file($file_temp, '../assets/uploadedFile/'.$namaf);
    /*ambil teks dari file*/
    $myfile = fopen('../assets/uploadedFile/'.$namaf, "r") or die("Unable to open file!");
    $message_to_hide = fread($myfile,filesize('../assets/uploadedFile/'.$namaf));
    fclose($myfile);
  }
  else{
    header('Location: ../view/encrypt_file_v.php?x=2');
    die;
  }
  /*end input file*/

  /*input gambar*/
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
      move_uploaded_file($file_temp, '../assets/uploadedImage/'.$nama);
    }
    else{
      header('Location: ../view/encrypt_file_v.php?x=2');
      die;
    }
  }
  else{
    header('Location: ../view/encrypt_file_v.php?x=2');
    die;
  }
  /*end input gambar*/
  /*end Menerima input dari user*/

  /*proses enkripsi*/
  //Edit below variables
$msg = $message_to_hide."///".$password."~~~".$namaf; //To encrypt
$src = '../assets/uploadedImage/'.$nama; //Start image


$msg .='|'; //EOF sign, decided to use the pipe symbol to show our decrypter the end of the message
$msgBin = toBin($msg); //Convert our message to binary
$msgLength = strlen($msgBin); //Get message length
$img = imagecreatefromjpeg($src); //returns an image identifier
list($width, $height, $type, $attr) = getimagesize($src); //get image size

if($msgLength>($width*$height)){ //The image has more bits than there are pixels in our image
  echo('Message too long. This is not supported as of now.');
  die();
}

$pixelX=0; //Coordinates of our pixel that we want to edit
$pixelY=0; //^

for($x=0;$x<$msgLength;$x++){ //Encrypt message bit by bit (literally)

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

  $newR = $r; //we dont change the red or green color, only the lsb of blue
  $newG = $g; //^
  $newB = toBin($b); //Convert our blue to binary
  $newB[strlen($newB)-1] = $msgBin[$x]; //Change least significant bit with the bit from out message
  $newB = toString($newB); //Convert our blue back to an integer value (even though its called tostring its actually toHex)

  $new_color = imagecolorallocate($img,$newR,$newG,$newB); //swap pixel with new pixel that has its blue lsb changed (looks the same)
  imagesetpixel($img,$pixelX,$pixelY,$new_color); //Set the color at the x and y positions
  $pixelX++; //next pixel (horizontally)

}
$randomDigit = rand(1,9999); //Random digit for our filename
imagepng($img,'../encryptedImage/encrypted_' . $randomDigit . '.png'); //Create image
$namaEF = "encrypted_".$randomDigit.".png";
header('Location: ../view/encrypt_file_v.php?x=1&y='.$namaEF);
exit();

imagedestroy($img); //get rid of it
/*end proses enkripsi*/
?>