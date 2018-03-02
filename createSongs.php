<!DOCTYPE html>
<html>
	<head>
		<title>Create song</title>

		<meta name="viewport" content="width=device-width, user-scalable=no, maximum-scale=1.0, minimum-scale=1.0">			
		<link rel="stylesheet" href="css/bootstrap.css">	
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

		<script type="text/javascript">
		  $(document).ready(function (){
		    $(".crear").on("click", function(e){
		      e.preventDefault();
		      var title = $("#title").val();
		      var url = $("#url").val();
		      var artist = $("#artist").val();
		      $.ajax({
		      	headers: {
		          'Authorization' : sessionStorage.getItem('token')
		         },
		        url: 'http://localhost/IsaacMusic/public/index.php/songs/create.json',
            // http://81.169.234.32/alexander/alexMiglioreAPIFinal/public/index.php/songs/create.json
		        dataType: 'json',
		        type: 'POST',
		        data: {
		          'title': title,
		          'artist': artist,
		          'url': url,
		        },
		        success:function(data){
		        	console.log(data);
		          if (data.code == '200') 
		           {
		            alert("Cancion añadida correctamente");
		             location.reload();
		           }
		          if (data.code == '400') 
		          {
		            alert(data.message);
		          }
        }
      });
    });
  });
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
			button{
				margin-top: 10px;
			}
			
		</style>

	</head>
	<body>
		<h1>New song</h1>

		<div id='response'>
			<p id='code'></p>
			<p id='message'></p>
		</div>

		<input type="text" class="form-control" id="title" placeholder="Title">
		<input type="text" class="form-control" id="artist" placeholder="Artist">
		<input type="text" class="form-control" id="url" placeholder="URL">
		
		<button class="btn btn-primary active crear"">Create</button>


		<script src="js/jquery.js"></script>
		<script src="js/bootstrap.min.js"></script>
	</body>
</html>