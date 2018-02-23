<!DOCTYPE html>
<html>
	<head>
		<title>Usuarios</title>
		<meta name="viewport" content="width=device-width, user-scalable=no, maximum-scale=1.0, minimum-scale=1.0">			
		<link rel="stylesheet" href="css/bootstrap.css">	
	
		<script type="text/javascript">


			function showUsers(){
				var users = new XMLHttpRequest();

				//users.open('GET', 'http://localhost/Alumni/public/index.php/users/users.json');
				users.open('GET', 'http://h2744356.stratoserver.net/alumni/Alumni/public/index.php/users/users.json');
				users.send();

				users.onreadystatechange = function() {
    				if(users.readyState == 4){
        				console.log("connection  == 4 ");
        				var response = JSON.parse(users.responseText);
						console.log(response);
						response.forEach(function(a){
							console.log("Element " + a["email"]);
							var node = document.createElement("LI");  
							var textnode = document.createTextNode(a["email"]); 
							node.appendChild(textnode);
							document.getElementById('userList').appendChild(node)
						});
    				}	
				}
			}
		

			function GoPreRegister(){
				//window.location.href = "http://localhost/ClienteAlumni/prerregistro.php";
				window.location.href = "http://h2744356.stratoserver.net/alumni/ClienteAlumni/prerregistro.php";
			}
			function GoLists(){
				//window.location.href = "http://localhost/ClienteAlumni/lists.php";
				window.location.href = "http://h2744356.stratoserver.net/alumni/ClienteAlumni/lists.php";

			}

			showUsers();

		</script>
	
		<style>
			body{
				margin-left: 40%;
			}
			p{
				width: 200px;
				margin-bottom: 10px;
			}
			button{
				margin-top: 10px;
			}
		</style>
	</head>
	<body>

		<h1>Lista Usuarios</h1>

		

		<div id="userList">
			
		</div>
		

		<button type="button" class="btn btn-primary " onclick="GoPreRegister()">Create user</button>
		
		<button type="button" class="btn btn-primary " onclick="GoLists()">Create list</button>

		<script src="js/jquery.js"></script>
		<script src="js/bootstrap.min.js"></script>
	</body>
</html>