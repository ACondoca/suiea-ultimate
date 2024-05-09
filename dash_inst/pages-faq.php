<?php
  include_once "../../model/session.php";
  include_once "../../model/conexao.php";
  
  if(isset($_SESSION['id'])){
    $id = $_SESSION['id'];
    $imagem = $_SESSION['imagem'];

    $avatar = "../../storage/instituições/$id/imagem/$imagem";
  }else{
    header('location: ../../view/auth/login.php');
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

  <!-- Google Fonts -->
  <link href="../https://fonts.gstatic.com" rel="preconnect">
  <link href="../https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <script src="../assets/vendor/apexcharts/apexcharts.min.js"></script>
  <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="../assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="../assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="../assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template icofont CSS -->
  <link rel="stylesheet" href="../../css/icofont.css">
  <link rel="stylesheet" href="../../fonts/icofont.eot">
  <link rel="stylesheet" href="../../fonts/icofont.ttf">
  <link rel="stylesheet" href="../../fonts/icofont.woff">
  
  <!-- Template Main CSS File -->
  <link href="../assets/css/style.css" rel="stylesheet">

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

  <?php include "../component/header_inst.php"; ?>

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link" href="index.php">
          <i class="bi bi-grid"></i>
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
          <i class="bi bi-card-list"></i>
          <span>Matrículas</span>
        </a>
      </li><!-- End Notification Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="ver-estatisticas.php">
          <i class="bi bi-bar-chart"></i>
          <span>Estatísticas</span>
        </a>
      </li><!-- End Notification Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="ver-periodo-inscricao.php">
          <i class="bi bi-card-list"></i>
          <span>Cursos & Períodos</span>
        </a>
      </li><!-- End Notification Nav -->

    </ul>

  </aside><!-- End Sidebar-->

  <main id="main" class="main">

    <section class="section dashboard">
      <div class="row mb-5">

        <!-- Left side columns -->
        <div class="col-lg-12">
          <div class="row">

            <!-- Breadcrumbs -->
            <div class="breadcrumbs overlay" id="home-student">
              <div class="container">
                <div class="bread-inner">
                  <div class="row">
                    <div class="col-12">
                      <h2>Perguntas Frequentes</h2>
                      <ul class="bread-list">
                        <li><a href="index.php">Página inicial</a></li>
                        <li><i class="icofont-simple-right"></i></li>
                        <li class="active">Perguntas Frequentes</li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- End Breadcrumbs -->

          </div>
        </div>

      </div>
    </section>

    <section class="section faq">
      <div class="row">

        <div class="col-lg-12">

          <!-- Single News -->
          <section class="news-single section pt-5" style="background: transparent !important;">
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

        </div>

      </div>
    </section>

  </main><!-- End #main -->

   <!-- ======= Footer ======= -->
   <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright 2024 | Todos os direitos reservados por <a href="https://www.suiea.com">SUIEA</a>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="../assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/vendor/quill/quill.min.js"></script>
  <script src="../assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="../assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="../assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="../assets/js/main.js"></script>

</body>

</html>