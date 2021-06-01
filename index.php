<?php
include('inc/conecta.php');

	$cont = 0;
	
	$sel = "SELECT * FROM compromisso as c INNER JOIN importancia as i on c.id_importancia = i.cd_importancia ORDER BY dt_compromisso ASC";

	if($result = $mysqli->query($sel)){

	

?>

<!DOCTYPE html>
<html>
<head>
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
		      <th scope="col">Data e Hr</th>
		      <th scope="col">Importância</th>
		    </tr>
		  </thead>
		  <tbody>
		    <tr>
		    	<?php

		    	while($obj = $result->fetch_object()){

		    		$cont ++;

		    		echo "
		    		<th scope='row'>".$cont."</th>
		    		<td>".$obj->nm_compromisso."</td>
		    		<td>".$obj->ds_compromisso."</td>
		    		<td>".$obj->dt_compromisso."</td>
		    		<td>".$obj->nm_importancia."</td>
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
			<div class="col-sm-12">
				<form method="post">
				<label>Insira o Nome do Compromisso:</label>
				<input type="text" name="nome" class="form-control">
			</div>
		</div>
		<div class="row">
			<div class="col-sm-12">
				<label>Insira uma Descrição de Seu Compromisso:</label>
				<input type="textarea" name="descricao" class="form-control">
			</div>
		</div>
		<div class="row">
			<div class="col-sm-12">
				<label>Informe a Data e Horário de seu Compromisso:</label>
				<input type="datetime-local" name="data" class="form-control">
			</div>
		</div>
		<div class="row">
			<div class="col-sm-12">
				<label>Informe a Importância desse compromisso:</label>
				<select class="form-control" name="imp">
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
			<div class="col-sm-12">
				<input type="submit" value="Salvar" class="btn btn-success" name="">
				</form>
			</div>
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