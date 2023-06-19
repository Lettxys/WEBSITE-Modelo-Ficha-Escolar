<?php
include("protect.php");
include("conexao.php");
$total_nomes = "SELECT COUNT(nome) AS total_nomes FROM Dados;";
$sql_query = $mysqli->query($total_nomes);
$resultado = $sql_query->fetch_assoc();
$total_nomes = $resultado['total_nomes'];
$total_familias = "SELECT COUNT(DISTINCT CONCAT(nome, nomePai, nomeMae, moradia)) AS total_familias FROM Dados;";
$sql_query = $mysqli->query($total_familias);
$resultado = $sql_query->fetch_assoc();
$total_familias = $resultado['total_familias'];
$total_campos = 0;
if ($sql_query = $mysqli->query("SHOW COLUMNS FROM Dados;")) {
    $total_campos = $sql_query->num_rows;
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EEEP Manoel Mano | Relatório</title>
    <link rel="icon" type="image/png" sizes="32x32" href="assets/iconmm.png">
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <!-- Estilização da Página -->
    <link rel="stylesheet" href="styles/graph.css"> 
    <!-- Charts -->
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
    google.charts.load('current', {'packages':['bar']});
    google.charts.setOnLoadCallback(drawOverviewChart);
    function drawOverviewChart() {
        var container = document.getElementById('overview');
        var chartWidth = container.offsetWidth;
        var chartHeight = 250; 
        var data = google.visualization.arrayToDataTable([
            ['Cursos', 'Quantidade de Alunos', 'Porcentagem'],
            <?php
              include "conexao.php";
              if($mysqli->connect_errno) {
                die("Erro ao conectar com o banco de dados: " . $mysqli->connect_error);
              }
              $sql = "SELECT curso, COUNT(*) AS total_alunos, CONCAT(ROUND((COUNT(*) / (SELECT COUNT(*) FROM Dados)) * 100, 2), '%') AS porcentagem_alunos FROM Dados WHERE curso IN ('comércio', 'administração', 'informática', 'enfermagem') GROUP BY curso";
              $result = mysqli_query($mysqli, $sql);
              if(!$result) {
                die("Erro ao executar a consulta: " . $mysqli->error);
              }
              while($dados = mysqli_fetch_array($result)) {
                echo "['" . $dados['curso'] . "', " . $dados['total_alunos'] . ", '" . $dados['porcentagem_alunos'] . "'],";
              }
              $mysqli->close();
            ?>
        ]);
        var options = {
            chart: {
                title: 'Quantidade por Curso',
                subtitle: 'Porcentagem de cada curso na escola',
            },
            width: chartWidth,
            height: chartHeight,
            series: {
                0: { color: '#808080' },
                1: { color: '#00bd19' },
            },
        };
        var chart = new google.charts.Bar(container);
        chart.draw(data, google.charts.Bar.convertOptions(options));
    }
    window.addEventListener('resize', function() {
        drawOverviewChart();
    });
</script>
<script type="text/javascript">
    google.charts.load('current', {'packages':['bar']});
    google.charts.setOnLoadCallback(drawEmployedParentsChart);
    function drawEmployedParentsChart() {
        var container = document.getElementById('employed-parents');
        var chartWidth = container.offsetWidth;
        var chartHeight = 250;
        var data = google.visualization.arrayToDataTable([
            ['Pais Empregados', 'Quantidade de Pais', 'Porcentagem'],
            <?php
              include "conexao.php";
              if($mysqli->connect_errno) {
                die("Erro ao conectar com o banco de dados: " . $mysqli->connect_error);
              }
              $sql = "SELECT empregado, COUNT(*) AS quantidade, CONCAT(FORMAT(COUNT(*) * 100 / SUM(COUNT(*)) OVER(), 2), '%') AS porcentagem FROM Dados GROUP BY empregado; ";
              $result = mysqli_query($mysqli, $sql);
              if(!$result) {
                die("Erro ao executar a consulta: " . $mysqli->error);
              }
              while($dados = mysqli_fetch_array($result)) {
                echo "['" . $dados['empregado'] . "', " . $dados['quantidade'] . ", '" . $dados['porcentagem'] . "'],";
              }
              $mysqli->close();
            ?>
        ]);
        var options = {
            chart: {
                title: 'Quantidade de Pais Empregadas',
                subtitle: 'Porcentagem de cada pai do aluno',
            },
            bars: 'horizontal',
            width: chartWidth,
            height: chartHeight,
            series: {
                0: { color: '#808080' },
                1: { color: '#00bd19' },
            }
        };
        var chart = new google.charts.Bar(container);
        chart.draw(data, google.charts.Bar.convertOptions(options));
    }
    window.addEventListener('resize', function() {
        drawEmployedParentsChart();
    });
</script>
<script type="text/javascript">
    google.charts.load('current', {'packages':['bar']});
    google.charts.setOnLoadCallback(drawParentsSchoolingChart);
    function drawParentsSchoolingChart() {
        var container = document.getElementById('parents-schooling');
        var chartWidth = container.offsetWidth;
        var chartHeight = 250;
        var data = google.visualization.arrayToDataTable([
            ['Escolaridade', 'Quantidade de Pais', 'Porcentagem'],
            <?php
              include "conexao.php";
              if($mysqli->connect_errno) {
                die("Erro ao conectar com o banco de dados: " . $mysqli->connect_error);
              }
              $sql = "SELECT escolaridadePai, COUNT(*) AS quantidade, CONCAT(FORMAT(COUNT(*) * 100 / SUM(COUNT(*)) OVER(), 2), '%') AS porcentagem FROM Dados GROUP BY escolaridadePai; ";
              $result = mysqli_query($mysqli, $sql);
              if(!$result) {
                die("Erro ao executar a consulta: " . $mysqli->error);
              }
              while($dados = mysqli_fetch_array($result)) {
                echo "['" . $dados['escolaridadePai'] . "', " . $dados['quantidade'] . ", '" . $dados['porcentagem'] . "'],";
              }
              $mysqli->close();
            ?>
        ]);
        var options = {
            chart: {
                title: 'Quantidade por Escolaridade',
                subtitle: 'Escolaridade de cada pai, em toda a escola',
            },
            bars: 'horizontal',
            width: chartWidth,
            height: chartHeight,
            series: {
                0: { color: '#808080' },
                1: { color: '#00bd19' },
            },
        };
        var chart = new google.charts.Bar(container);
        chart.draw(data, google.charts.Bar.convertOptions(options));
    }
    window.addEventListener('resize', function() {
        drawParentsSchoolingChart();
    });
</script>
<script type="text/javascript">
    google.charts.load('current', {'packages':['corechart']});
    google.charts.setOnLoadCallback(drawStudentResideChart);
    function drawStudentResideChart() {
        var container = document.getElementById('student-resides');
        var chartWidth = container.offsetWidth;
        var chartHeight = 250;
        var data = google.visualization.arrayToDataTable([
            ['Reside com o Aluno', 'Quantidade de pessoas' ,'Porcentagem'],
            <?php
              include "conexao.php";
              if($mysqli->connect_errno) {
                die("Erro ao conectar com o banco de dados: " . $mysqli->connect_error);
              }
              $sql = "SELECT alunoMora, COUNT(*) AS quantidade, CONCAT(FORMAT(COUNT(*) * 100 / SUM(COUNT(*)) OVER(), 2), '%') AS porcentagem FROM Dados GROUP BY alunoMora; ";
              $result = mysqli_query($mysqli, $sql);
              if(!$result) {
                die("Erro ao executar a consulta: " . $mysqli->error);
              }
              while($dados = mysqli_fetch_array($result)) {
                echo "['" . $dados['alunoMora'] . "', " . $dados['quantidade'] . ", '" . $dados['porcentagem'] . "'],";
              }
              $mysqli->close();
            ?>
        ]);
        var options = {
            title: 'Quantidade por cada aluno',
            subtitle: 'Quantidade de pessoas que residem com o aluno',
            width: chartWidth,
            height: chartHeight,
            colors: ['#ffa500', '#00bd19', '#808080'],
            pieHole: 0.4,
        };
        var chart = new google.visualization.PieChart(container);
        chart.draw(data, options);
    }
    window.addEventListener('resize', function() {
        drawStudentResideChart();
    });
</script>
<script type="text/javascript">
    google.charts.load('current', {'packages':['corechart']});
    google.charts.setOnLoadCallback(drawMonthIncomeChart);
    function drawMonthIncomeChart() {
        var container = document.getElementById('monthly-income');
        var chartWidth = container.offsetWidth;
        var chartHeight = 250;
        var data = google.visualization.arrayToDataTable([
            ['Rensa Mensal', 'Quantidade de famílias' ,'Porcentagem'],
            <?php
              include "conexao.php";
              if($mysqli->connect_errno) {
                die("Erro ao conectar com o banco de dados: " . $mysqli->connect_error);
              }
              $sql = "SELECT rendaMensalFamiliar, COUNT(*) AS quantidade, CONCAT(FORMAT(COUNT(*) * 100 / SUM(COUNT(*)) OVER(), 2), '%') AS porcentagem FROM Dados GROUP BY rendaMensalFamiliar; ";
              $result = mysqli_query($mysqli, $sql);
              if(!$result) {
                die("Erro ao executar a consulta: " . $mysqli->error);
              }
              while($dados = mysqli_fetch_array($result)) {
                echo "['" . $dados['rendaMensalFamiliar'] . "', " . $dados['quantidade'] . ", '" . $dados['porcentagem'] . "'],";
              }
              $mysqli->close();
            ?>
        ]);
        var options = {
            title: 'Renda mensal por cada casa',
            subtitle: 'Renda mensal de cada família do aluno',
            width: chartWidth,
            height: chartHeight,
            colors: ['#808080', '#00bd19', '#0000FF', '#FFA500', '#FF8C00'],
            pieHole: 0.4,
        };
        var chart = new google.visualization.PieChart(container);
        chart.draw(data, options);
    }
    window.addEventListener('resize', function() {
        drawMonthIncomeChart();
    });
</script>
<script type="text/javascript">
    google.charts.load('current', {'packages':['corechart']});
    google.charts.setOnLoadCallback(drawTypeOfHousingChart);
    function drawTypeOfHousingChart() {
        var container = document.getElementById('type-of-housing');
        var chartWidth = container.offsetWidth;
        var chartHeight = 250;
        var data = google.visualization.arrayToDataTable([
            ['Reside com o Aluno', 'Quantidade de pessoas' ,'Porcentagem'],
            <?php
              include "conexao.php";
              if($mysqli->connect_errno) {
                die("Erro ao conectar com o banco de dados: " . $mysqli->connect_error);
              }
              $sql = "SELECT moradia, COUNT(*) AS quantidade, CONCAT(FORMAT(COUNT(*) * 100 / SUM(COUNT(*)) OVER(), 2), '%') AS porcentagem FROM Dados GROUP BY moradia; ";
              $result = mysqli_query($mysqli, $sql);
              if(!$result) {
                die("Erro ao executar a consulta: " . $mysqli->error);
              }
              while($dados = mysqli_fetch_array($result)) {
                echo "['" . $dados['moradia'] . "', " . $dados['quantidade'] . ", '" . $dados['porcentagem'] . "'],";
              }
              $mysqli->close();
            ?>
        ]);
        var options = {
            title: 'Quantidade por cada aluno',
            subtitle: 'Quantidade de pessoas que residem com o aluno',
            width: chartWidth,
            height: chartHeight,
            colors: ['#00bd19', '#808080'],
            pieHole: 0.4, // Define o tamanho do furo no gráfico de rosca (de 0 a 1)
        };
        var chart = new google.visualization.PieChart(container);
        chart.draw(data, options);
    }
    window.addEventListener('resize', function() {
        drawTypeOfHousingChart();
    });
</script>
<script type="text/javascript">
    google.charts.load('current', {'packages':['bar']});
    google.charts.setOnLoadCallback(drawEmployedMothersChart);
    function drawEmployedMothersChart() {
        var container = document.getElementById('employed-mothers');
        var chartWidth = container.offsetWidth;
        var chartHeight = 250;
        var data = google.visualization.arrayToDataTable([
            ['Mães Empregadas', 'Quantidade de Mães', 'Porcentagem'],
            <?php
              include "conexao.php";
              if($mysqli->connect_errno) {
                die("Erro ao conectar com o banco de dados: " . $mysqli->connect_error);
              }
              $sql = "SELECT empregadoMae, COUNT(*) AS quantidade, CONCAT(FORMAT(COUNT(*) * 100 / SUM(COUNT(*)) OVER(), 2), '%') AS porcentagem FROM Dados GROUP BY empregadoMae; ";
              $result = mysqli_query($mysqli, $sql);
              if(!$result) {
                die("Erro ao executar a consulta: " . $mysqli->error);
              }
              while($dados = mysqli_fetch_array($result)) {
                echo "['" . $dados['empregadoMae'] . "', " . $dados['quantidade'] . ", '" . $dados['porcentagem'] . "'],";
              }
              $mysqli->close();
            ?>
        ]);
        var options = {
            chart: {
            title: 'Quantidade de Mães Empregadas',
            subtitle: 'Porcentagem de cada mãe do aluno',
            },
            bars: 'horizontal',
            width: chartWidth,
            height: chartHeight,
            series: {
                0: { color: '#808080' },
                1: { color: '#00bd19' },
            }
        };
        var chart = new google.charts.Bar(container);
        chart.draw(data, google.charts.Bar.convertOptions(options));
    }
    window.addEventListener('resize', function() {
        drawEmployedMothersChart();
    });
</script>
<script type="text/javascript">
    google.charts.load('current', {'packages':['bar']});
    google.charts.setOnLoadCallback(drawMothersSchoolingChart);
    function drawMothersSchoolingChart() {
        var container = document.getElementById('mothers-schooling');
        var chartWidth = container.offsetWidth;
        var chartHeight = 250;
        var data = google.visualization.arrayToDataTable([
            ['Escolaridade', 'Quantidade de escolaridade' ,'Porcentagem'],
            <?php
              include "conexao.php";
              if($mysqli->connect_errno) {
                die("Erro ao conectar com o banco de dados: " . $mysqli->connect_error);
              }
              $sql = "SELECT escolaridadeMae, COUNT(*) AS quantidade, CONCAT(FORMAT(COUNT(*) * 100 / SUM(COUNT(*)) OVER(), 2), '%') AS porcentagem FROM Dados GROUP BY escolaridadeMae; ";
              $result = mysqli_query($mysqli, $sql);
              if(!$result) {
                die("Erro ao executar a consulta: " . $mysqli->error);
              }
              while($dados = mysqli_fetch_array($result)) {
                echo "['" . $dados['escolaridadeMae'] . "', " . $dados['quantidade'] . ", '" . $dados['porcentagem'] . "'],";
              }
              $mysqli->close();
            ?>
        ]);
        var options = {
            chart: {
            title: 'Quantidade por Escolaridade',
            subtitle: 'Escolaridade de cada mãe, em toda a escola',
            },
            bars: 'horizontal',
            width: chartWidth,
            height: chartHeight,
            series: {
                0: { color: '#808080' },
                1: { color: '#00bd19' },
            },
        };
        var chart = new google.charts.Bar(container);
        chart.draw(data, google.charts.Bar.convertOptions(options));
    }
    window.addEventListener('resize', function() {
        drawMothersSchoolingChart();
    });
</script>
<script type="text/javascript">
    google.charts.load('current', {'packages':['bar']});
    google.charts.setOnLoadCallback(drawElementarySchoolChart);
    function drawElementarySchoolChart() {
        var container = document.getElementById('elementary-school');
        var chartWidth = container.offsetWidth;
        var chartHeight = 250; 
        var data = google.visualization.arrayToDataTable([
            ['Tipos de Escola', 'Quantidade de Alunos' ,'Porcentagem'],
            <?php
              include "conexao.php";
              if($mysqli->connect_error) {
                die("Erro ao conectar com o banco de dados: " . $mysqli->connect_error);
              }
              $sql = "SELECT alunoEnsinoFundamental, COUNT(*) AS quantidade, CONCAT(FORMAT(COUNT(*) * 100 / SUM(COUNT(*)) OVER(), 2), '%') AS porcentagem FROM Dados GROUP BY alunoEnsinoFundamental; ";
              $result = mysqli_query($mysqli, $sql);
              if(!$result) {
                die("Erro ao executar a consulta: " . $mysqli->error);
              }
              while($dados = mysqli_fetch_array($result)) {
                echo "['" . $dados['alunoEnsinoFundamental'] . "', " . $dados['quantidade'] . ", '" . $dados['porcentagem'] . "'],";
              }
              $mysqli->close();
            ?>
        ]);
        var options = {
            chart: {
            title: 'Quantidade por cada aluno',
            subtitle: 'Termino do ensino fundamental',
            },
            width: chartWidth,
            height: chartHeight,
            series: {
                0: { color: '#808080' },
                1: { color: '#00bd19' },
            },
        };
        var chart = new google.charts.Bar(container);
        chart.draw(data, google.charts.Bar.convertOptions(options));
    }
    window.addEventListener('resize', function() {
        drawElementarySchoolChart();
    });
</script>
</head>
<body style="overflow: auto;">

    <?php include("sidebar.php"); ?>

    <div class="container-fluid mt-4 text-center">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800 text-success font-weight-light" id="cnt">➯ Gráficos</h1>
            <a href="gerar_pdf.php" class="btn btn-sm">
                <button type="submit" class="btn btn-outline-success" name="relatorio" >Baixar Relatórios</button>
            </a>
        </div>
        <div class="row">
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card card-border-left shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-secondary text-uppercase mb-1">
                                    Alunos
                                </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    <?php echo $total_nomes; ?>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="bi bi-person-fill custom-icon"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card card-border-left shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-secondary text-uppercase mb-1">
                                    Familias
                                </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    <?php echo $total_familias; ?>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="bi bi-people-fill custom-icon"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card card-border-left shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-secondary text-uppercase mb-1">
                                    Total de Gráficos
                                </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    9
                                </div>
                            </div>
                            <div class="col-auto">
                            <i class="bi bi-bar-chart-fill custom-icon"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card card-border-left shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-secondary text-uppercase mb-1">
                                    Resultados
                                </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    <?php echo $total_campos; ?>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="bi bi-search custom-icon"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="card shadow mb-4 mx-auto ">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-success">Visão Geral</h6>
                        <button type="button" class="btn" data-bs-toggle="popover" data-bs-content="Número total de alunos em cada curso especificado no filtro e a porcentagem de cada curso em relação ao número total de alunos">
                            <i class="bi bi-info-square-fill text-success"></i>
                        </button>
                    </div>
                    <div class="card-body align-items-start">
                        <div id="overview" style="height: 250px; width: 100%;"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="card shadow mb-4 mx-auto ">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-success">Pais Empregados</h6>
                        <button type="button" class="btn" data-bs-toggle="popover" data-bs-content="Quantidade de pais empregados e a porcentagem correspondente. Essas informações podem ser utilizadas para visualizar a distribuição dos pais empregados em relação ao total de registros">
                            <i class="bi bi-info-square-fill text-success"></i>
                        </button>
                    </div>
                    <div class="card-body align-items-start">
                        <div id="employed-parents" style="height: 250px; width: 100%;"></div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card shadow mb-4 mx-auto ">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-success">Escolariade dos Pais</h6>
                        <button type="button" class="btn" data-bs-toggle="popover" data-bs-content="Escolaridade dos pais, juntamente com a quantidade de ocorrências e a porcentagem correspondente. Essas informações permitem visualizar a distribuição da escolaridade dos pais em relação ao total de registros">
                            <i class="bi bi-info-square-fill text-success"></i>
                        </button>
                    </div>
                    <div class="card-body align-items-start">
                        <div id="parents-schooling" style="height: 250px; width: 100%;"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="card shadow mb-4 mx-auto ">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-success">Aluno Reside</h6>
                        <button type="button" class="btn" data-bs-toggle="popover" data-bs-content="Contagem para cada categoria de quem risde com aluno reside. Em seguida, calcula a porcentagem correspondente de cada categoria em relação ao total de registros na tabela. O resultado é uma contagem e porcentagem de alunos agrupados por local de residência. Isso permite visualizar a distribuição dos alunos por escola na amostra de dados">
                            <i class="bi bi-info-square-fill text-success"></i>
                        </button>
                    </div>
                    <div class="card-body align-items-start">
                        <div id="student-resides" style="height: 250px; width: 100%;"></div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card shadow mb-4 mx-auto ">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-success">Tipo de Moradia</h6>
                        <button type="button" class="btn" data-bs-toggle="popover" data-bs-content="Diferentes tipos de moradia dos alunos e conta a quantidade de ocorrências para cada tipo. Em seguida, calcula a porcentagem correspondente de cada tipo em relação ao total de registros na tabela. O resultado é uma contagem e porcentagem de alunos agrupados por tipo de moradia. Isso permite visualizar a distribuição dos alunos por escola na amostra de dados">
                            <i class="bi bi-info-square-fill text-success"></i>
                        </button>
                    </div>
                    <div class="card-body align-items-start">
                        <div id="type-of-housing" style="height: 250px; width: 100%;"></div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card shadow mb-4 mx-auto ">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-success">Renda Mensal</h6>
                        <button type="button" class="btn" data-bs-toggle="popover" data-bs-content="Renda mensal familiar dos alunos e conta a quantidade de ocorrências para cada faixa de renda. Em seguida, calcula a porcentagem correspondente de cada faixa em relação ao total de registros na tabela. O resultado é uma contagem e porcentagem de alunos agrupados por faixa de renda mensal familiar. Isso permite visualizar a distribuição dos alunos por escola na amostra de dados">
                            <i class="bi bi-info-square-fill text-success"></i>
                        </button>
                    </div>
                    <div class="card-body align-items-start">
                        <div id="monthly-income" style="height: 250px; width: 100%;"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="card shadow mb-4 mx-auto ">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-success">Mães Empregados</h6>
                        <button type="button" class="btn" data-bs-toggle="popover" data-bs-content="Quantidade das mães empregados e a porcentagem correspondente. Essas informações podem ser utilizadas para visualizar a distribuição dos pais empregados em relação ao total de registros">
                            <i class="bi bi-info-square-fill text-success"></i>
                        </button>
                    </div>
                    <div class="card-body align-items-start">
                        <div id="employed-mothers" style="height: 250px; width: 100%;"></div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card shadow mb-4 mx-auto ">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-success">Escolariade das Mães</h6>
                        <button type="button" class="btn" data-bs-toggle="popover" data-bs-content="Escolaridade das mães, juntamente com a quantidade de ocorrências e a porcentagem correspondente. Essas informações permitem visualizar a distribuição da escolaridade dos pais em relação ao total de registros">
                            <i class="bi bi-info-square-fill text-success"></i>
                        </button>
                    </div>
                    <div class="card-body align-items-start">
                        <div id="mothers-schooling" style="height: 250px; width: 100%;"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="card shadow mb-4 mx-auto ">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-success">Aluno Concluiu o Ensino Fundamental</h6>
                        <button type="button" class="btn" data-bs-toggle="popover" data-bs-content="Categoria de ensino fundamental do aluno. Em seguida, calcula a porcentagem correspondente de cada categoria em relação ao total de registros na tabela. O resultado é uma contagem e porcentagem de alunos agrupados por nível de ensino fundamental. Isso permite visualizar a distribuição dos alunos por escola na amostra de dados">
                            <i class="bi bi-info-square-fill text-success"></i>
                        </button>
                    </div>
                    <div class="card-body align-items-start">
                        <div id="elementary-school" style="height: 250px; width: 100%;"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <button onclick="backToTop()" id="btnTop">⇪</button>
    <script>
        var popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'))
        var popoverList = popoverTriggerList.map(function (popoverTriggerEl) {
        return new bootstrap.Popover(popoverTriggerEl)
    })
    </script>
    <script>
            jQuery(document).ready(function($) {
                $(".scroll").click(function(event) {
                    event.preventDefault();
                    $('html, body').animate({
                        scrollTop: $(this.hash).offset().top
                    }, 600);
                });
            });
        </script>

        <script>
            window.onscroll = function() {
                scroll();
            }

            function scroll() {
                var btn = document.getElementById("btnTop");
                if (document.documentElement.scrollTop > 200) {
                    btn.style.display = "block";
                } else {
                    btn.style.display = "none";
                }
            }

            function backToTop() {
                document.documentElement.scrollTop = 0;
            }
        </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>