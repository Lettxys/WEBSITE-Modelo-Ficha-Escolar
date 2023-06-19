<?php
 include("conexao.php");
 include("protect.php");
?>
<!doctype html>
<html lang="en">
  <head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>EEEP Manoel Mano | Tabelas</title>
  <link rel="icon" type="image/png" sizes="32x32" href="assets/iconmm.png">
  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  <!-- Bootstrap Icons -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
  <!-- Estilização da Página -->
  <link rel="stylesheet" href="styles/table.css">
  </head>
  <body>
  <?php include("sidebar.php") ?>
  <div class="container-fluid mt-4">
    <h1 class="h3 mb-0 text-gray-800 text-success font-weight-light">Procurar por aluno...</h1>
    <p class="mb-4 pt-2 text-secondary">A tabela de dados socioeconômicos dos alunos mostra informações sobre seu respectivo status social, bolsas, acesso a recursos e situação familiar, auxiliando na compreensão do perfil dos alunos e na promoção da igualdade educacional. Tratamento confidencial dos dados é essencial.</p>
    <div class="card border-0 border-start border-4 border-success  rounded-0 mb-4">
      <div class="card-header border-0 bg-white">
        <div class="d-sm-flex align-items-center justify-content-between">
          <h6 class="m-0 font-weight-bold text-success">Dados dos Alunos</h6>
          <form class="d-flex" role="search">
            <input class="form-control shadow-sm me-2" type="search" placeholder="Procurar..." aria-label="Search" name="search" id="search">
          </form>
        </div>
      </div>
      <div class="card-body bg-white">
        <div class="table-responsive">
          <div id="resultado"></div>
        </div>
      </div>
    </div>
  </div>

  <!-- Jquery -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <!-- Ajax -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
  <!-- BootStrap Script -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
  <script>
    $(document).ready(function() {
      $('#search').keyup(function(){
        $('form').submit(function(){
          var dados = $(this).serialize();
          $.ajax({
            url: 'search.php',
            type: 'POST',
            dataType: 'html',
            data: dados,
            success: function(data) {
              $('#resultado').empty().html(data);
            }
          })
          return false;
        })
        $('form').trigger('submit');
      })
    })
  </script>
  </body>
</html>