<?php

namespace BOUTIQUE\Entity;

class Produit
{
	private $_d_produit;
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

	public function setId_produit($id){
		$this -> id_produit = $id;
	}
	public function getId_produit(){
		return $this -> id_produit;
	}

	public function setReference($ref){
		$this -> Reference = $ref;
	}
	public function getReference(){
		return $this -> Reference;
	}

	public function setCategorie($cat){
		$this -> categorie = $cat;
	}
	public function getCategorie(){
		return $this -> Categorie;
	}

	public function setTitre($Titre){
		$this -> Titre = $Titre;
	}
	public function getTitre(){
		return $this -> Titre;
	}

	public function setDescription($Desc){
		$this -> Description = $Desc;
	}
	public function getDescription(){
		return $this -> Description;
	}

	public function setCouleur($Coul){
		$this -> Coul = $Coul;
	}
	public function getCouleur(){
		return $this -> Couleur;
	}

	public function setTaille($Taille){
		$this -> Taille = $Taille;
	}
	public function getTaille(){
		return $this -> Taille;
	}
	
	public function setPublic($Public){
		$this -> Public = $Public;
	}
	public function getPublic(){
		return $this -> Public;
	}

	public function setPhoto($Photo){
		$this -> Photo = $Photo;
	}
	public function getPhoto(){
		return $this -> Photo;
	}

	public function setPrix($Prix){
		$this -> Prix = $Prix;
	}
	public function getPrix(){
		return $this -> Prix;
	}

	public function setStock($Stock){
		$this -> Stock = $Stock;
	}
	public function getStock(){
		return $this -> Stock;
	}

}

		?>