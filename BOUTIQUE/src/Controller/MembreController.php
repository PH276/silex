<?php
namespace BOUTIQUE\Controller;

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;
use BOUTIQUE\Entity\Produit;

class MembreController
{

    public function profilAction(Application $app){
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

    }


}
