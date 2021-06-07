<?php
include('inc/conecta.php');
	$_GET['cd'] = 0;
	$_GET['c'] = 0;
	$cont = 0;
	
	date_default_timezone_set('America/Sao_Paulo');
	$dthj = date('Y-m-d');

	$atual = new DateTime();
	$atual->format('Y-m-d');
	


	$sel = "SELECT * FROM compromisso as c INNER JOIN importancia as i on c.id_importancia = i.cd_importancia ORDER BY dt_compromisso ASC";

	if($result = $mysqli->query($sel)){

	

?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/inicial.css">
	<title>Agenda</title>
</head>
<body>

	<div class="container">
		<table class="table">
		  <thead>
		    <tr>
		      <th scope="col">#</th>
		      <th scope="col">Nome</th>
		      <th scope="col">Descrição</th>
		      <th scope="col">Data e Hora</th>
		      <th scope="col">Importância</th>
		      <th scope="col">Opções</th>
		    </tr>
		  </thead>
		  <tbody>
		    <tr>

		    	<?php

		    	while($obj = $result->fetch_object()){

		    		$cont ++;
		    		$date = new DateTime($obj->dt_compromisso);
		    		$dateInterval = $atual->diff($date);

		    		echo "
		    		<th scope='row'>".$cont."</th>
		    		<td>".$obj->nm_compromisso."</td>
		    		<td>".$obj->ds_compromisso."</td>
		    		<td>".$date->format('d/m/Y H:i:s');

		    		if($date>$atual){
		    			echo " (faltam ".$dateInterval->days." dias)"; 
		    		}
		    		else if($atual > $date & $dateInterval->days != 0){
		    			echo " (passaram ".$dateInterval->days." dias)"; 
		    		}
		    		if($dateInterval->days == 0){
		    			echo " (HOJE)";	
		    		}

		    	echo "</td>
		    		<td>".$obj->nm_importancia."</td>
		    		<td><a href='delete.php?cd=$obj->cd_compromisso' class='btn btn-danger'>Excluir</a>
		    		<a href='edit.php?c=$obj->cd_compromisso' class='btn btn-warning' id='editbtn'>Editar</a></td>
		    		</tr>
		    		";
		    	}
		    	}	
		    	?>

			    
		    </tr>
		  </tbody>
		</table>
	</div>

	<div class="container">
		<div class="row">
			<div class="col-sm-12" id="inputs">
				<form method="post">
				<label>Insira o Nome do Compromisso:</label>
				<input type="text" name="nome" class="form-control" id="inpt">
			</div>
		</div>
		<div class="row">
			<div class="col-sm-12" id="inputs">
				<label>Insira uma Descrição de Seu Compromisso:</label>
				<input type="textarea" name="descricao" class="form-control" id="inpt">
			</div>
		</div>
		<div class="row">
			<div class="col-sm-12" id="inputs">
				<label>Informe a Data e Horário de seu Compromisso:</label>
				<input type="datetime-local" name="data" class="form-control" id="inpt">
			</div>
		</div>
		<div class="row">
			<div class="col-sm-12" id="inputs">
				<label>Informe a Importância desse compromisso:</label>
				<select class="form-control" name="imp" id="inpt">
					<?php 
						$imp = "SELECT * FROM importancia";

						if($result = $mysqli->query($imp)){
							while($obj = $result->fetch_object()){
								echo "<option value='".$obj->cd_importancia."'>$obj->nm_importancia</option>";
							}
						}
					?>
				</select>
			</div>
		</div>
		<div class="row" id="bt">
			<center><div class="col-sm-12">
				<input type="submit" value="Salvar" class="btn btn-success" name="" id="btnslv">
				</form>
			</div></center>
		</div>
	</div>



</body>
</html>

<?php




	if(isset($_POST['nome'])){
		
		$data = $_POST['data'];

		$inserir = "INSERT INTO compromisso VALUES(NULL, '".$_POST['nome']."', '".$_POST['descricao']."', '".$data."', '".$_POST['imp']."')";
	
		if(!$mysqli->query($inserir)) {
			echo $mysqli->error;
		}
		
		else{

		header('location: index.php');
		}
	}

?>