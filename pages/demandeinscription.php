<?php 
	session_start();
	require('authcontrol.php');
	require('connexiondb.php');

	if(isset($_SESSION['type']) and $_SESSION['type'] != 'gestionnaire'){
		header('Location: index.php');
	}

		
		if(isset($_POST['changerEtat'])){
			if(!empty($_POST['id_utilisateur']) and !empty($_POST['etat'])){
				$ext=extract($_POST);
				$requete = $bdd->prepare("UPDATE inscription_vendeur set etat = ? where id_utilisateur = ?");
				$requete->execute(array($etat, $id_utilisateur));

				if($requete){
					$success = "L'etat de l'inscription de l'utilisateur numero ". $id_utilisateur . " a été mis à jour vers ".$etat . ".";
				}
			}
		}

		$requete=$bdd->query("SELECT * FROM inscription_vendeur I, utilisateur U WHERE I.id_utilisateur = U.id_utilisateur and U.type='vendeur'");
		$inscription=$requete->fetchAll(PDO::FETCH_ASSOC);



		require('../raccourcie/header.php');
		?>
	<div class="container">
		<?php if(isset($success) and !empty($success)){ ?>
			<div class="alert alert-success alert-dismissible fade show" role="alert">
			   <?php echo $success ?>
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			    <span aria-hidden="true">&times;</span>
			  </button>
			</div>
		<?php } ?>
		<div class="row">
			<div class="col-lg-8">
				<h3>La liste des inscriptions des vendeurs</h3>
				<table class="table">
				  <thead class="thead-dark">
				    <tr>
				      <th scope="col">Numero</th>
				      <th scope="col">Prénom</th>
				      <th scope="col">Nom</th>
				      <th scope="col">L'identifiant</th>
				      <th scope="col">Etat</th>
				      <th scope="col">Date</th>
				    </tr>
				  </thead>
				  <tbody>
		<?php foreach($inscription as $row): ?>
				    <tr>
				      <th scope="row"><?php  echo $row['id_incription'] ?></th>
				      <td><?php  echo $row['prénom'] ?></td>
				      <td><?php  echo $row['nom'] ?></td>
				      <td>@<?php  echo $row['id_utilisateur'] ?></td>
				      <td><?php  echo $row['etat'] ?></td>
				      <td><?php  echo $row['date'] ?></td>

				    </tr>
		<?php endforeach?>
		  </tbody>
		</table>
			</div>
			<div class="col-lg-4">
				<form method="POST">
					<div class="form-login">
				<h3>Modifier une inscription</h3>
						<div class="form-group">
						<label for="id_utilisateur">Selectionner l'id de l'utilisateur</label>
						<select name="id_utilisateur" id="id_utilisateur" class="form-control">
							<?php foreach($inscription as $row): ?>
							<option value="<?php  echo $row['id_utilisateur'] ?>"><?php  echo $row['id_utilisateur'] ?></option>
							<?php endforeach?>
						</select>
						</div>
						<div class="form-group">
							<label for="etat">Etat de l'inscription</label>
							<select name="etat" id="type" class="form-control" >
				            	<option value="En attente">En attente</option>
				            	<option value="Validé">Validé</option>
				            	<option value="Refusé">Refusé</option>
				            	<option value="Suspendu">Suspendu</option>
				            	<option value="Archivé">Archivé</option>
							</select>
						</div>
						<input type="submit" name="changerEtat" value="Changer" class="btn btn-success">
					</div>
				</form>
			</div>
		</div>
	</div>
 					
 <?php require('../raccourcie/footer.php') ;
 ?>