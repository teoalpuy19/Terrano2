<?php session_start();
if (isset($_SESSION['login_user'] )){
}else{
    header('Location:error.html',true,301);
    exit();
}?>
<!DOCTYPE html>
<html lang="en">

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
                <h3 id="gallery"> Media Gallery <small> gallery design</small> </h3>
              </div>
              <div id="modificar">
              </div>
                

              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                        <button class="btn btn-default" type="button">Go!</button>
                    </span>
                  </div>
                </div>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Media Gallery <small> gallery design </small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#">Settings 1</a>
                          </li>
                          <li><a href="#">Settings 2</a>
                          </li>
                        </ul>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                    <div class="row">

                      <p>Media gallery design emelents</p>
                      <?php
                          include "../conexion.php";
                          $sql = "SELECT * FROM Producto";
                        $all_row=   mysqli_query($conn, $sql)
                           
                      ?>
                      <?php if(isset($all_row) && is_object($all_row) && count($all_row)): $i=1;?>
                        <?php foreach ($all_row as $key => $Productos) { ?>
                      <div class="col-md-55">
                        <div class="thumbnail">
                          <div class="image view view-first">
                            <img style="width: 100%; display: block;" <?php echo "src=../".$Productos['ImageShow'];?> alt="image" />
                            <div class="mask">
                              <p>Your Text</p>
                              <div class="tools tools-bottom">
                                  <a href=<?php echo "ModificarElementoForm.php?Id=".$Productos['id']; ?> ><i   class="fa fa-pencil"></i></a>

                                <a id="Delete" href=""  ><i onclick="Eliminar(<?php echo $Productos['id']; ?>)" class="fa fa-times"></i></a>
                              </div>
                            </div>
                          </div>
                          <div class="caption">
                            <p><?php  echo $Productos['Name'];?></p>
                          </div>
                        </div>
                      </div><?php } ?>
      								<?php endif; ?>
      				<?php $conn->close() ?>

                        </div>

                      </div>
                      <div id="ajax_result"> </div>

                    </div>
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
    function Modificar(Id){
     var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("ajax_result").innerHTML = this.responseText;
                }
            };
            xmlhttp.open("GET", "ModificarElementoForm.php?Id="+Id,true);
            xmlhttp.send();
    };
    </script>

    <script>
    function Eliminar(str) {
       if (confirm("Esta seguro que desea realizar esta accion?")){
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("ajax_result").innerHTML = this.responseText;
                }
            };
            xmlhttp.open("GET", "Delete.php?sort="+str,true);
            xmlhttp.send();
        }
      };
    </script>
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