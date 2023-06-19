<?php
include("conexao.php");

$sql_code = "SELECT * FROM `Admin` WHERE profile = './assets/iconmm.png'";
$result = $mysqli->query($sql_code);

if ($result && $result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $profile = $row['profile'];
}

$mysqli->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <!-- Estilização da Página -->
    <link rel="stylesheet" href="styles/sidebar.css">
</head>

<body>

<nav class="navbar">
  <div class="container-fluid">
    <div class="d-flex align-items-center justify-content-start">
      <a class="navbar-brand" href="https://www.ceara.gov.br/" target="_blank">
        <img src="assets/logo-governo.svg" class="img-fluid" alt="Logo 1">
      </a>
      <a class="navbar-brand" href="https://eeepmanoelmano.com.br/" target="_blank">
        <img src="assets/logo-mm.svg" class="img-fluid" alt="Logo 1">
      </a>
    </div>
    <div class="d-flex align-items-center justify-content-end">
      <button class="btn" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal">
        <i class="bi bi-list icon-color"></i>
      </button>
    </div>
  </div>
</nav>

<nav class="navbar navbar-light bg-light nav-border-bottom" style="height: 50px;">

</nav>

  <div class="modal true custom-modal-left" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen">
      <div class="modal-content">
        <div class="modal-header d-flex justify-content-between">
          <div class="text-center ms-auto me-5">
            <?php echo "<img src='" . $profile . "' alt='Minha Imagem' class='profile-image rounded'>"; ?>
            <h5 class="modal-title mt-2" id="exampleModalLabel">
              Olá, <?php echo $_SESSION['usuario'];?>
            </h5>
          </div>
          <button type="button" class="btn" data-bs-dismiss="modal" aria-label="Close">
            <i class="bi bi-x-lg icon-color"></i>
          </button>
        </div>

        <div class="modal-body">
  
          <ul class="list-group list-group-flush">
            <li class="list-group-item"><i class="bi bi-file-earmark-fill icon-color"></i><a href="form.php" class="link-offset-2 link-underline link-underline-opacity-0 custom-padding-left text-secondary">Formulários</a></li>
            <li class="list-group-item"><i class="bi bi-bar-chart-fill icon-color"></i><a href="graph.php" class="link-offset-2 link-underline link-underline-opacity-0 custom-padding-left text-secondary">Relatório Socioeconômico</a></li>
            <li class="list-group-item"><i class="bi bi-activity icon-color"></i><a href="graphHealth.php" class="link-offset-2 link-underline link-underline-opacity-0 custom-padding-left text-secondary">Relatório de Saúde</a></li>
            <li class="list-group-item"><i class="bi bi-search icon-color"></i><a href="table.php" class="link-offset-2 link-underline link-underline-opacity-0 custom-padding-left text-secondary">Procura Socioeconômica</a></li>

          </ul>
  
        </div>
        <div class="modal-footer">
          <a href="logout.php">
            <button type="button" class="btn"  style="background-color: #fc662d;" data-bs-dismiss="modal">
              <i class="bi bi-box-arrow-right" style="color: #ffffff;"></i>
            </button>
          </a>
          </button>
        </div>
      </div>
    </div>
  </div>
  
  <a href="#page-top" class="scroll-to-top rounded" style="display: none;">
      <i class="fas fa-angle-up"></i>
  </a>
  
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>