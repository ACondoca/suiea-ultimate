<?php
  include_once "model/conexao.php";
?>
<!doctype html>
<html class="no-js" lang="eng">
    <head>
		<!-- Title -->
        <title>SUIEA - Sistema Unificado de Inscrições Escolares de Angola</title>
        <!-- Meta Tags -->
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<!-- Favicon -->
        <link rel="icon" href="assets/img/favicon3.png">
		<!-- Slick Theme -->
        <link rel="stylesheet" href="assets/css/slick.css">
		<link rel="stylesheet" href="assets/css/slick-theme.css">
		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="assets/css/bootstrap.min.css">
		<!-- Font Awesome CSS -->
        <link rel="stylesheet" href="assets/css/font-awesome.min.css">
		<!-- icofont CSS -->
        <link rel="stylesheet" href="assets/css/icofont.css">
		<!-- Slicknav -->
		<link rel="stylesheet" href="assets/css/slicknav.min.css">
		<!-- Owl Carousel CSS -->
        <link rel="stylesheet" href="assets/css/owl-carousel.css">
		<!-- Datepicker CSS -->
		<link rel="stylesheet" href="assets/css/datepicker.css">
		<!-- Animate CSS -->
        <link rel="stylesheet" href="assets/css/animate.min.css">
		<!-- Magnific Popup CSS -->
        <link rel="stylesheet" href="assets/css/magnific-popup.css">
		<!-- SUIEA CSS -->
        <link rel="stylesheet" href="assets/css/normalize.css">
        <link rel="stylesheet" href="assets/css/style.css">
        <link rel="stylesheet" href="assets/css/responsive.css">
		<!-- Swiper CSS -->
		<link rel="stylesheet" href="assets/css/swiper-bundle.min.css">
    </head>
    <body>
	
		<!-- Preloader -->
        <div class="preloader">
            <div class="loader">
                <div class="loader-outter"></div>
                <div class="loader-inner"></div>

                <div class="indicator"> 
                    <svg width="16px" height="12px">
                        <polyline id="back" points="1 6 4 6 6 11 10 1 12 6 15 6"></polyline>
                        <polyline id="front" points="1 6 4 6 6 11 10 1 12 6 15 6"></polyline>
                    </svg>
                </div>
            </div>
        </div>
        <!-- End Preloader -->

		<!-- Header Area -->
		<header class="header" >
			<!-- Topbar -->
			<div class="topbar">
				<div class="container">
					<div class="row">
						<div class="col-lg-6 col-md-5 col-12">
							<!-- Contact -->
							<ul class="top-link">
								<li><i class="fa fa-phone"></i> +244 933 333 333</li>
							</ul>
							<!-- End Contact -->
						</div>
						<div class="col-lg-6 col-md-7 col-12">
							<!-- Top Contact -->
							<ul class="top-contact">
								<li><i class="fa fa-envelope"></i><a href="mailto:suporte@suiea.com">suporte@suiea.com</a></li>
							</ul>
							<!-- End Top Contact -->
						</div>
					</div>
				</div>
			</div>
			<!-- End Topbar -->
			<!-- Header Inner -->
			<div class="header-inner">
				<div class="container">
					<div class="inner">
						<div class="row">
							<div class="col-lg-2 col-md-2 col-12">
								<!-- Start Logo -->
								<div class="logo">
									<a href="index.php"><img src="assets/img/favicon3.png" style="width: 100px; height: 50px;" alt="#"></a>
								</div>
								<!-- End Logo -->
								<!-- Mobile Nav -->
								<div class="mobile-nav"></div>
								<!-- End Mobile Nav -->
							</div>
							<div class="col-lg-8 col-md-10 col-12 d-flex align-items-center justify-content-center">
								<!-- Main Menu -->
								<div class="main-menu">
									<nav class="navigation">
										<ul class="nav menu">
											<li><a href="index.php">Home </a></li>
											<li class="active"><a href="escolas.php">Instituições</i></a></li>
											<li><a href="faq.php">FAQ</a></li>
											<li class="getlogin"><a href="view/auth/login.php">login </a></li>
										</ul>
									</nav>
  
								</div>
								<!--/ End Main Menu -->
							</div>
							<div class="col-lg-2 col-12">
								<div class="get-quote">
									<a href="view/auth/login.php" class="btn">Fazer Login</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!--/ End Header Inner -->
		</header>
		<!-- End Header Area -->
	
		<!-- Breadcrumbs -->
		<div class="breadcrumbs overlay" id="escolas">
			<div class="container">
				<div class="bread-inner">
					<div class="row">
						<div class="col-12">
							<h2>Encontre a escola que procura</h2>
							<ul class="bread-list">
								<li>Instituições</li>
								<li><i class="icofont-simple-right"></i></li>
								<li class="active">Todas as Instituições</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- End Breadcrumbs -->
		
		<!-- Start Schools Area -->
		<div class="blog-content">

			<div class="container-fluid">

				<div class="row">
					<div class="col-lg-12 mt-5">
						<div class="section-title mt-5">
							<h2>Instituições do <span>Ensino Médio</span></h2>
							<img src="assets/img/section-img.png" alt="">
							<p style="color: #757575;">Explore a lista abrangente de instituições do Ensino Médio disponíveis em nosso sistema, oferecendo diversas opções para aprimorar o aprendizado e o desenvolvimento académico em todo o país...</p>
						</div>
					</div>
				</div>
				<?php
					$sql = "SELECT * FROM instituicao INNER JOIN inst_medio ON instituicao.id_instituicao = inst_medio.id WHERE estado = 'Aprovada'";
					$stmt = $pdo->query($sql);
					if($stmt->rowCount() > 0){?>

					<section>
						<div class="school-slick"><?php
									while($rowI = $stmt->fetch()){
										?>

											<div class="single-blog-item">
												<div class="single-blog-item-img">
													<img src="storage/instituições/<?php echo $rowI['id_instituicao'];?>/imagem/<?php echo $rowI['imagem'];?>" alt="blog image">
												</div>
												<div class="single-blog-item-txt">
													<h2><div><?php echo $rowI['nome'];?> - <?php echo $rowI['sigla'];?></div></h2>
													<h4>Localização <div><?php echo $rowI['localizacao'];?></div> <?php echo $rowI['tipo'];?></h4>
													<p>
														<?php echo $rowI['resumo'];?>
													</p>
													<div class="btns">
														<button class="welcome-hero-btn how-work-btn" onclick="window.location.href='instituicao-detalhes.php?id=<?php echo $rowI['id_instituicao'];?>&taged=kasbfcnydbaebasweyv'">
															Ver Mais
														</button>

													</div>
												</div>
											</div>

										<?php
									}
							?>
						</div>
					</section>

				<?php
				}else{
					?>
					<section>
						<div class="d-flex justify-content-center align-items-center"><div class="row">
							<div class="col-lg-12 mt-5">
								<div class="section-title mt-5 mb-0">
									<h5>Não alcansamos resultados!</h5>
								</div>
								<img src="assets/img/addcurso.png" alt="">
							</div>
						</div>
					</section>
					<?php
				}
				?>

				<div class="row">
					<div class="col-lg-12 mt-5">
						<div class="section-title mt-5">
							<h2>Instituições do <span>Ensino Superior</span></h2>
							<img src="assets/img/section-img.png" alt="#">
							<p style="color: #757575;">Explore a lista abrangente de instituições do Ensino Superior disponíveis em nosso sistema, oferecendo diversas opções para aprimorar o aprendizado e o desenvolvimento académico em todo o país...</p>
						</div>
					</div>
				</div>
				<?php
					$sql = "SELECT * FROM instituicao INNER JOIN inst_superior ON instituicao.id_instituicao = inst_superior.id WHERE estado = 'Aprovada'";
					$stmt = $pdo->query($sql);
					if($stmt->rowCount() > 0){?>

					<section>
						<div class="school-slick"><?php
									while($rowI = $stmt->fetch()){
										?>

											<div class="single-blog-item">
												<div class="single-blog-item-img">
													<img src="storage/instituições/<?php echo $rowI['id_instituicao'];?>/imagem/<?php echo $rowI['imagem'];?>" alt="blog image">
												</div>
												<div class="single-blog-item-txt">
													<h2><div><?php echo $rowI['nome'];?> - <?php echo $rowI['sigla'];?></div></h2>
													<h4>Localização <div class=""><?php echo $rowI['localizacao'];?></div> <?php echo $rowI['tipo'];?></h4>
													<p>
														<?php echo $rowI['resumo'];?>
													</p>
													<div class="btns">
														<button class="welcome-hero-btn how-work-btn" onclick="window.location.href='instituicao-detalhes.php?id=<?php echo $rowI['id_instituicao'];?>&taged=kasbfcnydbaebasweyv'">
															Ver Mais
														</button>

													</div>
												</div>
											</div>

										<?php
									}
							?>
						</div>
					</section>

				<?php
				}else{
					?>
					<section>
						<div class="d-flex justify-content-center align-items-center"><div class="row">
							<div class="col-lg-12 mt-5">
								<div class="section-title mt-5 mb-0">
									<h5>Não alcansamos resultados!</h5>
								</div>
								<img src="assets/img/addcurso.png" alt="">
							</div>
						</div>
					</section>
					<?php
				}
				?>

			</div>
		</div>
		<!-- End Schools Area -->
		
		<!-- Footer Area -->
		<footer id="footer" class="footer ">
			<!-- Copyright -->
			<div class="copyright">
				<div class="container">
					<div class="row">
						<div class="col-lg-12 col-md-12 col-12">
							<div class="copyright-content">
								<p>© Copyright 2024  |  Todos os direitos reservados por <a href="https://www.suiea.com" target="_blank">www.suiea.com</a> </p>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!--/ End Copyright -->
		</footer>
		<!--/ End Footer Area -->

		<!-- jquery Min JS -->
        <script src="assets/js/jquery.min.js"></script>
		<!-- jquery Migrate JS -->
		<script src="assets/js/jquery-migrate-3.0.0.js"></script>
		<!-- jquery Ui JS -->
		<script src="assets/js/jquery-ui.min.js"></script>
		<!-- Easing JS -->
        <script src="assets/js/easing.js"></script>
		<!-- Color JS -->
		<script src="assets/js/colors.js"></script>
		<!-- Popper JS -->
		<script src="assets/js/popper.min.js"></script>
		<!-- Bootstrap Datepicker JS -->
		<script src="assets/js/bootstrap-datepicker.js"></script>
		<!-- Jquery Nav JS -->
        <script src="assets/js/jquery.nav.js"></script>
		<!-- Slicknav JS -->
		<script src="assets/js/slicknav.min.js"></script>
		<!-- ScrollUp JS -->
        <script src="assets/js/jquery.scrollUp.min.js"></script>
		<!-- Tilt Jquery JS -->
		<script src="assets/js/tilt.jquery.min.js"></script>
		<!-- Owl Carousel JS -->
        <script src="assets/js/owl-carousel.js"></script>
		<!-- counterup JS -->
		<script src="assets/js/jquery.counterup.min.js"></script>
		<!-- Steller JS -->
		<script src="assets/js/steller.js"></script>
		<!-- Wow JS -->
		<script src="assets/js/wow.min.js"></script>
		<!-- Magnific Popup JS -->
		<script src="assets/js/jquery.magnific-popup.min.js"></script>
		<!-- Counter Up CDN JS -->
		<script src="assets/http://cdnjs.cloudflare.com/ajax/libs/waypoints/2.0.3/waypoints.min.js"></script>
		<!-- Bootstrap JS -->
		<script src="assets/js/bootstrap.min.js"></script>
		<!-- Main JS -->
		<script src="assets/js/main.js"></script>
		<!-- Slick JS -->
		<script src="assets/js/slick.min.js"></script>
		<script src="assets/js/jquery.js"></script>
		<!-- Slick JS -->
		<script src="assets/js/swiper-bundle.min.js"></script>
		<script src="assets/js/swiper-style.js"></script>

    </body>
</html>