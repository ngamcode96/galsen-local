<?php
session_start();
require('connexiondb.php');
require('../includes/functions.php');

	if(isset($_POST['btn_search'])){
		extract($_POST);
		$search = $query;
		$query = '%'.$query.'%';
		if(!empty($category)){
			if(!empty($search)){
				$requete = $bdd->prepare("SELECT * FROM produit WHERE categorie = ? AND (nom like ? OR sous_categorie like ?)");
				$requete->execute(array($category, $query, $query));
				$resultats = $requete->fetchAll(PDO::FETCH_ASSOC);
			}else{
				$requete = $bdd->prepare("SELECT * FROM produit WHERE categorie = ?");
				$requete->execute(array($category));
				$resultats = $requete->fetchAll(PDO::FETCH_ASSOC);

			}
		}else{
			$requete = $bdd->prepare("SELECT * FROM produit WHERE nom like ? OR sous_categorie like ?");
			$requete->execute(array($query, $query));
			$resultats = $requete->fetchAll(PDO::FETCH_ASSOC);

		}
		
	}else{
		$resultats = array();
	}

require('../raccourcie/header.php');
 ?>

     <section class="related-product">
        <div class="container">
        	 <div class="section-title resultats" style="margin-top: 10px">
                        <h4>Les résultats de la recherche : <?php if(!empty($search)) { echo '"'.$search.'"'; }; ?></h4>
                        <h5> <?php echo sizeof($resultats) ?> résultats trouvés</h5>
                    </div>
        	<div class="row">
        		<div class="col-lg-12">
        			<div class="hero__search">
                        <div class="hero__search__form" style="width: 100%">
                            <form  method="POST">
                                <div class="hero__search__categories">
                                    <select class="form-control" style="border: none;" name="category">
                                        <option value=""> Tous</option>
                                        <option value="Agroalimentaire" > Agroalimentaires</option>
                                        <option value="Artisanat"> Artisanats</option>
                                        <option value="Cosmétique"> Cosmétiques</option>
                                    </select>
                                </div>
                                <input type="text" placeholder="Que recherchiez-vous ?" name="query" value="<?php if(!empty($search)) { echo $search; }; ?>" >
                                <button type="submit" class="site-btn" name="btn_search">Rechercher</button>
                            </form>
                        </div>
                       
                    </div>
        		</div>
        	</div>
            <div class="row featured__filter">
                <?php foreach($resultats as $resultat) : ?>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="featured__item">
                        <div class="featured__item__pic set-bg" data-setbg="<?php echo getOneFileInDirectory($resultat['nom_dossier_images'], 1); ?>">
                            <ul class="featured__item__pic__hover">
                                <li><a href="/pages/detailproduit.php?id=<?php echo $resultat['id_produit'] ?>"><i class="fa fa-eye"></i></a></li>
                            </ul>
                        </div>
                        <div class="featured__item__text">
                            <h6><a href="/pages/detailproduit.php?id=<?php echo $resultat['id_produit'] ?>"><?php echo $resultat['nom'] ?> </a></h6>
                            <h6><a href="/pages/souscategorie.php?name=<?php echo $resultat['sous_categorie'] ?>"><?php echo $resultat['sous_categorie'] ?> </a></h6>
                        </div>
                    </div>
                </div>
            <?php endforeach ?>
            </div>
        </div>
    </section>

 <?php 
require('../raccourcie/footer.php');

 ?>