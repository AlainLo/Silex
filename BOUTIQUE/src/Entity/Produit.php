<?php

namespace BOUTIQUE\Entity;

class Produit
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
		return $this -> categorie;
	}

	public function setTitre($Titre){
		$this -> titre = $Titre;
	}
	public function getTitre(){
		return $this -> titre;
	}

	public function setDescription($Desc){
		$this -> description = $Desc;
	}
	public function getDescription(){
		return $this -> description;
	}

	public function setCouleur($Coul){
		$this -> coul = $Coul;
	}
	public function getCouleur(){
		return $this -> couleur;
	}

	public function setTaille($Taille){
		$this -> taille = $Taille;
	}
	public function getTaille(){
		return $this -> taille;
	}
	
	public function setPublic($Public){
		$this -> public = $Public;
	}
	public function getPublic(){
		return $this -> public;
	}

	public function setPhoto($Photo){
		$this ->photo = $Photo;
	}
	public function getPhoto(){
		return $this -> photo;
	}

	public function setPrix($Prix){
		$this -> prix = $Prix;
	}
	public function getPrix(){
		return $this -> prix;
	}

	public function setStock($Stock){
		$this -> stock = $Stock;
	}
	public function getStock(){
		return $this -> stock;
	}

}

		?>