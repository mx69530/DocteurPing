<?php
	echo'<header>
	<span class="titre">DocteurPing</span>
	<nav>
	  <ul>
		<li>
		   <a href="index.php?current=patho">Patologies</a>
		</li>
		<li>';
		echo' <a href="index.php?current=consultation">Recherche</a>';	
		echo'</li>';
			if(($_SESSION['pseudo'])){
				echo'<li>';
				echo' <a href="index.php?current=account">Mon compte</a>';
				echo'</li>';
			}

		echo'<li>
				<a href="index.php?current=fluxRSS">Flux RSS</a>
			</li>
			<li>';
			if(($_SESSION['pseudo'])){
				echo' <a href="index.php?current=logout">Deconnexion</a>';
			}else{
				echo' <a href="index.php?current=login">Connexion</a>';
			}
			echo'</li>
		
	  </ul>
	</nav>
</header>';
?>