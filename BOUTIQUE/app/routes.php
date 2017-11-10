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
$app -> get('/', function() use($app){
    // $produits = $app['dao.produit'] -> findAll();
    // $categories = $app['dao.produit'] -> findAllCategories();


    // mis en commentaire à la l'étape 8.6
    // ob_start(); // enclenche la temporisation. cela signifie que tt ce qui suit ne  sera pas executé
    // require '../views/home.html.twig';
    // $view = ob_get_clean(); // stocke tt ce qui a été retenu avec ob_start() ds une variable
    // return $view;

    // Tout ceci est le fonctionnement de base des fonction render(à). A savoir retenir des morceaux de vue, pour tout  rendre à la fin.

    // ajout à la l'étape 8.6
    return $app['twig'] -> render('home.html.twig', array());


})-> bind('home');

$app -> get('/boutique', function() use($app){
    $produits = $app['dao.produit'] -> findAll();
    $categories = $app['dao.produit'] -> findAllCategories();



    // mis en commentaire à la l'étape 8.6
    // ob_start(); // enclenche la temporisation. cela signifie que tt ce qui suit ne  sera pas executé
    // require '../views/boutique.html.twig';
    // $view = ob_get_clean(); // stocke tt ce qui a été retenu avec ob_start() ds une variable
    // return $view;


    // ajout à la l'étape 8.6
    $params = array(
        'produits' => $produits,
        'categories' => $categories,
        'title' => 'Boutique'
    );

    return $app['twig'] -> render('boutique.html.twig', $params);


    // Tout ceci est le fonctionnement de base des fonction render(à). A savoir retenir des morceaux de vue, pour tout  rendre à la fin.

})-> bind('boutique');

$app -> get('/fiche_produit/{id}', function($id) use($app){
    $produit = $app['dao.produit'] -> findById($id);

    // mis en commentaire à la l'étape 8.6
    // ob_start(); // enclenche la temporisation. cela signifie que tt ce qui suit ne  sera pas executé
    // require '../views/produit.html.twig';
    // $view = ob_get_clean(); // stocke tt ce qui a été retenu avec ob_start() ds une variable
    // return $view;

    // ajout à la l'étape 8.6
    $params = array(
        'produit' => $produit,
        'nb_max_panier' => ($produit->getStock())?$produit->getStock():5,
        'title' => $produit->getTitre()
    );

    return $app['twig'] -> render('produit.html.twig', $params);


    // Tout ceci est le fonctionnement de base des fonction render(à). A savoir retenir des morceaux de vue, pour tout  rendre à la fin.

})-> bind('produit');

$app -> get('/boutique/{cat}', function($cat) use($app){
    $produits = $app['dao.produit'] -> findAllCategorie($cat);
    $categories = $app['dao.produit'] -> findAllCategories();


    // mis en commentaire à la l'étape 8.6
    // ob_start(); // enclenche la temporisation. cela signifie que tt ce qui suit ne  sera pas executé
    // require '../views/boutique.html.twig';
    // $view = ob_get_clean(); // stocke tt ce qui a été retenu avec ob_start() ds une variable
    // return $view;

    $params = array(
        'produits' => $produits,
        'categories' => $categories,
        'title' => $cat
    );

    return $app['twig'] -> render('boutique.html.twig', $params);

    // Tout ceci est le fonctionnement de base des fonction render(à). A savoir retenir des morceaux de vue, pour tout  rendre à la fin.

})-> bind('categorie');

$app -> get('/profil', function() use ($app){

    session_start();
    $_SESSION['membre']['pseudo'] = 'pashui';
    $_SESSION['membre']['sexe'] = 'm';
    $_SESSION['membre']['prenom'] = 'Pascal';
    $_SESSION['membre']['nom'] = 'HUITOREL';
    $_SESSION['membre']['email'] = 'HUITOREL';
    $_SESSION['membre']['adresse'] = '10 r hb';
    $_SESSION['membre']['code_postal'] = 92390;
    $_SESSION['membre']['ville'] = 'VLG';
    $_SESSION['membre']['statut'] = 0;

    // $membre = $app['dao.membre'] -> showMembre();

    $params = array(
        'membre' =>   $_SESSION['membre'],
        'title' => 'Admin'
    );
    return $app ['twig'] -> render('profil.html.twig', $params);
}) -> bind('profil');


// fonctionnalité pour le formlaire de contact : /contact/
$app -> match('/contact/', function(Request $request) use ($app){

    $contactForm = $app['form.factory'] -> create(BOUTIQUE\Form\Type\ContactType::class);

    $contactFormView = $contactForm -> createView();


    $params = array(
        'title' => 'Contact',
        'contactForm' => $contactFormView
    );

    return $app ['twig'] -> render('contact.html.twig', $params);

}) -> bind('contact');
