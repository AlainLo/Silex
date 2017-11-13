<?php
//src/Form/Type/ProduitForm.php
{% extends 'layout.html.twig'%}
	
	{% if produitForm %}

<label> Catégorie : </label>
{{ form_errors(produitForm.categorie) }}
{{ form_widget(produitForm.categorie) }}

<label> Référence : </label>
{{ form_errors(produitForm.reference) }}
{{ form_widget(produitForm.reference) }}

<label> Titre : </label>
{{ form_errors(produitForm.titre) }}
{{ form_widget(produitForm.titre) }}

<label> Public : </label>
{{ form_errors(produitForm.public) }}
{{ form_widget(produitForm.public) }}

<label> Couleur : </label>
{{ form_errors(produitForm.couleur) }}
{{ form_widget(produitForm.couleur) }}

<label> taille : </label>
{{ form_errors(produitForm.taille) }}
{{ form_widget(produitForm.taille) }}

<label> Couleur : </label>
{{ form_errors(produitForm.couleur) }}
{{ form_widget(produitForm.couleur) }}

<label> Description : </label>
{{ form_errors(produitForm.description) }}
{{ form_widget(produitForm.description) }}

<label> Prix : </label>
{{ form_errors(produitForm.prix) }}
{{ form_widget(produitForm.prix) }}

<label> Stock : </label>
{{ form_errors(produitForm.stock) }}
{{ form_widget(produitForm.stock) }}

