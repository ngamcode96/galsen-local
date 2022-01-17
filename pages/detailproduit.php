 <?php 
session_start();

require('connexiondb.php');
require('../includes/functions.php');

if (isset($_GET['id'])){
        $id=$_GET['id'];
        $requete = $bdd->prepare("SELECT * FROM produit where id_produit=?");
        $requete->execute(array($id));
        $produit = $requete->fetch();

    }else{
        header('LOCATION: index.php');
    }
 require('../raccourcie/header.php');       
?>
 <section class="product-details spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="product__details__pic">
                        <div class="product__details__pic__item">
                            <img class="product__details__pic__item--large"
                                src="<?php echo getOneFileInDirectory($produit['nom_dossier_images'], 1); ?>" alt="">
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="product__details__text">
                        <h3><?php echo $produit['nom']?></h3>
                        <ul>
                            <li><b>Disponibilite</b> <span> <?php echo $produit['etat']?></span></li>
                            <li><b>Quantite</b> <span> <samp><?php echo $produit['quantite']?></samp></span></li>
                            <li><b>Description</b> <span><?php echo $produit['description']?></span></li>
                             <li><b>Sous categories</b> <span><?php echo $produit['sous_categorie']?></span></li>
                            
                        </ul>
                    </div>               
                 </div>
             </div>
        </div>     
</section>
    <?php require('../raccourcie/footer.php') ?>