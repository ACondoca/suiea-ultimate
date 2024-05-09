<?php
  include_once "../../model/session.php";
  include_once "../../model/conexao.php";
  
  if(isset($_SESSION['id'])){
    $id = $_SESSION['id'];
    $imagem = $_SESSION['avatar'];

    $avatar = "../../storage/usuarios/$id/imagem/$imagem";
  }else{
    header('../auth/login.php');
  }
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Title -->
  <title>SUIEA - Sistema Unificado de Inscrições Escolares de Angola</title>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="../assets/img/favicon.png" rel="icon">
  <link href="../assets/img/apple-touch-icon.png" rel="apple-touch-icon">
		
  <!-- Slick Theme -->
  <link rel="stylesheet" href="../assets/css/slick.css">
  <link rel="stylesheet" href="../assets/css/slick-theme.css">

  <!-- Google Fonts -->
  <link href="../https://fonts.gstatic.com" rel="preconnect">
  <link href="../https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="../assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="../assets/vendor/quill/quill.bubble.css" rel="stylesheet">

  <!-- Template icofont CSS -->
  <link rel="stylesheet" href="../../css/icofont.css">
  <link rel="stylesheet" href="../../fonts/icofont.eot">
  <link rel="stylesheet" href="../../fonts/icofont.ttf">
  <link rel="stylesheet" href="../../fonts/icofont.woff">

  <!-- Template Main CSS File -->
  <link href="../assets/css/style.css" rel="stylesheet">

  <style>
  
    /*=========================
      Start Footer CSS
    ===========================*/
    .section-footer{
      background: #00054ad4;
    }
    .footer{
      position:relative;
      padding: 0px !important;
    }
    .footer .footer-top{
      padding:100px 0px;
      position:relative;
      background:transparent;
    }
    .footer .footer-top:before{
      position:absolute;
      content:"";
      left:0;
      top:0;
      height:100%;
      width:100%;
      opacity:0.1;
    }
    .footer .single-footer .social{
      margin-top:25px;
    }
    .footer .single-footer .social li{
      display:inline-block;
      margin-right:10px;
    }
    .footer .single-footer .social li:last-child{
      margin-right:0px;
    }
    .footer .single-footer .social li a {
      height: 34px;
      width: 34px;
      line-height: 34px;
      text-align: center;
      border: 1px solid #fff;
      text-align: center;
      padding: 0;
      border-radius: 100%;
      display: block;
      color:#fff;
      font-size: 16px;
    }
    .footer .single-footer .social li a:hover{
      color:#00054ad4;
      background:#fff;
      border-color:transparent;
    }
    .footer .single-footer.f-link li a i{
      margin-right:10px;
    }
    .footer .single-footer.f-link li{
      display:block;
      margin-bottom:12px;
    }
    .footer .single-footer.f-link li:last-child{
      margin:0;
    }
    .footer .single-footer.f-link li a {
      display: block;
      color: #fff;
      text-transform: capitalize;
      -webkit-transition: all 0.4s ease;
      -moz-transition: all 0.4s ease;
      transition: all 0.4s ease;
      font-weight: 400;
    }
    .footer .single-footer.f-link li a:hover{
      padding-left:8px;
    }
    .footer .single-footer h2{
      color:#fff;
      font-size:20px;
      font-weight:600;
      text-transform:capitalize;
      margin-bottom:40px;
      padding-bottom:20px;
      text-transform:capitalize;
      position:relative;
    }
    .footer .single-footer h2::before{
      position: absolute;
      content: "";
      left: 0;
      bottom: 0px;
      height: 3px;
      width: 50px;
      background: #fff;
    }
    .footer .single-footer .time-sidual{
      margin-top:15px;
    }
    .footer .single-footer .time-sidual{
      overflow:hidden;
    }
    .footer .single-footer .time-sidual li {
      display: block;
      color: #fff;
      width: 100%;
      margin-bottom: 5px;
    }
    .footer .single-footer .time-sidual li span{
      /**display:inline-block;**/
      float:right;
    }
    .footer .single-footer .day-head .time {
      font-weight: 400;
      float: right;
    }
    .footer .single-footer p{
      color:#fff;
    }
    .footer .single-footer .newsletter-inner{
      margin-top:20px;
      position:relative;
    }
    .footer .single-footer .newsletter-inner input {
      background: transparent;
      border: 1px solid #fff;
      height: 50px;
      line-height: 42px;
      width: 100%;
      margin-right: 15px;
      color: #fff;
      padding-left: 18px;
      padding-right: 70px;
      /**display: inline-block;**/
      float: left;
      border-radius: 0px;
      -webkit-transition: all 0.4s ease;
      -moz-transition: all 0.4s ease;
      transition: all 0.4s ease;
      font-weight: 400;
      border-radius: 5px;
    }
    .footer .single-footer .newsletter-inner input:hover{
      padding-left: 22px;
    }
    .footer input::-webkit-input-placeholder {
        opacity: 1;
        color: #fff !important;
    }
    
    .footer input::-moz-placeholder {
        opacity: 1;
        color: #fff !important;
    }
    
    .footer input::-ms-input-placeholder {
        opacity: 1;
        color: #fff !important;
    }
    .footer input::input-placeholder {
        opacity: 1;
        color: #fff !important;
    }
    .footer .single-footer .newsletter-inner .button {
      position: absolute;
      right: 0;
      top: 0;
      height: 50px;
      line-height: 50px;
      width: 50px;
      background: #fff;
      border-left: 1px solid #fff;
      text-shadow: none;
      box-shadow: none;
      display: inline-block;
      border-radius: 0px;
      border: none;
      -webkit-transition: all 0.4s ease;
      -moz-transition: all 0.4s ease;
      transition: all 0.4s ease;
      border-radius: 0 5px 5px 0;
      color: #00054ad4;
      font-size: 25px;
    }
    .footer .single-footer .newsletter-inner .button i{
      -webkit-transition:all 0.4s ease;
      -moz-transition:all 0.4s ease;
      transition:all 0.4s ease;
    }
    .footer .single-footer .newsletter-inner .button:hover i{
      color:#2C2D3F;
    }
    .footer .copyright{
      padding:25px 0px 25px 0px;
      text-align:center;
    }
    .footer .copyright .copyright-content p{
      color:#fff;
    }
    .footer .copyright .copyright-content p a{
      color:#fff;
      font-weight:400;
      text-decoration:underline;
      display:inline-block;
      margin-left:4px;
    }
    /*=========================
      End Footer CSS
    ===========================*/
    .paginacao .pagina{
      display: grid;
      grid-template-columns: repeat(3,1fr);
      padding: 25px 15px;
      gap: 20px;
    }
    @media (min-width: 1200px){
      #footer{
        margin-left: 0px !important; 
      }
    }

    @media only screen and (max-width: 768px){
      .paginacao .pagina{
        display: grid;
        grid-template-columns: repeat(2,1fr);
        padding: 15px 10px;
        gap: 20px;
      }
    }

    @media only screen and (max-width: 650px){
      .paginacao .pagina{
        display: grid;
        grid-template-columns: repeat(1,1fr);
        padding: 15px 10px;
        gap: 20px;
      }
    }

    @media (max-width: 991px){
      .footer .single-footer h2{
          margin: 40px 0 !important;
      }
    }

  </style>

