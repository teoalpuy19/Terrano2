<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style>
  .modal-header, h4, .close {
      background-color: #5cb85c;
      color:white !important;
      text-align: center;
      font-size: 30px;
  }
  .modal-footer {
      background-color: #f9f9f9;
  }
  
  </style>
   <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Administracion Terrano| </title>

    <!-- Bootstrap -->
    <link href="../Admin/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../Admin/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../Admin/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Dropzone.js -->
    <link href="../Admin/vendors/dropzone/dist/min/dropzone.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../Admin/build/css/custom.min.css" rel="stylesheet">
     <link href="../Admin/vendors/mjolnic-bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css" rel="stylesheet">
 
</head>
<?php 
include "../conexion.php";
$id = $_GET['Id'];
$sql= "select * from `Producto` where `id`= '$id'";

if(mysqli_query($conn, $sql)){
	$all_row = mysqli_query($conn, $sql);
	$row = $all_row ->fetch_assoc();

}
?>
<body>

<div class="container">
  <h2>Modal Login Example</h2>
  <!-- Trigger the modal with a button -->
  <button type="button" class="btn btn-default btn-lg" id="myBtn">Login</button>

  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header" style="padding:35px 50px;">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4><span class="glyphicon glyphicon-lock"></span> Login</h4>
        </div>
        <div class="modal-body" style="padding:40px 50px;">
          <form role="form">
            <div class="form-group">
              <label ><span class="glyphicon glyphicon-user"></span> Nombre</label>
              <input type="text" class="form-control" id="nombre" placeholder=<?php echo $row['Name'];?>>
            </div>
            <div class="form-group">
              <label for="psw"><span class="glyphicon glyphicon-eye-open"></span> Codigo</label>
              <input type="text" class="form-control" id="codigo" placeholder="Enter password">
            </div>
            <div class="form-group">
              <label ><span class="glyphicon glyphicon-user"></span> Categoria</label>
              <input type="text" class="form-control" id="codigo" class="form-control"  placeholder=<?php echo $row['Category'];?>>
            </div>
           <div class="form-group">
              <label ><span class="glyphicon glyphicon-upload"></span> Archivo: </label>
              <input type="file" name="fileToUpload" id="" class="form-control"  >
            </div>
               <div class="form-group">
              <label ><span class="glyphicon glyphicon-tint"></span> Colores </label>
              <input type="file" name="fileToUpload" id="fileToUpload" class="form-control"  >
            </div>
              <button onclick="Ver()" type="submit" class="btn btn-success btn-block" id="confirmar"><span class="glyphicon glyphicon-off"></span> Modificar Producto</button>
               
          </form>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-danger btn-default pull-left" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
        </div>
      </div>
      
    </div>
  </div> 
</div>
 

<script type="text/javascript">
document.getElementById("confirmar").onclick = Ver();
var nombre = document.getElementById("nombre").value;
var codigo =  document.getElementById("codigo").value;
function Ver(){
    alert()
<?php 
$nombre = nombre;
echo "alert(".$nombre.")"   ;
?>
    }
</script>

<script>
$(document).ready(function(){
    $("#myBtn").click(function(){
        $("#myModal").modal();
    });
});
</script>

</body>
</html>

