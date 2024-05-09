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
    .label.bolder{
      font-weight: 600;
    }
    
    @media (min-width: 1200px){
      #footer{
        margin-left: 0px !important; 
      }
      .profile-overview .label.bolder{
        text-align: end!important;
      }
    }

    @media (max-width: 1200px){
      .profile-overview .label.bolder{
        text-align: start !important;
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
        <a class="nav-link" href="ver-matriculas.php">
          <i class="bi bi-check-circle"></i>
          <span>Matrículas</span>
        </a>
      </li><!-- End Notification Nav -->

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

    </ul>

  </aside><!-- End Sidebar-->

  <main id="main" class="main p-0">

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
                      <h2>Matrículas</h2>
                      <ul class="bread-list">
                        <li><a href="index.php">Página inicial</a></li>
                        <li><i class="icofont-simple-right"></i></li>
                        <li class="active">Matrículas</li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- End Breadcrumbs -->

            <div class="col-12" style="min-height: 75vh;">
              
              <?php
                $sql = "SELECT * FROM matricula_medio WHERE id_est = $id ORDER BY matricula_date DESC";
                $stmt = $pdo->query($sql);
                if ($stmt->rowCount() != 0) {
                    $count = 1; 
                    while ($rowMatriculaM = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    ?>
                      <!-- Sales Card -->
                      <div class="card info-card sales-card m-5 subscription">
                        <div class="card-header p-0 px-3 d-flex justify-content-between align-items-top">
                          <h5 class="card-title"> Matrícula <i class="icofont-simple-right"></i> <span>SUIEA</span></h5>
                          <h5 class="card-title"><span><?php echo $rowMatriculaM['matricula_date']; ?></span></h5>
                        </div>
  
                        <div class="card-body p-3">
                          <div class="row d-flex align-items-justify justify-content-between px-3 subscription-inner">
                            
                            <div class="col-md-9 col-12  d-flex justify-content-start align-items-center">
                              <div class="image-content d-flex align-items-center justify-content-start" >
                                <img src="../../storage/instituições/<?=$rowMatriculaM['id_inst'];?>/imagem/<?php
                                $id_inst = $rowMatriculaM['id_inst'];
                                $stmt_inst = $pdo->prepare("SELECT imagem FROM instituicao WHERE id_instituicao = :id_inst");
                                $stmt_inst->bindParam(':id_inst', $id_inst);
                                $stmt_inst->execute();
                                $row_inst = $stmt_inst->fetch(PDO::FETCH_ASSOC);
                                echo $row_inst['imagem'];
                                ?>" alt="" class="w-100" style="border-radius: 4px;">
                              </div>
                              <div class="ps-3 dados align-items-center justify-content-center" style="font-size: 22px !important;">
                                <h6>Instituição: <span><?php 
                                $id_inst = $rowMatriculaM['id_inst']; 
                                $stmt_inst = $pdo->prepare("SELECT nome FROM instituicao WHERE id_instituicao = :id_inst");
                                $stmt_inst->bindParam(':id_inst', $id_inst);
                                $stmt_inst->execute();
                                $row_inst = $stmt_inst->fetch(PDO::FETCH_ASSOC);
                                echo $row_inst['nome'];
                                ?></span></h6>
                                <h6>Curso: <span><?php
                                $id_curso = $rowMatriculaM['id_curso'];
                                $stmt_curso = $pdo->prepare("SELECT nome FROM curso_medio WHERE id = :id_curso");
                                $stmt_curso->bindParam(':id_curso', $id_curso);
                                $stmt_curso->execute();
                                $row_curso = $stmt_curso->fetch(PDO::FETCH_ASSOC);
                                echo $row_curso['nome'];
                                ?></span></h6>
                                <h6>Estado: <span class="text-warning p-1 btn"><?php echo $rowMatriculaM['estado']; ?></span>
                                <h6>Pagamento: <span class="text-warning p-1 btn"><?php echo $rowMatriculaM['pagamento']; ?></span>
                              </div>
                            </div>
  
                            <div class="col-md-3 col-12 d-block align-items-center justify-content-end">
  
                              <button id="<?php echo $rowMatriculaM['id']; ?>" type="button" class="btn btn-primary mt-2 mb-2 w-100" data-bs-toggle="modal" data-bs-target="#ExtralargeModal<?=$rowMatriculaM['id'];?>">
                                Ver Detalhes
                              </button>
  
                            </div>
                          </div>
  
                          <!-- Start Extra Large Modal-->
                          <div class="modal fade" id="ExtralargeModal<?=$rowMatriculaM['id'];?>" tabindex="-1">
                            <div class="modal-dialog modal-xl">
                              <div class="modal-content">
                                <div class="modal-header border-0">
                                  <div class="card-header border-0">
                                    <div class="d-flex align-items-center">
                                      <div class="card-icon rounded-circle d-flex align-items-center justify-content-center" style="border: 1px solid #00054ad4;">
                                        <img src="../assets/img/logo.png" alt="SUIEA" class="w-100 rounded-circle">
                                      </div>
                                      <div class="ps-3">
                                        <h6>Detalhes da Matrícula</h6>
                                        <span class="text-muted small pt-2 ps-1">Data da Matrícula</span>
                                        <span class="text-success small pt-1 fw-bold"><?=$rowMatriculaM['matricula_date'];?></span>
                                      </div>
                                    </div>
                                  </div>
                                  
                                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                  <div class="card-body">
  
                                    <div class="row">
                                      
                                      <div class="col-md-12">
                                        <div class="profile-overview">
  
                                          <h5 class="card-title text-center">Dados do Utilizador</h5>
                                          <?php
                                            $id_user = $rowMatriculaM['id_est'];
                                            $sql_user = "SELECT * FROM utilizador WHERE id_utilizador = $id_user";
                                            $stmt_user = $pdo -> query($sql_user);
                                            if($row_user = $stmt_user -> fetch(PDO::FETCH_ASSOC)){
                                          ?>
                                          <div class="row mb-3 px-2">
                                            <div class="col-lg-6 col-md-6 label bolder  ">Nome Completo</div>
                                            <div class="col-lg-6 col-md-6 conteudo"><?=$row_user['nome'];?></div>
                                          </div>
  
                                          <div class="row mb-3 px-2">
                                            <div class="col-lg-6 col-md-6 label bolder ">Gênero</div>
                                            <div class="col-lg-6 col-md-6 conteudo"><?=$row_user['genero'];?></div>
                                          </div>
  
                                          <div class="row mb-3 px-2">
                                            <div class="col-lg-6 col-md-6 label bolder ">Nascimento</div>
                                            <div class="col-lg-6 col-md-6 conteudo"><?=$row_user['nascimento'];?></div>
                                          </div>
  
                                          <div class="row mb-3 px-2">
                                            <div class="col-lg-6 col-md-6 label bolder ">Telefone</div>
                                            <div class="col-lg-6 col-md-6 conteudo"><?=$row_user['telefone'];?></div>
                                          </div>
  
                                          <div class="row mb-3 px-2">
                                            <div class="col-lg-6 col-md-6 label bolder ">Email</div>
                                            <div class="col-lg-6 col-md-6 conteudo"><?=$row_user['email'];?></div>
                                          </div>
                                              <?php } ?>
                                        </div>
                                      </div>
                                      <div class="col-md-12">
                                        <div class="profile-overview">
  
                                          <h5 class="card-title text-center">Dados da Instituição</h5>
                                          <?php
                                            $id_inst = $rowMatriculaM['id_inst'];
                                            $sql_inst = "SELECT * FROM instituicao WHERE id_instituicao = $id_inst";
                                            $stmt_inst = $pdo -> query($sql_inst);
                                            if($row_inst = $stmt_inst -> fetch(PDO::FETCH_ASSOC)){
                                          ?>
                                          <div class="row mb-3 px-2">
                                            <div class="col-lg-6 col-md-6 label bolder  ">Nome</div>
                                            <div class="col-lg-6 col-md-6 conteudo"><?=$row_inst['nome'];?></div>
                                          </div>
  
                                          <div class="row mb-3 px-2">
                                            <div class="col-lg-6 col-md-6 label bolder ">Área de Ensino</div>
                                            <div class="col-lg-6 col-md-6 conteudo"><?=$row_inst['area'];?></div>
                                          </div>
  
                                          <div class="row mb-3 px-2">
                                            <div class="col-lg-6 col-md-6 label bolder ">Tipo de Instituição</div>
                                            <div class="col-lg-6 col-md-6 conteudo"><?=$row_inst['tipo'];?></div>
                                          </div>
  
                                          <div class="row mb-3 px-2">
                                            <div class="col-lg-6 col-md-6 label bolder ">Telefone</div>
                                            <div class="col-lg-6 col-md-6 conteudo"><?=$row_inst['telefone'];?></div>
                                          </div>
  
                                          <div class="row mb-3 px-2">
                                            <div class="col-lg-6 col-md-6 label bolder ">Email</div>
                                            <div class="col-lg-6 col-md-6 conteudo"><?=$row_inst['email'];?></div>
                                          </div>
                                              <?php } ?>
  
                                        </div>
                                      </div>
                                      <div class="col-12"><div class="profile-overview">
  
                                        <h5 class="card-title text-center">Dados da Inscrição</h5>
                                          
                                        <div class="row mb-3 px-2">
                                          <div class="col-lg-6 col-md-6 label bolder  ">Processo nº</div>
                                          <div class="col-lg-6 col-md-6 conteudo"><?=$rowMatriculaM['id'];?></div>
                                        </div>
  
                                        <div class="row mb-3 px-2">
                                          <div class="col-lg-6 col-md-6 label bolder ">Estado</div>
                                          <div class="col-lg-6 col-md-6 conteudo"><?=$rowMatriculaM['estado'];?></div>
                                        </div>
  
                                        <div class="row mb-3 px-2">
                                          <div class="col-lg-6 col-md-6 label bolder ">Pagamento</div>
                                          <div class="col-lg-6 col-md-6 conteudo"><?=$rowMatriculaM['pagamento'];?></div>
                                        </div>
  
                                      </div>
  
                                      </div>
                                    </div>
  
                                  </div>
                                </div>
                                <?php $areay = ($row_inst['area'] === 'Ensino Médio') ? 'EnsinoMedio' : 'EnsinoSuperior'; ?>
                                <div class="modal-footer border-0">
                                  <button type="button" class="btn btn-primary" onclick="window.location.href='ficha-matricula.php?mark=<?=$rowMatriculaM['id'];?>&user=<?=$rowMatriculaM['id_est'];?>&area=<?=$areay; ?>'">Descarregar pdf</button>
                                  <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Fechar</button>
                                </div>
                              </div>
                            </div>
                          </div><!-- End Extra Large Modal-->
  
                        </div>
  
                      </div><!-- End Sales Card -->
                      
                    <?php      
                    $count++;
                  }?>
                  <?php
                }
              ?>
                            
              <?php
                $sql = "SELECT * FROM matricula_superior WHERE id_est = $id ORDER BY matricula_date DESC";
                $stmt = $pdo->query($sql);
                if ($stmt->rowCount() != 0) {
                    $count = 1; 
                    while ($rowMatricula = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    ?>
                      <!-- Sales Card -->
                      <div class="card info-card sales-card m-5 subscription">
                        <div class="card-header p-0 px-3 d-flex justify-content-between align-items-top">
                          <h5 class="card-title"> Matrícula <i class="bi bi-arrow-right"></i> <span>SUIEA</span></h5>
                          <h5 class="card-title"><span><?php echo $rowMatricula['matricula_date']; ?></span></h5>
                        </div>
  
                        <div class="card-body p-3">
                          <div class="row d-flex align-items-justify justify-content-between px-3 subscription-inner">
                            
                            <div class="col-md-9 col-12  d-flex justify-content-start align-items-center">
                              <div class="image-content d-flex align-items-center justify-content-start" >
                                <img src="../../storage/instituições/<?=$rowMatricula['id_inst'];?>/imagem/<?php
                                $id_inst = $rowMatricula['id_inst'];
                                $stmt_inst = $pdo->prepare("SELECT imagem FROM instituicao WHERE id_instituicao = :id_inst");
                                $stmt_inst->bindParam(':id_inst', $id_inst);
                                $stmt_inst->execute();
                                $row_inst = $stmt_inst->fetch(PDO::FETCH_ASSOC);
                                echo $row_inst['imagem'];
                                ?>" alt="" class=" w-100" style="border-radius: 4px;">
                              </div>
                              <div class="ps-3 dados align-items-center justify-content-center" style="font-size: 22px !important;">
                                <h6>Instituição: <span><?php 
                                $id_inst = $rowMatricula['id_inst']; 
                                $stmt_inst = $pdo->prepare("SELECT nome FROM instituicao WHERE id_instituicao = :id_inst");
                                $stmt_inst->bindParam(':id_inst', $id_inst);
                                $stmt_inst->execute();
                                $row_inst = $stmt_inst->fetch(PDO::FETCH_ASSOC);
                                echo $row_inst['nome'];
                                ?></span></h6>
                                <h6>Curso: <span><?php 
                                $id_curso = $rowMatricula['id_curso'];
                                $stmt_curso = $pdo->prepare("SELECT nome FROM curso_superior WHERE id = :id_curso");
                                $stmt_curso->bindParam(':id_curso', $id_curso);
                                $stmt_curso->execute();
                                $row_curso = $stmt_curso->fetch(PDO::FETCH_ASSOC);
                                echo $row_curso['nome'];
                                ?></span></h6>
                                <h6>Estado: <span class="text-warning p-1 btn"><?php echo $rowMatricula['estado']; ?></span>
                                <h6>Pagamento: <span class="text-warning btn"><?php echo $rowMatricula['pagamento']; ?></span>
                              </div>
                            </div>
  
                            <div class="col-md-3 col-12 d-block align-items-center justify-content-end">
  
                              <button id="<?php echo $rowMatricula['id']; ?>" type="button" class="btn btn-primary mt-2 mb-2 w-100" data-bs-toggle="modal" data-bs-target="#ExtralargeModal2<?=$rowMatricula['id'];?>">
                                Ver Detalhes
                              </button>
  
                            </div>
                          </div>
  
                          <!-- Start Extra Large Modal-->
                          <div class="modal fade" id="ExtralargeModal2<?=$rowMatricula['id'];?>" tabindex="-1">
                                <div class="modal-dialog modal-xl">
                                  <div class="modal-content">
                                    <div class="modal-header border-0">
                                      <div class="card-header border-0">
                                        <div class="d-flex align-items-center">
                                          <div class="card-icon rounded-circle d-flex align-items-center justify-content-center" style="border: 1px solid #00054ad4;">
                                            <img src="../assets/img/logo.png" alt="SUIEA" class="w-100 rounded-circle">
                                          </div>
                                          <div class="ps-3">
                                            <h6>Detalhes da Matrícula</h6>
                                            <span class="text-muted small pt-2 ps-1">Data da Matrícula</span>
                                            <span class="text-success small pt-1 fw-bold"><?=$rowMatricula['matricula_date'];?></span>
                                          </div>
                                        </div>
                                      </div>
                                      
                                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                      <div class="card-body">
  
                                        <div class="row">
                                          
                                          <div class="col-md-12">
                                            <div class="profile-overview">
  
                                              <h5 class="card-title text-center">Dados do Utilizador</h5>
                                              <?php
                                                $id_user = $rowMatricula['id_est'];
                                                $sql_user = "SELECT * FROM utilizador WHERE id_utilizador = $id_user";
                                                $stmt_user = $pdo -> query($sql_user);
                                                if($row_user = $stmt_user -> fetch(PDO::FETCH_ASSOC)){
                                              ?>
                                              <div class="row mb-3 px-2">
                                                <div class="col-lg-6 col-md-6 label bolder  ">Nome Completo</div>
                                                <div class="col-lg-6 col-md-6 conteudo"><?=$row_user['nome'];?></div>
                                              </div>
  
                                              <div class="row mb-3 px-2">
                                                <div class="col-lg-6 col-md-6 label bolder ">Gênero</div>
                                                <div class="col-lg-6 col-md-6 conteudo"><?=$row_user['genero'];?></div>
                                              </div>
  
                                              <div class="row mb-3 px-2">
                                                <div class="col-lg-6 col-md-6 label bolder ">Nascimento</div>
                                                <div class="col-lg-6 col-md-6 conteudo"><?=$row_user['nascimento'];?></div>
                                              </div>
  
                                              <div class="row mb-3 px-2">
                                                <div class="col-lg-6 col-md-6 label bolder ">Telefone</div>
                                                <div class="col-lg-6 col-md-6 conteudo"><?=$row_user['telefone'];?></div>
                                              </div>
  
                                              <div class="row mb-3 px-2">
                                                <div class="col-lg-6 col-md-6 label bolder ">Email</div>
                                                <div class="col-lg-6 col-md-6 conteudo"><?=$row_user['email'];?></div>
                                              </div>
                                                  <?php } ?>
                                            </div>
                                          </div>
                                          <div class="col-md-12">
                                            <div class="profile-overview">
  
                                              <h5 class="card-title text-center">Dados da Instituição</h5>
                                              <?php
                                                $id_inst = $rowMatricula['id_inst'];
                                                $sql_inst = "SELECT * FROM instituicao WHERE id_instituicao = $id_inst";
                                                $stmt_inst = $pdo -> query($sql_inst);
                                                if($row_inst = $stmt_inst -> fetch(PDO::FETCH_ASSOC)){
                                              ?>
                                              <div class="row mb-3 px-2">
                                                <div class="col-lg-6 col-md-6 label bolder  ">Nome</div>
                                                <div class="col-lg-6 col-md-6 conteudo"><?=$row_inst['nome'];?></div>
                                              </div>
  
                                              <div class="row mb-3 px-2">
                                                <div class="col-lg-6 col-md-6 label bolder ">Área de Ensino</div>
                                                <div class="col-lg-6 col-md-6 conteudo"><?=$row_inst['area'];?></div>
                                              </div>
  
                                              <div class="row mb-3 px-2">
                                                <div class="col-lg-6 col-md-6 label bolder ">Tipo de Instituição</div>
                                                <div class="col-lg-6 col-md-6 conteudo"><?=$row_inst['tipo'];?></div>
                                              </div>
  
                                              <div class="row mb-3 px-2">
                                                <div class="col-lg-6 col-md-6 label bolder ">Telefone</div>
                                                <div class="col-lg-6 col-md-6 conteudo"><?=$row_inst['telefone'];?></div>
                                              </div>
  
                                              <div class="row mb-3 px-2">
                                                <div class="col-lg-6 col-md-6 label bolder ">Email</div>
                                                <div class="col-lg-6 col-md-6 conteudo"><?=$row_inst['email'];?></div>
                                              </div>
                                                  <?php } ?>
  
                                            </div>
                                          </div>
                                          <div class="col-12"><div class="profile-overview">
  
                                            <h5 class="card-title text-center">Dados da Inscrição</h5>
                                              
                                            <div class="row mb-3 px-2">
                                              <div class="col-lg-6 col-md-6 label bolder  ">Processo nº</div>
                                              <div class="col-lg-6 col-md-6 conteudo"><?=$rowMatricula['id'];?></div>
                                            </div>
  
                                            <div class="row mb-3 px-2">
                                              <div class="col-lg-6 col-md-6 label bolder ">Estado</div>
                                              <div class="col-lg-6 col-md-6 conteudo"><?=$rowMatricula['estado'];?></div>
                                            </div>
  
                                            <div class="row mb-3 px-2">
                                              <div class="col-lg-6 col-md-6 label bolder ">Pagamento</div>
                                              <div class="col-lg-6 col-md-6 conteudo"><?=$rowMatricula['pagamento'];?></div>
                                            </div>
  
                                          </div>
  
                                          </div>
                                        </div>
  
                                      </div>
                                    </div>
                                    <?php $areax = ($row_inst['area'] === 'Ensino Médio') ? 'EnsinoMedio' : 'EnsinoSuperior'; ?>
                                    <div class="modal-footer border-0">
                                      <button type="button" class="btn btn-primary" onclick="window.location.href='ficha-matricula.php?mark=<?=$rowMatricula['id'];?>&user=<?=$rowMatricula['id_est'];?>&area=<?=$areax; ?>'">Descarregar pdf</button>
                                      <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Fechar</button>
                                    </div>
                                  </div>
                                </div>
                          </div><!-- End Extra Large Modal-->
  
                        </div>
  
                      </div><!-- End Sales Card -->
                      
                    <?php      
                    $count++;
                  }?>
                <?php
                }
                
  
                $sql_super = "SELECT * FROM matricula_superior WHERE id_est = $id";
                $stmt_super = $pdo->query($sql_super);
                $sql_med = "SELECT * FROM matricula_medio WHERE id_est = $id";
                $stmt_med = $pdo->query($sql_med);
                if (($stmt_super->rowCount() == 0) && ($stmt_med->rowCount() == 0)){?>
                  <div class="d-flex justify-content-center align-items-center p-5" style="height: 700px;">
                    <h5 class="text-center">Ainda não tens matrículas feitas!</h5>
                  </div>
                <?php
                }
              ?>
              
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