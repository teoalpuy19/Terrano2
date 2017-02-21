<?php include "../conexion.php";


if (isset($_POST['ConfigValue'])){
 $value = $_POST['ConfigValue'];
}
if (isset($_POST['ConfigId'])){
 $id = $_POST['ConfigId'];
}

$sqlSelect = "Select * from `Config` where `id`= '$id'";
$result = $conn ->query($sqlSelect);
if ($result->num_rows >0){
     $row = $result->fetch_assoc();
}
 
if ($row['tipo']==2){
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
//dos


$target_file = $fileTmpLoc;
$fileNameNew =  "$id.$fileExt";
$resized_file = "../assets/Terrano/$fileNameNew";
$resized_file2 = "assets/Terrano/$fileNameNew";
$config = explode(",", $row['dimension']);
$wmax = $config[0];
$hmax = $config[1];
ak_img_resize($target_file, $resized_file, $wmax, $hmax, $fileExt);
unlink($fileTmpLoc);
}
}

if ($row['tipo']==1){
if (strlen($value)>0){
    if ($row['value']== $value){
    }else{
        $sqlUpdate = "UPDATE `Config` set `value`='$value' where `id` ='$id'";
    }
}
}

if ($row['tipo']==2){
    if (strlen($resized_file)>0){
            $sqlUpdate = "UPDATE `Config` set `value`='$resized_file2' where `id` = '$id'";
        }
}
if($row['tipo']==3){
    
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
  if (!preg_match("/.(pdf)$/i", $fileName) ) {
     // This condition is only if you wish to allow uploading of specific file types    
     echo "ERROR: Your image was not .pdf";
     unlink($fileTmpLoc); // Remove the uploaded file from the PHP temp folder
     exit();
} else if ($fileErrorMsg == 1) { // if file upload error key is equal to 1
    echo "ERROR: An error occured while processing the file. Try again.";
    exit();
}
$fileNameNew =  "$id.$fileExt";
$moveResult = move_uploaded_file($fileTmpLoc, "../assets/Terrano/$fileNameNew");
// Check to make sure the move result is true before continuing
if ($moveResult != true) {
    echo "ERROR: File not uploaded. Try again.";
    unlink($fileTmpLoc); // Remove the uploaded file from the PHP temp folder
}else{
     $resized_file2 =  "assets/Terrano/$fileNameNew";
      $sqlUpdate = "UPDATE `Config` set `value`='$resized_file2' where `id` = '$id'";
}
    


if (strlen($sqlUpdate)>0){
  if (mysqli_query($conn, $sqlUpdate)) {
header('Location:ModificarElementosWebForm.php');
}
}
}
}



?>

