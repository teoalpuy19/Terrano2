<?php
include "../conexion.php";
 $sql = "INSERT into Producto(Cod,Name,Category,Colores,Image,ImageShow,Thumbnail)
Values ('123','mateo','pere','32','','Admin/ff','')";

  if (mysqli_query($conn, $sql)){
  	echo "todook";
  }else{
  	echo "todo mal";
  }

  ?>