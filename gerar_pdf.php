<?php

require_once('tcpdf/tcpdf.php');

require("conexao.php");

// Tabela Visão geral dos alunos do 1ª Ano 2023

// Consulta SQL para obter os dados
$sql_code = "SELECT curso, COUNT(*) AS total_alunos, CONCAT(ROUND((COUNT(*) / (SELECT COUNT(*) FROM Dados)) * 100, 2), '%') AS porcentagem_alunos FROM Dados WHERE curso IN ('comércio', 'administração', 'informática', 'enfermagem') GROUP BY curso";
$result = mysqli_query($mysqli, $sql_code);

// Criar o objeto PDF
$pdf = new TCPDF('P', 'mm', 'A4', true, 'UTF-8');
$pdf->SetCreator('Trabalho Web');
$pdf->SetAuthor('Trabalho Web');
$pdf->SetTitle('Relatório em PDF');
$pdf->SetAutoPageBreak(true, 10);

// Adicionar página
$pdf->AddPage();

// Configurações da tabela
$pdf->SetFont('helvetica', 'B', 12);
$pdf->SetFillColor(180, 180, 180);
$pdf->SetTextColor(0, 0, 0);
$pdf->SetDrawColor(0, 0, 0);

// Caminhos para as imagens SVG do cabeçalho e rodapé
$caminhoCabecalho = 'img/header.svg';
$caminhoRodape = 'img/ondas-governo-rodape.svg';

// Adicionar cabeçalho
$pdf->SetHeaderData($caminhoCabecalho);

// Adicionar rodapé
$pdf->SetFooterData($caminhoRodape);

// Título
$pdf->SetFont('helvetica', 'B', 10);
$pdf->Cell(0, 10, 'Visão geral dos alunos do 1ª Ano 2023', 0, 1, 'C');

// Cabeçalho da tabela
$pdf->Cell(50, 10, 'Curso', 1, 0, 'C', 1);
$pdf->Cell(70, 10, 'Quant. Alunos', 1, 0, 'C', 1);
$pdf->Cell(50, 10, 'Porcentagem', 1, 1, 'C', 1);

// Preencher a tabela com os dados
while ($row = $result->fetch_assoc()) {
    $pdf->Cell(50, 10, $row['curso'], 1, 0, 'C');
    $pdf->Cell(70, 10, $row['total_alunos'], 1, 0, 'C');
    $pdf->Cell(50, 10, $row['porcentagem_alunos'], 1, 1, 'C');
}

// Tabela Mães Empregadas

// Consulta SQL para obter os dados
$sql_code = "SELECT empregadoMae, COUNT(*) AS quantidade, CONCAT(FORMAT(COUNT(*) * 100 / SUM(COUNT(*)) OVER(), 2), '%') AS porcentagem FROM Dados GROUP BY empregadoMae; ";
$result = mysqli_query($mysqli, $sql_code);

// Título
$pdf->SetFont('helvetica', 'B', 10);
$pdf->Cell(0, 10, 'Mães Empregadas', 0, 1, 'C');

// Cabeçalho da tabela
$pdf->Cell(50, 10, 'Mães Empregadas', 1, 0, 'C', 1);
$pdf->Cell(70, 10, 'Quant. de Maes', 1, 0, 'C', 1);
$pdf->Cell(50, 10, 'Porcentagem', 1, 1, 'C', 1);

// Preencher a tabela com os dados
while ($row = $result->fetch_assoc()) {
    $pdf->Cell(50, 10, $row['empregadoMae'], 1, 0, 'C');
    $pdf->Cell(70, 10, $row['quantidade'], 1, 0, 'C');
    $pdf->Cell(50, 10, $row['porcentagem'], 1, 1, 'C');
}

// Tabela Pais Empregados

// Consulta SQL para obter os dados
$sql_code = "SELECT empregado, COUNT(*) AS quantidade, CONCAT(FORMAT(COUNT(*) * 100 / SUM(COUNT(*)) OVER(), 2), '%') AS porcentagem FROM Dados GROUP BY empregado; ";
$result = mysqli_query($mysqli, $sql_code);

// Título
$pdf->SetFont('helvetica', 'B', 10);
$pdf->Cell(0, 10, 'Pais Empregados', 0, 1, 'C');

