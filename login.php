
<?php include('connection.php'); ?>
<!DOCTYPE html>
<html lang="">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title></title>

		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="css/bootstrap.css">
		<link rel="stylesheet" href="css/style.css">

		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.2/html5shiv.min.js"></script>
			<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>
	<body>
		
        
            <?php include('menu.php'); ?>
      
      <br><br>
		<div class="container">

			<div class="row">
			<div class="col-md-2"></div>
				<div class="col-md-8">
		
		<form action="" method="POST" role="form">
			<h1>Login</h1>
		
			<div class="form-group">
				<label for="">email</label>
				<input type="text" name="email" class="form-control" id="" placeholder="email">
			</div>

			<div class="form-group">
				<label for="">Mot De Passe</label>
				<input type="password" name="mdp" class="form-control" id="" placeholder="">
			</div>

			<button type="submit" name="btnValider" class="btn btn-primary btn-lg btn-block">Valider</button>
		</form>
	</div>
	</div>
	</div>

<?php if (isset($_POST['btnValider']) ) {
	$sql="SELECT * FROM codeuses WHERE email='".($_POST['email'])."' AND mdp='".($_POST['mdp'])."'"; 
	$req = mysqli_query($link,$sql);
	if  (mysqli_num_rows($req)>0) {
		$data=mysqli_fetch_array($req);
		$_SESSION['collection']=$data['id'];
		header('location:accueil.php');
	}else{

		echo 'insertion réussie';
	}
} ?>

		<!-- jQuery -->
		<script src="//code.jquery.com/jquery.js"></script>
		<!-- Bootstrap JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
		<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
 		<script src="Hello World"></script>
	</body>
</html>