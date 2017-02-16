<!DOCTYPE html>
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
include "conexion.php";
$sql = "Select * from `Config`";
if (mysqli_query($conn, $sql)){
    $all_row = mysqli_query($conn, $sql); 
}
     if(isset($all_row) && is_object($all_row) && count($all_row)): $i=1;
        foreach ($all_row as $key => $Configuracion) { 
            if ($Configuracion['id']==="h1"){
                $h1 = $Configuracion['value'];
            }
             if ($Configuracion['id']==="h2"){
                $h2 = $Configuracion['value'];
            }
             if ($Configuracion['id']==="phPortada1"){
                $phPortada1 = $Configuracion['value'];
            }
             if ($Configuracion['id']==="phPortada2"){
                $phPortada2 = $Configuracion['value'];
            }
             if ($Configuracion['id']==="phProductosPortada1"){
                $phProductosPortada1 = $Configuracion['value'];
            }
             if ($Configuracion['id']==="phProductosPortada2"){
                $phProductosPortada2 = $Configuracion['value'];
            }
           
        }
        endif;

?>
<html>
    <head>
        <link rel="icon" href="favicon.ico" type="image/x-icon">
        <title>Terrano</title>

            <!-- Meta -->
            <meta charset="utf-8">
            <meta content="width=device-width, initial-scale=1.0" name="viewport">
            <meta content="" name="description">
            <meta content="" name="author">

            <!-- Favicon -->
            <link rel="shortcut icon" href="favicon.ico">

            <!-- Web Fonts -->
            <link rel="shortcut" type="text/css" href="//fonts.googleapis.com/css?family=Open+Sans:400,300,600&subset=cyrillic,latin">

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
            <link rel="stylesheet" href="assets/plugins/fancybox/source/jquery.fancybox.css">
            <link rel="stylesheet" href="assets/plugins/owl-carousel/owl-carousel/owl.carousel.css">
            <link rel="stylesheet" href="assets/plugins/master-slider/masterslider/style/masterslider.css">
            <link rel='stylesheet' href="assets/plugins/master-slider/masterslider/skins/black-2/style.css">



            <!-- CSS Theme -->
            <link rel="stylesheet" href="assets/css/theme-colors/default.css" id="style_color">

            <!-- CSS Customization -->
            <link rel="stylesheet" href="assets/css/custom.css">

    </head>
    <body>
		
        <!-- Collect the nav links, forms, and other content for toggling -->
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
                                                                  <a href="index.php">
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
                                                            <li class="active" >
                                                                <a href="index..html">Inicio</a>
                                                            </li>
                                                            <li>
                                                                <a href="page_about.html">Empresa</a>
                                                            </li>
                                                            <li>
                                                                <a href="Productos.php">Productos</a>
                                                            </li>
                                                            <li>
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

		<!--=== End Header v6 ===-->
<div id="slider">

		</div>

		

<div id="Inicio" >
		<!--=== Slider ===-->
		<div class="ms-layers-template">
			<!-- masterslider -->
			<div class="master-slider ms-skin-black-2 round-skin" id="masterslider">
				<div class="ms-slide" style="z-index: 10">
					<img src=<?php echo $phPortada1; ?> data-src=<?php echo $phPortada1; ?>  alt="">
					<div class="ms-layer ms-promo-info color-light" style="left:15px; top:160px"
					data-effect="bottom(40)"
					data-duration="2000"
					data-delay="700"
					data-ease="easeOutExpo"
					><?php echo $h1; ?></div>

					<div class="ms-layer ms-promo-info ms-promo-info-in color-light" style="left:15px; top:210px"
					data-effect="bottom(40)"
					data-duration="2000"
					data-delay="1000"
					data-ease="easeOutExpo"
					><span id="slogan"class="color-white"></span> <?php echo $h2; ?></div>

					<div class="ms-layer ms-promo-sub color-light" style="left:15px; top:310px"
					data-effect="bottom(40)"
					data-duration="2000"
					data-delay= "1300"
					data-ease="easeOutExpo"
					></div>


					<a class="ms-layer btn-u btn-brd btn-brd-hover btn-u-light" style="left:15px; top:390px" href="Productos.php"
					data-effect="bottom(40)"
					data-duration="2000"
					data-delay="1300"
					data-ease="easeOutExpo"
					>Nuestros Productos</a>


				</div>
				
					<div class="ms-slide" style="z-index: 10">
				
					<img src="<?php echo $phPortada2; ?> " data-src="<?php echo $phPortada2; ?> " alt="">
					<a class="ms-layer btn-u btn-brd btn-brd-hover btn-u-light" style="left:15px; top:390px;" href="assets/Terrano/Catalogo2017.pdf"
					data-effect="bottom(40)"
					data-duration="2000"
					data-delay="0"
					data-ease="easeOutExpo"
					>Ver Catalogo</a>
					
					

					


				</div>

				


			</div>
			
			<!-- end of masterslider -->
		</div>

		<!--=== End Slider ===-->
                <div class="heading heading-v1 " style="margin-top: 30px">
		<h2>Productos</h2>
	</div>

