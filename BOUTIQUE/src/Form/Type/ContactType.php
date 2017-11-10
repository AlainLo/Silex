<?php
//src/Form/Type/ContactType.php

namespace BOUTIQUE\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderinterface;
use Symfony\Component\Form\Extension\Core\Type\TextType
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class ContactType extends AbstractType 
{

	public function buildForm(FormBuilderinterface $builder, array $options) {
			$builder 
				-> add('prenom', TextType::class, array(/* Condition */))
				-> add('nom', TextType::class, array(/* Condition */))
				-> add('email', EmailType::class, array(/* Condition */))
				-> add('sujet', ChoiceType::class, array(
					'choices'=> array(
						'client' => 'Service Client',
						'tech' => 'Problème technique',
						'press' => 'Service Presse'
					)
				))
				-> add('message', TextareaType::class, array());



		}


}