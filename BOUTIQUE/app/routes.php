<?php

use Symfony\Component\HttpFoundation\Request; // gère les requetes HTTP POST

// créé en étape 6.3
// mis en commentaires 7.9
//
// $app -> get('/', function(){
//     require '../src/model.php';
//
//     $infos = afficheAll();
//
//     $produits = $infos['produits'];
//     $categories = $infos['categories'];
//
//
//     ob_start(); // enclenche la temporisation. cela signifie que tt ce qui suit ne  sera pas executé
//
//     require '../views/view.php';
//
//     $view = ob_get_clean(); // stocke tt ce qui a été retenu avec ob_start() ds une variable
//
//     return $view;
//
// // Tout ceci est le fonctionnement de base des fonction render(à). A savoir retenir des morceaux de vue, pour tout  rendre à la fin.
//
// });


// créé en étape 7.9


$app -> get('/', "BOUTIQUE\Controller\BaseController::indexAction") -> bind('home');

$app -> get('/boutique', "BOUTIQUE\Controller\ProduitController::boutiqueAction") -> bind('boutique');

$app -> get('/fiche_produit/{id}', "BOUTIQUE\Controller\ProduitController::produitAction") -> bind('produit');

$app -> get('/boutique/{cat}', "BOUTIQUE\Controller\ProduitController::boutiqueAction") -> bind('categorie');

$app -> get('/profil/', "BOUTIQUE\Controller\MembreController::profilAction") -> bind('profil');

// fonctionnalité pour le formlaire de contact : /contact/
$app -> match('/contact/', "BOUTIQUE\Controller\MembreController::profilAction") -> bind('contact');

// affichage de ts les produits
$app -> get ('/backoffice/produit', "BOUTIQUE\Controller\BackOfficeController::produitAction") -> bind('backoffice/produit');

$app -> match ('/backoffice/produit/add', "BOUTIQUE\Controller\BackOfficeController::addProduitAction") -> bind ('bo_produit_add');
