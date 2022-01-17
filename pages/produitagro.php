<?php 
session_start();
$page='agro';

require('../raccourcie/header.php');
require('connexiondb.php');
require('../includes/functions.php');
$req_sousCategories = $bdd->query("SELECT Distinct(sous_categorie), nom_dossier_images FROM produit WHERE categorie='Agroalimentaire'");
$req_sousCategories = $req_sousCategories->fetchAll(PDO::FETCH_ASSOC);

$req_agro = $bdd->prepare("SELECT * FROM produit WHERE categorie = ? LIMIT 100");
$req_agro->execute(array('Agroalimentaire'));
$req_agro = $req_agro->fetchAll(PDO::FETCH_ASSOC);
?>

 <section class="product-details spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="product__details__pic">
                        <div class="product__details__pic__item">
                            <img class="product__details__pic__item--large"
                                src="..//assets/img/banner/legumes/agro1.jpg" alt="agroalimentaire">
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="product__details__text">
                        <h3>Produits issus de la transformation Agroalimentai</h3>
                        <div class="product__details__rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star-half-o"></i>
                            <span>(18 reviews)</span>
                        </div>
                        <p>La transformation alimentaire regroupe des activités qui concernent la préparation (conditionnement et conservation) ou la fabrication d’aliments. De manière générale, la transformation peut être conçue comme une chaîne regroupant simultanément (ou non) des étapes de préparation et de fabrication.
						La préparation concerne les opérations qui ne modifient pas la forme de la matière première, soit le conditionnement et la conservation. Le conditionnement consiste à trier, laver ou emballer les aliments bruts issus de la production (telle que définie précédemment). La conservation renvoie à différents procédés dont le but est de maintenir la comestibilité des aliments. Il peut s’agir de les fumer, de les congeler ou de les mettre en conserve.</p>
                       
            </div>
        </div>
    </section>
    <!-- Product Details Section End -->
     <section class="categories">
        <div class="container">
             <div class="section-title">
                <h2>Sous categories</h2>
            </div>
            <div class="row">
                
                <div class="categories__slider owl-carousel">
                     <div class="col-lg-3">
                        <div class="categories__item set-bg" data-setbg="/assets/img/banner/cereales/gofio1.png">
                            <h5><a href="souscategorie.php?name=cereale">Ceareales</a></h5>
                        </div>
                    </div>
                     <div class="col-lg-3">
                        <div class="categories__item set-bg" data-setbg="/assets/img/banner/fruits/jus3.png">
                            <h5><a href="souscategorie.php?name=fruit">Fruits</a></h5>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="categories__item set-bg" data-setbg="/assets/img/banner/huile/hp.png">
                            <h5><a href="souscategorie.php?name=huile">Huiles</a></h5>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="categories__item set-bg" data-setbg="/assets/img/banner/legumes/l1.png">
                            <h5><a href="souscategorie.php?name=legume">Legumes</a></h5>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="categories__item set-bg" data-setbg="img/categories/cat-5.jpg">
                            <h5><a href="souscategorie.php?name=autre">Autres</a></h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="related-product">
        <div class="container">
             <div class="section-title" style="margin-top: 80px">
                        <h2>Tous les produits agroalimentaires</h2>
                    </div>
            <div class="row featured__filter">
                <?php foreach($req_agro as $produit_agro) : ?>
                <div class="col-lg-3 col-md-4 col-sm-6 mix <?php echo $produit_agro['sous_categorie'] ?>">
                    <div class="featured__item">
                        <div class="featured__item__pic set-bg" data-setbg="<?php echo getOneFileInDirectory($produit_agro['nom_dossier_images'], 1); ?>">
                            <ul class="featured__item__pic__hover">
                                <li><a href="/pages/detailproduit.php?id=<?php echo $produit_agro['id_produit'] ?>"><i class="fa fa-eye"></i></a></li>
                            </ul>
                        </div>
                        <div class="featured__item__text">
                            <h6><a href="/pages/detailproduit.php?id=<?php echo $produit_agro['id_produit'] ?>"><?php echo $produit_agro['nom'] ?> </a></h6>
                        </div>
                    </div>
                </div>
            <?php endforeach ?>
            </div>
        </div>
    </section>
<?php require('../raccourcie/footer.php') ?>