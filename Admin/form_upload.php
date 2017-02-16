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
                <h3>Form Upload </h3>
              </div>


            </div>


            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                 <div class="x_content">
                    <h2>Dropzone multiple file uploader</h2>
                    <ul class="nav navbar-right panel_toolbox">
                     
                    
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>



                  <form action="AddProduct.php" method="post" enctype="multipart/form-data" class="form-horizontal form-label-left">
                      Select image to upload:
                      <p> Nombre producto</p> <input type="text" name="ProdName">
                      <p> Codigo producto</p><input type="text" name="ProdCod">
                      <p> Categoria producto</p><select name="ProdCat" >
                        <option value='B1'>Billeteras Hombre</option>
                        <option value='B2'>Billeteras Dama</option>
                        <option value='Mate'>Linea Mate</option>
                        <option value='Morrales'>Lineas Morrales</option>
                        <option value='Necessaire'>Necessaire</option>
                         <option value='Escritorio'>Escritorio-Ocio</option>
                      </select>
                     <p> Colores</p><select id="ProdCol" name="ProdCol" >
                         <?php if(isset($all_row) && is_object($all_row) && count($all_row)): $i=1;?>
					<?php foreach ($all_row as $key => $Colores) { ?>
                         
                                        <option  value=<?php echo $Colores['id']; ?>><?php echo $Colores['nombre']; ?></option>
                        <?php } ?>
								<?php endif; ?>
				<?php $conn->close() ?>
                                       
                      </select><input id="colores" type="text" name="ProdCol" readonly size="160">
                                <input id="ColoresGuardar" type="text" name="ColoresGuardar" readonly size="160" style="visibility: hidden;">
                      
                    
                      <input type="file" name="fileToUpload" id="fileToUpload">
                      <input type="submit" value="Upload Image" name="submit">
                  </form>
                     <button  onclick="AgregarColor()" id="AgregarColor">Agregar Color</button> <button  onclick="BorrarColor()" id="AgregarColor">Borrar Color</button>


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
     var coloresguardar =[];
     var colores = [];
      function AgregarColor(){
      $color = $( "#ProdCol option:selected" ).text();
      colorsave = document.getElementById("ProdCol").value;
      var a = colores.indexOf($color);
      if (a ===-1){
        colores.push($color);
        coloresguardar.push(colorsave);
      document.getElementById("colores").value = colores;
document.getElementById("ColoresGuardar").value = coloresguardar;
                }
            }

      function BorrarColor(){
        var ColorGuardar = document.getElementById("ProdCol").value;
        var ColorMostrar = $( "#ProdCol option:selected" ).text();
        var indexMostrar = colores.indexOf(ColorMostrar);
        var indexGuardar = coloresguardar.indexOf(ColorGuardar);
        if (indexMostrar > -1){
            colores.splice(indexMostrar,1);
           coloresguardar.splice(indexGuardar,1);
        }   
              document.getElementById("ColoresGuardar").value = coloresguardar;
      document.getElementById("colores").value = colores;
      }
     
    </script>
     <script>
      $(document).ready(function() {
        $('.demo1').colorpicker();
        $('.demo2').colorpicker();

        $('#demo_forceformat').colorpicker({
            format: 'rgba',
            horizontal: true
        });

        $('#demo_forceformat3').colorpicker({
            format: 'rgba',
        });

        $('.demo-auto').colorpicker();
      });
    </script>
    <!-- /Bootstrap Colorpicker -->
    <!-- Bootstrap -->
    

 
  
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
