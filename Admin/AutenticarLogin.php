<?php
include("../conexion.php");
   session_start();
   
if (isset($_POST['username'])){
   $myusername = mysqli_real_escape_string($conn,$_POST['username']);
}
if (isset($_POST['password'])){
  $mypassword = mysqli_real_escape_string($conn,$_POST['password']); 
}
      // username and password sent from form 
      
      
      
      
      $sql = "SELECT `id` FROM `Config` WHERE `id` = '$myusername' and `value` = '$mypassword'";
      $result = mysqli_query($conn,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $active = $row['active'];
      
      $count = mysqli_num_rows($result);
      // If result matched $myusername and $mypassword, table row must be 1 row
		
      if($count === 1) {
          header("Location:form_upload.php");
      }else {
         echo  "Your Login Name or Password is invalid";
      }
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

