<?php 
	session_start();
	require('connexiondb.php');
	
	if(isset($_POST['ajouterinfo'])){
	if(!empty($_POST['ninea']) and !empty($_POST['adresse']) and !empty($_POST['presentation'])){
		$ext=extract($_POST);
		$ninea= htmlspecialchars($ninea);
		$adresse= htmlspecialchars($adresse);
		$presentation= htmlspecialchars($presentation);
		$id_utilisateur=$bdd->prepare("SELECT id_utilisateur FROM utilisateur WHERE login=?");
		$id_utilisateur->execute(array($_SESSION['login']));
		$fin = $id_utilisateur->fetch();
		$remp= $fin['id_utilisateur'];
		$requete = "INSERT INTO vendeur (presentation, categorie, secteur, ninea, adresse, id_utilisateur) VALUES ('$presentation', '$categorie', '$secteur', '$ninea', '$adresse', '$remp')";
		 try {	
		 	$time=date('Y/m/d');
		        $bdd->exec($requete);

		        $_SESSION['success'] = "Merci de bien vouloir patienter, votre Inscription est en attente de validation. ";
		        $requete2= "INSERT INTO inscription (etat, date, id_utilisateur) VALUES ('En attente','$time','$remp')" ;
		        $bdd->exec($requete2);
		        header("Location:login.php");
		        } 
		        catch(PDOException $e) {
		            
		            echo $requete . "<br>" . $e->getMessage();
		        }	
	}else{
		$error = "Certains champs sont vides!";
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
 		<div class="col-lg-6 offset-3">
 			<div class="form-login">
 				<div class="form-login-header">
 					<h1><i class="fa fa-plus"></i></h1>
 					<h3>Completer votre profil vendeur </h3>
 				</div>
 				<div class="form-login-body">
 					<form method="POST">
 						<div class="row">
			 				<div class="col-lg-6">
			 					<div class="form-group">
			 						<label for="presentation" class="input-label">Presentation </label>
			 						<input type="text" name="presentation" id="presentation" placeholder="Donner votre presentation" class="form-control">
			 					</div>
			 				</div>
		 					 <div class="col-lg-6">
	 						 	<label for="categorie" class="input-label">Categorie:</label>
	 							<div class="form-group">		 						
				                        <select name="categorie" id="categorie" class="form-control">
				                        	<option value="Entreprise">Entreprise</option>
				                        	<option value="GIE">GIE</option>
				                        	<option value="Individuel">Individuel </option>
	                    				</select>
	                			</div>
	 						</div>
	 						<div class="col-lg-6">
	 							<label for="secteur" class="input-label">Secteur:</label>
	 							<div class="form-group">
				                        <select name="secteur" id="secteur" class="form-control">
				                        	<option value="Agroalimentaire">Agroalimentaire</option>
				                        	<option value="Artisanat">Artisanat</option>
				                        	<option value="Cosmetique">Cosmetique</option>
				                        	<option value="Autre">Autre</option>
	                    				</select>
	                			</div>
	 						</div>
	 						<div class="col-lg-6">
			 					<div class="form-group">
			 						<label for="ninea" class="input-label">NINEA:</label>
			 						<input type="text" name="ninea" id="ninea" placeholder="Entrer votre numero de ninea" class="form-control">
			 					</div>
			 				</div>
			 				<div class="col-lg-6">
			 					<div class="form-group">
			 						<label for="adresse" class="input-label">Adresse:</label>
			 						<input type="text" name="adresse" id="adresse" placeholder="Entrer votre adresse" class="form-control">
			 					</div>
			 				</div>
			 				<div class="col-lg-12">
			 					<div class="form-group" style="text-align: center;">
			 						<input name="ajouterinfo" type="submit" class="btn btn-default green_btn" value="Ajouter informations">
			 					</div>
			 				</div>
 						</div>
 					</form>
 				</div>
 			</div>
 		</div>
 	</div>
 </div>
 <?php require('../raccourcie/footer.php') ?>

