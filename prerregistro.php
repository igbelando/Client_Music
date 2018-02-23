<!DOCTYPE html>
<html>
	<head>
		<title>Gestor</title>
		<meta name="viewport" content="width=device-width, user-scalable=no, maximum-scale=1.0, minimum-scale=1.0">			
		<link rel="stylesheet" href="css/bootstrap.css">	
	

		<script type="text/javascript">
			function ajax() {
				var email = document.getElementById('email').value;
				//var username = document.getElementById('username').value;

				console.log(email);
				//console.log(username);
			
				// Instanciar el objeto XMLHttpRequest
				connection = new XMLHttpRequest();
				// Preparar respuesta
				connection.onreadystatechange = response;
				// Petición HTTP con POST
				//connection.open('POST', 'http://localhost/Alumni/public/index.php/users/preCreate.json');
				connection.open('POST', 'http://h2744356.stratoserver.net/alumni/Alumni/public/index.php/users/preCreate.json');
				// Cabecera de la petición
				connection.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
				// Envío
				connection.send("email=" + email /*+ "&username=" + username*/);
			}
			function response(){
				if (connection.readyState == 4) {
					var response = JSON.parse(connection.responseText);
					console.log(response);
					if (response.code == 200){
						//location.href ="http://localhost/ClienteAlumni/users.php";
						location.href = "http://h2744356.stratoserver.net/alumni/ClienteAlumni/users.php";
					} else if (response.code == 400 || response.code == 500 ){
						document.getElementById('code').innerHTML = response.code;
						document.getElementById('message').innerHTML = response.message;
					}
				}
			}
		</script>

		<style>
			body{
				margin-left: 40%;
			}
			.form-control{
				width: 500px;
				margin-bottom: 10px;
			}
		</style>

	</head>
	<body>
		<h1>Pre registro</h1>

		<div id='response'>
			<p id='code'></p>
			<p id='message'></p>
		</div>

		<input type="text" class="form-control" id="email" placeholder="Email">
		<!-- <input type="text" class="form-control" id="username" placeholder="Username"> -->
		<button onclick='ajax()' class="btn btn-primary active"">Enviar</button>


		<script src="js/jquery.js"></script>
		<script src="js/bootstrap.min.js"></script>
	</body>
</html>