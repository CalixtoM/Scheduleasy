<?php
include('inc/conecta.php');

// Colhe os dados do compromisso selecionado
	$dados = "SELECT * FROM compromisso WHERE cd_compromisso = '".$_GET['c']."'";

	if($result = $mysqli->query($dados)){
		while($obj = $result->fetch_object()){
			//Define como variaveis os dados do compromisso
			$cd = $obj->cd_compromisso;
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
	<link rel="stylesheet" type="text/css" href="css/edit.css">
	<title>Editar compromisso</title>
</head>
<body>

	<div class="container">
		<div class="row">
			<div class="col-sm-6">
				<?php echo "<h3> Editar o Compromisso: ".$NomeComp." </h3>" ?>
			</div>
		</div>
		<div class="row" id="inpts">
			<div class="col-sm-6">
				<form method="post">
				<label>Digite o Nome:</label>
				<?php echo '<input type="text" class="form-control" name="nome" value="'.$NomeComp.'">' ?>
			</div>
			<div class="col-sm-6">
				<label>Digite a Descrição:</label>
				<?php echo '<input type="text" class="form-control" name="desc" value="'.$dsComp.'">'; ?>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-6">
				<label>Selecione a Data:<?php echo "anteriormente (".$dtComp.")"; ?></label>
				<?php
					echo '<input type="datetime-local" class="form-control" name="data" value="'.$dtComp.'">';
				?>
			</div>
			<div class="col-sm-6">
				<label>Selecione a importância:</label>
				<select class="form-control" name="imp">
					<?php 
						$impo = "SELECT * FROM importancia";

						if($result = $mysqli->query($impo)){
							while($obj = $result->fetch_object()){
								echo "<option value='$obj->cd_importancia' ";

								if($imp == $obj->cd_importancia){
									echo 'selected';
								}
								echo ">$obj->nm_importancia</option>";
								
							//echo "<option value='$obj->cd_compromisso' ";if($imp == $obj->cd_importancia){ echo 'selected';} echo" >$obj->nm_compromisso</option>";
	
							}
						}
					?>
				</select>
			</div>
		</div>
		<div class="row" id="salv">
			<div class="col-sm-12">
				<center><input type="submit" name="" value="Editar" class="btn btn-success"></center>
				</form>
			</div>
		</div>
	</div>

<?php

	if(isset($_POST['nome'])){

		$edtar = "UPDATE compromisso SET nm_compromisso = '".$_POST['nome']."', ds_compromisso = '".$_POST['desc']."', dt_compromisso = '".$_POST['data']."', id_importancia = '".$_POST['imp']."' WHERE cd_compromisso = '".$cd."'";

		if($result = $mysqli->query($edtar)){
			echo "<script>window.location.href='index.php';</script>";
		}
		else{
			printf("Error: %s\n", $mysqli->error);
		}
	}

?>

</body>
</html>