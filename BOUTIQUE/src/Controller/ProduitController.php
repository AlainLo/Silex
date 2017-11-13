<?php

namespace BOUTIQUE\Controller;

use Silex\Application;
use Symfony\Component\HTTPFoundation\Request;
use BOUTIQUE\Entity\Produit;

class ProduitController
{
	public function produitAction($id, Application $app){
		$produit = $app['dao.produit']-> findByid($id);
		// SELECT * FROM produit WHERE id_produit =$id

		$params = array(
			'produit' => $produit
		);

		return $app['twig'] -> render('fiche_produit.html.twig', $params);
	}

	public function boutiqueAction ($categorie, Application $app){

		//étape 1 : récupérer les produits en fonction de $categorie
		// SELECT * FROM produit WHERE categorie = $categorie;
		$produits = $app['dao.produit']-> findAllByCategorie($categorie);
		
		//étape 2 : Récupérer également toutes les catégories pour ré_afficher le menu latéral (les noms de catégories).

		$categories = $app['dao.produit']-> findAllCategories(); 

		$params = array(
			'produits' => $produits,
			'categories' => $categories,
			'title' => 'Nos '. $categorie . 's'
		);

		return $app['twig'] -> render('index.html.twig', $params);
	}



}