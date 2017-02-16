<?php
include "../conexion.php";
 $Id = $_GET['Id'];
 $sqlSelect = "select * from `Colores` where `Id`='$Id'";
 $sql = "delete from `Colores` where `Id`='$Id'";
 if ($result=mysqli_query($conn, $sqlSelect)){
      while($row = $result->fetch_assoc()) {
//     $result = mysqli_query($conn, $sqlSelect);
        unlink("../".$row['imagen']);
 }
 }
 
 if(mysqli_query($conn, $sql)){
//     header("Location:AddColores.php");
  
 }
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

