<?php
  // seu_arquivo_php_externo.php

  // Verificar se o formulário foi enviado
  if (isset($_POST['search'])) {
    // Obter o valor de pesquisa
    $search = $_POST['search'];

    // Realizar a busca no banco de dados
    include_once("conexao.php");

    // Construir a consulta SQL com o valor de pesquisa e cláusula DISTINCT
    $sql_code = "SELECT DISTINCT nome, curso, rendaMensalFamiliar, beneficioGoverno, bolsaFamilia, moradia, quantidadesResidentes, rendaMensalFamiliar FROM Dados";
    $sql_code .= " WHERE nome LIKE '%$search%'";

    // Executar a consulta
    $result = $mysqli->query($sql_code);

    // Verificar se há resultados
    if ($result->num_rows > 0) {
      echo '
      <div class="container-fluid mt-4 text-center">
        <div class="table-responsive">
          <table id="listData" class="table">
            <thead>
              <tr>
                <th scope="col">Nome</th>
                <th scope="col">Curso</th>
                <th scope="col">Renda Mensal</th>
                <th scope="col">Benefício Governo</th>
                <th scope="col">Bolsa Família</th>
                <th scope="col">Moradia</th>
                <th scope="col">Composição Familiar</th>
                <th scope="col">Renda Mensal</th>
              </tr>
            </thead>
            <tbody>
          </div>
        </div';

      while ($row = $result->fetch_assoc()) {
        echo '<tr>';
        echo '<td>' . $row["nome"] . '</td>';
        echo '<td>' . $row["curso"] . '</td>';
        echo '<td>' . $row["rendaMensalFamiliar"] . '</td>';
        echo '<td>' . $row["beneficioGoverno"] . '</td>';
        echo '<td>' . $row["bolsaFamilia"] . '</td>';
        echo '<td>' . $row["moradia"] . '</td>';
        echo '<td>' . $row["quantidadesResidentes"] . '</td>';
        echo '<td>' . $row["rendaMensalFamiliar"] . '</td>';
        echo '</tr>';
      }

      echo '
          </tbody>
        </table>
      </div>';
    } else {
      echo 'Nenhum resultado encontrado.';
    }

    $mysqli->close();
  }
?>
