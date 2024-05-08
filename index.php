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
											<li class="active"><a href="index.php">Home </a></li>
											<li><a href="escolas.php">Instituições</i></a></li>
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
		
		<!-- Slider Area -->
		<section class="slider">
			<div class="hero-slider">
				<!-- Start Single Slider -->
				<div class="single-slider" style="background-image:url('assets/img/1.jpg')">
					<div class="container">
						<div class="row">
							<div class="col-lg-7">
								<div class="text">
									<h1>Bem-vindo ao <span>Sistema Unificado de Inscrições Escolares de Angola!</span></h1>
									<p>Facilitando o processo de inscrição para escolas, colégios e Universidades em todo o país. </p>
									<div class="button">
										<button class="btn" onclick="window.location.href='view/auth/signup-opcoes.php'">Inscreva-se agora</button>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- End Single Slider -->
				<!-- Start Single Slider -->
				<div class="single-slider" style="background-image:url('assets/img/2.jpg')">
					<div class="container">
						<div class="row">
							<div class="col-lg-7">
								<div class="text">
									<h1>Recursos Poderosos <span>ao Seu Alcanse!</span></h1>
									<p><span>"Reduza a burocracia,</span> economize tempo e papel. Comunique-se de forma eficaz e promova uma <span>gestão educacional moderna</span>"</p>
									<div class="button">
										<button class="btn" onclick="window.location.href='view/auth/signup-opcoes.php'">Inscreva-se agora</button>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- Start End Slider -->
				<!-- Start Single Slider -->
				<div class="single-slider" style="background-image:url('assets/img/3.jpg')">
					<div class="container">
						<div class="row">
							<div class="col-lg-7">
								<div class="text">
									<h1>Transformou nossa <span>Abordagem Educacional!</span></h1>
									<p>"Esta plataforma revolucionou nossa forma de gerir inscrições e comunicação." - Instituto de Telecomunicações. Vencedores do prêmio de Inovação Educacional 2023.</p>
									<div class="button">
										<button class="btn" onclick="window.location.href='view/auth/signup-opcoes.php'">Inscreva-se agora</button>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- End Single Slider -->
			</div>
		</section>
		<!--/ End Slider Area -->
		
		<!-- Start Schedule Area -->
		<section class="schedule">
			<div class="container">
				<div class="schedule-inner">
					<div class="row">
						<div class="col-lg-4 col-md-6 col-12 ">
							<!-- single-schedule -->
							<div class="single-schedule first">
								<div class="inner">
									<div class="icon">
										<i class="icofont icofont-pencil-alt-1"></i>
									</div>
									<div class="single-content">
										<span>SUIEA</span>
										<h4>Inscrições Simplificadas</h4>
										<p>Facilidade no processo de inscrição, preenchimento eficiente de formulários, redução da burocracia e economia de tempo.</p>										
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-4 col-md-6 col-12">
							<!-- single-schedule -->
							<div class="single-schedule middle">
								<div class="inner">
									<div class="icon">
										<i class="icofont icofont-comment"></i>
									</div>
									<div class="single-content">
										<span>SUIEA</span>
										<h4>Comunicação Eficiente</h4>
										<p>Notificações instantâneas, actualizações e informações importantes entregues de maneira rápida e confiável.</p>

									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-4 col-md-12 col-12">
							<!-- single-schedule -->
							<div class="single-schedule last">
								<div class="inner">
									<div class="icon">
										<i class="icofont icofont-support"></i>
									</div>
									<div class="single-content">
										<span>SUIEA</span>
										<h4>Acesso Rápido a Informações</h4>
										<p>Centralização de dados que proporciona uma experiência mais organizada e acessível aos usuários.</p>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!--/End Start schedule Area -->

		<!-- Start Feautes -->
		<section class="Feautes section">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="section-title">
							<h2>Nós estamos sempre prontos para ajudar você em suas aspirações acadêmicas</h2>
							<img src="assets/img/section-img.png" alt="#">
							<p>Na nossa missão de fortalecer o seu percurso acadêmico, estamos dedicados a oferecer suporte contínuo.</p>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!--/ End Feautes -->
		
		<!-- Start Fun-facts -->
		<div id="fun-facts" class="fun-facts section overlay">
			<div class="container">
				<div class="row">
					<div class="col-lg-3 col-md-6 col-12">
						<!-- Start Single Fun -->
						<div class="single-fun">
							<i class="icofont icofont-institution"></i>
							<div class="content">
								<span class="counter"><?php echo $total_institutions; ?></span>
								<p>Instituições Cadastradas</p>
							</div>
						</div>
						<!-- End Single Fun -->
					</div>
					<div class="col-lg-3 col-md-6 col-12">
						<!-- Start Single Fun -->
						<div class="single-fun">
							<i class="icofont-badge"></i>
							<div class="content">
								<span class="counter"><?php echo $total_users; ?></span>
								<p>Utilizadores cadastrados</p>
							</div>
						</div>
						<!-- End Single Fun -->
					</div>
					<div class="col-lg-3 col-md-6 col-12">
						<!-- Start Single Fun -->
						<div class="single-fun">
							<i class="icofont icofont-edit"></i>
							<div class="content">
								<span class="counter"><?php echo $total_registrations_medio + $total_registrations_superior; ?></span>
								<p>Inscrições feitas</p>
							</div>
						</div>
						<!-- End Single Fun -->
					</div>
					<div class="col-lg-3 col-md-6 col-12">
						<!-- Start Single Fun -->
						<div class="single-fun">
							<i class="icofont icofont-comment"></i>
							<div class="content">
								<span class="counter"><?php echo $total_messages; ?></span>
								<p>Total de depoimentos</p>
							</div>
						</div>
						<!-- End Single Fun -->
					</div>
				</div>
			</div>
		</div>
		<!--/ End Fun-facts -->
		
		<!-- Start Why choose -->
		<section class="why-choose section" id="sobrenos">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="section-title">
							<h2>Empenhados em desbravar fronteiras educacionais</h2>
							<img src="assets/img/section-img.png" alt="#">
							<p style="color: #757575;">Com uma visão audaciosa de superar barreiras educacionais, nós, como equipa dedicada do Sistema Unificado de Inscrições Escolares de Angola, embarcamos na missão de tornar o acesso à educação mais amplo e acessível.</p>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-6 col-12">
						<!-- Start Choose Left -->
						<div class="choose-left">
							<h3>Quem somos nós</h3>
							<p>Somos a equipa Visionária por trás do SUIEA - Sistema Unificado de Inscrições Escolares de Angola, Facilitando o caminho para um Futuro Educativo Inclusivo e Promissor. </p>
							<p>Estamos comprometidos em desbravar fronteiras, proporcionando um caminho claro e simplificado para todos os estudantes, pais e instituições educacionais em Angola. Os nossos principais objectivos vêm logo a baixo:</p>
							<div class="row">
								<div class="col-lg-6">
									<ul class="list">
										<li><i class="fa fa-caret-right"></i>Acessibilidade Universal </li>
										<li><i class="fa fa-caret-right"></i>Eficiência Operacional </li>
										<li><i class="fa fa-caret-right"></i>Inovação Contínua </li>
									</ul>
								</div>
								<div class="col-lg-6">
									<ul class="list">
										<li><i class="fa fa-caret-right"></i>Transparência e Confiança </li>
										<li><i class="fa fa-caret-right"></i>Colaboração Institucional </li>
										<li><i class="fa fa-caret-right"></i>Impacto Social Positivo </li>
									</ul>
								</div>
							</div>
						</div>
						<!-- End Choose Left -->
					</div>
					<div class="col-lg-6 col-12">
						<!-- Start Choose Rights -->
						<div class="choose-right">
							<div class="video-image">
							</div>
						</div>
						<!-- End Choose Rights -->
					</div>
				</div>
			</div>
		</section>
		<!--/ End Why choose -->
		
		<!-- Start Call to action -->
		<section class="call-action overlay" data-stellar-background-ratio="0.5">
			<div class="container">
				<div class="row">
					<div class="col-lg-12 col-md-12 col-12">
						<div class="content">
							<h2>Estamos aqui para ajudar! Entre em contacto para esclarecer dúvidas. Ligue para +244 933 333 333</h2>
							<p>Dúvidas sobre o processo de inscrição, requisitos ou qualquer outra questão? A nossa equipa está pronta para oferecer o suporte necessário.</p>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!--/ End Call to action -->
		
		<!-- Start portfolio -->
		<section class="portfolio section"  id="testemunhos">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="section-title">
							<h2>Bem-vindo à Galeria de Testemunhos!</h2>
							<img src="assets/img/section-img.png" alt="#">
							<p>Aqui, partilhamos experiências reais de estudantes, pais e instituições que encontraram no <a href="index.php" style="color: #ffc222;">SUIEA</a> a chave para uma jornada educacional mais fácil e bem sucedida.</p>
						</div>
					</div>
				</div>
			</div>

			<?php
			$sql = "SELECT * FROM mensagem WHERE estado = 'Publicada'";
			$stmt = $pdo->query($sql);
			if($stmt->rowCount() > 0){
				?>
				<div class="container-fluid">
					<section>
						<div id="carousel-slick">
							<?php
				while($rowM = $stmt->fetch()){      
					$count = 1;              
					?>
					<div class="testemunha single-testimonial-box">
						<div class="testimonial-description">
							<div class="testimonial-info">
								<?php 
									$id_inst = $rowM['id_inst'];
									// Usando uma variável diferente para a segunda consulta
									$stmt_inst = $pdo->query("SELECT * FROM instituicao WHERE id_instituicao = $id_inst ");
									$row_inst = $stmt_inst->fetch(PDO::FETCH_ASSOC);
								?>
								<div class="testimonial-img">
									<img src="storage/instituições/<?=$row_inst['id_instituicao']; ?>/imagem/<?=$row_inst['imagem']; ?>" >
								</div><!--/.testimonial-img-->
								<div class="testimonial-person">
									<h2><?=$row_inst['nome']; ?></h2>
									<h4><?=$row_inst['localizacao']; ?></h4>
									<div class="testimonial-person-star">
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
									</div>
								</div><!--/.testimonial-person-->
							</div>
				
							<div class="testimonial-comment">
								<p>
									<?php echo $rowM['conteudo']; ?>
								</p>
							</div>
						</div>
					</div>
					<?php
					$count++;
				}?>
				</div>
				</section>
			</div>
			<?php
			}else{
				?>
				<section>
					<div class="d-flex justify-content-center align-items-center"><div class="row">
						<div class="col-lg-12 mt-5">
							<div class="section-title mt-5 mb-0">
								<h5>Não alcançamos resultados!</h5>
							</div>
							<img src="assets/img/addcurso.png" alt="">
						</div>
					</div>
				</section>
				<?php
			}
			?>

			
		</section>
		<!--/ End portfolio -->

		<!-- Start Newsletter Area -->
		<section class="newsletter section">
			<div class="container">
				<div class="row ">
					<div class="col-lg-6  col-12">
						<!-- Start Newsletter Form -->
						<div class="subscribe-text ">
							<h6>Inscreva-se na nossa Newsletter</h6>
							<p class="">Esteja a par de todas as novidades,<br> deixe o seu email.</p>
						</div>
						<!-- End Newsletter Form -->
					</div>
					<div class="col-lg-6  col-12">
						<!-- Start Newsletter Form -->
						<div class="subscribe-form ">
							<form action="" method="get" target="_blank" class="newsletter-inner">
								<input name="EMAIL" placeholder="Seu endereço de email" class="common-input" onfocus="this.placeholder = ''"
									onblur="this.placeholder = 'Seu endereço de email'" required="" type="email">
								<button class="btn">Subscrever</button>
							</form>
						</div>
						<!-- End Newsletter Form -->
					</div>
				</div>
			</div>
		</section>
		<!-- /End Newsletter Area -->
		
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