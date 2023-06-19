<?php
 include("conexaoHealth.php");
/*   include("conexao.php"); */
  include("protect.php");
  include("listDataHealth.php");
  $total_restricao = "SELECT COUNT(restricaoAlN) AS total_restricao FROM Dados WHERE restricaoAlN = 'SIM';";
  $sql_query = $connection->query($total_restricao);
  $resultado = $sql_query->fetch_assoc();
  $total_restricao = $resultado['total_restricao'];
  $total_alergias = "SELECT COUNT(alergiasN) AS total_alergias FROM Dados WHERE alergiasN = 'SIM'; ";
  $sql_query = $connection->query($total_alergias);
  $resultado = $sql_query->fetch_assoc();
  $total_alergias = $resultado['total_alergias'];
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EEEP Manoel Mano | Relatório de Saúde</title>
    <link rel="icon" type="image/png" sizes="32x32" href="assets/iconmm.png">
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <!-- Bootstrap CDN-->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <!-- Jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <!-- Estilização da Página -->
    <link rel="stylesheet" href="styles/graph.css">
    <!-- Charts -->
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load('current', {'packages':['bar']});
        google.charts.setOnLoadCallback(drawAllergyChart);
        function drawAllergyChart() {
            var container = document.getElementById('allergy');
            var chartWidth = container.offsetWidth;
            var chartHeight = 250; 
            var data = google.visualization.arrayToDataTable([
                ['Cursos', 'Total de Alergias por Curso'],
                <?php
                include("conexaoHealth.php");
                if($connection->connect_errno) {
                    die("Erro ao conectar com o banco de dados: " . $connection->connect_error);
                }
                $sql2 = mysqli_query($connection, "SELECT curso, count(alergiasInpN) as qtd FROM Dados WHERE curso LIKE '%enf%' GROUP BY curso UNION SELECT curso, count(alergiasInpN) as qtd FROM Dados WHERE curso LIKE '%info%' GROUP BY curso UNION SELECT curso, count(alergiasInpN) as qtd FROM Dados WHERE curso LIKE '%com%' GROUP BY curso UNION SELECT curso, count(alergiasInpN) as qtd FROM Dados WHERE curso LIKE '%adm%' GROUP BY curso ORDER BY qtd ASC;  ");                
                $result = mysqli_query($connection, $sql);
                if(!$result) {
                    die("Erro ao executar a consulta: " . $connection->error);
                }
                while ($dados = mysqli_fetch_array($sql2) ) {
                    $curso =  $dados['curso'];
                    $total =  $dados['qtd'];
                  ?>
        
                  ['<?php echo $curso ?>', '<?php echo $total ?>' ],
        
                <?php } ?>
            ]);
            var options = {
                chart: {
                    title: 'Alergias',
                    subtitle: 'Cursos e  Quantidade de Alergias',
                },
                width: chartWidth,
                height: chartHeight,
                colors: ['#00853B', '#00853B', '#00853B', '#00853B']
            };
            var chart = new google.charts.Bar(container);
            chart.draw(data, google.charts.Bar.convertOptions(options));
        }
        window.addEventListener('resize', function() {
            drawAllergyChart();
        });
    </script>
    <script type="text/javascript">
    google.charts.load('current', {'packages':['bar']});
    google.charts.setOnLoadCallback(drawFoodRestrictionChart);
    function drawFoodRestrictionChart() {
        var container = document.getElementById('food-restriction');
        var chartWidth = container.offsetWidth;
        var chartHeight = 250; 
        var data = google.visualization.arrayToDataTable([
            ['Cursos', 'Total de Restr.Al. por Curso'],
            <?php
            include("conexaoHealth.php");
            if($connection->connect_errno) {
                die("Erro ao conectar com o banco de dados: " . $connection->connect_error);
            }
            $sql2 = mysqli_query($connection, "SELECT curso, count(restAlInpN) as qtd FROM Dados WHERE curso LIKE '%enf%' GROUP BY curso UNION SELECT curso, count(restAlInpN) as qtd FROM Dados WHERE curso LIKE '%info%' GROUP BY curso UNION SELECT curso, count(restAlInpN) as qtd FROM Dados WHERE curso LIKE '%com%' GROUP BY curso UNION SELECT curso, count(restAlInpN) as qtd FROM Dados WHERE curso LIKE '%adm%' GROUP BY curso ORDER BY qtd ASC;   ");            $result = mysqli_query($connection, $sql);
            if(!$result) {
                die("Erro ao executar a consulta: " . $connection->error);
            }
            while ($dados = mysqli_fetch_array($sql2) ) {
                $curso =  $dados['curso'];
                $total =  $dados['qtd'];
              ?>
    
              ['<?php echo $curso ?>', '<?php echo $total ?>' ],
    
            <?php } ?>
        ]);
        var options = {
            chart: {
                title: 'Restrições Alimentares',
                subtitle: 'Cursos e  Quantidade de Restrições Alimentares',
                colors: ['#00853B', '#00853B', '#00853B', '#00853B']
            },
            width: chartWidth,
            height: chartHeight,
        };
        var chart = new google.charts.Bar(container);
        chart.draw(data, google.charts.Bar.convertOptions(options));
    }
    window.addEventListener('resize', function() {
        drawFoodRestrictionChart();
    });
    </script>
