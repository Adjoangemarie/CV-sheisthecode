<!-- Code -->
<?php include('connection.php');
	$msg="";
	if (isset($_POST['btnValider'])){
		/*echo '<pre>';
		print_r ($_FILES['image']);die();*/
	
			if (isset($_GET['id'])){
				$sql="UPDATE experiences SET titre='".mysqli_real_escape_string($link,$_POST['titre'])."',
			date_debut='".mysqli_real_escape_string($link,$_POST['date_debut'])."',
				date_fin='".mysqli_real_escape_string($link,$_POST['date_fin'])."',
		entreprise='".mysqli_real_escape_string($link,$_POST['entreprise'])."', 
				WHERE id=".$_GET['id'];
			}else{
				$sql= "INSERT INTO experiences
			 (titre,date_debut,date_fin,entreprise)
			 VALUES ('".mysqli_real_escape_string($link,$_POST['titre'])."',
			 	'".mysqli_real_escape_string($link,$_POST['date_debut'])."',
				'".mysqli_real_escape_string($link,$_POST['date_fin'])."',
				'".mysqli_real_escape_string($link,$_POST['entreprise'])."')";
			 	
			}                          	  
			 		 
			$result=mysqli_query($link,$sql);
			if ($result) {
				$msg='Insertion reussie';
			}else{
				$msg=mysqli_error($link);
			}
		}

     if (isset($_GET['id'])){
		$update="SELECT * FROM experiences WHERE id=".$_GET['id'];
		$res=mysqli_query($link,$update);
		$dataU=mysqli_fetch_array($res);
	}

	if (isset($_GET['sup'])){
		$delete="DELETE FROM experiences WHERE id=".$_GET['sup'];
		$res=mysqli_query($link,$delete);
		$msg='element supprime' ;
	}
 ?>
<!DOCTYPE HTML>
   <HTML lang="en">    
      <head>  
           <meta charset="utf-8"> 
   <!-- définit la description de la page -->
     
   <!-- Interdire le mode de compatibilité sur IE -->
      <meta http-equiv="X-UA-Compatible" content="IE=edge" /> 
   <!-- Donne les instructions au navigateur sur comment controler l'échelle et les dimensions de la page "doit apparaître dans toutes les pages "-->
      <meta name="viewport" content="width=device=width, initial-scale=1.0"> 

   <!--  ****  liens bootstrap | fonts (polices) | feuilles de styles css  **** -->
      <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
      <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
      <link rel="stylesheet" type="text/css" href="css/style.css">

   <!--   ****  Insertion des bibliothèques javascript  ****  -->
      <script type="text/javascript" src="js/bootstrap.min.js"></script>
      <script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
        

   <!-- definit le titre de la page -->
      <title></title>  
   <!-- logo dans la barre de titre de la page -->
      <link rel="shortcut icon" href="img/icon-oresto.ico" type="img/ico">
      </head>    

      <body> 
		<?php include('menu.php');    ?>

		<div class="container">

			<div class="row">
				<div class="col-md-2"></div>
				<div class="col-md-8">
					<form action="" method="POST" role="form" enctype="multipart/form-data">
						<h1> Experiences </h1>
						<span> <?php echo $msg; ?> </span>
					
						<div class="form-group">
							<label for="">Titre</label>
							<input name="titre" type="text" class="form-control" id="" placeholder="Entrer le titre" value="<?php if (isset($_GET['id'])) echo $dataU['titre']; ?>">
						</div>

						<div class="form-group">
							<label for="">Date debut</label>
							<input name="date_debut" type="text" class="form-control" id="" placeholder="date" value="<?php if (isset($_GET['id'])) echo $dataU['date_debut']; ?>">
						</div>
					
						<div class="form-group">
							<label for="">Date fin</label>
							<input name="date_fin" type="text" class="form-control" id="" placeholder="Entrer la date" value="<?php if (isset($_GET['id'])) echo $dataU['date_fin']; ?>">
						</div>	

						<div class="form-group">
							<label for="">entreprise</label>
							<input name="entreprise" type="text" class="form-control" id="" placeholder="Entreprise" value="<?php if (isset($_GET['id'])) echo $dataU['entreprise']; ?>">
						</div>
						<button name="btnValider" type="submit" class="btn btn-primary btn-lg btn-block">Valider</button>
					</form>
					</div>
				</div>
				<div class="col-md-2"></div>
			</div>
<br>
			<div class="row">
				<table class="table">
					<thead>
						<tr>
							<th>Numero</th>
							<th>Titre</th>
							<th>Date du debut</th>
							<th>Date de fin</th>
							<th>Entreprise</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php 
							$n=1;
							$list=" SELECT 
										titre,
										date_debut,
										date_fin,
										entreprise";
							$res= mysqli_query($link,$list);
	while ($data = mysqli_fetch_array($res)){
								
						 ?>	

						<tr>
							<td> <?php echo $n; ?> </td>
							<td><?php echo $data['titre']; ?></td>
							<td><?php echo $data['date_debut']; ?></td>
							<td><?php echo $data['date_fin']; ?></td>
							<td><?php echo $data['entreprise']; ?></td>
							
							<td>
								<a href="?id=<?php echo $data['id']; ?>"><button type="button" class="btn btn-primary">Modifier</button></a>

				                <a href="?sup=<?php echo $data['id']; ?>"><button type="button" class="btn btn-danger">Supprimer</button></a>
				            </td>
						</tr>
						<?php $n++;
						 } ?>
					</tbody>
				</table>

			</div>


		</div>
		

		<!-- jQuery -->
		<script src=""></script>
		<!-- Bootstrap JavaScript -->
		<script src=""></script>
		<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
 		<script src="Hello World"></script>


	</body>
</html>



