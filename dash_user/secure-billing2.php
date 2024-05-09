<?php
  include_once "../../model/session.php";
  include_once "../../model/conexao.php";

  if(isset($_GET['mark']) && isset($_GET['area']) && isset($_GET['curso']) && isset($_GET['inst']) && isset($_GET['user'])){
    $id_matricula = $_GET['mark'];
    $id_instituicao = $_GET['inst'];
    $id_curso = $_GET['curso'];
    $user = $_GET['user'];
    $area = $_GET['area'];

    $matriculatable = ($area === 'EnsinoMedio') ? 'matricula_medio' : 'matricula_superior';
    
    $sql1 = "SELECT * FROM instituicao WHERE id_instituicao = $id_instituicao";
    $stmt1 = $pdo -> query($sql1);
    $row1 = $stmt1 -> fetch(PDO::FETCH_ASSOC);
    $nome_inst = $row1['nome'];
    
    $cursotable = ($area === 'EnsinoMedio') ? 'curso_medio' : 'curso_superior';

    $sql2 = "SELECT * FROM $cursotable WHERE id = $id_curso";
    $stmt2 = $pdo -> query($sql2);
    $row2 = $stmt2 -> fetch(PDO::FETCH_ASSOC);
    $matric_val = $row2['matricula_val'];

  }else{
    header ('location: index.php');
  }
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Meta Tags -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Title -->
  <title>SUIEA - Sistema Unificado de Inscrições Escolares de Angola</title>

  <!-- Favicon -->
  <link href="../assets/img/favicon.png" rel="icon">

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
      <div class="page-header pt-5 pb-5 form-inscricao" style="background-image: url('../assets/img/payment.jpg');">>
        <div class="container">

          <div class="card card-plain inscricao-container" style="background-color: #fff; box-shadow: 0px 0px 15px rgb(0 0 0 / 10%);">
            <div class="card-header p-0" style="background: #00054ad4;">
              <div class="row p-3 pt-0 pb-0">
                <div class="col-12 d-flex pb-3 pt-3">
                  <div class="pt-3 w-100">
                    <h4 class="font-weight-bolder" style="color: #fff;">Conta</h4>
                  </div>

                  <div class="d-flex justify-content-center align-items-center text-center">
                    <p class="d-flex justify-content-center align-items-center m-0">
                      <a href="ver-detalhes-escola.php?id=<?=$id_instituicao;?>&tagged=56621gwjq4gf79316dg41wh2" class="font-weight-bold">
                        <span class="text-white">
                          <i class="icofont icofont-arrow-left m-1" style="font-size: 16px; color: #fff;"></i>Voltar
                        </span>
                      </a>
                    </p>
                  </div>
                </div>
              </div>
            </div>
            
            <div class="card-body">
              <form action="../../controller/auth/authController.php" method="POST" enctype="multipart/form-data">
                <div class="row pb-2">
                  <div class="col-12">
                    <div class="p-3">
                      <label class="form-label text-bolder" style="color: #222 !important; font-size: 18px;">Pagamento seguro</label>
                      <p class="pt-3 text-center text-bolder" style="color:#000; font-size: 28px;"> AKZ <span style="color:#000; font-size: 32px;" id=""><?=$matric_val;?></span> </p>
                      <p class="pt-0 text-center text-bolder" style="font-size: 12px;">Pagamento de Taxa <br> Instituição Beneficiária: <b><span><?=$nome_inst;?></span></b></p>
                    </div>
                  </div>
                </div>

                <div class="row pb-2">
                  <div class="col-12">
                    <div class="p-2 mt-3 mb-3 w-100 d-flex align-items-center" style="background: #00054ad4; border-radius: 4px;">
                      <img src="../assets/img/billing.png" style="width: 25px !important; height: 18px !important;">
                      <label class="form-label  text-white ps-2 m-0">Cartão de débito ou crédito</label>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-12">
                    <label class="form-label text-bolder">Número do cartão</label>
                    <div class="input-group input-group-outline mb-3">
                      <input type="text" class="form-control" style="background: #eeeeee;" required placeholder="1234 5678 9012 3456" name="cartao">
                      <input type="hidden" class="form-control" name="tipo" value="pagarMatricula">
                      <input type="hidden" class="form-control" name="area" value="<?=$area;?>">
                      <input type="hidden" class="form-control" name="user" value="<?=$user;?>">
                      <input type="hidden" class="form-control" name="curso" value="<?=$id_curso;?>">
                      <input type="hidden" class="form-control" name="inst" value="<?=$id_instituicao;?>">
                      <input type="hidden" class="form-control" name="mark" value="<?=$id_matricula;?>">
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-lg-6 col-6">
                    <label class="form-label text-bolder">Data de validade</label>
                    <div class="input-group input-group-outline mb-3">
                      <input type="text" class="form-control" style="background: #eeeeee;" required placeholder="MM / AA" name="validade">
                    </div>
                  </div>

                  <div class="col-lg-6 col-6">
                    <label class="form-label text-bolder">Código de segurança</label>
                    <div class="input-group input-group-outline mb-3">
                      <input type="text" class="form-control" style="background: #eeeeee;" required placeholder="3 digitos" name="codigo">
                    </div>
                  </div>
                </div>

                <div class="row mb-3">
                  <div class="d-flex justify-content-end align-items-center">
                    <button type="submit" class="btn mt-1 text-white" style="background: #00054ad4; border-radius: 4px; text-transform: initial;">Avançar</button>
                  </div>
                </div>

                <div class="row">
                  <div class="d-flex justify-content-center align-items-center">
                    <p class="text-center px-5 mb-0" style="font-size: 14px;">
                      Após a confirmação de pagamento, poderá obter um recibo comprovativo da operação realizada.
                    </p>
                  </div>
                </div>
              </form>

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