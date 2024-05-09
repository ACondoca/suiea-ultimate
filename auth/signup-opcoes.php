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
<link rel="icon" href="../../assets/img/favicon3.png">
<!-- Slick Theme -->
<link rel="stylesheet" href="../../assets/css/slick.css">
<link rel="stylesheet" href="../../assets/css/slick-theme.css">
<!-- Bootstrap CSS -->
<link rel="stylesheet" href="../../assets/css/bootstrap.min.css">
<!-- Nice Select CSS -->
<link rel="stylesheet" href="../../assets/css/nice-select.css">
<!-- Font Awesome CSS -->
  <link rel="stylesheet" href="../../assets/css/font-awesome.min.css">
<!-- icofont CSS -->
  <link rel="stylesheet" href="../../assets/css/icofont.css">
<!-- Slicknav -->
<link rel="stylesheet" href="../../assets/css/slicknav.min.css">
<!-- Owl Carousel CSS -->
  <link rel="stylesheet" href="../../assets/css/owl-carousel.css">
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

</head>

<body class="">

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

  <div class="container position-sticky z-index-sticky top-0">
    <div class="row">
      <div class="col-12">
      </div>
    </div>
  </div>
  <main class="main-content  mt-0">
    <section>
      <div class="page-header min-vh-100">
        <div class="position-absolute" style="top: 20px; left: 50%;">
          <a href="../../index.php" class="font-weight-bolder ps-3" style="color: #00054ad4;"><i class="icofont-arrow-left"></i><span class="ps-">Home</span></a>
        </div>
        <div class="container">
          <div class="row">
            <div class="col-6 d-lg-flex d-none h-100 my-auto px-0 position-absolute top-0 start-0 text-center justify-content-center flex-column">
              <div class="overlay-login"></div>
              <div class="h-100 px-7 d-flex flex-column justify-content-center" style="background-image: url('../../assets/img/cad3.jpeg'); background-size: cover; background-position: center;">
              </div>

              <div class="col-12 d-flex flex-column ms-auto me-auto ms-lg-auto position-absolute">
                <div class="card card-plain">
                  <div class="card-header" style="background: transparent;">
                    <h4 class="font-weight-bolder" style="color: #fff; font-size: 28px;" id="writeEfect"></h4>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-4 col-lg-5 col-md-7 d-flex flex-column ms-auto me-auto ms-lg-auto me-lg-5">
              <div class="card card-plain">
                <div class="card-header">
                  <h4 class="font-weight-bolder" style="color: #00054ad4;">Cadastrar como?</h4>
                  <p class="mb-0">Escolha o tipo de cadastro a fazer</p>
                </div>
                <div class="card-body">
                  <form role="form">
                    <div class="text-center">
                      <button type="button" class="btn btn-lg bg-gradient-primary btn-lg w-100 mt-4 mb-0" style="background: #00054ad4; box-shadow: 0 3px 3px 0 rgba(81, 9, 129, 0.15), 0 3px 1px -2px rgba(81, 9, 129, 0.15), 0 1px 5px 0 rgba(81, 9, 129, 0.15);" onclick="window.location.href='signup.php'">Utilizador</button>
                      <button type="button" class="btn btn-lg bg-gradient-primary btn-lg w-100 mt-4 mb-0" style="background: #00054ad4; box-shadow: 0 3px 3px 0 rgba(81, 9, 129, 0.15), 0 3px 1px -2px rgba(81, 9, 129, 0.15), 0 1px 5px 0 rgba(81, 9, 129, 0.15);" onclick="window.location.href='signup2.php'">Instituição</button>
                    </div>
                  </form>
                </div>
                <div class="card-footer text-center pt-0 px-lg-2 px-1">
                  <p class="mb-2 text-sm mx-auto">
                    Já tem uma conta?
                    <a href="login.php" class="font-weight-bold" style="color: #00054ad4;">Fazer Login</a>
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
</body>

</html>