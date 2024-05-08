<?php
  include_once "model/conexao.php";
  
  if(isset($_GET['id'])){
    $id_inst= $_GET['id'];
    $sql = "SELECT * FROM instituicao WHERE id_instituicao = $id_inst";
  
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    if ($stmt->rowCount() != 0) {
      $count = 1; 
      while ($rowInst = $stmt->fetch(PDO::FETCH_ASSOC)) {
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
		<style>
			h2.swal2-title{
				color: #00054ad4 !important;
			}

			div:where(.swal2-container) button:where(.swal2-styled).swal2-confirm {
				background-color: #00054ad4 !important;
			}
		</style>
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
								<li><i class="fa fa-envelope"></i><a href="#">suporte@suiea.com</a></li>
							</ul>
							<!-- End Top Contact -->
						</div>
					</div>
				</div>
			</div>
			<!-- End Topbar -->
			<!-- Header Inner -->
			<div class="header-inner border" style="box-shadow: 0px 2px 20px rgba(1, 41, 112, 0.1) !important;">
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
		
		
		<section class="section dashboard pb-0" style="padding-top: 0px !important;">
      <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-12">
          <div class="row">

            <div class="col-12">

              <!-- Single News -->
              <section class="news-single section pt-0 pb-0">
                <div class="container">
                <div class="row">
                  <div class="col-lg-8 col-12">
                  <div class="row">
                    <div class="col-12">
                    <div class="single-main">
                      <!-- News Head -->
                      <div class="news-head position-relative">
                      <img src="storage/instituições/<?php echo($rowInst['id_instituicao']); ?>/imagem/<?php echo($rowInst['imagem']); ?>" alt="">
                      </div>
        
                      <!-- News Title -->
                      <h1 class="news-title about-institution  d-flex align-items-center justify-content-between school" >
                          <a href="#"><?php echo($rowInst["nome"]) ?> - <?php echo($rowInst["sigla"]) ?></a>
							            <button class="inscrever btn btn-primary" onclick="beforeLogin()">Fazer Inscrição</button>
                      </h1>
                      <!-- Meta -->
                      <div class="meta d-flex w-100 justify-content-between align-items-center pt-3 pb-3">
                      <div class="meta-left">
                        <span class="date"><i class="icofont icofont-phone">(+244) </i><span><?php echo($rowInst["telefone"]) ?> </span></span>
                      </div>
                      <div class="meta-right">
                        <span class="date"><i class="icofont icofont-email"></i> <span><?php echo($rowInst["email"]) ?> </span></span>
                      </div>
                      </div>
                      <!-- News Text -->
                      <div class="news-text">
                      <p class="mt-5 mb-5"><?php echo $rowInst["resumo"]; ?> </p>
                      </div>
                    </div>
                    </div>
                  </div>
                  </div>
                  <div class="col-lg-4 col-12">
                  <div class="main-sidebar">
        
                    <!-- Single Widget -->
                    <div class="single-widget category" style="margin-top: 30px;">
                    <h3 class="title"><span>Total de Vagas</span></h3>
                    <ul class="categor-list">
                      <li><div><i class="icofont icofont-ui-check"></i> <span><?php 
                        if($rowInst["vagas"] == NULL){
                          echo "Sem";
                        }else{
                          echo $rowInst["vagas"];
                        }
                      ?> </span> Vagas</div></li>
                    </ul>
                    </div>
                    <!--/ End Single Widget -->
        
                    <!-- Single Widget -->
                    <div class="single-widget category" style="margin-top: 30px;">
                    <h3 class="title"><span>Informação Útil</span></h3>
                    <ul class="categor-list">
                      <li><div><i class="icofont icofont-google-map"></i><span> <?php echo($rowInst["localizacao"]); ?> </span></div></li>
                      <li><div><i class="icofont icofont-wall-clock"></i><span> <?php echo($rowInst["tipo"]); ?> </span></div></li>
                      <li><div><i class="icofont icofont-email" aria-hidden="true"></i><span> <?php echo($rowInst["area"]); ?> </span></div></li>
                    </ul>
                    </div>
                    <!--/ End Single Widget -->
        
                    <!-- Single Widget -->
                    <div class="single-widget category" style="margin-top: 30px;">
                    <h3 class="title"><span>Cursos administrados</span></h3>
                    <ul class="categor-list">
                      <?php
                        if($rowInst['area'] == "Ensino Médio"){
                          $identificador = $rowInst['id_instituicao'];
                          $sql = "SELECT curso_medio.nome FROM curso_medio INNER JOIN instituicao ON curso_medio.id_inst = instituicao.id_instituicao WHERE instituicao.id_instituicao = $identificador";
                          $stmt = $pdo->prepare($sql);
                          $stmt->execute();
                          if ($stmt->rowCount() != 0) {
                            $count = 1; 
                            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                            ?><li><div><i class="icofont icofont-ui-check"></i> <span><?php echo $row["nome"]; ?></span></div></li><?php
                            }
                          }
                        }else{
                          $identificador = $rowInst['id_instituicao'];
                          $sql = "SELECT curso_superior.nome FROM curso_superior INNER JOIN instituicao ON curso_superior.id_inst = instituicao.id_instituicao WHERE instituicao.id_instituicao = $identificador";
                          $stmt = $pdo->prepare($sql);
                          $stmt->execute();
                          if ($stmt->rowCount() != 0) {
                            $count = 1; 
                            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                            ?><li><div><i class="icofont icofont-ui-check"></i> <span><?php echo $row["nome"]; ?></span></div></li><?php
                            }
                          }
                        }
                      ?>
                        </ul>
                    </div>
                    <!--/ End Single Widget -->
        
                  </div>
                  </div>
                </div>
                </div>
              </section>
              <!--/ End Single News -->

              <!-- Start Portfolio Details Area -->
              <section class="pf-details section" style="background: #fff !important; padding-top: 240px;">
                <div class="container">
                  <div class="row">
                    <div class="col-12">
                      <div class="body-text instituicao">
                        <h3 class="mb-5 text-center mb-5">Veja mais Instituições de ensino</h3>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="container-fluid">
                  <div class="row p-3">
                    <div class="col-12 p-3">
                      <div class="school-slick">
                
                        <?php

                          $sql = "SELECT * FROM instituicao";
                          $stmt = $pdo->prepare($sql);
                          $stmt->execute();
                          if ($stmt->rowCount() != 0) {
                          $count = 1; 
                          while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

                          ?>

                          <div class="single-blog-item">
                          <div class="single-blog-item-img">
                            <img src="storage/instituições/<?php echo($row['id_instituicao']); ?>/imagem/<?php echo($row['imagem']); ?>" alt="">
                          </div>
                          <div class="single-blog-item-txt">
                            <h2><div><?php echo($row["nome"]) ?> - <?php echo($row["sigla"]) ?></div></h2>
                            <h4>Localização <div><?php echo($row["localizacao"]) ?></div> <?php echo($row["tipo"]) ?> </h4>
                            <p>
                            <?php echo($row["resumo"]) ?> 
                            </p>
                            <div class="btns d-flex align-items-center justify-content-center">
                            <button class="welcome-hero-btn how-work-btn" onclick="window.location.href='instituicao-detalhes.php?id=<?php echo $row['id_instituicao'];?>&taged=kasbfcnydbaebasweyv'">
                              Ver Mais
                            </button>
                            </div>
                          </div>
                          </div>
                          <?php      
                          $count++;
                          }
                          }
                        ?>
    
                      </div>
                    </div>
                  </div>
                  
                </div>

              </section>
              <!-- End Portfolio Details Area -->

            </div>
          
          </div>
        </div>

      </div>
    </section>

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
<script src="assets/js/sweetalert2@11.js"></script>
<script>
	function beforeLogin(){
		
		Swal.fire({
                    icon: 'info',
                    title: 'Necessário fazer Login',
                    text: '',
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = 'view/auth/login.php';
                    }
                });
	}
</script>

</body>
</html>
<?php
      }
    }
  }
?>