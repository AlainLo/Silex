<?php

use Symfony\Component\HttpFoundation\Request;
// Request est la classe Symfony qui va gérer les requêtes http (POST). On ne récupére pas les infos avec $_POST directement.

//$app -> get('/', function(){
//	require '../src/model.php';
	// Fichier qui contient notre fonction afficheAll()

	//$infos = afficheAll();

	//$produits = $infos['produits'];
	//$categories = $infos['categories'];

	//ob_start(); // enclenche la temporisation. Cela signifie que tout ce qui suit ne sera pas exécuté.
	//require '../views/view.php';
	//$view = ob_get_clean(); // Stocke tout ce qui a été retenu dans une variable return $view;

	//return $view;

	// Ici on a stocké notre vue dans la variable $view  grâce à ob_start() et ob_get_clean(). Ensuite, on return la vue. c'est la base de la fonction render() qu'on utilisera par la suite.

//});

$app -> get('/', 'BOUTIQUE\Controller\BaseController::indexAction')-> bind('home');

	// créer en étape 7.9 :

$app -> get('/produit/{id}', 'BOUTIQUE\Controller\ProduitController::produitAction')-> bind('fiche_produit');

// On souhaite construire une nouvelle route qui va nous afficher tous les produits en fonction de la catégorie. l'URL souhaitée est : wwww.boutique.dev/boutique/nom_de_la_catégorie

$app -> get('/boutique/{categorie}', 'BOUTIQUE\Controller\ProduitController::boutiqueAction')-> bind('boutique');

/// exo : Faire la route qui va afficher la page de profil. En simulant à l'intérieur de la route l'ouverture de la session, et en enregistrant dans $_SESSION['membre'] les infos d'un nouveau membre au hasard

$app -> get ('profil/', 'BOUTIQUE\Controller\MembreController::profilAction')-> bind('profil');

//Etc...

// On rend la vue.profil.html.twig


// Fonctionnalités pour le formulaire de contact : /contact/
$app -> match('/contact/', 'BOUTIQUE\Controller\BaseController::contactAction') -> bind('contact');

// route pour l'affichage de tous les produits dans le BackOffice (dans un tableau HTML)
$app -> get('/backoffice/produit/', 'BOUTIQUE\Controller\BackOfficeController::produitAction') -> bind('bo_produit');
// route pour ajouter un nouveau produit
$app -> match ('/backoffice/produit/add', 'BOUTIQUE\Controller\BackOfficeController::addProduitAction')
-> bind('bo_produit_add');
?>