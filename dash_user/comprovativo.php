<?php

  include_once "../../model/conexao.php";
  include_once "../../tcpdf/tcpdf.php";

    // Verifica se o ID de inscrição foi passado via GET
    if(isset($_GET['register'])){
        // Adicione o ID da inscrição ao PDF
        $id_inscricao = $_GET['register'];
        $area = $_GET['area'];
        $user = $_GET['user']; 

        $tableInscricao = ($area === 'EnsinoMedio') ? 'inscricao_medio' : 'inscricao_superior';
        $sql1 = "SELECT * FROM $tableInscricao WHERE id = $id_inscricao";
        $stmt1 = $pdo->query($sql1);
        $row1 = $stmt1->fetch(PDO::FETCH_ASSOC);

        $sql2 = "SELECT * FROM utilizador WHERE id_utilizador = $user";
        $stmt2 = $pdo->query($sql2);
        $row2 = $stmt2->fetch(PDO::FETCH_ASSOC);

        $inst = $row1['id_inst'];
        $sql3 = "SELECT * FROM instituicao WHERE id_instituicao = $inst";
        $stmt3 = $pdo->query($sql3);
        $row3 = $stmt3->fetch(PDO::FETCH_ASSOC);

        // Crie uma nova instância do TCPDF
        $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

        // Define as informações do documento
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('Suiea - Sistema Unificado de Inscrições Escolares de Angola');
        $pdf->SetTitle('Comprovativo de Inscrição');
        $pdf->SetSubject('Comprovativo de Inscrição');

        // Remover margens
        $pdf->SetMargins(0, 0, 0);

        // Adicione uma página
        $pdf->AddPage();

        // Cabeçalho
        $pdf->SetFillColor(0, 5, 74); // Azul
        $pdf->SetTextColor(255, 255, 255); // Branco
        $pdf->SetFont('helvetica', '', 12); // Definir a fonte como Helvetica, tamanho 12, sem negrito
        $pdf->Cell(0, 10, 'SUIEA - Sistema Unificado de Inscrições Escolares de Angola', 0, 1, 'C', true);
        $pdf->Ln(10);        

        // Conteúdo do PDF
        $pdf->SetTextColor(0, 0, 0); // Branco
        $pdf->SetFont('helvetica', 'B', 16);
        $pdf->Cell(0, 10, 'Comprovativo de pagamento de Inscrição', 0, 1, 'C');
        $pdf->Ln(10);

        // Adicionar borda negritada entre os dados à esquerda e à direita
        $pdf->SetLineWidth(0.5);
        $pdf->SetDrawColor(0, 0, 0); // Cor da linha: preto
        $pdf->Line($pdf->GetX(), $pdf->GetY(), $pdf->GetX(), $pdf->GetY() + 120); // Ajuste a altura conforme necessário
        $pdf->Ln(5);

        // Definir largura das colunas
        $colWidth = ($pdf->getPageWidth() - $pdf->getMargins()['left'] - $pdf->getMargins()['right']) / 2 - 2;

        // Primeira coluna (à esquerda)
        $pdf->Cell($colWidth, 10, 'Nome do Utilizador', 'LTRB', 0, 'L', true);
       
    

        $pdf->Cell($colWidth, 10, $row2['nome'], 'LTRB', 1, 'L', false);

        // Restante do conteúdo da segunda coluna...

        // Saída do PDF para o navegador
        $pdf->Output('comprovativo_inscricao_' . $id_inscricao . '.pdf', 'I'); // 'I' para visualização direta no navegador

        exit(); // Certifica-se de que o script não continue a ser executado após a saída do PDF
    }

?>