</head>
<body style="overflow: auto;">

    <?php include("sidebar.php"); ?>

    <div class="container-fluid mt-4 text-center">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800 text-success font-weight-light">➯ Gráficos</h1>
        </div>
        <div class="row justify-content-around">
            <div class="col-xl-6 col-md-4 mb-2">
                <div class="card card-border-left shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-secondary text-uppercase mb-1">
                                    Quantidade de alunos com alergias
                                </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    <?php echo $total_alergias; ?>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="bi bi-virus2 custom-icon"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-md-4 mb-2">
                <div class="card card-border-left shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-secondary text-uppercase mb-1">
                                    Quantidade de alunos com restrições alimentares
                                </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    <?php echo $total_restricao; ?>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="bi bi-egg-fried custom-icon"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col">
                <div class="card shadow mb-4 mx-auto ">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-success">Alergias</h6>
                        <button type="button" class="btn" data-bs-toggle="popover" data-bs-content="Este gráfico demonstra a distribuição de alunos com alergias por curso. Facilitando a organização, em relação à saúde dos alunos e o total de registros.">
                            <i class="bi bi-info-square-fill text-success"></i>
                        </button>
                    </div>
                    <div class="card-body align-items-start">
                        <div id="allergy" style="height: 250px; width: 100%;"></div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card shadow mb-4 mx-auto ">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-success">Restrições Alimentares</h6>
                        <button type="button" class="btn" data-bs-toggle="popover" data-bs-content="Este gráfico demonstra a distribuição de alunos com restrições alimentares por curso. Facilitando a organização, em relação à saúde dos alunos e o total de registros. ">
                            <i class="bi bi-info-square-fill text-success"></i>
                        </button>
                    </div>
                    <div class="card-body align-items-start">
                        <div id="food-restriction" style="height: 250px; width: 100%;"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid mt-4 text-center">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800 text-success font-weight-light">➯ Relatórios dos Alunos por Curso</h1>
        </div>
        <div class="input-group" bis_skin_checked="1">
        <input class="form-control" id="myInput" type="text" placeholder="Pesquisar na tabela..."  > <span class="input-group-text" id="basic-addon1">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"></path>
            </svg>
        </div>
        <div class="card-body mt-4">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead  class="thead-dark">
                    <tr>
                        <th style="text-align: center; font-size: 20px; color: #00853B;" >Aluno</th>
                        <th style="text-align: center; font-size: 20px; color: #00853B;">Alergia</th>
                    <th style="text-align: center; font-size: 20px; color: #00853B;">Rest. Alimentares</th>
                        <th style="text-align: center; font-size: 20px; color: #00853B;">Curso</th>	      
                    </tr>
                </thead> 
                <?php while ($usuario = mysqli_fetch_assoc($listarSQL)) { ?>
                <tbody id="myTable">
                    <tr>
                        <td style="text-align: center; border-color: inherit;">
                        <?php echo $usuario['nome']; ?></td>
                        <td style="text-align: center; border-color: inherit;">
                            <?php if($usuario['alergiasInpN']!= null){
                            echo $usuario['alergiasInpN'];
                            } else if($usuario['alergiasInpN'] = 'NULL'){
                            echo '-----';
                            } ?>
                        </td>
                        <td style="text-align: center; border-color: inherit;">
                            <?php if($usuario['restAlInpN']!= null){
                            echo $usuario['restAlInpN'];
                            } else if($usuario['restAlInpN'] = 'NULL'){
                            echo '-----';
                            }   ?>
                        </td>
                        <td style="text-align: center; border-color: inherit;">
                            <?php echo $usuario['curso']; ?>
                        </td>
                    </tr>
                </tbody>
                <?php } ?>
            </table>
        </div>
    </div>
    </div>
    <button onclick="backToTop()" id="btnTop">⇪</button>
    <br>
    <br>
    <script>
        $(document).ready(function(){
            $("#myInput").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $("#myTable tr").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });
        });
    </script>
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