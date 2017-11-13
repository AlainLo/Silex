<?php
//src/Form/Type/ContactType.php

namespace BOUTIQUE\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderinterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\Constraints\NotBlank;

class ContactType extends AbstractType 
{

	public function buildForm(FormBuilderinterface $builder, array $options) {
			$builder 
				-> add('prenom', TextType::class, array('constraints' => array(new Assert\NotBlank()
						)
					))
				-> add('nom', TextType::class, array(/* Condition */))
				-> add('email', EmailType::class, array(/* Condition */))
				-> add('sujet', ChoiceType::class, array(
					'choices'=> array(
						'Service Client' => 'client',
						'Problème technique' =>'tech',
						'Service Presse' => 'press' 
					)
				))
				-> add('message', TextareaType::class, array());



		}


}