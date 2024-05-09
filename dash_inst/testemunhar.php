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
                      <h2>Dar Testemunho</h2>
                      <ul class="bread-list">
                        <li><a href="index.php">Página inicial</a></li>
                        <li><i class="icofont-simple-right"></i></li>
                        <li class="active">Dar Testemunho</li>
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

    <section class="section dashboard">
      <div class="row mb-5">

        <!-- Left side columns -->
        <div class="col-lg-12">
          <div class="row">

            <!-- Sales Card -->
            <div class="col-lg-12">
              <div class="card info-card sales-card">

                <div class="card-header">
                  <h5 class="card-title"></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-chat-quote"></i>
                    </div>
                    <div class="ps-3">
                      <h6>O que pensa do SUIEA?</h6>
                      <span class="text-success small pt-1 fw-bold">
                        Sistema Unificado de Inscricoes Escolares de Angola
                      </span>
                    </div>
                  </div>
                </div>

                <div class="card-body">
                  <section class="section contact">
                  <form action="../../controller/auth/authController.php" method="POST" enctype="multipart/form-data">
                      <div class="row gy-4 py-5">
        
                        <div class="col-md-12">
                          <textarea class="form-control"  name="conteudo" rows="6" placeholder="Escreva aqui..." required></textarea>
                          <input type="hidden" name="tipo" value="addSMS">
                          <input type="hidden" name="id" value="<?=$_SESSION['id'];?>">
                        </div>
        
                        <div class="col-md-12 text-center">
                          <button type="submit" class="btn btn-primary">Enviar Testemunho</button>
                        </div>
        
                      </div>
                    </form>
                  </section>
                </div>

              </div>
            </div><!-- End Sales Card -->

          </div>
        </div>

      </div>
    </section>

  </main><!-- End #main -->

  <!-- Extra Large Modal -->
  <div class="modal fade" id="ExtralargeModal" tabindex="-1">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="modal-header border-0">
          <h5 class="modal-title">Detalhes do Testemunho</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="">
          <div class="modal-body">
            
            <section class="section dashboard">
              <div class="row mb-5">
        
                <!-- Left side columns -->
                <div class="col-lg-12">
                  <div class="row">
        
                    <!-- Sales Card -->
                    <div class="col-lg-12">
                      <div class="card info-card sales-card">
        
                        <div class="card-body">
                          <h5 class="card-title"><span>Data de Criação</span> | <span> 2024/04/04</span></h5>
        
                          <div class="d-flex align-items-center">
                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                              <img src="assets/img/profile-img.jpg" alt="Instituição" class="w-100" style="border-radius: 50%;">
                            </div>
                            <div class="ps-3 text-center">
                              <h6>Instituto de Telecomunicações</h6>
                              <span class="text-muted pt-5 ps-1">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rem accusamus, quibusdam animi explicabo excepturi repellendus laboriosam deserunt repellat labore non atque impedit error ducimus ad aliquid, eaque aliquam nam dolorum. 
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Enim nemo tenetur eius. Saepe repudiandae iusto consectetur vel quo minima quas, quae recusandae neque autem pariatur excepturi ipsam soluta. Vero, quos.
                              </span>
        
                            </div>
                          </div>
                        </div>
        
                      </div>
                    </div><!-- End Sales Card -->
        
                  </div>
                </div>
        
              </div>
            </section>

            <div class="row mb-3">
              <div class="col-md-12 col-lg-12">
                <div class="form-check">
                  <select name="estado_testemunho" id="" class="form-control">
                    <option value="Bloqueado">Bloqueado</option>
                    <option value="Publicado">Publicado</option>
                  </select>
                </div>
              </div>
            </div>

          </div>
          <div class="modal-footer border-0">
            <button type="submit" class="btn btn-primary">Salvar Mudanças</button>
          </div>
        </form>
      </div>
    </div>
  </div><!-- End Extra Large Modal-->

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