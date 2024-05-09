<?php
  include_once "../../model/session.php";
  include_once "../../model/conexao.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Meta Tags -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="keywords" content="Site keywords here">
  <meta name="description" content="">
  <meta name='copyright' content=''>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Title -->
  <title>SUIEA - Fazer Login</title>

  <!-- Favicon -->
  <link href="../assets/img/favicon.png" rel="icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Poppins:200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap" rel="stylesheet">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="../../assets/css/bootstrap.min.css">
  <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="../../assets/css/font-awesome.min.css">
  <!-- icofont CSS -->
    <link rel="stylesheet" href="../../assets/css/icofont.css">
  <!-- Slicknav -->
  <link rel="stylesheet" href="../../assets/css/slicknav.min.css">
  <!-- Datepicker CSS -->
  <link rel="stylesheet" href="../../assets/css/datepicker.css">
  <!-- Animate CSS -->
    <link rel="stylesheet" href="../../assets/css/animate.min.css">
  <!-- Magnific Popup CSS -->
    <link rel="stylesheet" href="../../assets/css/magnific-popup.css">

  <!-- Medipro CSS -->
  <link rel="stylesheet" href="../../assets/css/normalize.css">
  <link rel="stylesheet" href="../../assets/css/style.css">
  <link rel="stylesheet" href="../../assets/css/responsive.css">

  <link rel="stylesheet" href="../../assets/css/material-dashboard.css">

  <style>
    @media only screen and (min-width: 991px) {
      .inscricao-container, .matricula-container{
        margin-inline: 200px !important;
      }
    }

    @media only screen and (min-width: 1400px) {
      .inscricao-container, .matricula-container{
        margin-inline: 370px !important;
      }
    }
  </style>
</head>

