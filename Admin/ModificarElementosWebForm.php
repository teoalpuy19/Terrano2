<?php session_start();
if (isset($_SESSION['login_user'] )){
}else{
    header('Location:error.html',true,301);
    exit();
}?>
<!DOCTYPE html>
<html lang="en">
    <?php
    include '../conexion.php';
$sql = "select * from `Config` ";
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
                <h3>Adminstrar datos web </h3>
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
                    <form name="menuForm" action="ModificarElementosWeb.php" method="post" enctype="multipart/form-data" class="form-horizontal form-label-left">
                      <br>
                        <h3><strong>Modificar Pagina</strong></h3>
                        <p> Colores</p><select id="ProdCol1" name="ProdCol1" onchange="changeTest()" >
                         <?php if(isset($all_row) && is_object($all_row) && count($all_row)): $i=1;?>
					<?php foreach ($all_row as $key => $Config) { ?>
                         
                            <option data-valor="<?php echo $Config['value']; ?>" value=<?php echo $Config['id']."||".$Config['tipo']; ?>><?php echo $Config['descripcion']; ?></option>
                        <?php } ?>
								<?php endif; ?>
                         </select>
                        <br>
                        <p> Nombre </p> <textarea type="text" id="NombreConfig" name="ConfigValue"></textarea>
                      <input type="text" name="ConfigId"id="ColorId" style="visibility: hidden;">
                      <input type="file" name="fileToUpload" id="fileToUpload"> 
                      <input type="submit" value="Modificar Color" name="submit" id ="submitt" >
                  </form>
                    
                   
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
           var sel = document.getElementById('ProdCol1');
        var selected = sel.options[sel.selectedIndex];
        var extra = selected.getAttribute('data-valor');
           document.getElementById("NombreConfig").innerHTML = extra;
           var x = document.getElementById("ProdCol1").value;
           var aux =  x.split("||");
           document.getElementById("ColorId").value = aux[0];
           if (parseInt(aux[1])===1){
                document.getElementById("NombreConfig").style.cssText = " visibility: visible;";
               document.getElementById("fileToUpload").style.cssText = " visibility: hidden;";
           }else{
               document.getElementById("NombreConfig").style.cssText = " visibility: hidden;";
               document.getElementById("fileToUpload").style.cssText = " visibility: visible;";
           }
      function changeTest () { 
         var sel = document.getElementById('ProdCol1');
        var selected = sel.options[sel.selectedIndex];
        var extra = selected.getAttribute('data-valor');
           var x = document.getElementById("ProdCol1").value;
           var aux =  x.split("||");
           document.getElementById("ColorId").value = aux[0];
          if (parseInt(aux[1])===1){
               document.getElementById("NombreConfig").innerHTML = extra;
                document.getElementById("NombreConfig").style.cssText = " visibility: visible;"
               document.getElementById("fileToUpload").style.cssText = " visibility: hidden;"
           }else{
               document.getElementById("NombreConfig").style.cssText = " visibility: hidden;"
               document.getElementById("fileToUpload").style.cssText = " visibility: visible;"
           }
         
          
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

