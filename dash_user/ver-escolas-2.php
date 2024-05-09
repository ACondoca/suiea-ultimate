<?php
  include_once "../../model/session.php";
  include_once "../../model/conexao.php";
  
  if(isset($_SESSION['id'])){
    $id = $_SESSION['id'];
    $imagem = $_SESSION['avatar'];

    $avatar = "../../storage/usuarios/$id/imagem/$imagem";
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
		
  <!-- Slick Theme -->
  <link rel="stylesheet" href="../assets/css/slick.css">
  <link rel="stylesheet" href="../assets/css/slick-theme.css">

  <!-- Vendor CSS Files -->
  <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="../assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="../assets/vendor/quill/quill.bubble.css" rel="stylesheet">

  <!-- Template icofont CSS -->
  <link rel="stylesheet" href="../../assets/css/icofont.css">
  <link rel="stylesheet" href="../../assets/fonts/icofont.eot">
  <link rel="stylesheet" href="../../assets/fonts/icofont.ttf">
  <link rel="stylesheet" href="../../assets/fonts/icofont.woff">

  <!-- Template Main CSS File -->
  <link href="../assets/css/style.css" rel="stylesheet">

  <style>
  
    /*=========================
      Start Footer CSS
    ===========================*/
    .section-footer{
      background: #00054ad4;
    }
    .footer{
      position:relative;
      padding: 0px !important;
    }
    .footer .footer-top{
      padding:100px 0px;
      position:relative;
      background:transparent;
    }
    .footer .footer-top:before{
      position:absolute;
      content:"";
      left:0;
      top:0;
      height:100%;
      width:100%;
      opacity:0.1;
    }
    .footer .single-footer .social{
      margin-top:25px;
    }
    .footer .single-footer .social li{
      display:inline-block;
      margin-right:10px;
    }
    .footer .single-footer .social li:last-child{
      margin-right:0px;
    }
    .footer .single-footer .social li a {
      height: 34px;
      width: 34px;
      line-height: 34px;
      text-align: center;
      border: 1px solid #fff;
      text-align: center;
      padding: 0;
      border-radius: 100%;
      display: block;
      color:#fff;
      font-size: 16px;
    }
    .footer .single-footer .social li a:hover{
      color:#00054ad4;
      background:#fff;
      border-color:transparent;
    }
    .footer .single-footer.f-link li a i{
      margin-right:10px;
    }
    .footer .single-footer.f-link li{
      display:block;
      margin-bottom:12px;
    }
    .footer .single-footer.f-link li:last-child{
      margin:0;
    }
    .footer .single-footer.f-link li a {
      display: block;
      color: #fff;
      text-transform: capitalize;
      -webkit-transition: all 0.4s ease;
      -moz-transition: all 0.4s ease;
      transition: all 0.4s ease;
      font-weight: 400;
    }
    .footer .single-footer.f-link li a:hover{
      padding-left:8px;
    }
    .footer .single-footer h2{
      color:#fff;
      font-size:20px;
      font-weight:600;
      text-transform:capitalize;
      margin-bottom:40px;
      padding-bottom:20px;
      text-transform:capitalize;
      position:relative;
    }
    .footer .single-footer h2::before{
      position: absolute;
      content: "";
      left: 0;
      bottom: 0px;
      height: 3px;
      width: 50px;
      background: #fff;
    }
    .footer .single-footer .time-sidual{
      margin-top:15px;
    }
    .footer .single-footer .time-sidual{
      overflow:hidden;
    }
    .footer .single-footer .time-sidual li {
      display: block;
      color: #fff;
      width: 100%;
      margin-bottom: 5px;
    }
    .footer .single-footer .time-sidual li span{
      /**display:inline-block;**/
      float:right;
    }
    .footer .single-footer .day-head .time {
      font-weight: 400;
      float: right;
    }
    .footer .single-footer p{
      color:#fff;
    }
    .footer .single-footer .newsletter-inner{
      margin-top:20px;
      position:relative;
    }
    .footer .single-footer .newsletter-inner input {
      background: transparent;
      border: 1px solid #fff;
      height: 50px;
      line-height: 42px;
      width: 100%;
      margin-right: 15px;
      color: #fff;
      padding-left: 18px;
      padding-right: 70px;
      /**display: inline-block;**/
      float: left;
      border-radius: 0px;
      -webkit-transition: all 0.4s ease;
      -moz-transition: all 0.4s ease;
      transition: all 0.4s ease;
      font-weight: 400;
      border-radius: 5px;
    }
    .footer .single-footer .newsletter-inner input:hover{
      padding-left: 22px;
    }
    .footer input::-webkit-input-placeholder {
        opacity: 1;
        color: #fff !important;
    }
    
    .footer input::-moz-placeholder {
        opacity: 1;
        color: #fff !important;
    }
    
    .footer input::-ms-input-placeholder {
        opacity: 1;
        color: #fff !important;
    }
    .footer input::input-placeholder {
        opacity: 1;
        color: #fff !important;
    }
    .footer .single-footer .newsletter-inner .button {
      position: absolute;
      right: 0;
      top: 0;
      height: 50px;
      line-height: 50px;
      width: 50px;
      background: #fff;
      border-left: 1px solid #fff;
      text-shadow: none;
      box-shadow: none;
      display: inline-block;
      border-radius: 0px;
      border: none;
      -webkit-transition: all 0.4s ease;
      -moz-transition: all 0.4s ease;
      transition: all 0.4s ease;
      border-radius: 0 5px 5px 0;
      color: #00054ad4;
      font-size: 25px;
    }
    .footer .single-footer .newsletter-inner .button i{
      -webkit-transition:all 0.4s ease;
      -moz-transition:all 0.4s ease;
      transition:all 0.4s ease;
    }
    .footer .single-footer .newsletter-inner .button:hover i{
      color:#2C2D3F;
    }
    .footer .copyright{
      padding:25px 0px 25px 0px;
      text-align:center;
    }
    .footer .copyright .copyright-content p{
      color:#fff;
    }
    .footer .copyright .copyright-content p a{
      color:#fff;
      font-weight:400;
      text-decoration:underline;
      display:inline-block;
      margin-left:4px;
    }
    /*=========================
      End Footer CSS
    ===========================*/
    .paginacao .pagina{
      display: grid;
      grid-template-columns: repeat(3,1fr);
      padding: 25px 15px;
      gap: 20px;
    }
    @media (min-width: 1200px){
      #footer{
        margin-left: 0px !important; 
      }
    }

    @media only screen and (max-width: 768px){
      .paginacao .pagina{
        display: grid;
        grid-template-columns: repeat(2,1fr);
        padding: 15px 10px;
        gap: 20px;
      }
    }

    @media only screen and (max-width: 650px){
      .paginacao .pagina{
        display: grid;
        grid-template-columns: repeat(1,1fr);
        padding: 15px 10px;
        gap: 20px;
      }
    }

    @media (max-width: 991px){
      .footer .single-footer h2{
          margin: 40px 0 !important;
      }
    }

  </style>

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
  
  <?php include_once "../component/header_user.php";?>


  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link collapsed" href="index.php">
          <i class="bi bi-house"></i>
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
          <i class="bi bi-check-circle"></i>
          <span>Matrículas</span>
        </a>
      </li><!-- End Notification Nav -->

      <li class="nav-item">
        <a class="nav-link" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-building"></i><span>Instituições</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="tables-nav" class="nav-content collapse show" data-bs-parent="#sidebar-nav">
          <li>
            <a href="ver-escolas-1.php">
              <i class="bi bi-circle"></i><span>Ensino Médio</span>
            </a>
          </li>
          <li>
            <a href="ver-escolas-2.php" class="active">
              <i class="bi bi-circle"></i><span>Ensino Superior</span>
            </a>
          </li>
        </ul>
      </li><!-- End Instituitions Nav -->

    </ul>

  </aside><!-- End Sidebar-->

  <main id="main" class="main p-0">

    <section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-12">
          <div class="row">

            <!-- Breadcrumbs -->
            <div class="breadcrumbs overlay" id="home-student">
              <div class="container">
                <div class="bread-inner">
                  <div class="row">
                    <div class="col-12">
                      <h2>Instituições</h2>
                      <ul class="bread-list">
                        <li class="active">Instituições</li>
                        <li><i class="icofont-simple-right"></i></li>
                        <li class="active">Ensino Superior</li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- End Breadcrumbs -->

            <div class="col-12 bg-white">

              <!-- Start Schools Area -->
              <div class="blog-content">
                <div class="row mb-5">
                  <div class="col-lg-12">
                    <div class="section-title text-center">
                      <h2>Instituições do <span id="tipo_instituicao">Ensino Superior</span></h2>
                      <img src="../../assets/img/section-img.png" alt="#">
                      <p style="color: #757575;">Explore a lista abrangente de instituições educacionais disponíveis em nosso sistema, oferecendo diversas opções para aprimorar o aprendizado e o desenvolvimento académico em todo o país...</p>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="container-fluid">

                    <section>
                      <div class="school-slick">
                
                      <?php

                        $sql = "SELECT * FROM instituicao INNER JOIN inst_superior ON instituicao.id_instituicao = inst_superior.id WHERE estado = 'Aprovada' LIMIT 12";
                        $stmt = $pdo->prepare($sql);
                        $stmt->execute();
                        if ($stmt->rowCount() != 0) {
                        $count = 1; 
                        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

                        ?>

                        <div class="single-blog-item">
                        <div class="single-blog-item-img">
                          <img src="../../storage/instituições/<?php echo($row['id_instituicao']); ?>/imagem/<?php echo($row['imagem']); ?>" alt="">
                        </div>
                        <div class="single-blog-item-txt">
                          <h2><div><?php echo($row["nome"]) ?> - <?php echo($row["sigla"]) ?></div></h2>
                          <h4><div><?php echo($row["localizacao"]) ?></div> <?php echo($row["tipo"]) ?> </h4>
                          <p>
                          <?php echo($row["resumo"]) ?> 
                          </p>
                          <div class="btns d-flex align-items-center justify-content-center">
                          <button class="welcome-hero-btn how-work-btn" onclick="window.location.href='ver-detalhes-escola.php?id=<?php echo $row['id_instituicao'];?>&taged=kasbfcnydbaebasweyv'">
                            Ver Mais
                          </button>
                          </div>
                        </div>
                        </div>
                        <?php      
                        $count++;
                        }
                        }else{
                          ?>
                          <section>
                            <div class="d-flex justify-content-center align-items-center"><div class="row">
                              <div class="col-lg-12 mt-5">
                                <div class="section-title mb-0">
                                  <h5 class="text-center">Não alcansamos resultados!</h5>
                                </div>
                                <img src="../../assets/img/addcurso.png" alt="">
                              </div>
                            </div>
                          </section>
                          <?php
                        }
                      ?>

                      </div>
                    </section>
                    
                  </div>
                </div>
                
                <div class="row mt-5 mb-5">
                  <div class="col-lg-12">
                    <div class="section-title mb-0 pt-5 text-center">
                      <h2>Instituições do Ensino Superior mais pesquisadas</h2>
                    </div>
                  </div>
                </div>

                <div class="row mb-5">
                  <div class="container-fluid">

                    <section>
                      <div class="school-slick">
                
                      <?php

                        $sql = "SELECT * FROM instituicao INNER JOIN inst_superior ON instituicao.id_instituicao = inst_superior.id WHERE estado = 'Aprovada' LIMIT 12";
                        $stmt = $pdo->prepare($sql);
                        $stmt->execute();
                        if ($stmt->rowCount() != 0) {
                        $count = 1; 
                        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

                        ?>

                        <div class="single-blog-item">
                        <div class="single-blog-item-img">
                          <img src="../../storage/instituições/<?php echo($row['id_instituicao']); ?>/imagem/<?php echo($row['imagem']); ?>" alt="">
                        </div>
                        <div class="single-blog-item-txt">
                          <h2><div><?php echo($row["nome"]) ?> - <?php echo($row["sigla"]) ?></div></h2>
                          <h4><div><?php echo($row["localizacao"]) ?></div> <?php echo($row["tipo"]) ?> </h4>
                          <p>
                          <?php echo($row["resumo"]) ?> 
                          </p>
                          <div class="btns d-flex align-items-center justify-content-center">
                          <button class="welcome-hero-btn how-work-btn" onclick="window.location.href='ver-detalhes-escola.php?id=<?php echo $row['id_instituicao'];?>&taged=kasbfcnydbaebasweyv'">
                            Ver Mais
                          </button>
                          </div>
                        </div>
                        </div>
                        <?php      
                        $count++;
                        }
                        }else{
                          ?>
                          <section>
                            <div class="d-flex justify-content-center align-items-center"><div class="row">
                              <div class="col-lg-12 mt-5">
                                <div class="section-title mb-0">
                                  <h5 class="text-center">Não alcansamos resultados!</h5>
                                </div>
                                <img src="../../assets/img/addcurso.png" alt="">
                              </div>
                            </div>
                          </section>
                          <?php
                        }
                      ?>

                      </div>
                    </section>
                    
                  </div>
                </div>

                </div>
              </div>
              <!-- End Schools Area -->

            </div>
          
          </div>
        </div>

      </div>
    </section>

    <div class="section-footer">

      <div class="container">
  
        <div class="row-px-5">
            <!-- Footer Area -->
            <footer id="footer" class="footer border-0">
              <!-- Footer Top -->
              <div class="footer-top">
                <div class="container">
                  <div class="row">
                    <div class="col-lg-4 col-md-6 col-12">
                      <div class="single-footer">
                        <h2>Sobre Nós</h2>
                        <p>Somos a equipa por trás do SUIEA - Sistema Unificado de Inscrições Escolares de Angola, Facilitando o caminho para um Futuro Educativo Inclusivo e Promissor.</p>
                      </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-12">
                      <div class="single-footer f-link">
                        <h2>Mapa do site</h2>
                        <div class="row">
                          <div class="col-lg-4 col-md-4 col-12">
                            <ul>
                            <ul>
                              <li><a href="index.php"><i class="icofont-simple-right" aria-hidden="true"></i>Home</a></li>
                              <li><a href="ver-inscricoes.php"><i class="icofont-simple-right" aria-hidden="true"></i>Inscrições</a></li>
                              <li><a href="ver-matriculas.php"><i class="icofont-simple-right" aria-hidden="true"></i>Matrículas</a></li>
                            </ul>
                          </div>
                          <div class="col-lg-8 col-md-8 col-12">
                            <ul>
                              <li><a href="pages-faq.php"><i class="icofont-simple-right" aria-hidden="true"></i>FAQ</a></li>
                              <li><a href="escolas.php?tipo="><i class="icofont-simple-right" aria-hidden="true"></i>Ensino Médio</a></li>
                              <li><a href="escolas.php?tipo="><i class="icofont-simple-right" aria-hidden="true"></i>Ensino Superior</a></li>
                            </ul>
                          </div>	
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-12">
                      <div class="single-footer f-link">
                        <h2>Informação</h2>
                        <div class="row">
                          <div class="col-lg-6 col-md-6 col-12">
                            <ul>
                              <li><a href="#"><i class="icofont icofont-phone " aria-hidden="true"></i>933 333 333</a></li>
                              <li><a href="#"><i class="icofont icofont-phone " aria-hidden="true"></i>922 222 222</a></li>
                              <li><a href="#"><i class="icofont icofont-email" aria-hidden="true"></i>suporte@suiea.com</a></li>
                            </ul>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!--/ End Footer Top -->
              <!-- Copyright -->
              <div class="copyright">
                <div class="container">
                  <div class="row">
                    <div class="col-lg-12 col-md-12 col-12">
                      <div class="copyright-content">
                        <p>© Copyright 2024  |  Todos os direitos reservados por <a href="https://www.suiea.com" target="_blank">www.suiea.com</a> </p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!--/ End Copyright -->
            </footer>
            <!--/ End Footer Area -->
        </div>
  
      </div>
  
    </div>

  </main><!-- End #main -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/vendor/quill/quill.min.js"></script>
  <script src="../assets/vendor/tinymce/tinymce.min.js"></script>

  <!-- Slick JS -->
  <script src="../assets/js/jquery-1.11.0.min.js"></script>
  <script src="../assets/js/jquery.migrate-1.2.1.js"></script>
  <script src="../assets/js/slick.min.js"></script>

  <!-- Template Main JS File -->
  <script src="../assets/js/main.js"></script>

</body>

</html>