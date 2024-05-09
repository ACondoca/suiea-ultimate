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

      <li class="nav-item">
        <a class="nav-link" href="ver-estudantes.php">
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
      <h1>Utilizadores</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Página inicial</a></li>
          <li class="breadcrumb-item active">Utilizadores</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row mb-5">

        <!-- Left side columns -->
        <div class="col-lg-12">
          <div class="row">
              <?php
                $sql_total1 = "SELECT * FROM utilizador";
                $stmt_total1 = $pdo ->query($sql_total1);
                $row_total1 = $stmt_total1 -> rowCount();

                $sql_total2 = "SELECT nome FROM utilizador WHERE estado = 'Activo'";
                $stmt_total2 = $pdo ->query($sql_total2);
                $row_total2 = $stmt_total2 -> rowCount();

                $sql_total3 = "SELECT nome FROM utilizador WHERE estado = 'N Activo'";
                $stmt_total3 = $pdo ->query($sql_total3);
                $row_total3 = $stmt_total3 -> rowCount();
              ?>
            <!-- Sales Card -->
            <div class="col-xxl-4 col-md-4">
              <div class="card info-card sales-card">

                <div class="card-body">
                  <h5 class="card-title">Utilizadores<span> | Total</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-people"></i>
                    </div>
                    <div class="ps-3">
                      <h6><?=$row_total1;?></h6>

                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Sales Card -->

            <!-- Sales Card -->
            <div class="col-xxl-4 col-md-4">
              <div class="card info-card sales-card">

                <div class="card-body">
                  <h5 class="card-title">Utilizadores<span> | Activos</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle text-success d-flex align-items-center justify-content-center">
                      <i class="bi bi-people"></i>
                    </div>
                    <div class="ps-3">
                      <h6><?=$row_total2;?></h6>

                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Sales Card -->

            <!-- Sales Card -->
            <div class="col-xxl-4 col-md-4">
              <div class="card info-card sales-card">

                <div class="card-body">
                  <h5 class="card-title">Utilizadores<span> | Não Activos</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle text-secondary d-flex align-items-center justify-content-center">
                      <i class="bi bi-people"></i>
                    </div>
                    <div class="ps-3">
                      <h6><?=$row_total3;?></h6>

                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Sales Card -->
            
          
          </div>
        </div>

      </div>
    </section>
              
    <section class="section">
      <div class="row">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Lista de Instituições do Ensino Médio</h5>

              <!-- Table with stripped rows -->
              <table class="table datatable">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nome</th>
                    <th scope="col" data-type="date" data-format="YYYY/DD/MM">Data de Nascimento</th>
                    <th scope="col">Gênero</th>
                    <th scope="col">Email</th>
                    <th scope="col">Telefone</th>
                    <th scope="col">Estado</th>
                    <th scope="col">Acções</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                    $sql_total_inscricoes1 = "SELECT * FROM utilizador  WHERE tipo = 'Utilizador' ORDER BY id_utilizador DESC";
                    $stmt_total_inscricoes1 = $pdo->prepare($sql_total_inscricoes1);
                    $stmt_total_inscricoes1->execute();
                    while($rowInsc = $stmt_total_inscricoes1->fetch(PDO::FETCH_ASSOC)){
                  ?>
                    <tr>
                  <td><?=$rowInsc['id_utilizador'];?></td>
                  <td><span class=""><?=$rowInsc['nome'];?></span></td>
                  <td><span class=""><?=$rowInsc['nascimento'];?></span></td>
                  <td><?=$rowInsc['genero'];?></td>
                  <td><?=$rowInsc['email'];?></td>
                  <td><?=$rowInsc['telefone'];?></td>
                  <td><span class="badge bg-secondary"><?=$rowInsc['estado'];?></span></td>
                  <td>
                    <button type="button" class="btn btn-primary mt-2 mb-2 w-100" data-bs-toggle="modal" data-bs-target="#ExtralargeModal<?=$rowInsc['id_utilizador'];?>">
                      Detalhes
                  </button>
                      <!-- Start Extra Large Modal-->
                      <div class="modal fade" id="ExtralargeModal<?=$rowInsc['id_utilizador'];?>" tabindex="-1">
                      <div class="modal-dialog modal-xl">
                        <div class="modal-content">
                          <div class="modal-header border-0" style="background: #00054ad4 !important; color: #fff;">
                            <div class="card-header border-0" style="background: transparent !important; color: #fff;">
                              <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center" style="border: 1px solid #00054ad4; width: 100px; height: 100px;">
                                  <img src="../assets/img/logo.png" alt="SUIEA" class="w-100 rounded-circle">
                                </div>
                                <div class="ps-3" style="color: #fff !important;">
                                  <h6 style="color: #fff !important; font-size: 22px;">Informações sobre o Utilizador</h6>
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
                                              <img src="../../storage/usuarios/<?=$rowInsc['id_utilizador'];?>/imagem/<?=$rowInsc['avatar'];?>" alt="" class="w-100 h-100" style="border-radius: 4px;">
                                          </div>
                                        </div>

                                      </div>

                                    </div>

                                    <!-- Sales Card -->
                                    <div class="col-xxl-8 col-md-8">
                                      <div class="card info-card sales-card">

                                        <div class="card-body">

                                          <div class="profile-overview">

                                            <h5 class="card-title">Dados do Utilizador</h5>

                                            <div class="row mb-3 px-2">
                                              <div class="col-lg-6 col-md-6 label ">Nome</div>
                                              <div class="col-lg-6 col-md-6"><?=$rowInsc['nome'];?></div>
                                            </div>
                          
                                            <div class="row mb-3 px-2">
                                              <div class="col-lg-6 col-md-6 label">Nascimento</div>
                                              <div class="col-lg-6 col-md-6"><?=$rowInsc['nascimento'];?></div>
                                            </div>
                          
                                            <div class="row mb-3 px-2">
                                              <div class="col-lg-6 col-md-6 label">Gênero</div>
                                              <div class="col-lg-6 col-md-6"><?=$rowInsc['genero'];?></div>
                                            </div>
                          
                                            <div class="row mb-3 px-2">
                                              <div class="col-lg-6 col-md-6 label">Email</div>
                                              <div class="col-lg-6 col-md-6"><?=$rowInsc['email'];?></div>
                                            </div>
                          
                                            <div class="row mb-3 px-2">
                                              <div class="col-lg-6 col-md-6 label">Telefone</div>
                                              <div class="col-lg-6 col-md-6"><?=$rowInsc['telefone'];?></div>
                                            </div>
                          
                                            <div class="row mb-3 px-2">
                                              <div class="col-lg-6 col-md-6 label">Morada</div>
                                              <div class="col-lg-6 col-md-6"><?=$rowInsc['morada'];?></div>
                                            </div>
                                            
                                            <div class="row mb-3 px-2">
                                              <div class="col-lg-6 col-md-6 label">Estado da Conta</div>
                                              <div class="col-lg-6 col-md-6"><?=$rowInsc['estado'];?></div>
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