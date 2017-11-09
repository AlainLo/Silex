<?
<h1>{{% titre %}}</h1>

<img src="../photo/{ produit.photo }" width="250" />
<p>Détails du produit : </p>
<ul>
	<li>Référence : <b>{{ produit.reference }}</b></li>
	<li>Catégorie : <b>{{ produit.categorie }}</b></li>
	<li>Couleur : <b>{{ produit.couleur }}</b></li>
	<li>Taille : <b>{{ produit.taille }}</b></li>
	<li>Public : <b>{{ produit.public }}</b></li>
	<li>Prix : <b style="color: red; font-size:20px">{{ produit.prix }}€ TTC</b></li>
</ul>
<br/>
<p>Description du produit : <br/>
<em>{{ produit.description }}</em></p>	

<fieldset>
	<legend>Acheter ce produit :</legend>
	
	{% if produit.stock > 0 %}
	<form method="post" action="">
		<label>Quantité :</label>
		<select name="quantite">
			{% for i in 1..5 %}
			<option>{{ i }}</option>
			{% endfor %}
		</select>
		<input type="submit" value="Ajouter au panier" />
	</form>
	
	{% else %}
	<i style="color:red">Rupture de stock !</i>
	{% endif %}
	
	
</fieldset>


<div class="profil" style="overflow:hidden;">
	<h2>Suggestions de produits</h2>
	
	<!-- Dans le PHP faire une requête qui va récupérer des produits (limités à 5): 
		Soit des produits de la même catégorie (sauf celui qu'on est en train de visiter)
		
		Soit les produits des autres catégories
	-->

	
	
</div>


