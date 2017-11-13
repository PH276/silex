<?php
namespace BOUTIQUE\Controller;

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;
use BOUTIQUE\Entity\Produit;

class ProduitController
{

    public function BoutiqueAction(Application $app){
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

    }

    public function produitAction($id, Application $app){
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

    }

    public function categorieAction($cat, Application $app){
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

    }



}
