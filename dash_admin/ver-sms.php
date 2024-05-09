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

  <?php include "../component/header_admin.php"; ?>

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
      <h1>Mensagens</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Página inicial</a></li>
          <li class="breadcrumb-item active">Mensagens</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row mb-5">

        <!-- Left side columns -->
        <div class="col-lg-12">
          <div class="row">

            <!-- Sales Card -->
            <div class="col-lg-4 col-md-4">
              <div class="card info-card sales-card">

                <div class="card-body">
                  <h5 class="card-title">Mensagens Recebidas</h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-chat-left-text"></i>
                    </div>
                    <div class="ps-3">
                      <h6><?php 
                        $sql1 = "SELECT * FROM mensagem";
                        $stmt1 = $pdo -> query($sql1);
                        $row1 = $stmt1 -> rowCount();
                        echo $row1;
                      ?></h6>
                      <span class="text-success small pt-1 fw-bold">Total</span>
                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Sales Card -->

            <!-- Sales Card -->
            <div class="col-lg-4 col-md-4">
              <div class="card info-card sales-card">

                <div class="card-body">
                  <h5 class="card-title">Mensagens Publicadas</h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle text-success d-flex align-items-center justify-content-center">
                      <i class="bi bi-chat-left-text"></i>
                    </div>
                    <div class="ps-3">
                      <h6><?php 
                        $sql2 = "SELECT * FROM mensagem WHERE estado = 'Publicada'";
                        $stmt2 = $pdo -> query($sql2);
                        $row2 = $stmt2 -> rowCount();
                        echo $row2;
                      ?></h6>
                      <span class="text-success small pt-1 fw-bold">Total</span>
                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Sales Card -->

            <!-- Sales Card -->
            <div class="col-lg-4 col-md-4">
              <div class="card info-card sales-card">

                <div class="card-body">
                  <h5 class="card-title">Mensagens Bloqueadas</h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle text-secondary d-flex align-items-center justify-content-center">
                      <i class="bi bi-chat-left-text"></i>
                    </div>
                    <div class="ps-3">
                      <h6><?php 
                        $sql3 = "SELECT * FROM mensagem WHERE estado = 'Bloqueada'";
                        $stmt3 = $pdo -> query($sql3);
                        $row3 = $stmt3 -> rowCount();
                        echo $row3;
                      ?></h6>
                      <span class="text-success small pt-1 fw-bold">Total</span>
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
              <h5 class="card-title">Mensagens recebidas</h5>

              <!-- Table with stripped rows -->
              <table class="table datatable">
                <thead>
                  <tr>
                    <th>
                      <b>#</b>
                    </th>
                    <th>Instituição de Origem</th>
                    <th data-type="date" data-format="YYYY/DD/MM">Data de Envio</th>
                    <th>Estado</th>
                    <th>Acções</th>
                  </tr>
                </thead>
                <tbody>
                <?php 
                  $sqlUltra = "SELECT * FROM mensagem";
                  $stmtUltra = $pdo -> query($sqlUltra);
                  while($rowUltra = $stmtUltra -> fetch(PDO::FETCH_ASSOC)){
                ?>
                <tr>
                  <td><?=$rowUltra['id'];?></td> 
                  <td><?php
                  $inst = $rowUltra['id_inst'];
                  $sqlxz = "SELECT * FROM instituicao WHERE id_instituicao = $inst";
                  $stmtxz = $pdo -> query($sqlxz);
                  $rowxz = $stmtxz -> fetch(PDO::FETCH_ASSOC);
                  echo $rowxz['nome'];
                  ?></td>
                  <td><?=$rowUltra['mensagem_date'];?></td>
                  <td><span class="badge bg-secondary"><?=$rowUltra['estado'];?></span></td>
                  <td>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ExtralargeModal<?=$rowUltra['id'];?>">
                      Detalhes
                    </button>
                  </td>
                  <!-- Extra Large Modal -->
                  <div class="modal fade" id="ExtralargeModal<?=$rowUltra['id'];?>" tabindex="-1">
                    <div class="modal-dialog modal-xl">
                      <div class="modal-content">
                        <div class="modal-header border-0">
                          <h5 class="modal-title">Detalhes da Mensagem</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="../../controller/auth/authController.php" method="POST" enctype="multipart/form-data">
                          <div class="modal-body">
                            
                            <section class="section dashboard">
                              <div class="row mb-5">
                        
                                <!-- Left side columns -->
                                <div class="col-lg-12">
                                  <div class="row">
                        
                                    <!-- Sales Card -->
                                    <div class="col-lg-12">
                                      <div class="info-card sales-card border">
                        
                                        <div class="card-body">
                                          <h5 class="card-title"><span>Data de Envio</span> | <span><?=$rowUltra['mensagem_date'];?></span></h5>
                        
                                          <div class="d-flex align-items-center">
                                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                              <img src="../../storage/instituições/<?=$rowxz['id_instituicao'];?>/imagem/<?=$rowxz['imagem'];?>" class="w-100" style="border-radius: 50%;">
                                            </div>
                                            <div class="ps-3 text-center">
                                              <h6 class="pb-2"><?=$rowxz['nome'];?></h6>
                                              <span class="text-muted pt-5 ps-1">
                                                <?=$rowUltra['conteudo'];?>
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
                                <div class="form-check p-0">
                                  <select name="tipo" class="form-control">
                                    <option value="Bloqueada">Bloquear</option>
                                    <option value="Publicada">Publicar</option>
                                  </select>
                                  <input type="hidden" name="instituicao" value="<?=$rowxz['id_instituicao'];?>">
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