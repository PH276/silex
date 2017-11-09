<?php

namespace BOUTIQUE\DAO;

use Doctrine\DBAL\Connection;
use BOUTIQUE\Entity\Produit;

class ProduitDAO
{

    private $db;

    public function __construct (Connection $db){
        $this -> db = $db;
    }

    /**
    * Get the value of Db
    *
    * @return mixed
    */
    public function getDb()
    {
        return $this->db;
    }

    /**
    * Set the value of Db
    *
    * @param mixed db
    *
    * @return self
    */
    public function setDb($db)
    {
        $this -> db = $db;

        return $this;
    }

    public function findAll(){
        $requete = "SELECT * FROM produit";
        $resultat = $this -> getDb() -> fetchAll($requete); // array multidimenssionnel

        $produits = array();

        foreach ($resultat as $value){
            $id_produit = $value['id_produit'];
            $produits[$id_produit] = $this -> buildProduit($value);
        }

        return $produits;
    }

    public function findAllCategorie($cat){
        $requete = "SELECT * FROM produit WHERE categorie= ?";
        $resultat = $this -> getDb() -> fetchAll($requete, array($cat)); // array multidimenssionnel

        $produits = array();

        foreach ($resultat as $value){
            $id_produit = $value['id_produit'];
            $produits[$id_produit] = $this -> buildProduit($value);
        }

        return $produits;
    }

    public function findAllCategories(){
        $requete = "SELECT DISTINCT categorie FROM produit";
        $categories = $this -> getDb() -> fetchAll($requete); // array multidimenssionnel

        return $categories;
    }

    public function findById($id){
        $requete = "SELECT * FROM produit WHERE id_produit= ?";
        $resultat = $this -> getDb() -> fetchAssoc($requete, array($id)); // array multidimenssionnel

        $produit = $this -> buildProduit($resultat);

        return $produit;
    }


    // ttes les autres requetes de produit seront ici





    protected function buildProduit(array $value){ // sert à transformer un array en un objet Produit
        $produit = new Produit;

        $produit -> setId_produit($value['id_produit']);
        $produit -> setReference($value['reference']);
        $produit -> setCategorie($value['categorie']);
        $produit -> setTitre($value['titre']);
        $produit -> setDescription($value['description']);
        $produit -> setCouleur($value['couleur']);
        $produit -> setTaille($value['taille']);
        $produit -> setPublic($value['public']);
        $produit -> setPhoto($value['photo']);
        $produit -> setPrix($value['prix']);
        $produit -> setStock($value['stock']);

        return $produit;
    }







}
