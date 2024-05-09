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
        <a class="nav-link collapsed" href="ver-estudantes.php">
          <i class="bi bi-person"></i>
          <span>Utilizadores</span>
        </a>
      </li><!-- End Students Nav -->

      <li class="nav-item">
        <a class="nav-link" href="ver-inscricoes.php">
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
      <h1>Inscrições</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Página inicial</a></li>
          <li class="breadcrumb-item active">Inscrições</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row mb-5">

        <!-- Left side columns -->
        <div class="col-lg-12">
          <div class="row">
            <?php
              //Insricoes medio
              $sql_total_inscricoes1 = "SELECT * FROM inscricao_medio";
              $stmt_total_inscricoes1 = $pdo->prepare($sql_total_inscricoes1);
              $stmt_total_inscricoes1->execute();
              $total_inscricoes1 = $stmt_total_inscricoes1->rowCount();

              //Insricoes superior
              $sql_total_inscricoes2 = "SELECT * FROM inscricao_superior";
              $stmt_total_inscricoes2 = $pdo->prepare($sql_total_inscricoes2);
              $stmt_total_inscricoes2->execute();
              $total_inscricoes2 = $stmt_total_inscricoes2->rowCount();
              
              //inscricao medio pendente
              $sql_total_inscricoes12 = "SELECT COUNT(*) as total FROM inscricao_medio WHERE estado like 'Pendente'";
              $stmt_total_inscricoes12 = $pdo->prepare($sql_total_inscricoes12);
              $stmt_total_inscricoes12->execute();
              $total_inscricoes12 = $stmt_total_inscricoes12->fetch(PDO::FETCH_ASSOC)['total'];

              //inscricao superior pendente
              $sql_total_inscricoes22 = "SELECT COUNT(*) as total FROM inscricao_superior WHERE estado like 'Pendente'";
              $stmt_total_inscricoes22 = $pdo->prepare($sql_total_inscricoes22);
              $stmt_total_inscricoes22->execute();
              $total_inscricoes22 = $stmt_total_inscricoes22->fetch(PDO::FETCH_ASSOC)['total'];

              //inscricao medio aprovada
              $sql_total_inscricoes123 = "SELECT COUNT(*) as total FROM inscricao_medio WHERE estado like 'Aprovada'";
              $stmt_total_inscricoes123 = $pdo->prepare($sql_total_inscricoes123);
              $stmt_total_inscricoes123->execute();
              $total_inscricoes123 = $stmt_total_inscricoes123->fetch(PDO::FETCH_ASSOC)['total'];

              //inscricao superior aprovada
              $sql_total_inscricoes223 = "SELECT COUNT(*) as total FROM inscricao_superior WHERE estado like 'Aprovada'";
              $stmt_total_inscricoes223 = $pdo->prepare($sql_total_inscricoes223);
              $stmt_total_inscricoes223->execute();
              $total_inscricoes223 = $stmt_total_inscricoes223->fetch(PDO::FETCH_ASSOC)['total'];
            ?>
            <!-- Sales Card -->
            <div class="col-xxl-4 col-md-4">
              <div class="card info-card sales-card">

                <div class="card-body">
                  <h5 class="card-title">Inscrições<span> | Total</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-pencil-square"></i>
                    </div>
                    <div class="ps-3">
                      <h6><?=$total_inscricoes1 + $total_inscricoes2;?></h6>

                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Sales Card -->

            <!-- Sales Card -->
            <div class="col-xxl-4 col-md-4">
              <div class="card info-card sales-card">

                <div class="card-body">
                  <h5 class="card-title">Inscrições Aprovadas</h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle text-success d-flex align-items-center justify-content-center">
                      <i class="bi bi-pencil-square"></i>
                    </div>
                    <div class="ps-3">
                      <h6><?=$total_inscricoes123 + $total_inscricoes223;?></h6>

                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Sales Card -->

            <!-- Sales Card -->
            <div class="col-xxl-4 col-md-4">
              <div class="card info-card sales-card">

                <div class="card-body">
                  <h5 class="card-title">Inscrições Pendentes</h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle text-secondary d-flex align-items-center justify-content-center">
                      <i class="bi bi-pencil-square"></i>
                    </div>
                    <div class="ps-3">
                      <h6><?=$total_inscricoes12 +  $total_inscricoes22;?></h6>

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
              <h5 class="card-title">Lista de Inscrições do Ensino Médio</h5>

              <!-- Table with stripped rows -->
              <table class="table datatable">
                <thead>
                  <tr>
                    <th>
                      <b>#</b>
                    </th>
                    <th>Estado</th>
                    <th>Pagamento</th>
                    <th data-type="date" data-format="YYYY/DD/MM">Data</th>
                    <th>Instituição</th>
                    <th>Curso</th>
                    <th>Utilizador</th>
                    <th>Acções</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                    $sql_total_inscricoes1 = "SELECT * FROM inscricao_medio";
                    $stmt_total_inscricoes1 = $pdo->prepare($sql_total_inscricoes1);
                    $stmt_total_inscricoes1->execute();
                    while($rowInsc = $stmt_total_inscricoes1->fetch(PDO::FETCH_ASSOC)){
                  ?>
                    <tr>
                  <td><?=$rowInsc['id'];?></td>
                  <td><span class="badge bg-secondary"><?=$rowInsc['estado'];?></span></td>
                  <td><span class="badge bg-secondary"><?=$rowInsc['pagamento'];?></span></td>
                  <td><?=$rowInsc['inscricao_date'];?></td>
                  <td><?php
                    $id_inst = $rowInsc['id_inst'];
                    $stmt = $pdo->prepare("SELECT nome FROM instituicao WHERE id_instituicao = :id");
                    $stmt->bindParam(':id', $id_inst);
                    $stmt->execute();
                    $row = $stmt->fetch(PDO::FETCH_ASSOC);
                    echo $row['nome'];
                  ?></td>
                  <td><?php
                    $id_curso = $rowInsc['id_curso'];
                    $stmt = $pdo->prepare("SELECT nome FROM curso_medio WHERE id = :id");
                    $stmt->bindParam(':id', $id_curso);
                    $stmt->execute();
                    $row = $stmt->fetch(PDO::FETCH_ASSOC);
                    echo $row['nome'];
                  ?></td>
                  <td><?php
                    $id_insc = $rowInsc['id_est'];
                    $stmt = $pdo->prepare("SELECT nome FROM utilizador WHERE id_utilizador = :id");
                    $stmt->bindParam(':id', $id_insc);
                    $stmt->execute();
                    $row = $stmt->fetch(PDO::FETCH_ASSOC);
                    echo $row['nome'];
                  ?></td>
                  <td>
                    <button type="button" class="btn btn-primary mt-2 mb-2 w-100" data-bs-toggle="modal" data-bs-target="#ExtralargeModal<?=$rowInsc['id'];?>">
                      Detalhes
                   </button>
                      <!-- Start Extra Large Modal-->
                      <div class="modal fade" id="ExtralargeModal<?=$rowInsc['id'];?>" tabindex="-1">
                       <div class="modal-dialog modal-xl">
                         <div class="modal-content">
                           <div class="modal-header border-0" style="background: #00054ad4 !important; color: #fff;">
                             <div class="card-header border-0" style="background: transparent !important; color: #fff;">
                               <div class="d-flex align-items-center">
                                 <div class="card-icon rounded-circle d-flex align-items-center justify-content-center" style="border: 1px solid #00054ad4; width: 100px; height: 100px;">
                                   <img src="../assets/img/logo.png" alt="SUIEA" class="w-100 rounded-circle">
                                 </div>
                                 <div class="ps-3" style="color: #fff !important;">
                                   <h6 style="color: #fff !important;">Detalhes da Inscrição</h6>
                                   <span class="text-success small pt-2 ps-1">Data da Inscrição: </span>
                                   <span class="text-success small pt-1 fw-bold"><?=$rowInsc['inscricao_date'];?></span>
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
                                            $stmt_est->bindParam(':id', $id_est);
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

                                          <div class="profile-overview">

                                            <h5 class="card-title">Dados da Instituição</h5>
                                            <?php 

                                            $id_inst = $rowInsc['id_inst'];
                                            $stmt_inst = $pdo->prepare("SELECT * FROM instituicao WHERE id_instituicao = :id");
                                            $stmt_inst->bindParam(':id',  $id_inst);
                                            $stmt_inst->execute();
                                            $row_inst = $stmt_inst->fetch(PDO::FETCH_ASSOC);

                                            ?>
                                            <div class="row mb-3 px-2">
                                              <div class="col-lg-6 col-md-6 label ">Nome da Instituição</div>
                                              <div class="col-lg-6 col-md-6"><?=$row_inst['nome'];?></div>
                                            </div>

                                            <div class="row mb-3 px-2">
                                              <div class="col-lg-6 col-md-6 label">Área de Ensino</div>
                                              <div class="col-lg-6 col-md-6"><?=$row_inst['area'];?></div>
                                            </div>

                                            <div class="row mb-3 px-2">
                                              <div class="col-lg-6 col-md-6 label">Tipo Instituição</div>
                                              <div class="col-lg-6 col-md-6"><?=$row_inst['tipo'];?></div>
                                            </div>

                                            <div class="row mb-3 px-2">
                                              <div class="col-lg-6 col-md-6 label">Localização</div>
                                              <div class="col-lg-6 col-md-6"><?=$row_inst['localizacao'];?></div>
                                            </div>

                                            <div class="row mb-3 px-2">
                                              <div class="col-lg-6 col-md-6 label">Telefone</div>
                                              <div class="col-lg-6 col-md-6"><?=$row_inst['telefone'];?></div>
                                            </div>

                                            <div class="row mb-3 px-2">
                                              <div class="col-lg-6 col-md-6 label">Email</div>
                                              <div class="col-lg-6 col-md-6"><?=$row_inst['email'];?></div>
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

                                          </div>
                                          <div class="profile-overview">

                                            <h5 class="card-title">Dados da Inscrição</h5>
                          
                                            <div class="row mb-2 px-2">
                                              <div class="col-lg-6 col-md-6 label ">Curso</div>
                                              <div class="col-lg-6 col-md-6"><?php
                                                $id = $rowInsc['id_curso'];
                                                  $stmt = $pdo->prepare("SELECT nome FROM curso_medio WHERE id = :id");
                                                  $stmt->bindParam(':id', $id);
                                                  $stmt->execute();
                                                  $row = $stmt->fetch(PDO::FETCH_ASSOC);
                                                  echo $row['nome'];
                                                ?></div>
                                            </div>
                          
                                            <div class="row mb-2 px-2">
                                              <div class="col-lg-6 col-md-6 label ">Inscrição ID</div>
                                              <div class="col-lg-6 col-md-6"><?=$rowInsc['id'];?></div>
                                            </div>

                                            <div class="row mb-2 px-2">
                                              <div class="col-lg-6 col-md-6 label">Pagamento</div>
                                              <div class="col-lg-6 col-md-6"><span class="p-1" style="border-radius: 4px; color: #00054ad4 !important;"><?=$rowInsc['pagamento'];?></span></div>
                                            </div>

                                            <div class="row mb-2 px-2">
                                              <div class="col-lg-6 col-md-6 label">Estado</div>
                                              <div class="col-lg-6 col-md-6"><span class="p-1" style="border-radius: 4px; color: #00054ad4 !important;"><?=$rowInsc['estado'];?></span></div>
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
                                              <button type="button" onclick="window.location.href='<?=$rowInsc['cert_estudante'];?>'" class="btn btn-primary rounded-circle d-flex align-items-center justify-content-center">
                                                <i class="bi bi-file-text" style="font-size: 32px;"></i>
                                              </button>
                                            </div>
                                            <div class="ps-2">
                                              <span class="text-muted small p-0 pt-2">Certificado Escolar</span>
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

    <section class="section pt-5">
      <div class="row">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Lista de Inscrições do Ensino Superior</h5>

              <!-- Table with stripped rows -->
              <table class="table datatable">
                <thead>
                  <tr>
                    <th>
                      <b>#</b>
                    </th>
                    <th>Estado</th>
                    <th>Pagamento</th>
                    <th data-type="date" data-format="YYYY/DD/MM">Data</th>
                    <th>Instituição</th>
                    <th>Curso</th>
                    <th>Utilizador</th>
                    <th>Acções</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                    while($rowInscSup =  $stmt_total_inscricoes2->fetch(PDO::FETCH_ASSOC)){
                  ?>
                    <tr>
                  <td><?=$rowInscSup['id'];?></td>
                  <td><span class="badge bg-secondary"><?=$rowInscSup['estado'];?></span></td>
                  <td><span class="badge bg-secondary"><?=$rowInscSup['pagamento'];?></span></td>
                  <td><?=$rowInscSup['inscricao_date'];?></td>
                  <td><?php
                    $id_inst = $rowInscSup['id_inst'];
                    $stmt = $pdo->prepare("SELECT nome FROM instituicao WHERE id_instituicao = :id");
                    $stmt->bindParam(':id', $id_inst);
                    $stmt->execute();
                    $row = $stmt->fetch(PDO::FETCH_ASSOC);
                    echo $row['nome'];
                  ?></td>
                  <td><?php
                    $id_curso = $rowInscSup['id_curso'];
                    $stmt = $pdo->prepare("SELECT nome FROM curso_superior WHERE id = :id");
                    $stmt->bindParam(':id', $id_curso);
                    $stmt->execute();
                    $row = $stmt->fetch(PDO::FETCH_ASSOC);
                    echo $row['nome'];
                  ?></td>
                  <td><?php
                    $id_est = $rowInscSup['id_est'];
                    $stmt = $pdo->prepare("SELECT nome FROM utilizador WHERE id_utilizador = :id");
                    $stmt->bindParam(':id', $id_est);
                    $stmt->execute();
                    $row = $stmt->fetch(PDO::FETCH_ASSOC);
                    echo $row['nome'];
                  ?></td>
                  <td>
                    <button type="button" class="btn btn-primary mt-2 mb-2 w-100" data-bs-toggle="modal" data-bs-target="#ExtralargeModal<?=$rowInscSup['id'];?>">
                      Detalhes
                   </button>
                      <!-- Start Extra Large Modal-->
                      <div class="modal fade" id="ExtralargeModal<?=$rowInscSup['id'];?>" tabindex="-1">
                       <div class="modal-dialog modal-xl">
                         <div class="modal-content">
                           <div class="modal-header border-0" style="background: #00054ad4 !important; color: #fff;">
                             <div class="card-header border-0" style="background: transparent !important; color: #fff;">
                               <div class="d-flex align-items-center">
                                 <div class="card-icon rounded-circle d-flex align-items-center justify-content-center" style="border: 1px solid #00054ad4; width: 100px; height: 100px;">
                                   <img src="../assets/img/logo.png" alt="SUIEA" class="w-100 rounded-circle">
                                 </div>
                                 <div class="ps-3" style="color: #fff !important;">
                                   <h6 style="color: #fff !important;">Detalhes da Inscrição</h6>
                                   <span class="text-success small pt-2 ps-1">Data da Inscrição: </span>
                                   <span class="text-success small pt-1 fw-bold"><?=$rowInscSup['inscricao_date'];?></span>
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

                                            $id_est = $rowInscSup['id_est'];
                                            $stmt_est = $pdo->prepare("SELECT * FROM utilizador WHERE id_utilizador = :id");
                                            $stmt_est->bindParam(':id', $id_est);
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

                                          <div class="profile-overview">

                                            <h5 class="card-title">Dados da Instituição</h5>
                                            <?php 

                                            $id_inst = $rowInscSup['id_inst'];
                                            $stmt_inst = $pdo->prepare("SELECT * FROM instituicao WHERE id_instituicao = :id");
                                            $stmt_inst->bindParam(':id', $id_inst);
                                            $stmt_inst->execute();
                                            $row_inst = $stmt_inst->fetch(PDO::FETCH_ASSOC);

                                            ?>
                                            <div class="row mb-3 px-2">
                                              <div class="col-lg-6 col-md-6 label ">Nome da Instituição</div>
                                              <div class="col-lg-6 col-md-6"><?=$row_inst['nome'];?></div>
                                            </div>

                                            <div class="row mb-3 px-2">
                                              <div class="col-lg-6 col-md-6 label">Área de Ensino</div>
                                              <div class="col-lg-6 col-md-6"><?=$row_inst['area'];?></div>
                                            </div>

                                            <div class="row mb-3 px-2">
                                              <div class="col-lg-6 col-md-6 label">Tipo Instituição</div>
                                              <div class="col-lg-6 col-md-6"><?=$row_inst['tipo'];?></div>
                                            </div>

                                            <div class="row mb-3 px-2">
                                              <div class="col-lg-6 col-md-6 label">Localização</div>
                                              <div class="col-lg-6 col-md-6"><?=$row_inst['localizacao'];?></div>
                                            </div>

                                            <div class="row mb-3 px-2">
                                              <div class="col-lg-6 col-md-6 label">Telefone</div>
                                              <div class="col-lg-6 col-md-6"><?=$row_inst['telefone'];?></div>
                                            </div>

                                            <div class="row mb-3 px-2">
                                              <div class="col-lg-6 col-md-6 label">Email</div>
                                              <div class="col-lg-6 col-md-6"><?=$row_inst['email'];?></div>
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

                                          </div>
                                          <div class="profile-overview">

                                            <h5 class="card-title">Dados da Inscrição</h5>
                          
                                            <div class="row mb-2 px-2">
                                              <div class="col-lg-6 col-md-6 label ">Curso</div>
                                              <div class="col-lg-6 col-md-6"><?php
                                                $id_curso = $rowInscSup['id_curso'];
                                                  $stmt = $pdo->prepare("SELECT nome FROM curso_superior WHERE id = :id");
                                                  $stmt->bindParam(':id', $id_curso);
                                                  $stmt->execute();
                                                  $row = $stmt->fetch(PDO::FETCH_ASSOC);
                                                  echo $row['nome'];
                                                ?></div>
                                            </div>
                          
                                            <div class="row mb-2 px-2">
                                              <div class="col-lg-6 col-md-6 label ">Inscrição ID</div>
                                              <div class="col-lg-6 col-md-6"><?=$rowInscSup['id'];?></div>
                                            </div>

                                            <div class="row mb-2 px-2">
                                              <div class="col-lg-6 col-md-6 label">Pagamento</div>
                                              <div class="col-lg-6 col-md-6"><span class="p-1" style="border-radius: 4px; color: #00054ad4 !important;"><?=$rowInscSup['pagamento'];?></span></div>
                                            </div>

                                            <div class="row mb-2 px-2">
                                              <div class="col-lg-6 col-md-6 label">Estado</div>
                                              <div class="col-lg-6 col-md-6"><span class="p-1" style="border-radius: 4px; color: #00054ad4 !important;"><?=$rowInscSup['estado'];?></span></div>
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
                                              <button type="button" onclick="window.location.href='<?=$rowInscSup['cert_estudante'];?>'" class="btn btn-primary rounded-circle d-flex align-items-center justify-content-center">
                                                <i class="bi bi-file-text" style="font-size: 32px;"></i>
                                              </button>
                                            </div>
                                            <div class="ps-2">
                                              <span class="text-muted small p-0 pt-2">Certificado Escolar</span>
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