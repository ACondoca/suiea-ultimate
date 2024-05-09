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
  <link rel="stylesheet" href="../../fonts/icofont.woff">~
  
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

<main id="main" class="main" style="background: #fff;">

  <div class="pagetitle">
    <h1>Notificações</h1>
  </div><!-- End Page Title -->

  <section class="section dashboard">
    <div class="row">

      <div class="col-lg-12">

        <div class="ver-alerts">
          <div class="card-body">
            <h5 class="card-title"></h5>

            <ul class=" notifications">
              
               
    
              <?php

                  $sql = "SELECT * FROM notificacao_admin INNER JOIN instituicao ON notificacao_admin.id_est = instituicao.id_instituicao WHERE id_instituicao = $id";
                  $stmt = $pdo->query($sql);
                  if ($stmt->rowCount() != 0) {
                    $count = 1; 
                    while ($rowNotifica = $stmt->fetch(PDO::FETCH_ASSOC)) {
                      ?>
                      <li>
                        <hr class="dropdown-divider">
                      </li>

                      <li class="notification-item bg-white mb-5">
                        <i class="bi bi-info-circle text-primary"></i>
                        <div>
                          <h4><?php echo $rowNotifica['titulo']; ?></h4>
                          <p><?php echo $rowNotifica['conteuto']; ?></p>
                          <p><?php echo $rowNotifica['notificacao_date']; ?></p>
                        </div>
                      </li>
                  <?php
                    }
                  }else{
                    ?>
                    <section>
                      <div class="d-flex justify-content-center align-items-center"><div class="row">
                        <div class="col-lg-12 mt-5">
                          <div class="section-title mb-0">
                            <h5 class="text-center">Não tem notificações ainda!</h5>
                          </div>
                          <img src="../../assets/img/addcurso.png" alt="">
                        </div>
                      </div>
                    </section>
                    <?php
                  }
                  ?> 

            </ul>

            

          </div>
        </div>

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