</head>

<body class="toggle-sidebar">
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
  
  <?php include_once "../component/header_user.php";?>

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link " href="index.php">
          <i class="bi bi-house"></i>
          <span>Página inicial</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="ver-inscricoes.php">
          <i class="bi bi-pencil-square"></i>
          <span>Inscrições</span>
        </a>
      </li><!-- End Notification Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="ver-matriculas.php">
          <i class="bi bi-check-circle"></i>
          <span>Matrículas</span>
        </a>
      </li><!-- End Notification Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-building"></i><span>Instituições</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="ver-escolas-1.php">
              <i class="bi bi-circle"></i><span>Ensino Médio</span>
            </a>
          </li>
          <li>
            <a href="ver-escolas-2.php">
              <i class="bi bi-circle"></i><span>Ensino Superior</span>
            </a>
          </li>
        </ul>
      </li><!-- End Instituitions Nav -->

    </ul>

  </aside><!-- End Sidebar-->

  <main id="main" class="main p-0">

    <section class="section faq">
      <div class="row">

        <!-- Breadcrumbs -->
        <div class="breadcrumbs overlay" id="home-student">
          <div class="container">
            <div class="bread-inner">
              <div class="row">
                <div class="col-12">
                  <h2>Perguntas frequentes</h2>
                  <ul class="bread-list">
                    <li><a href="index.php">Página inicial</a></li>
                    <li><i class="icofont-simple-right"></i></li>
                    <li class="active">FAQ</li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- End Breadcrumbs -->

      </div>
    </section>

    <!-- Single News -->
		<section class="news-single section pt-5">
			<div class="container">
				<div class="row">
					<div class="col-12">
						<div class="main-sidebar frequentes">

							<!-- Single Widget -->
              <div class="single-widget faq">
                <div class="card border-0">
                  <div class="card-header p-0 border-0" id="headingOne">
                    <h5 class="mb-0 border-0">
                      <button 
                      class=" btn-link w-100 border-0" 
                      type="button" 
                      data-bs-toggle="collapse" 
                      data-bs-target="#collapseOne" 
                      aria-bs-expanded="true">
                      <span>Qual é a finalidade do Sistema Unificado de Inscrições Escolares?</span>
                      </button>
                    </h5>
                  </div>
                </div>
                <div id="collapseOne" class="collapse" aria-bs-labelledby="headingOne" data-bs-parent="#accordionExample">
                  <div class="card-body">
                    O sistema visa facilitar e agilizar o processo de inscrição em escolas públicas e privadas em Angola, além de oferecer uma carteira digital para o pagamento de emolumentos.
                  </div>
                </div>
                
              </div>
              <!--/ End Single Widget -->
              <!-- Single Widget -->
              <div class="single-widget faq">
                <div class="card border-0">
                  <div class="card-header p-0 border-0" id="headingTwo">
                    <h5 class="mb-0 border-0">
                      <button 
                      class=" btn-link w-100 border-0" 
                      type="button" 
                      data-bs-toggle="collapse" 
                      data-bs-target="#collapseTwo" 
                      aria-bs-expanded="true">
                        <span>Quais são os benefícios de utilizar este sistema?</span>
                      </button>
                    </h5>
                  </div>
                </div>
                <div id="collapseTwo" class="collapse" aria-bs-labelledby="headingTwo" data-bs-parent="#accordionExample">
                  <div class="card-body">
                    Os benefícios incluem conveniência, transparência, redução de tempo e custos, além de possibilitar o acompanhamento em tempo real do processo de inscrição e pagamento de taxas.
                  </div>
                </div>
                
              </div>
              <!--/ End Single Widget -->
              <!-- Single Widget -->
              <div class="single-widget faq">
                <div class="card border-0">
                  <div class="card-header p-0 border-0" id="headingThree">
                    <h5 class="mb-0 border-0">
                      <button 
                      class=" btn-link w-100 border-0" 
                      type="button" 
                      data-bs-toggle="collapse" 
                      data-bs-target="#collapseThree" 
                      aria-bs-expanded="true">
                        <span>Como faço para me inscrever em uma instituição através deste sistema?</span>
                      </button>
                    </h5>
                  </div>
                </div>
                <div id="collapseThree" class="collapse" aria-bs-labelledby="headingThree" data-bs-parent="#accordionExample">
                  <div class="card-body">
                    Para se inscrever, os usuários devem acessar a plataforma online do sistema, preencher o formulário de inscrição e seguir as instruções específicas de cada instituição.
                  </div>
                </div>
                
              </div>
              <!--/ End Single Widget -->
              <!-- Single Widget -->
              <div class="single-widget faq">
                <div class="card border-0">
                  <div class="card-header p-0 border-0" id="headingFor">
                    <h5 class="mb-0 border-0">
                      <button 
                      class=" btn-link w-100 border-0" 
                      type="button" 
                      data-bs-toggle="collapse" 
                      data-bs-target="#collapseFor" 
                      aria-bs-expanded="true">
                        <span>Quais documentos são necessários para a inscrição?</span>
                      </button>
                    </h5>
                  </div>
                </div>
                <div id="collapseFor" class="collapse" aria-bs-labelledby="headingFor" data-bs-parent="#accordionExample">
                  <div class="card-body">
                    Os documentos necessários variam de acordo com a instituição e o nível de ensino, mas geralmente incluem comprovante de escolaridade, documentos de identificação e comprovante de pagamento de taxas.
                  </div>
                </div>
                
              </div>
              <!--/ End Single Widget -->
              <!-- Single Widget -->
              <div class="single-widget faq">
                <div class="card border-0">
                  <div class="card-header p-0 border-0" id="headingFive">
                    <h5 class="mb-0 border-0">
                      <button 
                      class=" btn-link w-100 border-0" 
                      type="button" 
                      data-bs-toggle="collapse" 
                      data-bs-target="#collapseFive" 
                      aria-bs-expanded="true">
                        <span>Como funciona a carteira digital para pagamento de emolumentos?</span>
                      </button>
                    </h5>
                  </div>
                </div>
                <div id="collapseFive" class="collapse" aria-bs-labelledby="headingFive" data-bs-parent="#accordionExample">
                  <div class="card-body">
                    A carteira digital permite que os usuários armazenem fundos virtualmente e realizem pagamentos de taxas de inscrição e outros emolumentos de forma rápida e segura através da plataforma do sistema.
                  </div>
                </div>
                
              </div>
              <!--/ End Single Widget -->
              <!-- Single Widget -->
              <div class="single-widget faq">
                <div class="card border-0">
                  <div class="card-header p-0 border-0" id="headingSix">
                    <h5 class="mb-0 border-0">
                      <button 
                      class=" btn-link w-100 border-0" 
                      type="button" 
                      data-bs-toggle="collapse" 
                      data-bs-target="#collapseSix" 
                      aria-bs-expanded="true">
                        <span>Como posso acompanhar o status da minha inscrição?</span>
                      </button>
                    </h5>
                  </div>
                </div>
                <div id="collapseSix" class="collapse" aria-bs-labelledby="headingSix" data-bs-parent="#accordionExample">
                  <div class="card-body">
                    Os usuários podem acompanhar o status da sua inscrição através do painel de controlo personalizado na plataforma, onde serão notificados em tempo real.
                  </div>
                </div>
                
              </div>
              <!--/ End Single Widget -->
              <!-- Single Widget -->
              <div class="single-widget faq">
                <div class="card border-0">
                  <div class="card-header p-0 border-0" id="headingSeven">
                    <h5 class="mb-0 border-0">
                      <button 
                      class=" btn-link w-100 border-0" 
                      type="button" 
                      data-bs-toggle="collapse" 
                      data-bs-target="#collapseSeven" 
                      aria-bs-expanded="true">
                        <span>O sistema é seguro para armazenar informações pessoais e financeiras?</span>
                      </button>
                    </h5>
                  </div>
                </div>
                <div id="collapseSeven" class="collapse" aria-bs-labelledby="headingSeven" data-bs-parent="#accordionExample">
                  <div class="card-body">
                    Sim, o sistema utiliza medidas de segurança avançadas para proteger as informações pessoais e financeiras dos usuários, garantindo a confidencialidade e a integridade dos dados.
                  </div>
                </div>
                
              </div>
              <!--/ End Single Widget -->
              <!-- Single Widget -->
              <div class="single-widget faq">
                <div class="card border-0">
                  <div class="card-header p-0 border-0" id="headingEight">
                    <h5 class="mb-0 border-0">
                      <button 
                      class=" btn-link w-100 border-0" 
                      type="button" 
                      data-bs-toggle="collapse" 
                      data-bs-target="#collapseEight" 
                      aria-bs-expanded="true">
                        <span>Como faço para obter suporte técnico em caso de problemas ou dúvidas?</span>
                      </button>
                    </h5>
                  </div>
                </div>
                <div id="collapseEight" class="collapse" aria-bs-labelledby="headingEight" data-bs-parent="#accordionExample">
                  <div class="card-body">
                    Os usuários podem entrar entrar em contacto com a equipa de suporte técnico através dos canais de comunicação fornecidos na plataforma incluindo email e telefone.
                  </div>
                </div>
                
              </div>
              <!--/ End Single Widget -->
              <!-- Single Widget -->
              <div class="single-widget faq">
                <div class="card border-0">
                  <div class="card-header p-0 border-0" id="headingNine">
                    <h5 class="mb-0 border-0">
                      <button 
                      class=" btn-link w-100 border-0" 
                      type="button" 
                      data-bs-toggle="collapse" 
                      data-bs-target="#collapseNine" 
                      aria-bs-expanded="true">
                        <span>Este sistemas está disponível apenas para instituições de Angola?</span>
                      </button>
                    </h5>
                  </div>
                </div>
                <div id="collapseNine" class="collapse" aria-bs-labelledby="headingNine" data-bs-parent="#accordionExample">
                  <div class="card-body">
                    Sim, o Sistema Unificado de Inscrições Escolares foi desenvolvido especialmente para atender as necessidades das instituições educacionais em Angola.
                  </div>
                </div>
                
              </div>
              <!--/ End Single Widget -->

						</div>
					</div>
				</div>
			</div>
		</section>
		<!--/ End Single News -->

		<div class="section-footer">

			<div class="container">
		
			  <div class="row-px-5">
				  <!-- Footer Area -->
				  <footer id="footer" class="footer border-0">
					<!-- Footer Top -->
					<div class="footer-top">
					  <div class="container">
						<div class="row">
						  <div class="col-lg-4 col-md-6 col-12">
							<div class="single-footer">
							  <h2>Sobre Nós</h2>
							  <p>Somos a equipa por trás do SUIEA - Sistema Unificado de Inscrições Escolares de Angola, Facilitando o caminho para um Futuro Educativo Inclusivo e Promissor.</p>
							</div>
						  </div>
						  <div class="col-lg-4 col-md-6 col-12">
							<div class="single-footer f-link">
							  <h2>Mapa do site</h2>
							  <div class="row">
								<div class="col-lg-4 col-md-4 col-12">
								  <ul>
								  <ul>
									<li><a href="index.php"><i class="icofont-simple-right" aria-hidden="true"></i>Home</a></li>
									<li><a href="ver-inscricoes.php"><i class="icofont-simple-right" aria-hidden="true"></i>Inscrições</a></li>
									<li><a href="ver-matriculas.php"><i class="icofont-simple-right" aria-hidden="true"></i>Matrículas</a></li>
								  </ul>
								</div>
								<div class="col-lg-8 col-md-8 col-12">
								  <ul>
									<li><a href="pages-faq.php"><i class="icofont-simple-right" aria-hidden="true"></i>FAQ</a></li>
									<li><a href="escolas.php?tipo="><i class="icofont-simple-right" aria-hidden="true"></i>Ensino Médio</a></li>
									<li><a href="escolas.php?tipo="><i class="icofont-simple-right" aria-hidden="true"></i>Ensino Superior</a></li>
								  </ul>
								</div>	
							  </div>
							</div>
						  </div>
						  <div class="col-lg-4 col-md-6 col-12">
							<div class="single-footer f-link">
							  <h2>Informação</h2>
							  <div class="row">
								<div class="col-lg-6 col-md-6 col-12">
								  <ul>
									<li><a href="#"><i class="icofont icofont-phone " aria-hidden="true"></i>933 333 333</a></li>
									<li><a href="#"><i class="icofont icofont-phone " aria-hidden="true"></i>922 222 222</a></li>
									<li><a href="#"><i class="icofont icofont-email" aria-hidden="true"></i>suporte@suiea.com</a></li>
								  </ul>
								</div>
							  </div>
							</div>
						  </div>
						</div>
					  </div>
					</div>
					<!--/ End Footer Top -->
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
			  </div>
		
			</div>
		
		  </div>
	  
		</main><!-- End #main -->
	  
		<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
	  
		<!-- Vendor JS Files -->
		<script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
		<script src="../assets/vendor/quill/quill.min.js"></script>
		<script src="../assets/vendor/tinymce/tinymce.min.js"></script>
	  
		<!-- Slick JS -->
		<script src="../assets/js/jquery-1.11.0.min.js"></script>
		<script src="../assets/js/jquery.migrate-1.2.1.js"></script>
		<script src="../assets/js/slick.min.js"></script>
	  
		<!-- Template Main JS File -->
		<script src="../assets/js/main.js"></script>

</body>

</html>