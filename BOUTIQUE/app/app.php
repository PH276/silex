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

// on enregistre le service TWIG
$app -> register (new Silex\Provider\TwigServiceProvider(), array(
    'twig.path' => __DIR__ . '/../views'
));

// on enregistre le service assets
$app -> register(new Silex\Provider\AssetServiceProvider(), array(
    'assets.version' => 'v1'
));

// on enregistre le service form
$app -> register(new Silex\Provider\FormServiceProvider());

$app -> register ( new Silex\Provider\LocaleServiceProvider ());

$app->register(new Silex\Provider\ValidatorServiceProvider());

$app -> register(new Silex\Provider\TranslationServiceProvider(), array(
    'locale_fallbacks' => array ( 'fr' ),
     'translator.messages' => array()
  ));
