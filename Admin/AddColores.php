<?php
include "../conexion.php";
 $nombre = $_POST['NombreColor'];
 
 
$fileName = $_FILES["fileToUpload"]["name"]; // The file name
$fileTmpLoc = $_FILES["fileToUpload"]["tmp_name"]; // File in the PHP tmp folder
$fileType = $_FILES["fileToUpload"]["type"]; // The type of file it is
$fileSize = $_FILES["fileToUpload"]["size"]; // File size in bytes
$fileErrorMsg = $_FILES["fileToUpload"]["error"]; // 0 for false... and 1 for true
$kaboom = explode(".", $fileName); // Split file name into an array using the dot
$fileExt = end($kaboom); // Now target the last array element to get the file extension
// START PHP Image Upload Error Handling --------------------------------------------------
if (!$fileTmpLoc) { // if file not chosen
    echo "ERROR: Please browse for a file before clicking the upload button.";
    exit();
} else  if (!preg_match("/.(gif|jpg|png)$/i", $fileName) ) {
     // This condition is only if you wish to allow uploading of specific file types    
     echo "ERROR: Your image was not .gif, .jpg, or .png.";
     unlink($fileTmpLoc); // Remove the uploaded file from the PHP temp folder
     exit();
} else if ($fileErrorMsg == 1) { // if file upload error key is equal to 1
    echo "ERROR: An error occured while processing the file. Try again.";
    exit();
}
include_once("ak_php_img_lib_1.0.php");
$target_file = $fileTmpLoc;
$fileNameNew =  "$nombre.$fileExt";
$resized_file = "Colores/$fileNameNew";
$wmax = 50;
$hmax = 50;
ak_img_resize($target_file, $resized_file, $wmax, $hmax, $fileExt);

$nombre = strtoupper($nombre);
$sql = "insert into `Colores`(nombre,imagen) VALUES('$nombre','Admin/$resized_file')";
 if (mysqli_query($conn, $sql)) {
    header("Location:AddColoresForm.php");
 }else{
     
 }