// Cabeçalho da tabela
$pdf->Cell(50, 10, 'Pais Empregados', 1, 0, 'C', 1);
$pdf->Cell(70, 10, 'Quant. de Pais', 1, 0, 'C', 1);
$pdf->Cell(50, 10, 'Porcentagem', 1, 1, 'C', 1);

// Preencher a tabela com os dados
while ($row = $result->fetch_assoc()) {
    $pdf->Cell(50, 10, $row['empregado'], 1, 0, 'C');
    $pdf->Cell(70, 10, $row['quantidade'], 1, 0, 'C');
    $pdf->Cell(50, 10, $row['porcentagem'], 1, 1, 'C');
}

// Tabela Escolaridade do Pai

// Consulta SQL para obter os dados
$sql_code = "SELECT escolaridadePai, COUNT(*) AS quantidade, CONCAT(FORMAT(COUNT(*) * 100 / SUM(COUNT(*)) OVER(), 2), '%') AS porcentagem FROM Dados GROUP BY escolaridadePai; ";
$result = mysqli_query($mysqli, $sql_code);

// Título
$pdf->SetFont('helvetica', 'B', 10);
$pdf->Cell(0, 10, 'Escolaridade dos Pais', 0, 1, 'C');

// Cabeçalho da tabela
$pdf->Cell(50, 10, 'Escolaridade', 1, 0, 'C', 1);
$pdf->Cell(70, 10, 'Quant. de Pais', 1, 0, 'C', 1);
$pdf->Cell(50, 10, 'Porcentagem', 1, 1, 'C', 1);

// Preencher a tabela com os dados
while ($row = $result->fetch_assoc()) {
    $pdf->Cell(50, 10, $row['escolaridadePai'], 1, 0, 'C');
    $pdf->Cell(70, 10, $row['quantidade'], 1, 0, 'C');
    $pdf->Cell(50, 10, $row['porcentagem'], 1, 1, 'C');
}

// Tabela Escolaridade da Mãe

// Consulta SQL para obter os dados
$sql_code = "SELECT escola2, COUNT(*) AS quantidade, CONCAT(FORMAT(COUNT(*) * 100 / SUM(COUNT(*)) OVER(), 2), '%') AS porcentagem FROM Dados GROUP BY escola2; ";
$result = mysqli_query($mysqli, $sql_code);

// Título
$pdf->SetFont('helvetica', 'B', 10);
$pdf->Cell(0, 10, 'Escolaridade das Mães', 0, 1, 'C');

// Cabeçalho da tabela
$pdf->Cell(50, 10, 'Escolaridade', 1, 0, 'C', 1);
$pdf->Cell(70, 10, 'Quant. de Mães', 1, 0, 'C', 1);
$pdf->Cell(50, 10, 'Porcentagem', 1, 1, 'C', 1);

// Preencher a tabela com os dados
while ($row = $result->fetch_assoc()) {
    $pdf->Cell(50, 10, $row['escola2'], 1, 0, 'C');
    $pdf->Cell(70, 10, $row['quantidade'], 1, 0, 'C');
    $pdf->Cell(50, 10, $row['porcentagem'], 1, 1, 'C');
}

// Tabela Pessoas que Residem com o Aluno

// Consulta SQL para obter os dados
$sql_code = "SELECT alunoMora, COUNT(*) AS quantidade, CONCAT(FORMAT(COUNT(*) * 100 / SUM(COUNT(*)) OVER(), 2), '%') AS porcentagem FROM Dados GROUP BY alunoMora; ";
$result = mysqli_query($mysqli, $sql_code);

// Título
$pdf->SetFont('helvetica', 'B', 10);
$pdf->Cell(0, 10, 'Pessoas que Residem com o Aluno', 0, 1, 'C');

// Cabeçalho da tabela
$pdf->Cell(50, 10, 'Resid. com Aluno', 1, 0, 'C', 1);
$pdf->Cell(70, 10, 'Quant. de Pessoas', 1, 0, 'C', 1);
$pdf->Cell(50, 10, 'Porcentagem', 1, 1, 'C', 1);

