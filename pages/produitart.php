<?php 
session_start();
$page='artisanat';

require('../raccourcie/header.php');
require('connexiondb.php');
require('../includes/functions.php');

// requete de selection des sous categories
$req_sousCategories = $bdd->query("SELECT Distinct(sous_categorie), nom_dossier_images FROM produit WHERE categorie='Artisanat'");
$req_sousCategories = $req_sousCategories->fetchAll(PDO::FETCH_ASSOC);

$req_artisanat = $bdd->prepare("SELECT * FROM produit WHERE categorie = ? LIMIT 100");
$req_artisanat->execute(array('Artisanat'));
$req_artisanat = $req_artisanat->fetchAll(PDO::FETCH_ASSOC);
?>






 <section class="product-details spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="product__details__pic">
                        <div class="product__details__pic__item">
                            <img class="product__details__pic__item--large"
                                src="..//assets/img/kk1.jpg" alt="agroalimentaire">
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="product__details__text">
                        <h3>Produit Artisanales</h3>
                        <div class="product__details__rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star-half-o"></i>
                            <span>(18 reviews)</span>
                        </div>
                        <p>Un produit artisanal est un produit fabriqué en pièces uniques ou en petites séries. Il met en jeu le savoir-faire d’un ou plusieurs artisans. Pour l’opposer à un produit industriel, le produit artisanal n’est pas fabriqué en grandes quantités par des machines.
                        La fabrication artisanale implique souvent la fabrication manuelle mais pas toujours. Dans le processus de fabrication artisanal,  la machine peut intervenir. Et c’est là que se fait la différence avec le produit fait-main.</p>
                       
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
                        <div class="categories__item set-bg" data-setbg="/assets/img/banner/chaussures/chauss2.jpg">
                            <h5><a href="souscategorie.php?name=chaussure">Chaussures</a></h5>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="categories__item set-bg" data-setbg="/assets/img/banner/statuette/ha.png">
                            <h5><a href="souscategorie.php?name=habit">habits</a></h5>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="categories__item set-bg" data-setbg="/assets/img/banner/statuette/pa3.png">
                            <h5><a href="souscategorie.php?name=sac">Sacs</a></h5>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="categories__item set-bg" data-setbg="/assets/img/banner/tableau/tab6.jpg">
                            <h5><a href="souscategorie.php?name=tableau">Tableaux</a></h5>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="categories__item set-bg" data-setbg="/assets/img/banner/statuette/pa1.png">
                            <h5><a href="souscategorie.php?name=statuette">Statuettes</a></h5>
                        </div>
                    </div>
                     <div class="col-lg-3">
                        <div class="categories__item set-bg" data-setbg="/assets/img/banner/draps/drap5.jpg">
                            <h5><a href="souscategorie.php?name=drap">Draps</a></h5>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="categories__item set-bg" data-setbg="/assets/img/banner/nappe/nappe5.jpg">
                            <h5><a href="souscategorie.php?name=nappe">Nappes</a></h5>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <!-- Related Product Section Begin -->
    
    <section class="related-product">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title related__product__title">
                        <h2>Produits</h2>
                    </div>
                </div>
            </div>
    <section class="related-product">
      
            <div class="row featured__filter">
                <?php foreach($req_artisanat as $produit_artisanat) : ?>
                <div class="col-lg-3 col-md-4 col-sm-6 mix <?php echo $produit_artisanat['sous_categorie'] ?>">
                    <div class="featured__item">
                        <div class="featured__item__pic set-bg" data-setbg="<?php echo getOneFileInDirectory($produit_artisanat['nom_dossier_images'],1) ?>">
                            <ul class="featured__item__pic__hover">
                                <li><a href="/pages/detailproduit.php?id=<?php echo $produit_artisanat['id_produit'] ?>"><i class="fa fa-eye"></i></a></li>
                            </ul>
                        </div>
                        <div class="featured__item__text">
                            <h6><a href="/pages/detailproduit.php?id=<?php echo $produit_artisanat['id_produit'] ?>"><?php echo $produit_artisanat['nom'] ?> </a></h6>
                        </div>
                    </div>
                </div>
            <?php endforeach ?>
            </div>
    </section>
            
<?php require('../raccourcie/footer.php') ?>