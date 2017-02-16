<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<?php
include "../conexion.php";
 $nombre = $_POST['nombre'];
 $codigo = $_POST['codigo'];
 if (isset($_POST['ProdCat'])){
   $categoria = $_POST['ProdCat'];
 }


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
// END PHP Image Upload Error Handling ----------------------------------------------------
// Place it into your "uploads" folder mow using the move_fileToUpload() function
$moveResult = move_uploaded_file($fileTmpLoc, "uploads/$fileName");
// Check to make sure the move result is true before continuing
if ($moveResult != true) {
    echo "ERROR: File not uploaded. Try again.";
    unlink($fileTmpLoc); // Remove the uploaded file from the PHP temp folder
     $uploadOk = 1;
    exit();
   
} else {
  $uploadOk = 0;
}
 // Remove the uploaded file from the PHP temp folder

// ---------- Include Universal Image Resizing Function --------
include_once("ak_php_img_lib_1.0.php");
$target_file = "uploads/$fileName";
$fileNameNew =  "$codigo.$fileExt";
$resized_file = "uploads/$fileNameNew";
$wmax = 1000;
$hmax = 1000;
ak_img_resize($target_file, $resized_file, $wmax, $hmax, $fileExt);
unlink("uploads/$fileName");


// if ($uploadOk <> 0){
  $sql = "INSERT into Producto(Cod,Name,Category,Image,ImageShow,Thumbnail)
Values ('$codigo','$nombre','$categoria','','Admin/$resized_file','')";

  if (mysqli_query($conn, $sql)) {
    ?>
    <div class="alert alert-success">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>Success!</strong> Se creo el producto  correctamente
  </div>
<button type="button" class="btn btn-info"><a href="form_upload.php">Agregar Producto</a></button>
<?php
  // } else {
  //     echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  // }
}
// ----------- End Universal Image Resizing Function -----------
// Display things to the page so you can see what is happening for testing purposes
// echo "The file named <strong>$fileName</strong> uploaded successfuly.<br /><br />";
// echo "It is <strong>$fileSize</strong> bytes in size.<br /><br />";
// echo "It is an <strong>$fileType</strong> type of file.<br /><br />";
// echo "The file extension is <strong>$fileExt</strong><br /><br />";
// echo "The Error Message output for this upload is: $fileErrorMsg";
?>