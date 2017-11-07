<!Doctype html>
<html>
<head>
    <title>Mon Site - <?= $page ?></title>
    <link rel="stylesheet" href="css/style.css"/>
</head>
<body>
    <header>
        <div class="conteneur">
            <span>
                <a href="index.php" title="Mon Site">MonSite.com</a>
            </span>
            <nav>
                <a href="">Connexion</a>
                <a href="">Inscription</a>
                <a href="">Profil</a>
                <a href="">Panier</a>
                <a href="">Boutique</a>
        </nav>
    </div>
</header>
<section>
    <div class="conteneur">
    </h1>Boutique</h1>

    <div class="boutique-gauche">
        <ul>
            <li><a href="boutique.php">Tous les produits</a></li>
            <?php for ($i=0; $i <count($categories) ; $i++) : ?>
                <li><a href="?cat=<?= $categories[$i]['categorie'] ?>"><?= $categories[$i]['categorie'] ?></a></li>
            <?php endfor; ?>


        </ul>
    </div>

    <div class="boutique-droite">

        <?php for ($i=0; $i < count($produits) ; $i++) : ?>

            <!-- Debut vignette produit -->
            <div class="boutique-produit">
                <h3><?= $produits[$i]['titre'] ?></h3>
                <a href="fiche_produit.php?id=<?= $produits[$i]['id_produit'] ?>"><img src="photo/<?= $produits[$i]['photo'] ?>" height="100"/></a>
                <p style="font-weight: bold; font-size: 20px;"><?= $produits[$i]['prix'] ?>€</p>

                <p style="height: 40px"><?= substr($produits[$i]['description'], 0, 40); ?>...</p>
                <a href="fiche_produit.php?id=<?= $produits[$i]['id_produit'] ?>" style="padding:5px 15px; background: red; color:white; text-align: center; border: 2px solid black; border-radius: 3px" >Voir la fiche</a>
                <!-- href="fiche_produit.php?id=id_du_produit" -->
            </div>
            <!-- Fin vignette produit -->
        <?php endfor; ?>

    </div>
    <!-- Fin vignette produit -->

</div>
<!-- Fin vignette produit -->

</div>

</div>
</section>
<footer>
    <div class="conteneur">
        <?= date('Y');  ?> - Tous droits reservés.
    </div>
</footer>
</body>
</html>
