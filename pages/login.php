<?php 
	session_start();
	$page = 'login';
	require('connexiondb.php');

	if(isset($_POST['connect'])){
	if(!empty($_POST['identifiant']) and !empty($_POST['password'])){
		$ext=extract($_POST);
		$identifiant= htmlspecialchars($identifiant);
		$password= sha1($password);

		$recup = $bdd->prepare('SELECT * FROM utilisateur WHERE (login = ? OR mail = ?) and mot_de_passe=?');
		$recup->execute(array($identifiant,$identifiant,$password));
		$compte_exist=$recup->rowCount();

		if($compte_exist === 1){
			$utilisateur = $recup->fetch();

			$req_etat = $bdd->prepare('SELECT etat FROM inscription_vendeur WHERE id_utilisateur = ?');
			$req_etat->execute(array($utilisateur['id_utilisateur']));
			
	
			$etat = $req_etat->fetch();
			
			$_SESSION['type'] = $utilisateur['type'];
			$_SESSION['id_utilisateur'] = $utilisateur['id_utilisateur'];
			$_SESSION['login'] = $utilisateur['login'];
			$_SESSION['prenom'] = $utilisateur['prénom'];
			$_SESSION['nom'] = $utilisateur['nom'];
			$_SESSION['email'] = $utilisateur['mail'];
			$_SESSION['phone_number'] = $utilisateur['telephone'];


			if($_SESSION['type']=="gestionnaire"){

				header("Location: demandeinscription.php");
			}else if($_SESSION['type']=="vendeur"){

				if($etat['etat'] === 'Valider'){
			
					header("Location: /index.php?id=".$_SESSION['id_utilisateur']);

				}else{
					$_SESSION['id_utilisateur'] = '';
					$_SESSION['login'] = '';
					$_SESSION['prenom'] = '';
					$_SESSION['nom'] = '';
					$_SESSION['email'] = '';
					$_SESSION['phone_number'] = '';
					$error = "Votre compte n'est pas encore validé par nos gestionnaires";
				}
			}else{
				header("Location: /index.php?id=".$_SESSION['id_utilisateur']);

			}	
		
		}else{
			$error="identifiant ou mot de passe incorrect.";
			}
	    }
	}
require('../raccourcie/header.php');
?>
 <div class="container set-background">
 	<?php if(isset($error) and !empty($error)){ ?>
	<div class="alert alert-danger alert-dismissible fade show" role="alert">
	  <strong>Erreur de connexion</strong> <?php echo $error ?>
	  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
	    <span aria-hidden="true">&times;</span>
	  </button>
	</div>
<?php } ?>

 	<?php if(isset($_SESSION['success']) and !empty($_SESSION['success'])){ ?>
	<div class="alert alert-warning alert-dismissible fade show" role="alert">
	  <?php echo $_SESSION['success'] ?>
	  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
	    <span aria-hidden="true">&times;</span>
	  </button>
	</div>
<?php } ?>
 	<div class="row">
 		<div class="col-lg-4 offset-4">
 			<div class="form-login">
 				<div class="form-login-header">
 					<h1><i class="fa fa-user"></i></h1>
 					<h3>Se connecter </h3>
 				</div>
 				<div class="form-login-body">

 					<form method="POST">
 					<div class="form-group">
 						<label for="identifiant" class="input-label">Login ou e-mail</label>
 						<input type="text" name="identifiant" id="identifiant" placeholder="Entrer votre identifiant" class="form-control">
 					</div>
 					<div class="form-group">
 						<label for="password" class="input-label">Mot de passe: </label>
 						<input type="password" name="password" id="password" placeholder="Entrer votre mot de passe" class="form-control">
 					</div>
 					<div>
 						<input type="checkbox" name="session_active" id="session_active" style="margin-right: 5px"><label class="input-label">Garder ma session active</label>
 					</div>
 					<div class="form-group" style="text-align: center;">
 						<input name="connect" type="submit" class="btn btn-default green_btn" value="Connexion">
 					</div>
 					<div>
 						<a href="inscription.php" class="a-newAccount">Besoin d'un nouveau compte ?</a>
 					</div>
 				</form>
 				</div>
 			</div>
 		</div>
 	</div>
 </div>
 <?php 
 $_SESSION['success'] = '';
 require('../raccourcie/footer.php') 
 ?>
