<?php 
	session_start();
	require('connexiondb.php');	
	require('../includes/functions.php');

	if (isset($_GET['name'])){
		$name=$_GET['name'];
		$requete = $bdd->prepare("SELECT * FROM produit where sous_categorie=?");
		$requete->execute(array($name));
		$requete = $requete->fetchAll(PDO::FETCH_ASSOC);
		

	}else{
		header('LOCATION: ../index.php' );
	}
require('../raccourcie/header.php');
?>
<section>
 <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2><?php echo $name ?></h2>
                    </div>
                </div>
            </div>
            <div class="row featured__filter">
                <?php foreach($requete as $produit) : ?>
                <div class="col-lg-3 col-md-4 col-sm-6 ">
                    <div class="featured__item">
                        <div class="featured__item__pic set-bg" data-setbg="<?php echo getOneFileInDirectory($produit['nom_dossier_images'],1); ?>">
                            <ul class="featured__item__pic__hover">
                                <li><a href="pages/detailproduit.php?id=<?php echo $produit['id_produit'] ?>"><i class="fa fa-eye"></i></a></li>
                            </ul>
                        </div>
                        <div class="featured__item__text">
                            <h6><a href="pages/detailproduit.php?id=<?php echo $produit['id_produit'] ?>"><?php echo $produit['nom'] ?> </a></h6>
                        </div>
                    </div>
                </div>
            <?php endforeach ?>
            </div>
        </div>
  </section>


<?php 
$_SESSION['error'] = '';
$_SESSION['success'] = '';
require('../raccourcie/footer.php') ?>