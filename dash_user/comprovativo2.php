<?php
require_once('../../tcpdf/tcpdf.php');
include_once "../../model/conexao.php";

// Verifica se o ID de inscrição foi passado via GET
if(isset($_GET['mark'])){
    // Adicione o ID da inscrição ao PDF
    $id_matricula = $_GET['mark'];
    $area = $_GET['area'];
    $user = $_GET['user']; 

    $tableMatricula = ($area === 'EnsinoMedio') ? 'matricula_medio' : 'matricula_superior';
    $sql1 = "SELECT * FROM $tableMatricula WHERE id = $id_matricula";
    $stmt1 = $pdo ->query($sql1);
    $row1 = $stmt1 -> fetch(PDO::FETCH_ASSOC);

    $sql2 = "SELECT * FROM utilizador WHERE id_utilizador = $user";
    $stmt2 = $pdo ->query($sql2);
    $row2 = $stmt2 -> fetch(PDO::FETCH_ASSOC);

    $inst = $row1['id_inst'];
    $sql3 = "SELECT * FROM instituicao WHERE id_instituicao = $inst";
    $stmt3 = $pdo ->query($sql3);
    $row3 = $stmt3 -> fetch(PDO::FETCH_ASSOC);

    // Crie uma nova instância do TCPDF
    $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

    // Define as informações do documento
    $pdf->SetCreator(PDF_CREATOR);
    $pdf->SetAuthor('Suiea - Sistema Unificado de Inscrições Escolares de Angola');
    $pdf->SetTitle('Comprovativo de Inscrição');
    $pdf->SetSubject('Comprovativo de Inscrição');

    // Adicione uma página
    $pdf->AddPage();

    $pdf->Ln(5);
    // Adicione o conteúdo do PDF
    $pdf->SetFont('times', 'B', 16);
    $pdf->Cell(0, 10, 'Comprovativo de pagamento de Matrícula', 0, 1, 'C');
    $pdf->Ln(20);

    $pdf->SetFont('times', '', 14);
    $pdf->Cell(0, 10, 'Nome do Utilizador | ' . $row2['nome'], 0, 1, 'C');
    $pdf->Cell(0, 10, 'Gênero | ' . $row2['genero'], 0, 1, 'C');
    $pdf->Cell(0, 10, 'Nascimento | ' . $row2['nascimento'], 0, 1, 'C');
    $pdf->Cell(0, 10, 'Morada | ' . $row2['morada'], 0, 1, 'C');
    $pdf->Cell(0, 10, 'Email | ' . $row2['email'], 0, 1, 'C');
    $pdf->Cell(0, 10, 'Telefone | ' . $row2['telefone'], 0, 1, 'C');
    $pdf->Ln(20);

    $pdf->Cell(0, 10, 'Nome da instituição | ' . $row3['nome'], 0, 1, 'C');
    $pdf->Cell(0, 10, 'Área de Ensino | ' . $row3['area'], 0, 1, 'C');
    $pdf->Cell(0, 10, 'Tipo de Instituição | ' . $row3['tipo'], 0, 1, 'C');
    $pdf->Cell(0, 10, 'Localização | ' . $row3['localizacao'], 0, 1, 'C');
    $pdf->Cell(0, 10, 'Email | ' . $row3['email'], 0, 1, 'C');
    $pdf->Cell(0, 10, 'Telefone | ' . $row3['telefone'], 0, 1, 'C');
    $pdf->Ln(20);

    $pdf->Cell(0, 10, 'Nª Processo | ' . $row1['id'], 0, 1, 'C');
    $pdf->Cell(0, 10, 'Estado do Pagamento | ' . $row1['pagamento'], 0, 1, 'C');
    $pdf->Cell(0, 10, 'Estado da Matrícula | ' . $row3['estado'], 0, 1, 'C');

    // Saída do PDF para o navegador
    $pdf->Output('comprovativo_matricula_' . $id_matricula . '.pdf', 'I'); // 'I' para visualização direta no navegador

    // Redirecionamento para página de redirecionamento
    //header('Location: ver-inscricoes.php');
    exit(); // Certifica-se de que o script não continue a ser executado após o redirecionamento
} else {
    // Se o ID de inscrição não foi passado, redirecione para uma página de erro ou faça qualquer outra ação necessária
    //header('Location: erro.php');
    exit();
}
?>
