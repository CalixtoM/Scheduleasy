<?php
include('inc/conecta.php');

// Colhe os dados do compromisso selecionado
	$dados = "SELECT * FROM compromisso WHERE cd_compromisso = '".$_GET['c']."'";

	if($result = $mysqli->query($dados)){
		while($obj = $result->fetch_object()){
			//Define como variaveis os dados do compromisso
			$NomeComp = $obj->nm_compromisso;
			$dsComp = $obj->ds_compromisso;
			$dtComp = $obj->dt_compromisso;
			$imp = $obj->id_importancia;
		}
	}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Editar compromisso</title>
</head>
<body>

	<div class="container">
		<div class="row">
			<div class="col-sm-6">
				<?php echo "<h3> Editar o Compromisso: ".$NomeComp." </h3>" ?>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-6">
				<label>Digite o Nome:</label>
				<?php echo '<input type="text" class="form-control" name="nome" value="'.$NomeComp.'">' ?>
			</div>
			<div class="col-sm-6">
				<label>Digite a Descrição:</label>
				<?php echo '<input type="text" class="form-control" name="desc" value="'.$dsComp.'">' ?>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-6">
				<label>Selecione a Data:</label>
				<?php
					echo '<input type="datetime-local" class="form-control" name="data" value="'.$dtComp.'">';
				?>
			</div>
			<div class="col-sm-6">
				<label>Selecione a importância:</label>
				<select class="form-control" name="imp">
					<?php 
						$imp = "SELECT * FROM importancia";

						if($result = $mysqli->query($imp)){
							while($obj = $result->fetch_object()){
								echo "<option value='$obj->cd_importancia' ";

								if($imp == $obj->cd_importancia){
									echo 'selected';
								}
								echo ">$obj->nm_importancia</option>";
								
							echo "<option value='$obj->cd_categoria' ";if($categor == $obj->cd_categoria){ echo 'selected';} echo" >$obj->nm_categoria</option>";
	
							}
						}
					?>
				</select>
			</div>
		</div>
	</div>

</body>
</html>