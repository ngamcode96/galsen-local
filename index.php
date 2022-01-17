<?php
session_start();
$page='home';
require('pages/connexiondb.php');
require('includes/functions.php');

// requete de selection des sous categories
$req_sousCategories = $bdd->query("SELECT sous_categorie, nom_dossier_images FROM produit");
$req_sousCategories = $req_sousCategories->fetchAll(PDO::FETCH_ASSOC);


// requete de selection des produits agroalimentaire
$req_agro = $bdd->prepare("SELECT * FROM produit WHERE categorie = ? LIMIT 8");
$req_agro->execute(array('Agroalimentaire'));
$req_agro = $req_agro->fetchAll(PDO::FETCH_ASSOC);

// requete de selection des produits astisanats
$req_artisanat = $bdd->prepare("SELECT * FROM produit WHERE categorie = ? LIMIT 8");
$req_artisanat->execute(array('Artisanat'));
$req_artisanat = $req_artisanat->fetchAll(PDO::FETCH_ASSOC);

// requete de selection des produits cosmetiques
$req_costmetiques = $bdd->prepare("SELECT * FROM produit WHERE categorie = ? LIMIT 8");
$req_costmetiques->execute(array('Cosmétique'));
$req_costmetiques = $req_costmetiques->fetchAll(PDO::FETCH_ASSOC);


require('raccourcie/header.php');

 ?>
