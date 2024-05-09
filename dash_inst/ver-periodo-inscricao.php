<?php
  include_once "../../model/session.php";
  include_once "../../model/conexao.php";
  
  if(isset($_SESSION['id'])){
    
    $id = $_SESSION['id'];
    $imagem = $_SESSION['imagem'];

    $avatar = "../../storage/instituições/$id/imagem/$imagem";
  }else{
    header('location: ../auth/login.php');
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
        <a class="nav-link collapsed" href="ver-estatisticas.php">
          <i class="bi bi-bar-chart"></i>
          <span>Estatísticas</span>
        </a>
      </li><!-- End Notification Nav -->

      <li class="nav-item">
        <a class="nav-link" href="ver-periodo-inscricao.php">
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
                      <h2>Cursos & Períodos</h2>
                      <ul class="bread-list">
                        <li><a href="index.php">Página inicial</a></li>
                        <li><i class="icofont-simple-right"></i></li>
                        <li class="active">Cursos & Períodos</li>
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
            <div class="col-xxl-4 col-md-4">
              <div class="card info-card sales-card">

                <div class="card-body">
                  <h5 class="card-title"></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-clock"></i>
                    </div>
                    <div class="ps-3">
                      <h6><span id=""><?php
                          $id = $_SESSION['id'];
                          $sql = "SELECT * FROM periodo_inscricao INNER JOIN instituicao ON periodo_inscricao.id_inst = instituicao.id_instituicao WHERE periodo_inscricao.estado like 'Activo' AND instituicao.id_instituicao = $id";
                          $stmt = $pdo->prepare($sql);
                          $stmt->execute();
                          if($stmt->rowCount() != 0){
                             while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                echo $row['ano'];
                            }
                          }else{
                            ?>Sem período<?php
                          }
                        ?></span></h6>
                      <span class="text-success small pt-1 fw-bold">Actual Período de Inscrição</span>
                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Sales Card -->

            <!-- Sales Card -->
            <div class="col-xxl-4 col-md-4">
              <div class="card info-card sales-card">

                <div class="card-body">
                  <h5 class="card-title"></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-pencil-square"></i>
                    </div>
                    <div class="ps-3">
                      <h6><?php
                      if($_SESSION['area'] == "Ensino Médio"){
                        $id = $_SESSION['id'];
                        $sql = "SELECT * FROM inscricao_medio INNER JOIN inst_medio ON inscricao_medio.id_inst = inst_medio.id INNER JOIN instituicao ON inst_medio.id = instituicao.id_instituicao WHERE instituicao.id_instituicao = $id";
                        $stmt = $pdo->prepare($sql);
                        $stmt->execute();
                        echo $stmt->rowCount();
                      }else{
                        $id = $_SESSION['id'];
                        $sql = "SELECT * FROM inscricao_superior INNER JOIN inst_superior ON inscricao_superior.id = inst_superior.id INNER JOIN instituicao ON inst_superior.id = instituicao.id_instituicao WHERE instituicao.id_instituicao = $id";
                        $stmt = $pdo->prepare($sql);
                        $stmt->execute();
                        echo $stmt->rowCount();
                      }
                      ?></h6>
                      <span class="text-success small pt-1 fw-bold">Inscrições Feitas</span>

                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Sales Card -->

            <!-- Sales Card -->
            <div class="col-xxl-4 col-md-4">
              <div class="card info-card sales-card">

                <div class="card-body">
                  <h5 class="card-title"></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-card-list"></i>
                    </div>
                    <div class="ps-3">
                      <h6><?php
                        if($_SESSION['area'] == "Ensino Médio"){
                          $id = $_SESSION['id'];
                          $sql = "SELECT * FROM matricula_medio INNER JOIN inst_medio ON matricula_medio.id_inst = inst_medio.id INNER JOIN instituicao ON inst_medio.id = instituicao.id_instituicao WHERE instituicao.id_instituicao = $id";
                          $stmt = $pdo->prepare($sql);
                          $stmt->execute();
                          echo $stmt->rowCount();
                        }else{
                          $id = $_SESSION['id'];
                          $sql = "SELECT * FROM matricula_superior INNER JOIN inst_superior ON matricula_superior.id_inst = inst_superior.id INNER JOIN instituicao ON inst_superior.id = instituicao.id_instituicao WHERE instituicao.id_instituicao = $id";
                          $stmt = $pdo->prepare($sql);
                          $stmt->execute();
                          echo $stmt->rowCount();
                        }
                        ?></h6>
                      <span class="text-success small pt-1 fw-bold">Matrículas Feitas</span>
                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Sales Card -->
          
          </div>
        </div>

        <div class="col-lg-12">
          <div class="row">

          <?php
          if($_SESSION['area'] == "Ensino Médio"){
            ?>

          <!-- Sales Card -->
          <div class="col-xxl-6 col-lg-12 col-md-12">
            <div class="card info-card sales-card">
              <div class="card-header">
                <h5 class="card-title font-weight-bolder" style="color: #00054ad4; margin-left: 25px;">Adicionar Curso</h5>
              </div>
              
              <div class="card-body">
                <div class="form m-3">
                  <form action="../../controller/auth/authController.php" method="POST" enctype="multipart/form-data">
                    <div class="input-group input-group-outline mb-5">
                      <label for="nome" class="form-label w-100">Nome do Curso</label>
                      <input type="text" class="form-control w-100" name="nome" required>
                      <input type="hidden" class="form-control w-100" name="id" value="<?php echo $_SESSION['id']; ?>">
                      <input type="hidden" class="form-control w-100" name="tipo" value="addCursoMedio">
                    </div>

                    <div class="input-group input-group-outline mb-5">
                      <label for="vagas" class="form-label w-100">Número de Vagas</label>
                      <input type="text" class="form-control w-100" name="vagas" required>
                    </div>

                    <div class="input-group input-group-outline mb-5">
                      <label for="inscric_val" class="form-label w-100">Taxa de Inscrição</label>
                      <input type="text" class="form-control w-100" name="inscricao_val" required>
                    </div>

                    <div class="input-group input-group-outline mb-5">
                      <label for="matric_val" class="form-label w-100">Taxa de Matrícula</label>
                      <input type="text" class="form-control w-100" name="matricula_val" required>
                    </div>

                    <div class="input-group input-group-outline mb-5">
                      <label for="desc" class="form-label w-100">Descrição</label>
                      <textarea name="desc" id="desc" class="form-control" rows="10" placeholder="Forneça uma breve descrição sobre o curso"></textarea>
                    </div>

                    <div class="input-group input-group-outline mb-5">
                      <label for="imagem" class="form-label w-100">Imagem descritiva do curso</label>
                      <input type="file" class="form-control w-100" name="imagem" required>
                    </div>

                    <div class="text-center">
                      <button type="submit" class="btn btn-primary w-100 pt-2 pb-2">Adicionar Curso</button>
                    </div>
                  </form>
                </div>
              </div>

            </div>
          </div>

          <?php
          }else{
          ?>

            <!-- Sales Card -->
            <div class="col-xxl-6 col-lg-12 col-md-12">
              <div class="card info-card sales-card">
                <div class="card-header">
                  <h5 class="card-title font-weight-bolder" style="color: #00054ad4; margin-left: 25px;">Adicionar Faculdade</h5>
                </div>
                
                <div class="card-body">
                  <div class="form m-3">

                    <form action="../../controller/auth/authController.php" method="POST" enctype="multipart/form-data">
                      <div class="input-group input-group-outline mb-5">
                        <label for="nome" class="form-label w-100">Nome da Faculdade</label>
                        <input type="text" class="form-control w-100" name="nome" required>
                        <input type="hidden" class="form-control w-100" name="tipo" value="addFaculdade" required>
                        <input type="hidden" class="form-control w-100" name="id" value="<?php echo $_SESSION['id']; ?>" required>
                      </div>

                      <div class="text-center">
                        <button type="submit" class="btn btn-primary w-100 pt-2 pb-2">Adicionar Faculdade</button>
                      </div>
                    </form>

                  </div>
                </div>
              </div>
            </div>

            <div class="col-xxl-6 col-lg-12 col-md-12">
              <div class="card info-card sales-card">
                <div class="card-header">
                  <h5 class="card-title font-weight-bolder" style="color: #00054ad4; margin-left: 25px;">Adicionar Curso</h5>
                </div>

                  <div class="card-body">
                    <div class="form m-3">

                      <form action="../../controller/auth/authController.php" method="POST" enctype="multipart/form-data">
                        
                      <div class="input-group input-group-outline mb-5">
                                <label for="curso" class="form-label w-100">Escolha Uma faculdade</label>
                                <select name="fau" id="fau" class="form-control" required>
                        <?php
                          $id = $_SESSION['id'];
                          $sql = "SELECT faculdade.nome FROM faculdade INNER JOIN inst_superior ON faculdade.id_inst = inst_superior.id INNER JOIN instituicao ON inst_superior.id = instituicao.id_instituicao WHERE instituicao.id_instituicao = $id";
                          $stmt = $pdo->prepare($sql);
                          $stmt->execute();
                          if($stmt->rowCount() != 0){
                            ?>
                                  <option value="">Selecione algum valor</option>
                            <?php
                            $count = 1; 
                            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                            ?>
                                  <option value="<?php echo $row['nome']; ?>"><?php echo $row['nome']; ?></option>
                            <?php
                            }

                            ?>
                            </select>
                          </div>
                          <?php
                          }else{
                            ?>
                                  <option value="" disabled>Não  existem Faculdades ainda!</option>
                                </select>
                              </div>
                            <?php
                          }
                          ?>

                        <div class="input-group input-group-outline mb-5">
                          <label for="nome" class="form-label w-100">Nome do Curso</label>
                          <input type="text" class="form-control w-100" name="nome" required>
                          <input type="hidden" class="form-control w-100" name="id" value="<?php echo $_SESSION['id']; ?>">
                          <input type="hidden" class="form-control w-100" name="tipo" value="addCursoSuperior">
                        </div>

                        <div class="input-group input-group-outline mb-5">
                          <label for="vagas" class="form-label w-100">Número de Vagas</label>
                          <input type="text" class="form-control w-100" name="vagas" required>
                        </div>

                        <div class="input-group input-group-outline mb-5">
                          <label for="inscric_val" class="form-label w-100">Taxa de Inscrição</label>
                          <input type="text" class="form-control w-100" name="inscricao_val" required>
                        </div>

                        <div class="input-group input-group-outline mb-5">
                          <label for="matric_val" class="form-label w-100">Taxa de Matrícula</label>
                          <input type="text" class="form-control w-100" name="matricula_val" required>
                        </div>

                        <div class="input-group input-group-outline mb-5">
                          <label for="desc" class="form-label w-100">Descrição</label>
                          <textarea name="desc" id="desc" class="form-control" rows="10" placeholder="Forneça uma breve descrição sobre o curso"></textarea>
                        </div>

                        <div class="input-group input-group-outline mb-5">
                          <label for="imagem" class="form-label w-100">Imagem descritiva do curso</label>
                          <input type="file" class="form-control w-100" name="imagem" required>
                        </div>

                        <div class="text-center">
                          <button type="submit" class="btn btn-primary w-100 pt-2 pb-2">Adicionar Curso</button>
                        </div>
                      </form>

                    </div>
                  </div>


                </div>
              </div>
            </div>

            <?php
          }
          ?>

              <!-- Sales Card -->
              <div class="col-xxl-6 col-lg-12 col-md-12">
                <div class="card info-card sales-card">
                  <div class="card-header">
                    <h5 class="card-title font-weight-bolder" style="color: #00054ad4; margin-left: 25px;">Adicionar Período de Inscrição</h5>
                  </div>
                  
                  <div class="card-body">
                    <form action="../../controller/auth/authController.php" method="POST" enctype="multipart/form-data" >
                      <div class="form m-3">

                        <div class="input-group input-group-outline mb-5">
                          <label for="ano" class="form-label w-100">Ano</label>
                          <input type="text" class="form-control w-100" name="ano" required>
                          <input type="hidden" class="form-control w-100" name="tipo" value="addPeriodoInscricao">
                          <input type="hidden" class="form-control w-100" name="id" value="<?php echo $_SESSION['id']; ?>">
                        </div>

                        <div class="input-group input-group-outline mb-5">
                          <label for="dataInicio" class="form-label w-100">Data de Início</label>
                          <input type="date" class="form-control w-100" name="dataInicio" required>
                        </div>

                        <div class="input-group input-group-outline mb-5">
                          <label for="dataFim" class="form-label w-100">Data de fim</label>
                          <input type="date" class="form-control w-100" name="dataFim" required>
                        </div>

                        <div class="input-group input-group-outline mb-5">
                          <label for="descric" class="form-label w-100">Descrição</label>
                          <textarea name="descric" id="descric" class="form-control" rows="5" placeholder="Forneça algum dado importante a respeito (opcional)"></textarea>
                        </div>

                        <div class="text-center">
                          <button type="submit" class="btn btn-primary w-100 pt-2 pb-2">Cadastrar Período</button>
                        </div>
                      </div>
                    </form>

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