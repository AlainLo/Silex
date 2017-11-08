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

	ob_start();
	require '../views/view.php' ;
	$view = ob_get_clean();
	return $view; 

});

?>