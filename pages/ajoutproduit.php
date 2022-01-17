<?php 
	session_start();
	require('authcontrol.php');
	require('connexiondb.php');	

	 

	$requete = $bdd->prepare("SELECT * FROM inscription WHERE id_utilisateur = ? AND etat = 'Valider' ");
	$requete->execute(array($_SESSION['id_utilisateur']));
	$requete = $requete->fetch();
	if(!$requete){
		$_SESSION['error'] = "Etat actuelle de votre compte ne vous permet pas d'ajouter des produits";
		header("Location: /index.php");
	}

if(isset($_POST['ajout'])){
	if(!empty($_POST['nom']) and !empty($_POST['desc']) and !empty($_POST['souscategorie']) and !empty($_POST['qte'])){
		$ext=extract($_POST);
		$nom= htmlspecialchars($nom);
		$desc= htmlspecialchars($desc);
		$souscategorie= htmlspecialchars($souscategorie);
		$qte= htmlspecialchars($qte);

		$req_id = $bdd->query('SELECT id_produit FROM produit ORDER BY id_produit DESC LIMIT 1');
		$req_id = $req_id->fetch();
		$id = $req_id['id_produit'];
		$id++;

		$nom_dossier_images = "../uploads/images/".$_SESSION['login']."/". $id."/"; 



		if (!file_exists($nom_dossier_images)) {
    	mkdir($nom_dossier_images, 0777, true);
		}

		// $nom_dossier_images = "/uploads/images/".$_SESSION['login']."/". $id."/"; 

	    $allowTypes = array('jpg','png','jpeg','gif','JPG', 'PNG', 'JPEG', 'GIF'); 


	    $count=0;
	     
	    if(!empty($_FILES['files']['name'])){ 
	        foreach($_FILES['files']['name'] as $key=>$val){ 
	        	$count++;
	            $fileName = basename($_FILES['files']['name'][$key]); 
	            $targetFilePath = $nom_dossier_images . $fileName; 
	             
	            $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION); 

	            if(in_array($fileType, $allowTypes)){ 
	                if(move_uploaded_file($_FILES["files"]["tmp_name"][$key], $nom_dossier_images.$count.".".$fileType)){ 

                			$upload_images = 1;
                			$nom_dossier_images = "/uploads/images/".$_SESSION['login']."/". $id."/"; 

	                }else{ 
	                    $error = "Impossible de charger les images.";
	                } 
	            }else{ 
	                $error = "Type d'image incorrect. Veillez choisir('jpg','png','jpeg','gif','JPG', 'PNG', 'JPEG', 'GIF') ";
	            } 
	        }
	    }

	    if(isset($upload_images) and $upload_images === 1){
	    	$requete = "INSERT INTO produit (nom, description, categorie, sous_categorie, quantite, etat,nom_dossier_images ) VALUES ('$nom', '$desc', '$categorie', '$souscategorie', '$qte',  '$etat', '$nom_dossier_images')";

							 try {
						            $bdd->exec($requete);
						             $_SESSION['success'] = "Votre produit a bien ete ajoute. ";
						            
						             header("Location:index.php");
						        } 
						        catch(PDOException $e) {
						            echo $requete . "<br>" . $e->getMessage();
						        }
	    }
	 }
	else{
		echo "tous les champs doivent etre renseigne";
	}
}
	require('../raccourcie/header.php');	
?>
<div class="container">
 	<div class="row">
 		<div class="col-lg-6 offset-3">
 			<div class="form-login">
 				<div class="form-login-header">
 					<h1><i class="fa fa-plus"></i></h1>
 					<h3>Ajouter un produit </h3>
 				</div>
				<div class="form-login-body">
 					<form method="POST" enctype="multipart/form-data">
 					<div class="row">
		 				<div class="col-lg-6">
 							<div class="form-group">
		 						<label for="nom" class="input-label">Nom du produit:</label>
		 						<input type="text" name="nom" id="nom" placeholder="Entrer le nom de votre produit" class="form-control">
		 					</div>
 						</div>

 						<div class="col-lg-6">
 							<div class="form-group">
		 						<label for="files" class="input-label">Images du produit</label>
		 						<input type="file" name="files[]" id="files" class="form-control" multiple>
		 					</div>
 						</div>
 						<div class="col-lg-6">
 							<label for="categorie" class="input-label">Categorie du produit:</label>
 							<div class="form-group">
			                        <select name="categorie" id="type" class="form-control">
			                        	<option value="Agroalimentaire">Agroalimentaire</option>
			                        	<option value="Artisanat">Artisanat</option>
			                        	<option value="Cosmetique">Cosmetique</option>
			                        	<option value="Autre">Autre</option>
                    				</select>
                			</div>
 						</div>
 						<div class="col-lg-6">
 							<div class="form-group">
		 						<label for="souscategorie" class="input-label">Sous categorie:</label>
		 						<input type="text" name="souscategorie" id="souscategorie" placeholder="Entrer le sous categorie de votre produit " class="form-control">
		 					</div>
 						</div>
 						<!-- <div class="col-lg-6">
 							<div class="form-group">
		 						<label for="nomdossier" class="input-label">Nom dossier de l'image:</label>
		 						<input type="text" name="nomdossier" id="nomdossier" placeholder="Entrer le nom du dossier de votre produit" class="form-control">
		 					</div>
 						</div> -->

 						<div class="col-lg-6">
 							<div class="form-group">
		 						<label for="qte" class="input-label">Quantite du produit:</label>
		 						<input type="number" name="qte" id="qte" placeholder="Entrer la quantite" class="form-control">
		 					</div>
 						</div>
 						<div class="col-lg-6">
 							<label for="etat" class="input-label">Diponibilite du produit:</label>
 								<div class="form-group">
			                        <select name="etat" id="type" class="form-control">
			                        	<option value="Disponible">Disponible</option>
			                        	<option value="Epuise">Epuise</option>
			                        	<option value="En rupture de stock">En rupture de stock</option>
			                        	<option value="Archive">Archive</option>
                    				</select>
                				</div>
 							</div>

 						<div class="col-lg-12">
 							<div class="form-group">
		 						<label for="desc" class="input-label">Description du produit:</label>
		 						<textarea name="desc" id="desc" placeholder="Decrivez vore produit" class="form-control" rows="3"></textarea>
		 					</div>
 						</div>
 						<div class="col-lg-12">
 							<div class="row">
 								<div class="col-lg-4 offset-4">
 									<div class="form-group">
			 							<input type="submit" class="btn btn-default green_btn" name="ajout" value="Ajout du produit">
			 						</div>
 								</div>
 							</div>
 						</div>
 						</div>
 					</div>
 				</div>
 			</div>	
 		</div>
 	</div>
 </div>
 </div>	
 <?php require('../raccourcie/footer.php') ?>
 						
 						
 						 