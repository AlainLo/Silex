<?php

// app/app.php

use Symfony\Component\Debug\ErrorHandler;
use Symfony\Component\Debug\ExceptionHandler;

// enregistrement des services : Error et Exception :
ErrorHandler::register();
ExceptionHandler::register();

// On enregistre notre application au service Doctrine qu'on a récupérés : 
$app -> register(new Silex\Provider\DoctrineServiceProvider());

// On enregistre dans $app['dao.produit'] un objet de la classe ProduitDAO de manière à ce qu'il soit directement accessible via $app.

$app['dao.produit'] = function($app){
	return new BOUTIQUE\DAO\ProduitDAO($app['db']);
};

?>