<?php

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

});

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

});

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
	
});


?>