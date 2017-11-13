<?php
namespace BOUTIQUE\Controller;

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;
use BOUTIQUE\Form\Type\ContactType;

class baseController
{

    public function indexAction(Application $app){
        return $app['twig'] -> render('home.html.twig', array());
    }

    public function contactAction(Request $request, Application $app){
        $contactForm = $app['form.factory'] -> create(ContactType::class);
        $contactForm -> handleRequest($request); // gère la soumission du formulaire

        if ($contactForm -> isSubmitted() && $contactForm -> isValid()){
            $data = $contactForm -> getData();
            echo '<pre>';
            print_r($data);
            echo '</pre>';

            extract($data);
            // $prenom...
            // $header
            // mail();
        }



        $contactFormView = $contactForm -> createView();


        $params = array(
            'title' => 'Contact',
            'contactForm' => $contactFormView
        );

        return $app ['twig'] -> render('contact.html.twig', $params);


    }



}
