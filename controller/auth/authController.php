<!doctype html>
<html lang="eng">
    <head>
		<!-- Title -->
        <title>SUIEA - Acessar sua conta</title>
		
        <!-- Meta Tags -->
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		
		<!-- Favicon -->
        <link rel="stylesheet" href="../../assets/css/style.css">
        <link rel="icon" href="../../assets/img/favicon3.png">
		<style>
            h2.swal2-title{
                color: #00054ad4 !important;
            }

            div:where(.swal2-container) button:where(.swal2-styled).swal2-confirm {
                background-color: #00054ad4 !important;
            }

        </style>
</head>
<body>
<script src="../../assets/js/sweetalert2@11.js"></script>
</body>
</html>
<?php
// Arquivo de conexão com o banco de dados
require_once '../../model/conexao.php';
// Funções
function criarDiretorio($ultimo_id, $tipo) {
    $diretorio = "../../storage/$tipo/$ultimo_id/imagem/";
    if (!is_dir($diretorio)) {
        mkdir($diretorio, 0755, true);
        return $diretorio;
    }
}

function criarDiretorioPdf($ultimo_id, $tipo) {
    $diretorio = "../../storage/$tipo/$ultimo_id/";
    if (!is_dir($diretorio)) {
        mkdir($diretorio, 0755, true);
        return $diretorio;
    }
}

function criarDiretorioPdf2($ultimo_id, $tipo) {
    $diretorio = "../../storage/matriculas-superior/$ultimo_id/$tipo/";
    if (!is_dir($diretorio)) {
        mkdir($diretorio, 0755, true);
        return $diretorio;
    }
}

function criarDiretorioPdf3($ultimo_id, $tipo) {
    $diretorio = "../../storage/matriculas-medio/$ultimo_id/$tipo/";
    if (!is_dir($diretorio)) {
        mkdir($diretorio, 0755, true);
        return $diretorio;
    }
}

if (isset($_GET['acao']) && $_GET["acao"] === 'sair') {
    // Inicialize a sessão
    session_start();
    
    // Remova todas as variáveis de sessão
    $_SESSION = array();
    
    // Destrua a sessão.
    session_destroy();
    
    // Redirecionar para a página inicial
    header("location: ../../index.php");
    exit;
}

if(isset($_GET['tipo']) && $_GET['tipo'] == 'AprovarRegister'){
    $register = $_GET['id'];
    $table_name = $_GET['insc'];
    $id_est = $_GET['user'];
    $id_inst = $_GET['inst'];

    $sqlBefore = "SELECT * FROM $table_name WHERE estado = 'Aprovada' AND id = $register";
    $stmtBefore= $pdo -> query($sqlBefore);

    if($stmtBefore -> rowCount() > 0){
        echo "<script>
            Swal.fire({
                icon: 'info',
                title: 'Esta Inscrição já foi Aprovada!',
                text: '',
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = '../../view/dash_inst/ver-inscricoes.php';
                }else{
                    window.location.href = '../../view/dash_inst/ver-inscricoes.php';
                }
            });
        </script>";
        exit();
    }
    
    $sqlBefore2 = "SELECT * FROM $table_name WHERE estado = 'Aprovada' AND id_est = $id_est AND id_inst = $id_inst";
    $stmtBefore2= $pdo -> query($sqlBefore2);

    if($stmtBefore2 -> rowCount() > 0){
        echo "<script>
            Swal.fire({
                icon: 'info',
                title: 'Para este Utilizador já existe uma inscricao aprovada!',
                text: '',
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = '../../view/dash_inst/ver-inscricoes.php';
                }else{
                    window.location.href = '../../view/dash_inst/ver-inscricoes.php';
                }
            });
        </script>";
        exit();
    }
    
    $sqlinside = "UPDATE $table_name SET estado = 'Aprovada' WHERE id = $register";
    $stmt_inside = $pdo -> query($sqlinside);

    if($stmt_inside){
        echo "<script>
            Swal.fire({
                icon: 'success',
                title: 'Inscrição Aprovada com sucesso!',
                text: '',
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = '../../view/dash_inst/ver-inscricoes.php';
                }else{
                    window.location.href = '../../view/dash_inst/ver-inscricoes.php';
                }
            });
        </script>";
    } 
    exit();
}

