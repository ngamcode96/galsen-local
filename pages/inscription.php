
<?php 
	session_start();
	$page = 'login';
	
	
	require('connexiondb.php');	
if(isset($_POST['inscription'])){

	if(!empty($_POST['prenom']) and !empty($_POST['nom']) and !empty($_POST['email']) and !empty($_POST['email2']) and !empty($_POST['phone_number']) and  !empty($_POST['login'])and !empty($_POST['password'])and !empty($_POST['password2'])){
		$ext=extract($_POST);
		$prenom= htmlspecialchars($prenom);
		$nom= htmlspecialchars($nom);
		$email= htmlspecialchars($email);
		$email2= htmlspecialchars($email2);
		$login= htmlspecialchars($login);
		$phone_number= htmlspecialchars($phone_number);
		$password= sha1($password);
		$password2= sha1($password2);
		
		if($email == $email2){
			if(filter_var($email, FILTER_VALIDATE_EMAIL)){

				$req_mail = $bdd->prepare('SELECT mail FROM utilisateur WHERE mail = ?');
				$req_mail->execute(array($email));
				$mail_exist = $req_mail->rowCount();



				if($mail_exist === 0){

					$req_login = $bdd->prepare('SELECT login FROM utilisateur WHERE login = ?');
					$req_login->execute(array($login));
					$login_exist = $req_login->rowCount();

					if($login_exist === 0){

						if($password === $password2){
						        $requete = "INSERT INTO utilisateur (type, prénom, nom, login, mot_de_passe, mail, telephone ) VALUES ('$type', '$prenom', '$nom', '$login', '$password', '$email',  '$phone_number')";
						        try {
						            $bdd->exec($requete);

						            $_SESSION['success'] = "Inscription reussie. ";
						            $_SESSION['login'] = $login;


						            if($type=="vendeur"){
						            	 header("Location:infovendeur.php");
						            	}else{
						            		if($type=="client"){
						            			 header("Location:infoclient.php");
						            		}
						            	}
						            } 
						        catch(PDOException $e) {
						            echo $requete . "<br>" . $e->getMessage();
						        }	
						}else{
							$error="Vos mots de passe ne correspondent pas";
						}

					}else{
						$error="Le login saisie existe déjà.";
					}

				}else{
					$error="L'adresse E-mail saisie existe déjà.";
				}

			}else{
				$error="Votre adresse E-mail est invalide! Exemple: balla@gmail.com";
			}
		}else{
			$error="Vos adresses E-mail ne correspondent pas.";
		}
	}else{
			$error="Tous les champs ne sont pas renseignes";
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
 	<div class="row">
 		<div class="col-lg-6 offset-3">
 			<div class="form-login">
 				<div class="form-login-header">
 					<h1><i class="fa fa-user-plus"></i></h1>
 					<h3>Créer un compte </h3>
 				</div>
 				<div class="form-login-body">
 					<form method="POST">
 					<div class="row">
		 				<div class="col-lg-6">
 							<div class="form-group">
		 						<label for="prenom" class="input-label">Prénoms:</label>
		 						<input type="text" name="prenom" id="prenom" placeholder="Entrer votre prenom" class="form-control">
		 					</div>
 						</div>
 						<div class="col-lg-6">
 							<div class="form-group">
		 						<label for="nom" class="input-label">Nom:</label>
		 						<input type="text" name="nom" id="nom" placeholder="Entrer votre nom" class="form-control">
		 					</div>
 						</div>
 						<div class="col-lg-6">
 							<div class="form-group">
		 						<label for="email" class="input-label">Adresse E-mail:</label>
		 						<input type="email" name="email" id="email" placeholder="Entrer votre E-mail" class="form-control">
		 					</div>
 						</div>
 						<div class="col-lg-6">
 							<div class="form-group">
		 						<label for="email2" class="input-label">Confirmation E-mail:</label>
		 						<input type="email" name="email2" id="email2" placeholder="Confirmer votre E-mail" class="form-control">
		 					</div>
 						</div>
 						<div class="col-lg-6">
 							<div class="form-group">
		 						<label for="phone_number" class="input-label">Numéro de téléphone:</label>
		 						<input type="number" name="phone_number" id="phone_number" placeholder="+221" class="form-control">
		 					</div>
 						</div>

 						<div class="col-lg-6">
 							<div class="form-group">
		 						<label for="login" class="input-label">Login:</label>
		 						<input type="text" name="login" id="login" placeholder="Entrer un login" class="form-control">
		 					</div>
 						</div>

 						<div class="col-lg-6">
 							<div class="form-group">
		 						<label for="password" class="input-label">Mot de passe:</label>
		 						<input type="password" name="password" id="password" placeholder="Entrer votre mot de passe" class="form-control">
		 					</div>
 						</div>
 						<div class="col-lg-6">
 							<div class="form-group">
		 						<label for="password2" class="input-label">Confirmation mot de passe:</label>
		 						<input type="password" name="password2" id="password2" placeholder="Comfirmer votre mot de passe" class="form-control">
		 					</div>
 						</div>
 						<!-- <div class="col-lg-6">
 							<div class="form-group">
		 						<label for="type" class="input-label">Type:</label>
		 						<input type="type" name="type" id="type" placeholder="Gestionnaire/client/vendeur" class="form-control">
		 					</div>
 						</div> -->
 						 <div class="col-lg-12">
 						 	<label for="type" class="input-label">Type:</label>
 							<div class="form-group">		 						
			                        <select name="type" id="type" class="form-control">
			                        	<option value="client">Client</option>
			                        	<option value="vendeur">Vendeur </option>
                    				</select>
                			</div>
 						</div>

 					<div class="col-lg-12">
 						<div class="form-group" style="text-align: center;margin-top: 10px">
 						<input type="submit" class="btn btn-default green_btn" name="inscription" value="Inscription">
 					</div>
 					</div>
 					
 					<div style="margin-left: 15px">
 						<a href="login.php" class="a-newAccount">Se connecter a un compte ?</a>
 					</div>
 				</form>
 				
 				</div>
 			</div>
 		</div>
 	</div>
 </div>
 </div>
 <?php require('../raccourcie/footer.php') ?>