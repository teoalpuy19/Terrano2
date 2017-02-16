<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
</
<head>
	<title>Productos-Terrano</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
	<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
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

	<!-- CSS Header and Footer -->
	<link rel="stylesheet" href="assets/css/headers/header-v6.css">
	<link rel="stylesheet" href="assets/css/footers/footer-v1.css">

	<!-- CSS Implementing Plugins -->
	<link rel="stylesheet" href="assets/plugins/animate.css">
	<link rel="stylesheet" href="assets/plugins/line-icons/line-icons.css">
	<link rel="stylesheet" href="assets/plugins/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="assets/plugins/cube-portfolio/cubeportfolio/css/cubeportfolio.min.css">
	<link rel="stylesheet" href="assets/plugins/cube-portfolio/cubeportfolio/custom/custom-cubeportfolio.css">

	<!-- CSS Theme -->
	<link rel="stylesheet" href="assets/css/theme-colors/default.css" id="style_color">
	<link rel="stylesheet" href="assets/css/theme-skins/dark.css">

	<!-- CSS Customization -->
	<link rel="stylesheet" href="assets/css/custom.css">

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
															<a href="page_contact.html">Contacto</a>
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

		<!--=== Breadcrumbs v3 ===-->
		<div class="breadcrumbs-v3 img-v1">
			<div class="container text-center">
				<p>Productos</p>
				
			</div><!--/end container-->
		</div>
		<!--=== End Breadcrumbs v3 ===-->

		<!--=== Cube-Portfdlio ===-->

		<div class="cube-portfolio container margin-bottom-60">
			<div class="content-xs">
				<form id="search_form" method="POST">
				<div id="filters-container" class="cbp-l-filters-text content-xs" >
					<div class=" cbp-filter-item cbp-filter-item-active"> <a href="Productos.php"> Todos </a> </div>|
					<div  name="sort" class="sort_rang cbp-filter-item"><a href="ProductoBilleteras.php">Billeteras</a></div>|
					<div  name="sort" class="sort_rang cbp-filter-item"><a href="ProductosNecessaire.php">Necessaire</a></div>|
					<div  name="sort" class="sort_rang cbp-filter-item"><a href="ProductosLineaMate.php">Línea Mate</a></div>|
					<div  name="sort" class="sort_rang cbp-filter-item"><a href="ProductosLineaMorrales.php">Línea Morrales</a></div>|
					<div  name="sort" class="sort_rang cbp-filter-item"><a href="ProductosEscritorioOcio.php">Escritorio-Ocio</a></div>|
				</div><!--/end Filters Container-->
					</form>

			</div>
	<div id="grid-container" class="cbp-l-grid-agency" >
		<div id="ajax_result" >



				<?php
						 include "conexion.php";
                                              $sql = "SELECT * FROM Producto where `Category`='Escritorio'";
						$all_row= mysqli_query($conn, $sql);
					
				?>
				<?php if(isset($all_row) && is_object($all_row) && count($all_row)): $i=1;?>
					<?php foreach ($all_row as $key => $Productos) { ?>

						<div class="web-design cbp-item ">
				
									<div class="cbp-caption margin-bottom-20">
										<div class="cbp-caption-defaultWrap">
											<img src=<?php echo $Productos['ImageShow']; ?> style="height:240px; " alt="">
										</div>
										<div class="cbp-caption-activeWrap">
											<div class="cbp-l-caption-alignCenter">
												<div class="cbp-l-caption-body">
													<ul class="link-captions no-bottom-space">
														<li><a href="single_item.php?Id=<?php echo $Productos['id'];?>"><i class="rounded-x fa fa-link"></i></a></li>
														<li><a href=<?php echo $Productos['ImageShow']; ?> class="cbp-lightbox" data-title=<?php echo $Productos['Name']."-".$Productos['Cod']; ?>><i class="rounded-x fa fa-search"></i></a></li>
													</ul>
												</div>
											</div>
										</div>
									</div>
									<div class="cbp-title-dark">
										<div class="cbp-l-grid-agency-title"><?php echo $Productos['Name'] ?></div>
										<div class="cbp-l-grid-agency-desc"><?php  echo "COD: ".$Productos['Cod']?></div>
									</div>
								
								</div>	<?php } ?>
								<?php endif; ?>
				<?php $conn->close() ?>
						<!--/end Grid Container-->
		</div>
	</div>
</div>

		<!--=== End Cube-Portfdlio ===-->
                 <!--=== Footer ===-->
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
								
							<div class="headline"><h2>Recibi la mejores ofertas</h2></div>
							<p>Suscribite y no te pierdas de las mejores ofertas</p>
<div id="ajax_subscribe">
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
								Telefono: 2924 4397 <br />
								Email: <a href="mailto:terranoventas@gmail.com" class="">terranoventas@gmail.com</a>
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
		<!--=== End Footer ===-->

	<!--=== End Illustration v3 ===-->



	<!--=== End Style Switcher ===-->

	<!-- JS Global Compulsory -->
		<script>
 document.getElementById("myBtn").onclick = Subscribir;
function Subscribir(){
  var xmlhttp = new XMLHttpRequest();
  var mail = document.getElementById("email").value;
  xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
          document.getElementById("ajax_subscribe").innerHTML = this.responseText;
      }
  };
  xmlhttp.open("GET", "Subscribe.php?mail="+mail,true);
  xmlhttp.send();
};


</script>


<script>
function Filtrar(str) {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("ajax_result").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET", "ajax_product.php?sort="+str,true);
        xmlhttp.send();
    };

</script>
        <script type="text/javascript" src="assets/js/Productos.js"></script>
	<script type="text/javascript" src="assets/plugins/jquery/jquery.min.js"></script>
	<script type="text/javascript" src="assets/plugins/jquery/jquery-migrate.min.js"></script>
	<script type="text/javascript" src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
	<!-- JS Implementing Plugins -->
	<script type="text/javascript" src="assets/plugins/back-to-top.js"></script>
	<script type="text/javascript" src="assets/plugins/smoothScroll.js"></script>
	<script type="text/javascript" src="assets/plugins/cube-portfolio/cubeportfolio/js/jquery.cubeportfolio.min.js"></script>
	<!-- JS Customization -->
	<script type="text/javascript" src="assets/js/custom.js"></script>
	<!-- JS Page Level -->
	<script type="text/javascript" src="assets/js/app.js"></script>
	<script type="text/javascript" src="assets/js/plugins/cube-portfolio/cube-portfolio-4.js"></script>
	<script type="text/javascript" src="assets/js/plugins/style-switcher.js"></script>
	<script type="text/javascript">
		jQuery(document).ready(function() {
			App.init();
		});
	</script>
	<!--[if lt IE 9]>
	<script src="assets/plugins/respond.js"></script>
	<script src="assets/plugins/html5shiv.js"></script>
	<script src="assets/plugins/placeholder-IE-fixes.js"></script>
	<![endif]-->
</body>
</html>