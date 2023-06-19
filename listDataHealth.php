

<?php

	include 'conexaoHealth.php';
	$listarSQL = mysqli_query($connection, "SELECT * FROM Dados LIMIT 25");

?>