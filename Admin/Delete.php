<?php include "../conexion.php"; ?>
<?php
    $Codigo=$_GET['sort'];
    if(isset($Codigo))
    $sql1 = "select * from `Producto` where `id` ='$Codigo'";
    	$sql="delete from `Producto` where `id` ='$Codigo'";
$result = $conn ->query($sql1);
if ($result->num_rows >0){
  if ($conn->query($sql)===TRUE){
     while($row = $result->fetch_assoc()) {
       unlink("../".$row['ImageShow']);
    }
    echo "Borre bien";
  }
  else
  {
    Echo "Borre mal";
  }

}else{
  echo "no se puede borrar xq no existe";
}




?>
