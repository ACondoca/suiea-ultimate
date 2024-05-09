<?php
  include_once "../../model/session.php";
  include_once "../../model/conexao.php";
  
  if(isset($_SESSION['id'])){
    $id = $_SESSION['id'];
    $imagem = $_SESSION['avatar'];

    $avatar = "../../storage/administradores/$id/imagem/$imagem";
  }else{
    header('../auth/login.php');
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

  <!-- Vendor CSS Files -->
  <script src="../assets/vendor/apexcharts/apexcharts.min.js"></script>
  <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="../assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="../assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="../assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template icofont CSS -->
  <link rel="stylesheet" href="../../assets/css/icofont.css">
  <link rel="stylesheet" href="../../assets/fonts/icofont.eot">
  <link rel="stylesheet" href="../../assets/fonts/icofont.ttf">
  <link rel="stylesheet" href="../../assets/fonts/icofont.woff">

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

  <?php include "../component/header_admin.php"; ?>

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
        <a class="nav-link collapsed" href="ver-estatisticas.php" >
          <i class="bi bi-bar-chart"></i>
          <span>Estatísticas</span>
        </a>
      </li><!-- End Students Nav -->

      <li class="nav-item">
        <a class="nav-link" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-building"></i><span>Instituições</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="tables-nav" class="nav-content collapse show" data-bs-parent="#sidebar-nav">
          <li>
            <a href="ver-escolas-1.php">
              <i class="bi bi-circle"></i><span>Ensino Médio</span>
            </a>
          </li>
          <li>
            <a href="ver-escolas-2.php" class="active">
              <i class="bi bi-circle"></i><span>Ensino Superior</span>
            </a>
          </li>
        </ul>
      </li><!-- End Instituitions Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="ver-estudantes.php">
          <i class="bi bi-person"></i>
          <span>Utilizadores</span>
        </a>
      </li><!-- End Students Nav -->

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

    </ul>

  </aside><!-- End Sidebar-->

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Ensino Superior</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Página inicial</a></li>
          <li class="breadcrumb-item">Instituições</li>
          <li class="breadcrumb-item active">Ensino Superior</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        
        <!-- Website Traffic -->
        <div class="col-lg-12 mb-5">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Estatística | Escolas do Ensino Superior</h5>

              <!-- Pie Chart -->
              <div id="pieChart"></div>
              <?php
                $sql_total1 = "SELECT * FROM instituicao";
                $stmt_total1 = $pdo ->query($sql_total1);
                $row_total1 = $stmt_total1 -> rowCount();

                $sql_total2 = "SELECT nome FROM instituicao INNER JOIN inst_superior ON instituicao.id_instituicao = inst_superior.id";
                $stmt_total2 = $pdo ->query($sql_total2);
                $row_total2 = $stmt_total2 -> rowCount();
              ?>
              <script>
                document.addEventListener("DOMContentLoaded", () => {
                  new ApexCharts(document.querySelector("#pieChart"), {
                    series: [<?=$row_total1;?>, <?=$row_total2;?>],
                    chart: {
                      height: 400,
                      type: 'pie',
                      toolbar: {
                        show: true
                      }
                    },
                    labels: ['Instituições', 'Escolas do Ensino Superior']
                  }).render();
                });
              </script>
              <!-- End Pie Chart -->

            </div>
          </div>
        </div><!-- End Website Traffic -->

      </div>
    </section>
            
    <section class="section">
      <div class="row">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Lista de Instituições do Ensino Superior</h5>

              <!-- Table with stripped rows -->
              <table class="table datatable">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Estado</th>
                    <th scope="col">Cadastro</th>
                    <th scope="col">Tipo</th>
                    <th scope="col">Área de Ensino</th>
                    <th scope="col">Acções</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                    $sql_total_inscricoes1 = "SELECT * FROM instituicao INNER JOIN inst_superior ON instituicao.id_instituicao = inst_superior.id ORDER BY instituicao.id_instituicao DESC";
                    $stmt_total_inscricoes1 = $pdo->prepare($sql_total_inscricoes1);
                    $stmt_total_inscricoes1->execute();
                    while($rowInsc = $stmt_total_inscricoes1->fetch(PDO::FETCH_ASSOC)){
                  ?>
                    <tr>
                  <td><?=$rowInsc['id_instituicao'];?></td>
                  <td><span class=""><?=$rowInsc['nome'];?></span></td>
                  <td><span class="badge bg-secondary"><?=$rowInsc['estado'];?></span></td>
                  <td><?=$rowInsc['criado'];?></td>
                  <td><?=$rowInsc['tipo'];?></td>
                  <td><?=$rowInsc['area'];?></td>
                  <td>
                    <button type="button" class="btn btn-primary mt-2 mb-2 w-100" data-bs-toggle="modal" data-bs-target="#ExtralargeModal<?=$rowInsc['id_instituicao'];?>">
                      Detalhes
                  </button>
                      <!-- Start Extra Large Modal-->
                      <div class="modal fade" id="ExtralargeModal<?=$rowInsc['id_instituicao'];?>" tabindex="-1">
                      <div class="modal-dialog modal-xl">
                        <div class="modal-content">
                          <div class="modal-header border-0" style="background: #00054ad4 !important; color: #fff;">
                            <div class="card-header border-0" style="background: transparent !important; color: #fff;">
                              <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center" style="border: 1px solid #00054ad4; width: 100px; height: 100px;">
                                  <img src="../assets/img/logo.png" alt="SUIEA" class="w-100 rounded-circle">
                                </div>
                                <div class="ps-3" style="color: #fff !important;">
                                  <h6 style="color: #fff !important; font-size: 22px;">Informações sobre a Instituição</h6>
                                </div>
                              </div>
                            </div>
                            
                            <button type="button" class="btn-close bolder" style="font-size: 16px;" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                            <div class="card-body">
                                <!-- Left side columns -->
                                <div class="col-lg-12">
                                  <div class="row">
                                    
                                    <div class="col-xxl-4 col-md-4">

                                      <div class="card info-card sales-card p-2">
                                        
                                        <div class="card-body text-center p-0">
                                          <div class="d-flex align-items-center justify-content-center w-100">
                                              <img src="../../storage/instituições/<?=$rowInsc['id_instituicao'];?>/imagem/<?=$rowInsc['imagem'];?>" alt="" class="w-100" style="border-radius: 4px;">
                                          </div>
                                        </div>

                                      </div>
                                      
                                      <div class="card info-card sales-card p-0">
                                        <div class="card-body p-0">
                                            <div class="w-100 p-0">
                                              <form class="p-0" action="../../controller/auth/authController.php" method="POST" enctype="multipart/form-data">
                                              <input type="hidden" name="tipo" value="AprovarInst2">
                                              <input type="hidden" name="inst" value="<?=$rowInsc['id_instituicao'];?>">
                                              <button type="submit" class="btn btn-primary d-flex align-items-center justify-content-center w-100">
                                                <i class="bi bi-check" style="font-size: 32px;"></i> Aprovar Instituição
                                              </button>
                                              </form>
                                            </div>
                                        </div>
                                      </div>
                                      
                                      <div class="card info-card sales-card p-0">
                                        <div class="card-body p-0">
                                            <div class="w-100 p-0">
                                              <form class="p-0" action="../../controller/auth/authController.php" method="POST" enctype="multipart/form-data">
                                              <input type="hidden" name="tipo" value="BlockInst2">
                                              <input type="hidden" name="inst" value="<?=$rowInsc['id_instituicao'];?>">
                                              <button type="submit" class="btn btn-danger d-flex align-items-center justify-content-center w-100">
                                                <i class="bi bi-check" style="font-size: 32px;"></i> Bloquear Instituição
                                              </button>
                                              </form>
                                            </div>
                                        </div>
                                      </div>

                                    </div>

                                    <!-- Sales Card -->
                                    <div class="col-xxl-8 col-md-8">
                                      <div class="card info-card sales-card">

                                        <div class="card-body">

                                          <div class="profile-overview">

                                            <h5 class="card-title">Dados da Instituição</h5>

                                            <div class="row mb-3 px-2">
                                              <div class="col-lg-6 col-md-6 label ">Nome da Instituição</div>
                                              <div class="col-lg-6 col-md-6"><?=$rowInsc['nome'];?></div>
                                            </div>
                          
                                            <div class="row mb-3 px-2">
                                              <div class="col-lg-6 col-md-6 label">Área</div>
                                              <div class="col-lg-6 col-md-6"><?=$rowInsc['area'];?></div>
                                            </div>
                          
                                            <div class="row mb-3 px-2">
                                              <div class="col-lg-6 col-md-6 label">Tipo</div>
                                              <div class="col-lg-6 col-md-6"><?=$rowInsc['tipo'];?></div>
                                            </div>
                          
                                            <div class="row mb-3 px-2">
                                              <div class="col-lg-6 col-md-6 label">Localização</div>
                                              <div class="col-lg-6 col-md-6"><?=$rowInsc['localizacao'];?></div>
                                            </div>
                          
                                            <div class="row mb-3 px-2">
                                              <div class="col-lg-6 col-md-6 label">Telefone</div>
                                              <div class="col-lg-6 col-md-6"><?=$rowInsc['telefone'];?></div>
                                            </div>
                          
                                            <div class="row mb-3 px-2">
                                              <div class="col-lg-6 col-md-6 label">Email</div>
                                              <div class="col-lg-6 col-md-6"><?=$rowInsc['email'];?></div>
                                            </div>
                                            
                                            <div class="row mb-3 px-2">
                                              <div class="col-lg-6 col-md-6 label">NIF</div>
                                              <div class="col-lg-6 col-md-6"><?=$rowInsc['nif'];?></div>
                                            </div>

                                          </div>

                                        </div>

                                        <div class="card-footer">
                                        </div>
                                      </div>
                                    </div><!-- End Sales Card -->

                                  </div>
                                </div>
                            </div>
                          </div>
                          <div class="modal-footer border-0" style="background: #00054ad4 !important; color: #fff;">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Fechar</button>
                          </div>
                        </div>
                      </div>
                    </div><!-- End Extra Large Modal-->
                      </td>
                      </tr>
                        <?php
                      }
                  ?>
                </tbody>
              </table>
              <!-- End Table with stripped rows -->

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