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
?><!DOCTYPE html>
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
        <a class="nav-link collapsed" href="index.php">
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
        <a class="nav-link" href="ver-estatisticas.php">
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
                      <h2>Estatísticas</h2>
                      <ul class="bread-list">
                        <li><a href="index.php">Página inicial</a></li>
                        <li><i class="icofont-simple-right"></i></li>
                        <li class="active">Estatísticas</li>
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
      <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-12">
          <div class="row">

            <!-- Sales Card -->
            <div class="col-xxl-6 col-md-6">
              <div class="card info-card sales-card">

                <div class="card-body">
                  <h5 class="card-title">Inscrições<span> | Total</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-pencil-square"></i>
                    </div>
                    <div class="ps-3">
                      <h6><?php 
                      $sql_area = "SELECT area FROM instituicao WHERE id_instituicao = $id";
                      $stmt_area = $pdo->query($sql_area);
                      $area = $stmt_area->fetch(PDO::FETCH_ASSOC)['area'];
              
                      // Determina o nome da tabela de inscrições com base na área da instituição
                      $table_name = ($area == 'Ensino Médio') ? 'inscricao_medio' : 'inscricao_superior';
              
                      // Consulta para obter o total de inscrições
                      $sql_total_inscricoes = "SELECT COUNT(*) as total FROM $table_name WHERE id_inst = $id";
                      $stmt_total_inscricoes = $pdo->prepare($sql_total_inscricoes);
                      $stmt_total_inscricoes->execute();
                      $total_inscricoes = $stmt_total_inscricoes->fetch(PDO::FETCH_ASSOC)['total'];
                      echo $total_inscricoes;
                      
                      ?></h6>

                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Sales Card -->

            <!-- Revenue Card -->
            <div class="col-xxl-6 col-md-6">
              <div class="card info-card revenue-card">

                <div class="card-body">
                  <h5 class="card-title">Matrículas<span> | Total</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-file-check"></i>
                    </div>
                    <div class="ps-3">
                      <h6><?php 
                      $sql_area = "SELECT area FROM instituicao WHERE id_instituicao = $id";
                      $stmt_area = $pdo->query($sql_area);
                      $area = $stmt_area->fetch(PDO::FETCH_ASSOC)['area'];
              
                      // Determina o nome da tabela de inscrições com base na área da instituição
                      $table_name = ($area == 'Ensino Médio') ? 'matricula_medio' : 'matricula_superior';
              
                      // Consulta para obter o total de inscrições
                      $sql_total_inscricoes = "SELECT COUNT(*) as total FROM $table_name WHERE id_inst = $id";
                      $stmt_total_inscricoes = $pdo->prepare($sql_total_inscricoes);
                      $stmt_total_inscricoes->execute();
                      $total_inscricoes = $stmt_total_inscricoes->fetch(PDO::FETCH_ASSOC)['total'];
                      echo $total_inscricoes;
                      
                      ?></h6>

                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Revenue Card -->

            <div class="col-md-6">
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title">Estatísticas | Inscrições</h5>
    
                  <!-- Pie Chart -->
                  <div id="pieChart"></div>
    
                  <script>
                    document.addEventListener("DOMContentLoaded", () => {
                      new ApexCharts(document.querySelector("#pieChart"), {
                        series: [
                          
                          <?php
                          $sql_area = "SELECT area FROM instituicao WHERE id_instituicao = $id";
                          $stmt_area = $pdo->query($sql_area);
                          $area = $stmt_area->fetch(PDO::FETCH_ASSOC)['area'];
                  
                          // Determina o nome da tabela de inscrições com base na área da instituição
                          $table_name = ($area == 'Ensino Médio') ? 'inscricao_medio' : 'inscricao_superior';

                           // Consulta para obter o total de inscrições
                          $sql_total_inscricoes = "SELECT * FROM $table_name WHERE estado like 'Aprovada' AND id_inst = $id";
                          $stmt_total_inscricoes = $pdo->prepare($sql_total_inscricoes);
                          $stmt_total_inscricoes->execute();
                          $total_inscricoe_aprov  = $stmt_total_inscricoes->rowCount();
                          echo $total_inscricoe_aprov;
                      
                          ?>, 
                          <?php
                          
                          // Consulta para obter o total de inscrições
                         $sql_total_inscricoes = "SELECT * FROM $table_name WHERE estado like 'Pendente' AND id_inst = $id";
                         $stmt_total_inscricoes = $pdo->prepare($sql_total_inscricoes);
                         $stmt_total_inscricoes->execute();
                         $total_inscricoes_pend  = $stmt_total_inscricoes->rowCount();
                         echo $total_inscricoes_pend;
                     
                         ?>],
                        chart: {
                          height: 350,
                          type: 'pie',
                          toolbar: {
                            show: true
                          }
                        },
                        labels: ['Aprovadas', 'Pendentes']
                      }).render();
                    });
                  </script>
                  <!-- End Pie Chart -->
    
                </div>
              </div>
            </div>

            <div class="col-md-6">
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title">Estatísticas | Matrículas</h5>

                  <!-- Pie Chart -->
                  <div id="pieChart2"></div>

                  <script>
                    document.addEventListener("DOMContentLoaded", () => {
                      new ApexCharts(document.querySelector("#pieChart2"), {
                        series: [
                          <?php
                          $sql_area = "SELECT area FROM instituicao WHERE id_instituicao = $id";
                          $stmt_area = $pdo->query($sql_area);
                          $area = $stmt_area->fetch(PDO::FETCH_ASSOC)['area'];
                  
                          // Determina o nome da tabela de inscrições com base na área da instituição
                          $table_name = ($area == 'Ensino Médio') ? 'matricula_medio' : 'matricula_superior';
                  
                          // Consulta para obter o total de inscrições
                          $sql_total_inscricoes = "SELECT * FROM $table_name WHERE estado like 'Feita' AND id_inst = $id";
                          $stmt_total_inscricoes = $pdo->prepare($sql_total_inscricoes);
                          $stmt_total_inscricoes->execute();
                          $total_inscricoe_aprov  = $stmt_total_inscricoes->rowCount();
                          echo $total_inscricoe_aprov;
                          ?>,
                          <?php
                          $sql_total_inscricoes = "SELECT * FROM $table_name WHERE estado like 'Pendente' AND id_inst = $id";
                          $stmt_total_inscricoes = $pdo->prepare($sql_total_inscricoes);
                          $stmt_total_inscricoes->execute();
                          $total_inscricoe_pend  = $stmt_total_inscricoes->rowCount();
                          echo $total_inscricoe_pend;
                          ?>],
                        chart: {
                          height: 350,
                          type: 'pie',
                          toolbar: {
                            show: true
                          }
                        },
                        labels: ['Feitas', 'Pendentes',]
                      }).render();
                    });
                  </script>
                  <!-- End Pie Chart -->

                </div>
              </div>
            </div>

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