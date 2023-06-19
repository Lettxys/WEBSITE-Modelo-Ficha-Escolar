<?php
include_once("conexao.php");

$sql_code = "SELECT nome, curso, rendaMensalFamiliar, beneficioGoverno, bolsaFamilia, moradia, quantidadesResidentes, rendaMensalFamiliar FROM Dados";
$result = $mysqli->query($sql_code);

if ($result->num_rows > 0) { 
  while ($row = $result->fetch_assoc()) {
      echo "<tr>";
      echo "<td>" . $row["nome"] . "</td>";
      echo "<td>" . $row["curso"] . "</td>";
      echo "<td>" . $row["rendaMensalFamiliar"] . "</td>";
      echo "<td>" . $row["beneficioGoverno"] . "</td>";
      echo "<td>" . $row["bolsaFamilia"] . "</td>";
      echo "<td>" . $row["moradia"] . "</td>";
      echo "<td>" . $row["quantidadesResidentes"] . "</td>";
      echo "<td>" . $row["rendaMensalFamiliar"] . "</td>";
      echo "</tr>";
  }
} else {
  echo "<tr><td colspan='3'>Nenhum dado encontrado.</td></tr>";
}

$search = isset($_GET['search']) ? $_GET['search'] : '';

if (!empty($search)) {
  $sql_code .= " WHERE nome LIKE '%$search%' OR curso LIKE '%$search%' OR rendaMensalFamiliar LIKE '%$search%' OR beneficioGoverno LIKE '%$search%' OR bolsaFamilia LIKE '%$search%' OR moradia LIKE '%$search%' OR quantidadesResidentes LIKE '%$search%'";
}


$mysqli->close();

?>