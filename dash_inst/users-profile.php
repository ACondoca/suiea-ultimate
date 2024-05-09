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
            <div class="breadcrumbs overlay p-0" id="home-student">
                <!--
                <div class="bread-inner">
                  <div class="row">
                    <div class="col-12">
                      <h2>Perfil da Instituição</h2>
                      <ul class="bread-list">
                        <li><a href="index.php">Página inicial</a></li>
                        <li><i class="icofont-simple-right"></i></li>
                        <li class="active">Perfil da Instituição</li>
                      </ul>
                    </div>
                  </div>
                </div>
                -->

                <div class="card m-0">
                  <div class="card-body profile-card pt-4 d-flex flex-column align-items-center position-relative overlay" style="background-image: url('<?=$avatar; ?>'); background-position: center; background-repeat: repeat;">
                    <div class="row" style="z-index: 995 !important;">
                      <div class="col-12">
                        <img src="<?=$avatar; ?>" alt="" class="rounded-circle" style="max-width: 120px !important; max-height: 120px !important; width: 120px !important; height: 120px !important;">
                      </div>
                    </div>
                    <h2 style="z-index: 995 !important; color: #fff;" class="pt-3 pb-3"><?=$_SESSION['nome']; ?></h2>
                    <h3 style="z-index: 995 !important; color: #fff; font-size: 16px !important;"><?=$_SESSION['nivel']; ?></h3>
                  </div>
                </div>

            </div>
            <!-- End Breadcrumbs -->

          </div>
        </div>

      </div>
    </section>

    <section class="section profile">
      <div class="row">

        <div class="col-xl-12">

          <div class="card">
            <div class="card-body pt-3">
              <!-- Bordered Tabs -->
              <ul class="nav nav-tabs nav-tabs-bordered d-flex justify-content-center">

                <li class="nav-item">
                  <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Resumo</button>
                </li>

                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Editar Perfil</button>
                </li>

                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-password">Mudar Palavra-passe</button>
                </li>

                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#cursos">Cursos</button>
                </li>

              </ul>
              <div class="tab-content pt-2">

                <div class="tab-pane fade show active profile-overview" id="profile-overview">

                  <h5 class="card-title">Informações  da Instituição</h5>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label ">Nome da Instituição</div>
                    <div class="col-lg-9 col-md-8"><?=$_SESSION["nome"];?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label ">Sigla</div>
                    <div class="col-lg-9 col-md-8"><?=  $_SESSION["sigla"];?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Área de Ensino</div>
                    <div class="col-lg-9 col-md-8"><?= $_SESSION["area"] ;?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Localização</div>
                    <div class="col-lg-9 col-md-8"><?= $_SESSION['localizacao'] ;?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Tipo</div>
                    <div class="col-lg-9 col-md-8"><?= $_SESSION["tipo"]; ?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Cadastro</div>
                    <div class="col-lg-9 col-md-8"><?= $_SESSION["criado"]; ?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Telefone</div>
                    <div class="col-lg-9 col-md-8">(+244) <?=$_SESSION["telefone"];?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Email</div>
                    <div class="col-lg-9 col-md-8"><?=$_SESSION["email"];?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">resumo</div>
                    <div class="col-lg-9 col-md-8"><?= $_SESSION["resumo"] ;?></div>
                  </div>
                  
                </div>

                <div class="tab-pane fade profile-edit pt-3" id="profile-edit">

                  <!-- Profile Edit Form -->
                  <form action="../../controller/auth/authController.php" method="POST" enctype="multipart/form-data">
                    <div class="row mb-3">
                      <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Foto de Perfil</label>
                      <div class="col-md-8 col-lg-9">
                        <img src="<?=$avatar;?>" alt="Profile">
                        <div class="pt-2">
                          <input type="file" name="imagem" class="form-control">
                          <input type="hidden" name="tipo" class="form-control" value="updateInst">
                          <input type="hidden" name="id" class="form-control" value="<?=$_SESSION['id'];?>">
                        </div>
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Nome da Instituição</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="nome" type="text" class="form-control" id="fullName" value="<?=$_SESSION["nome"];?>">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="Sigla" class="col-md-4 col-lg-3 col-form-label">Sigla</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="sigla" type="text" class="form-control" id="Sigla" value="<?=$_SESSION["sigla"];?>" required>
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="Sigla" class="col-md-4 col-lg-3 col-form-label">Localização</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="localizacao" type="text" class="form-control" id="" value="<?=$_SESSION["localizacao"];?>" required>
                      </div>
                    </div>

                    <div class="row mb-3">
                    <label for="" class="col-md-4 col-lg-3 col-form-label">NIF</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="nif" type="text" class="form-control" id="" value="<?=$_SESSION["nif"];?>" required>
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="Telefone" class="col-md-4 col-lg-3 col-form-label">Telefone</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="telefone" type="text" class="form-control" id="Telefone" value="<?=$_SESSION["telefone"];?>">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="Email" class="col-md-4 col-lg-3 col-form-label">Email</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email" type="email" class="form-control" id="Email" value="<?=$_SESSION["email"];?>">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="resumo" class="col-md-4 col-lg-3 col-form-label">Resumo</label>
                      <div class="col-md-8 col-lg-9">
                        <textarea name="resumo" id="" class="form-control" value="<?=$_SESSION["resumo"];?>"></textarea>
                      </div>
                    </div>

                    <div class="text-center">
                      <button type="submit" class="btn btn-primary">Salvar Mudanças</button>
                    </div>
                  </form><!-- End Profile Edit Form -->

                </div>

                <div class="tab-pane fade pt-3" id="profile-change-password">
                  <!-- Change Password Form -->
                  <form action="../../controller/auth/authController.php" method="POST" enctype="multipart/form-data">

                    <div class="row mb-3">
                      <label for="currentPassword" class="col-md-4 col-lg-3 col-form-label">Palavra-passe Actual</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="senha" type="password" class="form-control" id="currentPassword">
                        <input name="tipo" type="hidden" class="form-control" id="currentPassword" value="updateSenhaInst">
                        <input name="id" type="hidden" class="form-control" id="currentPassword" value="<?=$_SESSION['id'];?>">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">Nova Palavra-passe</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="nsenha1" type="password" class="form-control" id="newPassword">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="renewPassword" class="col-md-4 col-lg-3 col-form-label">Repita a Nova Palavra-passe</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="nsenha2" type="password" class="form-control" id="renewPassword">
                      </div>
                    </div>

                    <div class="text-center">
                      <button type="submit" class="btn btn-primary">Mudar Palavra-passe</button>
                    </div>
                  </form><!-- End Change Password Form -->

                </div>

                <div class="tab-pane fade pt-3 profile-overview" id="cursos">
                  
                  <h5 class="card-title">Cursos Administrados</h5>

                  <div class="row">
                  <?php
                        if($_SESSION['area'] == "Ensino Médio"){
                          $id = $_SESSION['id'];
                          $sql = "SELECT curso_medio.nome, curso_medio.vagas FROM curso_medio INNER JOIN instituicao ON curso_medio.id_inst = instituicao.id_instituicao WHERE instituicao.id_instituicao = $id";
                          $stmt = $pdo->query($sql);
                          if ($stmt->rowCount() != 0) {
                            $count = 1; 
                            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                            ?><div class="col-lg-8 col-md-8 pt-2 pb-2"><span><?php echo $row["nome"]; ?></span> <br> <span><?php echo $row["vagas"]; ?></span> Vagas </div><?php
                            }
                          }
                        }else{
                          $id= $_SESSION['id'];
                          $sql = "SELECT curso_superior.nome, curso_superior.vagas FROM curso_superior INNER JOIN instituicao ON curso_superior.id_inst = instituicao.id_instituicao WHERE instituicao.id_instituicao = $id";
                          $stmt = $pdo->query($sql);
                          if ($stmt->rowCount() != 0) {
                            $count = 1; 
                            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                            ?><div class="col-lg-8 col-md-8 pt-2 pb-2"><span><?php echo $row["nome"]; ?></span> <br> <span><?php echo $row["vagas"]; ?></span> Vagas </div><?php
                            }
                          }
                        }
                      ?>
                    
                  </div>

                </div>

              </div>

              </div><!-- End Bordered Tabs -->

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