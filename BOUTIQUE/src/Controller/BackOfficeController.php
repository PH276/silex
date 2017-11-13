<?php
namespace BOUTIQUE\Controller;

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;
use BOUTIQUE\Entity\Produit;
// use BOUTIQUE\Form\Type\ProduitType;

class BackOfficeController
{

    public function ProduitAction(Application $app){
        $produits = $app['dao.produit'] -> findAll();

        // ajout à la l'étape 8.6
        $params = array(
            'produits' => $produits,
            'title' => 'Tous les Produits'
        );

        return $app['twig'] -> render('backoffice_produit.html.twig', $params);
    }

    public function addProduitAction(Application $app, Request $request){

    }



}
