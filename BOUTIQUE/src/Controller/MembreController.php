<?php

namespace BOUTIQUE\Controller;

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;


class MembreController
{
	public function profilAction(Application $app){

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

	}
}