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
        <a class="nav-link " href="index.php">
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

    <section class="section dashboard vh-100">
      <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-12">
          <div class="row">

            <!-- Sales Card -->
            <div class="col-lg-12 px-0">
              <div class="card">

                <div class="card-body p-0 m-0">
    
                  <!-- Slides with captions -->
                  <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-indicators">
                      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
                    </div>
                    <div class="carousel-inner" style="border-radius: 5px;">
                      <div class="carousel-item active">
                        <img src="../../assets/img/1.jpg" class="d-block w-100" alt="...">
                        <div class="carousel-caption d-md-block" style="text-shadow: #000 2px 2px;">
                          <h5 class="mt-lg-0">Bem-vindo ao Painel da Instituição</h5>
                          <p><button class="btn btn-primary" onclick="window.location.href='users-profile.php'">Ver Perfil</button></p>
                        </div>
                      </div>
                      <div class="carousel-item">
                        <img src="../../assets/img/2.jpg" class="d-block w-100" alt="...">
                        <div class="carousel-caption d-md-block" style="text-shadow: #000 2px 2px;">
                          <h5>Verifique inscrições Recentes</h5>
                          <p><button class="btn btn-primary" onclick="window.location.href='ver-inscricoes.php'">Ver Inscrições</button></p>
                        </div>
                      </div>
                      <div class="carousel-item">
                        <img src="../../assets/img/3.jpg" class="d-block w-100" alt="...">
                        <div class="carousel-caption d-md-block" style="text-shadow: #000 2px 2px;">
                          <h5>Verifique Matrículas Recentes</h5>
                          <p><button class="btn btn-primary" onclick="window.location.href='ver-matriculas.php'">Ver Matrículas</button></p>
                        </div>
                      </div>
                    </div>
    
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                      <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                      <span class="carousel-control-next-icon" aria-hidden="true"></span>
                      <span class="visually-hidden">Next</span>
                    </button>
    
                  </div><!-- End Slides with captions -->
    
                </div>

              </div>
            </div><!-- End Sales Card -->

            <!-- Sales Card -->
            <div class="col-lg-12">
              <div class="card info-card sales-card d-flex align-items-center justify-content-center" style="background-image: url('../../assets/img/addcurso.png'); background-position: center; background-repeat: no-repeat;">

                <div class="card-body p-5">
                  <div class="d-flex align-items-center justify-content-center" style="height: 600px;">
                    <div class="text-center">
                      <h6 style="font-size: 22px !important; font-weight: 800; background: #fff; border-radius: 6px !important;" class="p-1">Adicione cursos à Instituição</h6>
                      <span class="text-success pt-3 fw-bold d-block">
                        Comece adicionando os cursos da Instituição
                      </span>
                      <button class="btn btn-primary mt-3" onclick="window.location.href='ver-periodo-inscricao.php#AddCurso'">
                        Adicionar Curso
                      </button>
                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Sales Card -->

            <!-- Sales Card -->
            <div class="col-lg-12">
              <div class="card info-card sales-card d-flex align-items-center justify-content-center" style="background-image: url('../../assets/img/periodo.jpg'); background-position: center; background-repeat: no-repeat;">

                <div class="card-body p-5">
                  <div class="d-flex align-items-center justify-content-center" style="height: 600px;">
                    <div class="text-center">
                      <h6 style="font-size: 22px !important; font-weight: 800; background: #fff; border-radius: 6px !important;" class="p-1">Cadastre um período de Inscrição</h6>
                      <span class="text-success pt-3 fw-bold d-block">
                        Para determinar o início e o fim de uma temporada de inscrições 
                      </span>
                      <button class="btn btn-primary mt-3" onclick="window.location.href='ver-periodo-inscricao.php#AddPeriodo'">
                        Cadastrar período
                      </button>
                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Sales Card -->

          </div>
        </div><!-- End Left side columns -->

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