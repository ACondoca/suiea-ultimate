<?php
$host = 'localhost';
$dbName = 'suiea';
$user = 'root';
$password = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbName", $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


    $sql_users = "SELECT COUNT(*) as total_users FROM utilizador";
    $stmt_users = $pdo->prepare($sql_users);
    $stmt_users->execute();
    $total_users = $stmt_users->fetch(PDO::FETCH_ASSOC)['total_users'];

    
    $sql_users = "SELECT COUNT(*) as total_users_activos FROM utilizador WHERE estado LIKE 'Activo'";
    $stmt_users = $pdo->prepare($sql_users);
    $stmt_users->execute();
    $total_users_activos = $stmt_users->fetch(PDO::FETCH_ASSOC)['total_users_activos'];

    
    $sql_users = "SELECT COUNT(*) as total_users_nactivos FROM utilizador WHERE estado LIKE 'N Activo'";
    $stmt_users = $pdo->prepare($sql_users);
    $stmt_users->execute();
    $total_users_nactivos = $stmt_users->fetch(PDO::FETCH_ASSOC)['total_users_nactivos'];

    // Consulta para obter o total de instituições
    $sql_institutions = "SELECT COUNT(*) as total_institutions FROM instituicao";
    $stmt_institutions = $pdo->prepare($sql_institutions);
    $stmt_institutions->execute();
    $total_institutions = $stmt_institutions->fetch(PDO::FETCH_ASSOC)['total_institutions'];

     // Consulta para obter o total de instituições aprovadas
     $sql_institutions = "SELECT COUNT(*) as total_institutions_aprovadas FROM instituicao WHERE estado LIKE 'Aprovada'";
     $stmt_institutions = $pdo->prepare($sql_institutions);
     $stmt_institutions->execute();
     $total_institutions_aprovadas = $stmt_institutions->fetch(PDO::FETCH_ASSOC)['total_institutions_aprovadas'];

    // Consulta para obter o total de instituições pendentes
    $sql_institutions = "SELECT COUNT(*) as total_institutions_pendentes FROM instituicao WHERE estado LIKE 'Pendente'";
    $stmt_institutions = $pdo->prepare($sql_institutions);
    $stmt_institutions->execute();
    $total_institutions_pendentes = $stmt_institutions->fetch(PDO::FETCH_ASSOC)['total_institutions_pendentes'];


    // Consulta para obter o total de inscrições ens medio
    $sql_registrations = "SELECT COUNT(*) as total_registrations FROM inscricao_medio";
    $stmt_registrations = $pdo->prepare($sql_registrations);
    $stmt_registrations->execute();
    $total_registrations_medio = $stmt_registrations->fetch(PDO::FETCH_ASSOC)['total_registrations'];

    // Consulta para obter o total de inscrições ens medio
    $sql_registrations = "SELECT COUNT(*) as total_registrations_pendentes FROM inscricao_medio WHERE estado LIKE 'Pendente'";
    $stmt_registrations = $pdo->prepare($sql_registrations);
    $stmt_registrations->execute();
    $total_registrations_medio_pendentes = $stmt_registrations->fetch(PDO::FETCH_ASSOC)['total_registrations_pendentes'];

    // Consulta para obter o total de inscrições ens medio
    $sql_registrations = "SELECT COUNT(*) as total_registrations_aprovadas FROM inscricao_medio WHERE estado LIKE 'Aprovada'";
    $stmt_registrations = $pdo->prepare($sql_registrations);
    $stmt_registrations->execute();
    $total_registrations_medio_aprovadas = $stmt_registrations->fetch(PDO::FETCH_ASSOC)['total_registrations_aprovadas'];

    // Consulta para obter o total de inscrições ens superior
    $sql_registrations = "SELECT COUNT(*) as total_registrations FROM inscricao_superior";
    $stmt_registrations = $pdo->prepare($sql_registrations);
    $stmt_registrations->execute();
    $total_registrations_superior = $stmt_registrations->fetch(PDO::FETCH_ASSOC)['total_registrations'];

     // Consulta para obter o total de inscrições pendentes ens superior
     $sql_registrations = "SELECT COUNT(*) as total_registrations FROM inscricao_superior WHERE estado LIKE 'Pendente'";
     $stmt_registrations = $pdo->prepare($sql_registrations);
     $stmt_registrations->execute();
     $total_registrations_superior_pendentes = $stmt_registrations->fetch(PDO::FETCH_ASSOC)['total_registrations'];

      // Consulta para obter o total de inscrições aprovadas ens superior
      $sql_registrations = "SELECT COUNT(*) as total_registrations_aprovadas FROM inscricao_superior WHERE estado LIKE 'Aprovada'";
      $stmt_registrations = $pdo->prepare($sql_registrations);
      $stmt_registrations->execute();
      $total_registrations_superior_aprovadas = $stmt_registrations->fetch(PDO::FETCH_ASSOC)['total_registrations_aprovadas'];

    // Consulta para obter o total de matriculas ens medio
    $sql_registrations = "SELECT COUNT(*) as total_registrations FROM matricula_medio";
    $stmt_registrations = $pdo->prepare($sql_registrations);
    $stmt_registrations->execute();
    $total_matriculas_medio = $stmt_registrations->fetch(PDO::FETCH_ASSOC)['total_registrations'];

    // Consulta para obter o total de matriculas pendentes ens medio
    $sql_registrations = "SELECT COUNT(*) as total_registrations FROM matricula_medio WHERE estado LIKE 'Pendente'";
    $stmt_registrations = $pdo->prepare($sql_registrations);
    $stmt_registrations->execute();
    $total_matriculas_medio_pendentes = $stmt_registrations->fetch(PDO::FETCH_ASSOC)['total_registrations'];

    // Consulta para obter o total de matriculas ens superior
    $sql_registrations = "SELECT COUNT(*) as total_registrations FROM matricula_superior";
    $stmt_registrations = $pdo->prepare($sql_registrations);
    $stmt_registrations->execute();
    $total_matriculas_superior = $stmt_registrations->fetch(PDO::FETCH_ASSOC)['total_registrations'];

    // Consulta para obter o total de matriculas pendentes ens superior
    $sql_registrations = "SELECT COUNT(*) as total_registrations FROM matricula_superior WHERE estado LIKE 'Pendente'";
    $stmt_registrations = $pdo->prepare($sql_registrations);
    $stmt_registrations->execute();
    $total_matriculas_superior_pendentes = $stmt_registrations->fetch(PDO::FETCH_ASSOC)['total_registrations'];

    // Consulta para obter o total de mensagens
    $sql_messages = "SELECT COUNT(*) as total_messages FROM mensagem";
    $stmt_messages = $pdo->prepare($sql_messages);
    $stmt_messages->execute();
    $total_messages = $stmt_messages->fetch(PDO::FETCH_ASSOC)['total_messages'];

    function trazerNomePeloID($id, $tabela) {
        global $host, $dbName, $user, $password;

        $pdo = new PDO("mysql:host=$host;dbname=$dbName", $user, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $pdo->prepare("SELECT nome FROM :tabela WHERE id = :id");
        $stmt->bindParam(':tabela', $tabela);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($row) {
            return $row['nome'];
        } else {
            return null; // Retorna null se o ID não for encontrado
        }
    }


} catch (PDOException $e) {
    echo "Erro ao conectar com o banco de dados: " . $e->getMessage();
    exit();
}

?>