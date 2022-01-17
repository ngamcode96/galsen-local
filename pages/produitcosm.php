<?php 
session_start();
$page='cosmetique';

require('../raccourcie/header.php');
require('connexiondb.php');
require('../includes/functions.php');

// requete de selection des sous categories
$req_sousCategories = $bdd->query("SELECT Distinct(sous_categorie), nom_dossier_images FROM produit WHERE categorie='Cosmétique'");
$req_sousCategories = $req_sousCategories->fetchAll(PDO::FETCH_ASSOC);

$req_costmetiques = $bdd->prepare("SELECT * FROM produit WHERE categorie = ? LIMIT 8");
$req_costmetiques->execute(array('Cosmétique'));
$req_costmetiques = $req_costmetiques->fetchAll(PDO::FETCH_ASSOC);
?>

 <section class="product-details spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="product__details__pic">
                        <div class="product__details__pic__item">
                            <img class="product__details__pic__item--large"
                                src="..//assets/img/bio1.jpg" alt="agroalimentaire">
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="product__details__text">
                        <h3>Produit Cosmetiques locales</h3>
                        <div class="product__details__rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star-half-o"></i>
                            <span>(18 reviews)</span>
                        </div>
                        <p>Le domaine du cosmétique se développe et plusieurs structures sénégalaises proposent des huiles crèmes, shampoings et lotions de beauté issus de produits naturels, bio pour la plupart..</p>
                       
            </div>
        </div>
    </section>
    <!-- Product Details Section End -->
 <section class="categories">
        <div class="container">
             <div class="section-title" style="margin-top: 80px">
                        <h2>Sous Categories</h2>
                    </div>
            <div class="row">
                <div class="categories__slider owl-carousel">
                     <div class="col-lg-3">
                        <div class="categories__item set-bg" data-setbg="/assets/img/banner/produitsCosCorps/cosmcorp6.jpg">
                            <h5><a href="souscategorie.php?name=pour corps">Soins pour corps</a></h5>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="categories__item set-bg" data-setbg="/assets/img/procos.png">
                            <h5><a href="souscategorie.php?name=pour cheuveux">Soins pour cheuveux</a></h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="container">
             <div class="section-title" style="margin-top: 80px">
                        <h2>Tous les produits Cosmetiques</h2>
                    </div>
            <div class="row featured__filter">
                <?php foreach($req_costmetiques as $produit_cosmetique) : ?>
                <div class="col-lg-3 col-md-4 col-sm-6 mix <?php echo $produit_cosmetique['sous_categorie'] ?>">
                    <div class="featured__item">
                        <div class="featured__item__pic set-bg" data-setbg="<?php echo getOneFileInDirectory($produit_cosmetique['nom_dossier_images'],1); ?>">
                            <ul class="featured__item__pic__hover">
                                <li><a href="/pages/detailproduit.php?id=<?php echo $produit_cosmetique['id_produit'] ?>"><i class="fa fa-eye"></i></a></li>
                            </ul>
                        </div>
                        <div class="featured__item__text">
                            <h6><a href="/pages/detailproduit.php?id=<?php echo $produit_cosmetique['id_produit'] ?>"><?php echo $produit_cosmetique['nom'] ?> </a></h6>
                        </div>
                    </div>
                </div>
            <?php endforeach ?>
            </div>
        </div>
    </section>
   
<?php require('../raccourcie/footer.php') ?>