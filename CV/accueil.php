<?php include('connection.php');
?>
<!DOCTYPE html>
<html lang="">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Mon Blog</title>

		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="css/bootstrap.css" >
		<link rel="stylesheet" type="text/css" href="css/style.css">

		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.2/html5shiv.min.js"></script>
			<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>
	<body>
		
		<div class="container">

			<?php include('menu.php');
			?>

		<div class="container">
			<?php 
							$n=1;
							$list=" SELECT 
										nom,
										prenoms,
										dn,
										photo,
										specialisation,
										email,
										mdp,
										resume,
										FROM codeuses";
										

							$res= mysqli_query($link,$list);
	while ($data = mysqli_fetch_array($res)){
								
							
						 ?>
						 <div class="well" id="form-acceuil">
        	<div class="row">
      			<div class=" col-sm-4">
           	   		<img src="upload/<?php echo $data['image'];  ?>" width="300px" height="250px" alt="">
           	   		<h4><?php echo $data['nom'];  ?></h4>
           	   		<h4><?php echo $data['prenoms'];  ?></h4>
        		</div>
         	 	<div class="col-sm-4">
         	 		<h4 class="res">
        			<?php echo $data['specialisation']; ?>
        		</h4>
        		<h5><?php echo $data['resume']; ?></h5>
         		</div>
         		<div class="col-sm-4">
         			<div class="btn-acc">
        			<a href=" CV.php?id=<?php echo $data['id']; ?>"><button type="button" class="btn btn-primary">consulter le CV</button></a>
        			</div>
         		</div>

         	</div> 
         	</div>
           
         	<br>

         	<?php $n++;
						 } ?>
        </div> 





		<!-- jQuery -->
		<script src=""></script>
		<!-- Bootstrap JavaScript -->
		<script src=""></script>
		<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
 		<script src="Hello World"></script>
	</body>
</html>