// Preencher a tabela com os dados
while ($row = $result->fetch_assoc()) {
    $pdf->Cell(50, 10, $row['alunoMora'], 1, 0, 'C');
    $pdf->Cell(70, 10, $row['quantidade'], 1, 0, 'C');
    $pdf->Cell(50, 10, $row['porcentagem'], 1, 1, 'C');
}

// Tabela Tipos de Moradia

// Consulta SQL para obter os dados
$sql_code = "SELECT moradia, COUNT(*) AS quantidade, CONCAT(FORMAT(COUNT(*) * 100 / SUM(COUNT(*)) OVER(), 2), '%') AS porcentagem FROM Dados GROUP BY moradia; ";
$result = mysqli_query($mysqli, $sql_code);

// Título
$pdf->SetFont('helvetica', 'B', 10);
$pdf->Cell(0, 10, 'Tipos de Moradia', 0, 1, 'C');

// Cabeçalho da tabela
$pdf->Cell(50, 10, 'Moradia', 1, 0, 'C', 1);
$pdf->Cell(70, 10, 'Quant. de Pessoas', 1, 0, 'C', 1);
$pdf->Cell(50, 10, 'Porcentagem', 1, 1, 'C', 1);

// Preencher a tabela com os dados
while ($row = $result->fetch_assoc()) {
    $pdf->Cell(50, 10, $row['moradia'], 1, 0, 'C');
    $pdf->Cell(70, 10, $row['quantidade'], 1, 0, 'C');
    $pdf->Cell(50, 10, $row['porcentagem'], 1, 1, 'C');
}

// Tabela Renda Mensal

// Consulta SQL para obter os dados
$sql_code = "SELECT rendaMensalFamiliar, COUNT(*) AS quantidade, CONCAT(FORMAT(COUNT(*) * 100 / SUM(COUNT(*)) OVER(), 2), '%') AS porcentagem FROM Dados GROUP BY rendaMensalFamiliar; ";
$result = mysqli_query($mysqli, $sql_code);

// Título
$pdf->SetFont('helvetica', 'B', 10);
$pdf->Cell(0, 10, 'Renda Mensal', 0, 1, 'C');

// Cabeçalho da tabela
$pdf->Cell(50, 10, 'Renda Mensal', 1, 0, 'C', 1);
$pdf->Cell(70, 10, 'Quant. de Famílias', 1, 0, 'C', 1);
$pdf->Cell(50, 10, 'Porcentagem', 1, 1, 'C', 1);

// Preencher a tabela com os dados
while ($row = $result->fetch_assoc()) {
    $pdf->Cell(50, 10, $row['rendaMensalFamiliar'], 1, 0, 'C');
    $pdf->Cell(70, 10, $row['quantidade'], 1, 0, 'C');
    $pdf->Cell(50, 10, $row['porcentagem'], 1, 1, 'C');
}

// Tabela Aonde o Aluno Concluiu o Ensino Fundamental

// Consulta SQL para obter os dados
$sql_code = "SELECT alunoEnsinoFundamental, COUNT(*) AS quantidade, CONCAT(FORMAT(COUNT(*) * 100 / SUM(COUNT(*)) OVER(), 2), '%') AS porcentagem FROM Dados GROUP BY alunoEnsinoFundamental; ";
$result = mysqli_query($mysqli, $sql_code);

// Título
$pdf->SetFont('helvetica', 'B', 10);
$pdf->Cell(0, 10, 'Aonde o Aluno Concluiu o Ensino Fundamental', 0, 1, 'C');

// Cabeçalho da tabela
$pdf->Cell(50, 10, 'Tip. Escola', 1, 0, 'C', 1);
$pdf->Cell(70, 10, 'Quant. de Alunos', 1, 0, 'C', 1);
$pdf->Cell(50, 10, 'Porcentagem', 1, 1, 'C', 1);

// Preencher a tabela com os dados
while ($row = $result->fetch_assoc()) {
    $pdf->Cell(50, 10, $row['alunoEnsinoFundamental'], 1, 0, 'C');
    $pdf->Cell(70, 10, $row['quantidade'], 1, 0, 'C');
    $pdf->Cell(50, 10, $row['porcentagem'], 1, 1, 'C');
}

$pdf->Output('relatorio.pdf', 'D');

?>