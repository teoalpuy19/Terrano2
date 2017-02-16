<?php
include "../conexion.php";
 if (isset($_POST['ColorId'])){
$Id = $_POST['ColorId'];
}
$sqlSelect = "Select * from `Colores` where `id`='$Id'";
$color = mysqli_query($conn, $sqlSelect);
if ($color->num_rows >0){
     $colorOld = $color->fetch_assoc();
}
$fileTmpLoc = $_FILES["fileToUpload"]["tmp_name"]; // File in the PHP tmp folder
 if ($fileTmpLoc){
$fileName = $_FILES["fileToUpload"]["name"]; // The file name
$fileType = $_FILES["fileToUpload"]["type"]; // The type of file it is
$fileSize = $_FILES["fileToUpload"]["size"]; // File size in bytes
$fileErrorMsg = $_FILES["fileToUpload"]["error"]; // 0 for false... and 1 for true
$kaboom = explode(".", $fileName); // Split file name into an array using the dot
$fileExt = end($kaboom); // Now target the last array element to get the file extension
// START PHP Image Upload Error Handling --------------------------------------------------
if (!preg_match("/.(gif|jpg|png)$/i", $fileName) ) {
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
$fileNameNew =  "$Id.$fileExt";
$resized_file = "Colores/$fileNameNew";
$wmax = 50;
$hmax = 50;
ak_img_resize($target_file, $resized_file, $wmax, $hmax, $fileExt);
 }
 $sqlUpdate = "Update `Colores` set";
  $i =0;
if ($fileTmpLoc){
    $i =1;
    $sqlUpdate.= "`imagen`='Admin/$resized_file'";
}
if (isset($_POST['NombreColor'])){
    $nombre = strtoupper($_POST['NombreColor']);
    if (strlen($nombre)>0){
    if ($colorOld['nombre']!=$nombre ){
        if($i>0){
             $sqlUpdate.=",`nombre`='$nombre'";
              $i+=1;
        }else{
            $i+=1;
            $sqlUpdate.="`nombre`='$nombre'";
        }
    }
       
    }

}
if ($i>=1){
    $sqlUpdate.=" where `id`=$Id";
 if (mysqli_query($conn, $sqlUpdate)) {
     
   header("Location:AddColoresForm.php");
 }else{
     echo "todo mal";
 }

 }else{
     $sqlUpdate = "";
 }
 
 