<body class="">
<script src="../../assets/js/sweetalert2@11.js"></script>

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


  <main class="main-content  mt-0">
    <section>
      <div class="page-header min-vh-100 pt-5 pb-5 overlay form-inscricao" style="background-image: url('../../assets/img/write.jpeg');">
        <div class="container">


          <div class="card card-plain matricula-container" style="background-color: #fff; box-shadow: 0 0px 5px rgb(71 71 71 / 30%);">
              <div class="card-header">
                <div class="row p-3 pt-0 pb-0">
                  <div class="col-12 d-flex pb-3 pt-3 border-bottom " style="border-color: #00054ad4 !important;">
                    <div class="d-flex p-2 me-3 border rounded-circle" style="width: 100px; height: 100px; border-color: #00054ad4 !important;">
                      <img src="../../assets/img/favicon3.png" alt="" class="rounded-circle w-100">
                    </div>
                    <div class="d-block pt-3 w-100">
                      <h4 class="font-weight-bolder" style="color: #00054ad4;">Formulário de Matrícula</h4>
                      <p class="mb-0">Submeta os arquivos abaixo</p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-body">

              <?php
                if(isset($_GET['inscricao']) && isset($_GET['utilizador']) && isset($_GET['instituicao']) && isset($_GET['area']) && isset($_GET['curso'])){
                    $utilizador = $_GET['utilizador'];
                    $instituicao = $_GET['instituicao'];
                    $inscricao = $_GET['inscricao'];
                    $curso = $_GET['curso'];
                    $area = $_GET['area'];

                    $cursoTable = ($area === 'Ensino Médio') ? 'curso_medio' : 'curso_superior';
                    
                }?>

                <form action="../../controller/auth/authController.php" method="POST" enctype="multipart/form-data">
                  <div class="row pb-2">
                    <div class="col-12">
                      <label for="" class="form-label text-bolder">Dados do Utilizador</label>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-12">
                      <label class="form-label">Nome Completo</label>
                      <div class="input-group input-group-outline mb-3">
                        <?php
                          $sql_fuser = "SELECT * FROM utilizador WHERE id_utilizador = $utilizador";
                          $stmt_fuser = $pdo ->query($sql_fuser);
                          $row_fuser = $stmt_fuser -> fetch(PDO::FETCH_ASSOC);
                        ?>
                        <input type="text" class="form-control" value="<?php echo $row_fuser['nome'];?>" required disabled>
                        <input type="hidden" class="form-control" value="<?php echo $utilizador;?>" name="utilizador">
                        <input type="hidden" class="form-control" value="<?php echo $inscricao;?>" name="inscricao">
                        <?php
                          if($area === "Ensino Médio"){?>
                            <input type="hidden" class="form-control" value="matriculaMedio" name="tipo">
                            <?php } else { ?> 
                            <input type="hidden" class="form-control" value="matriculaSuperior" name="tipo">
                            <?php } ?>
                      </div>
                    </div>
                  </div>

                  <div class="row">

                    <div class="col-12">
                      <label class="form-label">Certificado Escolar  (Arquivo)</label>
                      <div class="input-group input-group-outline mb-3">
                        <input type="file" class="form-control" required name="certificado">
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-lg-6 col-12">
                      <label class="form-label">Atestado Médico (Arquivo)</label>
                      <div class="input-group input-group-outline mb-3">
                        <input type="file" class="form-control" required name="atest_medico">
                      </div>
                    </div>

                    <div class="col-lg-6 col-12">
                      <label class="form-label">Cartão de Vacinas (Arquivo)</label>
                      <div class="input-group input-group-outline mb-3">
                        <input type="file" class="form-control" required name="vacina">
                      </div>
                    </div>
                  </div>

                  <div class="row pb-2 pt-3">
                    <div class="col-12">
                      <label for="" class="form-label text-bolder">Dados da Instituição</label>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-lg-6 col-12">
                      <label class="form-label">Nome da Instituição</label>
                      <?php
                              $sql_finst = "SELECT * FROM instituicao WHERE id_instituicao = $instituicao";
                              $stmt_finst = $pdo ->query($sql_finst);
                              $row_finst = $stmt_finst -> fetch(PDO::FETCH_ASSOC);
                        ?>
                      <div class="input-group input-group-outline mb-3">
                        <input type="text" class="form-control" required value="<?php echo $row_finst['nome'];?>" disabled>
                        <input type="hidden" class="form-control" value="<?php echo $instituicao;?>" name="instituicao">
                      </div>
                    </div>

                    <div class="col-lg-6 col-12">
                      <label class="form-label">Curso</label>
                      <?php
                              $sql_fcurso = "SELECT * FROM $cursoTable WHERE id = $curso";
                              $stmt_fcurso = $pdo ->query($sql_fcurso);
                              $row_fcurso = $stmt_fcurso -> fetch(PDO::FETCH_ASSOC);
                        ?>
                      <div class="input-group input-group-outline mb-3 me-3">
                        <input type="text" class="form-control" required value="<?php echo $row_fcurso['nome'];?>" disabled>
                        <input type="hidden" class="form-control" value="<?php echo $curso;?>" name="curso">
                      </div>
                    </div>
                  </div>

                  <div class="row mb-5">
                    <div class="text-center">
                      <button type="submit" class="btn btn-lg bg-gradient-primary btn-lg w-100 mt-4 mb-0" style="background: #00054ad4; box-shadow: 0 3px 3px 0 rgba(81, 9, 129, 0.15), 0 3px 1px -2px rgba(81, 9, 129, 0.15), 0 1px 5px 0 rgba(81, 9, 129, 0.15);">Enviar Matrícula</button>
                    </div>
                  </div>
                </form>

                <div class="card-footer text-center pt-0 pb-0">
                  <p class="mb-2 mt-0 text-sm mx-auto">
                    <a href="ver-inscricoes.php" class="font-weight-bold" style="color: #00054ad4;"><span><i class="icofont icofont-arrow-left m-1" style="font-size: 16px;"></i></span>Voltar</a>
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>
  <!--   Core JS Files   -->
  <script src="../../assets/js/core/bootstrap.bundle.min.js"></script>
  <script src="../../assets/js/core/bootstrap.min.js"></script>
  <script src="../../assets/js/core/popper.min.js"></script>
  <script src="../../assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="../../assets/js/plugins/smooth-scrollbar.min.js"></script>

  <!----- Project JS  -->
  <script src="../../assets/js/mini-functions.js"></script>
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>

  <script src="../../assets/js/material-dashboard.js"></script>
  <script src="../../assets/js/sweetalert2@11.js"></script>
</body>

</html>