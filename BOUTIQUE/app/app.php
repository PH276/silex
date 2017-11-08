<?php

use Symfony\Component\Debug\ErrorHandler;
use Symfony\Component\Debug\ExceptionHandler;

// enregistrement des services : Error  et Exception :
ErrorHandler::register();
ExceptionHandler::register();

// On enregisyrte notre appli au services Doctrine qu'on a récupérés :
$app -> register (new Silex\Provider\DoctrineServiceProvider());

// on enregistre ds $app['dao.produit'] un objet de la classe ProduitDAO de manière à ce qu'il soit directement accessibble via $app/
$app['dao.produit'] = function($app){
    return new BOUTIQUE\DAO\ProduitDAO($app['db']);

};
