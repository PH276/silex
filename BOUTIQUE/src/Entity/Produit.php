<?php
namespace BOUTIQUE\Entity;
class produit
{
    private $id_produit;
    private $reference;
    private $categorie;
    private $titre;
    private $description;
    private $couleur;
    private $taille;
    private $public;
    private $photo;
    private $prix;
    private $stock;

    public function  setId_produit ($id_produit){
        $this -> id_produit = $id_produit;
    }

    public function getId_produit(){
        return $this -> id_produit;
    }

    public function  setReference ($reference){
        $this -> reference = $reference;
    }

    public function getReference(){
        return $this -> reference;
    }

    public function  setCategorie ($categorie){
        $this -> categorie = $categorie;
    }

    public function getCategorie(){
        return $this -> categorie;
    }

    public function  setTitre ($titre){
        $this -> titre = $titre;
    }

    public function getTitre(){
        return $this -> titre;
    }

    public function  setDescription ($description){
        $this -> description = $description;
    }

    public function getDescription(){
        return $this -> description;
    }

    public function  setCouleur ($couleur){
        $this -> couleur = $couleur;
    }

    public function getCouleur(){
        return $this -> couleur;
    }

    public function  setTaille ($taille){
        $this -> taille = $taille;
    }

    public function getTaille(){
        return $this -> taille;
    }

    public function  setPublic ($public){
        $this -> public = $public;
    }

    public function getPublic(){
        return $this -> public;
    }

    public function  setPhoto ($photo){
        $this -> photo = $photo;
    }

    public function getPhoto(){
        return $this -> photo;
    }

    public function  setPrix ($prix){
        $this -> prix = $prix;
    }

    public function getPrix(){
        return $this -> prix;
    }

    public function  setStock ($stock){
        $this -> stock = $stock;
    }

    public function getStock(){
        return $this -> stock;
    }


}
