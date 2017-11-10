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

	// créer en étape 7.9 :

$app -> get('/', function() use($app){

	$produits = $app['dao.produit']-> findAll();
	// $produits = objetModelProduit (ProduitDAO) -> findAll();
	// produits est un tableau multidimensionnel composé d'objets
	$categories = $app['dao.produit']-> findAllCategories();


	// Mis en commentaire à l'étape 8.6
	//ob_start();
	//require '../views/view.php' ;
	//$view = ob_get_clean();
	//return $view;

	// Ajouté à l'étape 8.6 :

	$params = array(
		'produits' => $produits,
		'categories' => $categories,
		'title' => 'Accueil'
	);

	return $app['twig'] -> render('index.html.twig', $params); 

})-> bind('home');

$app -> get('/produit/{id}', function($id) use($app){
	
	$produit = $app['dao.produit']-> findById($id);
	// SELECT * FROM produit WHERE id-produit = $id;

	/*ob_start();
	require '../views/fiche_produit.php' ;
	$view = ob_get_clean();
	return $view; */

	$params = array(
		'produit' => $produit
	);

	return $app['twig'] -> render('fiche_produit.html.twig', $params); 

})-> bind('fiche_produit');

// On souhaite construire une nouvelle route qui va nous afficher tous les produits en fonction de la catégorie. l'URL souhaitée est : wwww.boutique.dev/boutique/nom_de_la_catégorie

$app -> get('/boutique/{categorie}', function($categorie) use($app){
	
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
	
})-> bind('boutique');

/// exo : Faire la route qui va afficher la page de profil. En simulant à l'intérieur de la route l'ouverture de la session, et en enregistrant dans $_SESSION['membre'] les infos d'un nouveau membre au hasard

$app -> get ('profil/', function() use($app){

	session_start();
		$_SESSION['membre']['id_membre']='1';
		$_SESSION['membre']['pseudo']= 'Alain';
		$_SESSION['membre']['sexe']= 'm';
		$_SESSION['membre']['prenom']='Alain';
		$_SESSION['membre']['nom']='LORTAL';
		$_SESSION['membre']['email']='alain.lortal@lepoles.com';
		$_SESSION['membre']['adresse']='142, Avenue Jean Jaurès';
		$_SESSION['membre']['code_postal']= '93150';
		$_SESSION['membre']['ville']='PANTIN';
		$_SESSION['membre']['statut']='0';


		$params = array(
			'membre' =>  $_SESSION['membre'] 
	);

	return $app['twig'] -> render('profil.html.twig', $params);

})-> bind('profil');

//Etc...

// On rend la vue.profil.html.twig


// Fonctionnalités pour le formulaire de contact : /contact/
$app -> match('/contact/', function(Request &request) use($app){

	$contactForm = $app['form.factory'] -> create(BOUTIQUE\Form\Type\ContactType::class);
	$contactFormView = $contactForm -> createView();
	
	$params = array(
		'title' => 'Formulaire Contact'
		'contactForm' => $contactFormView
	);

	return $app['twig'] -> render('contact.html.twig', $params);

}) -> bind('contact');
?>