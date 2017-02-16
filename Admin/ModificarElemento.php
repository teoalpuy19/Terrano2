<?php include "../conexion.php";


if (isset($_POST['ProdName'])){
 $nombre = $_POST['ProdName'];
}
if (isset($_POST['ProdCod'])){
 $codigo = $_POST['ProdCod'];
}
 if (isset($_POST['ProdCat'])){
   $categoria = $_POST['ProdCat'];
 }
 $Colores = $_POST['ColoresGuardar'];
 if (isset($_POST['Id'])){
 $Id = $_POST['Id'];

$sqlSelect = "Select * from `Producto` where `id`= $Id";

$result = $conn ->query($sqlSelect);
if ($result->num_rows >0){
     $row = $result->fetch_assoc();
}
$fileTmpLoc = $_FILES["fileToUpload"]["tmp_name"]; // File in the PHP tmp folder
if (!$fileTmpLoc){
    
}else{
// Access the $_FILES global variable for this specific file being uploaded
// and create local PHP variables from the $_FILES array of information
$fileName = $_FILES["fileToUpload"]["name"]; // The file name
$fileTmpLoc = $_FILES["fileToUpload"]["tmp_name"]; // File in the PHP tmp folder
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

// ---------- Include Universal Image Resizing Function --------
include_once("ak_php_img_lib_1.0.php");
//$target_file = "uploads/$fileName";
//$fileNameNew =  "$codigo.$fileExt";
//$resized_file = "uploads/$fileNameNew";
//$wmax = 1000;
//$hmax = 1000;
//ak_img_resize($target_file, $resized_file, $wmax, $hmax, $fileExt);
//unlink("uploads/$fileName");

//dos
if (strlen($_POST['ProdCod'])>0){
 $codigo = $_POST['ProdCod'];
}else{
    $codigo = $row['Cod'];
}

$target_file = $fileTmpLoc;
$fileNameNew =  "$codigo.$fileExt";
$resized_file = "uploads/$fileNameNew";
$wmax = 653;
$hmax = 428;
ak_img_resize($target_file, $resized_file, $wmax, $hmax, $fileExt);
unlink($fileTmpLoc);
}
$i = 0;

$sqlUpdate = "UPDATE `Producto` set ";

if (strlen($nombre)>0){
    if ($row['Name']!= $nombre){
        $i +=1;
        $sqlUpdate.= "`Name` = '$nombre'";
    }
}

if (strlen($codigo)>0){
    if ($row['Cod']!= $codigo){
        if ($i>0){
        $sqlUpdate.=",`Cod`='$codigo'";
        }else {
             $i +=1;
            $sqlUpdate.="`Cod`='$codigo'";
        }
    }
}
if (count_chars($categoria)>0){
    if ($row['Category']!= $categoria){
         if ($i>0){
             $sqlUpdate.=",`Category`='$categoria'";
             
         }else{
             $sqlUpdate.="`Category`='$categoria'";
              $i +=1;
         }
         
    }
}
if (count_chars($Colores)>0){
    if ($row['Colores'] != $Colores){
         if ($i>0){
        $sqlUpdate.= ",`Colores`='$Colores'";
         }else{
             $sqlUpdate.= "`Colores`='$Colores'";
             $i+=1;
         }
    }
}

if ($fileTmpLoc){
     if ($i>0){
         $sqlUpdate.=",`ImageShow`='Admin/$resized_file'";
     }else{
           $sqlUpdate.="`ImageShow`='Admin/$resized_file'";
           $i+=1;
         }
     
    
}
if ($i!=0){
$sqlUpdate .=" where `Id`=$Id";

}else{
    $sqlUpdate="";
}

 
if (strlen($sqlUpdate)>0){
  if (mysqli_query($conn, $sqlUpdate)) {
header('Location:Modificar.php');
}else{

}
}
 header('Location:Modificar.php');
}?>

