<?php


$app -> get('/', function(){
    require '../src/model.php';

    $infos = afficheAll();

    $produits = $infos['produits'];
    $categories = $infos['categories'];


    ob_start(); // enclenche la temporisation. cela signifie que tt ce qui suit ne  sera pas executé

    require '../views/view.php';

    $view = ob_get_clean(); // stocke tt ce qui a été retenu avec ob_start() ds une variable

    return $view;

// Tout ceci est le fonctionnement de base des fonction render(à). A savoir retenir des morceaux de vue, pour tout  rendre à la fin.

});
