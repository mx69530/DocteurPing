<?php
$_SESSION['id']=Null;
$_SESSION['pseudo']=Null;
?>
<!DOCTYPE html>
<html lang="fr">
	<head>
	  <!-- Meta data -->
	  <title>Page Title</title>
	  <meta charset="UTF-8">
	  <meta name="description" content="Truc de chinois">
	  <meta name="keywords" content="chinois, acuponcture">
	  <meta name="author" content="Tanguy Falconnet - Maxime Servettaz">
	  <link href="css/style.css" rel="stylesheet" type="text/css">
	</head>

	<body>
  	<header>
  		<span class="titre">DocteurPing</span>
		<nav>
		  <ul>
		    <li>
		       <a href="#">Patologies</a>
		    </li>
		    <li>
		      <a href="#">Recherche</a>
		    </li>
		    <li>
		      <a href="#">Mon compte</a>
		    </li>
			<li>
		      <a href="#">Flux RSS</a>
		    </li>
			<li>
		      <a href="#">Deconnexion</a>
		    </li>
		  </ul>
		</nav>
	</header>
	<div id='page'>
		<?php 
		if (isset($_SESSION['id']) AND isset($_SESSION['pseudo'])AND $_SESSION['pseudo']!=NULL  AND $_SESSION['id']!=NULL)
		{
				echo 'Utilisateur deja connecté';
				echo 'ID :'. $_SESSION['id'];
				echo 'Pseudo :'.$_SESSION['pseudo'];
	  
		}else{
			include('php/login.php');
			echo 'ID :'. $_SESSION['id'];
			echo 'Pseudo :'.$_SESSION['pseudo'];
	  
		}
		?>
		
		
		
		
		<p>Quam ob rem vita quidem talis fuit vel fortuna vel gloria, ut nihil posset accedere, moriendi autem sensum celeritas abstulit; quo de genere mortis difficile dictu est; quid homines suspicentur, videtis; hoc vere tamen licet dicere, P. Scipioni ex multis diebus, quos in vita celeberrimos laetissimosque viderit, illum diem clarissimum fuisse, cum senatu dimisso domum reductus ad vesperum est a patribus conscriptis, populo Romano, sociis et Latinis, pridie quam excessit e vita, ut ex tam alto dignitatis gradu ad superos videatur deos potius quam ad inferos pervenisse.
		<p>Utque proeliorum periti rectores primo catervas densas opponunt et fortes, deinde leves armaturas, post iaculatores ultimasque subsidiales acies, si fors adegerit, iuvaturas, ita praepositis urbanae familiae suspensae digerentibus sollicite, quos insignes faciunt virgae dexteris aptatae velut tessera data castrensi iuxta vehiculi frontem omne textrinum incedit: huic atratum coquinae iungitur ministerium, dein totum promiscue servitium cum otiosis plebeiis de vicinitate coniunctis: postrema multitudo spadonum a senibus in pueros desinens, obluridi distortaque lineamentorum conpage deformes, ut quaqua incesserit quisquam cernens mutilorum hominum agmina detestetur memoriam Samiramidis reginae illius veteris, quae teneros mares castravit omnium prima velut vim iniectans naturae, eandemque ab instituto cursu retorquens, quae inter ipsa oriundi crepundia per primigenios seminis fontes tacita quodam modo lege vias propagandae posteritatis ostendit.
		</p>
		<p>Quam ob rem cave Catoni anteponas ne istum quidem ipsum, quem Apollo, ut ais, sapientissimum iudicavit; huius enim facta, illius dicta laudantur. De me autem, ut iam cum utroque vestrum loquar, sic habetote.
		</p>
		<p>Constituendi autem sunt qui sint in amicitia fines et quasi termini diligendi. De quibus tres video sententias ferri, quarum nullam probo, unam, ut eodem modo erga amicum adfecti simus, quo erga nosmet ipsos, alteram, ut nostra in amicos benevolentia illorum erga nos benevolentiae pariter aequaliterque respondeat, tertiam, ut, quanti quisque se ipse facit, tanti fiat ab amicis.
		</p>
		<p>Eius populus ab incunabulis primis ad usque pueritiae tempus extremum, quod annis circumcluditur fere trecentis, circummurana pertulit bella, deinde aetatem ingressus adultam post multiplices bellorum aerumnas Alpes transcendit et fretum, in iuvenem erectus et virum ex omni plaga quam orbis ambit inmensus, reportavit laureas et triumphos, iamque vergens in senium et nomine solo aliquotiens vincens ad tranquilliora vitae discessit.
		</p>
		<p>Post hanc adclinis Libano monti Phoenice, regio plena gratiarum et venustatis, urbibus decorata magnis et pulchris; in quibus amoenitate celebritateque nominum Tyros excellit, Sidon et Berytus isdemque pares Emissa et Damascus saeculis condita priscis.
		</p>
		<p>Nihil morati post haec militares avidi saepe turbarum adorti sunt Montium primum, qui divertebat in proximo, levi corpore senem atque morbosum, et hirsutis resticulis cruribus eius innexis divaricaturn sine spiramento ullo ad usque praetorium traxere praefecti.
		</p>
		<p>Quam ob rem vita quidem talis fuit vel fortuna vel gloria, ut nihil posset accedere, moriendi autem sensum celeritas abstulit; quo de genere mortis difficile dictu est; quid homines suspicentur, videtis; hoc vere tamen licet dicere, P. Scipioni ex multis diebus, quos in vita celeberrimos laetissimosque viderit, illum diem clarissimum fuisse, cum senatu dimisso domum reductus ad vesperum est a patribus conscriptis, populo Romano, sociis et Latinis, pridie quam excessit e vita, ut ex tam alto dignitatis gradu ad superos videatur deos potius quam ad inferos pervenisse.
		</p>		  

	 </div>
	 <footer>
	 <br>
	 <br>
	 </footer>
	</body>
</html>
