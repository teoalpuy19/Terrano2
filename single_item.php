 <?php 
    include "conexion.php";
    $Id = $_GET['Id'];
    $sql = "Select * from `Producto` where `id` = $Id";
    $sqlColores = "Select * from `Colores`";
    if ($conn->query($sqlColores)){
          $all_row =    $conn->query($sqlColores);
        
    }else {
        echo "todomall";
    }
    
    if ($conn->query($sql)){
          $resultado =    $conn->query($sql);
         $row = $resultado->fetch_assoc();
    }
    ?>

<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
    
   
<head>
	<title>Producto-Terrano</title>

	<!-- Meta -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="">

	<!-- Favicon -->
	<link rel="shortcut icon" href="favicon.ico">

	<!-- Web Fonts -->
	<link rel="stylesheet" href="//fonts.googleapis.com/css?family=Open+Sans:400,300,600&amp;subset=cyrillic,latin">

	<!-- CSS Global Compulsory -->
	<link rel="stylesheet" href="assets/plugins/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/style.css">
	<link rel="stylesheet" href="assets/css/shop.style.css">
	

	<!-- CSS Header and Footer -->
	<link rel="stylesheet" href="assets/css/headers/header-v6.css">
	<link rel="stylesheet" href="assets/css/footers/footer-v1.css">

	<!-- CSS Implementing Plugins -->
	<link rel="stylesheet" href="assets/plugins/animate.css">
	<link rel="stylesheet" href="assets/plugins/line-icons/line-icons.css">
	<link rel="stylesheet" href="assets/plugins/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="assets/plugins/owl-carousel/owl-carousel/owl.carousel.css">
	

	<!-- CSS Page Style -->
	<link rel="stylesheet" href="assets/css/pages/portfolio-v1.css">

	<!-- CSS Theme -->
	<link rel="stylesheet" href="assets/css/theme-colors/default.css" id="style_color">
	<link rel="stylesheet" href="assets/css/theme-skins/dark.css">

	<!-- CSS Customization -->
	<link rel="stylesheet" href="assets/css/custom.css">
	<style >
.color-one{
	width: 65px;
	height: 65px;
	float: right;
	padding: 5px;
	display: block;
	font-size: 24px;
	text-align: center;
}

	</style>
</head>

