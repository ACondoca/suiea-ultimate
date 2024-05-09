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
        <a class="nav-link" href="ver-matriculas.php">
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
                      <h2>Matrículas</h2>
                      <ul class="bread-list">
                        <li><a href="index.php">Página inicial</a></li>
                        <li><i class="icofont-simple-right"></i></li>
                        <li class="active">Matrículas</li>
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

    <section class="section dashboard" style="min_height: 75vh;">
      <div class="row">

          <!-- Left side columns -->
          <div class="col-lg-12">
            <div class="row mb-5">

              <!-- Sales Card -->
              <div class="col-xxl-6 col-md-6">
                <div class="card info-card sales-card">

                  <div class="card-body">
                    <h5 class="card-title"></h5>

                    <div class="d-flex align-items-center">
                      <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                        <i class="bi bi-check-square"></i>
                      </div>
                      <div class="ps-3">
                        <h6><?php 
                        $sql_area = "SELECT area FROM instituicao WHERE id_instituicao = $id";
                        $stmt_area = $pdo->query($sql_area);
                        $area = $stmt_area->fetch(PDO::FETCH_ASSOC)['area'];
                
                        // Determina o nome da tabela de inscrições com base na área da instituição
                        $table_name = ($area == 'Ensino Médio') ? 'matricula_medio' : 'matricula_superior';
                
                        // Consulta para obter o total de inscrições
                        $sql_total_inscricoes = "SELECT COUNT(*) as total FROM $table_name WHERE estado like 'Feita' AND id_inst = $id";
                        $stmt_total_inscricoes = $pdo->prepare($sql_total_inscricoes);
                        $stmt_total_inscricoes->execute();
                        $total_inscricoes = $stmt_total_inscricoes->fetch(PDO::FETCH_ASSOC)['total'];
                        echo $total_inscricoes;
                        
                        ?></h6>
                        <span class="text-success small pt-1 fw-bold">Matrículas Feitas</span>

                      </div>
                    </div>
                  </div>

                </div>
              </div><!-- End Sales Card -->

              <!-- Sales Card -->
              <div class="col-xxl-6 col-md-6">
                <div class="card info-card sales-card">

                  <div class="card-body">
                    <h5 class="card-title"></h5>

                    <div class="d-flex align-items-center">
                      <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                        <i class="bi bi-clock"></i>
                      </div>
                      <div class="ps-3">
                        <h6><?php 
                        $sql_area = "SELECT area FROM instituicao WHERE id_instituicao = $id";
                        $stmt_area = $pdo->query($sql_area);
                        $area = $stmt_area->fetch(PDO::FETCH_ASSOC)['area'];
                
                        // Determina o nome da tabela de inscrições com base na área da instituição
                        $table_name = ($area == 'Ensino Médio') ? 'matricula_medio' : 'matricula_superior';
                
                        // Consulta para obter o total de inscrições
                        $sql_total_inscricoes = "SELECT COUNT(*) as total FROM $table_name WHERE estado like 'Pendente' AND id_inst = $id";
                        $stmt_total_inscricoes = $pdo->prepare($sql_total_inscricoes);
                        $stmt_total_inscricoes->execute();
                        $total_inscricoes = $stmt_total_inscricoes->fetch(PDO::FETCH_ASSOC)['total'];
                        echo $total_inscricoes;
                        
                        ?></h6>
                        <span class="text-success small pt-1 fw-bold">Matrículas Pendentes</span>

                      </div>
                    </div>
                  </div>

                </div>
              </div><!-- End Sales Card -->

              <div class="card">
                <div class="card-body">
                  <h5 class="card-title">Lista de Matrículas feitas</h5>

                    <!-- Table with stripped rows -->
                    <table class="table datatable">
                      <thead>
                        <tr>
                          <th>
                            <b>#</b>
                          </th>
                          <th>Estado</th>
                          <th data-type="date" data-format="YYYY/DD/MM">Data da Matrícula</th>
                          <th>Curso</th>
                          <th>Utilizador</th>
                          <th>Acções</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php 
                            $sql_area = "SELECT area FROM instituicao WHERE id_instituicao = $id";
                            $stmt_area = $pdo->query($sql_area);
                            $area = $stmt_area->fetch(PDO::FETCH_ASSOC)['area'];
                    
                            // Determina o nome da tabela de inscrições com base na área da instituição
                            $table_name = ($area == 'Ensino Médio') ? 'matricula_medio' : 'matricula_superior';
                    
                            // Consulta para obter o total de inscrições
                            $sql_total_inscricoes = "SELECT $table_name.id_curso, $table_name.id, $table_name.matricula_date, $table_name.id_inst, $table_name.id_est, $table_name.estado, $table_name.pagamento, $table_name.certificado, $table_name.atestado_medico, $table_name.cartao_vacina FROM $table_name INNER JOIN instituicao ON $table_name.id_inst = instituicao.id_instituicao WHERE instituicao.id_instituicao = $id";
                            $stmt_total_inscricoes = $pdo->query($sql_total_inscricoes);
                            while($rowInsc = $stmt_total_inscricoes->fetch(PDO::FETCH_ASSOC)){
                              ?>
                          <tr>
                        <td><?=$rowInsc['id'];?></td>
                        <td><?=$rowInsc['estado'];?></td>
                        <td><?=$rowInsc['matricula_date'];?></td>
                        <td><?php
                        $id = $rowInsc['id_curso'];
                        if($table_name == 'matricula_medio'){
                          $stmt = $pdo->prepare("SELECT nome FROM curso_medio WHERE id = :id");
                          $stmt->bindParam(':id', $id);
                          $stmt->execute();
                          $row = $stmt->fetch(PDO::FETCH_ASSOC);
                          echo $row['nome'];
                        }else{
                          $stmt = $pdo->prepare("SELECT nome FROM curso_superior WHERE id = :id");
                          $stmt->bindParam(':id', $id);
                          $stmt->execute();
                          $row = $stmt->fetch(PDO::FETCH_ASSOC);
                          echo $row['nome'];
                        }
                        ?></td>
                        <td><?php
                          $id = $rowInsc['id_est'];
                          $stmt = $pdo->prepare("SELECT nome FROM utilizador WHERE id_utilizador = :id");
                          $stmt->bindParam(':id', $id);
                          $stmt->execute();
                          $row = $stmt->fetch(PDO::FETCH_ASSOC);
                          echo $row['nome'];
                        ?></td>
                        <td>
                          <button type="button" class="btn btn-primary mt-2 mb-2 w-100" data-bs-toggle="modal" data-bs-target="#ExtralargeModal<?=$rowInsc['id'];?>">
                            Detalhes
                        </button>
                            </td>
                            <!-- Start Extra Large Modal-->
                            <div class="modal fade" id="ExtralargeModal<?=$rowInsc['id'];?>" tabindex="-1">
                            <div class="modal-dialog modal-xl">
                              <div class="modal-content">
                                <div class="modal-header border-0" style="background: #00054ad4 !important; color: #fff;">
                                  <div class="card-header border-0" style="background: transparent !important; color: #fff;">
                                    <div class="d-flex align-items-center">
                                      <div class="card-icon rounded-circle d-flex align-items-center justify-content-center" style="border: 1px solid #00054ad4;">
                                        <img src="../assets/img/logo.png" alt="SUIEA" class="w-100 rounded-circle">
                                      </div>
                                      <div class="ps-3" style="color: #fff !important;">
                                        <h6 style="color: #fff !important;">Detalhes da Matrícula</h6>
                                        <span class="text-success small pt-2 ps-1">Data da Matrícula: </span>
                                        <span class="text-success small pt-1 fw-bold"><?=$rowInsc['matricula_date'];?></span>
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

                                          <!-- Sales Card -->
                                          <div class="col-xxl-8 col-md-8">
                                            <div class="card info-card sales-card">

                                              <div class="card-body">

                                                <div class="profile-overview">

                                                  <h5 class="card-title">Dados do Utilizador</h5>
                                                  <?php 

                                                  $id_est = $rowInsc['id_est'];
                                                  $stmt_est = $pdo->prepare("SELECT * FROM utilizador WHERE id_utilizador = :id");
                                                  $stmt_est->bindParam(':id', $id);
                                                  $stmt_est->execute();
                                                  $row_est = $stmt_est->fetch(PDO::FETCH_ASSOC);

                                                  ?>
                                                  <div class="row mb-3 px-2">
                                                    <div class="col-lg-6 col-md-6 label ">Nome Completo</div>
                                                    <div class="col-lg-6 col-md-6"><?=$row_est['nome'];?></div>
                                                  </div>
                                
                                                  <div class="row mb-3 px-2">
                                                    <div class="col-lg-6 col-md-6 label">Gênero</div>
                                                    <div class="col-lg-6 col-md-6"><?=$row_est['genero'];?></div>
                                                  </div>
                                
                                                  <div class="row mb-3 px-2">
                                                    <div class="col-lg-6 col-md-6 label">Nascimento</div>
                                                    <div class="col-lg-6 col-md-6"><?=$row_est['nascimento'];?></div>
                                                  </div>
                                
                                                  <div class="row mb-3 px-2">
                                                    <div class="col-lg-6 col-md-6 label">Morada</div>
                                                    <div class="col-lg-6 col-md-6"><?=$row_est['morada'];?></div>
                                                  </div>
                                
                                                  <div class="row mb-3 px-2">
                                                    <div class="col-lg-6 col-md-6 label">Telefone</div>
                                                    <div class="col-lg-6 col-md-6"><?=$row_est['telefone'];?></div>
                                                  </div>
                                
                                                  <div class="row mb-3 px-2">
                                                    <div class="col-lg-6 col-md-6 label">Email</div>
                                                    <div class="col-lg-6 col-md-6"><?=$row_est['email'];?></div>
                                                  </div>

                                                </div>

                                              </div>

                                              <div class="card-footer">

                                                <div class="profile-overview">

                                                  <h5 class="card-title">Documentos submetidos</h5>
                                
                                                  <div class="row mb-2 px-2">
                                                    <div class="col-lg-6 col-md-6 label">Certificado Escolar</div>
                                                    <div class="col-lg-6 col-md-6">( <span>Sucesso</span> )</div>
                                                  </div>
                                
                                                  <div class="row mb-2 px-2">
                                                    <div class="col-lg-6 col-md-6 label">Atestado Médico</div>
                                                    <div class="col-lg-6 col-md-6">( <span>Sucesso</span> )</div>
                                                  </div>
                                                  
                                                  <div class="row mb-2 px-2">
                                                    <div class="col-lg-6 col-md-6 label">Cartão de Vacina</div>
                                                    <div class="col-lg-6 col-md-6">( <span>Sucesso</span> )</div>
                                                  </div>

                                                </div>
                                                <div class="profile-overview">

                                                  <h5 class="card-title">Dados da Matricula</h5>
                                
                                                  <div class="row mb-2 px-2">
                                                    <div class="col-lg-6 col-md-6 label ">Curso</div>
                                                    <div class="col-lg-6 col-md-6"><?php
                                                      $id = $rowInsc['id_curso'];
                                                      if($table_name == 'matricula_medio'){
                                                        $stmt = $pdo->prepare("SELECT nome FROM curso_medio WHERE id = :id");
                                                        $stmt->bindParam(':id', $id);
                                                        $stmt->execute();
                                                        $row = $stmt->fetch(PDO::FETCH_ASSOC);
                                                        echo $row['nome'];
                                                      }else{
                                                        $stmt = $pdo->prepare("SELECT nome FROM curso_superior WHERE id = :id");
                                                        $stmt->bindParam(':id', $id);
                                                        $stmt->execute();
                                                        $row = $stmt->fetch(PDO::FETCH_ASSOC);
                                                        echo $row['nome'];
                                                      }
                                                      ?></div>
                                                  </div>
                                
                                                  <div class="row mb-2 px-2">
                                                    <div class="col-lg-6 col-md-6 label ">Matrícula ID</div>
                                                    <div class="col-lg-6 col-md-6"><?=$rowInsc['id'];?></div>
                                                  </div>

                                                  <div class="row mb-2 px-2">
                                                    <div class="col-lg-6 col-md-6 label">Pagamento</div>
                                                    <div class="col-lg-6 col-md-6"><span class="text-white p-1" style="color: #00054ad4 !important;"><?=$rowInsc['pagamento'];?></span></div>
                                                  </div>

                                                  <div class="row mb-2 px-2">
                                                    <div class="col-lg-6 col-md-6 label">Estado</div>
                                                    <div class="col-lg-6 col-md-6"><span class="text-white p-1" style="color: #00054ad4 !important;"><?=$rowInsc['estado'];?></span></div>
                                                  </div>

                                                </div>
                                              </div>
                                            </div>
                                          </div><!-- End Sales Card -->
                                          
                                          <div class="col-xxl-4 col-md-4">

                                            <div class="card info-card sales-card">
                                              <div class="card-header">
                                                <h5 class="card-title text-center">Ver Documentos Anexados</h5>
                                              </div>
                                              <div class="card-body text-center">
                                                <div class="d-flex align-items-center justify-content-center w-100 mt-3">
                                                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                                    <button type="button" onclick="window.location.href='<?=$rowInsc['certificado'];?>'" class="btn btn-primary rounded-circle d-flex align-items-center justify-content-center">
                                                      <i class="bi bi-file-text" style="font-size: 32px;"></i>
                                                    </button>
                                                  </div>
                                                  <div class="ps-2">
                                                    <span class="text-muted small p-0 pt-2">Certificado Escolar</span>
                                                  </div>
                                                </div>
                                                <div class="d-flex align-items-center justify-content-center w-100 mt-3">
                                                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                                    <button type="button" onclick="window.location.href='<?=$rowInsc['atestado_medico'];?>'" class="btn btn-primary rounded-circle d-flex align-items-center justify-content-center">
                                                      <i class="bi bi-file-text" style="font-size: 32px;"></i>
                                                    </button>
                                                  </div>
                                                  <div class="ps-2">
                                                    <span class="text-muted small p-0 pt-2">Atestado Médico</span>
                                                  </div>
                                                </div>
                                                <div class="d-flex align-items-center justify-content-center w-100 mt-3">
                                                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                                    <button type="button" onclick="window.location.href='<?=$rowInsc['cartao_vacina'];?>'" class="btn btn-primary rounded-circle d-flex align-items-center justify-content-center">
                                                      <i class="bi bi-file-text" style="font-size: 32px;"></i>
                                                    </button>
                                                  </div>
                                                  <div class="ps-2">
                                                    <span class="text-muted small p-0 pt-2">Cartão de Vacina</span>
                                                  </div>
                                                </div>
                                              </div>
                                            </div>

                                          </div>

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