<div class="container content-md">
	<!--=== Illustration v1 ===-->
	<div class="row margin-bottom-60">
		<div class="col-md-6 md-margin-bottom-30">
			<div class="overflow-h">
				<div class="illustration-v1 illustration-img1" style="background-image: url(<?php echo $phProductosPortada1; ?>);">
					<div class="illustration-bg">
						<div class="illustration-ads ad-details-v1">
							<h3>NUESTROS PRODUCTOS</strong></h3>
							<a class="btn-u btn-brd btn-brd-hover btn-u-light" href="Productos.php">Ver Productos</a>
						</div>
					</div>
				</div>
			</div>
		</div>
                <div class="col-md-6 md-margin-bottom-30">
			<div class="overflow-h">
				<div class="illustration-v1 illustration-img1" style="background-image: url(<?php echo $phProductosPortada2; ?>);">
					<div class="illustration-bg">
						<div class="illustration-ads ad-details-v1">
							<h3>CATALOGO 2017</h3>
							<a class="btn-u btn-brd btn-brd-hover btn-u-light" href="assets/Terrano/Catalogo2017.pdf">VER CATALOGO</a>
						</div>
					</div>
				</div>
			</div>
		</div>

	</div><!--/end row-->
        </div>
	<!--=== End Illustration v1 ===-->
                <!--=== Illustration v3 ===-->
<!--                <div  id="footer" style="width: 150px;" ></div >-->
                <iframe style="max-width: 1000px; height: 500px;" src="footer.html" allowtransparency="true" frameborder="0" scrolling="no"></iframe>
             
                
                

                
	<!--=== End Illustration v3 ===-->


</div>

               
 
<script>
  
   
    
    
//     $("#footer").load("probar.html");
document.getElementById("footer").innerHTML = '<object type="text/html" data="footer.html" ></object>';
</script>
<script>
 document.getElementById("myBtn").onclick = Subscribir;
function Subscribir(){
  var xmlhttp = new XMLHttpRequest();
  var mail = document.getElementById("email").value;
  xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
          document.getElementById("ajax_result").innerHTML = this.responseText;
      }
  };
  xmlhttp.open("GET", "Subscribe.php?mail="+mail,true);
  xmlhttp.send();
};


</script>
                <!-- JS Global Compulsory -->
	<script type="text/javascript" src="assets/plugins/jquery/jquery.min.js"></script>
	<script type="text/javascript" src="assets/plugins/jquery/jquery-migrate.min.js"></script>
	<script type="text/javascript" src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
	<!-- JS Implementing Plugins -->
	<script type="text/javascript" src="assets/plugins/back-to-top.js"></script>
	<script type="text/javascript" src="assets/plugins/smoothScroll.js"></script>
	<script type="text/javascript" src="assets/plugins/jquery.parallax.js"></script>
	<script src="assets/plugins/master-slider/masterslider/masterslider.min.js"></script>
	<script src="assets/plugins/master-slider/masterslider/jquery.easing.min.js"></script>
	<script type="text/javascript" src="assets/plugins/counter/waypoints.min.js"></script>
	<script type="text/javascript" src="assets/plugins/counter/jquery.counterup.min.js"></script>
	<script type="text/javascript" src="assets/plugins/fancybox/source/jquery.fancybox.pack.js"></script>
	<script type="text/javascript" src="assets/plugins/owl-carousel/owl-carousel/owl.carousel.js"></script>
        <script src="assets/plugins/revolution-slider/rs-plugin/js/jquery.themepunch.tools.min.js"></script>
        <script src="assets/plugins/revolution-slider/rs-plugin/js/jquery.themepunch.revolution.min.js"></script>
	<!-- JS Customization -->
	<script type="text/javascript" src="assets/js/custom.js"></script>
	<!-- JS Page Level -->
	<script type="text/javascript" src="assets/js/app.js"></script>
	<script type="text/javascript" src="assets/js/plugins/fancy-box.js"></script>
	<script type="text/javascript" src="assets/js/plugins/owl-carousel.js"></script>
	<script type="text/javascript" src="assets/js/plugins/master-slider-fw.js"></script>
	<script type="text/javascript" src="assets/js/plugins/style-switcher.js"></script>
	<script type="text/javascript">
		jQuery(document).ready(function() {
			App.init();
			App.initCounter();
			App.initParallaxBg();
			FancyBox.initFancybox();
			MSfullWidth.initMSfullWidth();
      OwlCarousel.initOwlCarousel();
		});
	</script>
	<!--[if lt IE 9]>
	<script src="assets/plugins/respond.js"></script>
	<script src="assets/plugins/html5shiv.js"></script>
	<script src="assets/plugins/placeholder-IE-fixes.js"></script>
	<![endif]-->
    </body>
</html>