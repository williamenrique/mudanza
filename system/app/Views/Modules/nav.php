<!-- ======= Top Bar ======= -->
<section id="topbar" class="d-none d-lg-block">
	<div class="container clearfix">
		<div class="float-left contact-info">
			<i class="far fa-envelope"></i> <a href="mailto:<?= $data["page_email"]?>"><?= $data["page_email"]?></a>
			<i class="fas fa-phone"></i> <?= $data["page_tlf"]?>
		</div>
		<div class="float-right social-links">
			<a href="<?= $data["page_facebook"]?>" target="_blank" class="facebook"><i class="fab fa-facebook-square"></i></a>
			<a href="<?= $data["page_instagram"]?>" target="_blank" class="instagram"><i class="fab fa-instagram"></i></a>
			<!-- <a href="#" class="google-plus"><i class="fa fa-google-plus"></i></a>
			<a href="#" class="linkedin"><i class="fa fa-linkedin"></i></a> -->
		</div>
	</div>
</section><!-- End Top Bar-->

<!-- ======= Header ======= -->
<header id="header">
	<div class="container d-flex align-align-content-center justify-content-between">

		<div id="logo" class="pull-left">

			<h1><a href="<?= base_url()?>"><?= $data["page_empresa"]?></a></h1>
			<!-- Uncomment below if you prefer to use an image logo -->
			<!-- <a href="index.html"><img src="assets/img/logo.png" alt=""></a>-->
		</div>

		<nav id="nav-menu-container">
			<ul class="nav-menu">
				<!-- <li class="menu-active"><a href="<?= base_url()?>">Inicio</a></li> -->
				<li><a href="#about">Acerca</a></li>
				<li><a href="#services">Servicios</a></li>
				<!-- <li><a href="#portfolio">Portfolio</a></li> -->
				<!-- <li><a href="#team">Team</a></li> -->
				<!-- <li class="menu-has-children"><a href="">Drop Down</a>
					<ul>
						<li><a href="#">Drop Down 1</a></li>
						<li><a href="#">Drop Down 3</a></li>
						<li><a href="#">Drop Down 4</a></li>
						<li><a href="#">Drop Down 5</a></li>
					</ul>
				</li> -->
				<!-- <li><a href="#contact">Contacto</a></li> -->
				<li><a href="#coments">Comentarios</a></li>
			</ul>
		</nav><!-- #nav-menu-container -->
	</div>
</header>
<!-- End Header -->

<!-- ======= Intro Section ======= -->
<section id="intro">

	<div class="intro-content">
		<h2><?= $data["page_titulo"]?><br>
			<span><?= $data["page_subtitulo"]?></span>
		</h2>
		<div>
			<a href="#about" class="btn-get-started scrollto">Saber mas</a>
			<a href="#contact" class="btn-projects scrollto">Contactenos</a>
		</div>
	</div>

	<div id="intro-carousel" class="owl-carousel">
		<div class="item" style="background-image: url('<?= IMG ?>banner.jpg');"></div>

		<!-- <div class="item" style="background-image: url('assets/img/intro-carousel/2.jpg');"></div>
		<div class="item" style="background-image: url('assets/img/intro-carousel/3.jpg');"></div>
		<div class="item" style="background-image: url('assets/img/intro-carousel/4.jpg');"></div>
		<div class="item" style="background-image: url('assets/img/intro-carousel/5.jpg');"></div> -->
	</div>

</section><!-- End Intro Section -->