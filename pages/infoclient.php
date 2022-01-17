<?php 
	session_start();
	require('connexiondb.php');
	


	if(isset($_POST['ajouterinfo'])){
	if(!empty($_POST['adresse']) and !empty($_POST['ville']) and !empty($_POST['region']) and !empty($_POST['tel'])){
		$ext=extract($_POST);
		$adresse= htmlspecialchars($adresse);
		$ville= htmlspecialchars($ville);
		$region= htmlspecialchars($region);
		$tel= htmlspecialchars($tel);
		$id_utilisateur=$bdd->prepare("SELECT id_utilisateur FROM utilisateur WHERE login=?");
		$id_utilisateur->execute(array($_SESSION['login']));
		$fin = $id_utilisateur->fetch();
		$remp= $fin['id_utilisateur'];
		$requete = "INSERT INTO client (adresse, ville, région, telephone, id_utilisateur) VALUES ('$adresse', '$ville', '$region', '$tel','$remp')";
		 try {
		            $bdd->exec($requete);

		            $_SESSION['success'] = "Inscription reussie. ";
		            
		            header("Location:login.php");
		        } 
		        catch(PDOException $e) {
		            echo $requete . "<br>" . $e->getMessage();
		        }	
	}else{
		$error = "Certains champs sont vides.";
	}

}
require('../raccourcie/header.php');
	?>

<div class="container">
	<div class="container">
 	<?php if(isset($error) and !empty($error)){ ?>
	<div class="alert alert-danger alert-dismissible fade show" role="alert">
	  <strong>Erreur de connexion</strong> <?php echo $error ?>
	  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
	    <span aria-hidden="true">&times;</span>
	  </button>
	</div>
<?php } ?>
 	<div class="row">
 		<div class="col-lg-4 offset-4">
 			<div class="form-login">
 				<div class="form-login-header">
 					<h1><i class="fa fa-plus"></i></h1>
 					<h3>Completer votre profil client </h3>
 				</div>
 				<div class="form-login-body">
 					<form method="POST">
	 					<div class="form-group">
	 						<label for="adresse" class="input-label">Adresse</label>
	 						<input type="text" name="adresse" id="adresse" placeholder="Entrer votre adresse" class="form-control">
	 					</div>
	 					<div class="form-group">
	 						<label for="ville" class="input-label">ville </label>
	 						<input type="text" name="ville" id="ville" placeholder="Entrer votre ville" class="form-control">
	 					</div>
	 					<div class="form-group">
	 						<label for="region" class="input-label">Region</label>
	 						<input type="text" name="region" id="region" placeholder="Entrer votre region" class="form-control">
	 					</div>
	 					<div class="form-group">
	 						<label for="tel" class="input-label">telephone</label>
	 						<input type="number" name="tel" id="tel" placeholder="Entrer votre nimero de telephone" class="form-control">
	 					</div>
	 					<div class="form-group" style="text-align: center;">
	 						<input name="ajouterinfo" type="submit" class="btn btn-default green_btn" value="Ajouter informations">
	 					</div>
 					</form>
 				</div>
 			</div>
 		</div>
 	</div>
 </div>
 <?php require('../raccourcie/footer.php') ?>

