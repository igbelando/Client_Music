<!DOCTYPE html>
<html>
<head>
	<title>Gestor</title>
	<meta name="viewport" content="width=device-width, user-scalable=no, maximum-scale=1.0, minimum-scale=1.0">			
	<link rel="stylesheet" href="css/bootstrap.css">	
	<link rel="stylesheet" href="estilos.css">

<script type="text/javascript">
		function ajax() {
			var email = document.getElementById('email').value;
			
			console.log(email);
			
			// Instanciar el objeto XMLHttpRequest
			connection = new XMLHttpRequest();
			// Preparar respuesta
			connection.onreadystatechange = response;
			// Petición HTTP con POST
			connection.open('POST', 'http://localhost/Alumni/public/index.php/users/preCreate.json');
			// Cabecera de la petición
			connection.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
			// Envío
			connection.send("email=" + email);
		}
		function response(){
			if (connection.readyState == 4) {
				var response = JSON.parse(connection.responseText);
				console.log(response);
				document.getElementById('code').innerHTML = response.code;
				document.getElementById('message').innerHTML = response.message;
				document.getElementById('user').innerHTML = response.data.username;
			}
		}
</script>

<style>
		body{
			margin: 30px;
		}
		.form-control{
			width: 200px;
			margin-bottom: 10px;
		}
	</style>

</head>
<body>
	<h1>Pre registro</h1>

<div id='response'>
			<p id='code'></p>
			<p id='message'></p>
			<p id='user'></p>
		</div>

		<input type="text" class="form-control" id="email" placeholder="Email">
		<button onclick='ajax()' class="btn btn-primary active"">Enviar</button>


	<script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
</body>
</html>