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
      <h1>Perfil</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Página inicial</a></li>
          <li class="breadcrumb-item active">Perfil</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section profile">
      <div class="row">
        <div class="col-xl-4">

          <div class="card">
            <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

              <img src="<?php echo $avatar;?>" alt="Profile" class="rounded-circle" style="width: 150px !important; height: 150px !important;">
              <h2 class="pt-3 pb-3"><?=$_SESSION['nome'];?></h2>
              <h3><?=$_SESSION['nivel'];?></h3>
            </div>
          </div>

        </div>

        <div class="col-xl-8">

          <div class="card">
            <div class="card-body pt-3">
              <!-- Bordered Tabs -->
              <ul class="nav nav-tabs nav-tabs-bordered">

                <li class="nav-item">
                  <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Resumo</button>
                </li>

                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Editar Perfil</button>
                </li>

                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-password">Mudar Palavra-passe</button>
                </li>

              </ul>
              <div class="tab-content pt-2">
                
              <div class="tab-pane fade show active profile-overview" id="profile-overview">
    
    <h5 class="card-title">Informações Pessoais</h5>

    <div class="row">
      <div class="col-lg-3 col-md-4 label ">Nome Completo</div>
      <div class="col-lg-9 col-md-8"><?php echo $_SESSION['nome']; ?></div>
    </div>

    <div class="row">
      <div class="col-lg-3 col-md-4 label">Gênero</div>
      <div class="col-lg-9 col-md-8"><?php echo $_SESSION['genero']; ?></div>
    </div>

    <div class="row">
      <div class="col-lg-3 col-md-4 label">Nascimento</div>
      <div class="col-lg-9 col-md-8"><?php echo $_SESSION['nascimento']; ?></div>
    </div>

    <div class="row">
      <div class="col-lg-3 col-md-4 label">Nº Bilhete de Identidade</div>
      <div class="col-lg-9 col-md-8"><?php echo $_SESSION['n_bi']; ?></div>
    </div>

    <div class="row">
      <div class="col-lg-3 col-md-4 label">Morada</div>
      <div class="col-lg-9 col-md-8"><?php echo $_SESSION['morada']; ?></div>
    </div>

    <div class="row">
      <div class="col-lg-3 col-md-4 label">Cadastro</div>
      <div class="col-lg-9 col-md-8"><?php echo $_SESSION['criado']; ?></div>
    </div>

    <div class="row">
      <div class="col-lg-3 col-md-4 label">Telefone</div>
      <div class="col-lg-9 col-md-8"><?php echo $_SESSION['telefone']; ?></div>
    </div>

    <div class="row">
      <div class="col-lg-3 col-md-4 label">Email</div>
      <div class="col-lg-9 col-md-8"><?php echo $_SESSION['email']; ?></div>
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
                            <input name="imagem" type="file" class="form-control" id="" required>
                            <input name="tipo" type="hidden" class="form-control" value="updateUser" required>
                            <input name="id" type="hidden" class="form-control" value="<?=$_SESSION['id'];?>" required>
                            <input name="nivel" type="hidden" class="form-control" value="<?=$_SESSION['nivel'];?>" required>
                            </div>
                          </div>
                        </div>
    
                        <div class="row mb-3">
                          <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Nome Completo</label>
                          <div class="col-md-8 col-lg-9">
                            <input name="nome" type="text" class="form-control" id="nome" value="<?=$_SESSION['nome'];?>">
                          </div>
                        </div>
    
                        <div class="row mb-3">
                          <label for="Nascimento" class="col-md-4 col-lg-3 col-form-label">Nascimento</label>
                          <div class="col-md-8 col-lg-9">
                            <input name="nascimento" type="date" class="form-control" id="Nascimento" value="<?=$_SESSION['nascimento'];?>" required>
                          </div>
                        </div>
    
                        <div class="row mb-3">
                          <label for="n_bi" class="col-md-4 col-lg-3 col-form-label">Nº Bilhete de Identidade</label>
                          <div class="col-md-8 col-lg-9">
                            <input name="n_bi" type="text" class="form-control" id="n_bi" value="<?=$_SESSION['n_bi'];?>" required>
                          </div>
                        </div>
    
                        <div class="row mb-3">
                          <label for="morada" class="col-md-4 col-lg-3 col-form-label">Morada</label>
                          <div class="col-md-8 col-lg-9">
                            <input name="morada" type="text" class="form-control" id="morada" value="<?=$_SESSION['morada'];?>">
                          </div>
                        </div>
    
                        <div class="row mb-3">
                          <label for="Telefone" class="col-md-4 col-lg-3 col-form-label">Telefone</label>
                          <div class="col-md-8 col-lg-9">
                            <input name="telefone" type="text" class="form-control" id="Telefone" value="<?=$_SESSION['telefone'];?>">
                          </div>
                        </div>
    
                        <div class="row mb-3">
                          <label for="Email" class="col-md-4 col-lg-3 col-form-label">Email</label>
                          <div class="col-md-8 col-lg-9">
                            <input name="email" type="email" class="form-control" id="Email" value="<?=$_SESSION['email'];?>">
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
                    <input name="id" type="hidden" class="form-control" value="<?=$_SESSION['id'];?>">
                    <input name="tipo" type="hidden" class="form-control" value="updateSenhaUser">
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

              </div><!-- End Bordered Tabs -->

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