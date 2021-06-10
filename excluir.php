<?php
include('inc/conecta.php');

echo $_GET['cd'];

$t=1;

$query = "DELETE FROM compromisso WHERE cd_compromisso = '".$_GET['cd']."'";
	
	if ($result = $mysqli->query($query)){		
		
		echo "<script>location.href='index.php';</script>";

	}

?>