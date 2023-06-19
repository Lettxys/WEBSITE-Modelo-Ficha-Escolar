<?php
	
	$servidor = "localhost";
	$username = "root";
	$password = "";
	$database = "bancofs";

	$connection = mysqli_connect($servidor, $username, $password, $database);
	if (!$connection) {
		echo "Não conectado ";	
	}

	// Query SQL para atualizar os campos vazios como NULL
$sql = "UPDATE Dados SET alergiasInpN = NULL WHERE alergiasInpN = ''";
$result = mysqli_query($connection, $sql);

// Verificação de erros na consulta 0
if (!$result) {
    echo 'Erro na consulta: ' . mysqli_error($connection);
    exit;
}

$sql1 = "UPDATE Dados SET restAlInpN = NULL WHERE restAlInpN = ''";
$result1 = mysqli_query($connection, $sql1);

// Verificação de erros na consulta 1

if (!$result1) {
    echo 'Erro na consulta: ' . mysqli_error($connection);
    exit;
}

// Verificação de erros na consulta 2

$sql2 = "UPDATE Dados SET tratamentoMInN = NULL WHERE tratamentoMInN = ''";
$result2 = mysqli_query($connection, $sql2);

if (!$result2) {
    echo 'Erro na consulta: ' . mysqli_error($connection);
    exit;
}

// Verificação de erros na consulta 3

$sql3 = "UPDATE Dados SET medicacaoInpN = NULL WHERE medicacaoInpN = ''";
$result3 = mysqli_query($connection, $sql3);

if (!$result3) {
    echo 'Erro na consulta: ' . mysqli_error($connection);
    exit;
}

// Verificação de erros na consulta 4

$sql4 = "UPDATE Dados SET informacaoInpN = NULL WHERE informacaoInpN = ''";
$result4 = mysqli_query($connection, $sql4);

if (!$result4) {
    echo 'Erro na consulta: ' . mysqli_error($connection);
    exit;
}



?>