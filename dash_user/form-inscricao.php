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
    <title>SUIEA - Fazer inscrição</title>

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

          <div class="card card-plain inscricao-container" style="background-color: #fff; box-shadow: 0 0px 5px rgb(71 71 71 / 30%);">
            <div class="card-header">
              <div class="row p-3 pt-0 pb-0">
                <div class="col-12 d-flex pb-3 pt-3 border-bottom " style="border-color: #00054ad4 !important;">
                  <div class="d-flex p-2 me-3 border rounded-circle" style="width: 100px; height: 100px; border-color: #00054ad4 !important;">
                    <img src="../assets/img/favicon.png" alt="" class="rounded-circle w-100">
                  </div>
                  <div class="d-block pt-3 w-100">
                    <h4 class="font-weight-bolder" style="color: #00054ad4;">Formulário de Inscrição</h4>
                    <p class="mb-0">Preencha o formulário abaixo</p>
                  </div>
                </div>
              </div>
            </div>
            <div class="card-body">

              <?php
                if(isset($_GET['utilizador']) && isset($_GET['instituicao']) && isset($_GET['utilizadorId']) && isset($_GET['instituicaoId']) && isset($_GET['area'])){
                    $utilizador = $_GET['utilizador'];
                    $instituicao = $_GET['instituicao'];
                    $utilizadorId = $_GET['utilizadorId'];
                    $instituicaoId = $_GET['instituicaoId'];
                    $bi = $_GET['bi'];
                    $area = $_GET['area'];

                    $sql_periodo = "SELECT * FROM periodo_inscricao WHERE estado = 'Activo' AND id_inst = :id";
                    $stmt_periodo = $pdo->prepare($sql_periodo);
                    $stmt_periodo->bindParam(':id', $instituicaoId);
                    $stmt_periodo->execute();

                    if($area === 'Ensino Médio'){
                      $sql_cursos = "SELECT * FROM curso_medio WHERE id_inst = :id";

                      $stmt_cursos = $pdo->prepare($sql_cursos);
                      $stmt_cursos->bindParam(':id', $instituicaoId, PDO::PARAM_INT);
                      $stmt_cursos->execute();
  
                      if($stmt_periodo->rowCount() == 0 || $stmt_cursos->rowCount() == 0){
                          echo "<script>
                              Swal.fire({
                                  icon: 'info',
                                  title: 'Não existe um período de inscrição ou cursos disponíveis nessa instituição!',
                                  text: '',
                              }).then((result) => {
                                  if (result.isConfirmed) {
                                      window.location.href = '../../view/dash_user/ver-detalhes-escola.php?id=$instituicaoId&taged=wssiocfbetmasw';
                                  }
                              });
                          </script>";
                      }
                  }else{
                    $sql_cursos = "SELECT * FROM curso_superior WHERE id_inst = :id";

                    $stmt_cursos = $pdo->prepare($sql_cursos);
                    $stmt_cursos->bindParam(':id', $instituicaoId, PDO::PARAM_INT);
                    $stmt_cursos->execute();

                    if($stmt_periodo->rowCount() == 0 || $stmt_cursos->rowCount() == 0){
                        echo "<script>
                            Swal.fire({
                                icon: 'info',
                                title: 'Não existe um período de inscrição ou cursos disponíveis nessa instituição!',
                                text: '',
                            }).then((result) => {
                                if (result.isConfirmed) {
                                  window.location.href = '../../view/dash_user/ver-detalhes-escola.php?id=$instituicaoId&taged=wssiocfbetmasw';
                                }else{
                                  window.location.href = '../../view/dash_user/ver-detalhes-escola.php?id=$instituicaoId&taged=wssiocfbetmasw';
                                }
                            });
                        </script>";
                    }
                  }
                }else{
                    header('location: index.php');
                }
              ?>


              <form action="../../controller/auth/authController.php" method="POST" enctype="multipart/form-data">
                <div class="row pb-2">
                  <div class="col-12">
                    <label for="" class="form-label text-bolder">Dados do Utilizador</label>
                  </div>
                </div>
                <div class="row">
                  <div class="col-12">
                    <label class="form-label">Nome Completo do Utilizador</label>
                    <div class="input-group input-group-outline mb-3">
                      <input type="text" class="form-control" value="<?php echo $utilizador;?>" required disabled>
                      <input type="hidden" class="form-control" value="<?php echo $utilizadorId;?>" name="utilizador">
                      <?php
                        if($area === "Ensino Médio"){?>
                          <input type="hidden" class="form-control" value="inscricaoMedio" name="tipo">
                          <?php } else { ?> 
                          <input type="hidden" class="form-control" value="inscricaoSuperior" name="tipo">
                          <?php } ?>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-6 col-12">
                    <label class="form-label">Bilhete de Identidade </label>
                    <div class="input-group input-group-outline mb-3">
                      <input type="text" class="form-control" name="" required value="<?php echo $bi?>" disabled>
                    </div>
                  </div>

                  <div class="col-lg-6 col-12">
                    <label class="form-label">Certificado Escolar  (arquivo)</label>
                    <div class="input-group input-group-outline mb-3">
                      <input type="file" class="form-control" required name="certificado">
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
                    <div class="input-group input-group-outline mb-3">
                      <input type="text" class="form-control" required value="<?php echo $instituicao;?>" disabled>
                      <input type="hidden" class="form-control" value="<?php echo $instituicaoId;?>" name="instituicao">
                    </div>
                  </div>

                  <div class="col-lg-6 col-12">
                    <label class="form-label">Curso</label>
                    <div class="input-group input-group-outline mb-3 me-3">
                      <select class="form-control" name="curso" required>
                        <option value="">Selecione um curso</option>
                        <?php
                          // Exibir as opções
                          while ($row = $stmt_cursos->fetch(PDO::FETCH_ASSOC)) {
                              ?><option value="<?=$row['id'];?>"><?=$row['nome']; ?></option><?php
                          }
                        ?>
                      </select>
                    </div>
                  </div>
                </div>

                <div class="row mb-5">
                  <div class="text-center">
                    <button type="submit" class="btn btn-lg bg-gradient-primary btn-lg w-100 mt-4 mb-0" style="background: #00054ad4; box-shadow: 0 3px 3px 0 rgba(81, 9, 129, 0.15), 0 3px 1px -2px rgba(81, 9, 129, 0.15), 0 1px 5px 0 rgba(81, 9, 129, 0.15);">Enviar Inscrição</button>
                  </div>
                </div>
              </form>

              <div class="card-footer text-center pt-0 pb-0">
                <p class="mb-2 mt-0 text-sm mx-auto">
                  <a href="ver-detalhes-escola.php?id=<?=$instituicaoId;?>&tagged=56621gwjq4gf79316dg41wh2" class="font-weight-bold" style="color: #00054ad4;"><span><i class="icofont icofont-arrow-left m-1" style="font-size: 16px;"></i></span>Voltar</a>
                </p>
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