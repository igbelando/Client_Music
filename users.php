<?php 

 //url contra la que atacamos
 $ch = curl_init("http://localhost/Alumni/public/index.php/users/users.json");
 //a true, obtendremos una respuesta de la url, en otro caso, 
 //true si es correcto, false si no lo es
 curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
 //establecemos el verbo http que queremos utilizar para la petición
 curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");

 //obtenemos la respuesta
 $response = curl_exec($ch);
 // Se cierra el recurso CURL y se liberan los recursos del sistema
 curl_close($ch); 
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Usuarios</title>
		<meta name="viewport" content="width=device-width, user-scalable=no, maximum-scale=1.0, minimum-scale=1.0">			
		<link rel="stylesheet" href="css/bootstrap.css">	
	
		<script type="text/javascript">
		

			function GoPreRegister(){
				window.location.href = "http://localhost/ClienteAlumni/prerregistro.php";
			}
			function GoRoles(){
				window.location.href = "http://localhost/ClienteAlumni/roles.php";
			}
			function GoGroups(){
				window.location.href = "http://localhost/ClienteAlumni/groups.php";
			}

		</script>
	
		<style>
			body{
				margin-left: 40%;
			}
			p{
				width: 200px;
				margin-bottom: 10px;
			}
		</style>
	</head>
	<body>

		<h1>Lista Usuarios</h1>

		<?php  
		
			$users = json_decode($response);
			foreach ($users as $key=>$values) {

		?>

		<p> 
			<?php echo $values->username;?> 
			<p id="code"></p>
        	<p id="message"></p>
        </p>
		<?php			
			}
		?>

		<button type="button" class="btn btn-primary " onclick="GoPreRegister()">Create user</button>
		<button type="button" class="btn btn-primary " onclick="GoRoles()">Create role</button>
		<button type="button" class="btn btn-primary " onclick="GoGroups()">Create group</button>

		<script src="js/jquery.js"></script>
		<script src="js/bootstrap.min.js"></script>
	</body>
</html>