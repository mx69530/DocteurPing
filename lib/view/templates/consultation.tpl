<h1>.</h1>
<h2>Rechercher une pathologie</h2>
<form action="index.php?current=consultation&amp;process=search" method="POST">
	<!-- ZONE MOTS CLEF -->
	{$keywords}
	<!---->
	<!-- ZONE MERIDIEN -->
	<h3>Méridiens :</h3>
	<div class="groupBox">
	{$meridians}
	<!---->
	</div>
	
	<!-- ZONE PATHOLOGIE -->
	<h3>Type de pathologie :</h3>
	<div class="groupBox">
	{$pathologies}			
	<!---->
	</div>
	
	<!-- ZONE Caractéristiques -->
	<h3>Caractéristiques :</h3>
	<div class="groupBox">
	{$features}
	<!---->
	</div>

	<input type="submit" value="Rechercher">
</form>
<form action="index.php?current=consultation&amp;process=clear" method="POST">
	<input type="submit" value="RAZ">
</form>
	
	
	<!-- GESTION DES RESULTATS -->
	{$results}
	<!---->

