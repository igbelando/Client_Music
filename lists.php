<!DOCTYPE html>
<html>
	<head>
		<title>Lists</title>
		<meta name="viewport" content="width=device-width, user-scalable=no, maximum-scale=1.0, minimum-scale=1.0">			
		<link rel="stylesheet" href="css/bootstrap.css">	
	

		<script type="text/javascript">
		function ajax() {
				var title = document.getElementById('titleText').value;
				//var title = $("#title").val();


				console.log(title);
				
			
				// Instanciar el objeto XMLHttpRequest
				connection = new XMLHttpRequest();
				// Preparar respuesta
				connection.onreadystatechange = response;
				// Petición HTTP con POST
				//connection.open('POST', 'http://localhost/Alumni/public/index.php/lists/create.json');
				connection.open('POST', 'http://localhost/Client_Music/public/index.php/songs/songs.json');

				// Cabecera de la petición
				connection.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
				// Envío
				connection.send("title=" + title);
			}
			function response(){
				if (connection.readyState == 4) {
					var response = JSON.parse(connection.responseText);
					if (response.code == 200){
					//location.href ="http://localhost/ClienteAlumni/users.php";
					location.href = "http://localhost/Client_Music/lists.php";
					} else if (response.code == 400 || response.code == 500 ){
					document.getElementById('code').innerHTML = response.code;
					document.getElementById('message').innerHTML = response.message;
					}
				}
					
			}
		</script>

		<style>
			body{
				margin-top: 200px;
				margin-left: 10%;
				background-color: grey;
			}
			.form-control{
				width: 200px;
				margin-bottom: 10px;
			
			}
		</style>

	</head>
	<body>
		<h1>New list</h1>

		<div id='response'>
			<p id='code'></p>
			<p id='message'></p>
		</div>

		<input type="text" class="form-control" id="titleText" placeholder="New list">
		
		<button onclick='ajax()' class="btn btn-primary active"">Create</button>


		<script src="js/jquery.js"></script>
		<script src="js/bootstrap.min.js"></script>
	</body>
</html>