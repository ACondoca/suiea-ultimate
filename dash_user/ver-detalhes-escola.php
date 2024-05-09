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
  
  if(isset($_GET['id'])){
    $id_inst = $_GET['id'];
    $sql = "SELECT * FROM instituicao WHERE id_instituicao = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(":id", $id_inst, PDO::PARAM_INT);
    $stmt->execute();
    if ($stmt->rowCount() != 0) {
      $count = 1; 
      while ($rowInst = $stmt->fetch(PDO::FETCH_ASSOC)) {
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

  <!-- Google Fonts -->
  <link href="../https://fonts.gstatic.com" rel="preconnect">
  <link href="../https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="../assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="../assets/vendor/quill/quill.bubble.css" rel="stylesheet">

  <!-- Template icofont CSS -->
  <link rel="stylesheet" href="../../css/icofont.css">
  <link rel="stylesheet" href="../../fonts/icofont.eot">
  <link rel="stylesheet" href="../../fonts/icofont.ttf">
  <link rel="stylesheet" href="../../fonts/icofont.woff">

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
  
  <?php include_once "../component/header_user.php"; ?>

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

    </ul>

  </aside><!-- End Sidebar-->

  <main id="main" class="main p-0">

    <section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-12">
          <div class="row">

            <div class="col-12">

              <!-- Single News -->
              <section class="news-single section pt-0">
                <div class="container">
                <div class="row">
                  <div class="col-lg-8 col-12">
                  <div class="row">
                    <div class="col-12">
                    <div class="single-main">
                      <!-- News Head -->
                      <div class="news-head position-relative">
                      <img src="../../storage/instituições/<?php echo($rowInst['id_instituicao']); ?>/imagem/<?php echo($rowInst['imagem']); ?>" alt="">
                      </div>
        
                      <!-- News Title -->
                      <h1 class="news-title about-institution  d-flex align-items-center justify-content-between school" >
                          <a href="#"><?php echo($rowInst["nome"]) ?> - <?php echo($rowInst["sigla"]) ?></a>
                          <a class="inscrever btn btn-primary" style="font-size: 16px;" href="form-inscricao.php?instituicaoId=<?php echo $rowInst['id_instituicao'];?>&utilizadorId=<?php echo $_SESSION['id'];?>&utilizador=<?php echo $_SESSION['nome'];?>&instituicao=<?php echo $rowInst['nome'];?>&bi=<?php echo $_SESSION['n_bi'];?>&area=<?php echo $rowInst['area'];?>&taged=782hdesdeewnstrdtrtddndtcftgb">Fazer Inscrição</a>
                      </h1>
                      <!-- Meta -->
                      <div class="meta d-flex w-100 justify-content-between align-items-center pt-3 pb-3">
                      <div class="meta-left">
                        <span class="date"><i class="icofont icofont-phone">(+244) </i><span><?php echo($rowInst["telefone"]) ?> </span></span>
                      </div>
                      <div class="meta-right">
                        <span class="date"><i class="icofont icofont-email"></i> <span><?php echo($rowInst["email"]) ?> </span></span>
                      </div>
                      </div>
                      <!-- News Text -->
                      <div class="news-text">
                      <p class="mt-5 mb-5"><?php echo $rowInst["resumo"]; ?> </p>
                      </div>
                    </div>
                    </div>
                  </div>
                  </div>
                  <div class="col-lg-4 col-12">
                  <div class="main-sidebar">
        
                    <!-- Single Widget -->
                    <div class="single-widget category" style="margin-top: 30px;">
                    <h3 class="title"><span>Total de Vagas</span></h3>
                    <ul class="categor-list">
                      <li><div><i class="icofont icofont-ui-check"></i> <span>
                        <?php 
                        if($rowInst["vagas"] == NULL){
                          echo "Sem";
                        }else{
                          echo $rowInst["vagas"];
                        }
                      ?> </span> Vagas</div></li>
                    </ul>
                    </div>
                    <!--/ End Single Widget -->
        
                    <!-- Single Widget -->
                    <div class="single-widget category" style="margin-top: 30px;">
                    <h3 class="title"><span>Informação Útil</span></h3>
                    <ul class="categor-list">
                      <li><div><i class="icofont icofont-google-map"></i><span> <?php echo($rowInst["localizacao"]) ?> </span></div></li>
                      <li><div><i class="icofont icofont-wall-clock"></i><span> <?php echo($rowInst["tipo"]) ?> </span></div></li>
                      <li><div><i class="icofont icofont-email" aria-hidden="true"></i><span> <?php echo($rowInst["area"]) ?> </span></div></li>
                    </ul>
                    </div>
                    <!--/ End Single Widget -->
        
                    <!-- Single Widget -->
                    <div class="single-widget category" style="margin-top: 30px;">
                    <h3 class="title"><span>Cursos administrados</span></h3>
                    <ul class="categor-list">
                      <?php
                        if($rowInst['area'] == "Ensino Médio"){
                          $identificador = $rowInst['id_instituicao'];
                          $sql = "SELECT curso_medio.nome FROM curso_medio INNER JOIN instituicao ON curso_medio.id_inst = instituicao.id_instituicao WHERE instituicao.id_instituicao = :id";
                          $stmt = $pdo->prepare($sql);
                          $stmt -> bindParam(':id', $identificador);
                          $stmt->execute();
                          if ($stmt->rowCount() != 0) {
                            $count = 1; 
                            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                            ?><li><div><i class="icofont icofont-ui-check"></i> <span><?php echo $row["nome"]; ?></span></div></li><?php
                            }
                          }
                        }else{
                          $identificador = $rowInst['id_instituicao'];
                          $sql = "SELECT curso_superior.nome FROM curso_superior INNER JOIN instituicao ON curso_superior.id_inst = instituicao.id_instituicao WHERE instituicao.id_instituicao = :id";
                          $stmt = $pdo->prepare($sql);
                          $stmt -> bindParam(':id', $identificador);
                          $stmt->execute();
                          if ($stmt->rowCount() != 0) {
                            $count = 1; 
                            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                            ?><li><div><i class="icofont icofont-ui-check"></i> <span><?php echo $row["nome"]; ?></span></div></li><?php
                            }
                          }
                        }
                      ?>
                        </ul>
                    </div>
                    <!--/ End Single Widget -->
        
                  </div>
                  </div>
                  <div class="col-lg-8 col-12 mt-5">
                  <div class="main-sidebar">
                    <!-- Single Widget -->
                    <div class="single-widget category">
                    <h3 class="title"><span>Cursos administrados</span></h3>
        
                    <section>
                      <div class="slick-cursos" style="padding-inline: 30px;">

                      <?php
                        if($rowInst['area'] == "Ensino Médio"){
                          $identificador = $rowInst['id_instituicao'];
                          $sql = "SELECT curso_medio.nome, curso_medio.vagas, curso_medio.inscricao_val, curso_medio.matricula_val, curso_medio.descricao, curso_medio.id, curso_medio.imagem FROM curso_medio INNER JOIN instituicao ON curso_medio.id_inst = instituicao.id_instituicao WHERE instituicao.id_instituicao = :id";
                          $stmt = $pdo->prepare($sql);
                          $stmt -> bindParam(':id', $identificador);
                          
                          $stmt->execute();
                            if ($stmt->rowCount() != 0) {
                              $count = 1; 
                              while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                              ?>
                                <div class="row">
                                    <div class="col-12">
                                      <ul class="categor-list cursos mt-5">
                                        <div class="row">
                                        <div class="col-12 mb-3">
                                          <li>
                                          <div class="d-flex align-items-center justify-content-start">
                                            <i class="icofont icofont-ui-check"></i><h6 class="title-two"><span><?php echo $row["nome"]; ?></span></h6>
                                          </div>
                                          </li>
                                        </div>
                      
                                        <div class="col-lg-4 mb-3 col-12">
                                          <img src="<?php echo $row['imagem']; ?>" class="w-100 h-100" alt="">
                                        </div>
                                        
                                        <div class="col-lg-8 col-12">
                                          <ul>
                                          <li>
                                            <div class="" style="text-align: justify!important;">
                                            <span class="desc-curso">
                                            <?php echo $row["descricao"]; ?>
                                            </span>
                                            </div>
                                          </li>
                                          <li>
                                            <div class="bill">
                                            Número de vagas: <span><?php echo $row["vagas"]; ?></span> Vagas
                                            </div>
                                          </li>
                                          <li>
                                            <div class="bill">
                                            Taxa de Inscrição: <span><?php echo $row["inscricao_val"]; ?></span> kz
                                            </div>
                                          </li>
                                          <li>
                                            <div class="bill">
                                            Taxa de Matrícula: <span><?php echo $row["matricula_val"]; ?></span> kz
                                            </div>
                                          </li>
                                          </ul>
                                        </div>
                      
                                        </div>
                      
                                      </ul>
                                    </div>
                                </div>
                                <?php
                              }
                            }
                        }else{
                          $identificador = $rowInst['id_instituicao'];
                          $sql = "SELECT curso_superior.nome, curso_superior.vagas, curso_superior.inscricao_val, curso_superior.matricula_val, curso_superior.descricao, curso_superior.id, curso_superior.imagem FROM curso_superior INNER JOIN instituicao ON curso_superior.id_inst = instituicao.id_instituicao WHERE instituicao.id_instituicao = :id";
                          $stmt = $pdo->prepare($sql);
                          $stmt -> bindParam(':id', $identificador);

                          $stmt->execute();
                          if ($stmt->rowCount() != 0) {
                            $count = 1; 
                            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                              ?>
                                <div class="row">
                                    <div class="col-12">
                                      <ul class="categor-list cursos mt-5">
                                        <div class="row">
                                        <div class="col-12 mb-3">
                                          <li>
                                          <div class="d-flex align-items-center justify-content-start">
                                            <i class="icofont icofont-ui-check"></i><h6 class="title-two"><span><?php echo $row["nome"]; ?></span></h6>
                                          </div>
                                          </li>
                                        </div>
                      
                                        <div class="col-lg-4 mb-3 col-12">
                                          <img src="<?php echo $row['imagem']; ?>" class="w-100 h-100" alt="">
                                        </div>
                                        
                                        <div class="col-lg-8 col-12">
                                          <ul>
                                          <li>
                                            <div class="" style="text-align: justify!important;">
                                            <span class="desc-curso">
                                            <?php echo $row["descricao"]; ?>
                                            </span>
                                            </div>
                                          </li>
                                          <li>
                                            <div class="bill">
                                            Número de vagas: <span><?php echo $row["vagas"]; ?></span> Vagas
                                            </div>
                                          </li>
                                          <li>
                                            <div class="bill">
                                            Taxa de Inscrição: <span><?php echo $row["inscricao_val"]; ?></span> kz
                                            </div>
                                          </li>
                                          <li>
                                            <div class="bill">
                                            Taxa de Matrícula: <span><?php echo $row["matricula_val"]; ?></span> kz
                                            </div>
                                          </li>
                                          </ul>
                                        </div>
                      
                                        </div>
                      
                                      </ul>
                                    </div>
                                </div>
                              <?php
                            }
                          }
                        }
                        ?>
                      </div>
                    </section>
                    
                    </div>
                    <!--/ End Single Widget -->
                  </div>
                  </div>
                </div>
                </div>
              </section>
              <!--/ End Single News -->

              <!-- Start Portfolio Details Area -->
              <section class="pf-details section pt-5" style="background: #fff !important;">
                <div class="container">
                  <div class="row">
                    <div class="col-12">
                      <div class="body-text instituicao">
                        <h3 class="mb-5 text-center mb-5">Veja mais Instituições de ensino</h3>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="container-fluid">
                  <div class="row p-3">
                    <div class="col-12 p-3">
                      <div class="school-slick">
                
                        <?php

                          $sql = "SELECT * FROM instituicao";
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
                            <h4>Localização <div><?php echo($row["localizacao"]) ?></div> <?php echo($row["tipo"]) ?> </h4>
                            <p>
                            <?php echo($row["resumo"]) ?> 
                            </p>
                            <div class="btns d-flex align-items-center justify-content-center">
                            <button class="welcome-hero-btn how-work-btn" onclick="window.location.href='ver-detalhes-escola.php?id=<?php echo($row['id_instituicao']); ?>&taged=kkbdbqw365ve17265cfbftb'">
                              Ver Mais
                            </button>
                            </div>
                          </div>
                          </div>
                          <?php      
                          $count++;
                          }
                          }
                        ?>
    
                      </div>
                    </div>
                  </div>
                  
                </div>

              </section>
              <!-- End Portfolio Details Area -->

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
<?php
      }
    }
  }
?>