<section class="hero">
        <div class="container">
            <?php if(isset($_SESSION['success']) and !empty($_SESSION['success'])){ ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                  <?php echo $_SESSION['success'] ?>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
            <?php } ?>
                            <?php if(isset($_SESSION['error']) and !empty($_SESSION['error'])){ ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                  <strong>Etat de compte : </strong> <?php echo $_SESSION['error'] ?>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
            <?php } ?>
            <div class="row">
                <div class="col-lg-3">
                    <div class="hero__categories">
                        <div class="hero__categories__all">
                            <i class="fa fa-bars"></i>
                            <span>Toutes les sous categories</span>
                        </div>
                        
                        <ul>
                            <li><a href="pages/souscategorie.php?name=cereale">Cereales</a></li>
                            <li><a href="pages/souscategorie.php?name=fruit">Fruits</a></li>
                            <li><a href="pages/souscategorie.php?name=huile">Huiles</a></li>
                            <li><a href="pages/souscategorie.php?name=legume">Legumes</a></li>
                            <li><a href="pages/souscategorie.php?name=autre">Autres</a></li>
                            <li><a href="pages/souscategorie.php?name=chaussure">Chaussures</a> <a href="pages/souscategorie.php?name=habit">habits</a><a href="pages/souscategorie.php?name=sac">sacs</a></li>
                            <li><a href="pages/souscategorie.php?name=tableau">Tableaux</a><a href="pages/souscategorie.php?name=statuette">statuettes</a><a href="pages/souscategorie.php?name=bijou"> bijoux</a></li>
                            <li><a href="pages/souscategorie.php?name=drap">Draps</a><a href="pages/souscategorie.php?name=nappe">nappes</a></li>
                            <li><a href="pages/souscategorie.php?name=pour corps">Pour corps</a></li>
                            <li><a href="pages/souscategorie.php?name=pour cheuveux">Pour cheuveux</a></li>
                        </ul>
                    
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="hero__search">
                        <div class="hero__search__form">
                            <form action="pages/search.php" method="POST">
                                <div class="hero__search__categories">
                                    <select class="form-control" style="border: none;" name="category">
                                        <option value=""> Tous</option>
                                        <option value="Agroalimentaires"> Agroalimentaires</option>
                                        <option value="Artisanat"> Artisanats</option>
                                        <option value="Cosmétique"> Cosmétiques</option>
                                    </select>
                                </div>
                                <input type="text" placeholder="Que recherchiez-vous ?" name="query">
                                <button type="submit" class="site-btn" name="btn_search">Recherche</button>
                            </form>
                        </div>
                        <div class="hero__search__phone">
                            <div class="hero__search__phone__icon">
                                <i class="fa fa-user"></i>
                            </div>
                             <?php if(isset($_SESSION['id_utilisateur'])) { ?>
                            <div class="hero__search__phone__text">
                                <h5><?php echo $_SESSION['prenom'].' '. $_SESSION['nom']; ?></h5>
                                <a href="#"><span>Voir le profil</span></a>
                            </div>
                        <?php }else{ ?>
                            <div class="hero__search__phone__text">
                                <h5>User</h5>
                                <a href="#"><span>Voir le profil</span></a>
                            </div>
                        <?php } ?>
                        </div>
                    </div>
                    <div class="hero__item transp">
                        <div class="hero__text">
                            <h2 class="text-col">Produits<br />100% Locaux</h2>
                            <p class="text-col">Achetez ou Vendez en toute securite</p>
                            <?php if(isset($_SESSION['type']) and ($_SESSION['type'] == 'vendeur')){ ?>
                                <a href="pages/ajoutproduit.php" class="primary-btn text-col">Vendez un produit</a>
                            <?php }elseif(isset($_SESSION['type']) and ($_SESSION['type'] == 'gestionnaire')){ ?>
                            <a href="pages/demandeinscription.php" class="primary-btn text-col">Voir les demandes d'inscription</a>
                            <?php }else{ ?>
                                <a href="#products" class="primary-btn text-col">Servez vous maintenant</a>
                            <?php } ?>
                        </div>
                    </div>
                    <div id="carouselExampleIndicators" class="carousel slide my-4" data-ride="carousel">
          <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class=""></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2" class=""></li>
          </ol>
          <div class="carousel-inner" role="listbox">
            <div class="carousel-item">
              <img class="d-block img-fluid" style="max-height:420px; width:100%" src="assets/img/art22.jpg" alt="First slide">
            </div>
            <div class="carousel-item active">
              <img class="d-block img-fluid"  src="assets/img/images/s2.jpeg" alt="Second slide">
            </div>
            <div class="carousel-item">
              <img class="d-block img-fluid" style="max-height:420px; width:100%" src="assets/img/cosm2.jpg" alt="Third slide">
            </div>
          </div>
          <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>
                    
                </div>
            </div>
        </div>
    </section>

     <section class="categories">
        <div class="container">
            <div class="row">
                <div class="categories__slider owl-carousel">
                   <!--  <?php //foreach($req_sousCategories as $sous_categorie): ?>
                    <div class="col-lg-3">
                        <div class="categories__item set-bg" data-setbg="<?php //echo $sous_categorie['nom_dossier_images'] ?>1">
                            <h5><a href="#"><?php //echo $sous_categorie['sous_categorie'] ?></a></h5>
                        </div>
                    </div>
                <?php //endforeach; ?> -->
                    <div class="col-lg-3">
                        <div class="categories__item set-bg" data-setbg="assets/img/banner/legumes/l2.png">
                            <h5><a href="/pages/souscategorie.php?name=fruit">Fruits</a></h5>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="categories__item set-bg" data-setbg="assets/img/banner/huile/ricin1.jpg">
                            <h5><a href="/pages/souscategorie.php?name=huile">Huiles</a></h5>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="categories__item set-bg" data-setbg="assets/img/banner/legumes/leg1.jpg">
                            <h5><a href="/pages/souscategorie.php?name=legume">Legumes</a></h5>
                        </div>
                    </div>
                     <div class="col-lg-3">
                        <div class="categories__item set-bg" data-setbg="assets/img/banner/chaussures/chauss2.jpg">
                            <h5><a href="/pages/souscategorie.php?name=chaussure">Chaussures</a></h5>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="categories__item set-bg" data-setbg="assets/img/banner/statuette/ha.png">
                            <h5><a href="/pages/souscategorie.php?name=habit">habits</a></h5>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="categories__item set-bg" data-setbg="assets/img/banner/statuette/pa3.png">
                            <h5><a href="/pages/souscategorie.php?name=sac">Sacs</a></h5>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="categories__item set-bg" data-setbg="assets/img/banner/tableau/tab6.jpg">
                            <h5><a href="/pages/souscategorie.php?name=tableau">Tableaux</a></h5>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="categories__item set-bg" data-setbg="assets/img/banner/statuette/pa1.png">
                            <h5><a href="/pages/souscategorie.php?name=statuette">Statuettes</a></h5>
                        </div>
                    </div>
                     <div class="col-lg-3">
                        <div class="categories__item set-bg" data-setbg="assets/img/banner/draps/drap5.jpg">
                            <h5><a href="/pages/souscategorie.php?name=drap">Draps</a></h5>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="categories__item set-bg" data-setbg="assets/img/banner/nappe/nappe5.jpg">
                            <h5><a href="/pages/souscategorie.php?name=nappe">Nappes</a></h5>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="categories__item set-bg" data-setbg="assets/img/banner/produitsCosCorps/cosmcorp6.jpg">
                            <h5><a href="/pages/souscategorie.php?name=pour corps">Soins pour corps</a></h5>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="categories__item set-bg" data-setbg="assets/img/procos.png">
                            <h5><a href="/pages/souscategorie.php?name=pour cheuveux">Soins pour cheuveux</a></h5>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="categories__item set-bg" data-setbg="assets/img/cosm.jpg">
                            <h5><a href="#">Autres</a></h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
     <section class="featured spad" id="products">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>Produits agroalimentaires</h2>
                    </div>
                    <div class="featured__controls">
                        <ul>
                            <li class="active" data-filter="*">Tous</li>
                            <li data-filter=".Céréales">Céréales</li>
                            <li data-filter=".Huile">Huile</li>
                            <li data-filter=".Légumes">Légumes</li>
                            <li data-filter=".Fruits">Fruits</li>
                            <li data-filter=".Autres">Autres</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row featured__filter">
                <?php foreach($req_agro as $produit_agro) : ?>
                <div class="col-lg-3 col-md-4 col-sm-6 mix <?php echo $produit_agro['sous_categorie'] ?>">
                    <div class="featured__item">
                        <div class="featured__item__pic set-bg" data-setbg="<?php echo getOneFileInDirectory($produit_agro['nom_dossier_images'], 0) ?>">
                            <ul class="featured__item__pic__hover">
                                <li><a href="pages/detailproduit.php?id=<?php echo $produit_agro['id_produit'] ?>"><i class="fa fa-eye"></i></a></li>
                            </ul>
                        </div>
                        <div class="featured__item__text">
                            <h6><a href="pages/detailproduit.php?id=<?php echo $produit_agro['id_produit'] ?>"><?php echo $produit_agro['nom'] ?> </a></h6>
                        </div>
                    </div>
                </div>
            <?php endforeach ?>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>Produits Artisanats</h2>
                    </div>
                    <div class="featured__controls">
                        <ul>
                            <li class="active" data-filter="*">Tous</li>
                            <li data-filter=".Sac">Sac</li>
                            <li data-filter=".Chaussures">Chaussures</li>
                            <li data-filter=".Autres">Autres</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row featured__filter">
                <?php foreach($req_artisanat as $produit_artisanat) : ?>
                <div class="col-lg-3 col-md-4 col-sm-6 mix <?php echo $produit_artisanat['sous_categorie'] ?>">
                    <div class="featured__item">
                        <div class="featured__item__pic set-bg" data-setbg="<?php echo getOneFileInDirectory($produit_artisanat['nom_dossier_images'], 0) ?>">
                            <ul class="featured__item__pic__hover">
                                <li><a href="pages/detailproduit.php?id=<?php echo $produit_artisanat['id_produit'] ?>"><i class="fa fa-eye"></i></a></li>
                            </ul>
                        </div>
                        <div class="featured__item__text">
                            <h6><a href="pages/detailproduit.php?id=<?php echo $produit_artisanat['id_produit'] ?>"><?php echo $produit_artisanat['nom'] ?> </a></h6>
                        </div>
                    </div>
                </div>
            <?php endforeach ?>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>Produits Cosmétiques</h2>
                    </div>
                    <div class="featured__controls">
                        <ul>
                            <li class="active" data-filter="*">Tous</li>
                            <li data-filter=".Pour corps">Pour corps</li>
                            <li data-filter=".Pour cheveux">Pour cheveux</li>
                            <li data-filter=".Autres">Autres</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row featured__filter">
                <?php foreach($req_costmetiques as $produit_cosmetique) : ?>
                <div class="col-lg-3 col-md-4 col-sm-6 mix <?php echo $produit_cosmetique['sous_categorie'] ?>">
                    <div class="featured__item">
                        <div class="featured__item__pic set-bg" data-setbg="<?php echo getOneFileInDirectory($produit_cosmetique['nom_dossier_images'], 0) ?>">
                            <ul class="featured__item__pic__hover">
                                <li><a href="pages/detailproduit.php?id=<?php echo $produit_cosmetique['id_produit'] ?>"><i class="fa fa-eye"></i></a></li>
                            </ul>
                        </div>
                        <div class="featured__item__text">
                            <h6><a href="pages/detailproduit.php?id=<?php echo $produit_cosmetique['id_produit'] ?>"><?php echo $produit_cosmetique['nom'] ?> </a></h6>
                        </div>
                    </div>
                </div>
            <?php endforeach ?>
            </div>
        </div>
    </section>
    <!-- Featured Section End -->
<?php 
$_SESSION['error'] = '';
$_SESSION['success'] = '';
require('raccourcie/footer.php') ?>
