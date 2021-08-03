<?php

$servidor = 'localhost';
$usuario = 'root';
$senha = 'usbw';
$banco = 'agenda';

$mysqli = new mysqli($servidor, $usuario, $senha, $banco);

if (mysqli_connect_errno()) 
	trigger_error(mysqli_connect_error());

else{
}


?>

<!DOCTYPE html>
<html>
<head>
	<script src="https://cdn.jsdelivr.net/npm/darkmode-js@1.5.7/lib/darkmode-js.min.js"></script>
	<script>
	  function addDarkmodeWidget() {
	    new Darkmode().showWidget();
	  }
	  window.addEventListener('load', addDarkmodeWidget);
	</script>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
	<title></title>
</head>
<body>

</body>
</html>

<script type="text/javascript">
	const options = {
	  bottom: '64px', // default: '32px'
	  right: 'unset', // default: '32px'
	  left: '32px', // default: 'unset'
	  time: '0.5s', // default: '0.3s'
	  mixColor: '#fff', // default: '#fff'
	  backgroundColor: '#fff',  // default: '#fff'
	  buttonColorDark: '#100f2c',  // default: '#100f2c'
	  buttonColorLight: '#fff', // default: '#fff'
	  saveInCookies: false, // default: true,
	  label: '🌓', // default: ''
	  autoMatchOsTheme: true // default: true
	}

	const darkmode = new Darkmode(options);
	darkmode.showWidget();
</script>