<!DOCTYPE html>
<html>
	<head>
		<title>Canciones</title>
		<meta name="viewport" content="width=device-width, user-scalable=no, maximum-scale=1.0, minimum-scale=1.0">			
		<link rel="stylesheet" href="css/bootstrap.css">	
	
		<script type="text/javascript">


			function showUsers(){
				var songs = new XMLHttpRequest();

				songs.open('GET', 'http://localhost/IsaacMusic/public/index.php/songs/create.json');
				songs.send();

				songs.onreadystatechange = function() {
    				if(songs.readyState == 4){
        				console.log("connection  == 4 ");
        				var response = JSON.parse(songs.responseText);
						console.log(response);
						response.forEach(function(a){
							console.log("Element " + a["title"]);
							var node = document.createElement("LI");  
							var btn = document.createElement("BUTTON");
							var textnode = document.createTextNode(a["title"]); 
							var t = document.createTextNode("Eliminar");      
							btn.appendChild(t);
							node.appendChild(textnode);
							node.appendChild(btn);
							document.getElementById('songList').appendChild(node)

						});
    				}	
				}
			}
		

			function GoCreateSongs(){
				window.location.href = "http://localhost/Client_Music/createSongs.php";
			}	
			function GoLists(){
				window.location.href = "http://localhost/Client_Music/lists.php";


			}

			showUsers();

		</script>
	
		<style>
			body{
				margin-top: 200px;
				margin-left: 10%;
				background-color: grey;
			}
			button{
				margin-top: 10px;
				color
			}
		</style>
	</head>
	<body>

		<h1>Lista canciones</h1>

		

		<div id="songList">

		
			
		</div>
		

		<button type="button" class="btn btn-primary " onclick="GoCreateSongs()">Create song</button>
		
		<button type="button" class="btn btn-primary " onclick="GoLists()">Create list</button>

		<script src="js/jquery.js"></script>
		<script src="js/bootstrap.min.js"></script>
	</body>
</html>