<body class="header-fixed">
	<div class="header-fixed">
            <div class="wrapper">
                <div class="header-v6 header-dark-transparent header-sticky">
					<div class="navbar mega-menu" role="navigation">
                                            <div class="container">
						<div class="menu-container header-fixed-shrink">
                                                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
                                                                <span class="sr-only">Toggle navigation</span>
                                                                <span class="icon-bar"></span>
                                                                <span class="icon-bar"></span>
                                                                <span class="icon-bar"></span>
                                                            </button>
                                                             <!-- Logo esquina -->
                                                            <div class="navbar-brand active">
                                                                  <a href="index..html">
                                                                        <img class="default-logo " src="assets/Terrano/logo.png"  alt="Logo" >
                                                                        <img class="shrink-logo" src="assets/Terrano/logo.png" alt="logo">

                                                                </a>
                                                            </div>
                                                            <!-- Header Inner Right -->
						<div class="header-inner-right">
							<ul class="menu-icons-list">


							</ul>
						</div>
						<!-- End Header Inner Right -->
					</div>


					<div class="collapse navbar-collapse navbar-responsive-collapse">
							<div class="menu-container">
											<ul class="nav navbar-nav">
													<li  >
															<a href="index..html">Inicio</a>
													</li>
													<li>
															<a href="page_about.html">Empresa</a>
													</li>
													<li class="active">
															<a href="Productos.php">Productos</a>
													</li>
													<li >
															<a href="page_Contact1.html">Contacto</a>
													</li>
											</ul>
									</div>
					</div>
					</div>

		</div>
            </div>
        </div>
	</div>


			<!-- End Navbar -->
		<!--=== End Header ===-->
                <div class="breadcrumbs" style="margin-top: 9%;" >
			<div class="container">
                            <h1 class="pull-left"><strong>Producto :</strong> <?php echo strtoupper($row['Name']);?></h1>
				
			</div><!--/container-->
		</div><!--/breadcrumbs-->
	

		<!--=== Content Part ===-->
		<div class="container content" style="margin-top: 0%" >
			<div class="row portfolio-item margin-bottom-50" style="">
                          
				<!-- Carousel -->
				<div class="col-md-7" style="margin-top: 0%;">
					<div class="carousel slide carousel-v1" id="myCarousel" >
						<div class="carousel-inner" >
							<div class="item active" >
                                                            <img class="img-responsive" alt="" src=<?php echo $row['ImageShow'];?> >
								
							</div>
							
							
						</div>

						
					</div>
				</div>
				<!-- End Carousel -->

				<!-- Content Info -->
				
					
					<div class="col-md-5" >
                                            <h2>Informacion Producto</h2>
					<h3 class="shop-product-title"><?php echo "<strong>Nombre:</strong> ".$row['Name']; ?>
						</h3>
                                         <h3 class="shop-product-title"><?php echo "<strong>Codigo:</strong> ".$row['Cod']; ?>
						</h3>
                                            <?php if (strlen($row['colores'])>0){ ?>
					<h3 class="shop-product-title">Colores</h3>
						<ul class="list-inline product-color margin-bottom-30">
                                                     <?php if(isset($all_row) && is_object($all_row) && count($all_row)): $i=1;?>
                                                    <?php foreach ($all_row as $key => $Colores) { ?>
                                                    <?php  $colore = explode(",", $row['Colores']);
                                                    for ($i = 0; $i < count($colore); $i++) {
                                                        if ($Colores['id'] === $colore[$i]){?>
                                                            <li >
								<!--<input type="radio" id="color-1" name="color">-->
                                                                 <image class="color-one" src=<?php echo $Colores['imagen'] ?>></image>
							</li>
                                                        <?php
                                                        }
                                                    }
                                                    ?>
							
                                                    <?php }?>
                  
								<?php endif; ?>
				<?php  ?>
						</ul><!--/end product color-->
				</div>
                                            <?php }?>
				<!-- End Content Info -->
			</div><!--/row-->
                        
			

			<div class="margin-bottom-20 clearfix"></div>

			<!-- Recent Works -->
			<div class="owl-carousel-v1 owl-work-v1 margin-bottom-40">
				<div class="headline"><h2 class="pull-left">Articulos similares</h2>
					<div class="owl-navigation">
						<div class="customNavigation">
							<a class="owl-btn prev-v2"><i class="fa fa-angle-left"></i></a>
							<a class="owl-btn next-v2"><i class="fa fa-angle-right"></i></a>
						</div>
					</div><!--/navigation-->
				</div>
                            <div class="owl-recent-works-v1">
                            <?php 
                            $sql= "select * from `Producto` where `Category` = '$row[Category]'";
                            if ($conn ->query($sql)){
                            $resultado = $conn ->query($sql);
                           
                            }
                            ?>
                            <?php
                           if(isset($resultado) && is_object($resultado) && count($resultado)): $i=1;
                            foreach ($resultado as $key => $Productos) {
                                
                         ?>
					<div class="item" ">
                                            <a href="single_item.php?Id=<?php echo $Productos['id']; ?>">
							<em class="overflow-hidden">
								<img class="img-responsive" src=<?php echo $Productos['ImageShow'];?> alt="" style="height: 200px;  ">
							</em>
							<span>
								<strong><?php echo $Productos['Name'];?></strong>
								<i><?php echo "COD: ".$Productos['Cod']?> </i>
							</span>
						</a>
					</div>
                        <?php
                            }
                         endif;
                            
                            ?>	
				</div>
			</div>
			<!-- End Recent Works -->
		</div><!--/container-->
		<!--=== End Content Part ===-->

		<!--=== Footer Version 1 ===-->
			<div id="footer-default" class="footer-default">
			<div class="footer">
				<div class="container">
					<div class="row">
						<div class="col-md-4 md-margin-bottom-40">
							<!-- About -->
							<div class="headline"><h2>Sobre Nosotros</h2></div>
							<p class="margin-bottom-25 md-margin-bottom-40">Somos una empresa que nace en el año 1991, como exportadora de artículos de cuero,
                                                            basada en la calidad final de nuestros productos como principal atributo.</p>
							<!-- End About -->

							<!-- Monthly Newsletter -->
                
							<!-- End Monthly Newsletter -->
						</div>

						<div class="col-md-4 md-margin-bottom-40">
							<!-- Recent Blogs -->
							<div class="posts">
								<div id="ajax_result">
							<div class="headline"><h2>Recibi la mejores ofertas</h2></div>
							<p>Suscribite y no te pierdas de las mejores ofertas</p>

							<form class="footer-subscribe" method="Get">
								<div class="input-group">
									<input type="text" class="form-control" id="email" name="email" placeholder="Email">
									<span class="input-group-btn">
										<button class="btn-u" type="button"  id="myBtn" >Suscribirse</button>
									</span>

								</div>

							</form>
              </div>
								
							</div>
							<!-- End Recent Blogs -->
						</div>

						<div class="col-md-4">
							<!-- Contact Us -->
							<div class="headline"><h2>Contacto</h2></div>
							<address class="md-margin-bottom-40">
								Arenal grande 2123 <br />
								Montevideo, Uruguay <br />
								Telefono: 098691744 <br />
								Email: <a href="mailto:info@anybiz.com" class="">info@terrano.com.uy</a>
							</address>
							<!-- End Contact Us -->

							<!-- Social Links -->
							<div class="headline"><h2>Conectate </h2></div>
							<ul class="social-icons">
								<li><a href="https://www.facebook.com/TerranoUruguay/?fref=ts" data-original-title="Facebook" class="social_facebook"></a></li>
								

							</ul>
							<!-- End Social Links -->
						</div><!--/col-md-4-->
					</div>
				</div>
			</div><!--/footer-->

			<div class="copyright">
				<div class="container">
					<div class="row">
						<div class="col-md-6">
							<p>
								2015 &copy; Unify. ALL Rights Reserved.
								<a href="#">Privacy Policy</a> | <a href="#">Terms of Service</a>
							</p>
						</div>
						<div class="col-md-6">
							<a href="index..html">
								<img class="pull-right" id="logo-footer" src="assets/Terrano/logo.png" alt="">
							</a>
						</div>
					</div>
				</div>
			</div><!--/copyright-->
		</div>
	</div><!--/wrapper-->

	<!--=== Style Switcher ===-->
	<i class="style-switcher-btn fa fa-cogs hidden-xs"></i>
	<div class="style-switcher animated fadeInRight">
		<div class="style-swticher-header">
			<div class="style-switcher-heading">Style Switcher</div>
			<div class="theme-close"><i class="icon-close"></i></div>
		</div>

		<div class="style-swticher-body">
			<!-- Theme Colors -->
			<div class="style-switcher-heading">Theme Colors</div>
			<ul class="list-unstyled">
				<li class="theme-default theme-active" data-style="default" data-header="light"></li>
				<li class="theme-blue" data-style="blue" data-header="light"></li>
				<li class="theme-orange" data-style="orange" data-header="light"></li>
				<li class="theme-red" data-style="red" data-header="light"></li>
				<li class="theme-light" data-style="light" data-header="light"></li>
				<li class="theme-purple last" data-style="purple" data-header="light"></li>
				<li class="theme-aqua" data-style="aqua" data-header="light"></li>
				<li class="theme-brown" data-style="brown" data-header="light"></li>
				<li class="theme-dark-blue" data-style="dark-blue" data-header="light"></li>
				<li class="theme-light-green" data-style="light-green" data-header="light"></li>
				<li class="theme-dark-red" data-style="dark-red" data-header="light"></li>
				<li class="theme-teal last" data-style="teal" data-header="light"></li>
			</ul>

			<!-- Theme Skins -->
			<div class="style-switcher-heading">Theme Skins</div>
			<div class="row no-col-space margin-bottom-20 skins-section">
				<div class="col-xs-6">
					<button data-skins="default" class="btn-u btn-u-xs btn-u-dark btn-block active-switcher-btn handle-skins-btn">Light</button>
				</div>
				<div class="col-xs-6">
					<button data-skins="dark" class="btn-u btn-u-xs btn-u-dark btn-block skins-btn">Dark</button>
				</div>
			</div>

			<hr>

			<!-- Layout Styles -->
			<div class="style-switcher-heading">Layout Styles</div>
			<div class="row no-col-space margin-bottom-20">
				<div class="col-xs-6">
					<a href="javascript:void(0);" class="btn-u btn-u-xs btn-u-dark btn-block active-switcher-btn wide-layout-btn">Wide</a>
				</div>
				<div class="col-xs-6">
					<a href="javascript:void(0);" class="btn-u btn-u-xs btn-u-dark btn-block boxed-layout-btn">Boxed</a>
				</div>
			</div>

			<hr>

			<!-- Theme Type -->
			<div class="style-switcher-heading">Theme Types and Versions</div>
			<div class="row no-col-space margin-bottom-10">
				<div class="col-xs-6">
					<a href="E-Commerce/index.html" class="btn-u btn-u-xs btn-u-dark btn-block">Shop UI <small class="dp-block">Template</small></a>
				</div>
				<div class="col-xs-6">
					<a href="One-Pages/Classic/index.html" class="btn-u btn-u-xs btn-u-dark btn-block">One Page <small class="dp-block">Template</small></a>
				</div>
			</div>

			<div class="row no-col-space">
				<div class="col-xs-6">
					<a href="Blog-Magazine/index.html" class="btn-u btn-u-xs btn-u-dark btn-block">Blog <small class="dp-block">Template</small></a>
				</div>
				<div class="col-xs-6">
					<a href="RTL/index.html" class="btn-u btn-u-xs btn-u-dark btn-block">RTL <small class="dp-block">Version</small></a>
				</div>
			</div>
		</div>
	</div><!--/style-switcher-->
	<!--=== End Style Switcher ===-->

	<!-- JS Global Compulsory -->
	<script type="text/javascript" src="assets/plugins/jquery/jquery.min.js"></script>
	<script type="text/javascript" src="assets/plugins/jquery/jquery-migrate.min.js"></script>
	<script type="text/javascript" src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
	<!-- JS Implementing Plugins -->
	<script type="text/javascript" src="assets/plugins/back-to-top.js"></script>
	<script type="text/javascript" src="assets/plugins/smoothScroll.js"></script>
	<script type="text/javascript" src="assets/plugins/owl-carousel/owl-carousel/owl.carousel.js"></script>
	<!-- JS Customization -->
	<script type="text/javascript" src="assets/js/custom.js"></script>
	<!-- JS Page Level -->
	<script type="text/javascript" src="assets/js/app.js"></script>
	<script type="text/javascript" src="assets/js/plugins/style-switcher.js"></script>
	<script type="text/javascript" src="assets/js/plugins/owl-recent-works.js"></script>
	<script type="text/javascript">
		jQuery(document).ready(function() {
			App.init();
			StyleSwitcher.initStyleSwitcher();
			OwlRecentWorks.initOwlRecentWorksV1();
		});
	</script>
	<!--[if lt IE 9]>
	<script src="assets/plugins/respond.js"></script>
	<script src="assets/plugins/html5shiv.js"></script>
	<script src="assets/plugins/placeholder-IE-fixes.js"></script>
	<![endif]-->
</body>
</html>
