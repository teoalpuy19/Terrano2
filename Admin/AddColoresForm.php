<!DOCTYPE html>
<html lang="en">
    <?php
    include '../conexion.php';
$sql = "select * from `Colores` ";
$all_row = mysqli_query($conn, $sql);
?>
    <head>
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

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="index.html" class="site_title"><i class="fa fa-paw"></i> <span>Administracion </span></a>
            </div>

            <div class="clearfix"></div>



            <br />
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
                  <li><a><i class="fa fa-home"></i> Productos <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                     <li><a href="form_upload.php">Insertar</a></li>
                      <li><a href="Modificar.php">Modificar</a></li>
                      <li><a href="AddColoresForm.php">Gestionar Colores</a></li>
                    </ul>
                      </li>
                  </ul>


                </div>
              </div>




          </div>
        </div>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Cargar Colores </h3>
              </div>


            </div>


            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                 <div class="x_content">
                  
                    <ul class="nav navbar-right panel_toolbox">
                     
                    
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>

                    <form action="AddColores.php" method="post" enctype="multipart/form-data" class="form-horizontal form-label-left">
                      <br>
                        <h3><strong>Agregar colores</strong></h3>
                        <br>
                      <p> Nombre </p> <input type="text" name="NombreColor">
                      <input type="file" name="fileToUpload" id="fileToUpload">
                      <input type="submit" value="AgregarColor" name="submit">
                  </form>
                    <div>
                        <form  enctype="multipart/form-data" class="form-horizontal form-label-left">
                        <br>
                        <h3><strong>Eliminar colores</strong></h3>
                        <br>
                        <p> Colores</p><select id="ProdCol" name="ProdCol"  >
                         <?php if(isset($all_row) && is_object($all_row) && count($all_row)): $i=1;?>
					<?php foreach ($all_row as $key => $Colores) { ?>
                         
                                        <option  value=<?php echo $Colores['id']; ?>><?php echo $Colores['nombre']; ?></option>
                        <?php } ?>
								<?php endif; ?>
				<?php $conn->close() ?>
                                        </select>
                                        <br>
                                        <input onclick="Borrar()" type="submit" value="Eliminar " id="Eliminar" name="submit">
                     </form>
                        <form name="menuForm" action="ModificarColores.php" method="post" enctype="multipart/form-data" class="form-horizontal form-label-left">
                      <br>
                        <h3><strong>Modificar Colores</strong></h3>
                        <p> Colores</p><select id="ProdCol1" name="ProdCol1" onchange="changeTest()" >
                         <?php if(isset($all_row) && is_object($all_row) && count($all_row)): $i=1;?>
					<?php foreach ($all_row as $key => $Colores) { ?>
                         
                                        <option  value=<?php echo $Colores['id']; ?>><?php echo $Colores['nombre']; ?></option>
                        <?php } ?>
								<?php endif; ?>
				<?php $conn->close() ?>
                         </select>
                        <br>
                      <p> Nombre </p> <input type="text" name="NombreColor">
                      <input type="text" name="ColorId"id="ColorId" >
                      <input type="file" name="fileToUpload" id="fileToUpload"> 
                      <input type="submit" value="Modificar Color" name="submit" id ="submitt" onclick="alert('Se modifico color correctamente');">
                  </form>
                    </div>
                </div>
              </div>
              
            </div>
          </div>
        </div>
        <!-- /page content -->

        <!-- footer content -->

        <!-- /footer content -->
      </div>
    </div>
      <script>
          document.getElementById("ColorId").value = document.getElementById("ProdCol1").value
      function changeTest () { 
          document.getElementById("ColorId").value = document.getElementById("ProdCol1").value;
         }
      document.getElementById("Eliminar").onclick = Borrar;
      function Borrar(){
         if (confirm("Esta seguro que desea realizar esta accion?")){
          var color=document.getElementById("ProdCol").value;
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("ajax_result").innerHTML = this.responseText;
                }
            };
            xmlhttp.open("GET", "DeleteColores.php?Id="+color,true);
            xmlhttp.send();
          }
        };

      </script>
    <script>
     var coloresguardar =[];
     var colores = [];
      function AgregarColor(){
      $color = document.getElementById("ProdCol").value;
      var a = colores.indexOf($color);
      if (a ===-1){
        colores.push($color);
      document.getElementById("colores").value = colores;
                }
            }

      function BorrarColor(){
             colores.pop();
              document.getElementById("colores").value = colores;
      }
      
    </script>
   
    <!-- /Bootstrap Colorpicker -->
    <!-- Bootstrap -->
    

 
  <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
<script src="../Admin/vendors/mjolnic-bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>
    <!-- jQuery -->
    <script src="../Admin/vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="../Admin/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="../Admin/vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="../Admin/vendors/nprogress/nprogress.js"></script>
    <!-- Dropzone.js -->
    <script src="../Admin/vendors/dropzone/dist/min/dropzone.min.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="../Admin/build/js/custom.min.js"></script>
  </body>
</html>
