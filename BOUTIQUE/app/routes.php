<?php


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
    $produits = $app['dao.produit'] -> findAll();
    $categories = $app['dao.produit'] -> findAllCategories();



    ob_start(); // enclenche la temporisation. cela signifie que tt ce qui suit ne  sera pas executé
    require '../views/view.php';
    $view = ob_get_clean(); // stocke tt ce qui a été retenu avec ob_start() ds une variable
    return $view;

// Tout ceci est le fonctionnement de base des fonction render(à). A savoir retenir des morceaux de vue, pour tout  rendre à la fin.

});
