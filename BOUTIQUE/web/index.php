<?php
require_once __DIR__ .'/../vendor/autoload.php';

$app = new Silex\Application;

// $app -> get('/', function(){
//     return 'Hello world !';
// });

// $app -> get('/hello/{name}', function($name) use ($app){
//     $infos = afficheAll();
//
//     $produits = $infos['produits'];
//     $categories = $infos['categories'];
//
//
//     return $view;
//
//     // ici on a stocké notre vue ds la var $view grâce à ob_start() et ob_get_clean(). ensuite on retourne la vue. C'est la base de la fn render qu'on utilisera par la suite
//
//
// });

$app['debug'] = true;


require __DIR__ . '/../app/routes.php';




$app -> run();
