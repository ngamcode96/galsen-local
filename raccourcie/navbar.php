<body>
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="header__logo" >
                        <a href="/"><img src="/assets/img/logo.png" alt=""></a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <nav class="header__menu" data-setbg="/..///img/bg.jpg">
                        <ul>
                            <li class="<?php if(isset($page) and  $page == 'home' ){ echo 'active'; };?>"><a href="/">Accueil</a></li>
                            <li class="<?php if(isset($page) and  $page == 'agro' ){ echo 'active'; };?>"><a href="/pages/produitagro.php">Agroalimentaire</a></li>
                            <li class="<?php if(isset($page) and  $page == 'artisanat' ){ echo 'active'; };?>"><a href="/pages/produitart.php">Artisanat</a></li>
                            <li class="<?php if(isset($page) and  $page == 'cosmetique' ){ echo 'active'; };?>"><a href="/pages/produitcosm.php">Cosmetiques</a></li>
                            <li class="<?php if(isset($page) and  $page == 'contact' ){ echo 'active'; };?>"><a href="/pages/contact.php">Contact</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="col-lg-3">
                    <div class="header__cart">
                        <div class="header__top__right__auth">
                             <?php if(isset($_SESSION['id_utilisateur'])) { ?>
                            <a href="/pages/logout.php"><i class="fa fa-user"></i> Se déconnecter</a>
                        <?php } else{ ?>
                            <a class="<?php if(isset($page) and  $page == 'login' ){ echo 'active'; };?>" href="/pages/login.php"><i class="fa fa-user"></i> Se connecter</a>
                        <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="humberger__open">
                <i class="fa fa-bars"></i>
            </div>
        </div>
    </header>