// Verificar o tipo de requisição
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    if($_POST['tipo'] === 'login'){
        // Capturar os dados do formulário

        $email = $_POST['email'];
        $senha = $_POST['senha'];

        try {
            // Prepare uma declaração selecionada
            $sql = "SELECT * FROM utilizador WHERE email = :email";
            $stmt = $pdo->prepare($sql);
            //  Bind do email
            $stmt->bindParam(":email", $email, PDO::PARAM_STR);

            if ($stmt->execute()) {
                // Verifique se o email existe
                if ($stmt->rowCount() == 1) {

                    if ($row = $stmt->fetch()) {
                        $id = $row["id_utilizador"];
                        $avatar = $row["avatar"];
                        $nome = $row["nome"];
                        $email = $row["email"];
                        $senha_user = $row["senha"];
                        $genero = $row["genero"];
                        $nivel = $row["tipo"];
                        $nascimento = $row["nascimento"];
                        $telefone = $row["telefone"];
                        $n_bi = $row["n_bi"];
                        $morada = $row["morada"];
                        $atualizado = $row["atualizado"];
                        $criado = $row["criado"];
                        if ($senha===$senha_user) {
                            // A senha está correta, então inicie uma nova sessão
                            session_start();

                            // Armazene dados em variáveis de sessão
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["avatar"] = $avatar;
                            $_SESSION["nome"] = $nome;
                            $_SESSION["email"] = $email;
                            $_SESSION["nivel"] = $nivel;
                            $_SESSION["telefone"] = $telefone;
                            $_SESSION["genero"] = $genero;
                            $_SESSION["nascimento"] = $nascimento;
                            $_SESSION["n_bi"] = $n_bi;
                            $_SESSION["atualizado"] = $atualizado;                           
                            $_SESSION["morada"] = $morada;
                            $_SESSION["nivel"] = $nivel;
                            $_SESSION["criado"] = $criado;


                            if ($nivel==="Administrador") {
                                
                                echo "<script>
                                        Swal.fire({
                                            icon: 'success',
                                            title: 'Login realizado com sucesso!',
                                            text: 'Você foi autenticado com sucesso.',
                                        }).then((result) => {
                                            if (result.isConfirmed) {
                                                window.location.href = '../../view/dash_admin/index.php';
                                            }
                                        });
                                    </script>";
                                    
                            } else {

                                echo "<script>
                                    Swal.fire({
                                        icon: 'success',
                                        title: 'Login realizado com sucesso!',
                                        text: 'Você foi autenticado com sucesso.',
                                    }).then((result) => {
                                        if (result.isConfirmed) {
                                            window.location.href = '../../view/dash_user/index.php';
                                        }
                                    });
                                </script>";
                            } 

                        } else {

                                echo "<script>
                                    Swal.fire({
                                        icon: 'error',
                                        title: 'Email ou senha inválidos!',
                                        text: '',
                                    }).then((result) => {
                                        if (result.isConfirmed) {
                                            window.location.href = '../../view/auth/login.php';
                                        }
                                    });
                                </script>";
                        }
                    }
                } else {
                    
                    // Prepare uma declaração selecionada
                    $sql = "SELECT * FROM instituicao WHERE email = :email";
                    $stmt = $pdo->prepare($sql);

                    //  Bind do email
                    $stmt->bindParam(":email", $email, PDO::PARAM_STR);

                    if ($stmt->execute()) {
                        // Verifique se o email existe
                        if ($stmt->rowCount() == 1) {
                            if ($row = $stmt->fetch()) {
                                $id = $row["id_instituicao"];
                                $imagem = $row["imagem"];
                                $nome = $row["nome"];
                                $sigla = $row["sigla"];
                                $email = $row["email"];
                                $senha_user = $row["senha"];
                                $area = $row["area"];
                                $nif = $row["nif"];
                                $tipo_inst = $row["tipo"];
                                $localizacao = $row["localizacao"];
                                $telefone = $row["telefone"];
                                $atualizado = $row["atualizado"];
                                $criado = $row["criado"];
                                $nivel = $row["nivel"];
                                $resumo = $row["resumo"];
                                if ($senha===$senha_user) {
                                    // A senha está correta, então inicie uma nova sessão
                                    session_start();
    
                                    // Armazene dados em variáveis de sessão
                                    $_SESSION["loggedin"] = true;
                                    $_SESSION["id"] = $id;
                                    $_SESSION["imagem"] = $imagem;
                                    $_SESSION["nome"] = $nome;
                                    $_SESSION["sigla"] = $sigla;
                                    $_SESSION["email"] = $email;
                                    $_SESSION["telefone"] = $telefone;
                                    $_SESSION["nif"] = $nif;
                                    $_SESSION["area"] = $area;
                                    $_SESSION["tipo"] = $tipo_inst;
                                    $_SESSION["localizacao"] = $localizacao;
                                    $_SESSION["atualizado"] = $atualizado;                           
                                    $_SESSION["criado"] = $criado;
                                    $_SESSION["nivel"] = $nivel;
                                    $_SESSION["resumo"] = $resumo;

                                    
                                    // Retornar sucesso
                                    echo "<script>
                                        Swal.fire({
                                            icon: 'success',
                                            title: 'Login realizado com sucesso!',
                                            text: 'Você foi autenticado com sucesso.',
                                        }).then((result) => {
                                            if (result.isConfirmed) {
                                                window.location.href = '../../view/dash_inst/index.php';
                                            }
                                        });
                                    </script>";

                                } else {

                                    echo "<script>
                                        Swal.fire({
                                            icon: 'error',
                                            title: 'Email ou senha inválidos!',
                                            text: '',
                                        }).then((result) => {
                                            if (result.isConfirmed) {
                                                window.location.href = '../../view/auth/login.php';
                                            }
                                        });
                                    </script>";
                                }
                            }
                        } else{

                            echo "<script>
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Email ou senha inválidos!',
                                    text: '',
                                }).then((result) => {
                                    if (result.isConfirmed) {
                                        window.location.href = '../../view/auth/login.php';
                                    }
                                });
                            </script>";
                            
                        }
                    }
                }
            } else {

                echo "<script>
                    Swal.fire({
                        icon: 'error',
                        title: 'Erro! Tente novamente.',
                        text: '',
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = '../../view/auth/login.php';
                        }
                    });
                </script>";

            }
        } catch (PDOException $e) {

            echo "<script>
                Swal.fire({
                    icon: 'error',
                    title: 'Erro! Tente novamente.',
                    text: '',
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = '../../view/auth/login.php';
                    }
                });
            </script>";
        }
    }

    if($_POST['tipo'] === 'newuser'){
        // Capturar os dados do formulário
        $nome = $_POST['nome'];
        $bi = $_POST['n_bi'];
        $nascimento = $_POST['nascimento'];
        $genero = $_POST['genero'];
        $morada = $_POST['morada'];
        $email = $_POST['email'];
        $telefone = $_POST['telefone'];
        $senha = $_POST['senha'];
        $csenha = $_POST['csenha'];
        $imagem = $_FILES["imagem"];

        $sql = "SELECT * FROM utilizador where email = :email";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(":email", $email, PDO::PARAM_STR);

        if($senha===$csenha){

            echo "<script>
                Swal.fire({
                    icon: 'error',
                    title: 'Senha não confirmada!',
                    text: '',
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = '../../view/auth/signup.php';
                    }
                });
            </script>";
        }

        if ($stmt->execute()) {
             // Verifique se o email existe
             if ($stmt->rowCount() > 0) {

                echo "<script>
                    Swal.fire({
                        icon: 'error',
                        title: 'Email já cadastrado!',
                        text: '',
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = '../../view/auth/signup.php';
                        }
                    });
                </script>";

             }else{

                $sql = "SELECT * FROM instituicao where email = :email";
                $stmt = $pdo->prepare($sql);
                $stmt->bindParam(":email", $email, PDO::PARAM_STR);
                if ($stmt->execute()) {
                    // Verifique se o email existe
                    if ($stmt->rowCount() > 0) {

                        echo "<script>
                            Swal.fire({
                                icon: 'error',
                                title: 'Email já cadastrado!',
                                text: '',
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    window.location.href = '../../view/auth/signup.php';
                                }
                            });
                        </script>";
                    }else{

                        try {
                            // Preparar a consulta SQL
                            $sql = "INSERT INTO utilizador (nome, genero, email, senha, telefone, nascimento, morada, n_bi) 
                                                    VALUES (:nome, :genero, :email, :senha, :telefone, :nascimento, :morada, :bi)";
                            
                            // Preparar a declaração SQL 
                            $stmt = $pdo->prepare($sql);
        
                            // Bind dos parâmetros
                            $stmt->bindParam(':nome', $nome);
                            $stmt->bindParam(':nascimento', $nascimento);
                            $stmt->bindParam(':genero', $genero);
                            $stmt->bindParam(':email', $email);
                            $stmt->bindParam(':telefone', $telefone);
                            $stmt->bindParam(':senha', $senha);
                            $stmt->bindParam(':morada', $morada);
                            $stmt->bindParam(':bi', $bi);
        
                            if ($stmt->execute()) {
                                
                                $ultimo_id = $pdo->lastInsertId();
                                // Se a foto tiver sido selecionada

                                $saldo = rand(5000, 15000); // Saldo entre 5000 e 15000
                                $cartao_number = rand(100000000000000, 999999999999999); // Número de cartão de 15 dígitos
                                $exp_data = date("my", strtotime("+1 year")); // Data de expiração 1 ano a partir de hoje
                                $codigo = rand(100, 999); // Código de 3 dígitos

                                // Inserir dados na tabela
                                $sql = "INSERT INTO conta_user (id_est, saldo, cartao_number, exp_data, codigo)
                                VALUES ($ultimo_id, $saldo, $cartao_number, '$exp_data', $codigo)";

                                if (!empty($imagem["name"])) {
        
                                    $imagem_err = array();
                                    
                                    // Verifica se o arquivo é uma imagem
                                    if(!preg_match("/^image\/(pjpeg|jpeg|png|gif|bmp)$/", $imagem["type"])){
                                        $imagem_err[1] = "Isso não é uma imagem.";
                                    }
                                    
                                    // Se não houver nenhum erro
                                    if (count($imagem_err) == 0) {
                                            
                                        // Pega extensão da imagem
                                        preg_match("/\.(gif|bmp|png|jpg|jpeg){1}$/i", $imagem["name"], $ext);
                                    
                                        // Gera um nome único para a imagem
                                        $nome_imagem = md5(uniqid(time())) . "." . $ext[1];
        
                                        // Diretório de destino da imagem
                                        $diretorio =  criarDiretorio($ultimo_id,"usuarios");
        
                                        // Mover a imagem para o diretório desejado
                                        if (move_uploaded_file($imagem["tmp_name"], $diretorio . $nome_imagem)) {
                                            // Prepare uma declaração de atualização
                                            $sql = "UPDATE utilizador SET avatar = :imagem WHERE id_utilizador = :id";
                                            if($stmt = $pdo->prepare($sql)){
                                                // Vincule as variáveis à instrução preparada como parâmetros
                                                $stmt->bindParam(":imagem", $nome_imagem, PDO::PARAM_STR);
                                                $stmt->bindParam(":id", $ultimo_id, PDO::PARAM_INT);
                                                
                                                // Tente executar a declaração preparada
                                                if($stmt->execute()){
                                                    // Retornar sucesso
                                                    echo "<script>
                                                        Swal.fire({
                                                            icon: 'success',
                                                            title: 'Registro criado com sucesso!',
                                                            text: '',
                                                        }).then((result) => {
                                                            if (result.isConfirmed) {
                                                                window.location.href = '../../view/dash_user/index.php';
                                                            }
                                                        });
                                                    </script>";

                                                } 
                                            }
                                            
                                        } 
                                    } else{

                                        echo "<script>
                                            Swal.fire({
                                                icon: 'error',
                                                title: 'Envie uma imagem válida!',
                                                text: '',
                                            }).then((result) => {
                                                if (result.isConfirmed) {
                                                    window.location.href = '../../view/auth/signup.php';
                                                }
                                            });
                                        </script>";

                                    }
                                }
                                /**header("location: ../../view/auth/login.php");**/
                            }
                            // Retornar sucesso
                            /**echo json_encode(['success' => true, 'message' => 'Registro criado com sucesso!']);**/

                        } catch (PDOException $e) {

                            echo "<script>
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Erro ao inserir registro no banco de dados!',
                                    text: '',
                                }).then((result) => {
                                    if (result.isConfirmed) {
                                        window.location.href = '../../view/auth/signup.php';
                                    }
                                });
                            </script>";
                        }
                        
                    }

                }
             }
        }

    }

    if($_POST['tipo'] === 'newinst'){
        // Capturar os dados do formulário
        $nome = $_POST['nome'];
        $tipo_inst = $_POST['tipo_inst'];
        $sigla = $_POST['sigla'];
        $area = $_POST['area'];
        $localizacao = $_POST['localizacao'];
        $email = $_POST['email'];
        $telefone = $_POST['telefone'];
        $imagem = $_FILES['imagem'];
        $nif = $_POST['nif'];
        $senha = $_POST['senha'];
        $csenha = $_POST['csenha'];
        $resumo = $_POST['resumo'];

        $sql = "SELECT * FROM utilizador where email = :email";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(":email", $email, PDO::PARAM_STR);

        if($senha===$csenha){

            echo "<script>
                Swal.fire({
                    icon: 'error',
                    title: 'Senha não confirmada!',
                    text: '',
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = '../../view/auth/signup2.php';
                    }
                });
            </script>";
        }

        if ($stmt->execute()) {
             // Verifique se o email existe
             if ($stmt->rowCount() > 0) {

                echo "<script>
                    Swal.fire({
                        icon: 'error',
                        title: 'Email já cadastrado!',
                        text: '',
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = '../../view/auth/signup2.php';
                        }
                    });
                </script>";

             }else{

                $sql = "SELECT * FROM instituicao where email = :email";
                $stmt = $pdo->prepare($sql);
                $stmt->bindParam(":email", $email, PDO::PARAM_STR);
                if ($stmt->execute()) {
                    // Verifique se o email existe
                    if ($stmt->rowCount() > 0) {

                        echo "<script>
                            Swal.fire({
                                icon: 'error',
                                title: 'Email já cadastrado!',
                                text: '',
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    window.location.href = '../../view/auth/signup2.php';
                                }
                            });
                        </script>";
                    }else{
                        try {
                            // Preparar a consulta SQL
                            $sql = "INSERT INTO instituicao (nome, sigla, email, senha, telefone, area, nif, tipo, localizacao, resumo) 
                                        VALUES (:nome, :sigla, :email, :senha, :telefone, :area, :nif, :tipo, :localizacao, :resumo)";
                            // Preparar a declaração SQL 
                            $stmt = $pdo->prepare($sql);
                            // Bind dos parâmetros
                            $stmt->bindParam(':nome', $nome);
                            $stmt->bindParam(':sigla', $sigla);
                            $stmt->bindParam(':email', $email);
                            $stmt->bindParam(':senha', $senha);
                            $stmt->bindParam(':telefone', $telefone);
                            $stmt->bindParam(':area', $area);
                            $stmt->bindParam(':nif', $nif);
                            $stmt->bindParam(':tipo', $tipo_inst);
                            $stmt->bindParam(':localizacao', $localizacao);
                            $stmt->bindParam(':resumo', $resumo);      
                            // Executar a consulta
                            if ($stmt->execute()){
                                $ultimo_id = $pdo->lastInsertId();
                                // Se a foto estiver sido selecionada
                                if (!empty($imagem["name"])) {
                                    $imagem_err = array();
                                    // Verifica se o arquivo é uma imagem
                                    if(!preg_match("/^image\/(pjpeg|jpeg|png|gif|bmp)$/", $imagem["type"])){
                                        $imagem_err[1] = "Isso não é uma imagem.";
                                    } 
                                    // Se não houver nenhum erro
                                    if (count($imagem_err) == 0) {
                                        // Pega extensão da imagem
                                        preg_match("/\.(gif|bmp|png|jpg|jpeg){1}$/i", $imagem["name"], $ext);
                                        // Gera um nome único para a imagem
                                        $nome_imagem = md5(uniqid(time())) . "." . $ext[1];
                                        // Diretório de destino da imagem
                                        $diretorio =  criarDiretorio($ultimo_id, "instituições");
                                        // Mover a imagem para o diretório desejado
                                        if (move_uploaded_file($imagem["tmp_name"], $diretorio . $nome_imagem)) {
                                            // Prepare uma declaração de atualização
                                            $sql = "UPDATE instituicao SET imagem = :imagem WHERE id_instituicao = :id";
                                            if($stmt = $pdo->prepare($sql)){
                                                // Vincule as variáveis à instrução preparada como parâmetros
                                                $stmt->bindParam(":imagem", $nome_imagem, PDO::PARAM_STR);
                                                $stmt->bindParam(":id", $ultimo_id, PDO::PARAM_INT);

                                                // Tente executar a declaração preparada
                                                if($stmt->execute()){
                                                    // Retornar sucesso
                                                    
                                                    if($area == "Ensino Médio"){
                                                        // Preparar a declaração SQL 
                                                        $sql = "INSERT INTO inst_medio(id) VALUE(:id)";
                                                        if($stmt = $pdo->prepare($sql)){
                                                            // Vincule as variáveis à instrução preparada como parâmetros
                                                            $stmt->bindParam(":id", $ultimo_id, PDO::PARAM_INT);
                                                            $stmt->execute(); 
                                                        }
                                                    }else{
                                                        // Preparar a declaração SQL 
                                                        $sql = "INSERT INTO inst_superior(id) VALUE(:id)";
                                                        if($stmt = $pdo->prepare($sql)){
                                                            // Vincule as variáveis à instrução preparada como parâmetros
                                                            $stmt->bindParam(":id", $ultimo_id, PDO::PARAM_INT);
                                                            $stmt->execute(); 
                                                        }
                                                    }
                                                    echo "<script>
                                                        Swal.fire({
                                                            icon: 'success',
                                                            title: 'Registro criado com sucesso!',
                                                            text: '',
                                                        }).then((result) => {
                                                            if (result.isConfirmed) {
                                                                window.location.href = '../../view/dash_inst/index.php';
                                                            }
                                                        });
                                                    </script>";
                                                }  
                                            }
                                            
                                        } 
                                    }else{

                                        echo "<script>
                                            Swal.fire({
                                                icon: 'error',
                                                title: 'Não selecionou uma imagem!',
                                                text: '',
                                            }).then((result) => {
                                                if (result.isConfirmed) {
                                                    window.location.href = '../../view/auth/signup2.php';
                                                }
                                            });
                                        </script>";

                                    }
                                }

                            }
                            // Retornar sucesso

                        } catch (PDOException $e) {

                            echo "<script>
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Erro ao inserir registro no banco de dados!',
                                    text: '',
                                }).then((result) => {
                                    if (result.isConfirmed) {
                                        window.location.href = '../../view/auth/signup2.php';
                                    }
                                });
                            </script>";
                        }
                    }
                }
            }
        }
    }

    if($_POST['tipo'] === 'updateUser'){
        
        // Capturar os dados do formulário
        $nome = $_POST['nome'];
        $bi = $_POST['n_bi'];
        $nascimento = $_POST['nascimento'];
        $morada = $_POST['morada'];
        $telefone = $_POST['telefone'];
        $imagem = $_FILES["imagem"];
        $idUser = $_POST["id"];
        $nivel = $_POST["nivel"];
        // Preparar a consulta SQL
        $sql = "UPDATE utilizador  SET nome = :n, telefone = :t, nascimento = :nasc, morada = :m, n_bi = :bi WHERE  id_utilizador = :id";
        // Preparar a declaração SQL 
        $stmt = $pdo->prepare($sql);
        // Bind dos parâmetros
        $stmt->bindParam(':n', $nome);
        $stmt->bindParam(':t', $telefone);
        $stmt->bindParam(':nasc', $nascimento);
        $stmt->bindParam(':m', $morada);
        $stmt->bindParam(':bi', $bi);
        $stmt->bindParam(':id', $idUser);

        if ($stmt->execute()) {
            // Se a foto tiver sido selecionada
            if (!empty($imagem["name"])) {
                $imagem_err = array();
                // Verifica se o arquivo é uma imagem
                if(!preg_match("/^image\/(pjpeg|jpeg|png|gif|bmp)$/", $imagem["type"])){
                    $imagem_err[1] = "Isso não é uma imagem.";
                }
                // Se não houver nenhum erro
                if (count($imagem_err) == 0) {
                    // Pega extensão da imagem
                    preg_match("/\.(gif|bmp|png|jpg|jpeg){1}$/i", $imagem["name"], $ext);
                
                    // Gera um nome único para a imagem
                    //$nome_imagem = md5(uniqid(time())) . "." . $ext[1];
                    $nome_imagem = $imagem["name"];

                    // Diretório de destino da imagem
                    if ($nivel==="Administrador") {
                        $diretorio = "../../storage/administradores/$idUser/imagem/";

                        // Mover a imagem para o diretório desejado
                        if (move_uploaded_file($imagem["tmp_name"], $diretorio . $nome_imagem)) {
                            // Prepare uma declaração de atualização
                            $sql = "UPDATE utilizador SET avatar = :imagem WHERE id_utilizador = :id";
                            if($stmt = $pdo->prepare($sql)){
                                // Vincule as variáveis à instrução preparada como parâmetros
                                $stmt->bindParam(":imagem", $nome_imagem, PDO::PARAM_STR);
                                $stmt->bindParam(":id", $idUser, PDO::PARAM_INT);
                                
                                // Tente executar a declaração preparada
                                if($stmt->execute()){
                                    
                                    /****/
                                    $sql = "SELECT * FROM utilizador WHERE id_utilizador :id";
                                    $stmt = $pdo->prepare($sql);
                                    $stmt->bindParam(":id", $idUser, PDO::PARAM_INT);
                        
                                    $stmt->execute();

                                    echo "<script>
                                        Swal.fire({
                                            icon: 'success',
                                            title: 'Registros actualizados com sucesso!',
                                            text: '',
                                        }).then((result) => {
                                            if (result.isConfirmed) {
                                                window.location.href = '../../view/dash_admin/users-profile.php';
                                            }
                                        });
                                    </script>";

                                } else{

                                    echo "<script>
                                        Swal.fire({
                                            icon: 'success',
                                            title: 'Registros actualizados com sucesso!',
                                            text: '',
                                        }).then((result) => {
                                            if (result.isConfirmed) {
                                                window.location.href = '../../view/dash_admin/users-profile.php';
                                            }
                                        });
                                    </script>";
                                }
                            }
                        }

                    }else{
                        $diretorio = "../../storage/usuarios/$idUser/imagem/";
                        // Mover a imagem para o diretório desejado
                        if (move_uploaded_file($imagem["tmp_name"], $diretorio . $nome_imagem)) {
                            // Prepare uma declaração de atualização
                            $sql = "UPDATE utilizador SET avatar = :imagem WHERE id_utilizador = :id";
                            if($stmt = $pdo->prepare($sql)){
                                // Vincule as variáveis à instrução preparada como parâmetros
                                $stmt->bindParam(":imagem", $nome_imagem, PDO::PARAM_STR);
                                $stmt->bindParam(":id", $idUser, PDO::PARAM_INT);
                                // Tente executar a declaração preparada
                                if($stmt->execute()){
                                    echo "<script>
                                        Swal.fire({
                                            icon: 'success',
                                            title: 'Registros actualizados com sucesso!',
                                            text: '',
                                        }).then((result) => {
                                            if (result.isConfirmed) {
                                                window.location.href = '../../view/dash_user/users-profile.php';
                                            }
                                        });
                                    </script>";
                                } else{

                                    echo "<script>
                                        Swal.fire({
                                            icon: 'error',
                                            title: 'Erro ao actualizar os registros!',
                                            text: '',
                                        }).then((result) => {
                                            if (result.isConfirmed) {
                                                window.location.href = '../../view/dash_user/users-profile.php';
                                            }
                                        });
                                    </script>";
                                }
                            }
                        }
                    }

                } else{
                    if ($nivel==="Administrador") {
                        echo "<script>
                            Swal.fire({
                                icon: 'error',
                                title: 'Envie uma imagem válida!',
                                text: '',
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    window.location.href = '../../view/dash_admin/users-profile.php';
                                }
                            });
                        </script>";
                    }else{
                        echo "<script>
                            Swal.fire({
                                icon: 'error',
                                title: 'Envie uma imagem válida!',
                                text: '',
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    window.location.href = '../../view/dash_user/users-profile.php';
                                }
                            });
                        </script>";
                    }

                }
            }
        }

    }

    if($_POST['tipo'] === 'updateSenhaUser'){ 

        $nsenha1 = $_POST['nsenha1'];
        $nsenha2 = $_POST['nsenha2'];
        $senha = $_POST['senha'];
        $id = $_POST['id'];

        $sql = "SELECT * FROM utilizador WHERE id_utilizador = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        if($stmt->execute()){
            // Verifique se o email existe
            if ($stmt->rowCount() == 1) {
                if ($row = $stmt->fetch()) {
                    if($nsenha1 === $nsenha2){
                        if($senha === $row['senha']){
                            try {
                                $stmt = $pdo->prepare("UPDATE utilizador SET senha = :senha WHERE id_utilizador = :id");
                                $stmt->bindParam(':id', $id);
                                $stmt->bindParam(':senha', $nsenha1);
                                if($stmt->execute()){
                                    if ($row['tipo'] === "Administrador") {
                                        echo "<script>
                                            Swal.fire({
                                                icon: 'success',
                                                title: 'Senha actualizada com sucesso!',
                                                text: '',
                                            }).then((result) => {
                                                if (result.isConfirmed) {
                                                    window.location.href = '../../view/dash_admin/users-profile.php';
                                                }
                                            });
                                        </script>";
                                    }else{
                                        echo "<script>
                                            Swal.fire({
                                                icon: 'success',
                                                title: 'Senha actualizada com sucesso!',
                                                text: '',
                                            }).then((result) => {
                                                if (result.isConfirmed) {
                                                    window.location.href = '../../view/dash_user/users-profile.php';
                                                }
                                            });
                                        </script>";
                                    }
                                } 
                            } catch (PDOException $e) {
                                if ($row['tipo'] === "Administrador") {
                                    echo "<script>
                                        Swal.fire({
                                            icon: 'error',
                                            title: 'Erro ao actualizar a senha!',
                                            text: '',
                                        }).then((result) => {
                                            if (result.isConfirmed) {
                                                window.location.href = '../../view/dash_admin/users-profile.php';
                                            }
                                        });
                                    </script>";
                                }else{
                                    echo "<script>
                                        Swal.fire({
                                            icon: 'error',
                                            title: 'Erro ao actualizar a senha!',
                                            text: '',
                                        }).then((result) => {
                                            if (result.isConfirmed) {
                                                window.location.href = '../../view/dash_user/users-profile.php';
                                            }
                                        });
                                    </script>";
        
                                }
                            }
                        }else{
                            if ($row['tipo'] === "Administrador") {
                                echo "<script>
                                    Swal.fire({
                                        icon: 'error',
                                        title: 'Senha errada!',
                                        text: '',
                                    }).then((result) => {
                                        if (result.isConfirmed) {
                                            window.location.href = '../../view/dash_admin/users-profile.php';
                                        }
                                    });
                                </script>";
                            }else{
                                echo "<script>
                                    Swal.fire({
                                        icon: 'error',
                                        title: 'Senha errada!',
                                        text: '',
                                    }).then((result) => {
                                        if (result.isConfirmed) {
                                            window.location.href = '../../view/dash_user/users-profile.php';
                                        }
                                    });
                                </script>";
                            }
                        }
                    }else{          
                        if ($row['tipo'] === "Administrador") {
                            echo "<script>
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Senha não confirmada!',
                                    text: 'Confirme a nova senha',
                                }).then((result) => {
                                    if (result.isConfirmed) {
                                        window.location.href = '../../view/dash_admin/users-profile.php';
                                    }
                                });
                            </script>";
                        }else{
                            echo "<script>
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Senha não confirmada!',
                                    text: 'Confirme a nova senha',
                                }).then((result) => {
                                    if (result.isConfirmed) {
                                        window.location.href = '../../view/dash_user/users-profile.php';
                                    }
                                });
                            </script>";
                        }
                    }
                }
            }
        }
    }

    if($_POST['tipo'] === 'updateInst'){
        
        // Capturar os dados do formulário
        $nome = $_POST['nome'];
        $nif = $_POST['nif'];
        $sigla = $_POST['sigla'];
        $localizacao = $_POST['localizacao'];
        $telefone = $_POST['telefone'];
        $imagem = $_FILES["imagem"];
        $resumo = $_POST['resumo'];
        $idInst = $_POST["id"];

            // Preparar a consulta SQL
            $sql = "UPDATE instituicao  SET nome = :n, telefone = :t, sigla = :sig, nif = :nif, localizacao = :loc, resumo = :res WHERE  id_instituicao = :id";
            // Preparar a declaração SQL 
            $stmt = $pdo->prepare($sql);
            // Bind dos parâmetros
            $stmt->bindParam(':n', $nome);
            $stmt->bindParam(':sig', $sigla);
            $stmt->bindParam(':t', $telefone);
            $stmt->bindParam(':res', $resumo);
            $stmt->bindParam(':loc', $localizacao);
            $stmt->bindParam(':nif', $nif);
            $stmt->bindParam(':id', $idInst);
            if ($stmt->execute()) {
                // Se a foto tiver sido selecionada
                if (!empty($imagem["name"])) {
                    $imagem_err = array();
                    // Verifica se o arquivo é uma imagem
                    if(!preg_match("/^image\/(pjpeg|jpeg|png|gif|bmp)$/", $imagem["type"])){
                        $imagem_err[1] = "Isso não é uma imagem.";
                    }
                    // Se não houver nenhum erro
                    if (count($imagem_err) == 0) {
                        // Pega extensão da imagem
                        preg_match("/\.(gif|bmp|png|jpg|jpeg){1}$/i", $imagem["name"], $ext);
                    
                        // Gera um nome único para a imagem
                        //$nome_imagem = md5(uniqid(time())) . "." . $ext[1];
                        $nome_imagem = $imagem["name"];

                        // Diretório de destino da imagem
                            $diretorio = "../../storage/instituições/$idInst/imagem/";

                            // Mover a imagem para o diretório desejado

                            if (move_uploaded_file($imagem["tmp_name"], $diretorio . $nome_imagem)) {
                                // Prepare uma declaração de atualização
                                $sql = "UPDATE instituicao SET imagem = :imagem WHERE id_instituicao = :id";
                                if($stmt = $pdo->prepare($sql)){
                                    // Vincule as variáveis à instrução preparada como parâmetros
                                    $stmt->bindParam(":imagem", $nome_imagem, PDO::PARAM_STR);
                                    $stmt->bindParam(":id", $idInst, PDO::PARAM_INT);
                                    
                                    // Tente executar a declaração preparada
                                    if($stmt->execute()){
    
                                        echo "<script>
                                            Swal.fire({
                                                icon: 'success',
                                                title: 'Registros actualizados com sucesso!',
                                                text: '',
                                            }).then((result) => {
                                                if (result.isConfirmed) {
                                                    window.location.href = '../../view/dash_inst/users-profile.php';
                                                }
                                            });
                                        </script>";
    
                                    } else{
    
                                        echo "<script>
                                            Swal.fire({
                                                icon: 'error',
                                                title: 'Erro ao actualizar registros!',
                                                text: '',
                                            }).then((result) => {
                                                if (result.isConfirmed) {
                                                    window.location.href = '../../view/dash_inst/users-profile.php';
                                                }
                                            });
                                        </script>";
                                    }
                                }
                            }

                    } else{
                        echo "<script>
                            Swal.fire({
                                icon: 'error',
                                title: 'Envie uma imagem válida!',
                                text: '',
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    window.location.href = '../../view/dash_inst/users-profile.php';
                                }
                            });
                        </script>";
                    }
                }
            }
        
    }
    
    if($_POST['tipo'] === 'updateSenhaInst'){
        $nsenha1 = $_POST['nsenha1'];
        $nsenha2 = $_POST['nsenha2'];
        $senha = $_POST['senha'];
        $id = $_POST['id'];

        $sql = "SELECT * FROM instituicao WHERE id_instituicao = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        if($stmt->execute()){
            // Verifique se o email existe
            if ($stmt->rowCount() == 1) {
                if ($row = $stmt->fetch()) {
                    if($nsenha1 === $nsenha2){
                        if($senha === $row['senha']){
                            try {
                                $stmt = $pdo->prepare("UPDATE instituicao SET senha = :senha WHERE id_instituicao = :id");
                                $stmt->bindParam(':id', $id);
                                $stmt->bindParam(':senha', $nsenha1);
                                if($stmt->execute()){
                                    echo "<script>
                                        Swal.fire({
                                            icon: 'success',
                                            title: 'Senha actualizada com sucesso!',
                                            text: '',
                                        }).then((result) => {
                                            if (result.isConfirmed) {
                                                window.location.href = '../../view/dash_inst/users-profile.php';
                                            }
                                        });
                                    </script>";
                                } 
                            } catch (PDOException $e) {
                                echo "<script>
                                    Swal.fire({
                                        icon: 'error',
                                        title: 'Erro ao actualizar a senha!',
                                        text: '',
                                    }).then((result) => {
                                        if (result.isConfirmed) {
                                            window.location.href = '../../view/dash_inst/users-profile.php';
                                        }
                                    });
                                </script>";
                            }
                        }else{
                            echo "<script>
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Senha errada!',
                                    text: '',
                                }).then((result) => {
                                    if (result.isConfirmed) {
                                        window.location.href = '../../view/dash_inst/users-profile.php';
                                    }
                                });
                            </script>";
                        }
                    }else{       
                        echo "<script>
                            Swal.fire({
                                icon: 'error',
                                title: 'Senha não confirmada!',
                                text: 'Esteja certo da nova senha',
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    window.location.href = '../../view/dash_inst/users-profile.php';
                                }
                            });
                        </script>";
                    }
                }
            }
        }
    }

    if($_POST['tipo'] === 'addCursoMedio'){
        // Capturar os dados do formulário
        $nome = $_POST['nome'];
        $vagas = $_POST['vagas'];
        $descricao = $_POST['desc'];
        $imagem = $_FILES['imagem'];
        $id_entidade = $_POST['id'];
        $matric_val = $_POST['matricula_val'];
        $inscric_val = $_POST['inscricao_val'];

        $sql = "SELECT * FROM curso_medio WHERE nome like :nome AND id_inst = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':id', $id_entidade);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            echo "<script>
                Swal.fire({
                    icon: 'error',
                    title: 'Já existe um curso com esta designação!',
                    text: '',
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = '../../view/dash_inst/ver-periodo-inscricao.php';
                    }
                });
            </script>";
        }else{
            // Informações sobre o upload da imagem
            $imagem_nome = $_FILES['imagem']['name'];
            $imagem_tmp = $_FILES['imagem']['tmp_name'];
    
            $imagem_err = array();
            // Verifica se o arquivo é uma imagem
            $extensoes_permitidas = array('jpeg', 'jpg', 'png', 'gif', 'bmp');
            $extensao = pathinfo($imagem_nome, PATHINFO_EXTENSION);
            if(!in_array(strtolower($extensao), $extensoes_permitidas)){
                $imagem_err[] = "Isso não é uma imagem válida.";
            } 
    
            if (count($imagem_err) === 0) {
                // Diretório onde a imagem será armazenada
                $caminho_imagem = "../../storage/instituições/$id_entidade/imagem/$imagem_nome"; 
    
                // Move a imagem para o diretório especificado
                if(move_uploaded_file($imagem_tmp, $caminho_imagem)){
                        // Preparar a consulta SQL
                        $sql = "INSERT INTO curso_medio(nome, id_inst, vagas, inscricao_val, matricula_val, descricao, imagem) VALUES (:nome, :id_entidade, :vagas, :i_val, :m_val, :descric, :imagem)";
    
                        // Preparar a declaração SQL 
                        $stmt = $pdo->prepare($sql);
                        // Bind dos parâmetros
                        $stmt->bindParam(':nome', $nome);
                        $stmt->bindParam(':id_entidade', $id_entidade);
                        $stmt->bindParam(':vagas', $vagas);
                        $stmt->bindParam(':i_val', $inscric_val);
                        $stmt->bindParam(':m_val', $matric_val);
                        $stmt->bindParam(':descric', $descricao);
                        $stmt->bindParam(':imagem', $caminho_imagem);
    
                        if ($stmt->execute()) {
                            
                            $sql_vagas = "SELECT SUM(vagas) as total_vagas FROM curso_medio WHERE id_inst = :id";
                            $stmt_vagas = $pdo->prepare($sql_vagas);
                            $stmt_vagas->bindParam(':id', $id_entidade, PDO::PARAM_INT);
                            $stmt_vagas->execute();
                            $total_vagas = $stmt_vagas->fetch(PDO::FETCH_ASSOC)['total_vagas'];

                            // Atualiza o atributo 'vagas' na tabela de instituições
                            $sql_update_vagas = "UPDATE instituicao SET vagas = :total_vagas WHERE id_instituicao = :id";
                            $stmt_update_vagas = $pdo->prepare($sql_update_vagas);
                            $stmt_update_vagas->bindParam(':total_vagas', $total_vagas, PDO::PARAM_INT);
                            $stmt_update_vagas->bindParam(':id', $id_entidade, PDO::PARAM_INT);
                            $stmt_update_vagas->execute(); 
    
                            echo "<script>
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Curso inserido com sucesso!',
                                    text: '',
                                }).then((result) => {
                                    if (result.isConfirmed) {
                                        window.location.href = '../../view/dash_inst/ver-periodo-inscricao.php';
                                    }
                                });
                            </script>";
                        } else {
                            echo "<script>
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Erro ao inserir o curso!',
                                    text: '',
                                }).then((result) => {
                                    if (result.isConfirmed) {
                                        window.location.href = '../../view/dash_inst/ver-periodo-inscricao.php';
                                    }
                                });
                            </script>";
                        }
                } else {
                    echo "<script>
                        Swal.fire({
                            icon: 'error',
                            title: 'Erro ao mover a imagem!',
                            text: '',
                        }).then((result) => {
                            if (result.isConfirmed) {
                                window.location.href = '../../view/dash_inst/ver-periodo-inscricao.php';
                            }
                        });
                    </script>";
                }
            } else {
                echo "<script>
                    Swal.fire({
                        icon: 'error',
                        title: 'Envie uma imagem válida!',
                        text: '',
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = '../../view/dash_inst/ver-periodo-inscricao.php';
                        }
                    });
                </script>";
            }

        }

    }

    if($_POST['tipo'] === 'addCursoSuperior'){
        // Capturar os dados do formulário
        $nome = $_POST['nome'];
        $vagas = $_POST['vagas'];
        $descricao = $_POST['desc'];
        $imagem = $_FILES['imagem'];
        $id_entidade = $_POST['id'];
        $matric_val = $_POST['matricula_val'];
        $inscric_val = $_POST['inscricao_val'];

        $sql = "SELECT * FROM curso_superior WHERE nome like :nome AND id_inst = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':id',$id_entidade);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            echo "<script>
                Swal.fire({
                    icon: 'error',
                    title: 'Já existe um curso com esta designação!',
                    text: '',
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = '../../view/dash_inst/ver-periodo-inscricao.php';
                    }
                });
            </script>";
        }else{
            // Informações sobre o upload da imagem
            $imagem_nome = $_FILES['imagem']['name'];
            $imagem_tmp = $_FILES['imagem']['tmp_name'];

            $imagem_err = array();
            // Verifica se o arquivo é uma imagem
            $extensoes_permitidas = array('jpeg', 'jpg', 'png', 'gif', 'bmp');
            $extensao = pathinfo($imagem_nome, PATHINFO_EXTENSION);
            if(!in_array(strtolower($extensao), $extensoes_permitidas)){
                $imagem_err[] = "Isso não é uma imagem válida.";
            } 

            if (count($imagem_err) === 0) {
                // Diretório onde a imagem será armazenada
                $caminho_imagem = "../../storage/instituições/$id_entidade/imagem/$imagem_nome"; 

                // Move a imagem para o diretório especificado
                if(move_uploaded_file($imagem_tmp, $caminho_imagem)){
                        // Preparar a consulta SQL
                        $sql = "INSERT INTO curso_superior(nome, id_inst, vagas, inscricao_val, matricula_val, descricao, imagem) VALUES (:nome, :id_entidade, :vagas, :i_val, :m_val, :descric, :imagem)";

                        // Preparar a declaração SQL 
                        $stmt = $pdo->prepare($sql);
                        // Bind dos parâmetros
                        $stmt->bindParam(':nome', $nome);
                        $stmt->bindParam(':id_entidade', $id_entidade);
                        $stmt->bindParam(':vagas', $vagas);
                        $stmt->bindParam(':i_val', $inscric_val);
                        $stmt->bindParam(':m_val', $matric_val);
                        $stmt->bindParam(':descric', $descricao);
                        $stmt->bindParam(':imagem', $caminho_imagem);

                        if ($stmt->execute()) {

                            $sql_vagas = "SELECT SUM(vagas) as total_vagas FROM curso_superior WHERE id_inst = :id";
                            $stmt_vagas = $pdo->prepare($sql_vagas);
                            $stmt_vagas->bindParam(':id', $id_entidade, PDO::PARAM_INT);
                            $stmt_vagas->execute();
                            $total_vagas = $stmt_vagas->fetch(PDO::FETCH_ASSOC)['total_vagas'];

                            // Atualiza o atributo 'vagas' na tabela de instituições
                            $sql_update_vagas = "UPDATE instituicao SET vagas = :total_vagas WHERE id_instituicao = :id";
                            $stmt_update_vagas = $pdo->prepare($sql_update_vagas);
                            $stmt_update_vagas->bindParam(':total_vagas', $total_vagas, PDO::PARAM_INT);
                            $stmt_update_vagas->bindParam(':id', $id_entidade, PDO::PARAM_INT);
                            $stmt_update_vagas->execute(); 

                            echo "<script>
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Curso inserido com sucesso!',
                                    text: '',
                                }).then((result) => {
                                    if (result.isConfirmed) {
                                        window.location.href = '../../view/dash_inst/ver-periodo-inscricao.php';
                                    }
                                });
                            </script>";
                        } else {
                            echo "<script>
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Erro ao inserir o curso!',
                                    text: '',
                                }).then((result) => {
                                    if (result.isConfirmed) {
                                        window.location.href = '../../view/dash_inst/ver-periodo-inscricao.php';
                                    }
                                });
                            </script>";
                        }
                } else {
                    echo "<script>
                        Swal.fire({
                            icon: 'error',
                            title: 'Erro ao mover a imagem!',
                            text: '',
                        }).then((result) => {
                            if (result.isConfirmed) {
                                window.location.href = '../../view/dash_inst/ver-periodos-inscricao.php';
                            }
                        });
                    </script>";
                }
            } else {
                echo "<script>
                    Swal.fire({
                        icon: 'error',
                        title: 'Envie uma imagem válida!',
                        text: '',
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = '../../view/dash_inst/ver-periodos-inscricao.php';
                        }
                    });
                </script>";
            }
        }

    }

    if($_POST['tipo'] === 'addFaculdade'){
        // Capturar os dados do formulário
        $nome = $_POST['nome'];
        $id = $_POST['id'];

        $sql = "SELECT * FROM faculdade WHERE nome like :nome AND id_inst = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            echo "<script>
                Swal.fire({
                    icon: 'error',
                    title: 'Já existe uma faculdade com esta designação!',
                    text: '',
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = '../../view/dash_inst/ver-periodo-inscricao.php';
                    }
                });
            </script>";
        }else{
            $sql = "INSERT INTO faculdade(nome, id_inst) VALUES (:nome, :id)";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':nome', $nome);
            $stmt->bindParam(':id', $id);
            if ($stmt->execute()) {
                echo "<script>
                    Swal.fire({
                        icon: 'success',
                        title: 'Faculdade registrada com sucesso!',
                        text: '',
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = '../../view/dash_inst/ver-periodo-inscricao.php';
                        }
                    });
                </script>";
            }else {
                echo "<script>
                    Swal.fire({
                        icon: 'error',
                        title: 'Erro ao registrar faculdade!',
                        text: '',
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = '../../view/dash_inst/ver-periodo-inscricao.php';
                        }
                    });
                </script>";
            }
        }

    }

    if($_POST['tipo'] === 'addPeriodoInscricao'){
        // Capturar os dados do formulário
        $ano = $_POST['ano'];
        $dataInicio = $_POST['dataInicio'];
        $dataFim = $_POST['dataFim'];
        $desc= $_POST['descric'];
        $id = $_POST['id'];

        $sql = "SELECT * FROM periodo_inscricao INNER JOIN instituicao ON periodo_inscricao.id_inst = instituicao.id_instituicao WHERE periodo_inscricao.estado like :activo AND instituicao.id_instituicao = :id";
        $stmt = $pdo->prepare($sql);
        $activo = 'Activo';
        $stmt->bindParam(':activo', $activo);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        if($stmt->rowCount() > 0){
            echo "<script>
                Swal.fire({
                    icon: 'error',
                    title: 'Já existe um periodo de inscrição activo!',
                    text: '',
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = '../../view/dash_inst/ver-periodo-inscricao.php';
                    }
                });
            </script>";
        }else{
                        
            $sql = "INSERT INTO periodo_inscricao(ano, data_inicio, data_fim, descricao, id_inst) VALUES (:ano, :data_inicio, :data_fim, :descric, :id)";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':ano', $ano);
            $stmt->bindParam(':data_inicio', $dataInicio);
            $stmt->bindParam(':data_fim', $dataFim);
            $stmt->bindParam(':descric', $desc);
            $stmt->bindParam(':id', $id);
            if ($stmt->execute()) {
                echo "<script>
                    Swal.fire({
                        icon: 'success',
                        title: 'Período de Inscrição Registrado com sucesso!',
                        text: '',
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = '../../view/dash_inst/ver-periodo-inscricao.php';
                        }
                    });
                </script>";
            }else {
                echo "<script>
                    Swal.fire({
                        icon: 'error',
                        title: 'Erro ao registrar o período de inscrição!',
                        text: '',
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = '../../view/dash_inst/ver-periodo-inscricao.php';
                        }
                    });
                </script>";
            }
        }

    }

    if($_POST['tipo'] === 'addSMS'){
        // Capturar os dados do formulário
        $content = $_POST['conteudo'];
        $id = $_POST['id'];

        $sql = "SELECT * FROM mensagem INNER JOIN instituicao ON mensagem.id_inst = instituicao.id_instituicao WHERE instituicao.id_instituicao = $id";
        $stmt = $pdo->query($sql);
        if($stmt->rowCount() > 0){
            echo "<script>
                Swal.fire({
                    icon: 'error',
                    title: 'Já tem uma mensagem enviada!',
                    text: '',
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = '../../view/dash_inst/testemunhar.php';
                    }
                });
            </script>";
        }else{
            
            $sql = "INSERT INTO mensagem(conteudo, id_inst) VALUES (:cont, :id)";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':cont', $content);
            $stmt->bindParam(':id', $id);
            if ($stmt->execute()) {
                echo "<script>
                    Swal.fire({
                        icon: 'success',
                        title: 'Mensagem enviada com sucesso!',
                        text: '',
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = '../../view/dash_inst/testemunhar.php';
                        }
                    });
                </script>";
            }else {
                echo "<script>
                    Swal.fire({
                        icon: 'error',
                        title: 'Ocorreu um erro! Tente novamente mais tarde',
                        text: '',
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = '../../view/dash_inst/testemunhar.php';
                        }
                    });
                </script>";
            }
        }

    }

    if($_POST['tipo'] === 'inscricaoMedio'){

        $est = $_POST['utilizador'];
        $inst =  $_POST['instituicao'];
        $certificado = $_FILES['certificado'];
        $curso =  $_POST['curso'];

        $super = "SELECT * FROM inscricao_medio WHERE id_est = :est AND id_curso  = :curs AND id_inst = :inst";
        $stmt = $pdo->prepare($super);
        $stmt->bindParam(':est', $est);
        $stmt->bindParam(':curs', $curso);
        $stmt->bindParam(':inst', $inst);
        $stmt->execute();
        if($stmt ->rowCount() > 0){
            echo "<script>
                Swal.fire({
                    icon: 'error',
                    title: 'Já está inscrito neste curso!',
                    text: '',
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = '../../view/dash_user/index.php';
                    }
                });
            </script>";
        }else{
            $super = "SELECT * FROM inscricao_medio WHERE id_est = :est AND id_inst = :inst";
            $stmt = $pdo->prepare($super);
            $stmt->bindParam(':est', $est);
            $stmt->bindParam(':inst', $inst);
            $stmt->execute();
            if($stmt ->rowCount() > 1){
                echo "<script>
                    Swal.fire({
                        icon: 'error',
                        title: 'Atingiu o limite de inscrições (2) nesta instituição!',
                        text: '',
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = '../../view/dash_user/index.php';
                        }
                    });
                </script>";
            }else{
                $sql = "INSERT INTO inscricao_medio(id_inst, id_est, id_curso) VALUES (:inst, :est, :curs)";
                $stmt = $pdo->prepare($sql);
                $stmt->bindParam(':inst', $inst);
                $stmt->bindParam(':est', $est);
                $stmt->bindParam(':curs', $curso);
                if ($stmt->execute()){
        
                    if ($_FILES['certificado']['error'] === UPLOAD_ERR_OK) {
                        $fileTmpPath = $_FILES['certificado']['tmp_name'];
                        $fileName = $_FILES['certificado']['name'];
                    
                        // Verifica o tipo MIME do arquivo
                        $mime_type = mime_content_type($fileTmpPath);
                        if (strpos($mime_type, 'pdf') !== false || strpos($mime_type, 'image') !== false) {
                    
                            $ultimo_id = $pdo->lastInsertId();
                    
                            // Define o diretório de destino
                            $uploadDir = criarDiretorioPdf($ultimo_id, "inscricoes-medio");
                    
                            // Move o arquivo para o diretório de destino
                            $destPath = $uploadDir . $fileName;
                            if (move_uploaded_file($fileTmpPath, $destPath)) {

                                
                                $sql = "UPDATE inscricao_medio SET cert_estudante = :caminho WHERE id = :id";
                                $stmt = $pdo->prepare($sql);
                                $stmt->bindParam(':caminho', $destPath);
                                $stmt->bindParam(':id', $ultimo_id);
                                if ($stmt->execute()) {
                                    echo "<script>
                                        Swal.fire({
                                            icon: 'success',
                                            title: 'Formulário submetido com sucesso!',
                                            text: '',
                                        }).then((result) => {
                                            if (result.isConfirmed) {
                                                window.location.href = '../../view/dash_user/secure-billing.php?register=$ultimo_id&area=EnsinoMedio&curso=$curso&inst=$inst&user=$est&taged=12g653ydte4it8y5';
                                            }
                                        });
                                    </script>";
                                } else {
                                    echo "<script>
                                        Swal.fire({
                                            icon: 'error',
                                            title: 'Erro ao salvar o caminho do arquivo no banco de dados!',
                                            text: '',
                                        }).then((result) => {
                                            if (result.isConfirmed) {
                                                window.location.href = '../../view/dash_user/index.php';
                                            }
                                        });
                                    </script>";
                                }
                            } else {
                                echo "<script>
                                    Swal.fire({
                                        icon: 'error',
                                        title: 'Erro ao mover o arquivo para o diretório de destino!',
                                        text: '',
                                    }).then((result) => {
                                        if (result.isConfirmed) {
                                            window.location.href = '../../view/dash_user/index.php';
                                        }
                                    });
                                </script>";
                            }
                        } else {
                            echo "<script>
                                Swal.fire({
                                    icon: 'error',
                                    title: 'O arquivo enviado não é um arquivo PDF ou de imagem!',
                                    text: '',
                                }).then((result) => {
                                    if (result.isConfirmed) {
                                        window.location.href = '../../view/dash_user/index.php';
                                    }
                                });
                            </script>";
                        }
                    
                    } else {
                        echo "<script>
                            Swal.fire({
                                icon: 'error',
                                title: 'Erro no envio do arquivo!',
                                text: '',
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    window.location.href = '../../view/dash_user/index.php';
                                }
                            });
                        </script>";
                    }

                }
            }
        }

    }

    if($_POST['tipo'] === 'inscricaoSuperior'){

        $est = $_POST['utilizador'];
        $inst =  $_POST['instituicao'];
        $certificado = $_FILES['certificado'];
        $curso =  $_POST['curso'];

        $super = "SELECT * FROM inscricao_superior WHERE id_est = :est AND id_curso  = :curs AND id_inst = :inst";
        $stmt = $pdo->prepare($super);
        $stmt->bindParam(':est', $est);
        $stmt->bindParam(':curs', $curso);
        $stmt->bindParam(':inst', $inst);
        $stmt->execute();
        if($stmt ->rowCount() > 0){
            echo "<script>
                Swal.fire({
                    icon: 'error',
                    title: 'Já está inscrito neste curso!',
                    text: '',
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = '../../view/dash_user/index.php';
                    }else{
                        window.location.href = '../../view/dash_user/index.php';
                    }
                });
            </script>";
        }else{
            $super = "SELECT * FROM inscricao_superior WHERE id_est = :est AND id_inst = :inst";
            $stmt = $pdo->prepare($super);
            $stmt->bindParam(':est', $est);
            $stmt->bindParam(':inst', $inst);
            $stmt->execute();
            if($stmt ->rowCount() > 1){
                echo "<script>
                    Swal.fire({
                        icon: 'error',
                        title: 'Atingiu o limite de inscrições (2) nesta instituição!',
                        text: '',
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = '../../view/dash_user/index.php';
                        }
                    });
                </script>";
            }else{
                $sql = "INSERT INTO inscricao_superior(id_inst, id_est, id_curso) VALUES (:inst, :est, :curs)";
                $stmt = $pdo->prepare($sql);
                $stmt->bindParam(':inst', $inst);
                $stmt->bindParam(':est', $est);
                $stmt->bindParam(':curs', $curso);
        
                if ($stmt->execute()){
        
                    if ($_FILES['certificado']['error'] === UPLOAD_ERR_OK) {
                        $fileTmpPath = $_FILES['certificado']['tmp_name'];
                        $fileName = $_FILES['certificado']['name'];
                    
                        // Verifica o tipo MIME do arquivo
                        $mime_type = mime_content_type($fileTmpPath);
                        if (strpos($mime_type, 'pdf') !== false || strpos($mime_type, 'image') !== false) {
                    
                            $ultimo_id = $pdo->lastInsertId();
                    
                            // Define o diretório de destino
                            $uploadDir = criarDiretorioPdf($ultimo_id, "inscricoes-superior");
                    
                            // Move o arquivo para o diretório de destino
                            $destPath = $uploadDir . $fileName;
                            if (move_uploaded_file($fileTmpPath, $destPath)) {

                                // Consulta SQL para atualizar o caminho do arquivo para o registro com ID igual a 34
                                $sql = "UPDATE inscricao_superior SET cert_estudante = :caminho WHERE id = :id";
                                $stmt = $pdo->prepare($sql);
                                $stmt->bindParam(':caminho', $destPath);
                                $stmt->bindParam(':id', $ultimo_id);
                                if ($stmt->execute()) {
                                    echo "<script>
                                        Swal.fire({
                                            icon: 'success',
                                            title: 'Formulário submetido com sucesso!',
                                            text: '',
                                        }).then((result) => {
                                            if (result.isConfirmed) {
                                                window.location.href = '../../view/dash_user/secure-billing.php?register=$ultimo_id&area=EnsinoSuperior&curso=$curso&inst=$inst&user=$est&taged=12g653ydte4it8y5';
                                            }
                                        });
                                    </script>";
                                } else {
                                    echo "<script>
                                        Swal.fire({
                                            icon: 'error',
                                            title: 'Erro ao salvar o caminho do arquivo no banco de dados!',
                                            text: '',
                                        }).then((result) => {
                                            if (result.isConfirmed) {
                                                window.location.href = '../../view/dash_user/index.php';
                                            }
                                        });
                                    </script>";
                                }
                            } else {
                                echo "<script>
                                    Swal.fire({
                                        icon: 'error',
                                        title: 'Erro ao mover o arquivo para o diretório de destino!',
                                        text: '',
                                    }).then((result) => {
                                        if (result.isConfirmed) {
                                            window.location.href = '../../view/dash_user/index.php';
                                        }
                                    });
                                </script>";
                            }
                        } else {
                            echo "<script>
                                Swal.fire({
                                    icon: 'error',
                                    title: 'O arquivo enviado não é um arquivo PDF ou de imagem!',
                                    text: '',
                                }).then((result) => {
                                    if (result.isConfirmed) {
                                        window.location.href = '../../view/dash_user/index.php';
                                    }
                                });
                            </script>";
                        }
                    
                    } else {
                        echo "<script>
                            Swal.fire({
                                icon: 'error',
                                title: 'Erro no envio do arquivo!',
                                text: '',
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    window.location.href = '../../view/dash_user/index.php';
                                }
                            });
                        </script>";
                    }
        
                }
            }
        }
    }

    if($_POST['tipo'] === 'matriculaMedio'){

        $est = $_POST['utilizador'];
        $inst =  $_POST['instituicao'];
        $certificado = $_FILES['certificado'];
        $atest_medico = $_FILES['atest_medico'];
        $vacina = $_FILES['vacina'];
        $curso =  $_POST['curso'];
        $inscricao =  $_POST['inscricao'];

        $super = "SELECT * FROM matricula_medio WHERE id_est = :est AND id_curso  = :curs AND id_inst = :inst";
        $stmt = $pdo->prepare($super);
        $stmt->bindParam(':est', $est);
        $stmt->bindParam(':curs', $curso);
        $stmt->bindParam(':inst', $inst);
        $stmt->execute();
        if($stmt ->rowCount() > 0){
            echo "<script>
                Swal.fire({
                    icon: 'error',
                    title: 'Já está matriculado nesta instituição!',
                    text: '',
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = '../../view/dash_user/index.php';
                    }else{
                        window.location.href = '../../view/dash_user/index.php';
                    }
                });
            </script>";
        }else{
            $super = "SELECT * FROM matricula_medio WHERE id_est = :est AND id_inst = :inst";
            $stmt = $pdo->prepare($super);
            $stmt->bindParam(':est', $est);
            $stmt->bindParam(':inst', $inst);
            $stmt->execute();
            if($stmt ->rowCount() > 0){
                echo "<script>
                    Swal.fire({
                        icon: 'error',
                        title: 'Atingiu o limite de matrículas (1) nesta instituição!',
                        text: '',
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = '../../view/dash_user/index.php';
                        }
                    });
                </script>";
            }else{
                $sql = "INSERT INTO matricula_medio(id_inst, id_est, id_curso, id_inscricao) VALUES (:inst, :est, :curs, :insc)";
                $stmt = $pdo->prepare($sql);
                $stmt->bindParam(':inst', $inst);
                $stmt->bindParam(':est', $est);
                $stmt->bindParam(':curs', $curso);
                $stmt->bindParam(':insc', $inscricao);
        
                if ($stmt->execute()){
        
                    if (($_FILES['certificado']['error'] === UPLOAD_ERR_OK) && ($_FILES['atest_medico']['error'] === UPLOAD_ERR_OK) && ($_FILES['vacina']['error'] === UPLOAD_ERR_OK)) {
                        $fileTmpPath = $_FILES['certificado']['tmp_name'];
                        $fileTmpPath2 = $_FILES['atest_medico']['tmp_name'];
                        $fileTmpPath3 = $_FILES['vacina']['tmp_name'];

                        $fileName = $_FILES['certificado']['name'];
                        $fileName2 = $_FILES['atest_medico']['name'];
                        $fileName3 = $_FILES['vacina']['name'];
                    
                        // Verifica o tipo MIME do arquivo
                        $mime_type = mime_content_type($fileTmpPath);
                        $mime_type2 = mime_content_type($fileTmpPath2);
                        $mime_type3 = mime_content_type($fileTmpPath3);

                        if ((strpos($mime_type, 'pdf') !== false || strpos($mime_type, 'image')) && (strpos($mime_type2, 'pdf') !== false || strpos($mime_type2, 'image') !== false) && (strpos($mime_type3, 'pdf') !== false || strpos($mime_type3, 'image') !== false)){
                    
                            $ultimo_id = $pdo->lastInsertId();
                    
                            // Define o diretório de destino
                            $uploadDir = criarDiretorioPdf3($ultimo_id, "certificado");
                            $uploadDir2 = criarDiretorioPdf3($ultimo_id, "atestado");
                            $uploadDir3 = criarDiretorioPdf3($ultimo_id, "cartao-vacina");
                    
                            // Move o arquivo para o diretório de destino
                            $destPath = $uploadDir . $fileName;
                            $destPath2 = $uploadDir2 . $fileName2;
                            $destPath3 = $uploadDir3 . $fileName3;

                            if ((move_uploaded_file($fileTmpPath, $destPath)) && (move_uploaded_file($fileTmpPath2, $destPath2)) && (move_uploaded_file($fileTmpPath3, $destPath3))) {

                                // Consulta SQL para atualizar o caminho do arquivo para o registro com ID igual a 34
                                $sql = "UPDATE matricula_medio SET certificado = :caminho, atestado_medico = :caminho2, cartao_vacina = :caminho3 WHERE id = :id";
                                $stmt = $pdo->prepare($sql);
                                $stmt->bindParam(':caminho', $destPath);
                                $stmt->bindParam(':caminho2', $destPath2);
                                $stmt->bindParam(':caminho3', $destPath3);
                                $stmt->bindParam(':id', $ultimo_id);
                                if ($stmt->execute()) {
                                    echo "<script>
                                        Swal.fire({
                                            icon: 'success',
                                            title: 'Formulário submetido com sucesso!',
                                            text: '',
                                        }).then((result) => {
                                            if (result.isConfirmed) {
                                                window.location.href = '../../view/dash_user/secure-billing2.php?mark=$ultimo_id&area=EnsinoMedio&curso=$curso&inst=$inst&user=$est&taged=12g653ydte4it8y5';
                                            }else{
                                                window.location.href = '../../view/dash_user/secure-billing2.php?mark=$ultimo_id&area=EnsinoMedio&curso=$curso&inst=$inst&user=$est&taged=12g653ydte4it8y5';
                                            }
                                            });
                                    </script>";
                                } else {
                                    echo "<script>
                                        Swal.fire({
                                            icon: 'error',
                                            title: 'Erro ao salvar o caminho do arquivo no banco de dados!',
                                            text: '',
                                        }).then((result) => {
                                            if (result.isConfirmed) {
                                                window.location.href = '../../view/dash_user/index.php';
                                            }
                                        });
                                    </script>";
                                }
                            } else {
                                echo "<script>
                                    Swal.fire({
                                        icon: 'error',
                                        title: 'Erro ao mover o arquivo para o diretório de destino!',
                                        text: '',
                                    }).then((result) => {
                                        if (result.isConfirmed) {
                                            window.location.href = '../../view/dash_user/index.php';
                                        }
                                    });
                                </script>";
                            }
                        } else {
                            echo "<script>
                                Swal.fire({
                                    icon: 'error',
                                    title: 'O arquivo enviado não é um arquivo PDF ou de imagem!',
                                    text: '',
                                }).then((result) => {
                                    if (result.isConfirmed) {
                                        window.location.href = '../../view/dash_user/ver-inscricoes.php';
                                    }
                                });
                            </script>";
                        }
                    
                    } else {
                        echo "<script>
                            Swal.fire({
                                icon: 'error',
                                title: 'Erro no envio do arquivo!',
                                text: '',
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    window.location.href = '../../view/dash_user/ver-inscricoes.php';
                                }
                            });
                        </script>";
                    }
        
                }
            }
        }
    }

    if($_POST['tipo'] === 'matriculaSuperior'){

        $est = $_POST['utilizador'];
        $inst =  $_POST['instituicao'];
        $certificado = $_FILES['certificado'];
        $atest_medico = $_FILES['atest_medico'];
        $vacina = $_FILES['vacina'];
        $curso =  $_POST['curso'];
        $inscricao =  $_POST['inscricao'];

        $super = "SELECT * FROM matricula_superior WHERE id_est = :est AND id_curso  = :curs AND id_inst = :inst";
        $stmt = $pdo->prepare($super);
        $stmt->bindParam(':est', $est);
        $stmt->bindParam(':curs', $curso);
        $stmt->bindParam(':inst', $inst);
        $stmt->execute();
        if($stmt ->rowCount() > 0){
            echo "<script>
                Swal.fire({
                    icon: 'error',
                    title: 'Já está matriculado nesta instituição!',
                    text: '',
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = '../../view/dash_user/index.php';
                    }else{
                        window.location.href = '../../view/dash_user/index.php';
                    }
                });
            </script>";
        }else{
            $super = "SELECT * FROM matricula_superior WHERE id_est = :est AND id_inst = :inst";
            $stmt = $pdo->prepare($super);
            $stmt->bindParam(':est', $est);
            $stmt->bindParam(':inst', $inst);
            $stmt->execute();
            if($stmt ->rowCount() > 0){
                echo "<script>
                    Swal.fire({
                        icon: 'error',
                        title: 'Atingiu o limite de matrículas (1) nesta instituição!',
                        text: '',
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = '../../view/dash_user/index.php';
                        }
                    });
                </script>";
            }else{
                $sql = "INSERT INTO matricula_superior(id_inst, id_est, id_curso, id_inscricao) VALUES (:inst, :est, :curs, :insc)";
                $stmt = $pdo->prepare($sql);
                $stmt->bindParam(':inst', $inst);
                $stmt->bindParam(':est', $est);
                $stmt->bindParam(':curs', $curso);
                $stmt->bindParam(':insc', $inscricao);
        
                if ($stmt->execute()){
        
                    if (($_FILES['certificado']['error'] === UPLOAD_ERR_OK) && ($_FILES['atest_medico']['error'] === UPLOAD_ERR_OK) && ($_FILES['vacina']['error'] === UPLOAD_ERR_OK)) {
                        $fileTmpPath = $_FILES['certificado']['tmp_name'];
                        $fileTmpPath2 = $_FILES['atest_medico']['tmp_name'];
                        $fileTmpPath3 = $_FILES['vacina']['tmp_name'];

                        $fileName = $_FILES['certificado']['name'];
                        $fileName2 = $_FILES['atest_medico']['name'];
                        $fileName3 = $_FILES['vacina']['name'];
                    
                        // Verifica o tipo MIME do arquivo
                        $mime_type = mime_content_type($fileTmpPath);
                        $mime_type2 = mime_content_type($fileTmpPath2);
                        $mime_type3 = mime_content_type($fileTmpPath3);

                        if ((strpos($mime_type, 'pdf') !== false || strpos($mime_type, 'image')) && (strpos($mime_type2, 'pdf') !== false || strpos($mime_type2, 'image') !== false) && (strpos($mime_type3, 'pdf') !== false || strpos($mime_type3, 'image') !== false)){
                    
                            $ultimo_id = $pdo->lastInsertId();
                    
                            // Define o diretório de destino
                            $uploadDir = criarDiretorioPdf2($ultimo_id, "certificado");
                            $uploadDir2 = criarDiretorioPdf2($ultimo_id, "atestado");
                            $uploadDir3 = criarDiretorioPdf2($ultimo_id, "cartao-vacina");
                    
                            // Move o arquivo para o diretório de destino
                            $destPath = $uploadDir . $fileName;
                            $destPath2 = $uploadDir2 . $fileName2;
                            $destPath3 = $uploadDir3 . $fileName3;

                            if ((move_uploaded_file($fileTmpPath, $destPath)) && (move_uploaded_file($fileTmpPath2, $destPath2)) && (move_uploaded_file($fileTmpPath3, $destPath3))) {

                                // Consulta SQL para atualizar o caminho do arquivo para o registro com ID igual a 34
                                $sql = "UPDATE matricula_superior SET certificado = :caminho, atestado_medico = :caminho2, cartao_vacina = :caminho3 WHERE id = :id";
                                $stmt = $pdo->prepare($sql);
                                $stmt->bindParam(':caminho', $destPath);
                                $stmt->bindParam(':caminho2', $destPath2);
                                $stmt->bindParam(':caminho3', $destPath3);
                                $stmt->bindParam(':id', $ultimo_id);
                                if ($stmt->execute()) {
                                    echo "<script>
                                        Swal.fire({
                                            icon: 'success',
                                            title: 'Formulário submetido com sucesso!',
                                            text: '',
                                        }).then((result) => {
                                            if (result.isConfirmed) {
                                                window.location.href = '../../view/dash_user/secure-billing2.php?mark=$ultimo_id&area=EnsinoSuperior&curso=$curso&inst=$inst&user=$est&taged=12g653ydte4it8y5';
                                            }else{
                                                window.location.href = '../../view/dash_user/secure-billing2.php?mark=$ultimo_id&area=EnsinoSuperior&curso=$curso&inst=$inst&user=$est&taged=12g653ydte4it8y5';
                                            }
                                            });
                                    </script>";
                                } else {
                                    echo "<script>
                                        Swal.fire({
                                            icon: 'error',
                                            title: 'Erro ao salvar o caminho do arquivo no banco de dados!',
                                            text: '',
                                        }).then((result) => {
                                            if (result.isConfirmed) {
                                                window.location.href = '../../view/dash_user/index.php';
                                            }
                                        });
                                    </script>";
                                }
                            } else {
                                echo "<script>
                                    Swal.fire({
                                        icon: 'error',
                                        title: 'Erro ao mover o arquivo para o diretório de destino!',
                                        text: '',
                                    }).then((result) => {
                                        if (result.isConfirmed) {
                                            window.location.href = '../../view/dash_user/index.php';
                                        }
                                    });
                                </script>";
                            }
                        } else {
                            echo "<script>
                                Swal.fire({
                                    icon: 'error',
                                    title: 'O arquivo enviado não é um arquivo PDF ou de imagem!',
                                    text: '',
                                }).then((result) => {
                                    if (result.isConfirmed) {
                                        window.location.href = '../../view/dash_user/ver-inscricoes.php';
                                    }
                                });
                            </script>";
                        }
                    
                    } else {
                        echo "<script>
                            Swal.fire({
                                icon: 'error',
                                title: 'Erro no envio do arquivo!',
                                text: '',
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    window.location.href = '../../view/dash_user/ver-inscricoes.php';
                                }
                            });
                        </script>";
                    }
        
                }
            }
        }
    }

    if($_POST['tipo'] === 'pagarInscricao'){
        $id_user = $_POST['user'];
        $id_inst = $_POST['inst'];
        $id_curso = $_POST['curso'];
        $area = $_POST['area'];
        $id_inscricao =  $_POST['register'];
    
        $cartao =  $_POST['cartao'];
        $validade =  $_POST['validade'];
        $codigo =  $_POST['codigo'];
    
        // Escapando os valores para evitar injeção de SQL
        $cartao = $pdo->quote($cartao);
        $validade = $pdo->quote($validade);
        $codigo = $pdo->quote($codigo);
    
        $sql_ultra = "SELECT * FROM conta_user WHERE id_est = $id_user AND cartao_number = $cartao AND exp_data = $validade AND codigo = $codigo";
        $stmt_ultra = $pdo->query($sql_ultra);
        if($stmt_ultra->rowCount() !== 0){
            
            $inscricaoTable = ($area === 'EnsinoMedio') ? 'inscricao_medio' : 'inscricao_superior';
            $sqlinside = "UPDATE $inscricaoTable SET pagamento = 'Aprovado'";
            $stmt_inside = $pdo -> query($sqlinside);
            if($stmt_inside){
                echo "<script>
                    Swal.fire({
                        icon: 'success',
                        title: 'Pagamento efectuado com sucesso',
                        text: '',
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = '../../view/dash_user/comprovando.php?register=$id_inscricao&area=$area&user=$id_user&taged=12g653ydte4it8y5';
                        }else{
                            window.location.href = '../../view/dash_user/comprovando.php?register=$id_inscricao&area=$area&user=$id_user&taged=12g653ydte4it8y5';
                        }
                    });
                </script>";
            }                      
        } else {
            echo "<script>
                Swal.fire({
                    icon: 'error',
                    title: 'Dados inválidos',
                    text: 'Falha ao processar o pagamento.',
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = '../../view/dash_user/secure-billing.php?register=$id_inscricao&area=$area&curso=$id_curso&inst=$id_inst&user=$id_user&taged=12g653ydte4it8y5';
                    }else{
                        window.location.href = '../../view/dash_user/secure-billing.php?register=$id_inscricao&area=$area&curso=$id_curso&inst=$id_inst&user=$id_user&taged=12g653ydte4it8y5';
                    }
                });
            </script>";
        }
    } 

    if($_POST['tipo'] === 'pagarMatricula'){
        $id_user = $_POST['user'];
        $id_inst = $_POST['inst'];
        $id_curso = $_POST['curso'];
        $area = $_POST['area'];
        $id_matricula =  $_POST['mark'];
    
        $cartao =  $_POST['cartao'];
        $validade =  $_POST['validade'];
        $codigo =  $_POST['codigo'];
    
        // Escapando os valores para evitar injeção de SQL
        $cartao = $pdo->quote($cartao);
        $validade = $pdo->quote($validade);
        $codigo = $pdo->quote($codigo);
    
        $sql_ultra = "SELECT * FROM conta_user WHERE id_est = $id_user AND cartao_number = $cartao AND exp_data = $validade AND codigo = $codigo";
        $stmt_ultra = $pdo->query($sql_ultra);
        if($stmt_ultra->rowCount() !== 0){
            
            $matriculaTable = ($area === 'EnsinoMedio') ? 'matricula_medio' : 'matricula_superior';
            $sqlinside = "UPDATE $matriculaTable SET pagamento = 'Aprovado', estado = 'Feita'";
            $stmt_inside = $pdo -> query($sqlinside);

            if($stmt_inside){
                echo "<script>
                    Swal.fire({
                        icon: 'success',
                        title: 'Pagamento efectuado com sucesso',
                        text: '',
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = '../../view/dash_user/comprovando2.php?mark=$id_matricula&area=$area&user=$id_user&taged=12g653ydte4it8y5';
                        }else{
                            window.location.href = '../../view/dash_user/comprovando2.php?mark=$id_matricula&area=$area&user=$id_user&taged=12g653ydte4it8y5';
                        }
                    });
                </script>";
            }                      
        } else {
            echo "<script>
                Swal.fire({
                    icon: 'error',
                    title: 'Dados inválidos',
                    text: 'Falha ao processar o pagamento.',
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = '../../view/dash_user/secure-billing2.php?mark=$id_matricula&area=$area&curso=$id_curso&inst=$id_inst&user=$id_user&taged=12g653ydte4it8y5';
                    }else{
                        window.location.href = '../../view/dash_user/secure-billing2.php?mark=$id_matricula&area=$area&curso=$id_curso&inst=$id_inst&user=$id_user&taged=12g653ydte4it8y5';
                    }
                });
            </script>";
        }
    } 

    if($_POST['tipo'] === 'Bloqueada'){
        $estado = $_POST['tipo'];
        $inst = $_POST['instituicao'];
    
        $sql = "UPDATE mensagem SET estado = :estado WHERE id_inst = :inst";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':estado', $estado);
        $stmt->bindParam(':inst', $inst);
        $stmt->execute();
    
        if($stmt){
            echo "<script>
                Swal.fire({
                    icon: 'success',
                    title: 'Mensagem bloqueada com sucesso!',
                    text: '',
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = '../../view/dash_admin/ver-sms.php';
                    }else{
                        window.location.href = '../../view/dash_admin/ver-sms.php';
                    }
                });
            </script>";
        }
        exit();
    }    

    if($_POST['tipo'] === 'Publicada'){
        $estado = $_POST['tipo'];
        $inst = $_POST['instituicao'];
    
        $sql = "UPDATE  mensagem SET estado = :estado WHERE id_inst = :inst";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':estado', $estado);
        $stmt->bindParam(':inst', $inst);
        $stmt->execute();
    
        if($stmt){
            echo "<script>
                Swal.fire({
                    icon: 'success',
                    title: 'Mensagem Publicada com sucesso!',
                    text: '',
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = '../../view/dash_admin/ver-sms.php';
                    }else{
                        window.location.href = '../../view/dash_admin/ver-sms.php';
                    }
                });
            </script>";
        }
        exit();
    }    

    if($_POST['tipo'] === 'AprovarInst'){
        $inst = $_POST['inst'];
    
        $sql = "UPDATE  instituicao SET estado = 'Aprovada' WHERE id_instituicao = :inst";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':inst', $inst);
        $stmt->execute();
    
        if($stmt){
            echo "<script>
                Swal.fire({
                    icon: 'success',
                    title: 'Instituicao Aprovada com sucesso!',
                    text: '',
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = '../../view/dash_admin/ver-escolas-1.php';
                    }else{
                        window.location.href = '../../view/dash_admin/ver-escolas-1.php';
                    }
                });
            </script>";
        }
        exit();
    }  
      
    if($_POST['tipo'] === 'AprovarInst2'){
        $inst = $_POST['inst'];
    
        $sql = "UPDATE  instituicao SET estado = 'Aprovada' WHERE id_instituicao = :inst";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':inst', $inst);
            $stmt->execute();
        
            if($stmt){
                echo "<script>
                    Swal.fire({
                        icon: 'success',
                        title: 'Instituicao Aprovada com sucesso!',
                        text: '',
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = '../../view/dash_admin/ver-escolas-2.php';
                        }else{
                            window.location.href = '../../view/dash_admin/ver-escolas-2.php';
                        }
                    });
                </script>";
            }
        exit();
    }

    if($_POST['tipo'] === 'BlockInst'){
        $inst = $_POST['inst'];
    
        $sql = "UPDATE  instituicao SET estado = 'Pendente' WHERE id_instituicao = :inst";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':inst', $inst);
            $stmt->execute();
        
            if($stmt){
                echo "<script>
                    Swal.fire({
                        icon: 'success',
                        title: 'Instituicao Bloqueada com sucesso!',
                        text: '',
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = '../../view/dash_admin/ver-escolas-1.php';
                        }else{
                            window.location.href = '../../view/dash_admin/ver-escolas-1.php';
                        }
                    });
                </script>";
            }
            exit();
    }
    
    if($_POST['tipo'] === 'BlockInst2'){
        $inst = $_POST['inst'];
    
        $sql = "UPDATE  instituicao SET estado = 'Pendente' WHERE id_instituicao = :inst";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':inst', $inst);
            $stmt->execute();
        
            if($stmt){
                echo "<script>
                    Swal.fire({
                        icon: 'success',
                        title: 'Instituicao Bloqueada com sucesso!',
                        text: '',
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = '../../view/dash_admin/ver-escolas-2.php';
                        }else{
                            window.location.href = '../../view/dash_admin/ver-escolas-2.php';
                        }
                    });
                </script>";
            }
            exit();
    }

} else {

    echo "<script>
        Swal.fire({
            icon: 'error',
            title: 'Método não permitido!',
            text: '',
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = '../../view/auth/signup2.php';
            }
        });
    </script>";
}

?>