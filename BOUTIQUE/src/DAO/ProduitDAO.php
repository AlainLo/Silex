<?php

//src/DAO/produitDAO.php
namespace BOUTIQUE\DAO;

use Doctrine\DBAL\Connection;
use BOUTIQUE\Entity\Produit;

class produitDAO
{
	private $db; // Va contenir notre objet connection, qui représente la connexion à la base de données.

	public function __construct(Connection $db){
		$this->db = $db;
	}

	public function getDb(){
		return $this ->db;
	}
	public function findAll(){
		// Fonction pour récupérer tous les produits dans la BDD :

		$requete = "SELECT * FROM produit";
		$resultat = $this -> getDb() -> fetchAll($requete);

		// $resultat : contient tous les produits sous forme d'un array multidimensionnel

		$produits = array();
		foreach($resultat as $value){

			$id_produit = $value['id_produit'];
			$produits[$id_produit] = $this -> buildProduit($value);
		}
		return $produits; 
	}

	// toutes les autres requêtes de l'entité Produit seront ici
	// ---
	public function findById($id){
		// Fonction pour récupérer un produit dans la BDD :

		$requete = "SELECT * FROM produit WHERE id_produit = ? ";
		$resultat = $this -> getDb() ->
		fetchAssoc($requete, array($id));
		// $resultat : Contient toutes les infos du produit sous forme d'un array

		$produit = $this -> buildProduit($resultat);
		//on transforme l'array en objet de la classe produit (POPO) et on retourne cet objet

		return $produit;
	}

	public function findAllbyCategorie($categorie){

		$req = "SELECT * FROM produit WHERE categorie  = ?";
		$resultat = $this -> getDb() -> fetchAll($req, array($categorie));
		// $resultat = Array multidimensionnel composé d'array

		$produit = array();
		foreach($resultat as $value){
			$id_produit = $value['id_produit'];
			$produits[$id_produit] = $this -> buildProduit($value);
		}
		//$produits est maintenant un array multi composé d'autant d'objets que de produits récupérés par la requête
		return $produits;
	}


	public function findAllCategories(){
		$req = "SELECT DISTINCT categorie FROM produit";
		$resultat = $this->getDb()-> fetchAll($req);
		// $resultat est un tableau multidimensionnel avec toutes les catégories...
		return $resultat;
	}

	protected function buildProduit(array $value){  //l'objectif de cette fonction est de transformer un array contenant toutes les infos d'un produit en un objet de la classe Entity/Produit
		$produit = new produit; // notre POPO qu'on a créé avec ses Getter et ses Setter

		$produit -> setId_Produit($value['id_produit']);
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

		// On a transformé un array qui contient toutes les infos d'un produit en un objet qui contient toutes les infos du produit et on a renvoyé cet objet ensuite ;)

	}
}


?>